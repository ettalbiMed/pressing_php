<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController
{
    public function submit()
    {
        $site = config('Site')->site;
        $rateLimitWindow = 60;
        $lastSubmission = session()->get('contact_last_submission');

        if ($lastSubmission && (time() - (int) $lastSubmission) < $rateLimitWindow) {
            return redirect()->to('/#contact')->with('error', 'Merci de patienter quelques secondes avant un nouvel envoi.');
        }

        if (! empty((string) $this->request->getPost('company'))) {
            return redirect()->to('/#contact')->with('error', 'Soumission invalide.');
        }

        $rules = [
            'name'    => 'required|min_length[2]|max_length[120]',
            'phone'   => 'required|min_length[8]|max_length[30]',
            'email'   => 'permit_empty|valid_email|max_length[160]',
            'message' => 'permit_empty|max_length[1000]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to('/#contact')->withInput()->with('errors', $this->validator->getErrors());
        }

        $payload = [
            'name'       => esc(trim((string) $this->request->getPost('name'))),
            'phone'      => esc(trim((string) $this->request->getPost('phone'))),
            'email'      => esc(trim((string) $this->request->getPost('email'))),
            'message'    => esc(trim((string) $this->request->getPost('message'))),
            'ip_address' => (string) $this->request->getIPAddress(),
            'user_agent' => substr((string) $this->request->getUserAgent(), 0, 255),
        ];

        $model = new ContactModel();
        $model->insert($payload);

        session()->set('contact_last_submission', time());

        // Optional email notification placeholder.
        // $email = \Config\Services::email();

        return redirect()->to('/#contact')->with('success', 'Merci, votre demande a bien été envoyée. Nous vous recontactons rapidement à Témara.');
    }
}

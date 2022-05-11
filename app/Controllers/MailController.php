<?php

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;

class MailController extends BaseController
{


    function processContact()
    {
        $to = 'janselsobrino@gmail.com';
        $subject = 'account activation';
        $messages = 'everythings working fine';

        $request = service('request');
        helper(['form',
        ]);
        if ($request->getMethod() == 'post') {
            $rules = [
//                'email' => 'required|valid_email',
//                'name' => 'required',
                'tel' => 'required',
                'message' => 'required'];
            if ($this->validate($rules)) {
//                $name = $request->getVar('name');
//                $email = $request->getVar('email');
                $tel = $request->getVar('tel');
                $textarea = $request->getVar('message');


                $correo = \Config\Services::email();
                $correo->setTo('jjs32288@gmail.com');
                $correo->setFrom('cuba@gmail.com', 'quote Request');
                $correo->setSubject("Solicitud desde " . $tel);
                $correo->setMessage($textarea);

                $correo->setFrom('jjs32288@gmail.com', 'RambotiresCorp');

                $session = session();
                if ($correo->send()) {
                    $session->setFlashdata('mailSucess', 'Email sent to RambotiresCorp, we will contact you soon!!!');
                    return redirect()->route('rootUrl');
//                    return view('layout/main');
                } else {
                    $session->setFlashdata('mailError', 'Was an error sending mail we will fix it soon!!!');
                    return redirect()->route('rootUrl');
//                    return view('layout/main');
                    $data = $correo->printDebugger(['headers']);
                    die(var_dump($data));

//                    print_r($data);
                }

            } else {
                $data['validation'] = $this->validator;

            }
        }
        return view('layout/main', $data);

    }

}
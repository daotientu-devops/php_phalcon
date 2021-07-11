<?php

class SignupController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function registerAction()
    {
        $signup = new Users();
        $signup->assign(array(
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ));
        $signup->save();
        return $this->response->redirect('users');
    }
}

?>
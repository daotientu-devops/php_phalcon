<?php

class LoginController extends ControllerBase
{
    public function indexAction()
    {

    }

    private function _registerSession(Users $user)
    {
        $this->session->set('auth', array(
            'isLog' => 'Y',
            'id' => $user->id,
            'username' => $user->email
        ));
    }

    public function loginAction()
    {
        if ($this->request->isPost()) {
            $email = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user = Users::findFirst("email='$email'");
            if ($user) {
                if ($password == $user->password)
                {
                    $this->_registerSession($user);
                    $this->response->redirect('users');
                }
            }
            echo "Username atau pass salah";
            return $this->dispatcher->forward(array("action" => "index"));
        }
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('login');
    }
}
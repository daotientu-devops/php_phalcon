<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        if ($this->cookies->has("login-action")) {
            echo "Đã có cookie ";
            // Get the cookie
            $loginCookie = $this->cookies->get("login-action");
            // Get the cookie's value
            $value = $loginCookie->getValue();
            echo $value;
        } else {
            echo "Chưa có cookie";
            $this->cookies->set(
                "login-action",
                "abc",
                time() + 15 * 86400
            );
        }
        // Check if the variable is not defined
        if (!$this->session->has('users-name')) {
            echo "\nChưa có session";
            // Define a session variable
            $this->session->set('users-name', 'Omkar');
        }
        // Retrieve its value
        $name = $this->session->get('users-name');
        echo "\nĐã có session ";
        echo $name;
        die();
        $this->view->setVar('title', 'Phalcon Framework');
    }
}

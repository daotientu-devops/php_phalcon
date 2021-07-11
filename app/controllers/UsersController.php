<?php

use Phalcon\Mvc\Model\Query;
use Phalcon\Translate\Adapter\NativeArray;
use Phalcon\Mvc\Model\Criteria;

class UsersController extends ControllerBase
{
    protected function getMessageTranslation()
    {
        // Ask browser what is the best language
        $language = $this->request->getBestLanguage();
        $messages = [];
        $translationFile = APP_PATH . '/messages/' . $language . '.php';
        // Check if we have a translation file for that lang
        if (file_exists($translationFile)) {
            require $translationFile;
        } else {
            // Fallback to some default
            require APP_PATH . '/messages/en.php';
        }
        // Return a translation object $messages comes from the require
        // Statement above
        return new NativeArray(['content' => $messages]);
    }

    public function indexAction()
    {
        if ($this->session->has('auth')) {

        } else {
            $this->response->redirect('login');
        }
        $data_user = Users::find();
        $this->view->data_user = $data_user;

        // Using raw query (Sau viết vào 1 adapter truyền vào tên bảng để nạp dữ liệu)
        $sql = "SELECT * FROM users";
        $connection = $this->db;
        $data = $connection->query($sql);
        $data->setFetchMode(\Phalcon\Db::FETCH_ASSOC); // Trả về dưới dạng mảng kết hợp
        $results = $data->fetchAll(); // get all data
        echo "This is my first web application in Phalcon";
        $title = 'I love you ten million years';
        $this->view->title = $title;
        $this->view->name = 'DAO TIEN TU';
        $this->view->song = "Ton sourire m'ensorcelle Je suis fou de toi Le désir coule dans mes veines Guidé par ta voix";
        $this->view->t = $this->getMessageTranslation();
        $this->assets->addCss('public/css/style.css');
        $this->view->pick('users/index');
    }

    public function editAction($id)
    {
        $user = Users::findFirst($id);
        $this->view->id = $user->id;
        $this->view->name = $user->name;
        $this->view->email = $user->email;
        $this->view->pick('users/edit');
    }

    public function updateAction()
    {
        $id = $this->request->getPost("id");
        $user = Users::findFirstById($id);
        $user->name = $this->request->getPost('name');
        $user->email = $this->request->getPost('email');
        if (!$user->save()) {
            echo "Gagal Disimpan";
        } else {
            echo "Data Berhasil Diupdate";
        }
    }

    public function searchAction()
    {
        if ($this->request->isPost())
        {
            $query = Criteria::fromInput($this->di, "Users", $this->request->getPost());
            $this->persistent->searchParams = $query->getParams();
        }
        $parameters = array();
        if ($this->persistent->searchParams) {
            $parameters = $this->persistent->searchParams;
        }
        $user = Users::find($parameters);
        $this->view->data_user = $user;
        $this->view->pick('users/index');
    }
}


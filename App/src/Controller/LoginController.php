<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 03/10/2018
 * Time: 22:40
 */

namespace App\Controller;

use App\Model\Users;

use Presto\Controller\SecurityController;
use Presto\Controller\SessionController;
use Presto\Controller\LanguageController;

class LoginController extends Controller
{
    protected $className;
    protected $controller;
    protected $session;
    protected $security;

    public function __construct()
    {
        $this->className = get_class();
        $this->controller = substr(get_class(), 15, -10);

        $session = new SessionController();
        $this->session = $session;

        $security = new SecurityController();
        $this->security = $security;
    }

    public function indexAction()
    {
        $this->layout();
        $this->render('login', 'index');
    }

    public function registerAction()
    {
        $this->layout();
        $this->render('login', 'register');
    }

    public function createNewUserAction()
    {
        $userTable = new Users();
        #encryp ARGON2
        $_POST['password'] = $this->security->createhashArgon2($_POST['password']);


        if ($userTable->save($_POST) == 'true')
            echo json_encode(['msg' => (new LanguageController())->language(NEW_USER_CREATE)]);
        else
            echo json_encode(['msg' => (new LanguageController())->language(USER_NOT_CREATE)]);

        return false;
    }

    public function forgotPasswordAction()
    {
        $this->layout();
        $this->render('login', 'forgot');
    }

    public function listAction()
    {
        $this->layout();
        $this->render('login', 'list');
    }

    public function resetPasswordAction()
    {
        $userTable = new Users();
        $dados = [];
        $dados = $this->busca = $userTable->getRowByField(array("email" => $_POST['email']));
        if (count($dados) > 0) {
            echo $dados['name'];
            //envia email com o link
        }
    }

    public function verifyPasswordAction()
    {
        $userTable = new Users();
        $dados = array();
        $dados = $userTable->getRowByField(array("email" => $_POST['email']));

        #if find email, check if password confers
        if ($dados) {
            #verify password
            if ($this->security->compareArgonPassword($_POST['password'], $dados->password)) {
                #save in session info user
                $this->session->saveLoginSession($dados->name, $dados->email);

                #redirect for admin or user control panel
                header("location:/");
            } else
                $return = "Dados invalidos.";
        }
        $return = "Usuario não encontrado";

        return $return;

    }
}

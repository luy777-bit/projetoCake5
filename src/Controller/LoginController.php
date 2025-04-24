<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Login Controller
 *
 */
class LoginController extends Controller
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index(){

        $_SESSION['titlepage'] = 'Login';

        $pagina = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
        $_SESSION['caminho_1'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$pagina;

        $pagina_js = str_replace('webroot/index.php', '', $_SERVER['SCRIPT_NAME']);
        $_SESSION['caminho_2'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$pagina_js;        

        $login = $this->request->getData('login');
        $senha = $this->request->getData('senha');

        if(isset($login) && isset($senha)){

            $userTable = $this->fetchTable('tbuser');
            $autentica_user = $userTable->autentica_user($login, $senha);

            if($autentica_user == true){
                return $this->redirect(['action'=>'../clientes/index']);
            }
            else{

            }
        }
    }

    public function logout(){

        session_start();
        $_SESSION['login'] =  "";
        $_SESSION['senha'] =  "";
        $_SESSION['id_perfil'] =  "";

        clearstatcache();

        header("Location: http://localhost/faturamento_cobranca_baixa/Login/index"); 
        exit;         
    }
}

<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\DataSource\ConnectionManager;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');

        session_start();
        //echo "<pre>";
        $pagina = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
        $_SESSION['caminho_1'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$pagina;

        $pagina_js = str_replace('webroot/index.php', '', $_SERVER['SCRIPT_NAME']);
        $_SESSION['caminho_2'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$pagina_js;

        if(!isset($_SESSION['login']) && !isset($_SESSION['senha'])){
           header("Location: http://localhost/faturamento_cobranca_baixa/Login/index"); 
           exit; 
        }
        if(strlen($_SESSION['login']) == 0 && strlen($_SESSION['senha']) == 0){
           header("Location: http://localhost/faturamento_cobranca_baixa/Login/index"); 
           exit; 
        }

    }

    public function testeConexao(){

        echo " TESTE CONEXAO ";
        //exit;

        try{
            $conectDB = ConnectionManager::get('default');
            $testeConet = $conectDB->execute('SELECT count(id) FROM Clientes')->fetch('assoc');

            echo "<pre>";
            print_r($testeConet);
        }
        catch(Exception $e){
            echo "<pre>";
            print_r($e);
        }
        exit;
    }

}

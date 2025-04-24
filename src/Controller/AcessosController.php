<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Acessos Controller
 *
 */
class AcessosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index(){

        $_SESSION['titlepage'] = 'Acessos';

        $tbperfil      = $this->fetchTable('tbperfil');
        $mostra_perfil = $tbperfil->mostra_perfil()->toArray(); 

        $this->set(compact('mostra_perfil'));     

        if(isset($_POST['id_perfil']) && $_POST['id_perfil'] != 0){

            $id_perfil = $_POST['id_perfil'];

            $tbmenu        = $this->fetchTable('tbmenu');
            $mostra_menu   = $tbmenu->mostra_menu()->toArray();

            $tbsubmenu     = $this->fetchTable('tbsubmenu');

            $tbacessos        = $this->fetchTable('tbacesso');
            $mostra_acessos   = $tbacessos->pesquisa_acessos($id_perfil)->toArray();

            $html =  "<ul id='myUL'>";
            foreach ($mostra_menu as $key => $value) {
                $qtd_submenu = count($tbsubmenu->mostra_submenu($value['id'])->toArray());

                //$html .= $value['menu'];

                if($qtd_submenu > 0){

                    $mostra_submenu = $tbsubmenu->mostra_submenu($value['id']);

                    $html .= "<li>";
                    $html .= "<span class='caret idMenu'>Menu - ".$value['menu']."</span>";
                        $html .= "<ul class='nested'>";

                            foreach ($mostra_submenu as $key2 => $value2) {

                                $checkSubMenu = false;
                                foreach ($mostra_acessos as $key3 => $value3) {
                                    
                                    if($id_perfil == $value3['id_perfil'] && $value2['id'] == $value3['id_submenu']){
                                        $checkSubMenu = true;

                                        $html .= " <input type='checkbox' name='perfil' class='perfilInput' value='".$value3['id']."' checked>";                                         
                                    }
                                }

                                if($checkSubMenu == false){
                                    $html .= " <input type='checkbox' name='perfil' class='perfilInput'>";
                                }

                                $html .= "<li>";
                                    $html .= "Pagina - ".$value2['submenu'];
                                    if($checkSubMenu == true){                                       
                                        $html .= " <input type='checkbox' name='menu' class='menuInput' value='".$value['id']."' checked>";
                                        $html .= " <input type='checkbox' name='submenu' class='submenuInput' value='".$value2['id']."' checked>";
                                    }
                                    else{
                                        $html .= " <input type='checkbox' name='menu' class='menuInput' value='".$value['id']."'>";
                                        $html .= " <input type='checkbox' name='submenu' class='submenuInput' value='".$value2['id']."'>";
                                    }

                                $html .= "</li>";
                            }

                        $html .= "</ul>";
                    $html .= "</li>";
                }
            }
            $html .= "</ul>";

            $this->set(compact('html', 'id_perfil'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Acesso id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $acesso = $this->Acessos->get($id, contain: []);
        $this->set(compact('acesso'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->autoRender = false;

        if($this->request->is('post')){
            //echo 1;
            $acessosTable = $this->fetchTable('tbacesso');
            $acessosEntity = $acessosTable->newEmptyEntity();            

            $dados_form = array(
                'id_perfil'  => $this->request->getData('id_perfil'),
                'id_menu'    => $this->request->getData('menu'),
                'id_submenu' =>  $this->request->getData('submenu')
            );

            $acessos_insert = $acessosTable->patchEntity($acessosEntity, $dados_form);
            $verifica_erros = $acessos_insert->getErrors();    

            if(count($verifica_erros) == 0){
                //echo 2;
                try{
                    $acessosTable->insere_acessos($acessos_insert);
                    echo "ok";
                }
                catch(Exception $e){
                    echo "<pre>";
                    print_r($e);
                    exit;                    
                    $retorno = 'ERRO';
                    $this->set(compact('retorno'));
                }                
            }
            else{
                echo "<pre>";
                print_r($verifica_erros);
            }        
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Acesso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {   
        $this->autoRender = false;

        $acessosTable = $this->fetchTable('tbacesso');

        $id = $this->request->getData('id');

        try{
            $acessosTable->delete_acessos($id);
            echo "ok";
        }
        catch(Exception $e){
            echo "<pre>";
            print_r($e);
            exit;                    
            $retorno = 'ERRO';
            $this->set(compact('retorno'));
        } 
    }
}

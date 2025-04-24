<?php
declare(strict_types=1);

namespace App\Controller;
use App\Utilitys;

/**
 * Clientes Controller
 *
 */
class ClientesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $_SESSION['titlepage'] = 'Clientes';

        if(isset($_GET['filtro_cliente'])){
            $dados_filtro = $_GET['filtro_cliente'];
        }
        else{
            $dados_filtro = 0;
        }

        $tbclientes = $this->fetchTable('tbclientes');
        $pesquisa_cliente   = $tbclientes->pesquisa_cliente($dados_filtro);

        $clientes = $this->paginate($pesquisa_cliente);

        $this->set(compact('clientes'));
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($cnpj){

        $this->autoRender = false;

        $tbclientes       = $this->fetchTable('tbclientes');
        $pesquisa_cliente = $tbclientes->pesquisa_cliente($cnpj);
        $pesquisa_array   = $pesquisa_cliente->toArray();

        $this->set(compact('pesquisa_array'));
        $html = $this->render('/Clientes/view');
        return $html;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add(){

        $_SESSION['titlepage'] = 'Cadastro de Clientes';

        $clienteTable = $this->fetchTable('tbclientes');
        $clienteEntity = $clienteTable->newEmptyEntity();

        if($this->request->is('post')){

            $Util = new Utilitys;

            $dados_form = array(
                'nm_cliente' => $Util->verificaNull($this->request->getData('nm_cliente'), 'nm_cliente'),
                'cnpj' => $Util->formataCNPJinsert($this->request->getData('cnpj'), 'cnpj'),
                'cep' => $Util->formataCEPinsert($this->request->getData('cep'), 'cep'),
                'endereco' => $Util->verificaNull($this->request->getData('endereco'), 'endereco'),
                'ativo' => $Util->checkboxUmOuZero($this->request->getData('ativo'), 'ativo'),
                'observacao' => $Util->verificaNull($this->request->getData('observacao'), 'observacao'),
                'data_vencimento' => $Util->formataDataInsert($this->request->getData('data_vencimento'), 'data_vencimento'),
                'data_criacao' => $Util->dataHoraAtual(),
                'user_criacao' => $Util->usuarioSession($this->request->getData('user_criacao'), 'user_criacao')
            );

            $cliente_insert = $clienteTable->patchEntity($clienteEntity, $dados_form);
            $verifica_erros = $cliente_insert->getErrors();

            if(count($verifica_erros) == 0){
                try{
                    $clienteTable->insere_cliente($cliente_insert);

                    //cadastro de informações
                    $qtd_info_cliente = count($this->request->getData('informacao'));

                    //echo "<pre>";
                    //print_r($this->request->getData('informacao'));
                    //exit;

                    if($qtd_info_cliente > 0 && strlen($this->request->getData('informacao')[0]) > 0){

                        $infoclienteTable = $this->fetchTable('tbinformacoesclientes');

                        foreach ($this->request->getData('informacao') as $key => $value) {

                            $dados_form_2 = array(
                                        'informacao'  => $value,
                                        'cnpj'        => $Util->formataCNPJinsert($this->request->getData('cnpj'), 'cnpj'),
                                        'data_criacao'=> date('Y-m-d H:i:s'),
                                        'user_criacao'=>'luis.macedo'
                            );

                            //echo "<pre>";
                            //print_r($dados_form_2);exit;

                            $infoEntity = $infoclienteTable->newEmptyEntity();
                            $info_insert = $infoclienteTable->patchEntity($infoEntity, $dados_form_2);
                            $verifica_erros_2 = $info_insert->getErrors();

                            //echo "<pre>";
                            //print_r($verifica_erros_2);
                            //exit;

                            echo "<pre>";
                            print_r($info_insert);                            

                            if(count($verifica_erros_2) == 0){
                                //echo "sasa";
                                try{
                                    $infoclienteTable->insere_info_cliente($info_insert);   

                                    //echo "<pre>";
                                    //print_r($infoclienteTable);                               
                                }
                                catch(Exception $e){

                                    echo "<pre>";
                                    print_r($e);
                                    exit;
                                    $retornoInsert = 'ERRO';
                                    $this->set(compact('retornoInsert'));
                                }                                
                            }
                        }
                    }

                    $retorno = 'OK';
                    $this->set(compact('retorno'));                   
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
                exit;
            }
        }

    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($cnpj){

        $_SESSION['titlepage'] = 'Edição de Clientes';

        $clienteTable       = $this->fetchTable('tbclientes');
        $pesquisa_cliente   = $clienteTable->pesquisa_cliente($cnpj);
        $cliente            = $pesquisa_cliente->toArray();

        $informacoesTable = $this->fetchTable('tbinformacoesclientes');
        $pesquisa_info    = $informacoesTable->pesquisa_info($cnpj);
        $informacoes      = $pesquisa_info->toArray();        

        $this->set(compact('cliente', 'cnpj', 'informacoes'));     

        if($this->request->is('post')){

            $Util = new Utilitys;

            $dados_form = array(
                'nm_cliente' => $Util->verificaNull($this->request->getData('nm_cliente'), 'nm_cliente'),
                'cnpj' => $Util->formataCNPJinsert($this->request->getData('cnpj'), 'cnpj'),
                'cep' => $Util->formataCEPinsert($this->request->getData('cep'), 'cep'),
                'endereco' => $Util->verificaNull($this->request->getData('endereco'), 'endereco'),
                'ativo' => $Util->checkboxUmOuZero($this->request->getData('ativo'), 'ativo'),
                'observacao' => $Util->verificaNull($this->request->getData('observacao'), 'observacao'),
                'data_vencimento' => $Util->formataDataInsert($this->request->getData('data_vencimento'), 'data_vencimento'),
                'data_criacao' => $Util->dataHoraAtual(),
                'user_criacao' => $Util->usuarioSession($this->request->getData('user_criacao'), 'user_criacao')
            );

            $clienteEntity  = $clienteTable->newEmptyEntity();
            $cliente_update = $clienteTable->patchEntity($clienteEntity, $dados_form);
            $verifica_erros = $cliente_update->getErrors();

            if(count($verifica_erros) == 0){
                try{

                    //cadastro de informações
                    if(!empty($this->request->getData('informacao'))){
                        $qtd_info_cliente = count($this->request->getData('informacao'));
                    }
                    else{
                        $qtd_info_cliente = 0;
                    }

                    //echo "<pre>";
                    //print_r($this->request->getData('informacao'));
                    //exit;

                    if($qtd_info_cliente > 0 && strlen($this->request->getData('informacao')[0]) > 0){

                        $infoclienteTable = $this->fetchTable('tbinformacoesclientes');

                        foreach ($this->request->getData('informacao') as $key => $value) {

                            $dados_form_2 = array(
                                        'informacao'  => $value,
                                        'cnpj'        => $Util->formataCNPJinsert($this->request->getData('cnpj'), 'cnpj'),
                                        'data_criacao'=> date('Y-m-d H:i:s'),
                                        'user_criacao'=>'luis.macedo'
                            );

                            //echo "<pre>";
                            //print_r($dados_form_2);exit;

                            $infoEntity = $infoclienteTable->newEmptyEntity();
                            $info_insert = $infoclienteTable->patchEntity($infoEntity, $dados_form_2);
                            $verifica_erros_2 = $info_insert->getErrors();

                            //echo "<pre>";
                            //print_r($verifica_erros_2);
                            //exit;

                            //echo "<pre>";
                            //print_r($info_insert);                            

                            if(count($verifica_erros_2) == 0){
                                //echo "sasa";
                                try{
                                    $infoclienteTable->insere_info_cliente($info_insert);   

                                    //echo "<pre>";
                                    //print_r($infoclienteTable);                               
                                }
                                catch(Exception $e){

                                    echo "<pre>";
                                    print_r($e);
                                    exit;
                                    $retornoInsert = 'ERRO';
                                    $this->set(compact('retornoInsert'));
                                }                                
                            }
                        }
                    }

                    $clienteTable->altera_cliente($cliente_update, $cnpj);
                    $retorno = 'OK';
                    $this->set(compact('retorno'));      

                    return $this->redirect(['action'=>'edit/'.$cnpj]);              
                }
                catch(Exception $e){
                    $retornoInsert = 'ERRO';
                    $this->set(compact('retornoInsert'));
                }
            }
            else{
                echo "<pre>";
                print_r($verifica_erros);
                exit;
            }           

        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($cnpj){

        $this->autoRender = false;
        
        $clienteTable = $this->fetchTable('tbclientes');

        try{
            $clienteTable->deleta_cliente($cnpj);
            //$return = 'OK';
            //$this->set(compact('retornoDelete'));   

            //return $this->redirect(['action'=>'index/'.$cnpj.'?return='.$return]);
            return $this->redirect(['action'=>'index/'.$cnpj]);                
        }
        catch(Exception $e){
            //$return = 'ERRO';
            //$this->set(compact('retornoDelete'));

            echo "<pre>";
            print_r($e);
            exit;
        }


    }
}

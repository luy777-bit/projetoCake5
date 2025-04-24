<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Informacoesclientes Controller
 *
 */
class InformacoesclientesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Informacoesclientes->find();
        $informacoesclientes = $this->paginate($query);

        $this->set(compact('informacoesclientes'));
    }

    /**
     * View method
     *
     * @param string|null $id Informacoescliente id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $informacoescliente = $this->Informacoesclientes->get($id, contain: []);
        $this->set(compact('informacoescliente'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

    }

    /**
     * Edit method
     *
     * @param string|null $id Informacoescliente id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

    }

    /**
     * Delete method
     *
     * @param string|null $id Informacoescliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id, $cnpj)
    {
        $this->autoRender = false;
        
        $infoTable = $this->fetchTable('tbinformacoesclientes');

        try{
            $infoTable->deleta_info_cliente($id);
            //$retornoDelete = 'OK';
            //$this->set(compact('retornoDelete'));  

            return $this->redirect(['action'=>'../clientes/edit/'.$cnpj]);                 
        }
        catch(Exception $e){
            $retornoDelete = 'ERRO';
            $this->set(compact('retornoDelete'));
        }
    }
}

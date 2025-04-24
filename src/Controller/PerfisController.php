<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Perfis Controller
 *
 */
class PerfisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $_SESSION['titlepage'] = 'Perfil';

        if(isset($_GET['filtro_menus'])){
            $dados_filtro = $_GET['filtro_menus'];
        }
        else{
            $dados_filtro = 0;
        }

        $tbperfil = $this->fetchTable('tbperfil');
        $pesquisa_perfil   = $tbperfil->pesquisa_perfil($dados_filtro);

        $perfis = $this->paginate($pesquisa_perfil);

        $this->set(compact('perfis'));
    }

    /**
     * View method
     *
     * @param string|null $id Perfi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $perfi = $this->Perfis->get($id, contain: []);
        $this->set(compact('perfi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $perfi = $this->Perfis->newEmptyEntity();
        if ($this->request->is('post')) {
            $perfi = $this->Perfis->patchEntity($perfi, $this->request->getData());
            if ($this->Perfis->save($perfi)) {
                $this->Flash->success(__('The perfi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The perfi could not be saved. Please, try again.'));
        }
        $this->set(compact('perfi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Perfi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $perfi = $this->Perfis->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $perfi = $this->Perfis->patchEntity($perfi, $this->request->getData());
            if ($this->Perfis->save($perfi)) {
                $this->Flash->success(__('The perfi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The perfi could not be saved. Please, try again.'));
        }
        $this->set(compact('perfi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Perfi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $perfi = $this->Perfis->get($id);
        if ($this->Perfis->delete($perfi)) {
            $this->Flash->success(__('The perfi has been deleted.'));
        } else {
            $this->Flash->error(__('The perfi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

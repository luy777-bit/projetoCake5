<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Submenus Controller
 *
 */
class SubmenusController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $_SESSION['titlepage'] = 'SubMenus';

        if(isset($_GET['filtro_menus'])){
            $dados_filtro = $_GET['filtro_menus'];
        }
        else{
            $dados_filtro = 0;
        }

        $tbsubmenu = $this->fetchTable('tbsubmenu');
        $pesquisa_submenu   = $tbsubmenu->pesquisa_submenu($dados_filtro);

        $submenus = $this->paginate($pesquisa_submenu);

        $this->set(compact('submenus'));
    }

    /**
     * View method
     *
     * @param string|null $id Submenu id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $submenu = $this->Submenus->get($id, contain: []);
        $this->set(compact('submenu'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $submenu = $this->Submenus->newEmptyEntity();
        if ($this->request->is('post')) {
            $submenu = $this->Submenus->patchEntity($submenu, $this->request->getData());
            if ($this->Submenus->save($submenu)) {
                $this->Flash->success(__('The submenu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The submenu could not be saved. Please, try again.'));
        }
        $this->set(compact('submenu'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Submenu id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $submenu = $this->Submenus->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $submenu = $this->Submenus->patchEntity($submenu, $this->request->getData());
            if ($this->Submenus->save($submenu)) {
                $this->Flash->success(__('The submenu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The submenu could not be saved. Please, try again.'));
        }
        $this->set(compact('submenu'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Submenu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $submenu = $this->Submenus->get($id);
        if ($this->Submenus->delete($submenu)) {
            $this->Flash->success(__('The submenu has been deleted.'));
        } else {
            $this->Flash->error(__('The submenu could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

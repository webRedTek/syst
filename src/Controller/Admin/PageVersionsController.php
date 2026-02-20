<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PageVersions Controller
 *
 * @property \App\Model\Table\PageVersionsTable $PageVersions
 */
class PageVersionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->PageVersions->find()
            ->contain(['SitePages']);
        $pageVersions = $this->paginate($query);

        $this->set(compact('pageVersions'));
    }

    /**
     * View method
     *
     * @param string|null $id Page Version id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pageVersion = $this->PageVersions->get($id, contain: ['SitePages']);
        $this->set(compact('pageVersion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pageVersion = $this->PageVersions->newEmptyEntity();
        if ($this->request->is('post')) {
            $pageVersion = $this->PageVersions->patchEntity($pageVersion, $this->request->getData());
            if ($this->PageVersions->save($pageVersion)) {
                $this->Flash->success(__('The page version has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The page version could not be saved. Please, try again.'));
        }
        $sitePages = $this->PageVersions->SitePages->find('list', limit: 200)->all();
        $this->set(compact('pageVersion', 'sitePages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Page Version id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pageVersion = $this->PageVersions->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pageVersion = $this->PageVersions->patchEntity($pageVersion, $this->request->getData());
            if ($this->PageVersions->save($pageVersion)) {
                $this->Flash->success(__('The page version has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The page version could not be saved. Please, try again.'));
        }
        $sitePages = $this->PageVersions->SitePages->find('list', limit: 200)->all();
        $this->set(compact('pageVersion', 'sitePages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Page Version id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pageVersion = $this->PageVersions->get($id);
        if ($this->PageVersions->delete($pageVersion)) {
            $this->Flash->success(__('The page version has been deleted.'));
        } else {
            $this->Flash->error(__('The page version could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

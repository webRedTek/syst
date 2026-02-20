<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * SitePages Controller
 *
 * @property \App\Model\Table\SitePagesTable $SitePages
 */
class SitePagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->SitePages->find()
            ->contain(['Sites']);
        $sitePages = $this->paginate($query);

        $this->set(compact('sitePages'));
    }

    /**
     * View method
     *
     * @param string|null $id Site Page id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sitePage = $this->SitePages->get($id, contain: ['Sites', 'PageVersions']);
        $this->set(compact('sitePage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sitePage = $this->SitePages->newEmptyEntity();
        if ($this->request->is('post')) {
            $sitePage = $this->SitePages->patchEntity($sitePage, $this->request->getData());
            if ($this->SitePages->save($sitePage)) {
                $this->Flash->success(__('The site page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The site page could not be saved. Please, try again.'));
        }
        $sites = $this->SitePages->Sites->find('list', limit: 200)->all();
        $this->set(compact('sitePage', 'sites'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Site Page id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sitePage = $this->SitePages->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sitePage = $this->SitePages->patchEntity($sitePage, $this->request->getData());
            if ($this->SitePages->save($sitePage)) {
                $this->Flash->success(__('The site page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The site page could not be saved. Please, try again.'));
        }
        $sites = $this->SitePages->Sites->find('list', limit: 200)->all();
        $this->set(compact('sitePage', 'sites'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Site Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sitePage = $this->SitePages->get($id);
        if ($this->SitePages->delete($sitePage)) {
            $this->Flash->success(__('The site page has been deleted.'));
        } else {
            $this->Flash->error(__('The site page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Affiliates Controller
 *
 * @property \App\Model\Table\AffiliatesTable $Affiliates
 */
class AffiliatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Affiliates->find()
            ->contain(['Users']);
        $affiliates = $this->paginate($query);

        $this->set(compact('affiliates'));
    }

    /**
     * View method
     *
     * @param string|null $id Affiliate id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $affiliate = $this->Affiliates->get($id, contain: ['Users', 'AffiliateLinks']);
        $this->set(compact('affiliate'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $affiliate = $this->Affiliates->newEmptyEntity();
        if ($this->request->is('post')) {
            $affiliate = $this->Affiliates->patchEntity($affiliate, $this->request->getData());
            if ($this->Affiliates->save($affiliate)) {
                $this->Flash->success(__('The affiliate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The affiliate could not be saved. Please, try again.'));
        }
        $users = $this->Affiliates->Users->find('list', limit: 200)->all();
        $this->set(compact('affiliate', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Affiliate id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $affiliate = $this->Affiliates->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $affiliate = $this->Affiliates->patchEntity($affiliate, $this->request->getData());
            if ($this->Affiliates->save($affiliate)) {
                $this->Flash->success(__('The affiliate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The affiliate could not be saved. Please, try again.'));
        }
        $users = $this->Affiliates->Users->find('list', limit: 200)->all();
        $this->set(compact('affiliate', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Affiliate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $affiliate = $this->Affiliates->get($id);
        if ($this->Affiliates->delete($affiliate)) {
            $this->Flash->success(__('The affiliate has been deleted.'));
        } else {
            $this->Flash->error(__('The affiliate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fair Controller
 *
 * @property \App\Model\Table\FairTable $Fair */
class FairController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $fair = $this->paginate($this->Fair);

        $this->set(compact('fair'));
        $this->set('_serialize', ['fair']);
    }

    /**
     * View method
     *
     * @param string|null $id Fair id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fair = $this->Fair->get($id, [
            'contain' => ['Reservation']
        ]);

        $this->set('fair', $fair);
        $this->set('_serialize', ['fair']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fair = $this->Fair->newEntity();
        if ($this->request->is('post')) {
            $fair = $this->Fair->patchEntity($fair, $this->request->data);
            if ($this->Fair->save($fair)) {
                $this->Flash->success(__('The fair has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fair could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('fair'));
        $this->set('_serialize', ['fair']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fair id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fair = $this->Fair->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fair = $this->Fair->patchEntity($fair, $this->request->data);
            if ($this->Fair->save($fair)) {
                $this->Flash->success(__('The fair has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fair could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('fair'));
        $this->set('_serialize', ['fair']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fair id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fair = $this->Fair->get($id);
        if ($this->Fair->delete($fair)) {
            $this->Flash->success(__('The fair has been deleted.'));
        } else {
            $this->Flash->error(__('The fair could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

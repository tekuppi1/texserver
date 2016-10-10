<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reservation Controller
 *
 * @property \App\Model\Table\ReservationTable $Reservation */
class ReservationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Books', 'Fairs']
        ];
        $reservation = $this->paginate($this->Reservation);

        $this->set(compact('reservation'));
        $this->set('_serialize', ['reservation']);
    }

    /**
     * View method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservation = $this->Reservation->get($id, [
            'contain' => ['Books', 'Fairs']
        ]);

        $this->set('reservation', $reservation);
        $this->set('_serialize', ['reservation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservation = $this->Reservation->newEntity();
        if ($this->request->is('post')) {
            $reservation = $this->Reservation->patchEntity($reservation, $this->request->data);
            if ($this->Reservation->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
            }
        }
        $books = $this->Reservation->Books->find('list', ['limit' => 200]);
        $fairs = $this->Reservation->Fairs->find('list', ['limit' => 200]);
        $this->set(compact('reservation', 'books', 'fairs'));
        $this->set('_serialize', ['reservation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservation = $this->Reservation->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservation = $this->Reservation->patchEntity($reservation, $this->request->data);
            if ($this->Reservation->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
            }
        }
        $books = $this->Reservation->Books->find('list', ['limit' => 200]);
        $fairs = $this->Reservation->Fairs->find('list', ['limit' => 200]);
        $this->set(compact('reservation', 'books', 'fairs'));
        $this->set('_serialize', ['reservation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservation = $this->Reservation->get($id);
        if ($this->Reservation->delete($reservation)) {
            $this->Flash->success(__('The reservation has been deleted.'));
        } else {
            $this->Flash->error(__('The reservation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

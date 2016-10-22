<?php
/**
 * ユーザー認証 コントローラ
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class UsersController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
    }

    public function index() {
        $this->set('users', $this->Users->find('all'));
    }

    public function view($id) {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $users = $this->Users->patchEntity($user, $this->request->data);
            if($user->role == null) $user->role = "texMember";
            $user->created = Time::now();
            $user->modified = Time::now();
            if ($save_status = $this->Users->save($user)) {
                $this->Flash->success(__('ユーザを追加しました！'));
                return $this->redirect(['action' => 'login']);
            }

            //validation
            if(is_array($users->errors()['status'])) {
                $status  = $users->errors()['status'];
                if($status["username"])
                    $this->Flash->error(__($users->errors()['status']["username"]));
                else
                    $this->Flash->error(__('予期せぬエラーです。'));
            } else {
                $this->Flash->error(__('ユーザーが追加できません！'));
            }
        }
        $this->set('user', $user);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('ログインできません！'));
          }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
}
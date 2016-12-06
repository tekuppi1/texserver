<?php
/**
 * 本一覧画面 コントローラ
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\I18n\Time;

class BooklistController extends AppController {

    public function index() {
        $this->set('books', $this->Books->find('all'));
    }

}

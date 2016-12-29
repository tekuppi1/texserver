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

    var $components = array('LoadBook');

    public function index() {
        // 本一欄を取得 
        $books = $this->LoadBook->load();
        $this->set('books', $books);
    }
}

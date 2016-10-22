<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class AdminController extends AppController {

    public function index() {
        $this->set('title_for_layout', 'ダッシュボード | 管理画面');
    }

}

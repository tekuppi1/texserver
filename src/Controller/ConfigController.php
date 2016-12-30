<?php
/**
 * 出品画面 コントローラ
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\I18n\Time;

class ConfigController  extends AppController {

	var $components = array('CategoryFunc', 'BookFunc');
    
    public function index() {
        // 本を登録
        $category = $this->CategoryFunc->get();
        $this->set('category', $category);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class AdminController extends AppController {

    public function index() {
        $this->set('title_for_layout', 'ダッシュボード | 管理画面');
        $this->loger("success", "admin/index", "");

        // ログ出力
        $log = TableRegistry::get('log')->find();
        $time = $log->func()->date_format(['timestamp' => 'identifier',"'%Y/%m/%d %H'" => 'literal']);
        $log->group($time);
        $log->select(['count' => $log->func()->count('*'), 'timeCreated'=>$time]);
        $this->set('chartData', $log);

    }

}

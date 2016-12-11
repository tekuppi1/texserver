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

    var $components = array('AmazonApi');

    public function index() {
        $Books = TableRegistry::get('books')->find('all');

        // クエリパラメータ取得
        $requestQuery = $this->request->query;
        $query_keyword = @$requestQuery['keyword'] ? $requestQuery['keyword'] : null; // @←これ重要

        // AmazonAPI呼び出し
        $url = $this->AmazonApi->generateUrl($query_keyword);
        $result = $this->AmazonApi->callApi($url);

        // setter
        $this->set("AmazonApiUrl", $url);
        $this->set("AmazonApiResult", $result);
        $this->Flash->success(__("API GET"));
    }
}

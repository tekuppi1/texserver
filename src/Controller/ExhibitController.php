<?php
/**
 * 出品画面 コントローラ
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\I18n\Time;

class ExhibitController extends AppController {

	var $components = array('AmazonApi', 'BookFunc');
    
    public function index() {
        $booksTable = TableRegistry::get('books');

        // クエリパラメータ取得
        $requestQuery = $this->request->query;
        $query_isbn = @$requestQuery['isbn'] ? $requestQuery['isbn'] : null; // @←これ重要

        // AmazonAPI呼び出し
        $url = $this->AmazonApi->generateUrl($query_isbn);
        $result = $this->AmazonApi->callApi($url);
        // setter
        $this->set("AmazonApiUrl", $url);
        $this->set("AmazonApiResult", $result);
        $this->Flash->success(__("API GET"));

        // 本を登録
        $books = $this->BookFunc->save(array(
          'title' => 'title',
          'author' => null,
          'price' => 1,
          'cat_id' => 1,
          'img' => 'img',
          'isbn' => 3,
        ));
        $books ? $this->Flash->success(__("出品完了！")) : $this->Flash->success('出品に失敗しました');
    }
}

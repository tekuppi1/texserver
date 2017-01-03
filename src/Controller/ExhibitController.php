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
        
        // クエリパラメータ取得
        $requestQuery = $this->request->query;
        $query_isbn = @$requestQuery['isbn'] ? $requestQuery['isbn'] : null; // @←これ重要

        // AmazonAPI呼び出し
        $url = $this->AmazonApi->generateUrl($query_isbn);
        $result = $this->AmazonApi->callApi($url);

        // xmlデータから出力用変換
        $itemList = array();
        foreach((array)$result['dataList'] as $key => $item) {
            $itemList[$key] = array();
            $itemList[$key]['img'] = "http://images-jp.amazon.com/images/P/". $item["ASIN"] .".09.LZZZZZZZ";
            $itemList[$key]['title'] = $item["Title"];
            $itemList[$key]['author'] = $item["Author"];
            $itemList[$key]['publisher'] = $item["Publisher"];
            $itemList[$key]['isbn'] = $item["ISBN"];
        }

        // setter
        $this->set("AmazonApiUrl", $url);
        $this->set("AmazonApiResult", $result);
        $this->set("itemList", $itemList);
        $this->Flash->success(__("API GET"));
    }

    public function add(){
        $item = array();
        $item["img"] = $this->request->data("img");
        $item["title"] = $this->request->data("title");
        $item["author"] = $this->request->data("author");
        $item["isbn"] = $this->request->data("isbn");

        $this->set("item", $item);
        // 本を登録
        $success = $this->BookFunc->save(array(
          'title' => $item["title"],
          'author' => $item["author"],
          'price' => 1,
          'cat_id' => 1,
          'img' => $item["img"],
          'isbn' => $item["isbn"],
        ));
        $success ? $this->Flash->success(__("出品完了！")) : $this->Flash->success('出品に失敗しました');
    }
}

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

	var $components = array('AmazonApi');
    
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


		/*
        if ($this->request->is('get')) {
        	$book = $booksTable->newEntity();

	        $book->title = $result['dataList'][0]["Title"];
	        $book->isbn = $result['dataList'][0]["ISBN"];
	        $book->author = $result['dataList'][0]["Author"];
	        //保存する
	        if ($booksTable->save($book)) {
	        	$id = $book->id;
	            // メッセージをセットしてリダイレクトする
		        $this->Flash->success(__("出品完了！"));
	        }
	        else
	        {
	            //保存が失敗した場合のメッセージ
	            $this->Flash->success('出品に失敗しました');
	        }
	    }
		*/
    }
}

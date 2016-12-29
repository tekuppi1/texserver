<?php
/**
 * 初期描画読み出しAPI
 *
 * 非同期通信のサンプル
 * http://localhost/texserver/savebook?title=""&author=""&price=""&cat_id=1&img=""&isbn="" にアクセス！
 * @query {int} cat_id - カテゴリid
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class SavebookController extends AppController {

  public function index() {
    $this->autoRender = false;

    //-------------------------------------------------------------------------------
    //Get to Model
    $Books = TableRegistry::get('books');

    //Create Entry
    $BookEntry = $Books->newEntity();

    //Get to query
    $requestQuery = $this->request->query;
    $BookEntry["title"]  = @$requestQuery['title']   ? $requestQuery['title']    : null; // @←これ重要
    $BookEntry["author"] = @$requestQuery['author']  ? $requestQuery['author']   : null; // @←これ重要
    $BookEntry["price"]  = @$requestQuery['price']   ? $requestQuery['price']    : null; // @←これ重要
    $BookEntry["cat_id"] = @$requestQuery['cat_id']  ? $requestQuery['cat_id']   : null; // @←これ重要
    $BookEntry["img"]    = @$requestQuery['img']     ? $requestQuery['img']      : null; // @←これ重要
    $BookEntry["isbn"]   = @$requestQuery['isbn']    ? $requestQuery['isbn']     : null; // @←これ重要*/
    //-------------------------------------------------------------------------------
    //Category Filter
    if($Books->save($BookEntry)){
      echo("<h1>SUCCESS SAVE!!</h1>");
    } else {
      echo("<h1>FALED SAVE!!</h1>");
    }
    echo($BookEntry);
  }
}
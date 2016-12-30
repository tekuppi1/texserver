<?php
/**
 * 初期描画読み出しAPI
 *
 * 非同期通信のサンプル
 * http://localhost/texserver/init.json
 * http://localhost/texserver/init.json?cat_id=0 にアクセス！
 *
 * @query {int} cat_id - カテゴリid
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class InitController extends AppController {

  public $components = array('RequestHandler');

  public function index() {
    $this->viewClass = 'Json';

    //-------------------------------------------------------------------------------
    //Get to Model
    // http://book.cakephp.org/3.0/ja/orm/retrieving-data-and-resultsets.html
    $Books = TableRegistry::get('books')->find('all');
    $Category = TableRegistry::get('category')->find('all');

    //Get to query
    $requestQuery  = $this->request->query;
    $query_cat_id = @$requestQuery['cat_id'] ? $requestQuery['cat_id'] : null; // @←これ重要

    //Filter
    $parents = array();
    $categories = array();
    $books = array();

    //-------------------------------------------------------------------------------
    //Category
    foreach($Category as $cat) {
      if($cat['parent_id'] == null) {
        array_push($parents, $cat);
      } else {
        array_push($categories, $cat);
      }
    }

    //-------------------------------------------------------------------------------
    //Category Filter
    if($query_cat_id!=null)
      foreach ($Books as $row) {
        if($row['cat_id'] == $query_cat_id) array_push($books,$row);
      }
    else
      $books = $Books;

    //-------------------------------------------------------------------------------
    //Error Handring
    $status = !empty($Books);
    $error = !$status ? array('message' => 'Bookがありません', 'code' => 404) : null;

    //output
    $this->set(compact('status', 'parents', 'categories', 'books', 'error'));
    $this->set('_serialize', array('status', 'parents', 'categories', 'books', 'error'));
  }
}
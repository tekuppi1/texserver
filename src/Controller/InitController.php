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
    //$user = TableRegistry::get('user')->find('all');
    //$log = TableRegistry::get('log')->find('all');

    //Get to query
    $requestQuery  = $this->request->query;
    $query_cat_id = @$requestQuery['cat_id'] ? $requestQuery['cat_id'] : null; // @←これ重要

    //Filter
    $filterBooks = array();

    //-------------------------------------------------------------------------------
    //Category Filter
    if($query_cat_id!=null)
      foreach ($Books as $row) {
        if($row['cat_id'] == $query_cat_id) array_push($filterBooks,$row);
      }
    else
      $filterBooks = $Books;

    //-------------------------------------------------------------------------------
    //Error Handring
    $status = !empty($Books);
    $error = !$status ? array('message' => 'Bookがありません', 'code' => 404) : null;

    //output
    $this->set(compact('status', 'Category', 'filterBooks', 'error'));
    $this->set('_serialize', array('status', 'Category', 'filterBooks', 'error'));
  }
}
<?php

namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

class LoadBookComponent extends Component {

  /**
   * 本データの読み出し
   */
  public function load($params = null){

    //Get to Model
    $Books = TableRegistry::get('books')->find('all');
    $Category = TableRegistry::get('category')->find('all');

    //Filter
    $filterBooks = $this->filtering($Books, $params);
    $status = !empty($Books);
    $error = !$status ? array('message' => 'Bookがありません', 'code' => 404) : null;
    return $filterBooks;
  }

  /**
   * 本の一欄をフィルタエリング
   * @param {Array} $books - 本一欄
   * @param {String} $filter - フィルタリングする文字列
   */
  private function filtering($books, $filter = null) {
    $res = array();
    // フィルタリング無し
    if($filter == null) {
      foreach($books as $row) array_push($res, $row);
      return $res;
    }
    // フィルタリング有り
    if($filter.cat_id) {
      if($row['cat_id'] == $filter.cat_if)
        foreach($books as $row) array_push($res, $row);
    }
    return $res;
  }

}
?>

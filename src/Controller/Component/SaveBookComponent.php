<?php

namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Core\Configure;


class SaveBookComponent extends Component {

  /**
   * 本データの保存
   */
  public function save($params){

    //Get to Model
    $Books = TableRegistry::get('books');

    //Create Entry
    $BookEntry = $Books->newEntity();

    //Get to query
    $requestQuery = $this->request->query;
    $BookEntry["title"]  = @$params['title']   ? $params['title']    : null; // @←これ重要
    $BookEntry["author"] = @$params['author']  ? $params['author']   : null; // @←これ重要
    $BookEntry["price"]  = @$params['price']   ? $params['price']    : null; // @←これ重要
    $BookEntry["cat_id"] = @$params['cat_id']  ? $params['cat_id']   : null; // @←これ重要
    $BookEntry["img"]    = @$params['img']     ? $params['img']      : null; // @←これ重要
    $BookEntry["isbn"]   = @$params['isbn']    ? $params['isbn']     : null; // @←これ重要*/

    if($Books->save($BookEntry)){
      echo("<h1>SUCCESS SAVE!!</h1>");
    } else {
      echo("<h1>FALED SAVE!!</h1>");
    }
    echo($BookEntry);
  }

}
?>

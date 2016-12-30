<?php

namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

class CategoryFuncComponent extends Component {

  public $components = array('Flash');

  /**
   * カテゴリの取得
   * @return {Array} カテゴリ
   */
  public function get(){

    //Get to Model
    $Category = TableRegistry::get('category')->find('all');

    $res = array();
    foreach($Category as $row) array_push($res, $row);
    return $res;
  }

  /**
   * カテゴリの追加
   * @param {String} カテゴリ名
   * @param {Integer} 親カテゴリ
   */
  public function add($name, $parentId = null){

    //Get to Model
    $Category = TableRegistry::get('category');

    //Create Entry
    $CategoryEntry = array();
    $CategoryEntry["name"] = $name;
    $CategoryEntry["parentId"] = $parentId;
    $CategoryEntry = $Category->newEntity($CategoryEntry);

    // バリデーションチェック
    if($BookEntry->errors()) return false;
    return $Books->save($BookEntry);
  }

  /**
   * カテゴリが存在するか
   * @param {Integer} $id - ID
   * @return {Boolean}
   */
  public function isExist($id){
    $Category = TableRegistry::get('category')->find('all');
    foreach($this->get() as $row) if($row["id"] == $id) return true;
    return false;
  }

  /**
   * カテゴリ名を取得
   * @param {Integer} $id - ID
   */
  public function getName($id){
    $Category = TableRegistry::get('category')->find('all');

    if($id == null) return null;
    foreach($Category as $row) if($row["id"] == $id) $key = $row;
    foreach($Category as $row) if($row["id"] == $key['parent_id']) return $row["name"];
    return null;
  }
}
?>

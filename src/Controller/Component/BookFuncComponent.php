<?php

namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class BookFuncComponent extends Component {

  public $components = array('Flash', 'CategoryFunc');

  /**
   * 本データの保存
   */
  public function save($params = array()){

    //Get to Model
    $Books = TableRegistry::get('books');

    //Create Entry
    $BookEntry = array();
    $BookEntry["img"]    = @$params['img']     ? $this->convertImage($params['isbn'], $params['img']) : null; // @←これ重要
    $BookEntry["title"]  = @$params['title']   ? $params['title']    : null; // @←これ重要
    $BookEntry["author"] = @$params['author']  ? $params['author']   : null; // @←これ重要
    $BookEntry["price"]  = @$params['price']   ? $params['price']    : null; // @←これ重要
    $BookEntry["cat_id"] = @$params['cat_id']  ? $params['cat_id']   : null; // @←これ重要
    $BookEntry["isbn"]   = @$params['isbn']    ? $params['isbn']     : null; // @←これ重要
    $BookEntry = $Books->newEntity($BookEntry);

    // バリデーションチェック
    if($BookEntry->errors()) return false;
    return $Books->save($BookEntry);
  }

  /**
   * 本の画像をファイルに変換して、bookimageディレクトリに保存
   * @param {String} url - 取り込む画像URL
   * @return {String} 取り込んだ先のURL
   */
  private function convertImage($isbn, $url){
    // $directoryPath = Router::url('/bookimage', true);
    $directoryPath = "bookimage"; 
    $imagePath = $directoryPath. "/" .$isbn;
    $data = file_get_contents($url);
    // ファイル書き出し(webroot配下にbookimageディレクトリを作成してください。)
    file_put_contents($imagePath, $data);
    return Router::url("/". $imagePath, true);
  }

  /**
   * 本データの読み出し
   */
  public function load($params = null){

    //Get to Model
    $Books = TableRegistry::get('books')->find('all');

    //Filter
    $filterBooks = $this->filtering($Books, $params);
    $status = !empty($Books);
    $error = !$status ? array('message' => 'Bookがありません', 'code' => 404) : null;
    return $filterBooks;
  }

  /**
   * 本の一覧をフィルタエリング
   * @param {Array} $books - 本一覧
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
      if($row['cat_id'] == $filter.cat_id)
        foreach($books as $row) array_push($res, $row);
    }
    return $res;
  }

}
?>

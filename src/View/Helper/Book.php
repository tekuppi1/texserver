<?php
App::uses('AppHelper', 'View/Helper');

/**
 * 本のオブジェクト
 */
class BookHelper extends AppHelper {

  //タイトルのタグを生成
  public function createTitleTag($book) {
    $title = $book['title'];
    return ("<div>".$title."<div>");
  }

}

?>
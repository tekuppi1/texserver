<?php
/**
 * 非同期通信のサンプル
 */
namespace App\Controller;
 
use App\Controller\AppController;
 
class AsyncSampleController extends AppController
{
    /**
     * レンダリングメソッド  
     * @param {String} genre - 検索ジャンル
     * @param {String} name - 検索名
     * @return {json} - 結果のjsonファイル
     *
     * @example
     * localhost/texserver/AsyncSample/index/hoge?genre=aaa
     */
    public function index($name = ''){
        $this->autoRender = false;

        //検索バリデーション
        if ($name == "") {
            $this->setAction('err');
            return;
        }
        echo ("名前".$name);
        echo ("<br/>");
        
        //クエリパラメータ出力
        echo("ジャンル".$this->request->query['genre']);
        echo("<hr/>");

        //検索結果数
        $search_count = 100;

        //モックデータ
        $arr = array();
        array_push($arr,array("title" => "本１", "author" => "著者1", "price" => "1円", "img" => "1.jpg"));
        array_push($arr,array("title" => "本2", "author" => "著者2", "price" => "2円", "img" => "2.jpg"));
        array_push($arr,array("title" => "本3", "author" => "著者3", "price" => "3円", "img" => "3.jpg"));
        array_push($arr,array("title" => "本4", "author" => "著者4", "price" => "4円", "img" => "4.jpg"));
        array_push($arr,array("title" => "本5", "author" => "著者5", "price" => "5円", "img" => "5.jpg"));

        //本情報
        $books = array();
        foreach($arr as $book){
            $book_temp = array(
                "book_title" => $book["title"],
                "book_author" => $book["author"],
                "book_price" => $book["price"],
                "book_img" => $book["img"]
            );
            array_push($books,$book_temp);
        }
        
        //返すjson
        $return_json = array(
            "search_count" => $search_count,
            "books" => $books
        );

        //jsonを返す
        echo json_encode($return_json);
    }


    /**
     *パラメータ不足
     */
    public function err(){
        $this->autoRender = false;
        echo "<html><head></head><body>";
        echo "<p>パラメータがありませんでした。</p>";
        echo "</body></html>";
    }
}
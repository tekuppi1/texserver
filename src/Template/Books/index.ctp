<?php
// ※は自分で設定してください
define("ACCESS_KEY_ID"     , 'AKIAIUVB2U6SYCISWOLA');
define("SECRET_ACCESS_KEY" , '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');
define("ASSOCIATE_TAG"     , 'tekuppi0c-22');
define("ACCESS_URL"        , 'https://aws.amazonaws.jp/onca/xml');

$base_param = 'AWSAccessKeyId='.ACCESS_KEY_ID;

$params = array(); 
$params['Service']        = 'AWSECommerceService';
$params['Version']        = '2011-08-02'; //Versionは基本的には最新のものでOK
$params['Operation']      = 'ItemLookup';
$params['ItemId']         = '4886263070';
$params['IdType']         = 'ISBN'; //今回はISBNから情報を取得するのでISBN
$params['SearchIndex']    = "Books"; //今回は本の情報なのでBooks 
$params['AssociateTag']   = ASSOCIATE_TAG;
$params['ResponseGroup']  = 'ItemAttributes,Offers, Images ,Reviews '; // 必要なレスポンスを設定(詳しくは下で説明)
$params['Timestamp']      = gmdate('Y-m-d\TH:i:s\Z');

//パラメータを自然順序付け・昇順で並び替え
ksort($params);

$canonical_string = $base_param;
foreach ($params as $k => $v) {
    $canonical_string .= '&'.urlencode_RFC3986($k).'='.urlencode_RFC3986($v);
}

function urlencode_RFC3986($str)
{
    return str_replace('%7E', '~', rawurlencode($str));
}

$parsed_url = parse_url(ACCESS_URL);
$string_to_sign = "GET\n{$parsed_url['host']}\n{$parsed_url['path']}\n{$canonical_string}";

$signature = base64_encode(
                    hash_hmac('sha256', $string_to_sign, SECRET_ACCESS_KEY, true)
                );

$url = ACCESS_URL.'?'.$canonical_string.'&Signature='.urlencode_RFC3986($signature);

$response = file_get_contents($url); //Amazonへレスポンス

$parsed_xml = null;
// レスポンスを配列で取得
if (isset($response)) {
    $parsed_xml = simplexml_load_string($response);
}

// Amazonへのレスポンスが正常に行われていたら
if ($response && 
    isset($parsed_xml) && 
    !$parsed_xml->faultstring &&
    !$parsed_xml->Items->Request->Errors) {

    foreach ($parsed_xml->Items->Item as $current) {
        // 2で設定したResponseGroupから呼び出したい情報を取得
        $title          = $current->ItemAttributes->Title; // タイトル
        $author         = $current->ItemAttributes->Author; // 著者
        $manufacturer   = $current->ItemAttributes->Manufacturer; // 出版社
        $imgURL         = $current->MediumImage->URL; // 本の表紙の中サイズのURL(サイズは小中大から選べる)  
        $bookURL        = $current->DetailPageURL; // Amazonの本のページのURL

        // 管理しやすいように文字コードの宣言やスペースの削除等を行う
        $title = mb_convert_kana($title, "as", "UTF-8");

        $authors = $author[0];
        // 著者が複数いる場合
        if (count($author) > 1) {
            for ($i = 1; $i < count($author); $i++) {
                $authors = $authors. ",". $author[$i];
            }
        }

        // amazonへのURLを短縮(詳しくは下で)
        $URL = substr($bookURL, 0, 24). "dp/". substr($bookURL, -10);
    }
}
?>
<div class="filterArea">    
    <div class="filter_keyword">
        <h2>キーワード検索</h2>
            <form>
                <input type="text" id="filter-text" placeholder="検索ワードを入力" >
                <div id="suggest" style="display:none;"></div>
            </form>
            <div class="resultArea">
                <div class="filter-result_hit-num"></div>
                <div id="filter-result_list"></div>    
            </div>
    </div>
    <ul class="books">
        <?php 
            foreach($books as $book){
                echo '<li>'.$book['title'].'</li>';
            }
        ?>
    </ul>

</div>

<?php
    foreach($books as $book){
echo<<<ALLBOOK
        <div class="card small book">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="{$book['img']}">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">{$book['title']}<i class="material-icons right">more_vert</i></span>
              <p><a href="#">取引完了</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">{$book['title']}<i class="material-icons right">close</i></span>
              <p>値段：{$book['price']}円</p>
            </div>
        </div>
        
ALLBOOK;
    }
  ?>
 

<script>
function escapeRegExp(string) {
  return string.replace(/([.*+?^=!:${}()|[\]\/\\])/g, "\\$1");
}
var all = [
{
    id:1,
    name:"kazumi",
    old:20
},
{
    id:2,
    name:"sushi",
    old:10
}
];

var x = _.filter(all,function(title){
    var re = escapeRegExp('ka');
    return title.indexOf(re)!=-1;
});

// var x = _.filter(all,function(item){
//     return (escapeRegExp(item['name']).test("kazu")==true);
// });
console.log(x);
var allList = [
    <?php
    foreach($books as $book){
echo<<<BOOK
        {
            id: {$book['id']},
            title: "{$book['title']}",
            author: "{$book['author']}", 
            price: {$book['price']},
            cat_id: {$book['cat_id']},
            img: "{$book['img']}",
            isbn: "{$book['isbn']}"
        }, 
BOOK;
    }
    ?>
];
console.log(allList);
jQuery(function(){
    searchWord = function(){
        var searchText = jQuery(this).val(); // 検索ボックスに入力された値
        var targetText; //すべての本のタイトル
       
        jQuery('.filter-result_hit-num').empty();
        jQuery('#filter-result_list').empty();

        jQuery('.books li').each(function() {
            targetText = jQuery('.card-title').text();

            // 検索対象となるリストに入力された文字列が存在するかどうかを判断
            if (targetText.indexOf(searchText) != -1) {
                jQuery(this).removeClass('hidden');
            } else {
                jQuery(this).addClass('hidden');
            }
        });
    };
    jQuery('#filter-text').on('input', searchWord);
});

// タイトルの配列を用意
var titles = [
    <?php
    foreach($books as $book){
        echo '"'.$book['title'].'",';
    }?>
];
// ユーザがタイトルを入力
// タイトルを入力するたびに予測変換で下にタイトルが出る
jQuery(function(){
    new Suggest.LocalMulti(
            "text",
            "suggest",

        );
});
jQuery('#filter-text').on('input',displayTitle);
displayTitle = function(){

}
// タイトルを検索すると一つの本がモーダル表示される


</script>
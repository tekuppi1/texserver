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
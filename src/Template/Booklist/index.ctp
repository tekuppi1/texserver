<?php 
require "component/dialog.php";
?>

<div class="col-sm-12 booklist"><div class="card-panel">
<!-- ============================================ -->
<!-- 本一覧画面 -->
<!-- ============================================ -->
<p>本一覧ページ</p>

<form>
<!-- キーワード -->
<h1 class="searchfont">キーワード検索</h1>
<nav class="searchcolor"><div class="nav-wrapper"><div class="input-field">
  <input id="search" type="search" required>
  <label for="search"><i class="material-icons">search</i></label>
  <i class="material-icons">close</i>
</div></div></nav>
</form>

<!-- カテゴリ -->
<h1 class="searchfont">カテゴリ検索</h1>
<?php
  $genre = array("南山大学","名古屋大学","その他");
  foreach($genre as $k=>$v){
    $g_name = "group$k";
    echo "<p><input name='group1' type='radio' id='$g_name' /><label for='$g_name'>$v</label></p>";
  }
?>

<!-- サブカテゴリ -->
<div class="input-field col s12">
<?php
  $subGenre = array("理工学部","経済学部","経営学部");
  echo "<select>";
    echo "<option value='' disabled selected>大学を選んでください</option>";
    foreach($subGenre as $k=>$v) echo "<option value='$k'>$v</option>";
  echo "</select>";
  echo "<label>サブカテゴリを選んでください</label>";
?>
</div>

<!-- 確認ボタン -->
<a class="waves-effect waves-light btn show_submit_dialog" onclick="showSubmitDialog();"><i class="material-icons left">repeat</i>検索</a>


<!-- booklist-->
<div class="boxContainer" ><div class="row">
<?php
// $_book = array();
// $_book["img"] = "http://images-jp.amazon.com/images/P/4864100829.09.LZZZZZZZ";
// $_book["title"] = "『夢をかなえるゾウ』";
// $_book["count"] = 1;
// $_book["author"] = "水野敬也";
// $_book["genre"] = "南山大学";
// $_books = array($_book, $_book, $_book);
foreach($books as $key => $book) {
  $jsonBook = json_encode($book);
  echo "<div class='col s4 m6 l3'><div class='card box'>";
  echo "<div class='card-image'><img src='".$book['img']."' /></div>";
  echo "<div class='card-contents'><span class='booklist-card-title'>".$book['title']."</span>";
    echo "<table>";
    echo "<tr><td>著者</td><td>".$book['author']."</td></tr>";
    echo "<tr><td>残り冊数</td><td>".$book['count']."冊</td></tr>";
    echo "</table>";
  echo "</div>";
  echo "<a class='show_submit_dialog' onclick='showSubmitDialog($jsonBook);'>取り引き完了</a>";
  echo "</div></div>";
}
?>
</div></div>

<table>
<?php
foreach($books as $book) {
    echo "<tr><th>タイトル</th><th>著者</th><tr>";
    echo "<tr><td>".$book["title"]."</td><td>".$book["author"]."</td></tr>";
    // debug($book);
}
?>
</table>
<!-- ============================================ -->

<?php echo $this->element('baseDialog'); ?>
</div></div>

<!-- ============================================ -->
<!-- SCRIPT -->
<!-- ============================================ -->
<script language="javascript">
function showSubmitDialog(book = {}) {
  console.log("showSubmitDialog", book);
  jQuery("#dialog_header_text").text("取引完了確認");
  jQuery("#dialog_dismissive_text").text("CANCEL");
  jQuery("#dialog_affirmative_text").text("CONFIRMED");
  // body部分
  jQuery("#dialog_body").empty();
  jQuery("#dialog_body").append("<div class='book'><img src=" + book.img + " class='book-picture'></div>");
  jQuery("#dialog_body").append("<table id='exhibit_dialog_content'></table>");
  jQuery("#exhibit_dialog_content").append("<tr><td>タイトル：</td><td>" + book.title + "</td></tr>");
  jQuery("#exhibit_dialog_content").append("<tr><td>カテゴリ：</td><td>" + book.genre + "</td></tr>");
  // 保留
  $('#dialog_affirmative').click(function() {
    console.log("dialogAffirmative");
    //$('#form1').submit();
  });
};
</script>
<!-- ============================================ -->
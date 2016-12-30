<div class="col-sm-12 admin"><div class="card-panel">
<!-- ============================================ -->
<!-- 出品画面 -->
<!-- ============================================ -->
<p>出品用ページ</p>

<div class="container_exhibit"><form method="get">

<!-- カテゴリ -->
<?php
  $genre = array("南山大学","名古屋大学","その他");
  foreach($genre as $k=>$v){
    $g_name = "group$k";
    echo "<p><input name='genre' type='radio' id='$g_name' value='$v' /><label for='$g_name'>$v</label></p>";
  }
?>

<!-- サブカテゴリ -->
<div class="input-field col s12">
<?php
  $subGenre = array("理工学部","経済学部","経営学部");
  echo "<select name='sub_category'>";
    echo "<option value='' disabled selected>学部を選んでください</option>";
    foreach($subGenre as $k=>$v) echo "<option value='$v'>$v</option>";
  echo "</select>";
  echo "<label class='label-color'>サブカテゴリを選んでください</label>";
?>
</div>

<!-- ISBN -->
<div class="input-field col s12">
  <input placeholder="ISBNを入力してください" id="ISBN" type="text" class="validate" name="isbn">
  <label for="ISBN" class="label-color">ISBN</label>
</div>

<!-- 取得ボタン -->
<div class="center margin-bottom">
  <button class="btn waves-effect waves-light amber darken-4" type="submit" name="action">送信</button>
</div>

</form></div>

<a href=<?= h($AmazonApiUrl) ?> >URL</a>

<p> 出品した本 : <?php echo $AmazonApiResult['TotalResults'] ?> </p>

<!-- テーブル出力 -->
<table>
<?php
foreach((array)$AmazonApiResult['dataList'] as $item) {
  $jsonItem = json_encode($item);
  echo "<tr>";
  echo "<td>" . $item["Title"] . "</td>";
  echo "<td>" . $item["Author"] . "</td>";
  echo "<td>" . $item["Publisher"] . "</td>";
  echo "<td><a class='show_submit_dialog' onclick='showSubmitDialog($jsonItem);'>確認</a></td>";
  echo "</tr>";

}
?>
</table>

<a class='show_submit_dialog' onclick='showSubmitDialog();'>ダイアログ表示</a>
<!-- ============================================ -->
<?php echo $this->element('baseDialog'); ?>
</div></div>

<!-- ============================================ -->
<!-- SCRIPT -->
<!-- ============================================ -->
<script language="javascript">
function showSubmitDialog(item = {}) {
  console.log("showSubmitDialog", item);
  jQuery("#dialog_header_text").text("登録確認");
  jQuery("#dialog_dismissive_text").text("CANCEL");
  jQuery("#dialog_affirmative_text").text("SUBMIT");
  // body部分
  jQuery("#dialog_body").empty();
  jQuery("#dialog_body").append("<div class='book'><img src=" + item.img + " class='book-picture'></div>");
  jQuery("#dialog_body").append("<table id='exhibit_dialog_content'></table>");
  jQuery("#exhibit_dialog_content").append("<tr><td>タイトル：</td><td>" + item.Title + "</td></tr>");
  jQuery("#exhibit_dialog_content").append("<tr><td>著者：</td><td>" + item.Author + "</td></tr>");
  // 保留
  $('#dialog_affirmative').click(function() {
    console.log("dialogAffirmative");
    //$('#form1').submit();
  });
};
</script>
<!-- ============================================ -->

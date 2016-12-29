<?php 
require "component/dialog.php";
?>

<div class="col-sm-12 admin"><div class="card-panel">
<!-- ============================================ -->
<!-- 本一覧画面 -->
<!-- ============================================ -->
<p>本一覧ページ</p>

<!-- 検索-->
<h1 class="searchfont">キーワード検索</h1>
 <nav class="searchcolor">
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>

<!-- ラジオボタン-->
<h1 class="searchfont">カテゴリ検索</h1>
<form action="#">
  <p>
    <input name="group1" type="radio" id="test1" />
    <label for="test1">南山大学</label>
  </p>
  <p>
    <input name="group1" type="radio" id="test2" />
    <label for="test2">名古屋大学</label>
  </p>
  <p>
    <input name="group1" type="radio" id="test3" />
    <label for="test3">その他</label>
  </p>
</form>
</br>

<!-- ドロップダウン-->
<div class="input-field col s12">
  <select>
    <option value="" disabled selected>大学を選んでください</option>
    <option value="1">理工学部</option>
    <option value="2">経済学部</option>
    <option value="3">経営学部</option>
  </select>
  <label>学科を選んでください</label>
</div>
</br>
</br>
<a class="waves-effect waves-light btn"><i class="material-icons left">repeat</i>検索</a>
</br>
</br>

<!-- booklist-->
<div class="boxContainer" >
  <div class="row">
    <div class="col s4 m6 l3">
      <div class="card box">
        <div class="card-image">
          <img src="http://images-jp.amazon.com/images/P/4864100829.09.LZZZZZZZ" >
        </div>
        <div class="card-contents">
        <span class="booklist-card-title">『夢をかなえるゾウ』</span>
          <p>
          著者：水野敬也</br>
          残り冊数：１冊</br>
          </p>
        </div>
        <div class="show_booklist_dialog">
          <a>取り引き完了</a>
        </div>
      </div>
    </div>
    <div class="col s4 m6 l3">
      <div class="card box">
        <div class="card-image">
          <img src="http://images-jp.amazon.com/images/P/4864100829.09.LZZZZZZZ" >
        </div>
        <div class="card-contents">
          <span class="booklist-card-title">『夢をかなえるゾウ』</span>
          <p>
          著者：水野敬也</br>
          残り冊数：１冊</br>
          </p>
        </div>
        <div class="show_booklist_dialog">
          <a>取り引き完了</a>
        </div>
      </div>
    </div>
    <div class="col s4 m6 l3">
      <div class="card box">
        <div class="card-image">
          <img src="http://images-jp.amazon.com/images/P/4864100829.09.LZZZZZZZ" >
        </div>
        <div class="card-contents">
          <span class="booklist-card-title">『夢をかなえるゾウ』</span>
          <p>
            著者：水野敬也</br>
            残り冊数：１冊</br>
          </p>
        </div>
        <div class="show_booklist_dialog">
          <a>取り引き完了</a>
        </div>
      </div>
    </div>
  </div>
</div>

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
jQuery(function () {
  jQuery("#dialog_header").text("タイトル");
  jQuery("#dialog_body").text("ボディ");
  console.log("aaa");
});
</script>
<div class="col-sm-12 admin"><div class="card-panel">
<!-- ============================================ -->
<!-- 本一覧画面 -->
<!-- ============================================ -->
<p>本一覧ページ</p>

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
</div></div>

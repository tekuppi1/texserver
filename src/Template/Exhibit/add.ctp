<div class="col-sm-12 admin"><div class="card-panel">
<!-- ============================================ -->
<!-- 出品画面 -->
<!-- ============================================ -->
<p>出品完了ページ</p>

<div>
出品完了しました。
<table>
<?php
    echo "<tr><td>画像：</td><td>". $item["img"] ."</td></tr>";
    echo "<tr><td>タイトル：</td><td>". $item["title"] ."</td></tr>";
    echo "<tr><td>著者：</td><td>". $item["author"] ."</td></tr>";
    echo "<tr><td>ISBN：</td><td>". $item["isbn"] ."</td></tr>";
?>
</table>
</div>

<!-- ============================================ -->
</div></div>

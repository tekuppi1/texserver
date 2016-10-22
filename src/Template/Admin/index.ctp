<?php 
require "components/header.php";
?>
<div class="col-sm-12 admin"><div class="card-panel">
<!-- ============================================ -->
<!-- 管理者用画面 -->
<!-- ============================================ -->
<p>管理者用ページ</p>

<div>
  こんにちは　<?= $auth->user('username') ?>　さん
</div>

<a class="waves-effect waves-light btn logout" href="/texserver/users/logout">ログアウト</a>

<!-- ============================================ -->
</div></div>

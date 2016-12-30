<?php 
//==========================================================
// サイドバー
?>

<div>

  <!-- ロゴ -->
  <a href="<?= $this->Url->build('/admin') ?>"><div class="logo">Texchange<br>管理者ページ</div></a>

  <!-- コンテンツボタン -->
  <div class="contents_button">
    <a href="<?= $this->Url->build('/exhibit') ?>"><div class="waves-effect waves-light">出品</div>
    <a href="<?= $this->Url->build('/huruplan') ?>"><div class="waves-effect waves-light">古本市予定入力</div>
    <a href="<?= $this->Url->build('/booklist') ?>"><div class="waves-effect waves-light">本管理</div>
    <a href="<?= $this->Url->build('/users/add') ?>"><div class="waves-effect waves-light">アカウント追加</div></a>
    <a href="<?= $this->Url->build('/config') ?>"><div class="waves-effect waves-light">設定</div></a>
  </div>

</div>

<?
//==========================================================
?>
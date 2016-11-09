<div class="row">

  <!-- =============================================================================== -->
  <!-- サイドバー -->
  <!-- =============================================================================== -->
  <div class="col-sm-2 tex_sidebar"><?php echo $this->element('side/viewSidebar'); ?></div>

  <!-- =============================================================================== -->
  <!-- メイン -->
  <!-- =============================================================================== -->
  <div class="col-sm-10 col-sm-offset-2 tex_main">
  
    <!-- ナビゲーションバー -->
    <?php echo $this->element('nav/viewNavigation'); ?>

    <!-- フラッシュ出力 -->
    <?= $this->Flash->render() ?>

    <!-- パスコンテンツ -->
    <div class="tex_pass_content"><?= $this->fetch('content') ?></div>

    <!-- メインコンテンツ -->
    <?php
      // ログイン前ならログイン画面以外は出さない。
      if($this->name != "Users") {
        echo $this->element('main/viewMain1');
        echo $this->element('main/viewMain2');
        echo $this->element('main/viewMain3');
      }
    ?>

  </div>

  <!-- =============================================================================== -->
  <!-- フッター -->
  <!-- =============================================================================== -->
  <footer></footer>

</div>






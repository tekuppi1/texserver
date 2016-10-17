<div class="row">

  <!-- =============================================================================== -->
  <!-- サイドバー -->
  <!-- =============================================================================== -->
  <div class="col-sm-2 col-md-1 tex_sidebar"><?php echo $this->element('side/viewSidebar'); ?></div>

  <!-- =============================================================================== -->
  <!-- メイン -->
  <!-- =============================================================================== -->
  <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 tex_main">
  
    <!-- ナビゲーションバー -->
    <?php echo $this->element('nav/viewNavigation'); ?>

    <!-- パスコンテンツ -->
    <div class="tex_pass_content"><?= $this->fetch('content') ?></div>

    <!-- メインコンテンツ -->
    <?php
      // 画面選択
      $VIEW_NUM = 1;
      switch($VIEW_NUM) {
        case 1 : echo $this->element('main/viewMain1'); break;
        case 2 : echo $this->element('main/viewMain2'); break;
        case 3 : echo $this->element('main/viewMain3'); break;
      }
    ?>

  </div>

  <!-- =============================================================================== -->
  <!-- フッター -->
  <!-- =============================================================================== -->
  <footer></footer>

</div>







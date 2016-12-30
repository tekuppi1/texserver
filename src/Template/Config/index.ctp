<!-- ============================================ -->
<!-- カテゴリ設定画面 -->
<!-- ============================================ -->
<div class="col-sm-9 category_setting"><div class="card-panel">
<p>カテゴリ設定</p>
<form action="" method="post">
<table class="striped">
  <thead><tr>
    <th class='table_id'>ID</th>
    <th>カテゴリ名</th>
    <th class='table_id'>親ID</th>
    <th>親カテゴリ名</th>
    <th class='table_submit'></th>
  </tr></thead>
  <tbody>
  <?php
    foreach($category as $cat) {
      echo "<tr>";
        echo "<td class='table_id'>". $cat['id'] ."</td>";
        echo "<td>". $cat['name'] ."</td>";
        echo "<td class='table_id'>". $cat['parent_id'] ."</td>";
        echo "<td>". $cat['parent_name'] ."</td>";
        echo "<td class='table_submit'></td>";
      echo "</tr>";
    }
    // 追加フォーム
    echo "<tr>";
      echo "<td class='table_id'></td>";
      echo "<td><input name='name' type='text'></td>";
      echo "<td class='table_id'><input name='parent_id' type='text'></td>";
      echo "<td></td>";
      echo "<td class='table_submit'><input class='waves-effect waves-light btn' type='submit' value='追加'></td>";
    echo "</tr>";
  ?>
  </tbody>
</table>
</form>
</div></div>

<!-- ============================================ -->
<!-- 設定画面 -->
<!-- ============================================ -->
<div class="col-sm-3 setting"><div class="card-panel">
<p>管理者設定</p>
<p>
  SUPER USER MODE
  <Button id="super_user_button" value="">
</p>
</div></div>
<!-- ============================================ -->
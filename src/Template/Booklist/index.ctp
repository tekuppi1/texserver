<div class="col-sm-12 admin"><div class="card-panel">
<!-- ============================================ -->
<!-- 本一覧画面 -->
<!-- ============================================ -->
<p>本一覧ページ</p>

<a href=<?= h($AmazonApiUrl) ?> >URL</a>

<p> 検索結果 : <?php echo $AmazonApiResult['TotalResults'] ?> </p>

<table>

<?php foreach($AmazonApiResult['dataList'] as $item) { ?>

  <tr>
    <td><?php echo $item["Title"] ?></td>
    <td><?php echo $item["Author"] ?></td>
    <td><?php echo $item["Publisher"] ?></td>
  </tr>

<?php } ?>

</table>
<!-- ============================================ -->
</div></div>

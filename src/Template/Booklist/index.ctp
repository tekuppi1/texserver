<div class="col-sm-12 admin"><div class="card-panel">
<!-- ============================================ -->
<!-- 本一覧画面 -->
<!-- ============================================ -->
<p>本一覧ページ</p>
<form method="get">
	<div class="search">
		<label for="input_book">Please input title or author and etc</label>
		<input type="text" name="keyword" placeholder="input bookinfo" id="input_book"/>
	</div>
	<div class="submit">
		<input type="submit" value="検索"/>
	</div>
</form>


<a href=<?= h($AmazonApiUrl) ?> >URL</a>

<p> 検索結果 : <?php echo $AmazonApiResult['TotalResults'] ?> </p>

<table>

<?php foreach((array)$AmazonApiResult['dataList'] as $item) { ?>

  <tr>
    <td><?php echo $item["Title"] ?></td>
    <td><?php echo $item["Author"] ?></td>
    <td><?php echo $item["Publisher"] ?></td>
  </tr>

<?php } ?>

</table>
<!-- ============================================ -->
</div></div>

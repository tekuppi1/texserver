<div class="col-sm-12"><div class="card-panel">
<!-- ============================================ -->
<!-- コンテンツ1 -->
<!-- ============================================ -->

<p>コンテンツ1</p>
<canvas id="myChart"></canvas>

<script>
let chartLabel = [];
let chartValue = [];
<?php
  foreach($chartData as $key=>$data):
    echo("chartLabel[".$key."] = '".$data->timeCreated."';");
    echo("chartValue[".$key."] = ".$data->count.";");
  endforeach; 
?>
</script>

<!-- ============================================ -->
</div></div>
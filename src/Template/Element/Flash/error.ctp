<?php
if (!isset($params['escape']) || $params['escape'] !== false) $message = h($message);
?>

<div class="message error" onclick="this.classList.add('hidden');">
  <div class="card red darken-1">
    <div class="card-content white-text">
    <p><?= $message ?></p>
    </div>
  </div>
</div>
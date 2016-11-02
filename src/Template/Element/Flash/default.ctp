<?php
$class = 'message';
if (!empty($params['class'])) $class .= ' ' .$params['class']."";
if (!isset($params['escape']) || $params['escape'] !== false) $message = h($message);
?>

<div class="<?= h($class) ?>" onclick="this.classList.add('hidden');">
  <div class="card blue-grey darken-1">
    <div class="card-content white-text">
    <p><?= $message ?></p>
    </div>
  </div>
</div>
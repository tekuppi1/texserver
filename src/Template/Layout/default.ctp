<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $cakeDescription ?>:<?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>

    <?php /* stylesheet */ ?>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <?= $this->Html->css('libs/bootstrap.min.css') ?>
    <?= $this->Html->css('libs/bootstrap-theme.min.css') ?>
    <?= $this->Html->css('libs/materialize.min.css') ?>
    <?= $this->Html->css('base.css') ?>

    <?php /* script */ ?>
    <?= $this->Html->script('libs/bootstrap.min.js') ?>
    <?= $this->Html->script('libs/jquery-3.1.1.min.js') ?>
    <?= $this->Html->script('libs/materialize.min.js') ?>
    <?= $this->Html->script('main.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <?php echo $this->element('body'); ?>
</body>
</html>

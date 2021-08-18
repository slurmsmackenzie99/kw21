<?php echo $this->Html->css(['bootstrap.min']) ?>
<?php echo $this->Html->script(['jquery.min','popper.min','bootstrap.min']); ?>
<?php $cakeDescription = 'Ksiegi Wieczyste';?>
<?= $this->Html->charset() ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
</title>
<?= $this->Html->meta('icon') ?>
<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
<?php echo $this->Html->css(['bootstrap.min']) ?>
<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
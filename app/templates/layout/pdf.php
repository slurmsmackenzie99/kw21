<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
           <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
</head>
<body>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
</body>
</html>
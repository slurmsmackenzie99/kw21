<?php echo $this->Html->css(['bootstrap.min']) ?>
<?php echo $this->Html->script(['jquery.min','popper.min','bootstrap.min']); ?>
<nav class="navbar navbar-expand-md navbar-light" style="background-color:#e3f2fd;">
    <a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'index']) ?>"
        class="navbar-brand"><b>Ksiegi wieczyste</b>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active">Home</a>
            <a href="#" class="nav-item nav-link">Profile</a>
            <a href="#" class="nav-item nav-link">Messages</a>
        </div>
        <div class="navbar-nav ml-auto">
            <?php if ($this->Identity->isLoggedIn()) { ?>
            <a class="nav-item nav-link"><?php echo ucwords($this->Identity->get('name'));?></a>
            <a href="<?php echo $this->Url->build(['controller'=>'Users','action'=>'logout']) ?>"  class="nav-item nav-link">Logout</a>
            <?php } else { ?>
            <a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'add']) ?>" class="nav-item nav-link">Sign Up</a>
            <a href="<?php echo $this->Url->build(['controller'=>'Users', 'action'=>'login']) ?>" class="nav-item nav-link">Login</a>
            <?php } ?>
        </div>
    </div>
</nav>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Getrecord $getrecord
 */
?>
<div class="container">
    <h3>Inserting csv records into the database</h3>
    <div class="row">
        <?php echo $this->Form->create($clientid, ['name'=>'enter_client',
            'enctype'=>'multipart/form-data']) ?>
        <div class="form-group">
            <?= $this->Form->control('client_id', ['type'=>'integer', 'class'=>'form-control','required'=>true]); ?>
        </div>
        <button type="submit" class="btn btn-success" style="float: right;">Save</button>
        <?php echo $this->Form->end() ?>
    </div>
</div>
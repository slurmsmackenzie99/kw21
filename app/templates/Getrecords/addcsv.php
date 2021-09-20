<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Getrecord $getrecord
 */
?>
<div class="container">
    <h3>Attach csv file here</h3>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php echo $this->Form->create() ?>
            <div class="form-group">
                <?= $this->Form->control('upload_file', ['type'=>'file', 'class'=>'form-control','required'=>true]); ?>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Save</button>
            <?php echo $this->Form->end() ?>
        </div>
</div>

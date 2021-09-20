<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Getrecord $getrecord
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Getrecords'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="getrecords form content">
            <?php echo $this->Form->create($csvEntity, ['name'=>'add_post', 'class'=>'was-validated',
                'enctype'=>'multipart/form-data']) ?>
            <div class="form-group">
                <?php echo $this->Form->control('id', ['type'=>'int', 'class'=>'form-control','placeholder'=>'Enter client id','required'=>true]);?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('csv_spreadsheet', ['type'=>'file', 'class'=>'form-control','required'=>true]); ?>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Save</button>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
</div>
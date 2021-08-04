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
            <?= $this->Form->create($getrecord) ?>
            <fieldset>
                <legend><?= __('Add Getrecord') ?></legend>
                <?php
                    echo $this->Form->control('region');
                    echo $this->Form->control('kw');
                    echo $this->Form->control('digit');
                    echo $this->Form->control('checked');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

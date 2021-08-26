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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $getrecord->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $getrecord->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Getrecords'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="getrecords form content">
            <?= $this->Form->create($getrecord) ?>
            <fieldset>
                <legend><?= __('Edit Getrecord') ?></legend>
                <?php
                    echo $this->Form->control('client_id', ['options' => $clients]);
                    echo $this->Form->control('region');
                    echo $this->Form->control('number');
                    echo $this->Form->control('control_number');
                    echo $this->Form->control('done');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

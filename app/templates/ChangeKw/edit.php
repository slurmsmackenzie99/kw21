<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChangeKw $changeKw
 * @var string[]|\Cake\Collection\CollectionInterface $getrecords
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $changeKw->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $changeKw->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Change Kw'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="changeKw form content">
            <?= $this->Form->create($changeKw) ?>
            <fieldset>
                <legend><?= __('Edit Change Kw') ?></legend>
                <?php
                    echo $this->Form->control('getrecord_id', ['options' => $getrecords, 'empty' => true]);
                    echo $this->Form->control('last_checked');
                    echo $this->Form->control('string_dzial_drugi');
                    echo $this->Form->control('counter');
                    echo $this->Form->control('md5');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sectiontwo $sectiontwo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sectiontwo->two],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sectiontwo->two), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sectiontwo'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sectiontwo form content">
            <?= $this->Form->create($sectiontwo) ?>
            <fieldset>
                <legend><?= __('Edit Sectiontwo') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ownership $ownership
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ownership->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ownership->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ownership'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ownership form content">
            <?= $this->Form->create($ownership) ?>
            <fieldset>
                <legend><?= __('Edit Ownership') ?></legend>
                <?php
                    echo $this->Form->control('numer_udzialu');
                    echo $this->Form->control('wielkosc_udzialu');
                    echo $this->Form->control('rodzaj_wspolnosci');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ksiega $ksiega
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ksiega'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ksiega form content">
            <?= $this->Form->create($ksiega) ?>
            <fieldset>
                <legend><?= __('Add Ksiega') ?></legend>
                <?php
                    echo $this->Form->control('region');
                    echo $this->Form->control('number');
                    echo $this->Form->control('control_number');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

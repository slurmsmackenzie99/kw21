<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientsKw $clientsKw
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Clients Kw'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clientsKw form content">
            <?= $this->Form->create($clientsKw) ?>
            <fieldset>
                <legend><?= __('Add Clients Kw') ?></legend>
                <?php
                    echo $this->Form->control('client_id', ['options' => $clients]);
                    echo $this->Form->control('getrecords_id', ['options' => $getrecords]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

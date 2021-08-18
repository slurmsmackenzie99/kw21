<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Treasury $treasury
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Treasury'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="treasury form content">
            <?= $this->Form->create($treasury) ?>
            <fieldset>
                <legend><?= __('Add Treasury') ?></legend>
                <?php
                    echo $this->Form->control('lista_wskazan');
                    echo $this->Form->control('nazwa');
                    echo $this->Form->control('siedziba');
                    echo $this->Form->control('regon');
                    echo $this->Form->control('stanprzejsciowy');
                    echo $this->Form->control('krs');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

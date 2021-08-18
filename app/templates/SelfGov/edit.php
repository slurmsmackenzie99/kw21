<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SelfGov $selfGov
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $selfGov->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $selfGov->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Self Gov'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="selfGov form content">
            <?= $this->Form->create($selfGov) ?>
            <fieldset>
                <legend><?= __('Edit Self Gov') ?></legend>
                <?php
                    echo $this->Form->control('ksiega_id');
                    echo $this->Form->control('nazwa');
                    echo $this->Form->control('siedziba');
                    echo $this->Form->control('regon');
                    echo $this->Form->control('nazwa_uprawnionego');
                    echo $this->Form->control('siedziba_uprawnionego');
                    echo $this->Form->control('regon_uprawnionego');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

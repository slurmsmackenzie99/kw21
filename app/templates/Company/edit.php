<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $company->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $company->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Company'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="company form content">
            <?= $this->Form->create($company) ?>
            <fieldset>
                <legend><?= __('Edit Company') ?></legend>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IndividualEntity $individualEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Individual Entity'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="individualEntity form content">
            <?= $this->Form->create($individualEntity) ?>
            <fieldset>
                <legend><?= __('Add Individual Entity') ?></legend>
                <?php
                    echo $this->Form->control('imie_pierwsze');
                    echo $this->Form->control('imie_drugie');
                    echo $this->Form->control('nazwisko');
                    echo $this->Form->control('drugi_cz_nazwiska');
                    echo $this->Form->control('imie_ojca');
                    echo $this->Form->control('imie_matki');
                    echo $this->Form->control('pesel');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

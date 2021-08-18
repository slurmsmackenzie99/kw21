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
            <?= $this->Html->link(__('Edit Ownership'), ['action' => 'edit', $ownership->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ownership'), ['action' => 'delete', $ownership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ownership->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ownership'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ownership'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ownership view content">
            <h3><?= h($ownership->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Rodzaj Wspolnosci') ?></th>
                    <td><?= h($ownership->rodzaj_wspolnosci) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ownership->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numer Udzialu') ?></th>
                    <td><?= $this->Number->format($ownership->numer_udzialu) ?></td>
                </tr>
                <tr>
                    <th><?= __('Wielkosc Udzialu') ?></th>
                    <td><?= $this->Number->format($ownership->wielkosc_udzialu) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

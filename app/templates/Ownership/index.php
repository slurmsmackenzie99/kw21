<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ownership[]|\Cake\Collection\CollectionInterface $ownership
 */
?>
<div class="ownership index content">
    <?= $this->Html->link(__('New Ownership'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ownership') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('numer_udzialu') ?></th>
                    <th><?= $this->Paginator->sort('wielkosc_udzialu') ?></th>
                    <th><?= $this->Paginator->sort('rodzaj_wspolnosci') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ownership as $ownership): ?>
                <tr>
                    <td><?= $this->Number->format($ownership->id) ?></td>
                    <td><?= $this->Number->format($ownership->numer_udzialu) ?></td>
                    <td><?= $this->Number->format($ownership->wielkosc_udzialu) ?></td>
                    <td><?= h($ownership->rodzaj_wspolnosci) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ownership->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ownership->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ownership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ownership->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

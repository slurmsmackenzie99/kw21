<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Getrecord[]|\Cake\Collection\CollectionInterface $getrecords
 */
?>
<div class="getrecords index content">
    <?= $this->Html->link(__('New Getrecord'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Getrecords') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('region') ?></th>
                    <th><?= $this->Paginator->sort('kw') ?></th>
                    <th><?= $this->Paginator->sort('digit') ?></th>
                    <th><?= $this->Paginator->sort('checked') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getrecords as $getrecord): ?>
                <tr>
                    <td><?= $this->Number->format($getrecord->id) ?></td>
                    <td><?= h($getrecord->region) ?></td>
                    <td><?= $this->Number->format($getrecord->kw) ?></td>
                    <td><?= $this->Number->format($getrecord->digit) ?></td>
                    <td><?= h($getrecord->checked) ?></td>
                    <td><?= h($getrecord->created) ?></td>
                    <td><?= h($getrecord->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $getrecord->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $getrecord->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $getrecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $getrecord->id)]) ?>
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

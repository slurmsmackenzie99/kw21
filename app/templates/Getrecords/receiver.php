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
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('region') ?></th>
                    <th><?= $this->Paginator->sort('number') ?></th>
                    <th><?= $this->Paginator->sort('control_number') ?></th>
                    <th><?= $this->Paginator->sort('done') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getrecords as $getrecord): ?>
                <tr>
                    <td><?= $this->Number->format($getrecord->id) ?></td>
                    <td><?= h($getrecord->client_id)
                    //$getrecord->has('client') ? $this->Html->link($getrecord->client->id, ['controller' => 'Clients', 'action' => 'view', $getrecord->client->id]) : '' 
                    ?></td>
                    <td><?= h($getrecord->region) ?></td>
                    <td><?= h($getrecord->number) ?></td>
                    <td><?= $this->Number->format($getrecord->control_number) ?></td>
                    <td><?= $this->Number->format($getrecord->done) ?></td>
                    <td><?= h($getrecord->created) ?></td>
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

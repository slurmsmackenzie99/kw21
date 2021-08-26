<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientsKw[]|\Cake\Collection\CollectionInterface $clientsKw
 */
?>
<div class="clientsKw index content">
    <?= $this->Html->link(__('New Clients Kw'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Clients Kw') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('getrecords_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientsKw as $clientsKw): ?>
                <tr>
                    <td><?= $this->Number->format($clientsKw->id) ?></td>
                    <td><?= $clientsKw->has('client') ? $this->Html->link($clientsKw->client->id, ['controller' => 'Clients', 'action' => 'view', $clientsKw->client->id]) : '' ?></td>
                    <td><?= $clientsKw->has('getrecord') ? $this->Html->link($clientsKw->getrecord->id, ['controller' => 'Getrecords', 'action' => 'view', $clientsKw->getrecord->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $clientsKw->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clientsKw->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clientsKw->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientsKw->id)]) ?>
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

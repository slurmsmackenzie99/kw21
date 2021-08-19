<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ksiega[]|\Cake\Collection\CollectionInterface $ksiega
 */
?>
<div class="ksiega index content">
    <?= $this->Html->link(__('New Ksiega'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ksiega') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('clientID') ?></th>
                    <th><?= $this->Paginator->sort('region') ?></th>
                    <th><?= $this->Paginator->sort('number') ?></th>
                    <th><?= $this->Paginator->sort('control_number') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ksiega as $ksiega): ?>
                <tr>
                    <td><?= $this->Number->format($ksiega->id) ?></td>
                    <td><?= $this->Number->format($ksiega->clientID) ?></td>
                    <td><?= h($ksiega->region) ?></td>
                    <td><?= $this->Number->format($ksiega->number) ?></td>
                    <td><?= $this->Number->format($ksiega->control_number) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ksiega->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ksiega->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ksiega->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ksiega->id)]) ?>
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

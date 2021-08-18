<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SelfGov[]|\Cake\Collection\CollectionInterface $selfGov
 */
?>
<div class="selfGov index content">
    <?= $this->Html->link(__('New Self Gov'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Self Gov') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ksiega_id') ?></th>
                    <th><?= $this->Paginator->sort('nazwa') ?></th>
                    <th><?= $this->Paginator->sort('siedziba') ?></th>
                    <th><?= $this->Paginator->sort('regon') ?></th>
                    <th><?= $this->Paginator->sort('nazwa_uprawnionego') ?></th>
                    <th><?= $this->Paginator->sort('siedziba_uprawnionego') ?></th>
                    <th><?= $this->Paginator->sort('regon_uprawnionego') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($selfGov as $selfGov): ?>
                <tr>
                    <td><?= $this->Number->format($selfGov->id) ?></td>
                    <td><?= $this->Number->format($selfGov->ksiega_id) ?></td>
                    <td><?= h($selfGov->nazwa) ?></td>
                    <td><?= h($selfGov->siedziba) ?></td>
                    <td><?= $this->Number->format($selfGov->regon) ?></td>
                    <td><?= h($selfGov->nazwa_uprawnionego) ?></td>
                    <td><?= h($selfGov->siedziba_uprawnionego) ?></td>
                    <td><?= h($selfGov->regon_uprawnionego) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $selfGov->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $selfGov->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $selfGov->id], ['confirm' => __('Are you sure you want to delete # {0}?', $selfGov->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChangeKw[]|\Cake\Collection\CollectionInterface $changeKw
 */
?>
<div class="changeKw index content">
    <?= $this->Html->link(__('New Change Kw'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Change Kw') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('getrecord_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($changeKw as $changeKw): ?>
                <tr>
                    <td><?= $this->Number->format($changeKw->id) ?></td>
                    <td><?= h($changeKw->getrecord_id)
                    //$changeKw->has('getrecord') ? $this->Html->link($changeKw->getrecord->id, ['controller' => 'Getrecords', 'action' => 'view', $changeKw->getrecord->id]) : '' 
                    ?></td>
                    
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $changeKw->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $changeKw->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $changeKw->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changeKw->id)]) ?>
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

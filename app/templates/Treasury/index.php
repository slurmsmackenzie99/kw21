<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Treasury[]|\Cake\Collection\CollectionInterface $treasury
 */
?>
<div class="treasury index content">
    <?= $this->Html->link(__('New Treasury'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Treasury') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('lista_wskazan') ?></th>
                    <th><?= $this->Paginator->sort('nazwa') ?></th>
                    <th><?= $this->Paginator->sort('siedziba') ?></th>
                    <th><?= $this->Paginator->sort('regon') ?></th>
                    <th><?= $this->Paginator->sort('stanprzejsciowy') ?></th>
                    <th><?= $this->Paginator->sort('krs') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($treasury as $treasury): ?>
                <tr>
                    <td><?= $this->Number->format($treasury->id) ?></td>
                    <td><?= $this->Number->format($treasury->lista_wskazan) ?></td>
                    <td><?= h($treasury->nazwa) ?></td>
                    <td><?= h($treasury->siedziba) ?></td>
                    <td><?= $this->Number->format($treasury->regon) ?></td>
                    <td><?= h($treasury->stanprzejsciowy) ?></td>
                    <td><?= $this->Number->format($treasury->krs) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $treasury->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $treasury->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $treasury->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treasury->id)]) ?>
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

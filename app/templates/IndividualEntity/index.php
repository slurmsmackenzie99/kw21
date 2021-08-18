<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IndividualEntity[]|\Cake\Collection\CollectionInterface $individualEntity
 */
?>
<div class="individualEntity index content">
    <?= $this->Html->link(__('New Individual Entity'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Individual Entity') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('imie_pierwsze') ?></th>
                    <th><?= $this->Paginator->sort('imie_drugie') ?></th>
                    <th><?= $this->Paginator->sort('nazwisko') ?></th>
                    <th><?= $this->Paginator->sort('drugi_cz_nazwiska') ?></th>
                    <th><?= $this->Paginator->sort('imie_ojca') ?></th>
                    <th><?= $this->Paginator->sort('imie_matki') ?></th>
                    <th><?= $this->Paginator->sort('pesel') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($individualEntity as $individualEntity): ?>
                <tr>
                    <td><?= $this->Number->format($individualEntity->id) ?></td>
                    <td><?= h($individualEntity->imie_pierwsze) ?></td>
                    <td><?= h($individualEntity->imie_drugie) ?></td>
                    <td><?= h($individualEntity->nazwisko) ?></td>
                    <td><?= h($individualEntity->drugi_cz_nazwiska) ?></td>
                    <td><?= h($individualEntity->imie_ojca) ?></td>
                    <td><?= h($individualEntity->imie_matki) ?></td>
                    <td><?= $this->Number->format($individualEntity->pesel) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $individualEntity->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $individualEntity->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $individualEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $individualEntity->id)]) ?>
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

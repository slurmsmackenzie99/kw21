<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sectiontwo[]|\Cake\Collection\CollectionInterface $sectiontwo
 */
?>
<div class="sectiontwo index content">
    <?= $this->Html->link(__('New Sectiontwo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sectiontwo') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('two') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sectiontwo as $sectiontwo): ?>
                <tr>
                    <td><?= $this->Number->format($sectiontwo->two) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sectiontwo->two]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sectiontwo->two]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sectiontwo->two], ['confirm' => __('Are you sure you want to delete # {0}?', $sectiontwo->two)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company[]|\Cake\Collection\CollectionInterface $company
 */
?>
<div class="company index content">
    <?= $this->Html->link(__('New Company'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Company') ?></h3>
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
                <?php foreach ($company as $company): ?>
                <tr>
                    <td><?= $this->Number->format($company->id) ?></td>
                    <td><?= $this->Number->format($company->lista_wskazan) ?></td>
                    <td><?= h($company->nazwa) ?></td>
                    <td><?= h($company->siedziba) ?></td>
                    <td><?= $this->Number->format($company->regon) ?></td>
                    <td><?= $this->Number->format($company->stanprzejsciowy) ?></td>
                    <td><?= $this->Number->format($company->krs) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $company->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $company->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?>
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

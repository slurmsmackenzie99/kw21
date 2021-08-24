<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Getrecord[]|\Cake\Collection\CollectionInterface $getrecords
 */
?>
<div class="getrecords receiver content">
<div class="table-responsive">
    <table>
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
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Getrecord $getrecord
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Getrecord'), ['action' => 'edit', $getrecord->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Getrecord'), ['action' => 'delete', $getrecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $getrecord->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Getrecords'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Getrecord'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="getrecords view content">
            <h3><?= h($getrecord->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $getrecord->has('client') ? $this->Html->link($getrecord->client->id, ['controller' => 'Clients', 'action' => 'view', $getrecord->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Region') ?></th>
                    <td><?= h($getrecord->region) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= h($getrecord->number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($getrecord->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Control Number') ?></th>
                    <td><?= $this->Number->format($getrecord->control_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Done') ?></th>
                    <td><?= $this->Number->format($getrecord->done) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Checked Records') ?></h4>
                <?php if (!empty($getrecord->checked_records)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Region') ?></th>
                            <th><?= __('Kw') ?></th>
                            <th><?= __('Digit') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($getrecord->checked_records as $checkedRecords) : ?>
                        <tr>
                            <td><?= h($checkedRecords->id) ?></td>
                            <td><?= h($checkedRecords->region) ?></td>
                            <td><?= h($checkedRecords->kw) ?></td>
                            <td><?= h($checkedRecords->digit) ?></td>
                            <td><?= h($checkedRecords->created) ?></td>
                            <td><?= h($checkedRecords->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CheckedRecords', 'action' => 'view', $checkedRecords->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CheckedRecords', 'action' => 'edit', $checkedRecords->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CheckedRecords', 'action' => 'delete', $checkedRecords->id], ['confirm' => __('Are you sure you want to delete # {0}?', $checkedRecords->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

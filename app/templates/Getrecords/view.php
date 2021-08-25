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
                    <th><?= __('ClientID') ?></th>
                    <td><?= $this->Number->format($getrecord->clientID) ?></td>
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
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientsKw $clientsKw
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Clients Kw'), ['action' => 'edit', $clientsKw->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Clients Kw'), ['action' => 'delete', $clientsKw->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientsKw->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Clients Kw'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Clients Kw'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clientsKw view content">
            <h3><?= h($clientsKw->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $clientsKw->has('client') ? $this->Html->link($clientsKw->client->id, ['controller' => 'Clients', 'action' => 'view', $clientsKw->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Getrecord') ?></th>
                    <td><?= $clientsKw->has('getrecord') ? $this->Html->link($clientsKw->getrecord->id, ['controller' => 'Getrecords', 'action' => 'view', $clientsKw->getrecord->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($clientsKw->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ksiega $ksiega
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Ksiega'), ['action' => 'edit', $ksiega->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ksiega'), ['action' => 'delete', $ksiega->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ksiega->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ksiega'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Ksiega'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ksiega view content">
            <h3><?= h($ksiega->idKsiega) ?></h3>
            <table>
                <tr>
                    <th><?= __('Region') ?></th>
                    <td><?= h($ksiega->region) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($ksiega->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('ClientID') ?></th>
                    <td><?= $this->Number->format($ksiega->clientID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= $this->Number->format($ksiega->number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Control Number') ?></th>
                    <td><?= $this->Number->format($ksiega->control_number) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

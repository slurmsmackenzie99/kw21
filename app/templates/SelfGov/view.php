<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SelfGov $selfGov
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Self Gov'), ['action' => 'edit', $selfGov->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Self Gov'), ['action' => 'delete', $selfGov->id], ['confirm' => __('Are you sure you want to delete # {0}?', $selfGov->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Self Gov'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Self Gov'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="selfGov view content">
            <h3><?= h($selfGov->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nazwa') ?></th>
                    <td><?= h($selfGov->nazwa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Siedziba') ?></th>
                    <td><?= h($selfGov->siedziba) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nazwa Uprawnionego') ?></th>
                    <td><?= h($selfGov->nazwa_uprawnionego) ?></td>
                </tr>
                <tr>
                    <th><?= __('Siedziba Uprawnionego') ?></th>
                    <td><?= h($selfGov->siedziba_uprawnionego) ?></td>
                </tr>
                <tr>
                    <th><?= __('Regon Uprawnionego') ?></th>
                    <td><?= h($selfGov->regon_uprawnionego) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($selfGov->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ksiega Id') ?></th>
                    <td><?= $this->Number->format($selfGov->ksiega_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Regon') ?></th>
                    <td><?= $this->Number->format($selfGov->regon) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

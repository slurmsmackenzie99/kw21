<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Treasury $treasury
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Treasury'), ['action' => 'edit', $treasury->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Treasury'), ['action' => 'delete', $treasury->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treasury->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Treasury'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Treasury'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="treasury view content">
            <h3><?= h($treasury->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nazwa') ?></th>
                    <td><?= h($treasury->nazwa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Siedziba') ?></th>
                    <td><?= h($treasury->siedziba) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stanprzejsciowy') ?></th>
                    <td><?= h($treasury->stanprzejsciowy) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($treasury->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lista Wskazan') ?></th>
                    <td><?= $this->Number->format($treasury->lista_wskazan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Regon') ?></th>
                    <td><?= $this->Number->format($treasury->regon) ?></td>
                </tr>
                <tr>
                    <th><?= __('Krs') ?></th>
                    <td><?= $this->Number->format($treasury->krs) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

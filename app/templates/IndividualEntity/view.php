<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IndividualEntity $individualEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Individual Entity'), ['action' => 'edit', $individualEntity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Individual Entity'), ['action' => 'delete', $individualEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $individualEntity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Individual Entity'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Individual Entity'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="individualEntity view content">
            <h3><?= h($individualEntity->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Imie Pierwsze') ?></th>
                    <td><?= h($individualEntity->imie_pierwsze) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imie Drugie') ?></th>
                    <td><?= h($individualEntity->imie_drugie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nazwisko') ?></th>
                    <td><?= h($individualEntity->nazwisko) ?></td>
                </tr>
                <tr>
                    <th><?= __('Drugi Cz Nazwiska') ?></th>
                    <td><?= h($individualEntity->drugi_cz_nazwiska) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imie Ojca') ?></th>
                    <td><?= h($individualEntity->imie_ojca) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imie Matki') ?></th>
                    <td><?= h($individualEntity->imie_matki) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($individualEntity->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pesel') ?></th>
                    <td><?= $this->Number->format($individualEntity->pesel) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

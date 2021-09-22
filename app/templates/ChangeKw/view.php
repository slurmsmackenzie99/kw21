<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChangeKw $changeKw
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Change Kw'), ['action' => 'edit', $changeKw->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Change Kw'), ['action' => 'delete', $changeKw->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changeKw->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Change Kw'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Change Kw'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="changeKw view content">
            <h3><?= h($changeKw->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Getrecord') ?></th>
                    <td><?= $changeKw->has('getrecord') ? $this->Html->link($changeKw->getrecord->id, ['controller' => 'Getrecords', 'action' => 'view', $changeKw->getrecord->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Md5') ?></th>
                    <td><?= h($changeKw->md5) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($changeKw->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Counter') ?></th>
                    <td><?= $this->Number->format($changeKw->counter) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Checked') ?></th>
                    <td><?= h($changeKw->last_checked) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('String Dzial Drugi') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($changeKw->string_dzial_drugi)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>

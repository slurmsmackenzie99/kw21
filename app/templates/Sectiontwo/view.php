<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sectiontwo $sectiontwo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sectiontwo'), ['action' => 'edit', $sectiontwo->two], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sectiontwo'), ['action' => 'delete', $sectiontwo->two], ['confirm' => __('Are you sure you want to delete # {0}?', $sectiontwo->two), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sectiontwo'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sectiontwo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sectiontwo view content">
            <h3><?= h($sectiontwo->two) ?></h3>
            <table>
                <tr>
                    <th><?= __('Two') ?></th>
                    <td><?= $this->Number->format($sectiontwo->two) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

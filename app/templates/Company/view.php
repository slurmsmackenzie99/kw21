<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $company->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Company'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Company'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Company'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="company view content">
            <h3><?= h($company->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nazwa') ?></th>
                    <td><?= h($company->nazwa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Siedziba') ?></th>
                    <td><?= h($company->siedziba) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($company->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lista Wskazan') ?></th>
                    <td><?= $this->Number->format($company->lista_wskazan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Regon') ?></th>
                    <td><?= $this->Number->format($company->regon) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stanprzejsciowy') ?></th>
                    <td><?= $this->Number->format($company->stanprzejsciowy) ?></td>
                </tr>
                <tr>
                    <th><?= __('Krs') ?></th>
                    <td><?= $this->Number->format($company->krs) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

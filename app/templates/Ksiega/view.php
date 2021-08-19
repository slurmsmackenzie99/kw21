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
            <?= $this->Html->link(__('Edit Ksiega'), ['action' => 'edit', $ksiega->idKsiega], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Ksiega'), ['action' => 'delete', $ksiega->idKsiega], ['confirm' => __('Are you sure you want to delete # {0}?', $ksiega->idKsiega), 'class' => 'side-nav-item']) ?>
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
                    <th><?= __('IdKsiega') ?></th>
                    <td><?= $this->Number->format($ksiega->idKsiega) ?></td>
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
            <div class="related">
                <h4><?= __('Related Self Gov') ?></h4>
                <?php if (!empty($ksiega->self_gov)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Ksiega Id') ?></th>
                            <th><?= __('Nazwa') ?></th>
                            <th><?= __('Siedziba') ?></th>
                            <th><?= __('Regon') ?></th>
                            <th><?= __('Nazwa Uprawnionego') ?></th>
                            <th><?= __('Siedziba Uprawnionego') ?></th>
                            <th><?= __('Regon Uprawnionego') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($ksiega->self_gov as $selfGov) : ?>
                        <tr>
                            <td><?= h($selfGov->id) ?></td>
                            <td><?= h($selfGov->ksiega_id) ?></td>
                            <td><?= h($selfGov->nazwa) ?></td>
                            <td><?= h($selfGov->siedziba) ?></td>
                            <td><?= h($selfGov->regon) ?></td>
                            <td><?= h($selfGov->nazwa_uprawnionego) ?></td>
                            <td><?= h($selfGov->siedziba_uprawnionego) ?></td>
                            <td><?= h($selfGov->regon_uprawnionego) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SelfGov', 'action' => 'view', $selfGov->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SelfGov', 'action' => 'edit', $selfGov->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SelfGov', 'action' => 'delete', $selfGov->id], ['confirm' => __('Are you sure you want to delete # {0}?', $selfGov->id)]) ?>
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

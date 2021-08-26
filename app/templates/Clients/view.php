<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Clients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Client'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clients view content">
            <h3><?= h($client->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($client->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($client->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Clients Kw') ?></h4>
                <?php if (!empty($client->clients_kw)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Getrecords Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($client->clients_kw as $clientsKw) : ?>
                        <tr>
                            <td><?= h($clientsKw->id) ?></td>
                            <td><?= h($clientsKw->client_id) ?></td>
                            <td><?= h($clientsKw->getrecords_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ClientsKw', 'action' => 'view', $clientsKw->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ClientsKw', 'action' => 'edit', $clientsKw->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ClientsKw', 'action' => 'delete', $clientsKw->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientsKw->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Getrecords') ?></h4>
                <?php if (!empty($client->getrecords)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Region') ?></th>
                            <th><?= __('Number') ?></th>
                            <th><?= __('Control Number') ?></th>
                            <th><?= __('Done') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($client->getrecords as $getrecords) : ?>
                        <tr>
                            <td><?= h($getrecords->id) ?></td>
                            <td><?= h($getrecords->client_id) ?></td>
                            <td><?= h($getrecords->region) ?></td>
                            <td><?= h($getrecords->number) ?></td>
                            <td><?= h($getrecords->control_number) ?></td>
                            <td><?= h($getrecords->done) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Getrecords', 'action' => 'view', $getrecords->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Getrecords', 'action' => 'edit', $getrecords->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Getrecords', 'action' => 'delete', $getrecords->id], ['confirm' => __('Are you sure you want to delete # {0}?', $getrecords->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Results') ?></h4>
                <?php if (!empty($client->results)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($client->results as $results) : ?>
                        <tr>
                            <td><?= h($results->id) ?></td>
                            <td><?= h($results->client_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Results', 'action' => 'view', $results->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Results', 'action' => 'edit', $results->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Results', 'action' => 'delete', $results->id], ['confirm' => __('Are you sure you want to delete # {0}?', $results->id)]) ?>
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

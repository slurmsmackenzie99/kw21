<?php
 /*
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
  *
 */
echo $this->Form->create(null, ['type'=>'get']);
echo $this->Form->control('id', ['label' => 'Search', 'value'=>$this->request->getQuery('id')]);
echo $this->Form->submit('Enter');
echo $this->Form->end();
?>

<div class="table-responsive">
    <table>
        <thead>
        <tr>
             <th><?= $this->Paginator->sort('id') ?></th>
<th><?= $this->Paginator->sort('username') ?></th>
<th class="actions"><?= __('Actions') ?></th>
</tr>
</thead>
<tbody>
<?php foreach ($client as $client): ?>
    <tr>
        <td><?= $this->Number->format($client->id) ?></td>
        <td><?= h($client->username) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $client->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $client->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

<h3>Getrecord</h3>
<div class="table-responsive">
    <table>
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('client_id') ?></th>
            <th><?= $this->Paginator->sort('region') ?></th>
            <th><?= $this->Paginator->sort('number') ?></th>
            <th><?= $this->Paginator->sort('control_number') ?></th>
            <th><?= $this->Paginator->sort('done') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($getrecord as $getrecord): ?>
            <tr>
                <td><?= $this->Number->format($getrecord->id) ?></td>
                <td><?= $this->Number->format($getrecord->client_id) ?></td>
                <td><?= h($getrecord->region) ?></td>
                <td><?= h($getrecord->number) ?></td>
                <td><?= $this->Number->format($getrecord->control_number) ?></td>
                <td><?= $this->Number->format($getrecord->done) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $getrecord->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $getrecord->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $getrecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $getrecord->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<h3>ChangeKw</h3>
<div class="table-responsive">
    <table>
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('getrecords_id') ?></th>
            <th><?= $this->Paginator->sort('last_checked') ?></th>
            <th><?= $this->Paginator->sort('string_dzial_drugi') ?></th>
            <th><?= $this->Paginator->sort('counter') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($changeKw as $changeKw): ?>
            <tr>
                <td><?= $this->Number->format($changeKw->id) ?></td>
                <td><?= $this->Number->format($changeKw->getrecords_id) ?></td>
                <td><?= h($changeKw->last_checked) ?></td>
                <td><?= h($changeKw->string_dzial_drugi) ?></td>
                <td><?= $this->Number->format($changeKw->counter) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $changeKw->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $changeKw->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $changeKw->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changeKw->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


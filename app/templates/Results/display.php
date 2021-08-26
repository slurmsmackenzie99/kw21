<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Result[]|\Cake\Collection\CollectionInterface $results
 */
?>
<div class="results client">
    <?php
//        echo $this->Form->input('clientID', array('label' => false, "class"=>"form-control input-medium", "placeholder" => __('ClientID'), 'id' => 'search'));
//        echo $this->Form->button("Submit");
    ?>
</div>
<div class="results clientID">
    <?php
    echo $this->Form->create($results, array('type'=>'get'));
    echo $this->Form->control('clientID');
    echo $this->Form->submit('Search');
    echo $this->Form->end();

//    echo $this->Form->input('results', array('placeholder' => __('Enter client ID'), 'id' => 'search'));
//    echo $this->Form->button();
//    echo $this->Form->end();
    ?>
</div>
<br>
<div class="results index content">
    <?= $this->Html->link(__('New Result'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Results') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('clientID') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $result): ?>
                <tr>
                    <td><?= $this->Number->format($result->id) ?></td>
                    <td><?= $this->Number->format($result->clientID) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $result->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $result->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $result->id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

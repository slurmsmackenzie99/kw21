<?php foreach ($change as $changeKw): ?>
<tr>
    <td>ID <?= $this->Number->format($changeKw->id) ?></td>
    <td>GETRECORD_ID <?= h($changeKw->getrecord_id)?></td>
</tr>
<?php endforeach; ?>

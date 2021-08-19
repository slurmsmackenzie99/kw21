<div style="position:relative" id="test">
    <div style="background-color:grey;left:0px;top:0px;position: fixed;width:100%;height:100%;color:black;z-index:100;" id="test">
    <div><textarea><?= $encoded ?></textarea></div>
<div class="table-responsive">
        <table id="api_data">
            <tbody>
                <?php foreach ($ksiega as $item): ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->clientID ?></td>
                    <td><?= $item->region ?></td>
                    <td><?= $item->number ?></td>
                    <td><?= $item->control_number ?></td>
                    <td class="json"><?= json_encode($item); //JSON representation of a value ?></td>
                    <td class="actions">
                        <button>Click me</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

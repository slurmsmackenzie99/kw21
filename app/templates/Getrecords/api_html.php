<div style="position:relative" id="test">
    <div style="background-color:white;left:0px;top:0px;position: fixed;width:100%;height:100%;color:red;z-index:100;" id="test">
    <div><textarea><?= $encoded ?></textarea></div>
        <?php echo "aab" ?>
<div class="table-responsive">
        <table id="api_data">
            <tbody>
                <?php foreach ($getrecords as $item): ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->region ?></td>
                    <td><?= $item->kw ?></td>
                    <td><?= $item->digit ?></td>
                    <td class="json"><?= json_encode($item); //JSON representation of a value ?></td>
                    <td class="actions">
                        <button>show this</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

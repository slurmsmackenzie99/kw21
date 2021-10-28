<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Getrecord $getrecord
 */

?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="getrecords form content">
            <?php echo $this->Form->create($csvEntity, ['name' => 'add_post', 'class' => 'was-validated',
                'enctype' => 'multipart/form-data']) ?>
            <div class="form-group">
                <h4>Wybierz email klienta, którego csv chciałbyś dodać</h4>
                <?php
                echo $this->Form->select('id', $clientsKeyValue);
                //echo $this->Form->control('id', $clientsKeyValue);
                ?>
                <h5>Jeśli klienta nie ma na liście przejdź <b><a href="https://kw21.g12.pw/clients/add">tutaj</a></b> aby dodać nowego<h5>
            </div>
            <div class="form-group">
                <br>    </br>
                <h4>Załącz plik z danymi</h4>
                <?= $this->Form->control('csv_spreadsheet', ['type' => 'file', 'class' => 'form-control', 'required' => true, 'label' => false]); ?>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Save</button>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
</div>

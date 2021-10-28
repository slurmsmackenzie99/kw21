<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Getrecord $getrecord
 * @var \App\Model\Entity\Changekw $changekw
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="changekw form content"
            <h4>Wybierz email klienta</h4>
            <?php
//            echo $this->Form->create('client', ['name' => 'add_post', 'class' => 'was-validated',
//                'enctype' => 'multipart/form-data']);
            //                echo $this->Form->select('id', $clientsKeyValue);
            ?>
            <div class="form-group">
                <?php
                echo $this->Form->create();
                echo $this->Form->select('id', $clientsKeyValue);
                ?>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Generuj raport dla danego klienta</button>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="column-responsive column-80">
        <div class="changekw form content"
        <h4>Generuj raport dla wszystkich klientów</h4>
        <?php
        //            echo $this->Form->create('client', ['name' => 'add_post', 'class' => 'was-validated',
        //                'enctype' => 'multipart/form-data']);
        //                echo $this->Form->select('id', $clientsKeyValue);
        ?>
        <div class="form-group">
            <?php
//            echo $this->Form->select('id', $clientsKeyValue);
            ?>
        </div>
        <button type="submit" class="btn btn-success" style="float: right;">Generuj raport dla wszystkich klientów</button>
        <?php echo $this->Form->end() ?>
    </div>
</div>
</div>

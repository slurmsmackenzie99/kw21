<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ksiega[]|\Cake\Collection\CollectionInterface $ksiega
 */
?>
<div class="ksiega form content">
    <?= $this->Form->create() ?>
    <?php $document = null; 
    $user_id = '';
    ?>
    <div class="column-responsive column-80">
    <fieldset>
        <legend><?= __('Upload CSV file') ?></legend>
        <?php
            echo $this->Form->create($document, ['type' => 'file']); //to Ksiega controller, document entity???
            echo $this->Form->file('submittedfile');
            
            // $targetPath = WWW_ROOT. 'document'. DS . 'csv_file'. DS.;
        ?>

        <legend><?= __('Enter your ID') ?></legend>
        <?php
            echo $this->Form->text($user_id); //to Ksiega controller
            // echo $this->Form->file('submittedfile');
        ?>
    </fieldset>
    </div>
    <?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->end() ?>
</div>
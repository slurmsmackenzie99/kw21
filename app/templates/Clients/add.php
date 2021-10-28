<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('Lista klientów'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clients form content">
            <?= $this->Form->create($client) ?>
            <fieldset>
                <h4>Dodaj klienta</h4>
                    <?=  $this->Form->control('username', [
                        'label' => 'Imię'
                    ]); ?>
                    <?=  $this->Form->control('last_name', [
                        'label' => 'Nazwisko'
                    ]); ?>
                    <?=  $this->Form->control('client_email', [
                        'label' => 'E-mail'
                    ]); ?>
                    <?=  $this->Form->control('telephone_number', [
                        'label' => 'Numer telefonu'
                    ]); ?>
                    <?=  $this->Form->control('company_name', [
                        'label' => 'Nazwa firmy'
                    ]); ?>
                
            </fieldset>
            <?= $this->Form->button(__('Dodaj')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

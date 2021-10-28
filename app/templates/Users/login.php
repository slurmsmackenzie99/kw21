<!-- in /templates/Users/login.php -->
<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Zaloguj się</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Wpisz dane logowania') ?></legend>
        <?= $this->Form->control('email', ['required' => true, 'label' => 'Imię']) ?>
        <?= $this->Form->control('password', ['required' => true, 'label' => 'Hasło']) ?>
    </fieldset>
    <?= $this->Form->submit(__('Zaloguj się')); ?>
    <?= $this->Form->end() ?>
</div>

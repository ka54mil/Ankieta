<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['url' => ['controller' => 'Auth', 'action' => 'register']]) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control( __('username'));
            echo $this->Form->control(__('password'));
            echo $this->Form->control(__('email'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('usercode');
            echo $this->Form->input('title');
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('email');
            echo $this->Form->input('phone');
            echo $this->Form->input('lineid');
            echo $this->Form->input('fax');
            echo $this->Form->input('isactive');
            echo $this->Form->input('isverify');
            echo $this->Form->input('islocked');
            echo $this->Form->input('iscustomer');
            echo $this->Form->input('isseller');
            echo $this->Form->input('gender');
            echo $this->Form->input('verifycode');
            echo $this->Form->input('position');
            echo $this->Form->input('pic_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

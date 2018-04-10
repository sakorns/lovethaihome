<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usercode') ?></th>
            <td><?= h($user->usercode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($user->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($user->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($user->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($user->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lineid') ?></th>
            <td><?= h($user->lineid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= h($user->fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verifycode') ?></th>
            <td><?= h($user->verifycode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($user->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pic Name') ?></th>
            <td><?= h($user->pic_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($user->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Isactive') ?></h4>
        <?= $this->Text->autoParagraph(h($user->isactive)); ?>
    </div>
    <div class="row">
        <h4><?= __('Isverify') ?></h4>
        <?= $this->Text->autoParagraph(h($user->isverify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Islocked') ?></h4>
        <?= $this->Text->autoParagraph(h($user->islocked)); ?>
    </div>
    <div class="row">
        <h4><?= __('Iscustomer') ?></h4>
        <?= $this->Text->autoParagraph(h($user->iscustomer)); ?>
    </div>
    <div class="row">
        <h4><?= __('Isseller') ?></h4>
        <?= $this->Text->autoParagraph(h($user->isseller)); ?>
    </div>
    <div class="row">
        <h4><?= __('Gender') ?></h4>
        <?= $this->Text->autoParagraph(h($user->gender)); ?>
    </div>
</div>

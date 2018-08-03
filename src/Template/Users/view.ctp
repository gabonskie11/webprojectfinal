<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    <li class="heading"><?= __('User Dashboard') ?></li>
        <li><?= $this->Html->link(__('Active Users'), ['action' => 'activeusers']) ?></li>
        <li><?= $this->Html->link(__('Pending Users'), ['action' => 'pendingusers']) ?></li>
        <li><?= $this->Html->link(__('Disabled Users'), ['action' => 'disabledusers']) ?></li>
        <li class="heading"><?= __('Jobs Dashboard') ?></li>
        <li><?= $this->Html->link(__('Approved Jobs'), ['controller'=>'jobs', 'action' => 'approvedjobs']) ?></li>
        <li><?= $this->Html->link(__('Pending Jobs'), ['controller'=>'jobs', 'action' => 'pendingjobs']) ?></li>
    </ul>
</nav>
<div class="users view large-10 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($user->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Created') ?></th>
            <td><?= h($user->date_created) ?></td>
        </tr>
    </table>
</div>

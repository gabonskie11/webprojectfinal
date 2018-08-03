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
<div class="users form large-10 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->select('role',['resume' => 'Resume', 'company'=> 'Company']);
            echo $this->Form->hidden('date_created', array('value' => date('Y-m-d')));
            echo $this->Form->hidden('status', array('value' => 'Pending'));
            /*echo $this->Form->control('role');
            echo $this->Form->control('status');
            echo $this->Form->control('date_created');*/
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

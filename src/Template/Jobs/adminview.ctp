<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Active Users'), ['controller'=>'users', 'action' => 'activeusers']) ?></li>
        <li><?= $this->Html->link(__('Pending Users'), ['controller'=>'users', 'action' => 'pendingusers']) ?></li>
        <li><?= $this->Html->link(__('Disabled Users'), ['controller'=>'users', 'action' => 'disabledusers']) ?></li>
        <li class="heading"><?= __('Jobs Dashboard') ?></li>
        <li><?= $this->Html->link(__('Approved Jobs'), ['action' => 'approvedjobs']) ?></li>
        <li><?= $this->Html->link(__('Pending Jobs'), ['action' => 'pendingjobs']) ?></li>
    </ul>
</nav>
<div class="jobs view large-10 medium-8 columns content">
    <h3><?= h($job->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($job->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($job->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Content') ?></th>
            <td><?= h($job->content) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No of Views') ?></th>
            <td><?= h($job->no_views) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No of Impressions') ?></th>
            <td><?= h($job->no_impression) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No of Apply') ?></th>
            <td><?= h($job->no_apply) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Created') ?></th>
            <td><?= h($job->date_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start') ?></th>
            <td><?= h($job->start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expire') ?></th>
            <td><?= h($job->expire) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($job->status) ?></td>
        </tr>
    
    </table>
</div>

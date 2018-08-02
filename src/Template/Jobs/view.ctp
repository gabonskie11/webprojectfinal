<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Apply a Job'), ['action' => 'resumeindex']) ?> </li>
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
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($job->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($job->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Apply') ?></th>
            <td><?= $this->Number->format($job->no_apply) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Impression') ?></th>
            <td><?= $this->Number->format($job->no_impression) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Views') ?></th>
            <td><?= $this->Number->format($job->no_views) ?></td>
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
    </table>
</div>

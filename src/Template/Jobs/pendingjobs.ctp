<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    <li class="heading"><?= __('Users Dashboard') ?></li>
        <li><?= $this->Html->link(__('Active Users'), ['controller'=>'users', 'action' => 'activeusers']) ?></li>
        <li><?= $this->Html->link(__('Pending Users'), ['controller'=>'users', 'action' => 'pendingusers']) ?></li>
        <li><?= $this->Html->link(__('Disabled Users'), ['controller'=>'users', 'action' => 'disabledusers']) ?></li>
        <li class="heading"><?= __('Jobs Dashboard') ?></li>
        <li><?= $this->Html->link(__('Approved Jobs'), ['action' => 'approvedjobs']) ?></li>
        <li><?= $this->Html->link(__('Pending Jobs'), ['action' => 'pendingjobs']) ?></li>
    </ul>
</nav>
<div class="jobs index large-10 medium-10 columns content">
    <h3><?= __('Jobs Dashboard for Admin') ?></h3>
        <?= $this->Form->create("", ['type'=> 'get']); ?>
        <h5>Search Job Title </h5>
        <?= $this->Form->control('keyword', ['default'=> $this->request->query('keyword')]); ?>
        <?= $this->Form->button(__('Search')) ?>
    <?= $this->Form->end(); ?>
    <table cellpadding="4" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('content') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_apply') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_impression') ?></th>
                <th scope="col"><?= $this->Paginator->sort('no_views') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expires') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?= $this->Html->link(($job->title), ['action'=> 'view', $job->id]) ?></td>
                <td><?= h($job->email) ?></td>
                <td><?= $this->Html->link(($job->content), ['action'=> 'view', $job->id]) ?></td>
                <td><?= $this->Number->format($job->no_apply) ?></td>
                <td><?= $this->Number->format($job->no_impression) ?></td>
                <td><?= $this->Number->format($job->no_views) ?></td>
                <td><?= h($job->date_created) ?></td>
                <td><?= h($job->start) ?></td>
                <td><?= h($job->expire) ?></td>
                <td><?= h($job->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Approve'), ['action' => 'approve', $job->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

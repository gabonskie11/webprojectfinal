<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Job Monitoring'), ['action' => 'companyindex']) ?></li>
        <li><?= $this->Html->link(__('Post a job'), ['action' => 'postjob']) ?></li>
    </ul>
</nav>
<div class="jobs index large-10 medium-8 columns content">
    <h3><?= __('Jobs') ?></h3>
        <?= $this->Form->create("", ['type'=> 'get']); ?>
        <h5>Search Job Title </h5>
        <?= $this->Form->control('keyword', ['default'=> $this->request->query('keyword')]); ?>
        <?= $this->Form->button(__('Search')) ?>
    <?= $this->Form->end(); ?>
    <table cellpadding="0" cellspacing="0">
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
                <th scope="col"><?= $this->Paginator->sort('expire') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?= $this->Html->link(($job->title), ['action'=> 'companyview', $job->id]) ?></td>
                <td><?= h($job->email) ?></td>
                <td><?= h($job->content) ?></td>
                <td><?= $this->Number->format($job->no_apply) ?></td>
                <td><?= $this->Number->format($job->no_impression) ?></td>
                <td><?= $this->Number->format($job->no_views) ?></td>
                <td><?= h($job->date_created) ?></td>
                <td><?= h($job->start) ?></td>
                <td><?= h($job->expire) ?></td>
                <td><?= h($job->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'companyedit', $job->id]) ?>
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

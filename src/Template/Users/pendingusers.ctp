<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
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
<div class="users index large-10 medium-8 columns content">
    <?= $this->Form->create("", ['type'=> 'get']); ?>
        <h6>Search by User's Name</h6>
        <?= $this->Form->control('keyword', ['default'=> $this->request->query('keyword')]); ?>
        <?= $this->Form->button(__('Search')) ?>
    <?= $this->Form->end(); ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Html->link(($user->username), ['action'=> 'view', $user->id]) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->role) ?></td>
                <td><?= h($user->status) ?></td>
                <td><?= h($user->date_created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Approve'), ['action' => 'approve', $user->id]) ?>
                    <?= $this->Form->postLink(__('Disable'), ['action' => 'disable', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
?>
<div class="jobs index large-12 medium-8 columns content">
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
                <th scope="col"><?= $this->Paginator->sort('content') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
            <tr>
               
                <td><?= $this->Html->link(($job->title), ['action'=> 'resumeview', $job->id]) ?></td>
                <td><?= h($job->content) ?></td>

                <td class="actions">
                <?= $this->Form->postLink(__('Apply'), ['action' => 'apply', $job->id], ['confirm' => __('Apply to this job # {0}?', $job->id)]) ?>
                    
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

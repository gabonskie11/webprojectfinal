<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Apply a job'), ['action' => 'resumeindex', $job->id]) ?> </li>
        
    </ul>
</nav>
<div class="jobs view large-9 medium-8 columns content">
    <h3><?= h($job->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($job->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Content') ?></th>
            <td><?= h($job->content) ?></td>
        </tr>

    </table>

    <?= $this->Form->postLink(__('Apply'), ['action' => 'apply', $job->id], ['confirm' => __('Apply to this job # {0}?', $job->id)]) ?>
</div>

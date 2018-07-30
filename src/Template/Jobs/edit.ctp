<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $job->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="jobs form large-9 medium-8 columns content">
    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Edit Job') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('email');
            echo $this->Form->control('content');
            echo $this->Form->hidden('start', array('value' => $currentdatetime = date('Y-m-d')));
            echo $this->Form->hidden('expire', array('value' => $currentdatetime = date('Y-m-d', strtotime('+1 month'))));
            echo $this->Form->hidden('status', array('value'=> 'Approved'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Aprrove')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 * @var $currentdatetime
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Job Monitoring'), ['action' => 'companyindex']) ?></li>
    </ul>
</nav>
<div class="jobs form large-10 medium-8 columns content">
    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Add a Job') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('email');
            echo $this->Form->control('content');
            echo $this->Form->hidden('no_apply', array('value' => '0'));
            echo $this->Form->hidden('no_impression', array('value' => '0'));
            echo $this->Form->hidden('no_views', array('value' => '0'));
            echo $this->Form->hidden('date_created', array('value' => date('Y-m-d')));
            echo $this->Form->hidden('status', array('value' => 'Pending'));
            //echo $this->Form->hidden('posted_by', array('value' => User($id)));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

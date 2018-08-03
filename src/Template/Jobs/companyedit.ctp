<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Jobs Lists'), ['action' => 'companyindex']) ?></li>
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
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Edit')) ?>
    <?= $this->Form->end() ?>
</div>

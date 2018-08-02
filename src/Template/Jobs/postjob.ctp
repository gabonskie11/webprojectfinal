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
        <li><?= $this->Html->link(__('Job Lists'), ['action' => 'companyindex']) ?></li>

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
            //echo $this->Form->hidden('posted_by', array('value' => User($id)));
        ?>
        <?php   $session = $this->request->session(); // less than 3.5
        // $session = $this->request->getSession(); // 3.5 or more
        $user_data = $session->read('Auth.User');
        if(!empty($user_data)){
            print_r($user_id);
  }?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

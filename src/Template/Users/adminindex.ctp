<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Active User'), ['action' => 'activeusers']) ?></li>
        <li><?= $this->Html->link(__('Pending User'), ['action' => 'pendingusers']) ?></li>
        <li><?= $this->Html->link(__('Job List Dashboard'), ['controller'=>'jobs', 'action' => 'approvedjobs']) ?></li>
    </ul>
</nav>
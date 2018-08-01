<br>

<div class= "index large-4 medium-4 large-offset-4 medium-offset-4 colums">
    <div class="panel">
        <h2 class="text-center">Resume Registration</h2>
        <?= $this->Form->create(); ?>
        <?= $this->Form->input('username'); ?>
        <?=$this->Form->input('password', array('type' => 'password')); ?>
        <?= $this->Form->input('name'); ?>
        <?= $this->Form->input('email'); ?>
        <?= $this->Form->hidden('date_created', array('value' => date('Y-m-d')));?>
        <?= $this->Form->hidden('role', array('value' => 'resume') )?>
        <?= $this->Form->hidden('status', array('value' => 'Pending') )?>
        <?= $this->Form->submit('Register', array('class' => 'button')); ?>
        <?= $this->Form->end(); ?>
    </div>
</div>
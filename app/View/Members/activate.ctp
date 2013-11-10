
<?php echo $this->element('activate', array(), array('plugin' => 'SignMeUp')); ?>


<?php /*?><h2>Activate Your Account</h2>
<p>Please paste your activation code below:</p>
<?php
echo $this->Form->create();
echo $this->Form->input('activation_code');
echo $this->Form->end('Activate Account');<?php */?>



<?php /*?>Welcome <?php echo $user['username']; ?>,

In order to get started please click on the following link to activate your account:

<?php echo Router::url(array('action' => 'activate', 'activation_code' => $user['activation_code']), true)."\n"; ?>

We look forward to seeing you!
Regards,
MyDomain.com Staff<?php */?>
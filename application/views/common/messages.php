<?php $messages = $this->session->flashdata('messages');; ?>

<?php if(count($messages) > 0 && count($errors) == 0) { ?>
<div style="border:1px; color:green;">
<ul class="messages">
<?php foreach($messages as $key => $message){ ?>
	<li><?php echo $message; ?></li>
<?php } ?>
</ul>
</div>
<?php } ?>
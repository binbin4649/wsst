<?php
/**
 * メールフォーム
 * 呼出箇所：メールフォーム
 */
 
/*
 // ログインしていたら、name, email フィールドを入れておく
 if(!empty($user) && !empty($mailFields)){
	 foreach($mailFields as $key=>$field){
		 if($field['MailField']['field_name'] == 'name'){
			$mailFields[$key]['MailField']['default_value'] = $user['name']; 
		 }
		 if($field['MailField']['field_name'] == 'email'){
			$mailFields[$key]['MailField']['default_value'] = $user['email']; 
		 }
	 }
 }
*/
?>

<h1 class="h5 border-bottom py-3 mb-4 mb-md-5 text-secondary"><?php $this->BcBaser->contentsTitle() ?></h1>
<div class="my-3">
	<?php if ($this->Mail->descriptionExists()): ?>
		<div class="my-3"><?php $this->Mail->description() ?></div>
	<?php endif ?>
	
	<div class="my-3">
		<?php $this->BcBaser->flash() ?>
		<!-- /Elements/mail_form.php -->
		<?php $this->BcBaser->element('mail_form') ?>
	</div>
</div>
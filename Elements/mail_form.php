<?php
/**
 * [PUBLISH] フォーム
 */
// ブラウザのヒストリーバック（戻るボタン）対応
//$this->Mail->token();
$this->BcBaser->element('mail_token');
?>

<script type="text/javascript">
	$(function(){
		$(".form-submit").click(function(){
			var mode = $(this).attr('id').replace('BtnMessage', '');
			$("#MailMessageMode").val(mode);
			return true;
		});
	});
</script>


<?php /* フォーム開始タグ */ ?>
<?php if (!$freezed): ?>
	<?php echo $this->Mailform->create('MailMessage', array('url' => $this->BcBaser->getContentsUrl(null, false, null, false) . 'confirm', 'type' => 'file', 'class'=>'mx-lg-5')) ?>
<?php else: ?>
	<?php echo $this->Mailform->create('MailMessage', array('url' => $this->BcBaser->getContentsUrl(null, false, null, false)  . 'submit', 'class'=>'mx-lg-5')) ?>
<?php endif; ?>
<?php /* フォーム本体 */ ?>

<?php $this->Mailform->unlockField('MailMessage.mode') ?>
<?php echo $this->Mailform->hidden('MailMessage.mode') ?>

	<?php $this->BcBaser->element('mail_input', array('blockStart' => 1)) ?>

<?php if ($mailContent['MailContent']['auth_captcha']): ?>
	<?php if (!$freezed): ?>
		<div class="auth-captcha clearfix">
			<?php echo $this->Mailform->authCaptcha('MailMessage.auth_captcha') ?>
			<br />
			&nbsp;<?php echo __('画像の文字を入力してください') ?><br clear="all" />
			<?php echo $this->Mailform->error('MailMessage.auth_captcha', __('入力された文字が間違っています。入力をやり直してください。')) ?>
		</div>
	<?php else: ?>
		<?php echo $this->Mailform->hidden('MailMessage.auth_captcha') ?>
		<?php echo $this->Mailform->hidden('MailMessage.captcha_id') ?>
	<?php endif ?>
<?php endif ?>

<?php /* 送信ボタン */ ?>
<div class="text-center my-5">
	<?php if ($freezed): ?>
		<button type="submit" class="btn btn-outline-secondary mr-3 form-submit btn-e" id="BtnMessageBack">　戻る　</button>
		<button type="submit" class="btn btn-primary form-submit btn-e" id="BtnMessageSubmit">　送信　</button>
	<?php else: ?>
		<button type="submit" class="btn btn-primary form-submit btn-e" id="BtnMessageConfirm">　確認　</button>
	<?php endif; ?>
</div>

<?php echo $this->Mailform->end() ?>

<script type="text/javascript">
$(document).ready(function(){
	$('input[type="submit"]').prop('disabled', true);
});
<?php if($this->request->is('ajax')): ?>
$(document).ready(function(){
<?php else: ?>
$(window).on('load',function(){
<?php endif ?>
	var getTokenUrl = '<?php echo $this->BcBaser->getUrl('/bc_form/ajax_get_token?requestview=false') ?>';
	$.ajaxSetup({cache: false});
	$.get(getTokenUrl, function(result) {
		$('input[name="data[_Token][key]"]').val(result);
		$('input[type="submit"]').removeAttr('disabled');
	});
});
</script>
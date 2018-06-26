
<h1 class="h5 border-bottom py-3 mb-4 mb-md-5 text-secondary"><?php echo $this->request->params['Content']['title'] ?></h1>

<div class="container">
<section class="mt-2 mx-1">
	<?php if($children): ?>
	<dl class="row">
		<?php foreach($children as $child): ?>
		<dt class="col-sm-2 text-md-right text-muted"><i class="fas fa-arrow-right"></i></dt>
		<dd class="col-sm-10">
		<?php $this->BcBaser->link($child['Content']['title'], $child['Content']['url'], array('class'=>'a-dub')) ?>
		<?php endforeach ?>
		</dd>
	</dl>
	<?php endif ?>
</section>
</div>

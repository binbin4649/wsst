<?php
/**
 * [PUBLISH] サイトマップ
 * @var BcAppView $this
 */

/* 2階層まで。
if (!isset($level)) {
	$level = 1;
}
*/
if(!isset($currentId)) {
	$currentId = null;
}
?>
<div class="collapse navbar-collapse justify-content-end bg-light" id="navbarCollapse">
  <?php if (isset($tree)): ?>
    <ul class="navbar-nav">
  	<?php foreach ($tree as $content): ?>
  		<?php 
	  		$options = [];
	  		if(!empty($content['Content']['exclude_menu'])) continue;
	  		$liClass = 'nav-item';
	  		if (!empty($content['children'])){
		  		$liClass .= ' dropdown';
		  		$isDropdown = true;
		  	}else{
			  	$isDropdown = false;
			  	$options = ['class' => 'nav-link'];
		  	}
		  	if($content['Content']['id'] == $currentId || $this->BcBaser->isContentsParentId($currentId, $content['Content']['id'])) {
			  	$liClass .= ' active';
		  	}
		  	if(!empty($content['Content']['blank_link'])) {
				$options = ['target' => '_blank'];
			}
	  	?>
  		<li class="<?php echo $liClass ?>">
  		<?php if($isDropdown): ?>
  			<?php $options = ['class'=>'nav-link dropdown-toggle', 'id'=>'navbarDropdown', 'role'=>'button', 'data-toggle'=>'dropdown', 'aria-haspopup'=>'true', 'aria-expanded'=>'false'] ?>
  		<?php endif; ?>
  		<?php $this->BcBaser->link($content['Content']['title'], $this->BcBaser->getContentsUrl($content['Content']['url'], false, null, false), $options) ?>
  		<?php if($isDropdown): ?>
  			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	  		<?php foreach($content['children'] as $child): ?>
	  			<?php $this->BcBaser->link($child['Content']['title'], $this->BcBaser->getContentsUrl($child['Content']['url'], false, null, false), array('class'=>'dropdown-item')) ?>
	  		<?php endforeach; ?>
  			</div>
  		<?php endif; ?>
  		</li>
    <?php endforeach; ?> 
	</ul>
  <?php endif; ?>
</div>
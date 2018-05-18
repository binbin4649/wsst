<?php
/**
 * ヘッダー
 *
 * BcBaserHelper::header() で呼び出す
 * （例）<?php $this->BcBaser->header() ?>
 */
?>
<header class="px-sm-3 border-bottom bg-light">
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo $this->BcBaser->getSiteUrl() ?>"><?php $this->BcBaser->logo(array('link'=>false)) ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- /Elements/global_menu.php -->
    <?php $this->BcBaser->globalMenu(2) ?>
  </nav>
</header>


<!-- Members プラグイン用。ログインしていたら表示する -->
<?php
	//マイページトップは表示しない 
	$here = $this->BcBaser->getHere();
	$show_login = true;
	if($here == '/members/mypages/' || $here == '/members/mypages/index'){
		$show_login = false;
	} 
?>
<?php if(!empty($user) && $show_login): ?>
<div class="container">
<div class="row p-1 m-1 bg-light rounded border border-warning status-header">
	<div class="col-7">
		<div class="ml-sm-3">
			会員番号:<?php echo $user['id'] ?><br>
			<?php echo $user['name'] ?>
		</div>
	</div>
	<div class="col-5">
		<a class="btn btn-outline-secondary btn-block btn-e" href="/members/mypages/" role="button">マイページ</a>
	</div>
</div>
</div>
<?php endif; ?>
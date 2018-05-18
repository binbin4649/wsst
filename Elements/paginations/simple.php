<?php
/**
 * ページネーション
 * 呼出箇所：サイト内検索結果一覧、ブログトップ、カテゴリ別ブログ記事一覧、タグ別ブログ記事一覧、年別ブログ記事一覧、月別ブログ記事一覧、日別ブログ記事一覧
 *
 * BcBaserHelper::pagination() で呼び出す
 * （例）<?php $this->BcBaser->pagination() ?>
 */
if (empty($this->Paginator)) {
	return;
}
if (!isset($modules)) {
	$modules = 8;
}

if ((int) $this->Paginator->counter(array('format' => '%pages%')) > 1){
  $next = $this->Paginator->next('Next', array('class'=>'page-link'), null, array('class' => 'disabled'));
  if(strpos($next, 'disabled')){
    $show_next = '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
  }else{
    $show_next = '<li class="page-item">'.$next.'</li>';
  }
  $prev = $this->Paginator->prev('Previous', array('class'=>'page-link'), null, array('class' => 'disabled'));
  if(strpos($prev, 'disabled')){
    $show_prev = '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>';
  }else{
    $show_prev = '<li class="page-item">'.$prev.'</li>';
  }
}
?>

<?php if ((int) $this->Paginator->counter(array('format' => '%pages%')) > 1): ?>
<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center my-4">
	<?php echo $show_prev ?>
	<?php echo $show_next ?>
  </ul>
</nav>
<?php endif; ?>
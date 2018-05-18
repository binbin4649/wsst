<?php
/**
 * ブログ記事詳細ページ
 * 呼出箇所：ブログ記事詳細ページ
 */
$this->BcBaser->setDescription($this->Blog->getTitle() . '｜' . $this->Blog->getPostContent($post, false, false, 50));
?>

<h2 class="h5 border-bottom py-3 mb-4 text-secondary"><?php $this->Blog->title() ?></h2>
<h1 class="h4 mb-0"><?php $this->BcBaser->contentsTitle() ?></h1>
<div class="text-muted mb-2"><small>
	<?php $this->Blog->category($post) ?>
	&nbsp;
	<?php $this->Blog->postDate($post) ?>
</small></div>
<div class="mb-3">
	<?php $this->Blog->eyeCatch($post, array('link'=>false, 'class'=>'img-fluid rounded mx-auto d-block', 'imgsize'=>'large')) ?>
</div>

<div class="mb-3">
	<?php $this->Blog->postContent($post) ?>
</div>

<div class="text-center mb-3">
	<?php $this->Blog->prevLink($post) ?>
	&nbsp;｜&nbsp;
	<?php $this->Blog->nextLink($post) ?>
</div>

<!-- /Elements/blog_related_posts.php -->
<?php $this->BcBaser->element('blog_related_posts') ?>

<!-- /Elements/blog_comennts.php -->
<?php //$this->BcBaser->element('blog_comments') ?>

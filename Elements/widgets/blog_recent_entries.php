<?php
/**
 * [PUBLISH] ブログ最近の投稿
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Blog.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */
if (!isset($count)) {
	$count = 5;
}
if (isset($blogContent)) {
	$id = $blogContent['BlogContent']['id'];
} else {
	$id = $blog_content_id;
}
$data = $this->requestAction('/blog/blog/get_recent_entries/' . $id . '/' . $count, ['entityId' => $id]);
$recentEntries = $data['recentEntries'];
$blogContent = $data['blogContent'];
$baseCurrentUrl = $this->BcBaser->getBlogContentsUrl($id) . 'archives/';
?>
<div class="mt-3 mb-3">
	<?php if ($name && $use_title): ?>
	<h6 class="pt-3 text-secondary border-bottom"><?php echo $name ?></h6>
	<?php endif ?>
	<?php if ($recentEntries): ?>		
		<?php foreach ($recentEntries as $recentEntry): ?>
			<p>
				<small class="text-muted"><?php $this->Blog->postDate($recentEntry) ?></small><br>
				<?php $this->Blog->postTitle($recentEntry) ?>
			</p>
		<?php endforeach; ?>
	<?php endif; ?>
</div>

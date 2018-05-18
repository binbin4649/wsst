<?php
/**
 * フッター
 *
 * BcBaserHelper::footer() で呼び出す
 * （例）<?php $this->BcBaser->footer() ?>
 */
?>
<div class="bg-light border-top mt-3 mt-md-5 pt-4 pt-md-5">
<footer class="container">
    <div class="row">
      <div class="col-12 col-md">
        <?php echo $this->BcHtml->image('apple-touch-icon.png', array('width' => '24', 'height' => '24', 'class' => 'mb-2')); ?>
        <small class="d-block mb-3 text-muted">&copy; <?php $this->BcBaser->copyYear(2018) ?></small>
      </div>
      <div class="col-6 col-md">
        <h5>Menu</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="/">トップ</a></li>
          <li><a class="text-muted" href="/feature/">特徴</a></li>
          <li><a class="text-muted" href="/price">料金</a></li>
          <li><a class="text-muted" href="/howto">使い方</a></li>
          <li><a class="text-muted" href="/qanda">Q&A:よくある質問</a></li>
          <li><a class="text-muted" href="/contact/">お問合せ</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="/feature/service1">サービス1</a></li>
          <li><a class="text-muted" href="/feature/service2">サービス2</a></li>
          <li><a class="text-muted" href="/feature/service3">サービス3</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Members</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="/members/mypages/signup">新規登録</a></li>
          <li><a class="text-muted" href="/members/mypages/login">ログイン</a></li>
          <li><a class="text-muted" href="/members/mypages/reset_password">パスワードを忘れた</a></li>
          <li><a class="text-muted" href="/error_report/">不具合報告</a></li>
          <li><a class="text-muted" href="/business_summary">事業概要</a></li>
          <li><a class="text-muted" href="/user_policy">利用規約</a></li>
          <li><a class="text-muted" href="/privacy_policy">プライバシーポリシー</a></li>
          <li><a class="text-muted" href="/law">特定商取引に基づく表記</a></li>
        </ul>
      </div>
    </div>
    <p class="text-center mt-3"> 
		<a href="http://basercms.net/" target="_blank"><?php echo $this->BcHtml->image('baser.power.gif', array('alt' => 'baserCMS : Based Website Development Project', 'border' => "0")); ?></a>&nbsp;
		<a href="http://cakephp.org/" target="_blank"><?php echo $this->BcHtml->image('cake.power.gif', array('alt' => 'CakePHP(tm) : Rapid Development Framework', 'border' => "0")); ?></a>
		<a href="http://dubmilli.com/" target="_blank"><?php echo $this->BcHtml->image('dubmilli.power.gif', array('alt' => '合同会社ダブミリ dubmilli LLC.', 'border' => "0")); ?></a>
	</p>
</footer>
</div>
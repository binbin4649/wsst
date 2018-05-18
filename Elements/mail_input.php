<?php
/**
 * メールフォーム入力欄
 * 呼出箇所：メールフォーム入力ページ、メールフォーム入力内容確認ページ
 *
 * @var int $blockStart 表示するフィールドの開始NO
 * @var int $blockEnd 表示するフィールドの終了NO
 * @var bool $freezed 確認画面かどうか
 */
$group_field = null;
$iteration = 0;
if (!isset($blockEnd)) {
	$blockEnd = 0;
}

if (!empty($mailFields)) {

	foreach ($mailFields as $key => $record) {
		$field = $record['MailField'];
		$iteration++;
		if ($field['use_field'] && ($blockStart && $iteration >= $blockStart) && (!$blockEnd || $iteration <= $blockEnd)) {

			$next_key = $key + 1;
			$description = $field['description'];

			/* 項目名 */
			if ($group_field != $field['group_field'] || (!$group_field && !$field['group_field'])) {
				echo '    <div class="form-group row"';
				if ($field['type'] == 'hidden') {
					echo ' style="display:none"';
				}
				echo '>' . "\n" . $this->Mailform->label("MailMessage." . $field['field_name'], $field['head'], array('class'=>'col-lg-3 col-form-label text-lg-right text-muted'));
				echo "\n" . '        <div class="col-lg-9">';
			}

			echo '<span id="FieldMessage' . Inflector::camelize($record['MailField']['field_name']) . '">';
			if (!$freezed && $description) {
				echo '<small>' . $description . '</small>';
			}
			/* 入力欄 */
			if (!$freezed || $this->Mailform->value("MailMessage." . $field['field_name']) !== '') {
				echo '<span class="mail-before-attachment">' . $field['before_attachment'] . '</span>';
			}

			if(empty($record["MailField"]['class'])){
				$record["MailField"]['class'] = 'form-control';
			}
			//membersプラグインにて、ログインしていたらmypage_id, name, emailに$userの値を入れる。
			$attributes = $this->Mailfield->getAttributes($record);
			if(!empty($user)){
				if($field['field_name'] == 'mypage_id'){
					$attributes['value'] = $user['id'];
				}
				if($field['field_name'] == 'name'){
					$attributes['value'] = $user['name'];
				}
				if($field['field_name'] == 'email'){
					$attributes['value'] = $user['email'];
				}
			}
			// =========================================================================================================
			// 2018/02/06 ryuring
			// no_send オプションは、確認画面に表示しないようにするために利用されている可能性が高い
			//（メールアドレスのダブル入力、プライバシーポリシーへの同意に利用されている）
			// 本来であれば、not_display_confirm 等のオプションを別途準備し、そちらを利用するべきだが、
			// 後方互換のため残す
			// =========================================================================================================
			if ($freezed && $field['no_send']) {
				echo $this->Mailform->control('hidden', "MailMessage." . $field['field_name'] . "", $this->Mailfield->getOptions($record), $attributes);
			} else {
				echo $this->Mailform->control($field['type'], "MailMessage." . $field['field_name'] . "", $this->Mailfield->getOptions($record), $attributes);
			}

			if (!$freezed || $this->Mailform->value("MailMessage." . $field['field_name']) !== '') {
				echo '<span class="mail-after-attachment">' . $field['after_attachment'] . '</span>';
			}
			if (!$freezed) {
				echo '<span class="mail-attention">' . $field['attention'] . '</span>';
			}
			if (!$field['group_valid']) {
				echo $this->Mailform->error("MailMessage." . $field['field_name']);
			}

			/* 説明欄 */
			if (($this->BcArray->last($mailFields, $key)) ||
				($field['group_field'] != $mailFields[$next_key]['MailField']['group_field']) ||
				(!$field['group_field'] && !$mailFields[$next_key]['MailField']['group_field']) ||
				($field['group_field'] != $mailFields[$next_key]['MailField']['group_field'] && $this->BcArray->first($mailFields, $key))) {

				if ($field['group_valid']) {
					echo $this->Mailform->error("MailMessage." . $field['group_field'] . "_not_same", __("入力データが一致していません。"));
					echo $this->Mailform->error("MailMessage." . $field['group_field'] . "_not_complate", __("入力データが不完全です。"));

					if (!$this->Mailform->error("MailMessage." . $field['group_field'] . "_not_same")
						&& !$this->Mailform->error("MailMessage." . $field['group_field'] . "_not_complate")) {
						$groupValidErrors = $this->Mailform->getGroupValidErrors($mailFields, $field['group_valid']);
						if ($groupValidErrors) {
							foreach ($groupValidErrors as $groupValidError) {
								echo $groupValidError;
							}
						} else {
							echo $this->Mailform->error("MailMessage." . $field['group_field'], __("必須項目です。"));
						}
					}
				}

				echo '</span>';
				echo "</div>\n    </div>\n";
			} else {
				echo '</span>';
			}
			$group_field = $field['group_field'];
		}
	}
}

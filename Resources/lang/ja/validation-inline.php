<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

return [
    'accepted' => 'この項目が未承認です。',
    'accepted_if' => 'This field must be accepted when :other is :value.',
    'active_url' => '有効なURLではありません。',
    'after' => ':dateより後の日付を指定してください。',
    'after_or_equal' => ':date以降の日付を指定してください。',
    'alpha' => 'アルファベットのみ使用できます。',
    'alpha_dash' => '英数字、ハイフン、アンダースコアのみ使用できます。',
    'alpha_num' => '英数字のみ使用できます。',
    'array' => '配列でなければなりません。',
    'attached' => 'すでに添付されています。',
    'before' => ':date より前の日付を指定してください。',
    'before_or_equal' => ':date 以前の日付を指定してください。',
    'between' => [
        'array' => ':min ~ :max 個でなければなりません。',
        'file' => 'ファイルサイズは :min ~ :max KBの間でなければなりません。',
        'numeric' => ':min ~ :max の間でなければなりません。',
        'string' => ':min ~ :max 文字の間でなければなりません。',
    ],
    'boolean' => 'trueまたはfalseを指定してください。',
    'confirmed' => '確認の内容が一致しません。',
    'current_password' => 'The password is incorrect.',
    'date' => '有効な日付ではありません。',
    'date_equals' => ':date 同じ日付を指定してください。',
    'date_format' => ':format の形と一致しません。',
    'different' => ':other とは異なる必要があります。',
    'digits' => ':digits桁でなければなりません。',
    'digits_between' => ':min ~ :max桁でなければなりません。',
    'dimensions' => '画像の寸法が無効です。',
    'distinct' => '値が重複しています。',
    'email' => '無効なメールアドレスです。',
    'ends_with' => '次のいずれかで終わる必要があります: :values',
    'exists' => '選択した値が無効です。',
    'file' => 'ファイルである必要があります。',
    'filled' => '値がありません。',
    'gt' => [
        'array' => ':value 個より多くい必要があります。',
        'file' => 'ファイルサイズが :value KBより大きい必要があります。',
        'numeric' => ':value より大きい必要があります。',
        'string' => ':value文字より多い必要があります。',
    ],
    'gte' => [
        'array' => ':value 個以上でなければなりません。',
        'file' => 'ファイルサイズが :value KB以上でなければなりません。',
        'numeric' => ':value 以上でなければなりません。',
        'string' => ':value文字以上必要です。',
    ],
    'image' => '画像でなければなりません。',
    'in' => '選択した値が無効です。',
    'in_array' => 'この値は:otherに存在しません。',
    'integer' => '数字でなければなりません。',
    'ip' => '有効なIPアドレスである必要があります。',
    'ipv4' => '有効なIPv4アドレスである必要があります。',
    'ipv6' => '有効なIPv6アドレスである必要があります。',
    'json' => '有効なJSON文字列である必要があります。',
    'lt' => [
        'array' => ':value 個より少なければなりません。',
        'file' => 'ファイルサイズが :value KBより小さくなければなりません。',
        'numeric' => ':value より小さくなければなりません。',
        'string' => ':value文字より少なければなりません。',
    ],
    'lte' => [
        'array' => ':value 個以下でなければなりません。',
        'file' => 'ファイルサイズが :value KB以下でなければなりません。',
        'numeric' => ':value 以下でなければなりません。',
        'string' => ':value文字以下でなければなりません。',
    ],
    'max' => [
        'array' => ':value 個以下でなければなりません。',
        'file' => 'ファイルサイズが :value KB以下でなければなりません。',
        'numeric' => ':value 以下でなければなりません。',
        'string' => ':value文字以下でなければなりません。',
    ],
    'mimes' => ':valuesのファイルである必要があります。',
    'mimetypes' => ':valuesのファイルである必要があります。',
    'min' => [
        'array' => ':value 個以上でなければなりません。',
        'file' => 'ファイルサイズが :value KB以上でなければなりません。',
        'numeric' => ':value 以上でなければなりません。',
        'string' => ':value文字以上必要です。',
    ],
    'multiple_of' => ':valueの倍数でなければなりません。',
    'not_in' => '選択した値が無効です。',
    'not_regex' => 'この形式は無効です。',
    'numeric' => '数字でなければなりません。',
    'password' => 'パスワードが間違っています。',
    'present' => 'この項目は必須です。',
    'prohibited' => 'この項目は禁止されています。',
    'prohibited_if' => ':otherが:valueの場合、この項目は禁止されています。',
    'prohibited_unless' => ':otherが:valuesでない限り、この項目は禁止されています。',
    'prohibits' => 'This field prohibits :other from being present.',
    'regex' => 'この形式は無効です。',
    'relatable' => 'このリソースと関連づけられません。',
    'required' => 'この項目は必須です。',
    'required_if' => ':otherが:valueの場合、この項目は必須です。',
    'required_unless' => ':otherが:valuesでない限り、この項目は必須です。',
    'required_with' => ':valuesが存在する場合、この項目は必須です。',
    'required_with_all' => ':valuesが存在する場合、この項目は必須です。',
    'required_without' => ':valuesが存在しない場合、この項目は必須です。',
    'required_without_all' => ':valuesのいずれも存在しない場合、この項目は必須です。',
    'same' => ':otherの値と一致しません。',
    'size' => [
        'array' => ':size 個含まれていないといけません。',
        'file' => ':size KBでないといけません。',
        'numeric' => ':size でないといけません。',
        'string' => ':size 文字でないといけません。',
    ],
    'starts_with' => '次のいずれかから始まる必要があります: :values',
    'string' => '文字でなければなりません。',
    'timezone' => '有効なタイムゾーンである必要があります。',
    'unique' => 'すでに使用されています。',
    'uploaded' => 'アップロードに失敗しました。',
    'url' => 'この形式は無効です。',
    'uuid' => '有効なUUIDである必要があります。',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];
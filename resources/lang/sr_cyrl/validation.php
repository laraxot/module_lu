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
    'accepted' => 'Поље :attribute мора бити прихваћено.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'Поље :attribute није валидан УРЛ.',
    'after' => 'Поље :attribute мора бити датум после :date.',
    'after_or_equal' => 'Поље :attribute мора да буде :date или каснији датум.',
    'alpha' => 'Поље :attribute може садржати само слова.',
    'alpha_dash' => 'Поље :attribute може садржати само слова, бројеве и повлаке.',
    'alpha_num' => 'Поље :attribute може садржати само слова и бројеве.',
    'array' => 'Поље :attribute мора садржати неких низ ставки.',
    'attached' => 'Овај :attribute је већ причвршћен.',
    'before' => 'Поље :attribute мора бити датум пре :date.',
    'before_or_equal' => ':attribute мора да буде :date или ранији датум.',
    'between' => [
        'array' => 'Поље :attribute мора бити између :min - :max ставки.',
        'file' => 'Фајл :attribute мора бити између :min - :max килобајта.',
        'numeric' => 'Поље :attribute мора бити између :min - :max.',
        'string' => 'Поље :attribute мора бити између :min - :max карактера.',
    ],
    'boolean' => 'Поље :attribute мора бити тачно или нетачно',
    'confirmed' => 'Потврда поља :attribute се не поклапа.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Поље :attribute није важећи датум.',
    'date_equals' => 'Поље :attribute мора да буде датум: :date.',
    'date_format' => 'Поље :attribute не одговора према формату :format.',
    'different' => 'Поља :attribute и :other морају бити различита.',
    'digits' => 'Поље :attribute мора садржати :digits шифри.',
    'digits_between' => 'Поље :attribute мора бити иземђу :min и :max шифри.',
    'dimensions' => 'Поље :attribute име недозвољене димензије слике.',
    'distinct' => 'Поље :attribute има дуплирану вредност.',
    'email' => 'Формат поља :attribute није валидан.',
    'ends_with' => 'Поље :attribute мора да се заврши са нечим од следећег: :values.',
    'exists' => 'Одабрано поље :attribute није валидно.',
    'file' => ':attribute мора да буде датотека.',
    'filled' => 'Поље :attribute је обавезно.',
    'gt' => [
        'array' => 'Поље :attribute мора да садржи више од :value ставке.',
        'file' => 'Поље :attribute мора да буде већи од :value килобајта.',
        'numeric' => 'Поље :attribute мора да буде већи од :value.',
        'string' => 'Поље :attribute мора да садржи више од :value знакова.',
    ],
    'gte' => [
        'array' => 'Поље :attribute мора да садржи :value ставки или више.',
        'file' => 'Поље :attribute мора да има :value или више килобајта.',
        'numeric' => 'Поље :attribute мора да буде :value или већи.',
        'string' => 'Поље :attribute мора да садржи :value или више знакова.',
    ],
    'image' => 'Поље :attribute мора бити слика.',
    'in' => 'Поље Одабрано поље :attribute није валидно.',
    'in_array' => 'Поље :attribute не постоји у :other.',
    'integer' => 'Поље :attribute мора бити број.',
    'ip' => 'Поље :attribute мора бити валидна ИП адреса.',
    'ipv4' => 'Поље :attribute мора да буде важећа ИПв4 адреса.',
    'ipv6' => 'Поље :attribute мора да буде важећа ИПв6 адреса.',
    'json' => 'Поље :attribute мора да буде важећа ЈСОН формат.',
    'lt' => [
        'array' => 'Поље :attribute мора да садржи мање од :value ставки.',
        'file' => 'Поље :attribute мора да буде мањи од :value килобајта.',
        'numeric' => 'Поље :attribute мора да буде мањи од :value.',
        'string' => 'Поље :attribute мора да садржи мање од :value знакова.',
    ],
    'lte' => [
        'array' => 'Поље :attribute не сме да садржи више од :value ставки.',
        'file' => 'Поље :attribute мора да буде :value или мањи.',
        'numeric' => 'Поље :attribute мора да буде :value или мањи.',
        'string' => 'Поље :attribute мора да садржи :value или мање знакова.',
    ],
    'max' => [
        'array' => 'Поље :attribute не смије да имаге више од :max ставки.',
        'file' => 'Поље :attribute мора бити мање од :max килобајта.',
        'numeric' => 'Поље :attribute мора бити мање од :max.',
        'string' => 'Поље :attribute мора садржати мање од :max карактера.',
    ],
    'mimes' => 'Поље :attribute мора бити фајл типа: :values.',
    'mimetypes' => 'Поље :attribute мора бити фајл типа: :values.',
    'min' => [
        'array' => 'Поље :attribute мора садрзати најмање :min ставку.',
        'file' => 'Фајл :attribute мора бити најмање :min килобајта.',
        'numeric' => 'Поље :attribute мора бити најмање :min.',
        'string' => 'Поље :attribute мора садржати најмање :min карактера.',
    ],
    'multiple_of' => 'Број :attribute треба да буде вишеструки од :value',
    'not_in' => 'Одабрани елемент поља :attribute није валидан.',
    'not_regex' => 'Формат :attribute је неважећи.',
    'numeric' => 'Поље :attribute мора бити број.',
    'password' => 'Погрешна лозинка',
    'present' => 'Поље :attribute мора да буде присутно.',
    'prohibited' => 'Поље :attribute је забрањено.',
    'prohibited_if' => 'Поље :attribute је забрањено када је :other једнако :value.',
    'prohibited_unless' => 'Поље :attribute је забрањено, осим ако је :other у :values. години.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'Формат поља :attribute није валидан.',
    'relatable' => 'Овај :attribute можда није повезан са овим ресурсом.',
    'required' => 'Поље :attribute је обавезно.',
    'required_if' => 'Поље :attribute је потребно када поље :other садржи :value.',
    'required_unless' => 'Поље :attribute је обавезно, осим ако је :other у :values.',
    'required_with' => 'Поље :attribute је потребно када поље :values је присутан.',
    'required_with_all' => 'Поље :attribute је обавезно када је :values приказано.',
    'required_without' => 'Поље :attribute је потребно када поље :values није присутан.',
    'required_without_all' => 'Поље :attribute је потребно када ниједан од следећи поља :values нису присутни.',
    'same' => 'Поља :attribute и :other се морају поклапати.',
    'size' => [
        'array' => 'Поље :attribute мора садржати :size ставки.',
        'file' => 'Фајл :attribute мора бити :size килобајта.',
        'numeric' => 'Поље :attribute мора бити :size.',
        'string' => 'Поље :attribute мора бити :size карактера.',
    ],
    'starts_with' => 'Поље :attribute мора да почне са: :values',
    'string' => 'Поље :attribute мора садржати слова.',
    'timezone' => 'Поље :attribute мора бити исправна временска зона.',
    'unique' => 'Поље :attribute већ постоји.',
    'uploaded' => ':attribute није отпремљен.',
    'url' => 'Формат поља :attribute не важи.',
    'uuid' => ':attribute мора да буде важећи УУИД.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];

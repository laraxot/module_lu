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
    'accepted' => ':attribute duhet të pranohet.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => ':attribute nuk është adresë e saktë.',
    'after' => ':attribute duhet të jetë datë pas :date.',
    'after_or_equal' => ':attribute duhet të jetë datë e barabartë ose pas :date.',
    'alpha' => ':attribute mund të përmbajë vetëm shkronja.',
    'alpha_dash' => ':attribute mund të përmbajë vetëm shkronja, numra, dhe viza.',
    'alpha_num' => ':attribute mund të përmbajë vetëm shkronja dhe numra.',
    'array' => ':attribute duhet të jetë një bashkësi (array).',
    'attached' => 'Kjo :attribute është ngjitur tashmë.',
    'before' => ':attribute duhet të jetë datë para :date.',
    'before_or_equal' => ':attribute duhet të jetë datë e barabartë ose para :date.',
    'between' => [
        'array' => ':attribute duhet të ketë ndërmjet :min - :max elementëve.',
        'file' => ':attribute duhet të jetë ndërmjet :min - :max kilobajtëve.',
        'numeric' => ':attribute duhet të jetë ndërmjet :min - :max.',
        'string' => ':attribute duhet të ketë ndërmjet :min - :max karaktereve.',
    ],
    'boolean' => 'Fusha :attribute duhet të jetë e vërtetë ose e gabuar',
    'confirmed' => ':attribute konfirmimi nuk përputhet.',
    'current_password' => 'The password is incorrect.',
    'date' => ':attribute nuk është një datë e saktë.',
    'date_equals' => ':attribute duhet të jetë datë e barabartë me :date.',
    'date_format' => ':attribute nuk i përshtatet formatit :format.',
    'different' => ':attribute dhe :other duhet të jenë të ndryshme.',
    'digits' => ':attribute duhet të ketë :digits shifra.',
    'digits_between' => ':attribute duhet të ketë midis :min dhe :max shifra.',
    'dimensions' => ':attribute ka dimensione të gabuara.',
    'distinct' => ':attribute ka një vlerë të përsëritur.',
    'email' => ':attribute formati është i pasaktë.',
    'ends_with' => ':attribute duhet të përfundojë me një nga vlerat: :values.',
    'exists' => ':attribute përzgjedhur është i/e pasaktë.',
    'file' => ':attribute duhet të jetë një fajll.',
    'filled' => 'Fusha :attribute është e kërkuar.',
    'gt' => [
        'array' => ':attribute duhet të ketë më shumë se :value elemente.',
        'file' => ':attribute duhet të jetë më i/e madh/e se :value kilobajtë.',
        'numeric' => ':attribute duhet të jetë më i/e madh/e se :value.',
        'string' => ':attribute duhet të ketë më shumë se :value karaktere.',
    ],
    'gte' => [
        'array' => ':attribute duhet të ketë :value ose më shumë elemente.',
        'file' => ':attribute duhet të jetë më i/e madh/e ose i/e barabartë me :value kilobajtë.',
        'numeric' => ':attribute duhet të jetë më i/e madh/e ose i/e barabartë me :value.',
        'string' => ':attribute duhet të ketë :value ose më shumë karaktere.',
    ],
    'image' => ':attribute duhet të jetë imazh.',
    'in' => ':attribute përzgjedhur është i/e pasaktë.',
    'in_array' => ':attribute nuk gjendet në :other.',
    'integer' => ':attribute duhet të jetë numër i plotë.',
    'ip' => ':attribute duhet të jetë një IP adresë.',
    'ipv4' => ':attribute duhet të jetë një IPv4 adresë.',
    'ipv6' => ':attribute duhet të jetë një IPv6 adresë.',
    'json' => ':attribute duhet të ketë përmbajtje të vlefshme JSON.',
    'lt' => [
        'array' => ':attribute duhet të ketë më pak se :value elemente.',
        'file' => ':attribute duhet të jetë më i/e vogël se :value kilobajtë.',
        'numeric' => ':attribute duhet të jetë më i/e vogël se :value.',
        'string' => ':attribute duhet të ketë më pak se :value karaktere.',
    ],
    'lte' => [
        'array' => ':attribute duhet të ketë :value ose më pak karaktere.',
        'file' => ':attribute duhet të jetë më i/e vogël ose i/e barabartë me :value kilobajtë.',
        'numeric' => ':attribute duhet të jetë më i/e vogël ose i/e barabartë me :value.',
        'string' => ':attribute duhet të ketë :value ose më pak karaktere.',
    ],
    'max' => [
        'array' => ':attribute nuk mund të ketë më tepër se :max elemente.',
        'file' => ':attribute nuk mund të jetë më tepër se :max kilobajtë.',
        'numeric' => ':attribute nuk mund të jetë më tepër se :max.',
        'string' => ':attribute nuk mund të ketë më tepër se :max karaktere.',
    ],
    'mimes' => ':attribute duhet të jetë një dokument i tipit: :values.',
    'mimetypes' => ':attribute duhet të jetë një dokument i tipit: :values.',
    'min' => [
        'array' => ':attribute nuk mund të ketë më pak se :min elemente.',
        'file' => ':attribute nuk mund të jetë më pak se :min kilobajtë.',
        'numeric' => ':attribute nuk mund të jetë më pak se :min.',
        'string' => ':attribute nuk mund të ketë më pak se :min karaktere.',
    ],
    'multiple_of' => ':attribute duhet të jetë shumë nga :value',
    'not_in' => ':attribute përzgjedhur është i/e pasaktë.',
    'not_regex' => 'Formati i :attribute është i pasaktë.',
    'numeric' => ':attribute duhet të jetë një numër.',
    'password' => 'Fjalëkalimi është i pasaktë.',
    'present' => ':attribute duhet të jetë prezent/e.',
    'prohibited' => 'Fusha :attribute është e ndaluar.',
    'prohibited_if' => 'Fusha :attribute është e ndaluar kur :other është :value.',
    'prohibited_unless' => 'Fusha :attribute është e ndaluar nëse :other është në :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'Formati i :attribute është i pasaktë.',
    'relatable' => 'Ky :attribute mund të mos jetë i lidhur me këtë burim.',
    'required' => 'Fusha :attribute është e kërkuar.',
    'required_if' => 'Fusha :attribute është e kërkuar kur :other është :value.',
    'required_unless' => 'Fusha :attribute është e kërkuar përveç kur :other është në :values.',
    'required_with' => 'Fusha :attribute është e kërkuar kur :values ekziston.',
    'required_with_all' => 'Fusha :attribute është e kërkuar kur :values ekziston.',
    'required_without' => 'Fusha :attribute është e kërkuar kur :values nuk ekziston.',
    'required_without_all' => 'Fusha :attribute është e kërkuar kur nuk ekziston asnjë nga :values.',
    'same' => ':attribute dhe :other duhet të përputhen.',
    'size' => [
        'array' => ':attribute duhet të ketë :size elemente.',
        'file' => ':attribute duhet të jetë :size kilobajtë.',
        'numeric' => ':attribute duhet të jetë :size.',
        'string' => ':attribute duhet të ketë :size karaktere.',
    ],
    'starts_with' => ':attribute duhet të fillojë me njërën nga vlerat: :values.',
    'string' => ':attribute duhet të jetë varg.',
    'timezone' => ':attribute duhet të jetë zonë kohore e saktë.',
    'unique' => ':attribute është marrë tashmë.',
    'uploaded' => ':attribute dështoi të ngarkohej.',
    'url' => 'Formati i :attribute është i pasaktë.',
    'uuid' => ':attribute duhet të jetë UUID i/e saktë.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];
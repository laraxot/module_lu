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
    'accepted' => 'Kjo fushë duhet të pranohet.',
    'accepted_if' => 'This field must be accepted when :other is :value.',
    'active_url' => 'Kjo nuk është adresë e saktë.',
    'after' => 'Kjo duhet të jetë datë pas :date.',
    'after_or_equal' => 'Kjo duhet të jetë datë e barabartë ose pas :date.',
    'alpha' => 'Kjo mund të përmbajë vetëm shkronja.',
    'alpha_dash' => 'Kjo mund të përmbajë vetëm shkronja, numra, dhe viza.',
    'alpha_num' => 'Kjo mund të përmbajë vetëm shkronja dhe numra.',
    'array' => 'Kjo duhet të jetë një bashkësi (array).',
    'attached' => 'Kjo fushë është e ngjitur.',
    'before' => 'Kjo duhet të jetë datë para :date.',
    'before_or_equal' => 'Kjo duhet të jetë datë e barabartë ose para :date.',
    'between' => [
        'array' => 'Kjo duhet të ketë ndërmjet :min - :max elementëve.',
        'file' => 'Kjo duhet të jetë ndërmjet :min - :max kilobajtëve.',
        'numeric' => 'Kjo duhet të jetë ndërmjet :min - :max.',
        'string' => 'Kjo duhet të ketë ndërmjet :min - :max karaktereve.',
    ],
    'boolean' => 'Kjo fushë duhet të jetë e vërtetë ose e gabuar',
    'confirmed' => 'Konfirmimi nuk përputhet.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Kjo nuk është një datë e saktë.',
    'date_equals' => 'Kjo duhet të jetë datë e barabartë me :date.',
    'date_format' => 'Kjo nuk i përshtatet formatit :format.',
    'different' => 'Kjo dhe :other duhet të jenë të ndryshme.',
    'digits' => 'Kjo duhet të ketë :digits shifra.',
    'digits_between' => 'Kjo duhet të ketë midis :min dhe :max shifra.',
    'dimensions' => 'Kjo ka dimensione të gabuara.',
    'distinct' => 'Kjo ka një vlerë të përsëritur.',
    'email' => 'Kjo duhet të jetë email adresë e saktë.',
    'ends_with' => 'Kjo duhet të përfundojë me një nga vlerat: :values.',
    'exists' => 'Vlera e përzgjedhur është e pasaktë.',
    'file' => 'Kjo duhet të jetë një fajll.',
    'filled' => 'Kjo fushë është e kërkuar.',
    'gt' => [
        'array' => 'Kjo duhet të ketë më shumë se :value elemente.',
        'file' => 'Kjo duhet të jetë më e madhe se :value kilobajtë.',
        'numeric' => 'Kjo duhet të jetë më e madhe se :value.',
        'string' => 'Kjo duhet të ketë më shumë se :value karaktere.',
    ],
    'gte' => [
        'array' => 'Kjo duhet të ketë :value ose më shumë elemente.',
        'file' => 'Kjo duhet të jetë më e madhe ose e barabartë me :value kilobajtë.',
        'numeric' => 'Kjo duhet të jetë më e madhe ose e barabartë me :value.',
        'string' => 'Kjo duhet të ketë :value ose më shumë karaktere.',
    ],
    'image' => 'Kjo duhet të jetë imazh.',
    'in' => 'Vlera e përzgjedhur është e pasaktë.',
    'in_array' => 'Kjo nuk gjendet në :other.',
    'integer' => 'Kjo duhet të jetë numër i plotë.',
    'ip' => 'Kjo duhet të jetë një IP adresë.',
    'ipv4' => 'Kjo duhet të jetë një IPv4 adresë.',
    'ipv6' => 'Kjo duhet të jetë një IPv6 adresë.',
    'json' => 'Kjo duhet të ketë përmbajtje të vlefshme JSON.',
    'lt' => [
        'array' => 'Kjo duhet të ketë më pak se :value elemente.',
        'file' => 'Kjo duhet të jetë më e vogël se :value kilobajtë.',
        'numeric' => 'Kjo duhet të jetë më e vogël se :value.',
        'string' => 'Kjo duhet të ketë më pak se :value karaktere.',
    ],
    'lte' => [
        'array' => 'Kjo duhet të ketë :value ose më pak karaktere.',
        'file' => 'Kjo duhet të jetë më e vogël ose e barabartë me :value kilobajtë.',
        'numeric' => 'Kjo duhet të jetë më e vogël ose e barabartë me :value.',
        'string' => 'Kjo duhet të ketë :value ose më pak karaktere.',
    ],
    'max' => [
        'array' => 'Kjo nuk mund të ketë më tepër se :max elemente.',
        'file' => 'Kjo nuk mund të jetë më tepër se :max kilobajtë.',
        'numeric' => 'Kjo nuk mund të jetë më tepër se :max.',
        'string' => 'Kjo nuk mund të ketë më tepër se :max karaktere.',
    ],
    'mimes' => 'Kjo duhet të jetë një dokument i tipit: :values.',
    'mimetypes' => 'Kjo duhet të jetë një dokument i tipit: :values.',
    'min' => [
        'array' => 'Kjo nuk mund të ketë më pak se :min elemente.',
        'file' => 'Kjo nuk mund të jetë më pak se :min kilobajtë.',
        'numeric' => 'Kjo nuk mund të jetë më pak se :min.',
        'string' => 'Kjo nuk mund të ketë më pak se :min karaktere.',
    ],
    'multiple_of' => 'Vlera duhet të jetë e shumëfishtë nga :value',
    'not_in' => 'Vlera e përzgjedhur është e pasaktë.',
    'not_regex' => 'Ky format është i pasaktë.',
    'numeric' => 'Kjo duhet të jetë një numër.',
    'password' => 'Fjalëkalimi është i pasaktë.',
    'present' => 'Kjo duhet të jetë prezente.',
    'prohibited' => 'Kjo fushë është e ndaluar.',
    'prohibited_if' => 'Kjo fushë është e ndaluar kur :other është :value.',
    'prohibited_unless' => 'Kjo fushë është e ndaluar nëse :other është në :values.',
    'prohibits' => 'This field prohibits :other from being present.',
    'regex' => 'Ky format është i pasaktë.',
    'relatable' => 'Kjo fushë mund të mos shoqërohet me këtë burim.',
    'required' => 'Kjo fushë është e kërkuar.',
    'required_if' => 'Kjo fushë është e kërkuar kur :other është :value.',
    'required_unless' => 'Kjo fushë është e kërkuar përveç kur :other është në :values.',
    'required_with' => 'Kjo fushë është e kërkuar kur :values ekziston.',
    'required_with_all' => 'Kjo fushë është e kërkuar kur :values ekziston.',
    'required_without' => 'Kjo fushë është e kërkuar kur :values nuk ekziston.',
    'required_without_all' => 'Kjo fushë është e kërkuar kur nuk ekziston asnjë nga :values.',
    'same' => 'Kjo dhe :other duhet të përputhen.',
    'size' => [
        'array' => 'Kjo duhet të ketë :size elemente.',
        'file' => 'Kjo duhet të jetë :size kilobajtë.',
        'numeric' => 'Kjo duhet të jetë :size.',
        'string' => 'Kjo duhet të ketë :size karaktere.',
    ],
    'starts_with' => 'Kjo duhet të fillojë me njërën nga vlerat: :values.',
    'string' => 'Kjo duhet të jetë varg.',
    'timezone' => 'Kjo duhet të jetë zonë kohore e saktë.',
    'unique' => 'Kjo është marrë tashmë.',
    'uploaded' => 'Kjo dështoi të ngarkohej.',
    'url' => 'Ky format është i pasaktë.',
    'uuid' => 'Kjo duhet të jetë UUID i/e saktë.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];

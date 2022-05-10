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
    'accepted' => 'Uwanja huu lazima kuwa na kukubalika.',
    'accepted_if' => 'This field must be accepted when :other is :value.',
    'active_url' => 'Hii si halali URL.',
    'after' => 'Hii ni lazima sasa baada ya :date.',
    'after_or_equal' => 'Hii ni lazima sasa baada ya au sawa na :date.',
    'alpha' => 'Uwanja huu inaweza tu vyenye barua.',
    'alpha_dash' => 'Uwanja huu inaweza tu vyenye herufi, namba, dashes na underscores.',
    'alpha_num' => 'Uwanja huu inaweza tu kuwa na herufi na namba.',
    'array' => 'Uwanja huu lazima kuwa na safu.',
    'attached' => 'Uwanja huu ni tayari masharti.',
    'before' => 'Hii ni lazima sasa kabla ya :date.',
    'before_or_equal' => 'Hii ni lazima sasa kabla ya au sawa na :date.',
    'between' => [
        'array' => 'This content must have between :min and :max items.',
        'file' => 'This file must be between :min and :max kilobytes.',
        'numeric' => 'This value must be between :min and :max.',
        'string' => 'This string must be between :min and :max characters.',
    ],
    'boolean' => 'Uwanja huu lazima kuwa kweli au uongo.',
    'confirmed' => 'Uthibitisho haina mechi.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Hii si halali kwa sasa.',
    'date_equals' => 'Hii ni lazima kuwa tarehe sawa na :date.',
    'date_format' => 'Hii haina mechi ya format :format.',
    'different' => 'Thamani hii lazima kuwa tofauti kutoka :other.',
    'digits' => 'Hii ni lazima :digits tarakimu.',
    'digits_between' => 'Hii ni lazima kuwa kati ya :min na :max tarakimu.',
    'dimensions' => 'Picha hii ina vipimo batili.',
    'distinct' => 'Uwanja huu ina duplicate thamani.',
    'email' => 'Hii ni lazima kuwa na anwani ya barua pepe halali.',
    'ends_with' => 'Hii lazima mwisho na moja ya yafuatayo: :values.',
    'exists' => 'Kuchaguliwa thamani ni batili.',
    'file' => 'Maudhui lazima faili.',
    'filled' => 'Uwanja huu lazima kuwa na thamani.',
    'gt' => [
        'array' => 'The content must have more than :value items.',
        'file' => 'The file size must be greater than :value kilobytes.',
        'numeric' => 'The value must be greater than :value.',
        'string' => 'The string must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The content must have :value items or more.',
        'file' => 'The file size must be greater than or equal :value kilobytes.',
        'numeric' => 'The value must be greater than or equal :value.',
        'string' => 'The string must be greater than or equal :value characters.',
    ],
    'image' => 'Hii ni lazima kuwa picha.',
    'in' => 'Kuchaguliwa thamani ni batili.',
    'in_array' => 'Thamani hii haipo katika :other.',
    'integer' => 'Hii ni lazima kuwa integer.',
    'ip' => 'Hii ni lazima kuwa halali anwani ya IP.',
    'ipv4' => 'Hii ni lazima kuwa halali IPv4 anwani.',
    'ipv6' => 'Hii ni lazima kuwa halali anuani IPv6.',
    'json' => 'Hii ni lazima kuwa halali kamba JSON.',
    'lt' => [
        'array' => 'The content must have less than :value items.',
        'file' => 'The file size must be less than :value kilobytes.',
        'numeric' => 'The value must be less than :value.',
        'string' => 'The string must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The content must not have more than :value items.',
        'file' => 'The file size must be less than or equal :value kilobytes.',
        'numeric' => 'The value must be less than or equal :value.',
        'string' => 'The string must be less than or equal :value characters.',
    ],
    'max' => [
        'array' => 'The content may not have more than :max items.',
        'file' => 'The file size may not be greater than :max kilobytes.',
        'numeric' => 'The value may not be greater than :max.',
        'string' => 'The string may not be greater than :max characters.',
    ],
    'mimes' => 'Hii ni lazima faili ya aina: :values.',
    'mimetypes' => 'Hii ni lazima faili ya aina: :values.',
    'min' => [
        'array' => 'The value must have at least :min items.',
        'file' => 'The file size must be at least :min kilobytes.',
        'numeric' => 'The value must be at least :min.',
        'string' => 'The string must be at least :min characters.',
    ],
    'multiple_of' => 'Thamani lazima kuwa nyingi ya :value',
    'not_in' => 'Kuchaguliwa thamani ni batili.',
    'not_regex' => 'Muundo huu ni batili.',
    'numeric' => 'Hii ni lazima kuwa na idadi.',
    'password' => 'Password ni sahihi.',
    'present' => 'Uwanja huu lazima kuwa sasa.',
    'prohibited' => 'Huu uwanja ni marufuku.',
    'prohibited_if' => 'Huu uwanja ni marufuku wakati :other ni :value.',
    'prohibited_unless' => 'Huu uwanja ni marufuku isipokuwa :other ni katika :values.',
    'prohibits' => 'This field prohibits :other from being present.',
    'regex' => 'Muundo huu ni batili.',
    'relatable' => 'Uwanja huu inaweza kuwa kuhusishwa na rasilimali hii.',
    'required' => 'Uwanja huu ni required.',
    'required_if' => 'Uwanja huu ni required wakati :other ni :value.',
    'required_unless' => 'Uwanja huu ni required isipokuwa :other ni katika :values.',
    'required_with' => 'Uwanja huu ni required wakati :values ni sasa.',
    'required_with_all' => 'Uwanja huu ni required wakati :values ni sasa.',
    'required_without' => 'Uwanja huu ni required wakati :values ni si sasa.',
    'required_without_all' => 'Uwanja huu ni required wakati hakuna hata mmoja wa :values ni sasa.',
    'same' => 'Thamani ya shamba hili lazima mechi moja kutoka :other.',
    'size' => [
        'array' => 'The content must contain :size items.',
        'file' => 'The file size must be :size kilobytes.',
        'numeric' => 'The value must be :size.',
        'string' => 'The string must be :size characters.',
    ],
    'starts_with' => 'Hii lazima kuanza na moja ya yafuatayo: :values.',
    'string' => 'Hii ni lazima kuwa na kamba.',
    'timezone' => 'Hii ni lazima kuwa halali wa eneo.',
    'unique' => 'Hii tayari kuchukuliwa.',
    'uploaded' => 'Hii imeshindwa kupakia.',
    'url' => 'Muundo huu ni batili.',
    'uuid' => 'Hii ni lazima kuwa halali UUID.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];

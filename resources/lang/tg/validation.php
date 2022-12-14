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
    'accepted' => 'Қиммати :attribute бояд қабул карда шавад.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'Қиммати :attribute дорои URL-и нодуруст мебошад.',
    'after' => 'Қиммати :attribute бояд санаи баъд аз :date бошад.',
    'after_or_equal' => 'Қиммати :attribute бояд санаи баъд ё баробари :date бошад.',
    'alpha' => 'Қиммати :attribute метавонад танҳо дорои ҳарфҳои алифо бошад.',
    'alpha_dash' => 'Қиммати :attribute метавонад танҳо дорои ҳарфҳои алифо, ададҳо ва хати тире бошад.',
    'alpha_num' => 'Қиммати :attribute метавонад танҳо дорои ҳарфҳои алифо ва ададҳо бошад',
    'array' => 'Қиммати :attribute бояд, ки массив бошад.',
    'attached' => 'Ин :attribute аллакай прикреплен.',
    'before' => 'Қиммати :attribute бояд санаи қабл аз :date бошад.',
    'before_or_equal' => 'Қиммати :attribute бояд санаи қабл ё баробари :date бошад.',
    'between' => [
        'array' => 'Миқдори элементҳо дар :attribute бояд байни :min ва :max бошад.',
        'file' => 'Ҳаҷми файл дар :attribute бояд байни :min ва :max килобайт бошад.',
        'numeric' => 'Қиммати :attribute бояд байни :min ва :max бошад.',
        'string' => 'Миқдори аломатҳо дар :attribute бояд байни :min ва :max бошад.',
    ],
    'boolean' => 'Қиммати :attribute бояд логикӣ дошта бошад.',
    'confirmed' => 'Қиммати :attribute бо қиммати тасдиқотӣ мувофиқат надорад.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Қиммати :attribute санаи нодуруст мебошад.',
    'date_equals' => ':attribute бояд санаи, баробар :date.',
    'date_format' => 'Қиммати :attribute бо формати :format мувофиқат намекунад.',
    'different' => 'Қимматҳои :attribute ва :other бояд аз ҳам фарқ кунанд.',
    'digits' => 'Қиммати :attribute бояд :digits рақам дошта бошад.',
    'digits_between' => 'Қиммати :attribute бояд байни :min ва :max рақам дошта бошад.',
    'dimensions' => 'Қиммати :attribute дорои андозаи расми нодуруст мебошад.',
    'distinct' => ':attribute дорои қиммати такроршаванда мебошад.',
    'email' => 'Қиммати :attribute бояд суроғаи электронии дуруст бошад.',
    'ends_with' => 'Рақами :attribute бояд заканчиваться яке аз зерин: :values.',
    'exists' => 'Қиммати интихобкардаи :attribute нодуруст мебошад.',
    'file' => 'Қиммати :attribute бояд файл бошад.',
    'filled' => ':attribute бояд дорои қиммат бошад.',
    'gt' => [
        'array' => 'The :attribute must have more than :value items.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
    ],
    'image' => 'Қиммати :attribute бояд расм бошад.',
    'in' => 'Қиммати интихобкардаи :attribute нодуруст мебошад.',
    'in_array' => 'Қиммати :attribute дар :other мавҷуд нест.',
    'integer' => 'Қиммати :attribute бояд адади бутун бошад.',
    'ip' => 'Қиммати :attribute бояд суроғаи дурусти IP бошад.',
    'ipv4' => ':attribute бояд дархост эътибор дорад IPv4-суроғаи.',
    'ipv6' => ':attribute бояд дархост эътибор дорад IPv6-суроғаи.',
    'json' => 'Қиммати :attribute бояд сатри дурусти JSON бошад.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal :value.',
        'string' => 'The :attribute must be less than or equal :value characters.',
    ],
    'max' => [
        'array' => 'Миқдори элементҳо дар :attribute бояд на зиёда аз :max бошад.',
        'file' => 'Ҳаҷми файл дар :attribute набояд аз :max Килобайт зиёд бошад.',
        'numeric' => 'Қиммати :attribute набояд аз :max зиёд бошад.',
        'string' => 'Миқдори аломатҳо дар :attribute бояд на зиёда аз :max бошад.',
    ],
    'mimes' => ':attribute бояд файли намуди :values бошад.',
    'mimetypes' => ':attribute бояд файли намуди :values бошад.',
    'min' => [
        'array' => 'Миқдори элементҳо дар :attribute бояд на кам аз :min бошад.',
        'file' => 'Ҳаҷми файл дар :attribute набояд аз :min Килобайт хурд бошад.',
        'numeric' => 'Қиммати :attribute набояд аз :min хурд бошад.',
        'string' => 'Миқдори аломатҳо дар :attribute бояд на кам аз :min бошад.',
    ],
    'multiple_of' => 'Шумораи :attribute бояд multiples :value',
    'not_in' => 'Қиммати интихобкардаи :attribute нодуруст мебошад.',
    'not_regex' => 'Формати :attribute недопустим.',
    'numeric' => 'Қиммати :attribute бояд адад бошад.',
    'password' => 'Рамз неверный.',
    'present' => 'Қиммати :attribute бояд мавҷуд бошад.',
    'prohibited' => 'Майдони :attribute сол манъ аст.',
    'prohibited_if' => 'Майдони :attribute манъ аст, аст, вақте ки :other баробар :value.',
    'prohibited_unless' => 'Майдони :attribute манъ аст, агар танҳо :other аст, дар :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'Формати :attribute нодуруст мебошад.',
    'relatable' => 'Ин :attribute мумкин нест, вобаста ба ин захираҳо.',
    'required' => ':attribute бояд дорои қиммат бошад.',
    'required_if' => ':attribute бояд дорои қиммат бошад агар :other ба :value баробар бошад.',
    'required_unless' => ':attribute бояд дорои қиммат бошад агар :other дар :values мавҷуд бошад.',
    'required_with' => ':attribute бояд дорои қиммат бошад :values мавҷуд бошад.',
    'required_with_all' => ':attribute бояд дорои қиммат бошад агар :values мавҷуд бошанд.',
    'required_without' => ':attribute бояд дорои қиммат бошад агар :values мавҷуд набошад.',
    'required_without_all' => ':attribute бояд дорои қиммат бошад агар ягон :values мавҷуд набошад.',
    'same' => 'Қиммати :attribute ва :other бояд баробар бошанд.',
    'size' => [
        'array' => 'Миқдори элементҳо дар :attribute бояд :size бошад.',
        'file' => 'Ҳаҷми файл дар :attribute бояд :size Килобайт бошад.',
        'numeric' => 'Қиммати :attribute бояд ба :size баробар бошад.',
        'string' => 'Миқдори аломатҳо дар :attribute бояд :size бошад.',
    ],
    'starts_with' => ':attribute бояд оғоз бо яке аз арзишҳои зерин: :values.',
    'string' => 'Қиммати :attribute бояд сатр бошад.',
    'timezone' => 'Қиммати :attribute бояд зонаи дуруст бошад.',
    'unique' => 'Қиммати :attribute қаблан интихоб шудааст.',
    'uploaded' => 'Боркунии :attribute ба хатогӣ дучор шуд.',
    'url' => 'Формати :attribute нодуруст мебошад.',
    'uuid' => ':attribute бояд дархост эътибор дорад UUID.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];

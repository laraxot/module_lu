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
    'accepted' => ':attribute ни қабул қилишингиз керак.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => ':attribute га нотўғри URL киритилди.',
    'after' => ':attribute да сана :date дан кейин бўлиши керак.',
    'after_or_equal' => ':attribute да сана :date га тенг ёки ундан кейин бўлиши керак.',
    'alpha' => ':attribute фақат ҳарфларни қабул қилиши мумкин.',
    'alpha_dash' => ':attribute фақат ҳарфлар, сонлар ва чизиқчаларни қабул қилиши мумкин.',
    'alpha_num' => ':attribute фақат ҳарфлар ва сонларни қабул қилиши мумкин.',
    'array' => ':attribute қатордан иборат бўлиши керак.',
    'attached' => 'Bu :attribute allaqachon biriktirilgan.',
    'before' => ':attribute да сана :date гача бўлиши керак.',
    'before_or_equal' => ':attribute да сана :date га тенг ёки ундан олдин бўлиши керак.',
    'between' => [
        'array' => ':attribute даги элементлар сони :min ва :max орасида бўлиши керак.',
        'file' => ':attribute даги файлнинг ҳажми :min ва :max килобайт орасида бўлиши керак.',
        'numeric' => ':attribute нинг қиймати :min ва :max орасида бўлиши керак.',
        'string' => ':attribute даги белгилар сони :min ва :max орасида бўлиши керак.',
    ],
    'boolean' => ':attribute майдони фақат мантиқий қийматни қабул қилади.',
    'confirmed' => ':attribute тасдиқлангани билан мос келмади.',
    'current_password' => 'The password is incorrect.',
    'date' => ':attribute сана эмас.',
    'date_equals' => ':attribute сана :date га тенг бўлиши керак.',
    'date_format' => ':attribute майдони :format форматга мос келмади.',
    'different' => ':attribute ва :other майдонлари фарқли бўлиши керак.',
    'digits' => ':attribute :digits рақамдан иборат бўлиши керак.',
    'digits_between' => ':attribute узунлиги :min ва :max орасида бўлиши керак.',
    'dimensions' => ':attribute нотўғри тасвир ўлчамларга эга.',
    'distinct' => ':attribute майдони такрорланувчи қийматлардан иборат.',
    'email' => ':attribute ҳақиқий электрон почта манзили бўлиши керак.',
    'ends_with' => ':attribute қуйидаги қийматларнинг бири билан тугаши керак: :values.',
    'exists' => ':attribute учун танланган қиймат нотўғри.',
    'file' => ':attribute файл бўлиши керак.',
    'filled' => ':attribute майдони тўлдирилиши шарт.',
    'gt' => [
        'array' => ':attribute даги элементлар сони :value дан катта бўлиши керак.',
        'file' => ':attribute файл ҳажми :value килобайтдан катта бўлиши керак.',
        'numeric' => ':attribute майдони :value дан катта бўлиши керак.',
        'string' => ':attribute даги белгилар сони :value дан катта бўлиши керак.',
    ],
    'gte' => [
        'array' => ':attribute даги элементлар сони :value дан катта ёки тенг бўлиши керак.',
        'file' => ':attribute файл ҳажми :value килобайтдан катта ёки тенг бўлиши керак.',
        'numeric' => ':attribute майдони :value дан катта ёки тенг бўлиши керак.',
        'string' => ':attribute даги белгилар сони :value дан катта ёки тенг бўлиши керак.',
    ],
    'image' => ':attribute майдони тасвир (расм) бўлиши керак.',
    'in' => ':attribute учун танланган қиймат хато.',
    'in_array' => ':attribute майдонининг қиймати :other да мавжуд эмас.',
    'integer' => ':attribute бутун сон бўлиши керак.',
    'ip' => ':attribute ҳақиқий IP манзил бўлиши керак.',
    'ipv4' => ':attribute ҳақиқий IPv4 манзил бўлиши керак.',
    'ipv6' => ':attribute ҳақиқий IPv6 манзил бўлиши керак.',
    'json' => ':attribute JSON қатори бўлиши керак.',
    'lt' => [
        'array' => ':attribute даги элементлар сони :value дан кичик бўлиши керак.',
        'file' => ':attribute даги файл ҳажми :value килобайтдан кичик бўлиши керак.',
        'numeric' => ':attribute майдони :value дан кичик бўлиши керак.',
        'string' => ':attribute даги белгилар сони :value дан кичик бўлиши керак.',
    ],
    'lte' => [
        'array' => ':attribute даги элементлар сони :value дан кичик ёки тенг бўлиши керак.',
        'file' => ':attribute файл ҳажми :value килобайтдан кичик ёки тенг бўлиши керак.',
        'numeric' => ':attribute майдони :value дан кичик ёки тенг бўлиши керак.',
        'string' => ':attribute даги белгилар сони :value дан кичик ёки тенг бўлиши керак.',
    ],
    'max' => [
        'array' => ':attribute нинг элементлар сони :max тадан ошмаслиги керак.',
        'file' => ':attribute даги файлнинг ҳажми :max килобайтдан ошмаслиги керак.',
        'numeric' => ':attribute нинг қиймати :max дан ошмаслиги керак.',
        'string' => ':attribute нинг белгилар сони :max тадан ошмаслиги керак.',
    ],
    'mimes' => ':attribute даги файл қуйидаги турлардан бири бўлиши керак: :values.',
    'mimetypes' => ':attribute даги файл қуйидаги турлардан бири бўлиши керак: :values.',
    'min' => [
        'array' => ':attribute даги элементлар сони :min тадан кам бўлмаслиги керак.',
        'file' => ':attribute даги файлнинг ҳажми :min килобайтдан кам бўлмаслиги керак.',
        'numeric' => ':attribute нинг қиймати :min дан кам бўлмаслиги керак.',
        'string' => ':attribute даги белгилар сони :min тадан кам бўлмаслиги керак.',
    ],
    'multiple_of' => ':attribute bir nechta :value bo\'lishi kerak',
    'not_in' => ':attribute учун танланган қиймат хато.',
    'not_regex' => ':attribute учун танланган формат хато.',
    'numeric' => ':attribute майдони сон бўлиши керак.',
    'password' => 'Нотўғри парол.',
    'present' => ':attribute майдони кўрсатилиши керак.',
    'prohibited' => ':attribute maydon taqiqlanadi.',
    'prohibited_if' => ':attribute maydoni :other :value bo\'lganda taqiqlanadi.',
    'prohibited_unless' => ':attribute da :other bo\'lmasa :values maydon taqiqlanadi.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => ':attribute майдони хато форматда.',
    'relatable' => 'Ushbu :attribute ushbu resurs bilan bog\'liq bo\'lmasligi mumkin.',
    'required' => ':attribute майдони тўлдирилиши шарт.',
    'required_if' => ':other майдони :value га тенг бўлса, :attribute майдони тўлдирилиши шарт.',
    'required_unless' => ':other майдони :values га тенг бўлмаса, :attribute майдони тўлдирилиши шарт.',
    'required_with' => ':values кўрсатилган бўлса, :attribute майдони тўлдирилиши шарт.',
    'required_with_all' => ':values кўрсатилган бўлса, :attribute майдони тўлдирилиши шарт.',
    'required_without' => ':values кўрсатилмаган бўлса, :attribute майдони тўлдирилиши шарт.',
    'required_without_all' => ':values лардан ҳеч бири кўрсатилмаган бўлса, :attribute майдони тўлдирилиши шарт.',
    'same' => ':attribute нинг қиймати :other билан бир хил бўлиши керак.',
    'size' => [
        'array' => ':attribute даги элементлар сони :size га тенг бўлиши керак.',
        'file' => ':attribute даги файлнинг ҳажми :size килобайтга тенг бўлиши керак.',
        'numeric' => ':attribute қиймати :size га тенг бўлиши керак.',
        'string' => ':attribute даги белгилар сони :size га тенг бўлиши керак.',
    ],
    'starts_with' => ':attribute қуйидаги қийматлардан бири билан бошланиши керак: :values.',
    'string' => ':attribute қатор бўлиши керак.',
    'timezone' => ':attribute нинг қиймати мавжуд вақт минтақаси бўлиши керак.',
    'unique' => ':attribute майдонининг бундай қиймати мавжуд. Илтимос бошқа қиймат киритинг.',
    'uploaded' => ':attribute ни юклаш муваффақиятли амалга ошмади.',
    'url' => ':attribute нотўғри форматга эга.',
    'uuid' => ':attribute тўғри UUID қийматга эга бўлиши керак.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];

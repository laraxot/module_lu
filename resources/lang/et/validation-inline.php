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
    'accepted' => 'See väli tuleb aktsepteerida.',
    'accepted_if' => 'See väli tuleb aktsepteerida kui :other väärtus on :value.',
    'active_url' => 'See ei ole kehtiv URL.',
    'after' => 'See peab olema kuupäev pärast :date.',
    'after_or_equal' => 'See peab olema kuupäev pärast või võrdne :date.',
    'alpha' => 'See väli võib sisaldada ainult tähti.',
    'alpha_dash' => 'See väli võib sisaldada ainult tähti, numbreid, kriipse ja alakriipsusid.',
    'alpha_num' => 'See väli võib sisaldada ainult tähti ja numbreid.',
    'array' => 'See väli peab olema massiiv.',
    'attached' => 'See väli on juba lisatud.',
    'before' => 'See peab olema Kuupäev enne :date.',
    'before_or_equal' => 'See peab olema kuupäev enne või võrdne :date.',
    'between' => [
        'array' => 'See sisu peab koosnema :min kuni :max elemendist.',
        'file' => 'Faili suurus peab olema :min kuni :max kilobaiti.',
        'numeric' => 'See väärtus peab jääma :min ja :max vahele.',
        'string' => 'Selle teksti pikkus peab jääma :min ja :max tähemärgi vahele.',
    ],
    'boolean' => 'See väli peab olema tõene või vale.',
    'confirmed' => 'Kinnitus ei sobi.',
    'current_password' => 'Parool on vale.',
    'date' => 'See ei ole kehtiv kuupäev.',
    'date_equals' => 'See peab olema kuupäev, mis võrdub :date-ga.',
    'date_format' => 'See ei vasta vormingule :format.',
    'different' => 'See väärtus peab olema erinev :other.',
    'digits' => 'See peab olema :digits numbrit.',
    'digits_between' => 'See peab olema vahemikus :min kuni :max numbrit.',
    'dimensions' => 'Sellel pildil on kehtetud mõõtmed.',
    'distinct' => 'Sellel väljal on duplikaadi väärtus.',
    'email' => 'See peab olema kehtiv e-posti aadress.',
    'ends_with' => 'See peab lõppema ühega järgmistest: :values.',
    'exists' => 'Valitud väärtus on vigane.',
    'file' => 'Sisu peab olema fail.',
    'filled' => 'Sellel väljal peab olema väärtus.',
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
    'image' => 'See peab olema pilt.',
    'in' => 'Valitud väärtus on vigane.',
    'in_array' => 'See väärtus ei eksisteeri :other.',
    'integer' => 'See peab olema täisarv.',
    'ip' => 'See peab olema kehtiv IP-aadress.',
    'ipv4' => 'See peab olema kehtiv IPv4 aadress.',
    'ipv6' => 'See peab olema kehtiv IPv6 aadress.',
    'json' => 'See peab olema kehtiv JSON string.',
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
    'mimes' => 'See peab olema faili tüüp: :values.',
    'mimetypes' => 'See peab olema faili tüüp: :values.',
    'min' => [
        'array' => 'The value must have at least :min items.',
        'file' => 'The file size must be at least :min kilobytes.',
        'numeric' => 'The value must be at least :min.',
        'string' => 'The string must be at least :min characters.',
    ],
    'multiple_of' => 'Väärtus peab olema :value Kordne',
    'not_in' => 'Valitud väärtus on vigane.',
    'not_regex' => 'See vorming on vigane.',
    'numeric' => 'See peab olema number.',
    'password' => 'Parool on vale.',
    'present' => 'See väli peab olema kohal.',
    'prohibited' => 'See väli on keelatud.',
    'prohibited_if' => 'See väli on keelatud, kui :other on :value.',
    'prohibited_unless' => 'See väli on keelatud, välja arvatud juhul, kui :other on :valuesis.',
    'prohibits' => 'This field prohibits :other from being present.',
    'regex' => 'See vorming on vigane.',
    'relatable' => 'See väli ei pruugi olla seotud selle ressursiga.',
    'required' => 'See väli on vajalik.',
    'required_if' => 'See väli on vajalik, kui :other on :value.',
    'required_unless' => 'See väli on nõutav, välja arvatud juhul, kui :other on :values-s.',
    'required_with' => 'See väli on vajalik, kui :values on olemas.',
    'required_with_all' => 'See väli on vajalik, kui kohal on :values.',
    'required_without' => 'See väli on vajalik, kui :values ei ole olemas.',
    'required_without_all' => 'See väli on nõutav, kui ükski :values-St ei ole kohal.',
    'same' => 'Selle välja väärtus peab vastama :other-le.',
    'size' => [
        'array' => 'The content must contain :size items.',
        'file' => 'The file size must be :size kilobytes.',
        'numeric' => 'The value must be :size.',
        'string' => 'The string must be :size characters.',
    ],
    'starts_with' => 'See peab algama ühega järgmistest: :values.',
    'string' => 'See peab olema string.',
    'timezone' => 'See peab olema kehtiv tsoon.',
    'unique' => 'See on juba võetud.',
    'uploaded' => 'Üleslaadimine nurjus.',
    'url' => 'See vorming on vigane.',
    'uuid' => 'See peab olema kehtiv UUID.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];

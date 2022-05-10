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
    'accepted' => 'Reiturinn :attribute verður að vera samþykktur.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'Reiturinn :attribute er ekki leyfileg vefslóð.',
    'after' => 'Reiturinn :attribute verður að vera dagsetning eftir :date.',
    'after_or_equal' => ':attribute verður að vera dagsetning eftir eða sú sama og :date.',
    'alpha' => 'Reiturinn :attribute má aðeins innihalda bókstafi.',
    'alpha_dash' => 'Reiturinn :attribute má aðeins innihalda bókstafi, tölur og undirstikanir.',
    'alpha_num' => 'Reiturinn :attribute má aðeins innihalda bókstafi og tölur.',
    'array' => 'Reiturinn :attribute verður að vera fylki.',
    'attached' => 'Þetta :attribute er nú þegar fylgir.',
    'before' => 'Reiturinn :attribute verður að vera dagsetning eftir :date.',
    'before_or_equal' => ':attribute verður að vera dagsetning fyrir eða sú samaog :date.',
    'between' => [
        'array' => 'Reiturinn :attribute verður að vera á milli :min - :max staka.',
        'file' => 'Reiturinn :attribute verður að vera á milli :min - :max kílóbæta.',
        'numeric' => 'Reiturinn :attribute verður að vera á milli :min - :max.',
        'string' => 'Reiturinn :attribute verður að vera á milli :min - :max stafa.',
    ],
    'boolean' => 'Reiturinn :attribute verður að vera réttur eða rangur.',
    'confirmed' => 'Staðfesting á reitnum :attribute passar ekki.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Reiturinn :attribute er ekki rétt dagsetning.',
    'date_equals' => ':attribute verður að vera dagsetning sem er sú sama og :date.',
    'date_format' => 'Reiturinn :attribute passar ekki við :format.',
    'different' => 'Reiturinn :attribute og :other verða að vera ólíkir.',
    'digits' => 'Reiturinn :attribute verður að vera :digits tölustafir.',
    'digits_between' => 'Reiturinn :attribute verður að vera á milli :min og :max tölustafa.',
    'dimensions' => ':attribute hefur ógilda myndvídd.',
    'distinct' => ':attribute reiturinn hefur tvítekið gildi.',
    'email' => 'Reiturinn :attribute snið netfangsins er ekki rétt.',
    'ends_with' => 'Við :attribute verður að enda með eftirfarandi: :values.',
    'exists' => 'Reiturinn :attribute er nú þegar til.',
    'file' => ':attribute verður að vera skrá.',
    'filled' => 'Reiturinn :attribute verður að innihalda eitthvað.',
    'gt' => [
        'array' => ':attribute verður að hafa fleiri en :value atriði.',
        'file' => ':attribute verður að vera stærra en :value kílóbæti.',
        'numeric' => ':attribute verður að vera stærra en :value.',
        'string' => ':attribute verður að vera lengri en :value stafir.',
    ],
    'gte' => [
        'array' => ':attribute verður að hafa :value eða fleiri atriði.',
        'file' => ':attribute verður að vera stærra en eða jafnt :value kílóbætum.',
        'numeric' => ':attribute verður að vera stærra en eða jafnt :value.',
        'string' => ':attribute verður að vera lengri eða jafnlangur og :value stafir.',
    ],
    'image' => 'Reiturinn :attribute verður að vera mynd.',
    'in' => 'Reiturinn :attribute er ekki réttur.',
    'in_array' => ':attribute reiturinn er ekki til í :other.',
    'integer' => 'Reiturinn :attribute verður að vera tala.',
    'ip' => 'Reiturinn :attribute verður að vera lögleg IP-tala.',
    'ipv4' => ':attribute verður að vera gild IPv4-tala.',
    'ipv6' => ':attribute verður að vera gild IPv6-tala.',
    'json' => ':attribute verður að vera gildur JSON-strengur.',
    'lt' => [
        'array' => ':attribute verður að hafa færri en :value atriði.',
        'file' => ':attribute verður að vera minni en :value kílóbæti.',
        'numeric' => ':attribute verður að vera minni en :value.',
        'string' => ':attribute verður að vera styttri en :value stafir.',
    ],
    'lte' => [
        'array' => ':attribute má ekki hafa fleiri en :value atriði.',
        'file' => ':attribute verður að vera minni eða jafnstór og :value kílóbæti.',
        'numeric' => ':attribute verður að vera minna en eða jafnt :value.',
        'string' => ':attribute verður að vera styttri eða jafnlangur og :value stafir.',
    ],
    'max' => [
        'array' => 'Reiturinn :attribute verður að innihalda færri en :max stök.',
        'file' => 'Reiturinn :attribute verður að vera minni en :max kílóbæt.',
        'numeric' => 'Reiturinn :attribute verður að innihalda færri stafi en :max.',
        'string' => 'Reiturinn :attribute verður að innihalda færri en :max stafi.',
    ],
    'mimes' => 'Reiturinn :attribute verður að vera skrá af gerðinni: :values.',
    'mimetypes' => 'Reiturinn :attribute verður að vera skrá af gerðinni: :values.',
    'min' => [
        'array' => 'Reiturinn :attribute verður að vera að lágmarki :min stök.',
        'file' => 'Reiturinn :attribute verður að vera að lágmarki :min kílóbæt.',
        'numeric' => 'Reiturinn :attribute verður að vera að lágmarki :min tölustafir.',
        'string' => 'Reiturinn :attribute verður að vera að lágmarki :min stafir.',
    ],
    'multiple_of' => 'Við :attribute verður að vera margar af :value',
    'not_in' => 'Reiturinn :attribute er ógildur.',
    'not_regex' => ':attribute sniðið er ógilt.',
    'numeric' => 'Reiturinn :attribute verður að vera tala.',
    'password' => 'Lykilorð er rangt.',
    'present' => ':attribute reiturinn verður að vera til staðar.',
    'prohibited' => 'Við :attribute sviði er bannað.',
    'prohibited_if' => 'Við :attribute sviði er bannað þegar :other er :value.',
    'prohibited_unless' => 'Við :attribute sviði er bönnuð nema :other er í :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'Reiturinn :attribute er ekki á réttu formi.',
    'relatable' => 'Þetta :attribute getur ekki tengst þessu úrræði.',
    'required' => 'Reiturinn :attribute er nauðsynlegur.',
    'required_if' => 'Reiturinn :attribute er nauðsynlegur þegar :other er :value.',
    'required_unless' => ':attribute er áskilinn nema :other sé í :values.',
    'required_with' => ':attribute er áskilinn þegar :values er til staðar.',
    'required_with_all' => ':attribute er áskilinn þegar :values er til staðar.',
    'required_without' => ':attribute er áskilinn þegar :values er ekki til staðar.',
    'required_without_all' => ':attribute reiturinn er áskilinn þegar engin af :values eru til staðar.',
    'same' => 'Reiturinn :attribute og :other verða að stemma.',
    'size' => [
        'array' => 'Reiturinn :attribute verður að innihalda :size hluti.',
        'file' => 'Reiturinn :attribute verður að vera :size kílóbæt.',
        'numeric' => 'Reiturinn :attribute verður að vera :size.',
        'string' => 'Reiturinn :attribute verður að vera :size stafir.',
    ],
    'starts_with' => ':attribute verður að byrja á einu af eftirfarandi: :values',
    'string' => ':attribute verður að vera strengur.',
    'timezone' => 'Reiturinn :attribute verður að vera rétt tímabelti.',
    'unique' => 'Reiturinn :attribute er því miður ekki leyfilegur. Það er annar eins.',
    'uploaded' => 'Ekki tókst að hlaða :attribute upp.',
    'url' => 'Reiturinn :attribute verður að vera netslóð.',
    'uuid' => ':attribute verður að vera gilt UUID.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];

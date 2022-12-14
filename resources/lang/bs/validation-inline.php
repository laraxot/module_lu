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
    'accepted' => 'Ovo polje mora biti prihvaćeno.',
    'accepted_if' => 'This field must be accepted when :other is :value.',
    'active_url' => 'Ovo nije važeći URL.',
    'after' => 'Ovo mora da je datum nakon :date.',
    'after_or_equal' => 'Ovo mora biti Datum nakon ili jednak :date.',
    'alpha' => 'Ovo polje može samo sadržavati pisma.',
    'alpha_dash' => 'Ovo polje može sadržavati samo slova, brojeve, crtice i podvlake.',
    'alpha_num' => 'Ovo polje može sadržavati samo slova i brojeve.',
    'array' => 'Ovo polje mora da je mreža.',
    'attached' => 'Ovo polje je već spojeno.',
    'before' => 'Ovo mora da je datum pre :date.',
    'before_or_equal' => 'Ovo mora biti datum prije ili jednako :date.',
    'between' => [
        'array' => 'This content must have between :min and :max items.',
        'file' => 'This file must be between :min and :max kilobytes.',
        'numeric' => 'This value must be between :min and :max.',
        'string' => 'This string must be between :min and :max characters.',
    ],
    'boolean' => 'Ovo polje mora da je istina ili laž.',
    'confirmed' => 'Potvrda se ne poklapa.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Ovo nije važeći sastanak.',
    'date_equals' => 'Ovo mora biti Datum jednako :date.',
    'date_format' => 'Ovo ne odgovara formatu :format.',
    'different' => 'Ova vrijednost mora biti drugačija od :other.',
    'digits' => 'Ovo mora da je :digits cifara.',
    'digits_between' => 'Ovo mora da je između :min i :max cifara.',
    'dimensions' => 'Ova slika je nevažeće veličine',
    'distinct' => 'Ovo polje ima duplu vrijednost.',
    'email' => 'Ovo mora da je važeća email adresa.',
    'ends_with' => 'Ovo mora da se završi sa jednim od sledećih: :values.',
    'exists' => 'Izabrana vrijednost nije ispravna.',
    'file' => 'Sadržaj mora biti datoteka.',
    'filled' => 'Ovo polje mora imati vrijednost.',
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
    'image' => 'Ovo mora da je slika.',
    'in' => 'Izabrana vrijednost nije ispravna.',
    'in_array' => 'Ova vrijednost ne postoji u :other.',
    'integer' => 'Ovo mora da je cijeli broj.',
    'ip' => 'Ovo mora da je važeća IP adresa.',
    'ipv4' => 'Ovo mora da je važeća IPv4 adresa.',
    'ipv6' => 'Ovo mora da je važeća IPv6 adresa.',
    'json' => 'Ovo mora da je valjani JSON string.',
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
    'mimes' => 'Ovo mora da je fajl tipa: :values.',
    'mimetypes' => 'Ovo mora da je datoteka tipa :values.',
    'min' => [
        'array' => 'The value must have at least :min items.',
        'file' => 'The file size must be at least :min kilobytes.',
        'numeric' => 'The value must be at least :min.',
        'string' => 'The string must be at least :min characters.',
    ],
    'multiple_of' => 'Vrijednost je :value.',
    'not_in' => 'Izabrana vrijednost nije ispravna.',
    'not_regex' => 'Ovaj format je nevažeći.',
    'numeric' => 'Ovo mora da je broj.',
    'password' => 'Pogrešna šifra.pogrešna šifra.',
    'present' => 'Ovo polje mora biti prisutno.',
    'prohibited' => 'To polje je zabranjeno.',
    'prohibited_if' => 'Ovo polje je zabranjeno kada je :other :value.',
    'prohibited_unless' => 'To polje je zabranjeno osim ako :other ne bude u :values.',
    'prohibits' => 'This field prohibits :other from being present.',
    'regex' => 'Ovaj format je nevažeći.',
    'relatable' => 'Ovo polje možda nije povezano sa ovim resursom.',
    'required' => 'Ovo polje je potrebno.',
    'required_if' => 'Ovo polje je potrebno kada :other je :value.',
    'required_unless' => 'Ovo polje je potrebno osim ako je :other u :values.',
    'required_with' => 'Ovo polje je potrebno kada je :values prisutan.',
    'required_with_all' => 'Ovo polje je potrebno kada :values bude prisutno.',
    'required_without' => 'Ovo polje je potrebno kada :values nije prisutan.',
    'required_without_all' => 'Ovo polje je potrebno kada niko od :values nije prisutan.',
    'same' => 'Vrijednost ovog polja mora odgovarati onoj iz :other.',
    'size' => [
        'array' => 'The content must contain :size items.',
        'file' => 'The file size must be :size kilobytes.',
        'numeric' => 'The value must be :size.',
        'string' => 'The string must be :size characters.',
    ],
    'starts_with' => 'Ovo mora početi sa jednim od slijedećih: :values.',
    'string' => 'Ovo mora da je žica.',
    'timezone' => 'Ovo mora da je valjana zona.',
    'unique' => 'Ovo je već slikano.',
    'uploaded' => 'To nije uspjelo upload.',
    'url' => 'Ovaj format je nevažeći.',
    'uuid' => 'Ovo mora da je valjani UUID.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];

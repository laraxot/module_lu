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
    'accepted' => 'Dette felt skal accepteres.',
    'accepted_if' => 'This field must be accepted when :other is :value.',
    'active_url' => 'Dette er ikke en gyldig URLEBADRESSE.',
    'after' => 'Dette skal være en dato efter :date.',
    'after_or_equal' => 'Dette skal være en dato efter eller lig med :date.',
    'alpha' => 'Dette felt må kun indeholde bogstaver.',
    'alpha_dash' => 'Dette felt må kun indeholde bogstaver, tal, bindestreger og understregninger.',
    'alpha_num' => 'Dette felt må kun indeholde bogstaver og tal.',
    'array' => 'Dette felt skal være et array.',
    'attached' => 'Dette felt er allerede vedhæftet.',
    'before' => 'Dette skal være en dato før :date.',
    'before_or_equal' => 'Dette skal være en dato før eller lig med :date.',
    'between' => [
        'array' => 'This content must have between :min and :max items.',
        'file' => 'This file must be between :min and :max kilobytes.',
        'numeric' => 'This value must be between :min and :max.',
        'string' => 'This string must be between :min and :max characters.',
    ],
    'boolean' => 'Dette felt skal være sandt eller falsk.',
    'confirmed' => 'Bekræftelsen stemmer ikke overens.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Dette er ikke en gyldig dato.',
    'date_equals' => 'Dette skal være en dato svarende til :date.',
    'date_format' => 'Dette svarer ikke til formatet :format.',
    'different' => 'Denne værdi skal være forskellig fra :other.',
    'digits' => 'Dette skal være :digits cifre.',
    'digits_between' => 'Dette skal være mellem :min og :max cifre.',
    'dimensions' => 'Dette billede har ugyldige dimensioner.',
    'distinct' => 'Dette felt har en dobbelt værdi.',
    'email' => 'Dette skal være en gyldig e-mail-adresse.',
    'ends_with' => 'Dette skal ende med et af følgende: :values.',
    'exists' => 'Den valgte værdi er ugyldig.',
    'file' => 'Indholdet skal være en fil.',
    'filled' => 'Dette felt skal have en værdi.',
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
    'image' => 'Dette skal være et billede.',
    'in' => 'Den valgte værdi er ugyldig.',
    'in_array' => 'Denne værdi findes ikke i :other.',
    'integer' => 'Dette skal være et helt tal.',
    'ip' => 'Dette skal være en gyldig IP-adresse.',
    'ipv4' => 'Dette skal være en gyldig IPv4-adresse.',
    'ipv6' => 'Dette skal være en gyldig IPv6-adresse.',
    'json' => 'Dette skal være en gyldig JSON-streng.',
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
    'mimes' => 'Dette skal være en fil af typen: :values.',
    'mimetypes' => 'Dette skal være en fil af typen: :values.',
    'min' => [
        'array' => 'The value must have at least :min items.',
        'file' => 'The file size must be at least :min kilobytes.',
        'numeric' => 'The value must be at least :min.',
        'string' => 'The string must be at least :min characters.',
    ],
    'multiple_of' => 'Værdien skal være et multiplum af :value',
    'not_in' => 'Den valgte værdi er ugyldig.',
    'not_regex' => 'Dette format er ugyldigt.',
    'numeric' => 'Det må være et tal.',
    'password' => 'Adgangskoden er forkert.',
    'present' => 'Dette felt skal være til stede.',
    'prohibited' => 'Dette felt er forbudt.',
    'prohibited_if' => 'Dette felt er forbudt, når :other er :value.',
    'prohibited_unless' => 'Dette felt er forbudt, medmindre :other er i :values.',
    'prohibits' => 'This field prohibits :other from being present.',
    'regex' => 'Dette format er ugyldigt.',
    'relatable' => 'Dette felt er muligvis ikke tilknyttet denne ressource.',
    'required' => 'Dette felt er påkrævet.',
    'required_if' => 'Dette felt er påkrævet, når :other er :value.',
    'required_unless' => 'Dette felt er påkrævet, medmindre :other er i :values.',
    'required_with' => 'Dette felt er påkrævet, når :values er til stede.',
    'required_with_all' => 'Dette felt er påkrævet, når :values er til stede.',
    'required_without' => 'Dette felt er påkrævet, når :values ikke er til stede.',
    'required_without_all' => 'Dette felt er påkrævet, når ingen af :values er til stede.',
    'same' => 'Værdien af dette felt skal svare til den fra :other.',
    'size' => [
        'array' => 'The content must contain :size items.',
        'file' => 'The file size must be :size kilobytes.',
        'numeric' => 'The value must be :size.',
        'string' => 'The string must be :size characters.',
    ],
    'starts_with' => 'Dette skal starte med et af følgende: :values.',
    'string' => 'Dette skal være en streng.',
    'timezone' => 'Dette skal være en gyldig zoneone.',
    'unique' => 'Dette er allerede taget.',
    'uploaded' => 'Dette kunne ikke uploades.',
    'url' => 'Dette format er ugyldigt.',
    'uuid' => 'Dette skal være en gyldig UUID.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];

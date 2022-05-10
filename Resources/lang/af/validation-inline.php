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
    'accepted' => 'Hierdie veld moet aanvaar word.',
    'accepted_if' => 'This field must be accepted when :other is :value.',
    'active_url' => 'Hierdie is nie geldige URL.',
    'after' => 'Daar moet n datum na :date wees.',
    'after_or_equal' => 'Daar moet datum gelyk of na :date wees.',
    'alpha' => 'Hierdie veld moet net letters wees.',
    'alpha_dash' => 'Hierdie veld mag slegs letters, syfers, strepies en onderstrepe bevat.',
    'alpha_num' => 'Hierdie veld mag slegs letters en syfers bevat.',
    'array' => 'Hierdie veld moet \'n array wees.',
    'attached' => 'Hierdie veld is reeds aangeheg.',
    'before' => 'Dit moet \'n datum voor :date wees.',
    'before_or_equal' => 'Dit moet \'n datum gelyk of voor :date wees.',
    'between' => [
        'array' => 'Hierdie inhoud moet tussen :min en :max items bevat.',
        'file' => 'Hierdie lêer moet tussen :min en :max kilobytes wees.',
        'numeric' => 'Hierdie waarde moet tussen :min en :max wees.',
        'string' => 'Hierdie string moet tussen :min en :max karakters wees.',
    ],
    'boolean' => 'Hierdie veld moet waar of onwaar wees.',
    'confirmed' => 'Die bevestiging stem nie ooreen nie.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Dit is nie \'n geldige datum nie.',
    'date_equals' => 'Dit moet \'n datum wees wat gelyk is aan :date.',
    'date_format' => 'Dit stem nie ooreen met die :format formaat nie.',
    'different' => 'Hierdie waarde moet verskil van :other.',
    'digits' => 'Dit moet :digits syfers wees.',
    'digits_between' => 'Dit moet tussen :min en :max syfers wees.',
    'dimensions' => 'Hierdie prent het ongeldige afmetings.',
    'distinct' => 'Hierdie veld het \'n duplikaatwaarde.',
    'email' => 'Dit moet \'n geldige e-posadres wees.',
    'ends_with' => 'Dit moet eindig met een van die volgende: :values.',
    'exists' => 'Die geselekteerde waarde is ongeldig.',
    'file' => 'Die inhoud moet \'n lêer wees.',
    'filled' => 'Hierdie veld moet \'n waarde hê.',
    'gt' => [
        'array' => 'Die inhoud moet meer as :value items wees.',
        'file' => 'Die lêergrootte moet groter wees as :value kilobytes.',
        'numeric' => 'Die waarde moet groter wees as :value.',
        'string' => 'Die string moet groter wees as :value karakters.',
    ],
    'gte' => [
        'array' => 'Die inhoud moet :value items of meer hê.',
        'file' => 'Die lêergrootte moet groter as of gelyk aan :value kilobytes wees.',
        'numeric' => 'Die waarde moet groter as of gelyk aan :value wees.',
        'string' => 'Die string moet groter as of gelyk aan :value karakters wees.',
    ],
    'image' => 'Dit moet \'n prent wees.',
    'in' => 'Die geselekteerde waarde is ongeldig.',
    'in_array' => 'Hierdie waarde bestaan nie in :other.',
    'integer' => 'Dit moet \'n heelgetal wees.',
    'ip' => 'Dit moet \'n geldige IP adres wees.',
    'ipv4' => 'Dit moet \'n geldige IPv4-adres wees.',
    'ipv6' => 'Dit moet \'n geldige IPv4-adres wees.',
    'json' => 'Dit moet \'n geldige JSON-string wees.',
    'lt' => [
        'array' => 'Die inhoud moet minder as :value items wees.',
        'file' => 'Die lêergrootte moet kleiner wees as :value kilobytes.',
        'numeric' => 'Die waarde moet kleiner wees as :value.',
        'string' => 'Die string moet minder as wees :value karakters.',
    ],
    'lte' => [
        'array' => 'Die inhoud moet minder as :value items wees.',
        'file' => 'Die lêergrootte moet kleiner as of gelyk aan :value kilobytes wees.',
        'numeric' => 'Die waarde moet kleiner as of gelyk aan :value wees.',
        'string' => 'Die string moet kleiner as of gelyk aan :value karakters wees.',
    ],
    'max' => [
        'array' => 'Die inhoud mag nie meer as :max items wees.',
        'file' => 'Die lêergrootte mag nie groter as :max kilobytes wees.',
        'numeric' => 'Die waarde mag nie groter wees as :max.',
        'string' => 'Die string mag nie groter as :max karakters wees.',
    ],
    'mimes' => 'Dit moet \'n tipe lêer wees: :values.',
    'mimetypes' => 'Dit moet \'n tipe lêer wees: :values.',
    'min' => [
        'array' => 'Die waarde moet ten minste :min items hê.',
        'file' => 'Die lêergrootte moet ten minste :min kilobytes wees.',
        'numeric' => 'Die waarde moet minstens :min wees.',
        'string' => 'Die string moet ten minste :min karakters wees.',
    ],
    'multiple_of' => 'Die waarde moet \'n veelvoud van :value wees',
    'not_in' => 'Die geselekteerde waarde is ongeldig.',
    'not_regex' => 'Hierdie formaat is ongeldig.',
    'numeric' => 'Dit moet \'n nommer wees.',
    'password' => 'Die wagwoord is verkeerd.',
    'present' => 'Hierdie veld moet teenwoordig wees.',
    'prohibited' => 'Hierdie veld is verbode.',
    'prohibited_if' => 'Hierdie veld is verbode wanneer :other is :value.',
    'prohibited_unless' => 'Hierdie veld is verbode, tensy :other is in :values.',
    'prohibits' => 'This field prohibits :other from being present.',
    'regex' => 'Hierdie formaat is ongeldig.',
    'relatable' => 'Hierdie veld kan nie wees wat verband hou met hierdie hulpbron.',
    'required' => 'Hierdie veld word vereis.',
    'required_if' => 'Hierdie veld is nodig wanneer :other :value is.',
    'required_unless' => 'Hierdie veld word vereis tensy :other in :values is.',
    'required_with' => 'Hierdie veld is nodig wanneer :values teenwoordig is.',
    'required_with_all' => 'Hierdie veld is nodig wanneer :values teenwoordig is.',
    'required_without' => 'Hierdie veld is nodig wanneer :values teenwoordig is nie.',
    'required_without_all' => 'Hierdie veld is verpligtend as geen van :values teenwoordig is nie.',
    'same' => 'Die waarde van hierdie veld moet ooreenstem met die van :other.',
    'size' => [
        'array' => 'Die inhoud moet :size items bevat.',
        'file' => 'Die lêergrootte moet :size kilobytes wees.',
        'numeric' => 'Die waarde moet wees :size.',
        'string' => 'Die string moet die grootte karakters bevat.',
    ],
    'starts_with' => 'Dit moet begin met een van die volgende: :values.',
    'string' => 'Dit moet \'n string wees.',
    'timezone' => 'Dit moet \'n geldige sone wees.',
    'unique' => 'Dit is reeds geneem.',
    'uploaded' => 'Kon nie oplaai nie.',
    'url' => 'Die formaat is ongeldig.',
    'uuid' => 'Dit moet geldige UUID wees.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];

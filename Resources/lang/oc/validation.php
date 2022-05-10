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
    'accepted' => 'Lo camp :attribute deu èsser acceptat.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'Lo camp :attribute es pas una URL valida.',
    'after' => 'Lo camp :attribute deu èsser una data posteriora a :date.',
    'after_or_equal' => 'Lo camp :attribute deu èsser una data posteriora o egala a :date.',
    'alpha' => 'Lo camp :attribute a de conténer solament de letras.',
    'alpha_dash' => 'Lo camp :attribute a de conténer solament de letras, nombres e de tirets.',
    'alpha_num' => 'Lo camp :attribute a de conténer solament de letras e nombres.',
    'array' => 'Lo camp :attribute deu èsser un tablèu.',
    'attached' => 'This :attribute is already attached.',
    'before' => 'Lo camp :attribute deu èsser una data anteriora a :date.',
    'before_or_equal' => 'Lo camp :attribute deu èsser una data anteriora o egala a :date.',
    'between' => [
        'array' => 'Lo tablèu :attribute deu aver entre :min e :max elements.',
        'file' => 'La talha de :attribute deu èsser entre :min e :max kiloctets.',
        'numeric' => 'La valor de :attribute deu èsser entre :min e :max.',
        'string' => 'Lo tèxt :attribute deu conténer entre :min e :max caractèrs.',
    ],
    'boolean' => 'Lo camp :attribute deu èsser true o false.',
    'confirmed' => 'Lo camp de confirmacion :attribute correspond pas.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Lo camp :attribute es pas una data valida.',
    'date_equals' => 'Lo camp :attribute deu èsser una data egala a :date.',
    'date_format' => ':attribute correspond pas al format :format.',
    'different' => 'Los camps :attribute e :other devon èsser diferents.',
    'digits' => ':attribute deu èsser un nombre de :digits chifras.',
    'digits_between' => ':attribute deu èsser entre :min e :max chifras.',
    'dimensions' => 'L’imatge :attribute a de dimensions invalidas.',
    'distinct' => 'Lo camp :attribute a un doblon.',
    'email' => ':attribute deu èsser una adreça de corrièl valida.',
    'ends_with' => "Lo camp :attribute deu acabar per una de las valors seguentas\u{202f}: :values",
    'exists' => 'Lo :attribute seleccionat es invalid.',
    'file' => 'Lo camp :attribute deu èsser un fichièr.',
    'filled' => 'Lo camp :attribute deu aver una valor.',
    'gt' => [
        'array' => 'Lo tablèu :attribute deu conténer mai de :value elements.',
        'file' => 'La talha del fichièr de :attribute deu èsser superiora a :value kilo-octets.',
        'numeric' => 'La valor de :attribute deu èsser superiora a :value.',
        'string' => 'Lo tèxt :attribute deu conténer mai de :value caractèrs.',
    ],
    'gte' => [
        'array' => 'Lo tablèu :attribute deu conténer almens :value elements.',
        'file' => 'La talha del fichièr de :attribute deu èsser superiora o egala a :value kilo-octets.',
        'numeric' => 'La valor de :attribute deu èsser superiora o egala a :value.',
        'string' => 'Lo tèxt :attribute deu conténer almens :value caractèrs.',
    ],
    'image' => 'Lo camp :attribute deu èsser un imatge.',
    'in' => 'Lo camp :attribute selecionnat es invalid.',
    'in_array' => 'Lo camp :attribute existís pas dins :other.',
    'integer' => 'Lo camp :attribute deu èsser un nombre entièr.',
    'ip' => 'Lo camp :attribute deu èsser una adreça IP valida.',
    'ipv4' => 'Lo camp :attribute deu èsser una adreça IPv4 valida.',
    'ipv6' => 'Lo camp :attribute deu èsser una adreça IPv6 valida.',
    'json' => 'Lo camp :attribute deu èsser una cadena JSON valida.',
    'lt' => [
        'array' => 'Lo tablèu :attribute deu conténer almens :value elements.',
        'file' => 'La talha del fichièr de :attribute deu èsser inferiora a :value kilo-octets.',
        'numeric' => 'La valor de :attribute deu èsser inferiora a :value.',
        'string' => 'Lo tèxt :attribute deu conténer almens :value caractèrs.',
    ],
    'lte' => [
        'array' => 'Lo tablèu :attribute deu conténer al pus mai :value elements.',
        'file' => 'La talha del fichièr de :attribute deu èsser inferiora o egala :value kilo-octets.',
        'numeric' => 'La valor de :attribute deu èsser inferiora o egala a :value.',
        'string' => 'Lo tèxt :attribute deu conténer al pus mai :value caractèrs.',
    ],
    'max' => [
        'array' => 'Lo tablèu :attribute deu pas conténer mai de :max elements.',
        'file' => 'La talha del fichièr :attribute deu pas èsser superior a :max kiloctets.',
        'numeric' => 'La valor de :attribute deu pas èsser superiora a :max.',
        'string' => 'Lo tèxt :attribute deu èsser superior a :max caractèrs.',
    ],
    'mimes' => "Lo camp :attribute deu èsser un fichièr del tipe\u{202f}: :values.",
    'mimetypes' => "Lo camp :attribute deu èsser un fichièr del tipe\u{202f}: :values.",
    'min' => [
        'array' => 'Lo tablèu :attribute deu conténer almens :min elements.',
        'file' => 'La talha del fichièr de :attribute deu fa almens :min kiloctets.',
        'numeric' => 'La valor de :attribute deu fa almens :min o mai.',
        'string' => 'Lo tèxt :attribute deu fa almens :min caractèrs.',
    ],
    'multiple_of' => 'La valor de :attribute deu èsser un multiple de :value',
    'not_in' => 'Lo camp :attribute seleccionat es invalid.',
    'not_regex' => 'Lo format :attribute es invalid.',
    'numeric' => 'Lo camp :attribute deu èsser un nombre.',
    'password' => 'Lo senhal es incorrèct',
    'present' => 'Lo camp :attribute deu èsser present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'Lo format :attribute es invalid.',
    'relatable' => 'This :attribute may not be associated with this resource.',
    'required' => 'Lo camp :attribute es obligatòri.',
    'required_if' => 'Lo camp :attribute es obligatòri quand :other es :value.',
    'required_unless' => 'Lo camp :attribute es obligatòri levat se :other es dins :values.',
    'required_with' => 'Lo camp :attribute es obligatòri quand :values es present.',
    'required_with_all' => 'Lo camp :attribute es obligatòri quand :values es present.',
    'required_without' => 'Lo camp :attribute es obligatòri quand :values es pas present.',
    'required_without_all' => 'Lo camp :attribute es obligatòri quand cap de :values son presents.',
    'same' => 'Los camps :attribute e :other devon correspondre.',
    'size' => [
        'array' => 'Lo tablèu :attribute deu conténer :size elements.',
        'file' => 'La talha del fichièr de :attribute deu fa :size kiloctets.',
        'numeric' => 'La valor de :attribute deu fa :size.',
        'string' => 'Lo tèxt :attribute deu fa :size caractèrs.',
    ],
    'starts_with' => "Lo camp :attribute deu començar amb una de las valors seguentas\u{202f}: :values",
    'string' => 'Lo camp :attribute deu èsser una cadena de tèxt.',
    'timezone' => 'Lo camp :attribute deu èsser una zòna orària valida.',
    'unique' => 'La valor del camp :attribute es ja presa.',
    'uploaded' => 'Lo fichièr de :attribute a pas pogut s’enviar.',
    'url' => 'Lo format de :attribute es invalid.',
    'uuid' => 'Lo camp :attribute deu èsser un UUID valid',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'messatge-personalizat',
        ],
    ],
];

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
    'accepted' => 'O campo :attribute deverá ser aceite.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'O campo :attribute não contém um URL válido.',
    'after' => 'O campo :attribute deverá conter uma data posterior a :date.',
    'after_or_equal' => 'O campo :attribute deverá conter uma data posterior ou igual a :date.',
    'alpha' => 'O campo :attribute deverá conter apenas letras.',
    'alpha_dash' => 'O campo :attribute deverá conter apenas letras, números e traços.',
    'alpha_num' => 'O campo :attribute deverá conter apenas letras e números .',
    'array' => 'O campo :attribute deverá conter uma coleção de elementos.',
    'attached' => 'Este :attribute já está anexado.',
    'before' => 'O campo :attribute deverá conter uma data anterior a :date.',
    'before_or_equal' => 'O Campo :attribute deverá conter uma data anterior ou igual a :date.',
    'between' => [
        'array' => 'O campo :attribute deverá conter entre :min - :max elementos.',
        'file' => 'O campo :attribute deverá ter um tamanho entre :min - :max kilobytes.',
        'numeric' => 'O campo :attribute deverá ter um valor entre :min - :max.',
        'string' => 'O campo :attribute deverá conter entre :min - :max caracteres.',
    ],
    'boolean' => 'O campo :attribute deverá conter o valor verdadeiro ou falso.',
    'confirmed' => 'A confirmação para o campo :attribute não coincide.',
    'current_password' => 'The password is incorrect.',
    'date' => 'O campo :attribute não contém uma data válida.',
    'date_equals' => 'O campo :attribute tem de ser uma data igual a :date.',
    'date_format' => 'A data indicada para o campo :attribute não respeita o formato :format.',
    'different' => 'Os campos :attribute e :other deverão conter valores diferentes.',
    'digits' => 'O campo :attribute deverá conter :digits caracteres.',
    'digits_between' => 'O campo :attribute deverá conter entre :min a :max caracteres.',
    'dimensions' => 'O campo :attribute deverá conter uma dimensão de imagem válida.',
    'distinct' => 'O campo :attribute contém um valor duplicado.',
    'email' => 'O campo :attribute não contém um endereço de e-mail válido.',
    'ends_with' => 'O campo :attribute deverá terminar com : :values.',
    'exists' => 'O valor selecionado para o campo :attribute é inválido.',
    'file' => 'O campo :attribute deverá conter um ficheiro.',
    'filled' => 'É obrigatória a indicação de um valor para o campo :attribute.',
    'gt' => [
        'array' => 'O campo :attribute tem de ter mais de :value itens.',
        'file' => 'O campo :attribute tem de ter mais de :value quilobytes.',
        'numeric' => 'O campo :attribute tem de ser maior do que :value.',
        'string' => 'O campo :attribute tem de ter mais de :value caracteres.',
    ],
    'gte' => [
        'array' => 'O campo :attribute tem de ter :value itens ou mais.',
        'file' => 'O campo :attribute tem de ter :value quilobytes ou mais.',
        'numeric' => 'O campo :attribute tem de ser maior ou igual a :value.',
        'string' => 'O campo :attribute tem de ter :value caracteres ou mais.',
    ],
    'image' => 'O campo :attribute deverá conter uma imagem.',
    'in' => 'O campo :attribute não contém um valor válido.',
    'in_array' => 'O campo :attribute não existe em :other.',
    'integer' => 'O campo :attribute deverá conter um número inteiro.',
    'ip' => 'O campo :attribute deverá conter um IP válido.',
    'ipv4' => 'O campo :attribute deverá conter um IPv4 válido.',
    'ipv6' => 'O campo :attribute deverá conter um IPv6 válido.',
    'json' => 'O campo :attribute deverá conter um texto JSON válido.',
    'lt' => [
        'array' => 'O campo :attribute tem de ter menos de :value itens.',
        'file' => 'O campo :attribute tem de ter menos de :value quilobytes.',
        'numeric' => 'O campo :attribute tem de ser inferior a :value.',
        'string' => 'O campo :attribute tem de ter menos de :value caracteres.',
    ],
    'lte' => [
        'array' => 'O campo :attribute não pode ter mais de :value itens.',
        'file' => 'O campo :attribute tem de ter :value quilobytes ou menos.',
        'numeric' => 'O campo :attribute tem de ser inferior ou igual a :value.',
        'string' => 'O campo :attribute tem de ter :value caracteres ou menos.',
    ],
    'max' => [
        'array' => 'O campo :attribute não deverá conter mais de :max elementos.',
        'file' => 'O campo :attribute não deverá ter um tamanho superior a :max kilobytes.',
        'numeric' => 'O campo :attribute não deverá conter um valor superior a :max.',
        'string' => 'O campo :attribute não deverá conter mais de :max caracteres.',
    ],
    'mimes' => 'O campo :attribute deverá conter um ficheiro do tipo: :values.',
    'mimetypes' => 'O campo :attribute deverá conter um ficheiro do tipo: :values.',
    'min' => [
        'array' => 'O campo :attribute deverá conter no mínimo :min elementos.',
        'file' => 'O campo :attribute deverá ter no mínimo :min kilobytes.',
        'numeric' => 'O campo :attribute deverá ter um valor superior ou igual a :min.',
        'string' => 'O campo :attribute deverá conter no mínimo :min caracteres.',
    ],
    'multiple_of' => 'O :attribute deve ser um múltiplo de :value',
    'not_in' => 'O campo :attribute contém um valor inválido.',
    'not_regex' => 'O formato de :attribute não é válido',
    'numeric' => 'O campo :attribute deverá conter um valor numérico.',
    'password' => 'A password está errada.',
    'present' => 'O campo :attribute deverá estar presente.',
    'prohibited' => 'O campo :attribute é proibido.',
    'prohibited_if' => 'O campo :attribute é proibido quando :other é :value.',
    'prohibited_unless' => 'O campo :attribute é proibido a menos que :other esteja em :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'O formato do valor para o campo :attribute é inválido.',
    'relatable' => 'Este :attribute pode não estar associado a este recurso.',
    'required' => 'É obrigatória a indicação de um valor para o campo :attribute.',
    'required_if' => 'É obrigatória a indicação de um valor para o campo :attribute quando o valor do campo :other é igual a :value.',
    'required_unless' => 'É obrigatória a indicação de um valor para o campo :attribute a menos que :other esteja presente em :values.',
    'required_with' => 'É obrigatória a indicação de um valor para o campo :attribute quando :values está presente.',
    'required_with_all' => 'É obrigatória a indicação de um valor para o campo :attribute quando um dos :values está presente.',
    'required_without' => 'É obrigatória a indicação de um valor para o campo :attribute quando :values não está presente.',
    'required_without_all' => 'É obrigatória a indicação de um valor para o campo :attribute quando nenhum dos :values está presente.',
    'same' => 'Os campos :attribute e :other deverão conter valores iguais.',
    'size' => [
        'array' => 'O campo :attribute deverá conter :size elementos.',
        'file' => 'O campo :attribute deverá ter o tamanho de :size kilobytes.',
        'numeric' => 'O campo :attribute deverá conter o valor :size.',
        'string' => 'O campo :attribute deverá conter :size caracteres.',
    ],
    'starts_with' => 'O campo :attribute tem de começar com um dos valores seguintes: :values',
    'string' => 'O campo :attribute deverá conter texto.',
    'timezone' => 'O campo :attribute deverá ter um fuso horário válido.',
    'unique' => 'O valor indicado para o campo :attribute já se encontra registado.',
    'uploaded' => 'O upload do ficheiro :attribute falhou.',
    'url' => 'O formato do URL indicado para o campo :attribute é inválido.',
    'uuid' => ':attribute tem de ser um UUID válido.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];

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
    'accepted' => ' :attribute қабылдануы керек.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => ' :attribute жарамды URL мекенжайы емес.',
    'after' => ' :attribute мәні :date күнінен кейінгі күн болуы керек.',
    'after_or_equal' => ' :attribute мәні :date күнінен кейінгі күн немесе тең болуы керек.',
    'alpha' => ' :attribute тек әріптерден тұруы керек.',
    'alpha_dash' => ' :attribute тек әріптерден, сандардан және сызықшалардан тұруы керек.',
    'alpha_num' => ' :attribute тек әріптерден және сандардан тұруы керек.',
    'array' => ' :attribute жиым болуы керек.',
    'attached' => 'Бұл нөмір :attribute тіркелген.',
    'before' => ' :attribute мәні :date күнінен дейінгі күн болуы керек.',
    'before_or_equal' => ' :attribute мәні :date күнінен дейінгі күн немесе тең болуы керек.',
    'between' => [
        'array' => ' :attribute жиымы :min және :max аралығындағы элементтерден тұруы керек.',
        'file' => ' :attribute көлемі :min және :max килобайт аралығында болуы керек.',
        'numeric' => ' :attribute мәні :min және :max аралығында болуы керек.',
        'string' => ' :attribute тармағы :min және :max аралығындағы таңбалардан тұруы керек.',
    ],
    'boolean' => ' :attribute жолы шын немесе жалған мән болуы керек.',
    'confirmed' => ' :attribute растауы сәйкес емес.',
    'current_password' => 'The password is incorrect.',
    'date' => ' :attribute жарамды күн емес.',
    'date_equals' => ' :attribute мәні :date күнімен тең болуы керек.',
    'date_format' => ' :attribute пішімі :format пішіміне сай емес.',
    'different' => ' :attribute және :other әр түрлі болуы керек.',
    'digits' => ' :attribute мәні :digits сан болуы керек.',
    'digits_between' => ' :attribute мәні :min және :max аралығындағы сан болуы керек.',
    'dimensions' => ' :attribute сурет өлшемі жарамсыз.',
    'distinct' => ' :attribute жолында қосарланған мән бар.',
    'email' => ' :attribute жарамды электрондық пошта мекенжайы болуы керек.',
    'ends_with' => ' :attribute келесі мәндердің біреуінен аяқталуы керек: :values',
    'exists' => ' таңдалған :attribute жарамсыз.',
    'file' => ' :attribute файл болуы тиіс.',
    'filled' => ' :attribute жолы толтырылуы керек.',
    'gt' => [
        'array' => ' :attribute мәні :value элементтерден үлкен болуы керек.',
        'file' => ' :attribute файл өлшемі :value килобайттан үлкен болуы керек.',
        'numeric' => ' :attribute мәні :value үлкен болуы керек.',
        'string' => ' :attribute мәні :value таңбалардан үлкен болуы керек.',
    ],
    'gte' => [
        'array' => ' :attribute мәні :value элементтерден үлкен немесе тең болуы керек.',
        'file' => ' :attribute файл өлшемі :value килобайттан үлкен немесе тең болуы керек.',
        'numeric' => ' :attribute мәні :value үлкен немесе тең болуы керек.',
        'string' => ' :attribute мәні :value таңбалардан үлкен немесе тең болуы керек.',
    ],
    'image' => ' :attribute кескін болуы керек.',
    'in' => ' таңдалған :attribute жарамсыз.',
    'in_array' => ' :attribute жолы :other ішінде жоқ.',
    'integer' => ' :attribute бүтін сан болуы керек.',
    'ip' => ' :attribute жарамды IP мекенжайы болуы керек.',
    'ipv4' => ' :attribute жарамды IPv4 мекенжайы болуы керек.',
    'ipv6' => ' :attribute жарамды IPv6 мекенжайы болуы керек.',
    'json' => ' :attribute жарамды JSON тармағы болуы керек.',
    'lt' => [
        'array' => ' :attribute мәні :value элементтерден кіші болуы керек.',
        'file' => ' :attribute файл өлшемі :value килобайттан кіші болуы керек.',
        'numeric' => ' :attribute мәні :value кіші болуы керек.',
        'string' => ' :attribute мәні :value таңбалардан кіші болуы керек.',
    ],
    'lte' => [
        'array' => ' :attribute мәні :value элементтерден кіші немесе тең болуы керек.',
        'file' => ' :attribute файл өлшемі :value килобайттан кіші неменсе тең болуы керек.',
        'numeric' => ' :attribute мәні :value кіші немесе тең болуы керек.',
        'string' => ' :attribute мәні :value таңбалардан кіші немесе тең болуы керек.',
    ],
    'max' => [
        'array' => ' :attribute жиымының құрамы :max элементтен аспауы керек.',
        'file' => ' :attribute мәні :max килобайттан көп болмауы керек.',
        'numeric' => ' :attribute мәні :max мәнінен көп болмауы керек.',
        'string' => ' :attribute тармағы :max таңбадан ұзын болмауы керек.',
    ],
    'mimes' => ' :attribute мынадай файл түрі болуы керек: :values.',
    'mimetypes' => ' :attribute мынадай файл түрі болуы керек: :values.',
    'min' => [
        'array' => ' :attribute кемінде :min элементтен тұруы керек.',
        'file' => ' :attribute көлемі кемінде :min килобайт болуы керек.',
        'numeric' => ' :attribute кемінде :min болуы керек.',
        'string' => ' :attribute кемінде :min таңбадан тұруы керек.',
    ],
    'multiple_of' => ':attribute :value еселенуі керек',
    'not_in' => ' таңдалған :attribute жарамсыз.',
    'not_regex' => ' таңдалған :attribute форматы жарамсыз.',
    'numeric' => ' :attribute сан болуы керек.',
    'password' => 'Қате құпиясөз.',
    'present' => ' :attribute болуы керек.',
    'prohibited' => ':attribute өрісіне тыйым салынады.',
    'prohibited_if' => ':attribute өрісіне :other :value болған кезде тыйым салынады.',
    'prohibited_unless' => ':attribute өрісіне тыйым салынады, егер тек :other :values-де болмаса.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => ' :attribute пішімі жарамсыз.',
    'relatable' => 'Бұл :attribute осы ресурсқа байланысты болмауы мүмкін.',
    'required' => ' :attribute жолы толтырылуы керек.',
    'required_if' => ' :attribute жолы :other мәні :value болған кезде толтырылуы керек.',
    'required_unless' => ' :attribute жолы :other мәні :values ішінде болмағанда толтырылуы керек.',
    'required_with' => ' :attribute жолы :values болғанда толтырылуы керек.',
    'required_with_all' => ' :attribute жолы :values болғанда толтырылуы керек.',
    'required_without' => ' :attribute жолы :values болмағанда толтырылуы керек.',
    'required_without_all' => ' :attribute жолы ешбір :values болмағанда толтырылуы керек.',
    'same' => ' :attribute және :other сәйкес болуы керек.',
    'size' => [
        'array' => ' :attribute жиымы :size элементтен тұруы керек.',
        'file' => ' :attribute көлемі :size килобайт болуы керек.',
        'numeric' => ' :attribute көлемі :size болуы керек.',
        'string' => ' :attribute тармағы :size таңбадан тұруы керек.',
    ],
    'starts_with' => ' :attribute келесі мәндердің біреуінен басталуы керек: :values',
    'string' => ' :attribute тармақ болуы керек.',
    'timezone' => ' :attribute жарамды аймақ болуы керек.',
    'unique' => ' :attribute бұрын алынған.',
    'uploaded' => ' :attribute жүктелуі сәтсіз аяқталды.',
    'url' => ' :attribute пішімі жарамсыз.',
    'uuid' => ' :attribute мәні жарамды UUID болуы керек.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];

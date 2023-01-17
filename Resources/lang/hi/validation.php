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
    'accepted' => ':attribute को स्वीकार किया जाना चाहिए।',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => ':attribute एक मान्य URL नहीं है।',
    'after' => ':attribute, :date के बाद की एक तारीख होनी चाहिए।',
    'after_or_equal' => ':attribute, :date के बाद या उसके बराबर की तारीख होनी चाहिए।',
    'alpha' => ':attribute में केवल अक्षर हो सकते हैं।',
    'alpha_dash' => ':attribute में केवल अक्षर, संख्या, और डैश हो सकते हैं।',
    'alpha_num' => ':attribute में केवल अक्षर और संख्याएं हो सकती हैं।',
    'array' => ':attribute एक सरणी होनी चाहिए।',
    'attached' => 'यह :attribute पहले से ही संलग्न है । ',
    'before' => ':attribute, :date से पहले की एक तारीख होनी चाहिए।',
    'before_or_equal' => ':attribute, :date इससे पहले या उसके बराबर की तारीख होनी चाहिए।',
    'between' => [
        'array' => ':attribute, :min और :max आइटमों के बीच होनी चाहिए।',
        'file' => ':attribute, :min और :max किलोबाइट के बीच होना चाहिए।',
        'numeric' => ':attribute, :min और :max के बीच होना चाहिए।',
        'string' => ':attribute, :min और :max वर्णों के बीच होना चाहिए।',
    ],
    'boolean' => ':attribute फील्ड सही या गलत होना चाहिए।',
    'confirmed' => ':attribute पुष्टिकरण मेल नहीं खा रहा है।',
    'current_password' => 'The password is incorrect.',
    'date' => ':attribute एक मान्य दिनांक नहीं है।',
    'date_equals' => ':attribute, :date के बराबर तारीख होनी चाहिए।',
    'date_format' => ':attribute फॉर्मेट :format से मेल नहीं खा रहा है।',
    'different' => ':attribute और :other अलग होना चाहिए।',
    'digits' => ':attribute, :digits अंक होना चाहिए।',
    'digits_between' => ':attribute, :min और :max अंकों के बीच होना चाहिए।',
    'dimensions' => ':attribute का अमान्य चित्त माप है।',
    'distinct' => ':attribute फील्ड का एक डुप्लिकेट मान होता है।',
    'email' => ':attribute एक मान्य ईमेल पता होना चाहिए।',
    'ends_with' => ':attribute को निम्नलिखित में से एक के साथ समाप्त होना चाहिए: :values । ',
    'exists' => 'चुना गया :attribute अमान्य है।',
    'file' => ':attribute एक फ़ाइल होनी चाहिए।',
    'filled' => ':attribute फील्ड आवश्यक होता है।',
    'gt' => [
        'array' => ':attribute, :value मद से अधिक होना चाहिए।',
        'file' => ':attribute, :value kilobytes से अधिक होना चाहिए।',
        'numeric' => ':attribute, :value से अधिक होना चाहिए।',
        'string' => ':attribute, :value characters से अधिक होना चाहिए।',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
    ],
    'image' => ':attribute एक छवि होनी चाहिए।',
    'in' => 'चुना गया :attribute अमान्य है।',
    'in_array' => ':attribute फील्ड, :other में मौजूद नहीं है।',
    'integer' => ':attribute एक पूर्णांक होना चाहिए।',
    'ip' => ':attribute एक मान्य IP address होना चाहिए।',
    'ipv4' => ':attribute एक वैध IPv4 address होना चाहिए।',
    'ipv6' => ':attribute एक वैध IPv6 address होना चाहिए।',
    'json' => ':attribute एक मान्य JSON स्ट्रिंग होना चाहिए।',
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
        'array' => ':attribute, :max आइटमों से अधिक नहीं हो सकता है।',
        'file' => ':attribute :max किलोबाइट से बड़ा नहीं हो सकता है।',
        'numeric' => ':attribute, :max से बड़ा नहीं हो सकता है।',
        'string' => ':attribute, :max वर्णों से बड़ा नहीं हो सकता है।',
    ],
    'mimes' => ':attribute एक प्रकार की फ़ाइल: :values होना चाहिए।',
    'mimetypes' => ':attribute एक प्रकार की फ़ाइल: :values होना चाहिए।',
    'min' => [
        'array' => ':attribute कम से कम :min आइटम होना चाहिए।',
        'file' => ':attribute कम से कम :min किलोबाइट होना चाहिए।',
        'numeric' => ':attribute कम से कम :min होना चाहिए।',
        'string' => ':attribute कम से कम :min वर्ण होना चाहिए।',
    ],
    'multiple_of' => ':attribute :value का एक बहु होना चाहिए',
    'not_in' => 'चुना गया :attribute अमान्य है।',
    'not_regex' => ':attribute प्रारूप अमान्य है।',
    'numeric' => ':attribute एक संख्या होनी चाहिए।',
    'password' => 'पासवर्ड गलत है । ',
    'present' => ':attribute फील्ड मौजूद होना चाहिए।',
    'prohibited' => ':attribute क्षेत्र निषिद्ध है । ',
    'prohibited_if' => ':attribute क्षेत्र निषिद्ध है जब :other :value है । ',
    'prohibited_unless' => ':attribute क्षेत्र तब तक निषिद्ध है जब तक कि :other :values में न हो । ',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => ':attribute फॉर्मेट अमान्य है।',
    'relatable' => 'यह :attribute इस संसाधन से संबद्ध नहीं हो सकता है । ',
    'required' => ':attribute फील्ड आवश्यक होता है।',
    'required_if' => ':attribute फ़ील्ड आवश्यक होता है जब :other :value होता है।',
    'required_unless' => ':attribute फील्ड आवश्यक होता है जब :other, :values में नहीं होता है।',
    'required_with' => ':attribute फ़ील्ड आवश्यक होता है जब :values मौजूद होता है।',
    'required_with_all' => ':attribute फ़ील्ड आवश्यक होता है जब :values मौजूद होता है।',
    'required_without' => ':attribute फील्ड आवश्यक होता है जब :values मौजूद नहीं होता है।',
    'required_without_all' => ':attribute फील्ड आवश्यक होता है जब एक भी :values मौजूद नहीं होता है।',
    'same' => ':attribute और :other मेल खाना चाहिए।',
    'size' => [
        'array' => ':attribute में :size आइटम होने चाहिए।',
        'file' => ':attribute, :size किलोबाइट होना चाहिए।',
        'numeric' => ':attribute, :size होना चाहिए।',
        'string' => ':attribute, :size वर्ण होना चाहिए।',
    ],
    'starts_with' => ':attribute निम्नलिखित में से किसी एक से शुरू करना चाहिए: :values',
    'string' => ':attribute एक स्ट्रिंग होनी चाहिए।',
    'timezone' => ':attribute एक मान्य क्षेत्र होना चाहिए।',
    'unique' => ':attribute को पहले ही ले लिया गया है।',
    'uploaded' => ':attribute अपलोड करने में विफल।',
    'url' => ':attribute फॉर्मेट अमान्य है।',
    'uuid' => ':attribute एक वैध UUID होना चाहिए।',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'अनुकूल-संदेश',
        ],
    ],
];
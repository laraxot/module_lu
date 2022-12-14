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
    'accepted' => ':attribute ला स्वीकार केला गेला पाहिजे.',
    'accepted_if' => ':other हे :value असेल तेव्हा हे :attribute स्वीकारणे आवश्यक आहे.',
    'active_url' => ':attribute हा एक बरोबर URL नाही आहे.',
    'after' => ':attribute, :date नंतरची एक तारीख पाहिजे.',
    'after_or_equal' => ':attribute, :date हि किंवा त्या नंतरची एक तारीख पाहिजे.',
    'alpha' => ':attribute मध्ये फक्त अक्षरे वैध आहेत.',
    'alpha_dash' => ':attribute मध्ये फक्त अक्षरे, संख्या आणि डॅश वैध आहेत.',
    'alpha_num' => ':attribute मध्ये फक्त अक्षरे आणि संख्या वैध आहेत.',
    'array' => ':attribute साठी फक्त सूची वैध आहे.',
    'attached' => 'या :attribute आधीच संलग्न आहे.',
    'before' => ':attribute, :date आधीची एक तारीख पाहिजे.',
    'before_or_equal' => ':attribute, :date हि किंवा त्या आधीची एक तारीख पाहिजे.',
    'between' => [
        'array' => ':attribute, :min किंवा :max संख्या यामध्ये असावी.',
        'file' => ':attribute, :min किंवा :max किलोबाइट यामध्ये असावी.',
        'numeric' => ':attribute, :min किंवा :max यामध्ये असावी.',
        'string' => ':attribute, :min किंवा :max शब्द यामध्ये असावी.',
    ],
    'boolean' => ':attribute फील्ड योग्य किंवा चुकीचे असावे.',
    'confirmed' => ':attribute पुष्टीकरण जुळत नाही.',
    'current_password' => 'संकेतशब्द चुकीचा आहे.',
    'date' => ':attribute वैध तारीख नाही.',
    'date_equals' => ':attribute, :date तारीख समान असणे आवश्यक आहे.',
    'date_format' => ':attribute फॉर्मेट :format शी जुळत नाही.',
    'different' => ':attribute आणि :other वेगळे असावे.',
    'digits' => ':attribute, :digits अंक असणे आवश्यक आहे.',
    'digits_between' => ':attribute, :min आणि :max अंक दरम्यान असणे आवश्यक आहे.',
    'dimensions' => ':attribute अयोग्य माप आहे.',
    'distinct' => ':attribute वेगवेगळे असावेत.',
    'email' => ':attribute एक वैध ईमेल पत्ता असणे आवश्यक आहे.',
    'ends_with' => ':attribute खालील एक समाप्त करणे आवश्यक आहे: :values.',
    'exists' => 'निवडलेेलेे :attribute वैध नाही.',
    'file' => ':attribute एक फ़ाइल असावी.',
    'filled' => ':attribute फील्ड आवश्यक आहे.',
    'gt' => [
        'array' => ':attribute, :value संख्या पेक्षा जास्त असावी.',
        'file' => ':attribute, :value किलो बाईट पेक्षा जास्त असावी.',
        'numeric' => ':attribute, :value पेक्षा जास्त असावी.',
        'string' => ':attribute, :value characters पेक्षा जास्त असावी.',
    ],
    'gte' => [
        'array' => ':attribute, :value संख्या पेक्षा मोठे किंवा समान असणे आवश्यक आहे.',
        'file' => ':attribute, :value किलोबाईट पेक्षा मोठे किंवा समान असणे आवश्यक आहे.',
        'numeric' => ':attribute, :value पेक्षा मोठे किंवा समान असणे आवश्यक आहे.',
        'string' => ':attribute, :value शब्दांपेक्षा मोठे किंवा समान असणे आवश्यक आहे.',
    ],
    'image' => ':attribute एक प्रतिमा असावी.',
    'in' => ':attribute अमान्य आहे.',
    'in_array' => ':attribute फील्ड, :other अस्तित्वात नाही.',
    'integer' => ':attribute एक पूर्णांक असणे आवश्यक आहे.',
    'ip' => ':attribute एक वैध IP address असावा.',
    'ipv4' => ':attribute एक वैध IPv4 address असावा.',
    'ipv6' => ':attribute एक वैध IPv6 address असावा.',
    'json' => ':attribute एक वैध JSON स्ट्रिंग असावा.',
    'lt' => [
        'array' => ':attribute, :value संख्या पेक्षा कमी असावी.',
        'file' => ':attribute, :value किलो बाईट पेक्षा कमी असावी.',
        'numeric' => ':attribute, :value पेक्षा कमी असावी.',
        'string' => ':attribute, :value वर्णांपेक्षा पेक्षा कमी असावी.',
    ],
    'lte' => [
        'array' => ':attribute, :value संख्या पेक्षा कमी किंवा समान असणे आवश्यक आहे.',
        'file' => ':attribute, :value किलोबाईट पेक्षा कमी किंवा समान असणे आवश्यक आहे.',
        'numeric' => ':attribute, :value पेक्षा कमी किंवा समान असणे आवश्यक आहे.',
        'string' => ':attribute, :value शब्दांपेक्षा कमी किंवा समान असणे आवश्यक आहे.',
    ],
    'max' => [
        'array' => ':attribute, :value संख्या पेक्षा कमी असणे आवश्यक आहे.',
        'file' => ':attribute, :value किलोबाईट पेक्षा कमी असणे आवश्यक आहे.',
        'numeric' => ':attribute, :value पेक्षा कमी असणे आवश्यक आहे.',
        'string' => ':attribute, :value शब्दांपेक्षा कमी असणे आवश्यक आहे.',
    ],
    'mimes' => ':attribute एक प्रकार ची फ़ाइल: :values असावी.',
    'mimetypes' => ':attribute एक प्रकार ची फ़ाइल: :values असावी.',
    'min' => [
        'array' => ':attribute कमीत कमी :min आइटम असावी.',
        'file' => ':attribute कमीत कमी :min किलोबाइट असावी.',
        'numeric' => ':attribute कमीत कमी :min असावी.',
        'string' => ':attribute कमीत कमी :min शब्द असावी.',
    ],
    'multiple_of' => 'द :attribute अनेक असणे आवश्यक आहे :value',
    'not_in' => 'घेतलेला :attribute वैध नाही.',
    'not_regex' => ':attribute प्रारूप वैध नाही.',
    'numeric' => ':attribute एक संख्या असावी.',
    'password' => 'गुप्तशब्द अयोग्य आहे.',
    'present' => ':attribute फील्ड उपस्थित असावी.',
    'prohibited' => ':attribute फील्ड प्रतिबंधित आहे.',
    'prohibited_if' => 'इ. स.:attribute फील्ड :other :value असते तेव्हा प्रतिबंधित आहे.',
    'prohibited_unless' => 'अगोदर निर्देश केलेल्या बाबीसंबंधी बोलताना :attribute क्षेत्रात प्रतिबंधित आहे :other :values आहे तोपर्यंत.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => ':attribute फॉर्मेट वैध नाही.',
    'relatable' => 'या :attribute या संसाधन संबंधित जाऊ शकत नाही.',
    'required' => ':attribute फील्ड आवश्यक आहे.',
    'required_if' => 'जर :other :value असेल तर :attribute फ़ील्ड आवश्यक आहे.',
    'required_unless' => 'जर :other :value नसेल तर :attribute फ़ील्ड आवश्यक आहे.',
    'required_with' => ':values सोबत :attribute  फ़ील्ड आवश्यक आहे.',
    'required_with_all' => 'सर्व :values सोबत :attribute फ़ील्ड आवश्यक आहे.',
    'required_without' => ':values खेरीज :attribute  फ़ील्ड आवश्यक आहे.',
    'required_without_all' => 'सर्व :values खेरीज :attribute  फ़ील्ड आवश्यक आहे.',
    'same' => ':attribute आणि :other सामान असावेत.',
    'size' => [
        'array' => ':attribute में :size आइटम असावी.',
        'file' => ':attribute, :size किलोबाइट असावी.',
        'numeric' => ':attribute, :size असावी.',
        'string' => ':attribute, :size शब्द असावी.',
    ],
    'starts_with' => ':attribute खालीलपैकी कोणत्याही अक्षराने सुरूवात करावी: :values',
    'string' => ':attribute एक वाक्य असावे.',
    'timezone' => ':attribute एक वेळ क्षेत्र असावे.',
    'unique' => ':attribute आधी वापरले गेले आहे.',
    'uploaded' => ':attribute अपलोड करण्यात अयशस्वी.',
    'url' => ':attribute फॉर्मेट अमान्य आहे.',
    'uuid' => ':attribute एक वैध UUID असावी.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'सानुकूल-संदेश',
        ],
    ],
];

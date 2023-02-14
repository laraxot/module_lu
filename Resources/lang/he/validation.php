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
    'accepted' => 'שדה :attribute חייב להיות מסומן.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'שדה :attribute הוא לא כתובת אתר תקנית.',
    'after' => 'שדה :attribute חייב להיות תאריך אחרי :date.',
    'after_or_equal' => 'שדה :attribute חייב להיות תאריך מאוחר או שווה ל :date.',
    'alpha' => 'שדה :attribute יכול להכיל אותיות בלבד.',
    'alpha_dash' => 'שדה :attribute יכול להכיל אותיות, מספרים ומקפים בלבד.',
    'alpha_num' => 'שדה :attribute יכול להכיל אותיות ומספרים בלבד.',
    'array' => 'שדה :attribute חייב להיות מערך.',
    'attached' => 'ה-:attribute הזה כבר מחובר.',
    'before' => 'שדה :attribute חייב להיות תאריך לפני :date.',
    'before_or_equal' => 'שדה :attribute חייב להיות תאריך מוקדם או שווה ל :date.',
    'between' => [
        'array' => 'שדה :attribute חייב להיות בין :min ל-:max פריטים.',
        'file' => 'שדה :attribute חייב להיות בין :min ל-:max קילובייטים.',
        'numeric' => 'שדה :attribute חייב להיות בין :min ל-:max.',
        'string' => 'שדה :attribute חייב להיות בין :min ל-:max תווים.',
    ],
    'boolean' => 'שדה :attribute חייב להיות אמת או שקר.',
    'confirmed' => 'שדה האישור של :attribute לא תואם.',
    'current_password' => 'The password is incorrect.',
    'date' => 'שדה :attribute אינו תאריך תקני.',
    'date_equals' => 'על ה :attribute להיות תאריך שווה ל- :date.',
    'date_format' => 'שדה :attribute לא תואם את הפורמט :format.',
    'different' => 'שדה :attribute ושדה :other חייבים להיות שונים.',
    'digits' => 'שדה :attribute חייב להיות בעל :digits ספרות.',
    'digits_between' => 'שדה :attribute חייב להיות בין :min ו-:max ספרות.',
    'dimensions' => 'שדה :attribute מימדי התמונה לא תקינים',
    'distinct' => 'שדה :attribute קיים ערך כפול.',
    'email' => 'שדה :attribute חייב להיות כתובת אימייל תקנית.',
    'ends_with' => 'שדה :attribute חייב להסתיים באחד מהבאים: :values',
    'exists' => 'בחירת ה-:attribute אינה תקפה.',
    'file' => 'שדה :attribute חייב להיות קובץ.',
    'filled' => 'שדה :attribute הוא חובה.',
    'gt' => [
        'array' => 'על ה :attribute לכלול יותר מ- :value פריטים.',
        'file' => 'על ה :attribute להיות גדול יותר מ- :value קילו-בתים.',
        'numeric' => 'על ה :attribute להיות גדול יותר מ- :value.',
        'string' => 'על ה :attribute להיות גדול יותר מ- :value תווים.',
    ],
    'gte' => [
        'array' => 'ה :attribute חייב לכלול :value פריטים או יותר.',
        'file' => 'על ה :attribute להיות גדול יותר או שווה ל- :value קילו-בתים.',
        'numeric' => 'על ה :attribute להיות גדול יותר או שווה ל- :value.',
        'string' => 'על ה :attribute להיות גדול יותר או שווה ל- :value תווים.',
    ],
    'image' => 'שדה :attribute חייב להיות תמונה.',
    'in' => 'בחירת ה-:attribute אינה תקפה.',
    'in_array' => 'שדה :attribute לא קיים ב:other.',
    'integer' => 'שדה :attribute חייב להיות מספר שלם.',
    'ip' => 'שדה :attribute חייב להיות כתובת IP תקנית.',
    'ipv4' => 'שדה :attribute חייב להיות כתובת IPv4 תקנית.',
    'ipv6' => 'שדה :attribute חייב להיות כתובת IPv6 תקנית.',
    'json' => 'שדה :attribute חייב להיות מחרוזת JSON תקנית.',
    'lt' => [
        'array' => 'על ה :attribute לכלול פחות מ- :value פריטים.',
        'file' => 'על ה :attribute להיות קטן יותר מ- :value קילו-בתים.',
        'numeric' => 'על ה :attribute להיות נמוך יותר מ- :value.',
        'string' => 'על ה :attribute להכיל פחות מ- :value תווים.',
    ],
    'lte' => [
        'array' => 'ה :attribute לא יכול לכלול יותר מאשר :value פריטים.',
        'file' => 'על ה :attribute להיות קטן יותר או שווה ל- :value קילו-בתים.',
        'numeric' => 'על ה :attribute להיות נמוך או שווה ל- :value.',
        'string' => 'על ה :attribute להכיל :value תווים או פחות.',
    ],
    'max' => [
        'array' => 'שדה :attribute לא יכול להכיל יותר מ-:max פריטים.',
        'file' => 'שדה :attribute לא יכול להיות גדול מ-:max קילובייטים.',
        'numeric' => 'שדה :attribute אינו יכול להיות גדול מ-:max.',
        'string' => 'שדה :attribute לא יכול להיות גדול מ-:max characters.',
    ],
    'mimes' => 'שדה :attribute צריך להיות קובץ מסוג: :values.',
    'mimetypes' => 'שדה :attribute צריך להיות קובץ מסוג: :values.',
    'min' => [
        'array' => 'שדה :attribute חייב להיות לפחות :min פריטים.',
        'file' => 'שדה :attribute חייב להיות לפחות :min קילובייטים.',
        'numeric' => 'שדה :attribute חייב להיות לפחות :min.',
        'string' => 'שדה :attribute חייב להיות לפחות :min תווים.',
    ],
    'multiple_of' => ':attribute חייב להיות מרובה של :value',
    'not_in' => 'בחירת ה-:attribute אינה תקפה.',
    'not_regex' => 'הפורמט של :attribute איננו חוקי.',
    'numeric' => 'שדה :attribute חייב להיות מספר.',
    'password' => 'הסיסמה שגויה.',
    'present' => 'שדה :attribute חייב להיות קיים.',
    'prohibited' => 'שדה :attribute אסור.',
    'prohibited_if' => 'שדה :attribute אסור כאשר :other הוא :value.',
    'prohibited_unless' => 'שדה :attribute אסור אלא אם כן :other הוא :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'שדה :attribute בעל פורמט שאינו תקין.',
    'relatable' => 'זה :attribute לא יכול להיות קשור עם משאב זה.',
    'required' => 'שדה :attribute הוא חובה.',
    'required_if' => 'שדה :attribute נחוץ כאשר :other הוא :value.',
    'required_unless' => 'שדה :attribute נחוץ אלא אם כן :other הוא בין :values.',
    'required_with' => 'שדה :attribute נחוץ כאשר :values נמצא.',
    'required_with_all' => 'שדה :attribute נחוץ כאשר :values נמצא.',
    'required_without' => 'שדה :attribute נחוץ כאשר :values לא בנמצא.',
    'required_without_all' => 'שדה :attribute נחוץ כאשר אף אחד מ-:values נמצאים.',
    'same' => 'שדה :attribute ו-:other חייבים להיות זהים.',
    'size' => [
        'array' => 'שדה :attribute חייב להכיל :size פריטים.',
        'file' => 'שדה :attribute חייב להיות :size קילובייטים.',
        'numeric' => 'שדה :attribute חייב להיות :size.',
        'string' => 'שדה :attribute חייב להיות :size תווים.',
    ],
    'starts_with' => 'ה :attribute חייב להתחיל עם אחד מהבאים: :values',
    'string' => 'שדה :attribute חייב להיות מחרוזת.',
    'timezone' => 'שדה :attribute חייב להיות איזור תקני.',
    'unique' => 'שדה :attribute כבר תפוס.',
    'uploaded' => 'שדה :attribute ארעה שגיאה בעת ההעלאה.',
    'url' => 'שדה :attribute בעל פורמט שאינו תקין.',
    'uuid' => 'ה :attribute חייב להיות מזהה ייחודי אוניברסלי (UUID) חוקי.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'הודעה מותאמת',
        ],
    ],
];
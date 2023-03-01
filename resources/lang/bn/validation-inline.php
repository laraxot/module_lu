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
    'accepted' => 'এই মাঠ গ্রহণ করা আবশ্যক.',
    'accepted_if' => 'This field must be accepted when :other is :value.',
    'active_url' => 'এটি একটি বৈধ ইউআরএল নয়.',
    'after' => 'এই পরে একটি তারিখ হতে হবে :date.',
    'after_or_equal' => 'এই পরে বা সমান একটি তারিখ হতে হবে :date.',
    'alpha' => 'এই ক্ষেত্রটি শুধুমাত্র অক্ষর থাকতে পারে.',
    'alpha_dash' => 'এই ক্ষেত্রটি শুধুমাত্র অক্ষর, সংখ্যা, ড্যাশ এবং আন্ডারস্কোর থাকতে পারে.',
    'alpha_num' => 'এই ক্ষেত্রটি শুধুমাত্র অক্ষর এবং নম্বর থাকতে পারে.',
    'array' => 'এই ক্ষেত্রটি একটি অ্যারে হতে হবে.',
    'attached' => 'এই ক্ষেত্র ইতিমধ্যে সংযুক্ত করা হয়.',
    'before' => 'এই :date আগে একটি তারিখ হতে হবে.',
    'before_or_equal' => 'এই একটি তারিখ আগে বা সমান হতে হবে :date.',
    'between' => [
        'array' => 'This content must have between :min and :max items.',
        'file' => 'This file must be between :min and :max kilobytes.',
        'numeric' => 'This value must be between :min and :max.',
        'string' => 'This string must be between :min and :max characters.',
    ],
    'boolean' => 'এই ক্ষেত্রটি সত্য বা মিথ্যা হতে হবে.',
    'confirmed' => 'নিশ্চিতকরণ সাথে মেলে না.',
    'current_password' => 'The password is incorrect.',
    'date' => 'এটি একটি বৈধ তারিখ নয়.',
    'date_equals' => 'এই সমান একটি তারিখ হতে হবে :date.',
    'date_format' => 'এই বিন্যাসে সাথে মেলে না :format.',
    'different' => 'এই মান থেকে আলাদা হতে হবে :other.',
    'digits' => 'এই হতে হবে :digits সংখ্যা.',
    'digits_between' => 'এই মধ্যে হতে হবে :min এবং :max সংখ্যা.',
    'dimensions' => 'এই ছবিটি অবৈধ মাত্রা আছে.',
    'distinct' => 'এই ক্ষেত্রটি একটি প্রতিলিপি মান আছে.',
    'email' => 'এটি একটি বৈধ ইমেইল ঠিকানা হতে হবে.',
    'ends_with' => 'এই নিম্নলিখিত এক সঙ্গে শেষ করতে হবে: :values.',
    'exists' => 'নির্বাচিত মান অকার্যকর',
    'file' => 'বিষয়বস্তু একটি ফাইল হতে হবে.',
    'filled' => 'এই ক্ষেত্রটি একটি মান থাকতে হবে.',
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
    'image' => 'এটি একটি চিত্র হতে হবে.',
    'in' => 'নির্বাচিত মান অকার্যকর',
    'in_array' => 'এই মান বিদ্যমান নেই :other.',
    'integer' => 'এটি একটি পূর্ণসংখ্যা হতে হবে.',
    'ip' => 'এটি একটি বৈধ আইপি ঠিকানা হতে হবে.',
    'ipv4' => 'এটি একটি বৈধ আইপিভি 4 ঠিকানা হতে হবে.',
    'ipv6' => 'এটি একটি বৈধ আইপিভি6 ঠিকানা হতে হবে.',
    'json' => 'এটি একটি বৈধ পলসন স্ট্রিং হতে হবে.',
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
    'mimes' => 'এই ধরনের একটি ফাইল হতে হবে: :values.',
    'mimetypes' => 'এই ধরনের একটি ফাইল হতে হবে: :values.',
    'min' => [
        'array' => 'The value must have at least :min items.',
        'file' => 'The file size must be at least :min kilobytes.',
        'numeric' => 'The value must be at least :min.',
        'string' => 'The string must be at least :min characters.',
    ],
    'multiple_of' => 'মূল্য :value একাধিক হতে হবে',
    'not_in' => 'নির্বাচিত মান অকার্যকর',
    'not_regex' => 'এই বিন্যাসটি অবৈধ.',
    'numeric' => 'এটা নিশ্চয়ই কোন নাম্বার.',
    'password' => 'পাসওয়ার্ড ভুল.',
    'present' => 'এই ক্ষেত্রটি উপস্থিত থাকতে হবে.',
    'prohibited' => 'এই ক্ষেত্র নিষিদ্ধ.',
    'prohibited_if' => 'এই ক্ষেত্রটি :other :value যখন নিষিদ্ধ.',
    'prohibited_unless' => 'এই ক্ষেত্রটি নিষিদ্ধ, যদি না :other সালে হয় :values.',
    'prohibits' => 'This field prohibits :other from being present.',
    'regex' => 'এই বিন্যাসটি অবৈধ.',
    'relatable' => 'এই ক্ষেত্রটি এই সম্পদ সঙ্গে যুক্ত হতে পারে না.',
    'required' => 'এই ক্ষেত্রটি প্রয়োজন.',
    'required_if' => 'এই ক্ষেত্র প্রয়োজন বোধ করা হয় যখন :other হয় :value.',
    'required_unless' => 'এই ক্ষেত্র প্রয়োজন বোধ করা হয়, যদি না :other হয়, :values.',
    'required_with' => ':values উপস্থিত থাকলে এই ক্ষেত্র প্রয়োজন বোধ করা হয়.',
    'required_with_all' => ':values উপস্থিত হয় যখন এই ক্ষেত্র প্রয়োজন বোধ করা হয়.',
    'required_without' => ':values উপস্থিত না হলে এই ক্ষেত্র প্রয়োজন বোধ করা হয়.',
    'required_without_all' => 'কেউ যখন এই ক্ষেত্র প্রয়োজন বোধ করা হয় :values উপস্থিত.',
    'same' => 'এই ক্ষেত্রের মান :other থেকে এক মেলানো.',
    'size' => [
        'array' => 'The content must contain :size items.',
        'file' => 'The file size must be :size kilobytes.',
        'numeric' => 'The value must be :size.',
        'string' => 'The string must be :size characters.',
    ],
    'starts_with' => 'এই নিম্নলিখিত এক সঙ্গে শুরু করতে হবে: :values.',
    'string' => 'এটি একটি স্ট্রিং হতে হবে.',
    'timezone' => 'এটি একটি বৈধ জোন হতে হবে.',
    'unique' => 'এটা ইতিমধ্যেই নেওয়া হয়েছে.',
    'uploaded' => 'এই আপলোড করতে ব্যর্থ হয়েছে.',
    'url' => 'এই বিন্যাসটি অবৈধ.',
    'uuid' => 'এটি একটি বৈধ ইউআইডি হতে হবে.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];
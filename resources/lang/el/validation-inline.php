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
    'accepted' => 'Το πεδίο αυτό πρέπει να γίνει αποδεκτό.',
    'accepted_if' => 'This field must be accepted when :other is :value.',
    'active_url' => 'Αυτό δεν είναι μια έγκυρη διεύθυνση URL.',
    'after' => 'Αυτό πρέπει να είναι μια ημερομηνία μετά το :date.',
    'after_or_equal' => 'Αυτό πρέπει να είναι μια ημερομηνία μετά ή ίση με :date.',
    'alpha' => 'Αυτό το πεδίο μπορεί να περιέχει μόνο γράμματα.',
    'alpha_dash' => 'Αυτό το πεδίο μπορεί να περιέχει μόνο γράμματα, αριθμούς, παύλες και υπογράμμιση.',
    'alpha_num' => 'Αυτό το πεδίο μπορεί να περιέχει μόνο γράμματα και αριθμούς.',
    'array' => 'Αυτό το πεδίο πρέπει να είναι ένας πίνακας.',
    'attached' => 'Αυτό το πεδίο είναι ήδη συνδεδεμένο.',
    'before' => 'Αυτό πρέπει να είναι μια ημερομηνία πριν από το :date.',
    'before_or_equal' => 'Αυτό πρέπει να είναι μια ημερομηνία πριν ή ίση με :date.',
    'between' => [
        'array' => 'This content must have between :min and :max items.',
        'file' => 'This file must be between :min and :max kilobytes.',
        'numeric' => 'This value must be between :min and :max.',
        'string' => 'This string must be between :min and :max characters.',
    ],
    'boolean' => 'Αυτό το πεδίο πρέπει να είναι αληθές ή ψευδές.',
    'confirmed' => 'Η επιβεβαίωση δεν ταιριάζει.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Αυτή δεν είναι έγκυρη ημερομηνία.',
    'date_equals' => 'Αυτή πρέπει να είναι μια ημερομηνία ίση με :date.',
    'date_format' => 'Αυτό δεν ταιριάζει με τη μορφή :format.',
    'different' => 'Αυτή η τιμή πρέπει να είναι διαφορετική από :other.',
    'digits' => 'Αυτό πρέπει να είναι :digits ψηφία.',
    'digits_between' => 'Αυτό πρέπει να είναι μεταξύ :min και :max ψηφίων.',
    'dimensions' => 'Αυτή η εικόνα έχει μη έγκυρες διαστάσεις.',
    'distinct' => 'Αυτό το πεδίο έχει διπλή τιμή.',
    'email' => 'Αυτή πρέπει να είναι μια έγκυρη διεύθυνση ηλεκτρονικού ταχυδρομείου.',
    'ends_with' => 'Αυτό πρέπει να τελειώσει με ένα από τα ακόλουθα: :values.',
    'exists' => 'Η επιλεγμένη τιμή δεν είναι έγκυρη.',
    'file' => 'Το περιεχόμενο πρέπει να είναι ένα αρχείο.',
    'filled' => 'Αυτό το πεδίο πρέπει να έχει μια τιμή.',
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
    'image' => 'Αυτό πρέπει να είναι μια εικόνα.',
    'in' => 'Η επιλεγμένη τιμή δεν είναι έγκυρη.',
    'in_array' => 'Αυτή η τιμή δεν υπάρχει στο :other.',
    'integer' => 'Αυτό πρέπει να είναι ένας ακέραιος αριθμός.',
    'ip' => 'Αυτή πρέπει να είναι μια έγκυρη διεύθυνση IP.',
    'ipv4' => 'Αυτή πρέπει να είναι μια έγκυρη διεύθυνση IPv4.',
    'ipv6' => 'Αυτή πρέπει να είναι μια έγκυρη διεύθυνση IPv6.',
    'json' => 'Αυτό πρέπει να είναι μια έγκυρη συμβολοσειρά JSON.',
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
    'mimes' => 'Αυτό πρέπει να είναι ένα αρχείο τύπου: :values.',
    'mimetypes' => 'Αυτό πρέπει να είναι ένα αρχείο τύπου: :values.',
    'min' => [
        'array' => 'The value must have at least :min items.',
        'file' => 'The file size must be at least :min kilobytes.',
        'numeric' => 'The value must be at least :min.',
        'string' => 'The string must be at least :min characters.',
    ],
    'multiple_of' => 'Η τιμή πρέπει να είναι πολλαπλάσιο του :value',
    'not_in' => 'Η επιλεγμένη τιμή δεν είναι έγκυρη.',
    'not_regex' => 'Αυτή η μορφή δεν είναι έγκυρη.',
    'numeric' => 'Αυτός πρέπει να είναι ένας αριθμός.',
    'password' => 'Ο κωδικός πρόσβασης είναι εσφαλμένος.',
    'present' => 'Αυτό το πεδίο πρέπει να είναι παρόν.',
    'prohibited' => 'Αυτό το πεδίο απαγορεύεται.',
    'prohibited_if' => 'Αυτό το πεδίο απαγορεύεται όταν το :other είναι :value.',
    'prohibited_unless' => 'Αυτό το πεδίο απαγορεύεται εκτός αν το :other βρίσκεται στο :values.',
    'prohibits' => 'This field prohibits :other from being present.',
    'regex' => 'Αυτή η μορφή δεν είναι έγκυρη.',
    'relatable' => 'Αυτό το πεδίο ενδέχεται να μην σχετίζεται με αυτόν τον πόρο.',
    'required' => 'Αυτό το πεδίο απαιτείται.',
    'required_if' => 'Αυτό το πεδίο απαιτείται όταν :other είναι :value.',
    'required_unless' => 'Αυτό το πεδίο απαιτείται εκτός εάν το :other βρίσκεται στο :values.',
    'required_with' => 'Αυτό το πεδίο απαιτείται όταν υπάρχει :values.',
    'required_with_all' => 'Αυτό το πεδίο απαιτείται όταν υπάρχουν :values.',
    'required_without' => 'Αυτό το πεδίο απαιτείται όταν δεν υπάρχει :values.',
    'required_without_all' => 'Αυτό το πεδίο απαιτείται όταν δεν υπάρχει κανένα από τα :values.',
    'same' => 'Η τιμή αυτού του πεδίου πρέπει να ταιριάζει με αυτή του :other.',
    'size' => [
        'array' => 'The content must contain :size items.',
        'file' => 'The file size must be :size kilobytes.',
        'numeric' => 'The value must be :size.',
        'string' => 'The string must be :size characters.',
    ],
    'starts_with' => 'Αυτό πρέπει να ξεκινήσει με ένα από τα ακόλουθα: :values.',
    'string' => 'Αυτό πρέπει να είναι μια χορδή.',
    'timezone' => 'Αυτό πρέπει να είναι μια έγκυρη ζώνη.',
    'unique' => 'Αυτό έχει ήδη ληφθεί.',
    'uploaded' => 'Αυτό απέτυχε να φορτώσει.',
    'url' => 'Αυτή η μορφή δεν είναι έγκυρη.',
    'uuid' => 'Αυτό πρέπει να είναι ένα έγκυρο UUID.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];
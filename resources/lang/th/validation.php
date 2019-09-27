<?php

return [

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

    'accepted' => 'ต้องยอมรับ :attribute',
    'active_url' => ':attribute ไม่ใช่ URL ที่ถูกต้อง',
    'after' => ':attribute ต้องเป็นวันหลังจาก :date.',
    'after_or_equal' => ':attribute ต้องเป็นวันที่หลังหรือเท่ากับ :date.',
    'alpha' => ':attribute อาจมีตัวอักษรเท่านั้น',
    'alpha_dash' => ':attribute อาจมีตัวอักษรตัวเลขขีดกลางและขีดล่างเท่านั้น',
    'alpha_num' => ':attribute อาจมีตัวอักษรและตัวเลขเท่านั้น',
    'array' => ':attribute จะต้องเป็นอาร์เรย์.',
    'before' => ':attribute ต้องเป็นวันที่ก่อน :date.',
    'before_or_equal' => ':attribute ต้องเป็นวันที่ก่อนหรือเท่ากับ :date.',
    'between' => [
        'numeric' => ':attribute ต้องอยู่ระหว่าง :min และ :max.',
        'file' => ':attribute ต้องอยู่ระหว่าง :min และ :max kilobytes.',
        'string' => ':attribute ต้องอยู่ระหว่าง :min และ :max characters.',
        'array' => ':attribute ต้องอยู่ระหว่าง :min และ :max items.',
    ],
    'boolean' => ':attribute ฟิลด์จะต้องเป็นจริงหรือเท็จ',
    'confirmed' => ':attribute การยืนยันไม่ตรงกัน',
    'date' => ':attribute ไม่ใช่วันที่ที่ถูกต้อง',
    'date_equals' => ':attribute ต้องเป็นวันที่เท่ากับ :date.',
    'date_format' => ':attribute ไม่ตรงกับรูปแบบ :format.',
    'different' => ':attribute และ :other จะต้องแตกต่างกัน',
    'digits' => ':attribute จะต้องเป็น :digits digits.',
    'digits_between' => ':attribute ต้องอยู่ระหว่าง :min และ :max digits.',
    'dimensions' => ':attribute มีขนาดภาพที่ไม่ถูกต้อง',
    'distinct' => ':attribute ฟิลด์มีค่าซ้ำกัน',
    'email' => ':attribute จะต้องเป็นที่อยู่อีเมลที่ถูกต้อง.',
    'ends_with' => ':attribute ต้องลงท้ายด้วยหนึ่งใน following: :values',
    'exists' => ':attribute ที่เลือกไม่ถูกต้อง',
    'file' => ':attribute จะต้องเป็นไฟล์.',
    'filled' => ':attribute ฟิลด์จะต้องมีค่า.',
    'gt' => [
        'numeric' => ':attribute จะต้องมากกว่า :value.',
        'file' => ':attribute จะต้องมากกว่า :value kilobytes.',
        'string' => ':attribute จะต้องมากกว่า :value characters.',
        'array' => ':attribute จะต้องมีมากกว่า :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute ต้องมากกว่าหรือเท่ากับ :value.',
        'file' => ':attribute ต้องมากกว่าหรือเท่ากับ :value kilobytes.',
        'string' => ':attribute ต้องมากกว่าหรือเท่ากับ :value characters.',
        'array' => ':attribute ต้องมี :value items หรือมากกว่า.',
    ],
    'image' => ':attribute ต้องเป็นรูปภาพ.',
    'in' => ':attribute ที่เลือกไม่ถูกต้อง',
    'in_array' => ':attribute ไม่มีฟิลด์ใน :other.',
    'integer' => ':attribute ต้องเป็นตัวเลข.',
    'ip' => ':attribute ต้องเป็น ที่อยู่ IP.',
    'ipv4' => ':attribute ต้องเป็นที่อยู่ IPv4 ที่ถูกต้อง.',
    'ipv6' => ':attribute ต้องเป็นที่อยู่ IPv6 ที่ถูกต้อง.',
    'json' => ':attribute ต้องเป็นสตริง JSON ที่ถูกต้อง.',
    'lt' => [
        'numeric' => ':attribute ต้องน้อยกว่า :value.',
        'file' => ':attribute ต้องน้อยกว่า :value kilobytes.',
        'string' => ':attribute ต้องน้อยกว่า :value characters.',
        'array' => ':attribute ต้องน้อยกว่า :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute ต้องน้อยกว่าหรือเท่ากับ :value.',
        'file' => ':attribute ต้องน้อยกว่าหรือเท่ากับ :value kilobytes.',
        'string' => ':attribute ต้องน้อยกว่าหรือเท่ากับ :value characters.',
        'array' => ':attribute ต้องน้อยกว่าหรือเท่ากับ :value items.',
    ],
    'max' => [
        'numeric' => ':attribute อาจไม่มากกว่า :max.',
        'file' => ':attribute อาจไม่มากกว่า :max kilobytes.',
        'string' => ':attribute อาจไม่มากกว่า :max characters.',
        'array' => ':attribute อาจไม่มากกว่า :max items.',
    ],
    'mimes' => ':attribute จะต้องเป็นไฟล์ของ type: :values.',
    'mimetypes' => ':attribute จะต้องเป็นไฟล์ของ type: :values.',
    'min' => [
        'numeric' => ':attribute ต้องมีอย่างน้อย :min.',
        'file' => ':attribute ต้องมีอย่างน้อย :min kilobytes.',
        'string' => ':attribute ต้องมีอย่างน้อย :min characters.',
        'array' => ':attribute ต้องมีอย่างน้อย :min items.',
    ],
    'not_in' => ':attribute ที่เลือกไม่ถูกต้อง.',
    'not_regex' => ':attribute รูปแบบไม่ถูกต้อง.',
    'numeric' => ':attribute ต้องเป็นตัวเลข.',
    'present' => ':attribute ต้องมีฟิลด์.',
    'regex' => ':attribute รูปแบบไม่ถูกต้อง.',
    'required' => ':attribute ต้องระบุข้อมูล.',
    'required_if' => ':attribute จำเป็นต้องใช้ฟิลด์เมื่อ :other is :value.',
    'required_unless' => ':attribute จำเป็นต้องกรอกข้อมูล :other is in :values.',
    'required_with' => ':attribute จำเป็นต้องใช้ฟิลด์เมื่อ :values is present.',
    'required_with_all' => ':attribute จำเป็นต้องใช้ฟิลด์เมื่อ :values are present.',
    'required_without' => ':attribute จำเป็นต้องใช้ฟิลด์เมื่อ :values is not present.',
    'required_without_all' => ':attribute ต้องระบุข้อมูลในฟิลด์เมื่อไม่มี :values are present.',
    'same' => ':attribute และ :other ต้องตรงกัน.',
    'size' => [
        'numeric' => ':attribute จะต้องเป็น :size.',
        'file' => ':attribute จะต้องเป็น :size kilobytes.',
        'string' => ':attribute จะต้องเป็น :size characters.',
        'array' => ':attribute จะต้องมี :size items.',
    ],
    'starts_with' => ':attribute จะต้องเริ่มต้นด้วยหนึ่งใน following: :values',
    'string' => ':attribute ต้องเป็นสตริง.',
    'timezone' => ':attribute จะต้องเป็นโซนที่ถูกต้อง.',
    'unique' => ':attribute ถูกยึดแล้ว.',
    'uploaded' => ':attribute อัปโหลดล้มเหลว.',
    'url' => ':attribute รูปแบบไม่ถูกต้อง.',
    'uuid' => ':attribute จะต้องถูกต้อง UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];

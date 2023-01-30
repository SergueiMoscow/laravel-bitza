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

    'accepted' => 'Este campo debe ser aceptado.',
    'accepted_if' => 'Este campo debe ser aceptado cuando :other sea :value.',
    'active_url' => 'Esta no es una URL válida.',
    'after' => 'Debe ser una fecha después de :date.',
    'after_or_equal' => 'Debe ser una fecha después o igual a :date.',
    'alpha' => 'Este campo solo puede contener letras.',
    'alpha_dash' => 'Este campo solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'Este campo solo puede contener letras y números.',
    'array' => 'Este campo debe ser un array (colección).',
    'ascii' => 'Este campo solo debe contener caracteres alfanuméricos y símbolos de un solo byte.',
    'before' => 'Debe ser una fecha antes de :date.',
    'before_or_equal' => 'Debe ser una fecha anterior o igual a :date.',
    'between' => [
        'array' => 'El contenido debe tener entre :min y :max elementos.',
        'file' => 'Este archivo debe ser entre :min y :max kilobytes.',
        'numeric' => 'Este valor debe ser entre :min y :max.',
        'string' => 'El texto debe ser entre :min y :max caracteres.',
    ],
    'boolean' => 'El campo debe ser verdadero o falso.',
    'confirmed' => 'La confirmación no coincide.',
    'current_password' => 'La contraseña es incorrecta.',
    'date' => 'Esta no es una fecha válida (:attribute).',
    'date_equals' => 'El campo debe ser una fecha igual a :date.',
    'date_format' => 'El campo no corresponde al formato :format.',
    'decimal' => 'Este campo debe tener :decimal cifras decimales.',
    'declined' => 'Este campo debe ser rechazado.',
    'declined_if' => 'Este campo debe ser rechazado cuando :other sea :value.',
    'different' => 'Este valor deben ser diferente de :other.',
    'digits' => 'Debe tener :digits dígitos.',
    'digits_between' => 'Debe tener entre :min y :max dígitos.',
    'dimensions' => 'Las dimensiones de esta imagen son inválidas (:attribute).',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'doesnt_end_with' => 'El campo :attribute no puede finalizar con uno de los siguientes: :values.',
    'doesnt_start_with' => 'El campo :attribute no puede comenzar con uno de los siguientes: :values.',
    'email' => 'El campo :attribute no es un correo válido.',
    'ends_with' => 'El campo :attribute debe finalizar con uno de los siguientes valores: :values.',
    'enum' => 'El valor seleccionado de :attribute no es válido.',
    'exists' => 'El valor seleccionado de :attribute no es válido.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'array' => ':attribute debe tener mas de :value elementos.',
        'file' => 'El archivo :attribute debe ser mayor que :value kilobytes.',
        'numeric' => 'El valor de :attribute debe ser mayor que :value.',
        'string' => 'El campo :attribute debe tener más de :value caracteres.',
    ],
    'gte' => [
        'array' => ':attribute debe tener :value elementos o más.',
        'file' => 'El archivo :attribute debe ser mayor o igual que :value kilobytes.',
        'numeric' => 'El valor de :attribute debe ser mayor o igual que :value.',
        'string' => 'El campo :attribute debe tener :value o más caracteres.',
    ],
    'image' => ':attribute debe ser una imagen.',
    'in' => 'El valor seleccionado de :attribute es inválido.',
    'in_array' => 'El valor de :attribute no existe en :other.',
    'integer' => 'El campo :attribute debe ser un entero.',
    'ip' => 'El campo :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El campo :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El campo :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El campo :attribute debe ser un texto válido en JSON.',
    'lowercase' => 'El campo :attribute debe estar en minúscula.',
    'lt' => [
        'array' => 'El contenido de :attribute debe tener menor de :value elementos.',
        'file' => 'El tamaño del archivo :attribute debe ser menor a :value kilobytes.',
        'numeric' => 'El valor de :attribute debe ser menor de :value.',
        'string' => 'El campo :attribute debe tener :value o menos caracteres.',
    ],
    'lte' => [
        'array' => 'El :attribute no debe tener más de :value elementos.',
        'file' => 'El archivo :attribute debe ser menor o igual a :value kilobytes.',
        'numeric' => 'El :attribute debe ser menor o igual que :value.',
        'string' => 'El número de caracteres en el campo :attribute debe ser :value o menos.',
    ],
    'mac_address' => 'El :attribute debe ser una dirección MAC válida.',
    'max' => [
        'array' => 'El :attribute no debe tener más de :max elementos.',
        'file' => 'El :attribute no debe tener más de :max kilobytes.',
        'numeric' => 'El :attribute no debe ser mayor que :max.',
        'string' => 'El :attribute no debe tener más de :max caracteres.',
    ],
    'max_digits' => 'El :attribute no debe tener más de :max dígitos.',
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'array' => 'El :attribute debe tener al menos :min elementos.',
        'file' => 'El :attribute debe tener al menos :min kilobytes.',
        'numeric' => 'El :attribute debe ser al menos :min.',
        'string' => 'El :attribute debe tener al menos :min caracteres.',
    ],
    'min_digits' => 'El :attribute debe tener al menos :min dígitos.',
    'multiple_of' => 'El :attribute debe ser un múltiplo de :value.',
    'not_in' => 'El :attribute seleccionado no es válido.',
    'not_regex' => 'El :attribute seleccionado no es válido.',
    'numeric' => 'El :attribute debe ser un número.',
    'password' => [
        'letters' => 'El :attribute debe contener al menos una letra.',
        'mixed' => 'El :attribute debe contener al menos una letra mayúscula y una minúscula.',
        'numbers' => 'El :attribute debe contener al menos un número.',
        'symbols' => 'El :attribute debe contener al menos un símbolo.',
        'uncompromised' => 'El :attribute dado ha aparecido en una fuga de datos. Elija un :attribute diferente.',
    ],
    'present' => 'El campo :attribute debe estar presente.',
    'prohibited' => 'El campo :attribute está prohibido.',
    'prohibited_if' => 'El campo :attribute está prohibido cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute está prohibido a menos que :other esté en :values.',
    'prohibits' => 'El campo :attribute prohíbe que :other esté presente.',
    'regex' => 'El formato de :attribute no es válido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_array_keys' => 'El campo :attribute debe contener entradas para: :values.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_if_accepted' => 'El campo :attribute es obligatorio cuando se acepta :other.',
    'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando los :values están presentes.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los :values está presente.',
    'same' => 'El :attribute y :other deben coincidir.',
    'size' => [
        'array' => 'El :attribute debe contener :size elementos de tamaño.',
        'file' => 'El :attribute debe ser :size kilobytes.',
        'numeric' => 'El :attribute debe ser :size.',
        'string' => 'El :attribute debe tener :size caracteres.',
    ],
    'starts_with' => 'El :attribute debe comenzar con uno de los siguientes: :values.',
    'string' => 'El :attribute debe ser un texto.',
    'timezone' => 'El :attribute debe ser una zona horaria válida.',
    'unique' => 'Este valor de :attribute ya existe.',
    'uploaded' => 'El :attribute no se pudo cargar.',
    'uppercase' => 'El :attribute debe estar en mayúsculas.',
    'url' => 'El :attribute debe ser una URL válida.',
    'ulid' => 'El :attribute debe ser un ULID válido.',
    'uuid' => 'El :attribute debe ser un UUID válido.',

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

<?php

return [
    'accepted'             => ':Attribute harus diterima.',
    'active_url'           => ':Attribute bukan URL yang valid.',
    'after'                => ':Attribute harus tanggal setelah :date.',
    'after_or_equal'       => ':Attribute harus berupa tanggal setelah atau sama dengan :date.',
    'alpha'                => ':Attribute hanya boleh berisi huruf.',
    'alpha_dash'           => ':Attribute hanya boleh berisi huruf, angka, dan strip.',
    'alpha_num'            => ':Attribute hanya boleh berisi huruf dan angka.',
    'array'                => ':Attribute harus berupa sebuah array.',
    'before'               => ':Attribute harus tanggal sebelum :date.',
    'before_or_equal'      => ':Attribute harus berupa tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => ':Attribute harus antara :min dan :max.',
        'file'    => ':Attribute harus antara :min dan :max kilobytes.',
        'string'  => ':Attribute harus antara :min dan :max karakter.',
        'array'   => ':Attribute harus memiliki antara :min dan :max anggota.',
    ],
    'boolean'              => ':Attribute harus berupa true atau false.',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => ':Attribute bukan tanggal yang valid.',
    'date_equals'          => ':Attribute harus berupa tanggal yang sama dengan :date.',
    'date_format'          => ':Attribute tidak cocok dengan format :format.',
    'different'            => ':Attribute dan :other harus berbeda.',
    'digits'               => ':Attribute harus berupa :digits digit.',
    'digits_between'       => ':Attribute harus antara :min dan :max digit.',
    'dimensions'           => ':Attribute memiliki dimensi gambar yang tidak valid.',
    'distinct'             => ':Attribute memiliki nilai yang duplikat.',
    'email'                => ':Attribute harus berupa alamat email yang valid.',
    'ends_with'            => ':Attribute harus diakhiri dengan salah satu dari berikut: :values',
    'exists'               => ':Attribute yang dipilih tidak valid.',
    'file'                 => ':Attribute harus berupa sebuah berkas.',
    'filled'               => ':Attribute harus memiliki nilai.',
    'gt'                   => [
        'numeric' => ':Attribute harus lebih besar dari :value.',
        'file'    => ':Attribute harus lebih besar dari :value kilobytes.',
        'string'  => ':Attribute harus lebih besar dari :value karakter.',
        'array'   => ':Attribute harus memiliki lebih dari :value anggota.',
    ],
    'gte'                  => [
        'numeric' => ':Attribute harus lebih besar atau sama dengan :value.',
        'file'    => ':Attribute harus lebih besar atau sama dengan :value kilobytes.',
        'string'  => ':Attribute harus lebih besar atau sama dengan :value karakter.',
        'array'   => ':Attribute harus memiliki :value anggota atau lebih.',
    ],
    'image'                => ':Attribute harus berupa gambar.',
    'in'                   => ':Attribute yang dipilih tidak valid.',
    'in_array'             => ':Attribute tidak ada di :other.',
    'integer'              => ':Attribute harus berupa bilangan bulat.',
    'ip'                   => ':Attribute harus berupa alamat IP yang valid.',
    'ipv4'                 => ':Attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'                 => ':Attribute harus berupa alamat IPv6 yang valid.',
    'json'                 => ':Attribute harus berupa JSON string yang valid.',
    'lt'                   => [
        'numeric' => ':Attribute harus kurang dari :value.',
        'file'    => ':Attribute harus kurang dari :value kilobytes.',
        'string'  => ':Attribute harus kurang dari :value karakter.',
        'array'   => ':Attribute harus memiliki kurang dari :value anggota.',
    ],
    'lte'                  => [
        'numeric' => ':Attribute harus kurang dari atau sama dengan :value.',
        'file'    => ':Attribute harus kurang dari atau sama dengan :value kilobytes.',
        'string'  => ':Attribute harus kurang dari atau sama dengan :value karakter.',
        'array'   => ':Attribute tidak boleh memiliki lebih dari :value anggota.',
    ],
    'max'                  => [
        'numeric' => ':Attribute tidak boleh lebih besar dari :max.',
        'file'    => ':Attribute tidak boleh lebih besar dari :max kilobytes.',
        'string'  => ':Attribute tidak boleh lebih besar dari :max karakter.',
        'array'   => ':Attribute tidak boleh memiliki lebih dari :max anggota.',
    ],
    'mimes'                => ':Attribute harus berupa berkas berjenis: :values.',
    'mimetypes'            => ':Attribute harus berupa berkas berjenis: :values.',
    'min'                  => [
        'numeric' => ':Attribute harus minimal :min.',
        'file'    => ':Attribute harus minimal :min kilobytes.',
        'string'  => ':Attribute harus minimal :min karakter.',
        'array'   => ':Attribute harus memiliki minimal :min anggota.',
    ],
    'multiple_of'          => ':Attribute harus kelipatan dari :value',
    'not_in'               => ':Attribute yang dipilih tidak valid.',
    'not_regex'            => 'Format :attribute tidak valid.',
    'numeric'              => ':Attribute harus berupa angka.',
    'password'             => 'Kata sandi salah.',
    'present'              => ':Attribute harus ada.',
    'regex'                => 'Format :attribute tidak valid.',
    'required'             => ':Attribute wajib diisi.',
    'required_if'          => ':Attribute wajib diisi jika :other adalah :value.',
    'required_unless'      => ':Attribute wajib diisi kecuali :other berada dalam :values.',
    'required_with'        => ':Attribute wajib diisi jika terdapat :values.',
    'required_with_all'    => ':Attribute wajib diisi jika terdapat :values.',
    'required_without'     => ':Attribute wajib diisi jika tidak terdapat :values.',
    'required_without_all' => ':Attribute wajib diisi jika tidak terdapat salah satu dari :values.',
    'same'                 => ':Attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => ':Attribute harus berukuran :size.',
        'file'    => ':Attribute harus berukuran :size kilobytes.',
        'string'  => ':Attribute harus berukuran :size karakter.',
        'array'   => ':Attribute harus mengandung :size anggota.',
    ],
    'starts_with'          => ':Attribute harus diawali salah satu dari berikut: :values',
    'string'               => ':Attribute harus berupa string.',
    'timezone'             => ':Attribute harus berupa zona waktu yang valid.',
    'unique'               => ':Attribute sudah terpakai.',
    'uploaded'             => ':Attribute gagal diunggah.',
    'url'                  => 'Format :attribute tidak valid.',
    'uuid'                 => ':Attribute harus merupakan UUID yang valid.',

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

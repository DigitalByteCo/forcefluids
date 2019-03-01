<?php

return [
    'company' => [
        'name' => env('ADMIN_COMPANY_NAME'),
        'contact_person_name' => env('ADMIN_COMPANY_PERSON_NAME'),
        'contact_person_email' => env('ADMIN_COMPANY_PERSON_EMAIL'),
        'contact_person_phone' => env('ADMIN_COMPANY_PERSON_PHONE'),
        'address_1' => env('ADMIN_COMPANY_ADDRESS'),
        'street' => env('ADMIN_COMPANY_STREET'),
        'city' => env('ADMIN_COMPANY_CITY'),
        'state' => env('ADMIN_COMPANY_STATE'),
        'zipcode' => env('ADMIN_COMPANY_ZIP'),
    ],
    'name' => env('APP_USER_NAME'),
    'email' => env('APP_USER_EMAIL'),
    'password' => env('APP_USER_PASSWORD')
];

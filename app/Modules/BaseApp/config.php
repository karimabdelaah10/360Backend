<?php
return [
    'name' => 'Base App',
    'description' => 'Base App Modules',
    'status' => true,
    'autoload' => [
        'Helpers/functions.php'
    ],
    'middleware' => [
        'Locale'
    ]
];

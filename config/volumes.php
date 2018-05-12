<?php

return [
    's3' => [
        'hasUrls' => true,
        'url' => getenv('AWS_URL'),
        'keyId' => getenv('AWS_KEY'),
        'secret' => getenv('AWS_SECRET'),
        'bucket' => getenv('AWS_BUCKET'),
        'region' => getenv('AWS_REGION'),
    ],
];

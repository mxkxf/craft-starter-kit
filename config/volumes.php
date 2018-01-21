<?php

return [
    's3' => [
        'hasUrls' => true,
        'url' => "https://${getenv('AWS_BUCKET')}.s3.amazonaws.com",
        'keyId' => getenv('AWS_KEY'),
        'secret' => getenv('AWS_SECRET'),
        'bucket' => getenv('AWS_BUCKET'),
        'region' => getenv('AWS_REGION'),
    ],
];

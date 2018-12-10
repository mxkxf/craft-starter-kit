<?php

return [
    'components' => [
        'log' => function () {
            // Only log console requests and web requests that aren't getAuthTimeout requests
            $isConsoleRequest = Craft::$app->getRequest()->getIsConsoleRequest();
            if (!$isConsoleRequest && !Craft::$app->getUser()->enableSession) {
                return null;
            }

            return Craft::createObject([
                'class' => yii\log\Dispatcher::class,
                'targets' => [
                    [
                        'class' => codemix\streamlog\Target::class,
                        'url' => 'php://stderr',
                        'levels' => yii\log\Logger::LEVEL_ERROR | yii\log\Logger::LEVEL_WARNING,
                    ],
                ],
            ]);
        },
    ],
];

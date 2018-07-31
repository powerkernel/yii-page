<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

return [
    'rules' => [
        [
            '__class' => \yii\rest\UrlRule::class,
            'pluralize' => false,
            'controller' => [
                'v1/pages' => 'v1/page/page',
                'v1/page/admin'
            ],
            'tokens' => [
                '{id}' => '<id:\\w[\\w,]*>',
            ],
        ],
    ]
];
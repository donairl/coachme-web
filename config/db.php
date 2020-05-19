<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;dbname=dbcoachme',
    'username' => 'postgres',
    'password' => '',
    'charset' => 'utf8',
    'enableSchemaCache' => true,

    // Duration of schema cache.
    'schemaCacheDuration' => 3600,

    // Name of the cache component used to store schema information
    'schemaCache' => 'cache',
];

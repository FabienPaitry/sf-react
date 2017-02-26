<?php

/**
 * OF configuration for Xhgui
 */
return array(
    'debug' => false,
    'mode' => 'development',
    'save.handler' => 'mongodb',
    'db.host' => 'mongodb://mongodb:27017',
    'db.db' => 'tideways',
    // Allows you to pass additional options like replicaSet to MongoClient.
    // 'username', 'password' and 'db' (where the user is added)
    'db.options' => array(),
    'templates.path' => dirname(__DIR__) . '/src/templates',
    'date.format' => 'M jS H:i:s',
    'detail.count' => 6,
    'page.limit' => 25,
    // Profile 1 in 100 requests or each request if XHGUI_PROFILE cookie is set
    'profiler.enable' => function () {
        if (isset($_COOKIE['XDEBUG_PROFILE'])) {
            return true;
        } else {
            return false;
        }
    },
    'profiler.simple_url' => function ($url) {
        return preg_replace('/\=\d+/', '', $url);
    }
);

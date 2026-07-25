<?php

// Arahkan storage dan cache Laravel ke folder /tmp bawaan Vercel
$_ENV['APP_STORAGE'] = '/tmp/storage';

if (!is_dir('/tmp/storage')) {
    mkdir('/tmp/storage', 0755, true);
    mkdir('/tmp/storage/framework/views', 0755, true);
    mkdir('/tmp/storage/framework/cache', 0755, true);
    mkdir('/tmp/storage/framework/sessions', 0755, true);
    mkdir('/tmp/storage/logs', 0755, true);
    mkdir('/tmp/storage/bootstrap/cache', 0755, true);
}

// Forward request ke public/index.php Laravel
require __DIR__ . '/../public/index.php';
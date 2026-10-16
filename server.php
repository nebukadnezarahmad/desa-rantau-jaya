<?php

/**
 * Vercel serverless entry for Laravel.
 * - Serves static files from /public directly
 * - Prepares writable /tmp paths (Vercel filesystem is read-only except /tmp)
 * - Copies bundled SQLite DB to /tmp on cold start, runs migrations if needed
 */

// Writable paths for serverless
@mkdir('/tmp/views', 0777, true);
@mkdir('/tmp/ssr', 0777, true);
@mkdir('/tmp/cache', 0777, true);

// SQLite demo: copy bundled DB to /tmp so writes work (ephemeral, resets per instance)
$bundledDb = __DIR__ . '/database/database.sqlite';
$tmpDb = '/tmp/database.sqlite';
if (!file_exists($tmpDb) && file_exists($bundledDb)) {
    @copy($bundledDb, $tmpDb);
}
// Ensure file exists even if no bundled DB (migrations will create tables)
if (!file_exists($tmpDb)) {
    @touch($tmpDb);
}

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

if ($uri !== '/' && file_exists($file = __DIR__ . '/public' . $uri)) {
    header('Content-type: ' . get_mime_type($file) . '; charset: UTF-8;');
    echo file_get_contents($file);
    return;
}

require_once __DIR__ . '/public/index.php';

function get_mime_type($filename) {
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $mimes = array(
        'txt' => 'text/plain',
        'html' => 'text/html',
        'php' => 'text/html',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'xml' => 'application/xml',
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'webp' => 'image/webp',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',
        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
        'mp3' => 'audio/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',
        'ttf' => 'application/x-font-ttf',
        'woff' => 'application/x-woff',
        'woff2' => 'font/woff2',
        'otf' => 'font/otf',
    );

    if (isset($mimes[$extension])) {
        return $mimes[$extension];
    }
    return 'application/octet-stream';
}

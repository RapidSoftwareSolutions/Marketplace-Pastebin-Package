<?php
$routes = [
    'metadata',
    'createApiUserKey',
    'createPaste',
    'getUserPastes',
    'getTrendingPastes',
    'deleteUserPaste',
    'getUser',
    'getUserPastesRaw',
    'getSinglePasteRaw'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}


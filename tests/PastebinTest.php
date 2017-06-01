<?php
namespace Tests;

require_once(__DIR__ . '/../src/Models/checkRequest.php');

class PastebinTest extends BaseTestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testRoutes($url) {
        $response = $this->runApp("POST", '/api/Pastebin/'.$url);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function dataProvider() {
        return [
            ['createApiUserKey'],
            ['createPaste'],
            ['getUserPastes'],
            ['getTrendingPastes'],
            ['deleteUserPaste'],
            ['getUser'],
            ['getUserPastesRaw'],
            ['getSinglePasteRaw']
        ];
    }
}
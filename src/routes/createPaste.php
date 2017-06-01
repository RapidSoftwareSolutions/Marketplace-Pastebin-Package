<?php

$app->post('/api/Pastebin/createPaste', function ($request, $response) {
    /** @var \Slim\Http\Response $response */
    /** @var \Slim\Http\Request $request */
    /** @var \Models\checkRequest $checkRequest */

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiDevKey', 'code']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $postData = $validateRes;
    }

    $url = $settings['apiUrl'] . "/api_post.php";

    $param['api_dev_key'] = $postData['args']['apiDevKey'];
    $param['api_option'] = 'paste';
    $param['api_paste_code'] = $postData['args']['code'];

    if (!empty($postData['args']['apiUserKey'])) {
        $param['api_user_key'] = $postData['args']['apiUserKey'];
    }

    if (isset($postData['args']['name']) && strlen($postData['args']['name']) > 0) {
        $param['api_paste_name'] = $postData['args']['name'];
    }
    if (isset($postData['args']['format']) && strlen($postData['args']['format']) > 0) {
        $param['api_paste_format'] = $postData['args']['format'];
    }
    if (isset($postData['args']['private']) && strlen($postData['args']['private']) > 0) {
        $param['api_paste_private'] = $postData['args']['private'];
    }
    if (isset($postData['args']['expireDate']) && strlen($postData['args']['expireDate']) > 0) {
        $param['api_paste_expire_date'] = $postData['args']['expireDate'];
    }

    try {
        /** @var GuzzleHttp\Client $client */
        $client = $this->httpClient;
        $vendorResponse = $client->post($url, [
            'form_params' => $param
        ]);
        $vendorResponseBody = $vendorResponse->getBody()->getContents();
        if ($vendorResponse->getStatusCode() == 200) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = $vendorResponseBody;
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($vendorResponseBody) ? $vendorResponseBody : json_decode($vendorResponseBody);
        }
    } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
        $vendorResponseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = json_decode($vendorResponseBody);
    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});

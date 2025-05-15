<?php

class ConnectionAPI {
    private $apiUrl;

    public function __construct($apiUrl) {   
        $this->apiUrl = rtrim($apiUrl, '/');
    }

    public function responseAPI($endpoint, $data = []) {
        $jsonData = json_encode($data);

        $ch = curl_init($this->apiUrl . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData),
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            'status' => $httpCode,
            'response' => $response
        ];
    }
}

$api = new ConnectionAPI('http://localhost:8080');

?>
<?php
class PrestaShopAPI {
    private $apiUrl = 'http://localhost:8080/api';
    private $apiKey = 'QKV96NQZXY6A8MRJ9MCT521PJWHYVKBF';

    public function get($resource) {
        $url = $this->apiUrl . $resource . '?ws_key=' . $this->apiKey;
        return $this->makeRequest('GET', $url);
    }

    public function post($resource, $data) {
        $url = $this->apiUrl . $resource . '?ws_key=' . $this->apiKey;
        return $this->makeRequest('POST', $url, $data);
    }

    public function put($resource, $id, $data) {
        $url = $this->apiUrl . $resource . '/' . $id . '?ws_key=' . $this->apiKey;
        return $this->makeRequest('PUT', $url, $data);
    }

    public function delete($resource, $id) {
        $url = $this->apiUrl . $resource . '/' . $id . '?ws_key=' . $this->apiKey;
        return $this->makeRequest('DELETE', $url);
    }

    private function makeRequest($method, $url, $data = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}

$prestashopApi = new PrestaShopAPI();
?>

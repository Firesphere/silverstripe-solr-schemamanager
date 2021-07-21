<?php


namespace Firesphere\SolrManager\Services;


use GuzzleHttp\Client;

class SolrAPIService
{

    private static $methods = [
        'schema',
        'fields',
    ];

    public function getSchema($index) {
        return $this->get('schema', $index);
    }

    public function getFields($index) {
        return $this->get('fields', $index);
    }

    protected function get($method, $index) {

        $client = new Client([
            'base_uri' => 'http://127.0.0.1/solr'
        ]);
        $target = sprintf('%s/schema/%s', $index, $method);
        $result = $client->get($target);
        return $result->getBody();
    }
}

<?php

namespace Firesphere\SolrManager\Services;


use GuzzleHttp\Client;

class SolrAPIService
{

    private static $methods = [
        'schema',
        'fields',
    ];

    public function get($method, $index)
    {
        $client = new Client([
            'base_uri' => 'http://127.0.0.1:8983',
        ]);
        $target = sprintf('solr/%s/schema/%s', $index, $method);
        $result = $client->request('GET', $target);

        return json_decode($result->getBody());
    }
}

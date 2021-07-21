<?php


namespace Firesphere\SolrManager\Services;


use Firesphere\SolrManager\Models\SolrField;
use Firesphere\SolrManager\ORM\SolrList;

class SolrFieldService
{
    protected $service;

    public function __construct()
    {
        $this->service = new SolrAPIService();

    }

    /**
     * @param string $index Name of the Solr Core to request the data from
     * @return SolrList
     */
    public function getFields($index)
    {
        $fields = $this->service->get('fields', $index);

        $fieldList = new SolrList();
        foreach ($fields->fields as $field) {
            $fieldList->push(new SolrField($field));
        }

        return $fieldList;
    }

}

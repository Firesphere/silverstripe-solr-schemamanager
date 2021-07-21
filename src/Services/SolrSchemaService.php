<?php


namespace Firesphere\SolrManager\Services;


class SolrSchemaService
{
    /**
     * @var SolrAPIService
     */
    private $apiService;

    private $index;

    public function __construct($index)
    {
        $this->index = $index;
        $this->apiService = new SolrAPIService();
    }

    public function getSchema()
    {

    }

    /**
     * @return SolrAPIService
     */
    public function getApiService(): SolrAPIService
    {
        return $this->apiService;
    }

    /**
     * @param SolrAPIService $apiService
     * @return SolrSchemaService
     */
    public function setApiService(SolrAPIService $apiService): self
    {
        $this->apiService = $apiService;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param mixed $index
     * @return SolrSchemaService
     */
    public function setIndex($index): self
    {
        $this->index = $index;

        return $this;
    }
}

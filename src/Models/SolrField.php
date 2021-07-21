<?php


namespace Firesphere\SolrManager\Models;


class SolrField
{
    protected $name;
    protected $type;
    protected $docValues;
    protected $multiValued = false;
    protected $indexed;
    protected $stored;
    protected $required = false;

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $method = sprintf('set%s', ucfirst($key));
            $this->$method($value);
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDocValues()
    {
        return $this->docValues;
    }

    /**
     * @param mixed $docValues
     */
    public function setDocValues($docValues): void
    {
        $this->docValues = $docValues;
    }

    /**
     * @return bool
     */
    public function isMultiValued(): bool
    {
        return $this->multiValued;
    }

    /**
     * @param bool $multiValued
     */
    public function setMultiValued(bool $multiValued): void
    {
        $this->multiValued = $multiValued;
    }

    /**
     * @return mixed
     */
    public function getIndexed()
    {
        return $this->indexed;
    }

    /**
     * @param mixed $indexed
     */
    public function setIndexed($indexed): void
    {
        $this->indexed = $indexed;
    }

    /**
     * @return mixed
     */
    public function getStored()
    {
        return $this->stored;
    }

    /**
     * @param mixed $stored
     */
    public function setStored($stored): void
    {
        $this->stored = $stored;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     */
    public function setRequired(bool $required): void
    {
        $this->required = $required;
    }

    public function __get($field)
    {
        if (property_exists($this, strtolower($field))) {
            $method = sprintf('get%s', ucfirst($field));
            return $this->$method();
        }
    }
}

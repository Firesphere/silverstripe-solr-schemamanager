<?php


namespace Firesphere\SolrManager\ORM;


class SolrList implements \ArrayAccess
{

    protected $position = 0;
    protected $items;

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items): void
    {
        $this->items = $items;
    }

    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return ($this->offsetExists($offset)) ? $this->items[$offset] : null;
    }

    public function offsetSet($offset = null, $value = '')
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->items[$offset]);
        }
    }

    /**
     * @param $key
     * @param $value
     * @return mixed|null
     */
    public function find($key, $value)
    {
        foreach ($this->items as $item) {
            if ($item->$key === $value) {
                return $item;
            }
        }

        return null;
    }

    public function push($item)
    {
        $this->items[] = $item;
    }

    /**
     * Returns the first item in the list
     *
     * @return mixed
     */
    public function first()
    {
        if (empty($this->items)) {
            return null;
        }

        return reset($this->items);
    }

    /**
     * Returns the last item in the list
     *
     * @return mixed
     */
    public function last()
    {
        if (empty($this->items)) {
            return null;
        }

        return end($this->items);
    }
}

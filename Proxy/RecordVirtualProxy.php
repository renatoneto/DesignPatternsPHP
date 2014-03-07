<?php

namespace DesignPatterns\Proxy;

/**
 * Class RecordVirtualProxy
 *
 * This demonstrates a virtual proxy implementation.
 *
 * A virtual proxy is a proxy which delays the creation
 * of an expensive-to-create resource until it's necessary
 * to use it.
 */
class RecordVirtualProxy implements RecordInterface
{

    /**
     * @var RecordInterface The record instance to proxy for
     */
    protected $record;

    /**
     * magic getter
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        $this->setup();
        return $this->record->$name;
    }

    /**
     * magic setter
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return void
     */
    public function __set($name, $value)
    {
        $this->setup();
	$this->record->$name = $value;
    }

    protected function setup()
    {
        if (is_null($this->record)) {
            // We lazily insantiate our "expensive to create"
            // resource, only when we need to. 
            $this->record = new Record(array());
        }
    }
}

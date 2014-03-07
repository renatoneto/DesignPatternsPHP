<?php

namespace DesignPatterns\Proxy;

/**
 * Class RecordProxy
 */
class RecordProxy implements RecordInterface
{

    /**
     * @var RecordInterface The record instance to proxy to
     */
    protected $record;

    /**
     * @param RecordInterface $record
     */
    public function __construct(RecordInterface $record)
    {
        $this->record = $record;
    }

    /**
     * magic getter
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
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
	$this->record->$name = $value;
    }
}

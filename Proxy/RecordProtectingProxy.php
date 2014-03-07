<?php

namespace DesignPatterns\Proxy;

/**
 * Class RecordProtectingProxy
 */
class RecordProtectingProxy implements RecordInterface
{

    /**
     * @var RecordInterface The record instance to proxy to
     */
    protected $record;

    /**
     * @var PermissionResolver An object that resolves permissions
     */
    protected $resolver;

    /**
     * @param RecordInterface $record The record to control access to
     * @param PermissionResolver $resolver An object to handle authentication
     */
    public function __construct(RecordInterface $record, PermissionResolver $resolver)
    {
        $this->record = $record;
        $this->resolver = $resolver;
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
        if ($this->resolver->hasReadAccess($name)) {
            return $this->record->$name;
        }
        return null;
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
        if ($this->resolver->hasWriteAccess($name)) {
            $this->record->$name = $value;
        }
    }

}

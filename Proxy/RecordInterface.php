<?php

namespace DesignPatterns\Proxy;

/**
 * interface RecordInterface
 */
interface RecordInterface
{

    /**
     * magic setter
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return void
     */
    public function __set($name, $value);

    /**
     * magic getter
     *
     * @param string $name
     *
     * @return mixed|null
     */
    public function __get($name);

}

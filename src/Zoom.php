<?php

namespace Acrossoffwest\Zoom;

use Exception;
use Illuminate\Support\Str;

/**
 * Class Zoom
 * @package Acrossoffwest\Zoom
 *
 * @property-read \Acrossoffwest\Zoom\Classes\Users $users
 * @property-read \Acrossoffwest\Zoom\Classes\Meetings $meetings
 */
class Zoom
{

    /**
     * __call
     *
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return $this->make($method);
    }


    /**
     * __get
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->make($name);
    }

    /**
     * Make
     *
     * @param $resource
     * @return mixed
     * @throws Exception
     */
    public function make($resource)
    {
        $class = 'Acrossoffwest\\Zoom\\Classes\\' . Str::studly($resource);

        if (class_exists($class)) {

            return new $class();
        }

        throw new Exception('Wrong method');
    }


}
<?php namespace App\Controllers;

use Psr\Container\ContainerInterface;

class BaseController{

    protected $container;

    public function __construct(ContainerInterface $ci){
        $this->container = $ci;

    }

}
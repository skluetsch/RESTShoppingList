<?php

namespace Controller;

use \Slim\Slim;

class ControllerBase {

    /**
     *
     * @var \Slim\Slim
     */
    private $app;

    public function __construct(Slim $app) {
        $this->app = $app;
    }

    public function getApp() {
        return $this->app;
    }

    public function setApp(\Slim\Slim $app) {
        $this->app = $app;
        return $this;
    }

}

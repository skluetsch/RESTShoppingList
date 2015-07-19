<?php

namespace Modules\LibraryModule\Services;

class BaseService {

    /**
     * @var \Slim\Slim
     */
    protected $app = null;

    public function __construct(\Slim\Slim $app) {
        $this->setApp($app);
    }

    /**
     * @return \Slim\Slim
     */
    public function getApp() {
        return $this->app;
    }

    /**
     * @param \Slim\Slim $app
     * @return \LibraryModule\Services\BaseService
     */
    public function setApp(\Slim\Slim $app) {
        $this->app = $app;
        return $this;
    }

}

<?php

namespace Modules\LibraryModule\Mappers;

abstract class DatabaseMapper {
    
    public function __construct() {
        
    }
    
    abstract protected function connect();
}

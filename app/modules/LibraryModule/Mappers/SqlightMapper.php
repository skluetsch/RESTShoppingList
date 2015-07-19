<?php

namespace Modules\LibraryModule\Mappers;

class SqlightMapper extends DatabaseMapper {

    /**
     * @var \SQLite3
     */
    private $db;
    /**
     * @var string 
     */
    private $path;

    function __construct($path) {
        parent::__construct();
        $this->setPath($path);
        $this->connect();
    }

    /**
     * @return \Modules\LibraryModule\Mappers\SqlightMapper
     */
    protected function connect() {
        $this->db = new \SQLite3($this->getPath());
        return $this;
    }

    /**
     * 
     * @param string $query
     * @return array
     */
    public function sendSelectQuery($query) {
        $result = $this->db->query($query);
        while($fetch = $result->fetchArray(SQLITE3_ASSOC)){
            $resultList[] = $fetch;
        }
        return (is_array($resultList) ? $resultList : []);
    }

    /**
     * 
     * @param string $query
     * @return array
     */
    public function sendResultlessQuery($query) {
        $this->db->exec($query);
        return $this->db->lastInsertRowID();
    }

    /**
     * @return /SQLite3
     */
    public function getDb() {
        return $this->db;
    }

    /**
     * @return string
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * @param \SQLite3 $db
     * @return \Modules\LibraryModule\Mappers\SqlightMapper
     */
    public function setDb(\SQLite3 $db) {
        $this->db = $db;
        return $this;
    }

    /**
     * 
     * @param string $path
     * @return \Modules\LibraryModule\Mappers\SqlightMapper
     */
    public function setPath($path) {
        $this->path = $path;
        return $this;
    }

}

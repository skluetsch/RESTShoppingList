<?php

namespace Modules\ListModule;

use \Modules\LibraryModule\Mappers\SqlightMapper;

class ListMapper extends SqlightMapper {

    /**
     * @var array
     */
    private $addElementList = [];
    
    /**
     * @var array 
     */
    private $deleteElementList = [];

    /**
     * loads all elements of the user with ID: $this->ownerId
     * @return array
     */
    public function load($ownerId) {
        return $this->sendSelectQuery('SELECT elementId, content, updated FROM listElements WHERE ownerId = ' . $ownerId . ';');
    }

    /**
     * @param array $elementList
     * @return \Modules\ListModule\ListMapper
     */
    public function elementsToAdd($elementList) {
        $this->addElementList = $elementList;
        return $this;
    }

    /**
     * @param array $elementList
     * @return \Modules\ListModule\ListMapper
     */
    public function elementsToDelete($elementList) {
        $this->deleteElementList = $elementList;
        return $this;
    }

    /**
     * @param int $ownerId
     * @return bool
     */
    public function save($ownerId) {

        return $this->sendResultlessQuery(
                $this->createAddQuerys($ownerId) . 
                $this->createRemoveQuerys($ownerId)
                );
    }

    /**
     * @param type $ownerId
     * @return string
     */
    protected function createAddQuerys($ownerId) {
        $query = '';
        foreach ($this->addElementList as $element) {
            $query .= sprintf('INSERT INTO listelements (ownerId, content, updated) VALUES(%d, "%s", %d);', 
                    $ownerId, 
                    $element['content'], 
                    $element['update']) . PHP_EOL;
        }
        return $query;
    }

    /**
     * @param type $ownerId
     * @return string
     */
    protected function createRemoveQuerys($ownerId) {
        $query = '';
        
        if (!empty($this->deleteElementList)) {
            $query .= sprintf('DELETE FROM listElements WHERE ownerId = %d AND elementId IN (%s);', 
                    $ownerId, 
                    implode(',', $this->deleteElementList)) . PHP_EOL;
        }
        return $query;
    }
}

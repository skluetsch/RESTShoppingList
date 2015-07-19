<?php

namespace Modules\ListModule;

use Modules\LibraryModule\Services\BaseService;

class ListService extends BaseService {

    /**
     * @var array
     */
    private $addElementList = [];
    private $deleteElementList = [];

    /**
     * Loads a whole list of elements for the given user
     * 
     * @param int $ownerId
     * @return array
     */
    public function load($ownerId) {

        return $this->getListMapper()
                        ->load($ownerId);
    }

    /**
     * extend the list of elements that has to be added
     * For writing the list to DB you have to execute save afterwerds.
     *  
     * @param int/timestamp $updateTimestemp
     * @param string $elementContent
     */
    public function add($updateTimestemp, $elementContent) {
        $this->addElementList[] = [
            'update' => $updateTimestemp,
            'content' => $elementContent,
        ];
    }

    /**
     * extend the list of elements that has to be deleted
     * For remove those elemtens from the DB you have to execute save afterwerds.
     * 
     * @param int $elementId
     */
    public function delete($elementId) {
        $this->deleteElementList[] = $elementId;
    }

    /**
     * execute alls changes in the Lists at once
     * 
     * @param int $ownerId
     * @return int
     */
    public function save($ownerId) {
        return $this->getListMapper()
                        ->elementsToAdd($this->addElementList)
                        ->elementsToDelete($this->deleteElementList)
                        ->save($ownerId);
    }

    /**
     * @return \Modules\ListModule\ListMapper
     */
    protected function getListMapper() {
        $config = $this->getApp()->config('custom');
        $path = $config['DB']['sqlight']['path'];
        
        return new ListMapper($path);
    }

}

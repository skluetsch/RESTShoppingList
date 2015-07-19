<?php

namespace Controller;

use \Modules\ListModule\ListService;

class ListController extends ControllerBase {

    /**
     * @return array
     */
    public function load() {
        $listService = $this->getListService();
        return $listService->load(1);
    }

    /**
     * @return int
     */
    public function addElement() {
        $listService = $this->getListService();

        $element = $this->getApp()->request()->post();

        $this->validateAddElementsParameters($element);

        $createdTimestemp = $element['created'];
        $elementContent = $element['content'];
        if (is_numeric($createdTimestemp)) {
            $elementContent = htmlentities($elementContent, ENT_QUOTES);
            $listService->add($createdTimestemp, $elementContent);
        }

        return $listService->save(1);
    }

    protected function validateAddElementsParameters($element) {
        if (!preg_match('/^[0-9]+$/', $element['created']) ||
                !preg_match('/^[a-zA-Z0-9äöü? ]+$/', $element['content'])) {
            throw new \Exception('illegal Arguments');
        }
    }

    /**
     * @return mixed
     */
    public function removeElement() {
        $listService = $this->getListService();
        $parameterList = $this->getApp()->request()->delete();
        if (isset($parameterList['elementId'])) {
            $elementId = intval($parameterList['elementId']);
            $listService->delete($elementId);

            return $listService->save(1);
        }
        return -1;
    }

    /**
     * 
     * @return \Modules\ListModule\ListService
     */
    protected function getListService() {
        return new ListService($this->getApp());
    }

}

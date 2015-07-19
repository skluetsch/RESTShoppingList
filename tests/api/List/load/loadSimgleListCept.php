<?php

$scenario->group('ListModule');

$I = new ApiTester($scenario);
$I->wantTo('load a single list');
$I->sendGET('/list/elements');

$I->seeResponseCodeIs(200);

$I->grabDataFromResponseByJsonPath('$');
$I->seeResponseContainsJson([
    [ "content" => "Milk",
        "updated" => 1436630703],
    [ "content" => "soy yogurt",
        "updated" => 1436630801],
    [ "content" => "Steak",
        "updated" => 1436630839],
]);

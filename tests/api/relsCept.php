<?php

$scenario->group('rels');

$I = new ApiTester($scenario);

$I->wantTo('load the initial rels');
$I->sendGET('/rels');
$I->grabDataFromResponseByJsonPath('$');
$I->seeResponseContainsJson([
    'loadList' => '/list/elements',
    'addToList' => '/list/elements',
    'removeFromList' => '/list/elements',
]);

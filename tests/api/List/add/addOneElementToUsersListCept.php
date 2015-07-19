<?php

$scenario->group('ListModule');

$I = new ApiTester($scenario);
$I->wantTo('add one element to an existing user');

$I->sendPOST('/list/elements', [ 'created' => 1436630703, 'content' => 'Milk']);

$I->seeResponseCodeIs(200);

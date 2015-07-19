<?php

$scenario->group('ListModule');

$I = new ApiTester($scenario);
$I->wantTo('delete a element of the users List');
$I->sendDELETE('/list/elements', ['elementId'=>5]);

$I->seeResponseCodeIs(200);
$I->seeResponseEquals('');

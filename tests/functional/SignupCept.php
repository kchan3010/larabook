<?php 
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('signup for a Larabook account');

$I->amOnPage('/');
$I->click('Sign Up!');
$I->seeCurrentUrlEquals('/register');

$I->fillField('username', 'JohnDoe');
$I->fillField('email', 'john@example.com');
$I->fillField('password', 'demo');
$I->fillField('password_confirmation', 'demo');

$I->click('Sign Up', 'input[type="submit"]');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Larabook');

$I->seeRecord('users',
    ['username' => 'JohnDoe']
);

$I->assertTrue(Auth::check());
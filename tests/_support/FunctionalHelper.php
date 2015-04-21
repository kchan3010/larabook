<?php
namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{

    public function haveAnAccount($overrides = [])
    {
        return $this->have('Larabook\Users\User', $overrides);
    }

    public function signIn()
    {
        $this->haveAnAccount(['email' => 'foo@example.com', 'password' => 'demo']);

        $I = $this->getModule('Laravel4');

        $I->amOnPage('/login');
        $I->fillField('email', 'foo@example.com');
        $I->fillField('password', 'demo' );
        $I->click('Sign In');

    }

    public function postAStatus($body)
    {
        $I = $this->getModule('Laravel4');
        $I->fillField('Status:', $body);
        $I->click('Post Status');
    }

    public function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);
    }
}

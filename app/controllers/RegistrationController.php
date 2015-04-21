<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Core\CommandBus;
use Larabook\Registration\RegisterUserCommand;
use Laracasts\Flash\Flash;

class RegistrationController extends \BaseController {

    use CommandBus;

    private $registrationForm;



    public function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;

        $this->beforeFilter('guest');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

    public function store()
    {
        $this->registrationForm->validate(Input::all());
        extract(Input::only('username', 'email', 'password'));

        $command = new RegisterUserCommand($username, $email, $password);

        $user = $this->execute($command);
        Auth::login($user);

        Flash::overlay('Glad to you have you as a new Larabook user');

        return Redirect::home();
    }


}

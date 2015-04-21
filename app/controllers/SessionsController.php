<?php

use Illuminate\Support\Facades\Auth;
use Larabook\Forms\SignInForm;
use Laracasts\Flash\Flash;

class SessionsController extends \BaseController {

    protected $signInForm;

    function __construct(SignInForm $signInForm)
    {
        $this->signInForm = $signInForm;
        $this->beforeFilter('guest', ['except'=>'destroy']);
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $formData = Input::only('email', 'password');
        $this->signInForm->validate($formData);

        if(Auth::attempt($formData)) {
            Flash::message('Welcome back!');
            return Redirect::intended('statuses');
        }

	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

        Flash::message('You have now been logged out.');
        return Redirect::home();
	}


}

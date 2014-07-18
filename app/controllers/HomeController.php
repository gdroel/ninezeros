<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index(){

		$i = 1;

		$average = Number::updateAverage();
		$average = number_format(round($average));
		$everything = Number::orderBy('number', 'desc')->paginate(10);
		return View::make('index',compact('everything','i','average'));
	}

	public function newNumber(){

		$randnum = rand(0,1000000000);
		$name = Input::get('name');

		$number = new Number;

		$number->number = $randnum;
		$number->name = $name;

		$number->save();

		$percent = $randnum/1000000000;
		$percent = round((float)$percent * 100 );
		$percent = 100-$percent;

		return Redirect::to('highscores')
			->with('randnum',$randnum)
			->with('name',$name)
			->with('percent',$percent);
	}

	public function highscores(){

		$randnum = Session::get('randnum');
		$name = Session::get('name');
		$percent = Session::get('percent');

		$i = 1;

		$average = Number::updateAverage();
		$average = number_format(round($average));
		
		$everything = Number::orderBy('number', 'desc')->paginate(20);
		return View::make('highscores', compact('randnum','everything','name','i','percent','average'));
	}



}

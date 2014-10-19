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

	public function index()
	{
		return View::make('pages.indexPage');
	}


	public  function lorem(){
		if (!isset($_POST['paragraphCount'])){
			return View::make('pages.lorem')->with('paragraph',NULL);
		}else if(isset($_POST['paragraphCount'])){


			$count = Input::get('paragraphCount');
			if ($count >0 && $count <7){
				$count = $count;
			}else{
				$count = 0;
			}
			$generator = new Badcow\LoremIpsum\Generator();
			$paragraphs = $generator->getParagraphs($count);
			$paragraph = implode('<p>', $paragraphs);


			return View::make('pages.lorem')->with('paragraph',$paragraph);

		}

	}


	public function userGenerator()
	{

		if (!isset($_POST['count'])){

			// return the form only.
			return View::make('pages.userGenerator');

		}else{
			
			// Form data
			$count = Input::get('count');
			$birth = Input::get('birth');
			$address = Input::get('address');
			
			// use the factory to create a Faker\Generator instance
			$faker = Faker\Factory::create();

			#Don't generate anything if values is not as expected.
			if ($count < 1 || $count > 10){
				$count = 0; 
			}

			# Generate an array of random information
			for ($x = 0; $x <= $count; $x++){

				// Generate Name
				$data['name'][] = $faker->name;
				
				// Generate Address
				if ($address){

					$data ['address'][] = $faker->address;
					$data['city'][] = $faker->city;
					$data['state'][] = $faker->state;

				}else{

					$data ['address'][] = NULL;
					$data['city'][] = NULL;
					$data['state'][] = NULL;
				}

				// Generate Birthdate
				if ($birth){
					$data['birth'][] = $faker->dateTimeThisCentury->format('d-m-Y');
				}else{
					$data['birth'][] = NULL;
				}

			}

				return View::make('pages.userGenerator')->with('data',$data)->with('count',$count);
		}
	}


}

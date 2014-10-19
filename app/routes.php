<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/





/*
//Commented these because after i uploaded the app to live server, it showed me a message says that homeController class not found. So i'm trying to execute the code from routes file
Route::get('/', 'homeController@index');
Route::get('/lorem-ipsum', 'homeController@lorem');
Route::post('/lorem-ipsum', 'homeController@lorem');
Route::get('/user-generator', 'homeController@userGenerator');
Route::post('/user-generator', 'homeController@userGenerator');
*/



Route::get('/',function(){

	return View::make('pages.indexPage');

});



Route::get('/lorem-ipsum', function(){

	return View::make('pages.lorem')->with('paragraph',NULL);

});


Route::post('/lorem-ipsum', function(){

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

});





Route::get('/user-generator', function(){

	return View::make('pages.userGenerator');
});


Route::post('/user-generator', function(){
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
});







	


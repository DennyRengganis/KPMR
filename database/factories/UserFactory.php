<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(App\building::class, function(Faker $faker) {
	return[
		'nama_gedung' => $faker->streetName,
		'jumlah_lantai' => 3,
	];
});

$factory->define(App\room::class, function(Faker $faker) {
	$building_id = DB::table('buildings')->pluck('id')->toArray();
	$lantai=array();
    for($y=1; $y<=3; $y++)
    {
        $lantai[]=$y;
    }

    $status ='';
    $randomnumber = $faker->randomElement($status);
    if ($randomnumber == 1){
    	$status ='FREE';
    }
    else if ($randomnumber == 2){
    	$status ='WAITING';
    }
    else
    	$status ='BOOKED';

    $nama_ruangan = 'Room ' . $faker->buildingNumber;
    return
    [
    	'nama_ruangan' => $nama_ruangan,
    	'id_gedung' => $faker->randomElement($building_id), 
    	'lantai' => $faker->randomElement($lantai),
    	'status_now' => $status,

	];

});

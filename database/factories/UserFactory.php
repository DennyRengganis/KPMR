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


	for($y=1; $y<=6; $y++)
    {
        $lantai[]=$y;
    }

	return[
		'nama_gedung' => $faker->streetName,
		'jumlah_lantai' => $faker->randomElement($lantai),
	];
});

$factory->define(App\room::class, function(Faker $faker) {
	$building_id = DB::table('buildings')->pluck('id')->toArray();
    $idbangun = $faker->randomElement($building_id);
	$lantai_avail = DB::table('buildings')->where('id', $idbangun)->first();
    $nama_ruangan = 'Room ' . $faker->buildingNumber;
    return
    [
    	'nama_ruangan' => $nama_ruangan,
    	'id_gedung' => $idbangun, 
    	'lantai' => rand(1, $lantai_avail->jumlah_lantai),
    	'status_now' => 'FREE',

	];

});

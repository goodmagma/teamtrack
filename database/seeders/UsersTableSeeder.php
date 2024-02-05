<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//administrator
    	$admin = User::where('email', '=', 'admin@platform.com')->first();
    	
    	if (is_null($admin)) {
    		$this->command->info('User Administrator not found, creating!');

    		$admin = User::create(array(
				'firstname'     => 'Admin',
    			'lastname'     	=> 'Platform',
    			'email'  		=> 'admin@platform.com',
    			'password' 		=> bcrypt('password'),
    		    'remember_token' => Str::random(10)
    		));
    	}

    	$admin->assignRole('administrator');
	
    }
}

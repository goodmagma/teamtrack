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
    	$admin = User::where('email', '=', 'john.doe@mail.app')->first();
    	
    	if (is_null($admin)) {
    		$this->command->info('User Administrator not found, creating!');

    		$admin = User::create(array(
				'firstname'     => 'John',
    			'lastname'     	=> 'Doe',
    			'email'  		=> 'john.doe@mail.app',
    			'password' 		=> bcrypt('P@ssword'),
    		    'remember_token' => Str::random(10)
    		));
    	}

    	$admin->assignRole('administrator');

    }
}

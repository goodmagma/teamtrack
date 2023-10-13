<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$permissions_role_names = array(
			'administrator' => array(),
		);
		
		foreach ($permissions_role_names as $role_name => $permissions){
			$role = Role::where('name', '=', $role_name)->first();
			
			if (is_null($role)) {
				$this->command->info('Role ' . $role_name . ' not found, creating!');
				
				$role = Role::create(['name' => $role_name]);
			}
			
			$role->syncPermissions($permissions);
		}
    	
    }
}

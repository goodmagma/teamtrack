<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$permissions = array("can edit");
    	
    	foreach ( $permissions as $permission_name ){
    		$permission = Permission::where('name', '=', $permission_name)->first();
    		
    		if (is_null($permission)) {
    			$this->command->info('Permission ' . $permission_name. ' not found, creating!');
    			
    			$permission = Permission::create(['name' => $permission_name]);
    		}
    	}
    }
}

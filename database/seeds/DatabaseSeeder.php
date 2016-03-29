<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends 
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
    }
}
class RolesTableSeeder extends Seeder
    {	
    	public function run() {
   			DB::table('roles')->insert([
   			]); 
		} 
    }

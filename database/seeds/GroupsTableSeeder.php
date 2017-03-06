<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Groups = ['Grupo 1','Grupo 2','Grupo 3'];
    	$DescriptionGroups = ['Grupo 1','Grupo 2','Grupo 3'];

    	foreach ($Groups as $key => $value) {
    		DB::table('Groups')->insert([
        		'name' => $value,
        		'description' => $DescriptionGroups[$key],
        	]);
        }
    }
}

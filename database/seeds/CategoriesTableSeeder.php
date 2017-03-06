<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$Categories = ['Categoria 1','Categoria 2','Categoria 3'];
    	$DescriptionCategories = ['Categoria 1','Categoria 2','Categoria 3'];

    	foreach ($Categories as $key => $value) {
    		DB::table('Categories')->insert([
        		'name' => $value,
        		'description' => $DescriptionCategories[$key],
        	]);
    	}
        
    }
}

<?php

class CategoryTableSeeder extends Seeder{
	
	public function run()
	{
		DB::table('category')->delete();


		$category = array(
						
					array(
						
						'name' => 'business'
					)
		);


		DB::table('category')->insert($category);
	}
}
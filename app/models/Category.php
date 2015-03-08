<?php 


	class Category extends Eloquent {

		protected $fillable = array('title');

		
		protected $table = 'Category';

		public function Post()
		{
			$this->belongsTo('Post');
		}
	}
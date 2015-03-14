<?php

	class Post extends Eloquent{

		protected $fillable = array('email', 'password','title','content');

		protected $table = 'posts';

		public function user()
		{
			return $this->belongsTo('User');
		}

		public function comment()
		{
			return $this->hasMany('Comment', 'post_id');
		}

		public function category()
		{
			return $this->hasMany('Category');
		}
	}
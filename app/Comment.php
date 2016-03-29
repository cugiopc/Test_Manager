<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

	protected $fillable = ['comment', 'testcase_id', 'user_id', 'created_at', 'updated_at'];

	public function testcase() {
		return $this->belongsTo(Testcase::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}
}

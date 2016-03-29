<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testcase extends Model
{
    //
	protected $table = 'testcases';

	protected $fillable = ['title', 'descriptions', 'preconditions', 'steps', 'actualy_result', 'expected_result', 'id_status', 'user_id'];
	
	public function comments(){
		return $this->hasMany(Comment::class);
	}

	public function status(){
		return $this->belongsTo(Status::class, 'id_status');
	}

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function testplans() {
		return $this->belongsToMany(Testplan::class);
	}
}

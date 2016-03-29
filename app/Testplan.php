<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testplan extends Model
{
    protected $table = 'testplans';

	protected $fillable = ['name', 'descriptions', 'user_id'];

	public function testcases() {
		return $this->belongsToMany(Testcase::class, 'assignments');
	}

	public function user() {
		return $this->belongsTo(User::class);
	}

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

	protected $fillable = ['status'];

	public function testcase() {
		return $this->hasOne(Testcase::class, 'id_status');
	}

}

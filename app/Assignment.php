<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'assignments';

	protected $fillable = ['plan_id', 'testcase_id'];

}

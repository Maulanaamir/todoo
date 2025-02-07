<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
	use HasFactory;

	protected $table = 'todo';

	protected $fillable = [
		'user_id',
		'todo',
		'priority',
		'deadline_date',
		'status',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}

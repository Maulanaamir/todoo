<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
	public function up(): void
	{
		Schema::create('todo', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->constrained()->onDelete('cascade');
			$table->string('todo');
			$table->enum('priority', ['low', 'medium', 'high']);
			$table->date('deadline_date');
			$table->enum('status', ['done', 'waiting']);
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('todo');
	}
};

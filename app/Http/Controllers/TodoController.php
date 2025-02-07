<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use id;

class TodoController extends Controller
{
	public function index()
	{
		$todos = Todo::where('user_id', auth()->id	())->get();

		return view('todos', compact('todos'));
	}

	public function create()
	{
		return view('create-todos');
	}

	public function store(Request $request)
	{
		$request->validate([
			'todo' => 'required|string|max:255',
			'priority' => 'required|in:low,medium,high',
			'deadline_date' => 'required|date',
		], [
			'todo.required' => 'Please provide a task description.',
			'todo.string' => 'The task description must be a valid string.',
			'todo.max' => 'The task description should not exceed 255 characters.',
			'priority.required' => 'Please select a priority for the task.',
			'priority.in' => 'Priority must be one of the following values: Low, Medium, High.',
			'deadline_date.required' => 'Please specify a deadline for the task.',
			'deadline_date.date' => 'Please provide a valid date for the deadline.',
		]);

		Todo::create([
			'user_id' => auth()->id(),
			'todo' => $request->todo,
			'priority' => $request->priority,
			'deadline_date' => $request->deadline_date,
			'status' => 'waiting',
		]);

		return redirect()->route('todos.index')->with('success', 'Todo created successfully!');
	}

	public function edit($id)
	{
		$todo = Todo::findOrFail($id);

		return view('edit-todos', compact('todo'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'todo' => 'required|string|max:255',
			'priority' => 'required|in:low,medium,high',
			'deadline_date' => 'required|date',
		], [
			'todo.required' => 'Please provide a task description.',
			'todo.string' => 'The task description must be a valid string.',
			'todo.max' => 'The task description should not exceed 255 characters.',
			'priority.required' => 'Please select a priority for the task.',
			'priority.in' => 'Priority must be one of the following values: low, medium, high.',
			'deadline_date.required' => 'Please specify a deadline for the task.',
			'deadline_date.date' => 'Please provide a valid date for the deadline.',
		]);

		$todo = Todo::findOrFail($id);

		$todo->update([
			'todo' => $request->todo,
			'priority' => $request->priority,
			'deadline_date' => $request->deadline_date,
		]);

		return redirect()->route('todos.index')->with('success', 'Todo updated successfully!');
	}

	public function markAsDone($id)
	{
		$todo = Todo::findOrFail($id);

		$newStatus = $todo->status === 'done' ? 'waiting' : 'done';
		$todo->update(['status' => $newStatus]);

		return redirect()->route('todos.index')->with('success', 'Todo marked as done!');
	}

	public function destroy($id)
	{
		$todo = Todo::findOrFail($id);

		$todo->delete();

		return redirect()->route('todos.index')->with('success', 'Todo deleted successfully!');
	}
}

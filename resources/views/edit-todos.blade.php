@extends('layout.main')
@section('content')
		<section class="vh-100">
				<div class="h-100 container py-5">
						<div class="row d-flex justify-content-center align-items-center h-100">
								<div class="col-12">
										<div class="pb-3 text-center">
												<h1 class="h1 my-4 text-black">Edit Todo</h1>
										</div>
										<form
												action="{{ route('todos.update', $todo->id) }}"
												method="POST"
										>
												@csrf
												@method('PUT')
												<div class="card">
														<div class="card-body">
																<div class="mb-3">
																		<label
																				class="col-form-label"
																				for="todo"
																		>Task</label>
																		<input
																				class="form-control"
																				id="todo"
																				name="todo"
																				type="text"
																				value="{{ $todo->todo }}"
																		>
																		@error('todo')
																				<span class="text-danger">{{ $message }}</span>
																		@enderror
																</div>
																<div class="mb-3">
																		<label
																				class="col-form-label"
																				for="priority"
																		>Priority</label>
																		<select
																				class="form-select"
																				id="priority"
																				name="priority"
																				value="{{ $todo->priority }}"
																		>
																				<option
																						value=""
																						selected
																						hidden
																				>Select</option>
																				<option
																						value="low"
																						{{ old('priority', $todo->priority) === 'low' ? ' selected' : '' }}
																				>Low</option>
																				<option
																						value="medium"
																						{{ old('priority', $todo->priority) === 'medium' ? ' selected' : '' }}
																				>Medium</option>
																				<option
																						value="high"
																						{{ old('priority', $todo->priority) === 'high' ? ' selected' : '' }}
																				>High</option>
																		</select>
																		@error('priority')
																				<span class="text-danger">{{ $message }}</span>
																		@enderror
																</div>
																<div class="mb-3">
																		<label
																				class="col-form-label"
																				for="deadline_date"
																		>Deadline</label>
																		<input
																				class="form-control"
																				id="deadline_date"
																				name="deadline_date"
																				type="date"
																				value="{{ $todo->deadline_date }}"
																		>
																		@error('deadline_date')
																				<span class="text-danger">{{ $message }}</span>
																		@enderror
																</div>
														</div>
														<div class="card-footer text-end">
																<a
																		class="btn btn-danger"
																		type="button"
																		href="{{ route('todos.index') }}"
																>Cancel</a>
																<button
																		class="btn btn-success"
																		type="submit"
																>Save</button>
														</div>
												</div>
										</form>
								</div>
						</div>
				</div>
		</section>
@endsection

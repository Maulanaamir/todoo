@extends('layout.main')
@section('content')
		<section class="vh-100">
				<div class="h-100 container py-5">
						<div class="row d-flex justify-content-center align-items-center h-100">
								<div class="col-12">
										<div class="pb-3 text-center">
												<h1 class="h1 my-4 text-black">Task List</h1>
												<a
														class="btn btn-primary"
														data-bs-toggle="tooltip"
														data-bs-placement="bottom"
														data-bs-title="Add new task"
														href="{{ route('todos.create') }}"
												>
														<i class="fas fa-circle-plus fa-lg me-2"></i>
														Add new task
												</a>
										</div>
										<div class="card">
												<div class="card-body">
														<table
																class="table-hover table-bordered mb-0 table"
																id="tabel"
														>
																<thead class="fw-bold">
																		<tr>
																				<th
																						class="text-center"
																						scope="col"
																				>
																						#
																				</th>
																				<th
																						class="text-center"
																						scope="col"
																				>
																						Task
																				</th>
																				<th
																						class="text-center"
																						scope="col"
																				>
																						Priority
																				</th>
																				<th
																						class="text-center"
																						scope="col"
																				>
																						Deadline
																				</th>
																				<th
																						class="text-center"
																						scope="col"
																				>
																						Status
																				</th>
																				<th
																						class="text-center"
																						scope="col"
																				>
																						Options
																				</th>
																		</tr>
																</thead>
																<tbody class="table-group-divider align-middle">
																		@foreach ($todos as $todo)
																				<tr>
																						<th class="text-center">
																								<div class="form-check">
																										<form
																												action="{{ route('todos.markAsDone', $todo->id) }}"
																												method="POST"
																										>
																												@csrf
																												@method('PATCH')
																												<input
																														class="form-check-input"
																														type="checkbox"
																														{{ $todo->status == 'done' ? ' checked' : '' }}
																														onchange="this.form.submit()"
																												/>
																										</form>
																								</div>
																						</th>
																						<td class="text-break {{ $todo->status == 'done' ? 'text-decoration-line-through' : 'text-decoration-none' }}">
																								<span>{{ $todo->todo }}</span>
																						</td>
																						<td class="text-center">
																								<h5>
																										<span class="badge text-uppercase {{ $todo->priority == 'low' ? 'bg-success' : ($todo->priority == 'medium' ? 'bg-warning' : 'bg-danger') }}">
																												{{ $todo->priority }}
																										</span>
																								</h5>
																						</td>
																						<td class="text-center">
																								@php
																										$deadline = \Carbon\Carbon::parse($todo->deadline_date);
																										$now = \Carbon\Carbon::now();
																										$remaining = $now->diffInDays($deadline, false);
																								@endphp

																								<span>{{ $deadline->translatedFormat('j F Y') }}</span>
																								<br />
																								@if ($remaining < 0)
																										<span class="text-danger fw-bold">Deadline has passed.</span>
																								@else
																										<span class="text-success">{{ round($remaining) }} days remaining.</span>
																								@endif
																						</td>
																						<td class="{{ $todo->status == 'done' ? 'bg-success' : 'bg-warning' }} text-center text-white">
																								<span class="text-uppercase fw-bold">{{ $todo->status }}</span>
																						</td>
																						<td class="text-center">
																								<div class="d-flex justify-content-center align-items-center gap-2">
																										<a
																												class="btn btn-link text-decoration-none p-0"
																												data-bs-toggle="tooltip"
																												data-bs-placement="top"
																												data-bs-title="Edit"
																												href="{{ route('todos.edit', $todo->id) }}"
																										>
																												<i class="fas fa-edit fa-lg text-primary"></i>
																										</a>

																										<form
																												class="m-0 p-0"
																												action="{{ route('todos.destroy', $todo->id) }}"
																												method="POST"
																										>
																												@csrf
																												@method('DELETE')
																												<button
																														class="btn btn-link text-decoration-none p-0"
																														data-bs-toggle="tooltip"
																														data-bs-placement="bottom"
																														data-bs-title="Delete"
																														type="submit"
																												>
																														<i class="fas fa-trash fa-lg text-danger"></i>
																												</button>
																										</form>
																								</div>
																						</td>
																				</tr>
																		@endforeach
																</tbody>
																<tfoot>
																		<tr>
																				<th>#</th>
																				<th>Task</th>
																				<th>Priority</th>
																				<th>Deadline</th>
																				<th>Status</th>
																				<th>Options</th>
																		</tr>
																</tfoot>
														</table>
												</div>
										</div>
								</div>
						</div>
				</div>
		</section>
@endsection

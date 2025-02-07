@extends('layout.auth')
@section('content')
		<section class="vh-100">
				<div class="h-100 container py-5">
						<div class="row d-flex justify-content-center align-items-center h-100">
								<div class="col-lg-4 col-sm-12">
										<div class="pb-3 text-center">
												<h1 class="h1 my-4 text-black">Register</h1>
										</div>
										<form
												action="{{ route('register.submit') }}"
												method="POST"
										>
												@csrf
												<div class="card">
														<div class="card-body">
																<div class="mb-3">
																		<label
																				class="col-form-label"
																				for="name"
																		>
																				Name
																		</label>
																		<input
																				class="form-control"
																				id="name"
																				name="name"
																				type="text"
																				value="{{ old('name') }}"
																				required
																		/>
																		@error('email')
																				<span class="text-danger">{{ $message }}</span>
																		@enderror
																</div>
																<div class="mb-3">
																		<label
																				class="col-form-label"
																				for="email"
																		>
																				Email
																		</label>
																		<input
																				class="form-control"
																				id="email"
																				name="email"
																				type="email"
																				value="{{ old('email') }}"
																				required
																		/>
																		@error('password')
																				<span class="text-danger">{{ $message }}</span>
																		@enderror
																</div>
																<div class="mb-3">
																		<label
																				class="col-form-label"
																				for="password"
																		>
																				Password
																		</label>
																		<input
																				class="form-control"
																				id="password"
																				name="password"
																				type="password"
																				required
																		/>
																		@error('password')
																				<span class="text-danger">{{ $message }}</span>
																		@enderror
																</div>
																<div class="mb-3">
																		<label
																				class="col-form-label"
																				for="password"
																		>
																				Password Confirmation
																		</label>
																		<input
																				class="form-control"
																				id="password_confirmation"
																				name="password_confirmation"
																				type="password"
																				required
																		/>
																</div>
																<div class="d-grid gap-2 pt-3">
																		<button
																				class="btn btn-success"
																				type="submit"
																		>
																				Register
																		</button>
																		<a
																				class="btn btn-primary"
																				href="{{ route('login') }}"
																		>
																				Back to login
																		</a>
																</div>
														</div>
												</div>
										</form>
								</div>
						</div>
				</div>
		</section>
@endsection

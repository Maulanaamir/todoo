<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container-fluid">
				<div class="d-flex flex-column">
						<span class="navbar-brand fw-bold mb-0">{{ Auth::user()->name }}</span>
						<span class="fs-6 text-muted">{{ Auth::user()->email }}</span>
				</div>
				<form
						style="display: inline"
						action="{{ route('logout') }}"
						method="POST"
				>
						@csrf
						@method('POST')
						<button
								class="btn btn-outline-danger"
								type="submit"
						>
								<i class="fas fa-right-from-bracket me-2"></i>
								Logout
						</button>
				</form>
		</div>
</nav>

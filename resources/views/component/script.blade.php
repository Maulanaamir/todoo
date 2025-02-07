<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/js/all.min.js') }}"></script>
<script>
		new DataTable('#tabel', {
				columnDefs: [{
						orderable: false,
						targets: [0, 1, 5]
				}],
				paging: true,
				lengthChange: false,
				searching: true,
				ordering: true,
				info: true,
				autoWidth: false,
				responsive: true,
				pageLength: 10,
				language: {
						url: '{{ asset('assets/js/datatables-id.json') }}',
				},
				initComplete: function() {
						const api = this.api();

						api.columns(2).every(function() {
								const column = this;
								const title = column.footer().textContent;
								const select = $('<select class="form-select"><option value="">' + title + '</option><option value="low">Low</option><option value="medium">Medium</option><option value="high">High</option></select>')
										.appendTo($(column.footer()).empty())
										.on('change', function() {
												const val = $(this).val();
												column.search(val).draw();
										});
						});

						api.columns(3).every(function() {
								const column = this;
								const input = $('<input type="date" class="form-control">')
										.appendTo($(column.footer()).empty())
										.on('change', function() {
												const val = $(this).val();
												const date = new Date(val);
												const options = {
														year: "numeric",
														month: "long",
														day: "numeric",
												};
												column.search(date.toLocaleDateString("id-ID", options)).draw();
										});
						});

						api.columns(4).every(function() {
								const column = this;
								const title = column.footer().textContent;
								const select = $('<select class="form-select"><option value="">' + title + '</option><option value="done">Done</option><option value="waiting">Waiting</option></select>')
										.appendTo($(column.footer()).empty())
										.on('change', function() {
												const val = $(this).val();
												column.search(val).draw();
										});
						});
				},
				fixedHeader: {
						footer: true,
				},
		});
		const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
		const tooltipList = [...tooltipTriggerList].map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl));
</script>
@if (session('success'))
		<script>
				Swal.fire({
						icon: 'success',
						title: 'Success',
						text: '{{ session('success') }}',
						toast: true,
						showConfirmButton: false,
						position: 'top',
						timer: 3000,
				});
		</script>
@endif

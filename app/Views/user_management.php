<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
	<title>User Management</title>
</head>

<body>

	<div class="container mt-5">
		<div class="mb-3">
			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRowModal">Add Row</button>
		</div>

		<h2 class="mb-4">User Management</h2>

		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Action</th> <!-- New column for action buttons -->
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>John Doe</td>
					<td>john@example.com</td>
					<td>(123) 456-7890</td>
					<td>
						<button class="btn btn-warning btn-sm">Edit</button>
						<button class="btn btn-danger btn-sm">Delete</button>
					</td>
				</tr>
				<tr>
					<td>Jane Doe</td>
					<td>jane@example.com</td>
					<td>(987) 654-3210</td>
					<td>
						<button class="btn btn-warning btn-sm">Edit</button>
						<button class="btn btn-danger btn-sm">Delete</button>
					</td>
				</tr>
				<!-- Add more rows as needed -->
			</tbody>
		</table>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="addRowModal" tabindex="-1" aria-labelledby="addRowModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addRowModalLabel">Add Row</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!-- Add your form fields for adding a new row -->
					<form id="addRowForm">
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" required>
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" id="email" name="email" required>
						</div>
						<div class="mb-3">
							<label for="phone" class="form-label">Phone</label>
							<input type="tel" class="form-control" id="phone" name="phone" required>
						</div>
						<button type="button" class="btn btn-primary" id="saveRowBtn">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#example').DataTable();

			// Show modal when Add Row button is clicked
			$('#addRowModal').on('show.bs.modal', function (event) {
				// Clear the form when the modal is shown
				$('#addRowForm')[0].reset();
			});

			// Save Row button click event
			$('#saveRowBtn').click(function () {
				// Add your logic to save the new row to the DataTable
				// For example:
				var newRowData = [
					$('#name').val(),
					$('#email').val(),
					$('#phone').val(),
					'<button class="btn btn-warning btn-sm">Edit</button>' +
					'<button class="btn btn-danger btn-sm">Delete</button>'
				];

				$('#example').DataTable().row.add(newRowData).draw(false);

				// Close the modal
				$('#addRowModal').modal('hide');
			});
		});
	</script>

</body>

</html>
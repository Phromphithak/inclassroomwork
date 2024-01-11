<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mt-4 mb-4">CRUD Application</h2>
    
    <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#addModal">Add Student</button>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableBody"></tbody>
    </table>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <label for="name">StudentID:</label>
                    <input type="text" name="name" id="stdid" class="form-control" required>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="stdname" class="form-control" required>
                    <label for="class">Class:</label>
                    <input type="text" name="class" id="stdclass" class="form-control" required>
                    <label for="class">Subject:</label>
                    <input type="text" name="class" id="stdsubjact" class="form-control" required>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    <label for="telephone">Telephone:</label>
                    <input type="tel" name="telephone" id="telephone" class="form-control" required>
                    <button type="submit" class="btn btn-primary mt-3">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Your existing HTML and Bootstrap modal for adding students -->

<!-- Edit Student Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <label for="stdid">ID</label>
                    <input type="text" name="stdid" id="editStudentId" class="form-control" required>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="editName" class="form-control" required>
                    <label for="class">Class:</label>
                    <input type="text" name="class" id="editClass" class="form-control" required>
                    <label for="class">Subject:</label>
                    <input type="text" name="class" id="editSubjact" class="form-control" required>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="editEmail" class="form-control" required>
                    <label for="telephone">Telephone:</label>
                    <input type="tel" name="telephone" id="editTelephone" class="form-control" required>
                    <input type="hidden" id="editStudentId" name="editStudentId">
                    <br>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).on('click', '.btn-warning', function () {
    var studentId = $(this).data('stdid');
    $.ajax({
        url: 'api.php',
        method: 'GET',
        data: { stdid: studentId },
        success: function (data) {
            $('#editStudentId').val(data.stdid);
            $('#editModal').modal('show');
        },
        error: function () {
            alert('Error fetching student data. Please try again.');
        }
    });
});
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="script.js"></script>
</body>
</html>

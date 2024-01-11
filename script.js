$(document).ready(function () {
    // Load data on page load
    loadData();

    // Add Student
    $(document).on('submit', '#addForm', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'api.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                name: $('#name').val(),
                class: $('#class').val(),
                email: $('#email').val(),
                telephone: $('#telephone').val()
            }),
            success: function () {
                $('#addModal').modal('hide');
                loadData();
            },
            error: function () {
                alert('Error adding student. Please try again.');
            }
        });
    });
    // Edit Student
    $(document).on('submit', '#editForm', function (e) {
        e.preventDefault();

        // Collect the updated data
        var updatedData = {
            stdid: $('#editStudentId').val(),
            stdname: $('#editName').val(),
            stdclass: $('#editClass').val(),
            stdsubject: $('#editSubject').val(),
            email: $('#editEmail').val(),
            telephone: $('#editTelephone').val()
        };

        // Send the updated data using AJAX
        $.ajax({
            url: 'api.php',
            method: 'PUT',
            contentType: 'application/json',
            data: JSON.stringify(updatedData),
            success: function (response) {
                // Check the response from the server
                if (response.status) {
                    // Close the modal
                    $('#editModal').modal('hide');
                    // Reload or update the data in the table
                    loadData();
                } else {
                    alert('Error updating student. Please try again.');
                }
            },
            error: function () {
                alert('Error updating student. Please try again.');
            }
        });
    });



    // Load Data
    function loadData() {
        $.ajax({
            url: 'api.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                displayData(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error fetching data. Please check the console for more details.');
            }
        });
    }

    // Display Data
    function displayData(data) {
        console.log(data); // Log the data to the console for debugging

        $('#tableBody').empty();
        $.each(data, function (index, student) {
            var row = '<tr>';
            row += '<td>' + student.stdid + '</td>';
            row += '<td>' + student.stdname + '</td>';
            row += '<td>' + student.stdclass + '</td>';
            row += '<td>' + student.stdsubjact + '</td>';
            row += '<td>' + student.email + '</td>';
            row += '<td>' + student.telephone + '</td>';
            row += '<td><button class="btn btn-warning btn-sm">Edit</button> <button class="btn btn-danger btn-sm">Delete</button></td >';
            row += '</tr>';

            $('#tableBody').append(row);
        });

    }
    // Function to handle the "Edit" button click and populate the modal
    $(document).on('click', '.btn-warning', function () {
        var studentId = $(this).data('stdid');

        // Fetch student data using AJAX and populate the modal fields
        $.ajax({
            url: 'api.php?stdid=' + studentId,
            method: 'GET',
            success: function (data) {
                console.log('Fetched data for student ID ' + studentId + ':', data);

                // Populate the modal fields with the fetched data
                $('#editStudentId').val(data[0].stdid);
                $('#editName').val(data[0].stdname);
                $('#editClass').val(data[0].stdclass);
                $('#editSubjact').val(data[0].stdsubjact);
                $('#editEmail').val(data[0].email);
                $('#editTelephone').val(data[0].telephone);

                // Show the modal
                $('#editModal').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error fetching student data. Please check the console for more details.');
            }
        });
    });

2

});

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for editing a student -->
                <form id="editForm">
                    <label for="editStudentId">Student ID</label>
                    <input type="text" id="editStudentId" name="editStudentId" readonly>

                    <label for="editName">Name</label>
                    <input type="text" id="editName" name="editName" required>

                    <label for="editClass">Class</label>
                    <input type="text" id="editClass" name="editClass" required>

                    <label for="editEmail">Email</label>
                    <input type="email" id="editEmail" name="editEmail" required>

                    <label for="editTelephone">Telephone</label>
                    <input type="text" id="editTelephone" name="editTelephone" required>

                    <input type="submit" value="Update">
                </form>
            </div>
        </div>
    </div>
</div>
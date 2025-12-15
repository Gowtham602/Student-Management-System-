<!-- Edit Student Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="editStudentForm">
                    @csrf
                    <input type="hidden" id="edit_id" name="id">

                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" id="edit_first_name" name="first_name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" id="edit_last_name" name="last_name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" id="edit_email" name="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" id="edit_phone" name="phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Dath Of Birth </label>
                        <input type="date" id="edit_dob" name="dob" class="form-control">
                    </div>
                     <div class="mb-3">
                        <label>Address </label>
                        <input type="text" id="edit_address" name="address" class="form-control">
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-warning" id="updateStudentBtn">Update Student</button>
            </div>

        </div>
    </div>
</div>

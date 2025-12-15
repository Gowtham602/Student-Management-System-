<div class="modal fade" id="createStudentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Create New Student</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="createStudentForm">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">DOB</label>
                        <input type="date" name="dob" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Class</label>
                        <input type="text" name="class" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Section</label>
                        <input type="text" name="section" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control"></textarea>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="saveStudentBtn" class="btn btn-success" form="createStudentForm">Save Student</button>
            </div>

        </div>
    </div>
</div>

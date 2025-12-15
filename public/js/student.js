// $(document).ready(function () {
//     $("#createStudentForm").submit(function (e) {
//         e.preventDefault();

//         let formData = $(this).serialize();

//         $.ajax({
//             url: createStudentUrl, 
//             type: "POST",
//             data: formData,
//             success: function (response) {
//                 alert("Student created successfully!");
//                 $("#createStudentModal").modal('hide');
//                 $("#createStudentForm")[0].reset();
//                 location.reload();
//             },
//             error: function (xhr) {
//                 alert("Error: " + xhr.responseText);
//             }
//         });
//     });
// });

// document.getElementById("themedark").addEventListener("click",function(){
//     document.body.classList.toggle("dark-theme");
// });


console.log("js is runing");
$(function () {

    $("#createStudentForm").submit(function (e) {
        e.preventDefault();

        let formData = $(this).serialize();

        $.ajax({
            url: createStudentUrl,
            type: "POST",
            data: formData,
            success: function (response) {

                toastr.success("Student created successfully!");

                $("#createStudentModal").modal('hide');
                $("#createStudentForm")[0].reset();
                $('#studentsTable').DataTable().ajax.reload(null, false);
            },
            error: function (xhr) {

                if (xhr.status === 422) {
                    // Validation error
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        toastr.error(value);
                    });
                } else {
                    toastr.error("Something went wrong!");
                }
            },
            complete: function(){
                $("#saveStudentBtn").prop("disabled", false).text("Save Student");
            }
        });
    });

});


//table to show 
$('#studentsTable').DataTable({
    ajax: studentsDataUrl,
    columns: [
        {
            data: null,
            render: function (data, type, row, meta) {
                return meta.row + 1; 
            }
        },
          
        { data: 'first_name' },
        { data: 'last_name' },
        { data: 'email' },
        {
            data: null,
            render: function (data, type, row) {
                return `
                    <button class="btn btn-sm btn-primary edit-btn" data-id="${row.id}">Edit</button>
                    <button class="delete-btn btn btn-sm btn-danger" data-id="${row.id}">Delete</button>
                `;
            }
        }
    ]
});
//edit 
$(document).on("click", ".edit-btn", function () {
    let id = $(this).data("id");

    $.ajax({
        url: "/student/edit/" + id,
        type: "GET",
        success: function (res) {
            // console.log(res,"____")
            $("#edit_id").val(res.id);
            $("#edit_first_name").val(res.first_name);
            $("#edit_last_name").val(res.last_name);
            $("#edit_email").val(res.email);
            $("#edit_phone").val(res.phone);
            $("#edit_dob").val(res.dob);
            $("#edit_address").val(res.address);

            $("#editStudentModal").modal("show");
        },
        error: function () {
            toastr.error("Failed to fetch student details!");
        }
    });
});
//updated the students 

$("#updateStudentBtn").click(function () {

    let id = $("#edit_id").val();
    let formData = $("#editStudentForm").serialize();

    $.ajax({
        url: "/student/update/" + id,
        type: "PUT",
        data: formData,
        success: function (response) {

            toastr.success("Student updated successfully!");
            $("#editStudentModal").modal('hide');

            $('#studentsTable').DataTable().ajax.reload(null, false);
        },
        error: function (xhr) {
            toastr.error("Failed to update student!");
        }
    });

});




//deleted 
$(document).on('click', '.delete-btn', function () {
    let id = $(this).data('id');

    if (!confirm("Are you sure you want to delete this student?")) {
        return;
    }

    $.ajax({
        url: "/student/delete/" + id,
        type: "DELETE",
       headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function (response) {
            $('#studentsTable').DataTable().ajax.reload(null, false);

            toastr.success("Student deleted successfully!");
        },
        error: function () {
            toastr.error("Failed to delete the student!");
        }
    });
});

  







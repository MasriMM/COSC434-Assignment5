$(document).ready(function() {
    $('#search, #minAge, #maxAge').on('keyup change', function() {
        let query = $('#search').val().trim(); // Search query
        let minAge = $('#minAge').val(); // Minimum age filter
        let maxAge = $('#maxAge').val(); // Maximum age filter
        
        $.ajax({
            url: '/students',
            method: 'GET',
            data: { 
                search: query, 
                minAge: minAge, 
                maxAge: maxAge 
            },
            dataType: 'json', // Expect JSON response
            success: function(response) {
                console.log("Students Data:", response); // Debugging Log
                let studentList = '';
                if (response.length > 0) {
                    response.forEach(function(student) {
                        studentList += 
                            `<tr>
                                <td>${student.id}</td>
                                <td>${student.name}</td>
                                <td>${student.age}</td>
                                <td>
                                    <a href="/students/${student.id}" class="btn btn-success btn-sm">Show</a>
                                    <a href="/students/${student.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm delete-btn" data-id="${student.id}">Delete</button>
                                </td>
                            </tr>`;
                    });
                } else {
                    studentList = `<tr><td colspan="3">No Student Found.</td></tr>`;
                }
                $('#student-table').html(studentList);
            },
            error: function(xhr, status, error) {
                console.log("Error fetching students:", xhr.responseText); // Debugging Log
            }
        });
    });

    $(document).on('click', '.delete-btn', function() {
        let studentId = $(this).data('id');
            $.ajax({
                url: `/students/${studentId}`,
                method: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    location.reload(); 
                },
                error: function(xhr, status, error) {
                    console.log("Error deleting student:", xhr.responseText);
                }
            });
        
    });
});
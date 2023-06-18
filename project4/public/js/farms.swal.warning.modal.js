document.getElementById('show-modal-logout').addEventListener('click', function() {       
    Swal.fire({
        title: 'Are you sure?',
        icon: 'info',
        html:
        'Do you want to <b>Log Out</b>?',
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText: 'Yes',
        confirmButtonColor: '#3085d6',
        confirmButtonAriaLabel: '...',
        cancelButtonColor: '#d33',
        cancelButtonAriaLabel: '...'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.replace("logout");
    }})
});  


function globalWarning(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");

    Swal.fire({
        title: "Are you sure?",
        icon: "info",
        html: "Do you want to <b>delete</b> this?",
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText: "Yes",
        confirmButtonColor: "#3085d6",
        confirmButtonAriaLabel: "...",
        cancelButtonColor: "#d33",
        cancelButtonAriaLabel: "...",
        //allowOutsideClick: false, // Prevent closing by clicking outside the modal
        //allowEscapeKey: false, // Prevent closing by pressing the Escape key
        willClose: (dismiss) => {
            if (dismiss === "close" || dismiss === "esc") {
                // Handle close button or X button click
                // Perform any desired action or simply return
                return false; // Prevent form submission
            }
        },
    }).then((willDelete) => {
        if (willDelete.isConfirmed) {
            form.submit();
        }
    });
}

const deleteButtons = document.querySelectorAll('.delete-button');
deleteButtons.forEach((button) => {
button.addEventListener('click', globalWarning);
});




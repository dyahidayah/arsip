var base = $('#base_url').data('id')
$(document).ready(function () {
    /* alert */
    var kode = $('#flash-kode').val()
    var msg = $('#flash-text').val()

    if (kode != "") {
        if (kode == 'error' || kode == 'warning') {
            Swal.fire(
                kode,
                msg,
                kode
            )

        } else {
            Swal.fire({
                position: 'center',
                icon: kode,
                title: msg,
                showConfirmButton: false,
                timer: 1000
            })
        }
    }
});

$(document).ready(function () {
    //login
    $('#logout').click(function (e) {
       logout()
    });

    //logout
    function logout() {
        Swal.fire({
            title: 'Logout?',
            text: "Anda yakin akan keluar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tetap keluar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: base + 'leader/logout',
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        })
    }
    

    $('body').find('#table_target').DataTable({
        "pageLength": 10
    })
});





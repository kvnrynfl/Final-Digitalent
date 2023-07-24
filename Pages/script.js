$(document).ready(function () {
    var BookTable = new DataTable('#BookTable', {
        ajax: {
            url: 'Api',
            type: 'GET',
            dataSrc: 'data',
        },
        columns: [
            {
                data: null,
                render: (data, type, row, meta) => meta.row
            },
            {
                data: 'id',
                visible: false,
                searchable: false,
                className: 'dt-center'
            },
            {
                data: 'judul'
            },
            {
                data: 'pengarang'
            },
            {
                data: 'tahun_terbit',
                className: 'dt-center'
            },
            {
                data: 'isbn',
                className: 'dt-center'
            },
            {
                data: null,
                orderable: false,
                className: 'dt-center',
                render: function (data, type, row) {
                    return '<div class="btn-group" role="group">' +
                        '<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="refreshUpdateModal(' + data.id + ')">Update</button>' +
                        '<button type="button" class="btn btn-danger btn-sm" onclick="deleteBook(' + data.id + ')">Delete</button>' +
                        '</div>';
                }
            }
        ],
        order: [ [ 0, 'desc' ] ],
        searching: true,
        paging: true,
        ordering: true,
        info: true,
        lengthChange: true,
        pageLength: 10,
        language: {
            search: "Search:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        },
    });

    setInterval(function () {
        BookTable.ajax.reload(null, false);
    }, 30000);
});

function refreshCreateModal() {
    document.getElementById("create-judul").value = '';
    document.getElementById("create-pengarang").value = '';
    document.getElementById("create-tahun-terbit").value = '';
    document.getElementById("create-isbn").value = '';
}

function refreshUpdateModal(dataId) {
    jQuery.ajax({
        url: `Api?id=${dataId}`,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.meta.status == 'success') {
                var data = response.data[ 0 ];
                document.getElementById("update-id").value = data.id;
                document.getElementById("update-judul").value = data.judul;
                document.getElementById("update-pengarang").value = data.pengarang;
                document.getElementById("update-tahun-terbit").value = data.tahun_terbit;
                document.getElementById("update-isbn").value = data.isbn;
            } else {
                showNotificationModal('Error', 'Failed to retrieve data from the server. Please refresh the page and try again', 'alert - danger');
            }

        }
    });
}

function createBook() {
    var createJudul = document.getElementById("create-judul").value;
    var createPengarang = document.getElementById("create-pengarang").value;
    var createTahunTerbit = document.getElementById("create-tahun-terbit").value;
    var createIsbn = document.getElementById("create-isbn").value;

    if (createJudul == null || createJudul == '') {
        alertFormCreate('Please enter the book title.');
    } else if (createPengarang == null || createPengarang == '') {
        alertFormCreate('Please enter the author name.');
    } else if (createTahunTerbit == null || createTahunTerbit == '') {
        alertFormCreate('Please enter the publication year.');
    } else if (createIsbn == null || createIsbn == '') {
        alertFormCreate('Please enter the ISBN number.');
    } else {
        jQuery.ajax({
            url: `Api?judul=${createJudul}&pengarang=${createPengarang}&tahun_terbit=${createTahunTerbit}&isbn=${createIsbn}`,
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if (response.meta.status === 'success') {
                    $('#createModal').modal('hide')
                    showNotificationModal('Success', response.meta.message, 'alert-success');
                    reloadDataTable();
                } else {
                    showNotificationModal('Error', response.meta.message, 'alert-danger');
                }
            },
            error: function (xhr, status, error) {
                showNotificationModal('Error', 'AJAX Request Error', 'alert-danger');
            }
        });
    }
}

function updateBook() {
    var updateId = document.getElementById("update-id").value;
    var updateJudul = document.getElementById("update-judul").value;
    var updatePengarang = document.getElementById("update-pengarang").value;
    var updateTahunTerbit = document.getElementById("update-tahun-terbit").value;
    var updateIsbn = document.getElementById("update-isbn").value;

    if (updateId == null || updateId == '') {
        alertFormUpdate('Failed to get id. Please refresh the page and try again');
    } else if (updateJudul == null || updateJudul == '') {
        alertFormUpdate('Please enter the book title.');
    } else if (updatePengarang == null || updatePengarang == '') {
        alertFormUpdate('Please enter the author name.');
    } else if (updateTahunTerbit == null || updateTahunTerbit == '') {
        alertFormUpdate('Please enter the publication year.');
    } else if (updateIsbn == null || updateIsbn == '') {
        alertFormUpdate('Please enter the ISBN number.');
    } else {
        jQuery.ajax({
            url: `Api?id=${updateId}&judul=${updateJudul}&pengarang=${updatePengarang}&tahun_terbit=${updateTahunTerbit}&isbn=${updateIsbn}`,
            type: 'PUT',
            dataType: 'json',
            success: function (response) {
                if (response.meta.status === 'success') {
                    $('#updateModal').modal('hide')
                    showNotificationModal('Success', response.meta.message, 'alert-success');
                    reloadDataTable();
                } else {
                    showNotificationModal('Error', response.meta.message, 'alert-danger');
                }
            },
            error: function (xhr, status, error) {
                showNotificationModal('Error', 'AJAX Request Error', 'alert-danger');
            }
        });
    }
}

function deleteBook(dataId) {
    jQuery.ajax({
        url: `Api?id=${dataId}`,
        type: 'DELETE',
        dataType: 'json',
        success: function (response) {
            if (response.meta.status === 'success') {
                showNotificationModal('Success', response.meta.message, 'alert-success');
                reloadDataTable();
            } else {
                showNotificationModal('Error', response.meta.message, 'alert-danger');
                reloadDataTable();
            }
        },
        error: function (xhr, status, error) {
            showNotificationModal('Error', 'AJAX Request Error', 'alert-danger');
        }
    });
}

function showNotificationModal(title, message, alertClass) {
    var modal = $('#notificationModal');
    var modalTitle = modal.find('.modal-title');
    var modalBody = modal.find('.modal-body');

    modalTitle.text(title);
    modalBody.html('<div class="alert ' + alertClass + '" role="alert">' + message + '</div>');

    modal.modal('show');
}

function reloadDataTable() {
    $('#BookTable').DataTable().ajax.reload();
}

function alertFormCreate(message) {
    var alert = document.getElementById("alert-form-create");

    alert.style.display = "block";
    alert.innerHTML = message;

    setTimeout(function () {
        alert.style.display = "none";
    }, 3000);
}

function alertFormUpdate(message) {
    var alert = document.getElementById("alert-form-update");

    alert.style.display = "block";
    alert.innerHTML = message;

    setTimeout(function () {
        alert.style.display = "none";
    }, 3000);
}
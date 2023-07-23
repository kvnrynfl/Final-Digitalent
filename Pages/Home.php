<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Final Digitalent</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <!-- Custom CSS File -->
    <link rel="stylesheet" href="Pages/style.css">
</head>

<body>
    <div class="container" id="test">
        <!-- Button Create -->
        <div class="mt-2 mb-2">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Create New Data</button>
        </div>
        <!-- Tabel Buku -->
        <table id="BookTable" class="table table-striped table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pengarang</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">ISBN</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <!-- Modal Notification -->
        <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="notificationModalLabel">Notification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="notificationBody">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Form Create New Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="create-judul" class="col-sm-4 col-form-label">Judul</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="create-judul" id="create-judul" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="create-pengarang" class="col-sm-4 col-form-label">Pengarang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="create-pengarang" id="create-pengarang" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="create-tahun-terbit" class="col-sm-4 col-form-label">Tahun Terbit</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control text-center" name="create-tahun-terbit" id="create-tahun-terbit" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="create-isbn" class="col-sm-4 col-form-label">ISBN</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control text-center" name="create-isbn" id="create-isbn" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="createData()">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Update -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Form Update Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- style="display: none;" -->
                        <div class="row mb-3">
                            <label for="update-id" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control text-center" name="update-id" id="update-id" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="update-judul" class="col-sm-4 col-form-label">Judul</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="update-judul" id="update-judul" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="update-pengarang" class="col-sm-4 col-form-label">Pengarang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="update-pengarang" id="update-pengarang" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="update-tahun-terbit" class="col-sm-4 col-form-label">Tahun Terbit</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control text-center" name="update-tahun-terbit" id="update-tahun-terbit" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="update-isbn" class="col-sm-4 col-form-label">ISBN</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control text-center" name="update-isbn" id="update-isbn" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateBook()">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, DataTables, PopperJS, BootstrapJS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Optional JavaScript -->
    <script src="Pages/script.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


</head>
<body>
    @include('header')
    <h2 class="text-center mt-3">Users List </h2>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <a href="/add" class="btn btn-primary " style="float:right; margin-right:160px">Add User </a>
                <button id="exportButton" class="btn btn-dark" style="float:right; margin-right:20px">Export <i class="fa-solid fa-file-export"></i></button>
                <!-- <a href="/add" class="btn btn-primary"style="float:right; margin-right:10px" >Add User</a><br> -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="text-center">
                    @if(Session::has('message'))
                    <div style="text-align: center;">
                        <div style="width: 500px; margin: 0 auto;" class="alert alert-success">
                            {{ Session::get('message') }}</div>
                    </div>
                    @endif
                </div>
                <table id="datatable" class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-info text-center">Id</th>
                            <th scope="col" class="bg-info text-center">Name</th>
                            <th scope="col" class="bg-info text-center">Email</th>
                            <th scope="col" class="bg-info text-center">Password</th>
                             <th scope="col" class="bg-info text-center">Role</th>
                            <th scope="col" class="bg-info text-center">Action</th>
                        </tr>
                    </thead>


                    <tbody class='text-center'>

                        <script>
                            $(document).ready(function() {
                                var table = $('#datatable').DataTable({
                                    processing: true
                                    , serverSide: true
                                    , ajax: "{{ route('display') }}"
                                    , columns: [{
                                            data: 'id'
                                            , name: 'id'
                                        , }
                                        , {
                                            data: 'name'
                                            , name: 'name'
                                        , }
                                        , {
                                            data: 'email'
                                            , name: 'email'
                                        , }
                                        , {
                                            data: 'password'
                                            , name: 'password'
                                        , }
                                        , {
                                            data: 'role_id'
                                            , name: 'role_id'
                                        , }
                                        
                                        , {
                                            data: 'action'
                                            , name: 'action'
                                            , orderable: false
                                            , searchable: false
                                        , }
                                    , ],
                                    // Add a row number (serial number) column
                                    rowCallback: function(row, data, index) {
                                        var api = this.api();
                                        var startIndex = api.page() * api.page.len();

                                        // Add 1 to index to start the numbering from 1
                                        var rowNum = startIndex + index + 1;

                                        // Add the row number to the first column (hidden)
                                        $(row).find('td:eq(0)').html(rowNum);
                                    }
                                });

                                // Delete click event code
                                $(document).on('click', '.delete-users', function(e) {
                                    e.preventDefault();
                                    var delete_id = $(this).data("delete_id");
                                    deleteRecord(delete_id);
                                });
                            });

                        </script>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!----delete and refresh ---->
    <script>
        function deleteRecord(delete_id) {
            $.ajax({
                url: '/delete/' + delete_id
                , type: "GET"
                , datatype: 'json'
                , data: {
                    delete_id: delete_id
                , }
                , success: function(data) {
                    refreshTable(); 
                }
                , error: function(data) {
                    console.log('Error:', data);
                }
            });
        }

        function refreshTable() {
            var table = $('#datatable').DataTable(); 
            table.ajax.reload(null, false);
        }

    </script>

    <!-- -------edit------- -->
    <script>
        $(document).ready(function() {

            $('#dataTable').on('click', '.editBtn', function() {

                var data = dataTable.row($(this).closest('tr')).data();
                $data = $('#username').val(data.name);
                $('#email').val(data.email);
                $('#password').val(data.password);
                $('#editid').val(data.id);


            });

            //  -------update------
        });
        $(document).ready(function() {
            $("div.alert-success").fadeOut(2000);
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#exportButton').click(function() {
                fetch('/export', {
                        method: 'GET'
                        , headers: {
                            'Content-Type': 'application/json'
                        , }
                    , })
                    .then((response) => response.blob())
                    .then((blob) => {
                        const url = window.URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.href = url;
                        a.download = 'exported_file.xlsx';
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                    })
                    .catch((error) => {
                        console.error('Export failed:', error);
                        alert('Export failed.');
                    });

            });
        });

    </script>


</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />


</head>

<body>


    <nav class="navbar bg-dark ">
        <div class="container">
            <a class="navbar-brand text-white text-start my-5" href="#">
                <h3> User Management system</h3>

                <div class="menu-item px-5">
                    <a href="{{ route('logout') }}" class="logout-form btn btn-danger" onclick="event.preventDefault();

                     document.getElementById('logout-form').submit();">Log Out</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </a>
        </div>

    </nav>
    <h2 class="text-center mt-3">Users List </h2>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <a href="/add" class="btn btn-dark "style="float:right; margin-right:160px">Add User</a>
                <a href="/export" class="btn btn-primary "style="float:right; margin-right:20px"><i class="fa-solid fa-file-export"></i></a>
                <!-- <a href="/add" class="btn btn-primary"style="float:right; margin-right:10px" >Add User</a><br> -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="text-center">
                    @if(session()->has('message'))
                    <div class="alert alert-success">

                        {{session()->get('message')}}
                        <button type="button" class="close" data-dismiss="alert">☓</button>
                    </div>
                    @endif
                </div>
                <table id="datatable" class="table table-striped data-table">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-info">Id</th>
                            <th scope="col" class="bg-info">Name</th>
                            <th scope="col" class="bg-info">Email</th>
                            <th scope="col" class="bg-info">Password</th>
                            <th scope="col" class="bg-info">Action</th>
                        </tr>
                    </thead>


                    <tbody>

                        <script>
                        $(document).ready(function() {
                            // Function to initialize the DataTable
                            var table = $('#datatable').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: "{{ route('display') }}",
                                columns: [{
                                        data: 'id',
                                        name: 'id',
                                    },
                                    {
                                        data: 'name',
                                        name: 'name',
                                    },
                                    {
                                        data: 'email',
                                        name: 'email',
                                    },
                                    {
                                        data: 'password',
                                        name: 'password',
                                    },
                                    {
                                        data: 'action',
                                        name: 'action',
                                        orderable: false,
                                        searchable: false,
                                    },
                                ],
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
    // Function to delete a record
    function deleteRecord(delete_id) {
        $.ajax({
            url: '/delete/' + delete_id,
            type: "GET",
            datatype: 'json',
            data: {
                delete_id: delete_id,
            },
            success: function(data) {
                refreshTable(); // Refresh DataTable without resetting page
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    }

    // Function to refresh the DataTable
    function refreshTable() {
        var table = $('#datatable').DataTable(); // Reinitialize DataTable
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

        //  -------update-------




    });
    </script>

</body>

</html>
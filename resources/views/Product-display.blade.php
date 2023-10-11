<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

</head>


<body>

    @include('header')

    <h2 class="text-center mt-3">Product List</h2>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <a href="/add-product" class="btn btn-primary " style="float:right; margin-right:160px">Add Product </a>
                {{-- <button id="exportButton" class="btn btn-dark" style="float:right; margin-right:20px">Export <i
                        class="fa-solid fa-file-export"></i></button> --}}
                <!-- <a href="/add" class="btn btn-primary"style="float:right; margin-right:10px" >Add User</a><br> -->
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="text-center">
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif

                </div>
                <table id="productTable" class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-info text-center">Id</th>
                            <th scope="col" class="bg-info text-center">Name</th>
                            <th scope="col" class="bg-info text-center">detail</th>
                            <th scope="col" class="bg-info text-center">Action</th>
                        </tr>
                    </thead>


                    <tbody class="text-center">

                        <script>
                            $(document).ready(function() {
                                // Function to initialize the DataTable
                                var table = $('#productTable').DataTable({
                                    processing: true
                                    , serverSide: true
                                    , ajax: "{{ route('product-display') }}"
                                    , columns: [{
                                            data: 'id'
                                            , name: 'id'
                                        , }
                                        , {
                                            data: 'name'
                                            , name: 'name'
                                        , }
                                        , {
                                            data: 'detail'
                                            , name: 'detail'
                                        , },

                                        {
                                            data: 'action'
                                            , name: 'action'
                                            , orderable: false
                                            , searchable: false
                                        , }
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
                                /*$(document).on('click', '.delete-users', function(e) {
                                    e.preventDefault();
                                    var delete_id = $(this).data("delete_id");
                                    deleteRecord(delete_id);
                                });*/
                            });

                        </script>


                    </tbody>
                </table>

            </div>
        </div>
    </div>



    <!-- -------edit------- -->
    <script>
        $(document).ready(function() {
            $("div.alert-success").fadeOut(3000);
        });

    </script>



</body>

</html>

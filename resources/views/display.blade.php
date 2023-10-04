<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

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



    <a href="/add" class="btn btn-dark " style="float:right; margin-right:250px">Add User</a><br>

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
                <table id="data" class="table table-striped data-table">
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
                        $(function() {

                            var table = $('#data').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: "{{ route('display') }}",
                                columns: [{
                                        data: 'id',
                                        name: 'id'
                                    },
                                    {
                                        data: 'name',
                                        name: 'name'
                                    },
                                    {
                                        data: 'email',
                                        name: 'email'
                                    },
                                    {
                                        data: 'password',
                                        name: 'password'
                                    },
                                    {
                                        data: 'action',
                                        name: 'action',
                                        orderable: false,
                                        searchable: false
                                    },
                                ]
                            });

                        });
                        </script>

                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <script>
    
    </script>


</body>


</html>
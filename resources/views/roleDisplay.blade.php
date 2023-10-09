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
                <table id="productT
                able" class="table table-striped data-table">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-info">Sr no </th>
                            <th scope="col" class="bg-info">Name</th>
                            <th scope="col" class="bg-info">Action</th>
                        </tr>
                    </thead>
                    <tbody>


                  @foreach($show as $key => $value)
                    
                 
                     <tr>
                            <td >{{$key+1}}</td>
                            <td ><span class="badge badge-pill badge-info">{{$value->name}}</span></td>
                            <td><a href="" class="btn btn-primary">edit</a>
                             <a href="" class="btn btn-danger">delete</a></td>

                         
                           {{-- <td>

                            @if ($print->name !== 'super-admin')
                                    <span class="my-1 pl-2 pr-3">
                                       
                                        <a href="/edit-role/{{ encrypt($print->id) }}">
                                            <i class="fas fa-edit" style="color:rgb(0, 255, 179)"></i>
                                        </a>
                                       
                                    </span>

                                <span class="my-1 pl-2 pr-3">
                                    <a href="/delete-role/{{ $print->id }}" class="delete-role"
                                        onclick="return confirm('Are you sure you want to delete this role?')">
                                        <i class="fas fa-trash" style="color:red"></i>
                                    </a>
                                </span>
                            @else
                                <span class="text ml-5"> - </span>
                            @endif
                        </td> --}}
                        </tr>
                    
                     @endforeach
                    </tbody>




                  
                </table>

            </div>
        </div>
    </div>





</body>

</html>

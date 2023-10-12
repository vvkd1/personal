  @include('header');
<div class="content-wrapper">

    <header class="text-center">
        <div class="rounded-rectangle border my-3 pl-2 pr-2 pt-2 pb-2 d-inline-block bg-white">
            <h1 class="">ALL ROLES</h1>
        </div>
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    </header>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <span><button class="btn btn-primary ml-5 " style="float: right"><a class="text-light" href="/addRoles">Add Role</a></button></span>

                <br>
                <br>
                <table class="table table-bordered ml-5 mr-5 pd-5">
                    @php
                    $counter = 1;
                    @endphp
                    <thead>
                        <tr class= 'text-center bg-info '>
                            <th scope="col" >SR NO</th>
                            <th scope="col">ROLE NAME</th>
                            <th scope="col">GUARD NAME</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Ad as $print)
                        <tr>
                            <td class=text-center>{{ $counter }}</td>
                            <td class=text-center>{{ $print->name }}</td>

                            <td class=text-center><span class="badge badge-warning">{{ $print->guard_name }}</span></td>

                            <td class=text-center>


                                <span class="my-1 pl-2 pr-3">

                                    <a href="/edit-role/{{ encrypt($print->id) }}">
                                        <i class="fa-solid fa-pen-to-square" style="color: #2365d7;"></i>
                                    </a>
                                </span>

                                <span class="my-1 pl-2 pr-3">
                                    <a href="/delete-role/{{ $print->id }}" class="delete-role" onclick="return confirm('Are you sure you want to delete this role?')">
                                        <i class="fa-solid fa-trash" style="color: #da1b24;"></i>
                                    </a>
                                </span>

                                {{-- <span class="text ml-5"> - </span> --}}

                            </td>
                        </tr>
                        @php
                        $counter++;
                        @endphp
                        @endforeach


                </table>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("div.alert-success").fadeOut(2000);
            });

        </script>
    </div>
</div>

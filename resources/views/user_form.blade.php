<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>users registration</title>

</head>

<body>
  @include('header');
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4">
                <h2> user registration form</h2>
                <form action="{{route('store-user')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">user name</label>
                        <input type="text" class="form-control" id="username" name="name" value="{{old('name')}}">
                        <small class="text-danger">
                            @if ($errors->has('name'))
                            <strong>The name is required.</strong>
                            @endif
                        </small>

                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                        <small class="text-danger">
                            @if ($errors->has('email'))
                            <strong>The email is required.</strong>
                            @endif
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small class="text-danger">
                            @if ($errors->has('password'))
                            <strong>The password is required.</strong>
                            @endif
                        </small>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="role_id" aria-label="Default select example">

                        <option>Select</option>
                        @foreach($show as $print)
                            
                            <option value="{{$print->id}}">{{$print->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>

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
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4">
                <h2>  Update details</h2>
                <form action="{{ route('update-user',$data->id) }}" method="post">
                @csrf
              
                <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}">
                
                                  

                    <div class="mb-3">
                        <label for="username" class="form-label">user name</label>
                        <input type="text" class="form-control" id="username" name="name" value="{{$data->name}}" required/>
                        <small class="text-danger">
                                    @if ($errors->has('name'))
                                        <strong>The name is required.</strong>
                                    @endif
                                </small>

                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}" required>
                        <small class="text-danger">
                                    @if ($errors->has('email'))
                                        <strong>The Email is required.</strong>
                                    @endif
                                </small>

                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{$data->password}}"required>
                        <small class="text-danger">
                                    @if ($errors->has('password'))
                                        <strong>The password is required.</strong>
                                    @endif
                                </small>
                    </div>
                     <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>
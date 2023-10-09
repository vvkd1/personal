<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
    <title>ADD ROLE</title>

</head>

<body>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4">
                @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                <h2> Add Product</h2>
                <form action="/role-add" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label"> role name</label>
                        <input type="text" class="form-control" placeholder="product name" id="name" name="name" value="{{old('name')}}">
                        <small class="text-danger">
                            @if ($errors->has('name'))
                            <strong>The name is required.</strong>
                            @endif
                        </small>

                    </div>
                    

                    <button type="submit" class="btn btn-primary">Add role</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("div.alert-success").fadeOut(2000);
        });

    </script>

</body>

</html>

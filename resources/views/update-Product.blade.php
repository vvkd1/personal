<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Product Update</title>
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <h2>Update Product</h2>
                <form action="/update-product/{{$data->id}}"  method="post" >
                    @csrf
                  
                    <input type="hidden" class="form-control" id="editRecordId" name="id" value="{{$data->id}}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product name</label>
                        <input type="text" class="form-control" placeholder="product name" id="name" name="name"
                            value="{{$data->name}}">
                        <small class="text-danger">
                            @if ($errors->has('name'))
                            <strong>The name is required.</strong>
                            @endif
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">Product detail</label>
                        <textarea class="form-control" placeholder="product detail" id="detail" name="detail">{{$data->detail}}</textarea>
                        <small class="text-danger">
                            @if ($errors->has('detail'))
                            <strong>The detail is required.</strong>
                            @endif
                        </small>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
   
</body>
</html>

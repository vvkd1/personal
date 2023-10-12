   @include('header');
   <div class="content-wrapper pl-5 pt-1 pb-1" style="min-height: 880;">

       <header class="text-center">
           <div class="rounded-rectangle border p-3 my-4 pl-5 pr-5 d-inline-block bg-white">
               <h1 class=""> EDIT PERMISSION</h1>
           </div>
       </header>

       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
       <div class="container">
           <div class="row">
               <div class="col-md-6">
                   @if (session('success'))
                   <div class="alert alert-success">
                       {{ session('success') }}
                   </div>
                   @endif

                   <form method="POST" action="/update-permission/{{ encrypt($edit->id) }}">
                       @csrf

                       <br>

                       <br>

                       <div class="form-group">
                           <label for="name">PERMISSION NAME</label>
                           <input type="text" class="form-control" id="name" value={{ $edit->name }} name="name">
                       </div>

                       <div class="form-group">
                           <label for="guard_name">GUARD NAME</label>
                           <input type="text" class="form-control" id="guard_name" name="guard_name" value="web" readonly>
                       </div>

                       <button type="submit" class="btn btn-primary">Submit</button>
                       <button class="btn btn-danger"><a class="text-light" href="/showRoles">CANCEL</a></button>

                   </form>


               </div>
           </div>
       </div>
       <script>
           $(document).ready(function() {
               $("div.alert-success").fadeOut(2000);
           });

       </script>
   </div>

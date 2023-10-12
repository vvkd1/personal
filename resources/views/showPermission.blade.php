  @include('header');

  <div class="content-wrapper pl-5 pt-1 pb-1" style="min-height: 880;">

      <header class="text-center">
          <div class="rounded-rectangle border p-3 my-4 pl-5 pr-5 d-inline-block bg-white">
              <h1 class="">PERMISSIONS</h1>
          </div>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      </header>

      <span><button class="btn btn-primary ml-5 " style="float: right; margin-right: 330px;"><a class="text-light" href="/addPermission">Add Permission</a></button></span>

      <br>
      <br>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  @if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
                  @endif
                  <table class="table table-bordered ml-5 mr-5 pd-5">
                      <thead>
                          <tr class= 'text-center bg-info '>
                              <th scope="col">PERMISSION NAME</th>
                              <th scope="col">GUARD NAME</th>
                              <th scope="col">ACTION</th>

                          </tr>
                      </thead>
                      <tbody>
                          @foreach($sp as $print)
                          <tr>

                              <td class=text-center>{{$print->name }}</td>
                              <td class=text-center><span class="badge badge-warning">{{$print->guard_name }}</span></td>
                              <td class=text-center>
                                  <span class="my-1 pl-2 pr-3">
                                      <a href="/edit-permission/{{ encrypt($print->id) }}">
                                          <i class="fa-solid fa-pen-to-square" style="color: #1d62d7;"></i>
                                      </a>
                                  </span>

                                  <span class="my-1 pl-2 pr-5">
                                      <a href="/delete-permission/{{ encrypt($print->id) }}" onclick="return confirm('Are you sure you want to delete this Permission?')">
                                          <i class="fas fa-trash" style="color:rgb(228, 49, 4)"></i>
                                      </a>
                                  </span>

                              </td>
                          </tr>
                          @endforeach


                  </table>
                  <script>
                      $(document).ready(function() {
                          $("div.alert-success").fadeOut(2000);
                      });

                  </script>
              </div>

              <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" @if (session('success')) <div class="alert alert-success">
              {{ session('success') }}
          </div>
          @endif

  
   @include('header');
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <div class="content-wrapper pl-5 pt-1 pb-1" style="min-height: 880;">

                  <header class="text-center">
                      <div class="rounded-rectangle border mt-5 mb-1 pl-2 pr-2 pt-2 pb-2 d-inline-block bg-white">
                          <h1 class="">ADD ROLES</h1>
                      </div>
                  </header>
                  <br>

                  <br>
                  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">




                  <div id="addRoleForm">
                      <form method="POST" action="/storeRole">
                          @csrf
                          <br>

                          <br>

                          <div class="form-group">
                              <label for="name">ROLE NAME<span>*</span></label>
                              <input type="text" class="form-control" id="name" name="name" autocomplete="off" required>
                          </div>

                          <div class="form-group">
                              <label for="guard_name">GUARD NAME</label>
                              <input type="text" class="form-control" id="guard_name" name="guard_name" value="web" readonly>
                          </div>

                          <button type="submit" class="btn btn-primary">SUBMIT</button>
                          <button class="btn btn-danger"><a class="text-light" href="/showRoles">CANCEL</a></button>

                      </form>
                  </div>

                  {{-- <script src="{{ asset('/home/neosoft/Demo/public/js/admin_js/addRole.js') }}"></script> --}}

                  <style>
                      label span {
                          color: red;
                      }

                  </style>

              </div>
          </div>
      </div>
  </div>

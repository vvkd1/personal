  @include('header');
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="content-wrapper pl-5 pt-1 pb-1" style="min-height: 880;">
                <header class="text-center">
                    <div class="rounded-rectangle border my-3 pl-2 pr-2 pt-2 pb-2 d-inline-block bg-white">
                        <h1 class="">EDIT ROLES</h1>
                    </div>
                </header>

                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



                <form method="POST" action="/update-role/{{ encrypt($edit->id) }}">

                    @csrf

                    <br>

                    <br>

                    <div class="form-group">
                        <label for="name">ROLE NAME</label>
                        <input type="text" class="form-control" id="name" value={{ $edit->name }} name="name">
                    </div>

                    <div class="form-group">
                        <label for="guard_name">GUARD NAME</label>
                        <input type="text" class="form-control" id="guard_name" name="guard_name" value="web" readonly>
                    </div>

                    <span> <button type="submit" class="btn btn-primary">SUBMIT</button></span>

                    <span> <button class="btn btn-danger"><a class="text-light" href="/showRoles">CANCEL</a></button></span>

                </form>

                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
                </script>

            </div>
        </div>
    </div>
</div>

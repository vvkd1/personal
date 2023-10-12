
@include('header');
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="content-wrapper pl-5 pt-1 pb-1" style="min-height: 880;">
                <header class="text-center">
                    <div class="rounded-rectangle border p-3 my-4 pl-5 pr-5 d-inline-block bg-white">
                        <h1 class="">ADD PERMISSION</h1>
                    </div>
                </header>

                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


                <form method="POST" action="/storePermission">
                    @csrf
                    <br>

                    <br>

                    <div class="form-group">
                        <label for="name">PERMISSION NAME<span>*</span></label>
                        <input type="text" class="form-control" id="name" name="name" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="guard_name">GUARD NAME</label>
                        <input type="text" class="form-control" id="guard_name" name="guard_name" value="web" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                    <button class="btn btn-danger"><a class="text-light" href="/showPermission">CANCEL</a></button>

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
<style>
    label span {
        color: red;
    }

</style>

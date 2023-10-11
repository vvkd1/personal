    <nav class="navbar bg-dark ">
        <div class="container">
            <a class="navbar-brand text-white text-start my-5" href="#">
                <h3> User Management system</h3>
            </a>

            <div> <a href="display" class="btn btn-primary">users Management</a></div>
            <div> <a href="/showRoles" class="btn btn-primary">roles Management</a></div>
            <div> <a href="/product-display" class="btn btn-primary">Products Management</a></div>
            
            <div class="menu-item px-5">
                <a href="{{ route('logout') }}" class="logout-form btn btn-danger" onclick="event.preventDefault();

                     document.getElementById('logout-form').submit();">Log Out</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </div>

    </nav>

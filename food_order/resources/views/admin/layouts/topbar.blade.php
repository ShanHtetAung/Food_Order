<nav class="navbar navbar-expand-lg navbar-light bg_color">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="ms-5 navbar-brand" href="{{ route('food.admin.dashboard') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="100" height="50">
        </a>

        <!-- Admin Name and Dropdown -->
        <div class="dropdown dropdown_btn">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ auth()->guard('admin')->user()->name }}
            </button>
            <ul class="dropdown-menu">
                <li>
                    <form action="{{ route('food.admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

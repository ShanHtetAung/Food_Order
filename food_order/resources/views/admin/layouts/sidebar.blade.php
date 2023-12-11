<div class="sidebar_container bg_color">
    <ul class="nav flex-column">
        <!-- Sidebar items go here -->
        <li class="nav-item">
            <a class="nav-link{{ Request::is('food/admin/dashboard*') ? ' active' : '' }}"
                href="{{ route('food.admin.dashboard') }}">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ Request::is('food/admin/order*') ? ' active' : '' }}"
                href="{{ route('food.admin.order.list') }}">
                <i class="fa-solid fa-truck-fast"></i> Order
            </a>
        </li>
        <li class="nav-item">
            @if (Request::is('food/admin/user/contact_list*'))
                <a class="nav-link{{ Request::is('food/admin/user') ? ' active' : '' }}"
                    href="{{ route('food.admin.user.list') }}">
                    <i class="fa-solid fa-users"></i> User
                </a>
            @else
                <a class="nav-link{{ Request::is('food/admin/user*') ? ' active' : '' }}"
                    href="{{ route('food.admin.user.list') }}">
                    <i class="fa-solid fa-users"></i> User
                </a>
            @endif
        </li>
        <li class="nav-item">
            <a class="nav-link{{ Request::is('food/admin/user/contact_list*') ? ' active' : '' }}"
                href="{{ route('food.admin.user.contactListPage') }}">
                <i class="fa-solid fa-envelope"></i> User's Contact
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ Request::is('food/admin/category*') ? ' active' : '' }}"
                href="{{ route('food.admin.category.list') }}">
                <i class="fa-solid fa-list"></i> Category
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ Request::is('food/admin/product*') ? ' active' : '' }}"
                href="{{ route('food.admin.product.list') }}">
                <i class="fa-solid fa-pizza-slice"></i> Product
            </a>
        </li>
    </ul>
</div>

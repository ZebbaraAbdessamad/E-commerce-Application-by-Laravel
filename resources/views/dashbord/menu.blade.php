<!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('frontend.home')}}">
        <div class="sidebar-brand-icon">
            <img src="{{asset('images/logo/art_3.jpg')}}" style="height: 70%;width:70%; border-radius: 90%;" alt="logo">
        </div>
        <div class="sidebar-brand-text mx-3">Artisanat <sup>Store</sup></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="fw-bold">Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
            <i class=" fas fa-grip-horizontal"></i>
            <span class="fw-bold">Categories</span>
        </a>
        <div id="collapsePages1" class="collapse @if(isset($menu) && $menu=='category') show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded active">
                <a class="collapse-item  @if(isset($item_menu) && $item_menu=='add') active @endif" href="{{route('categories.create')}}"> <i class="far fa-plus-square"></i>  add category</a>
                <a class="collapse-item  @if(isset($item_menu) && $item_menu=='list') active @endif" href="{{route('categories.index')}}"><i class=" fas fa-eye"></i> view categories</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages5" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-boxes"></i>
            <span class="fw-bold">Stock</span>
        </a>
        <div id="collapsePages5" class="collapse @if(isset($menu) && $menu=='product') show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if(isset($item_menu) && $item_menu=='list_stock') active @endif" href="{{route('stock.index')}}"><i class="fas fa-eye"></i> view stock</a>
                <div class="collapse-divider"></div>
                <a class="collapse-item @if(isset($item_menu) && $item_menu=='add') active @endif" href="{{route('products.create')}}"> <i class="far fa-plus-square"></i> add product</a>
                <a class="collapse-item @if(isset($item_menu) && $item_menu=='list') active @endif" href="{{route('products.index')}}"><i class="fas fa-cubes"></i> products</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages6" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-hand-holding"></i>
            <span class="fw-bold">Orders</span>
        </a>
        <div id="collapsePages6" class="collapse @if(isset($menu) && $menu=='commands') show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if(isset($item_menu) && $item_menu=='list_Commands') active @endif" href="{{route('orders.index')}}"><i class="fas fa-eye"></i> view orders</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-user-lock"></i>
            <span class="fw-bold">Roles & Permissions</span>
        </a>
        <div id="collapsePages3" class="collapse @if(isset($menu) && $menu=='roles_permission') show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if(isset($item_menu) && $item_menu=='add_role') active @endif" href="{{route('roles.create')}}"> <i class="far fa-plus-square"></i> add role</a>
                <a class="collapse-item @if(isset($item_menu) && $item_menu=='list_role') active @endif" href="{{route('roles.index')}}"><i class="fas fa-eye"></i> view roles</a>
                <a class="collapse-item @if(isset($item_menu) && $item_menu=='add_permission') active @endif" href="{{route('permissions.create')}}"><i class="far fa-plus-square"></i> add permission</a>
                <a class="collapse-item @if(isset($item_menu) && $item_menu=='list_permmissions') active @endif" href="{{route('permissions.index')}}"><i class="fas fa-eye"></i>  view permissions</a>
                <a class="collapse-item @if(isset($item_menu) && $item_menu=='matrix') active @endif" href="{{route('roles.role_permission')}}"><i class=" fas fa-poll-h"></i>  roles/permissions</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-users"></i>
            <span class="fw-bold">Users</span>
        </a>
        <div id="collapsePages4" class="collapse @if(isset($menu) && $menu=='users') show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if(isset($item_menu) && $item_menu=='add_user') active @endif" href="{{route('users.create')}}"> <i class="far fa-plus-square"></i> add user</a>
                <a class="collapse-item @if(isset($item_menu) && $item_menu=='list_users') active @endif" href="{{route('users.index')}}"><i class="fas fa-eye"></i> view users</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-2">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>



<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ (request()->is('admin/dashboard*')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>

                <li class="app-sidebar__heading">Admins</li>
                <li>
                    <a href="{{ route('admin.admin.index') }}" class="{{ (request()->is('admin/admin*')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-user"></i>
                        All Admin
                    </a>
                </li>

                <li class="app-sidebar__heading">Students</li>
                <li>
                    <a href="{{ route('admin.student.index') }}" class="{{ (request()->is('admin/student*')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-users"></i>
                        All Student
                    </a>
                </li>

                <li class="app-sidebar__heading">Categories</li>
                <li>
                    <a href="{{ route('admin.category.index') }}" class="{{ (request()->is('admin/category*')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-news-paper"></i>
                        All Category
                    </a>
                </li>

                <li class="app-sidebar__heading">Books</li>
                <li>
                    <a href="{{ route('admin.book.index') }}" class="{{ (request()->is('admin/book*')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-notebook"></i>
                        All Book
                    </a>
                </li>

                <li class="app-sidebar__heading">Rent List</li>
                <li>
                    <a href="{{ route('admin.order.index') }}" class="{{ (request()->is('admin/order*')) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-display1"></i>
                        All Rented Books
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>

@include('admin::layouts.upper')


<div class="wrapper">

    <div class="sidebar">

        <header>
            <div class="d-flex align-items-center justify-content-center h-100 w-100">
                <div>{{ config('app.name') }}</div>
            </div>
        </header>

        <div class="menu">
            @include('admin::layouts.menu-items')
        </div>

    </div>

    <div class="main">

        <header>
            <div class="d-flex align-items-center justify-content-between h-100 w-100">
                <i class="bi bi-list d-flex align-items-center ms-2" id="menu-button"></i>
                <div class="dropdown">
                    <i class="bi bi-person d-flex align-items-center me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                    <ul class="dropdown-menu ps-0">
                        <li><span class="mx-3">{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->name }}</span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault();document.getElementById('admin-logout-form').submit();">@lang('logout')</a>
                            <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div id="menu-closed-overlay"></div>

        <div class="content">
            @yield('content')
        </div>

    </div>


</div>

@include('admin::layouts.lower')

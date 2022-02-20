<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{route('account.index')}}">
                    <span class="brand-logo d-flex align-items-center">
                        <img src="{{asset('app-assets/images/favicon/estate.png')}}">
                        <h3 class="brand-text">Estate</h3>
                    </span>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            
            <li class="navigation-header"><span>Estate &amp; Management</span><i data-feather="more-horizontal"></i>
            </li>

            <li class="nav-item">
                <a class="d-flex align-items-center rounded @if(Request::path() == 'category') bg-primary @endif" href="{{route('category.index')}}">
                    <i data-feather='cast'></i><span class="menu-title text-truncate @if(Request::path() == 'category') text-white @endif">Category</span>
                </a>
            </li>
            
            <li class="nav-item mt-1">
                <a class="d-flex align-items-center rounded @if(Request::path() == 'product') bg-primary @endif" href="{{route('product.index')}}">
                    <i data-feather='briefcase'></i><span class="menu-title text-truncate @if(Request::path() == 'product') text-white @endif">Product</span>
                </a>
            </li>

            <li class="nav-item mt-1">
                <a class="d-flex align-items-center rounded @if(Request::path() == 'customer') bg-primary @endif" href="{{route('customer.index')}}">
                    <i data-feather='users'></i><span class="menu-title text-truncate @if(Request::path() == 'customer') text-white @endif">Customer</span>
                </a>
            </li>

            <li class="nav-item mt-1">
                <a class="d-flex align-items-center rounded @if(Request::path() == 'mailcontent') bg-primary @endif" href="{{route('mailcontent.index')}}">
                    <i data-feather='mail'></i><span class="menu-title text-truncate @if(Request::path() == 'mailcontent') text-white @endif">Mail</span>
                </a>
            </li>
            
            
        </ul>
    </div>
</div>
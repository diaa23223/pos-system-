<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <div class="container-fluid">

        {{-- القائمة الجانبية (الروابط الرئيسية) --}}
        <ul class="navbar-nav me-auto flex-nowrap overflow-auto">
            <li class="nav-item">
                <a class="btn btn-light-blue me-1" href="/">
                    <i class="bi bi-house-door-fill"></i> {{ __('home') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light-blue me-1" href="{{ route('users.index') }}">
                    <i class="bi bi-people-fill"></i> {{ __('users') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light-blue me-1" href="{{ route('permissions.index') }}">
                    <i class="bi bi-shield-lock-fill"></i> {{ __('permissions') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light-blue me-1" href="{{ route('roles.index') }}">
                    <i class="bi bi-person-badge-fill"></i> {{ __('roles') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light-blue me-1" href="#">
                    <i class="bi bi-graph-up-arrow"></i> {{ __('reports') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light-blue me-1" href="#">
                    <i class="bi bi-boxes"></i> {{ __('stock') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light-blue me-1" href="{{ route('categories.index') }}">
                    <i class="bi bi-tags-fill"></i> {{ __('categories') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light-blue me-1" href="{{ route('products.index') }}">
                    <i class="bi bi-box-seam"></i> {{ __('products') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light-blue me-1" href="#">
                    <i class="bi bi-cart-check-fill"></i> {{ __('orders') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light-blue me-1" href="{{ route('suppliers.index') }}">
                    <i class="bi bi-truck"></i> {{ __('suppliers') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light-blue me-1" href="{{ route('employees.index') }}">
                    <i class="bi bi-person-gear"></i> {{ __('Employee Management') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-light-blue me-1" href="#">
                    <i class="bi bi-cash-register"></i> {{ __('Point of sale') }}
                </a>
            </li>
        </ul>

        {{-- القائمة العلوية اليمنى (اللغة والخروج) --}}
        <ul class="navbar-nav ms-auto">
            {{-- اللغة --}}
            <li class="nav-item dropdown me-2">
                        <select class="language-select" onchange="window.location.href=this.value">
                            <option value="{{ route('change.language', 'ar') }}" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
                            <option value="{{ route('change.language', 'en') }}" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                        </select>
                    </li>

            </li>

            {{-- تسجيل الخروج --}}
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}
                    </button>
                </form>
            </li>
        </ul>

    </div>
</nav>

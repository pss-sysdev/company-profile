a@php

    use App\Models\Setting;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;

    $setting = Setting::find(1);
@endphp

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('owner.dashboard') }}"><img src="{{ asset('uploads/' . $setting->logo) }}" alt="PT PSS"
                    style="max-height: 55px"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('owner.dashboard') }}"><img src="{{ asset('uploads/' . $setting->logo) }}" alt="PT PSS"
                    style="max-height: 41px"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ $type_menu == 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('owner.dashboard') }}">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Menu</li>
            <li class="nav-item dropdown {{ $type_menu === 'company' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Company</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('owner/product/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('owner.product') }}">Product</a>
                    </li>
                    <li class="{{ request()->is('owner/category/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('owner.category') }}">Category</a>
                    </li>
                    <li class="{{ request()->is('owner/brand/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('owner.brand') }}">Brand</a>
                    </li>
                </ul>
            </li>

            <li class="{{ $type_menu == 'other-page' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('owner.other-page') }}">
                    <i class="fas fa-folder"></i> <span>Other Page</span>
                </a>
            </li>
            <li class="{{ $type_menu == 'general-setting' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('owner.setting-general') }}">
                    <i class="fas fa-folder"></i> <span>Website Setting</span>
                </a>
            </li>
            <li class="{{ request()->is('owner/client/*') || request()->is('owner/client') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('owner.client.index') }}">
                    <i class="fas fa-folder"></i> <span>Client</span>
                </a>
            </li>
            <li class="{{ request()->is('owner/project/*') || request()->is('owner/project') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('owner.project.index') }}">
                    <i class="fas fa-folder"></i> <span>Project</span>
                </a>
            </li>
            <li class="{{ request()->is('owner/quotation/*') || request()->is('owner/quotation') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('owner.quotation.index') }}">
                    <i class="fas fa-folder"></i> <span>Quotation</span>
                </a>
            </li>
        </ul>
    </aside>
</div>

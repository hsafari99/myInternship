{{-- UNIVERSAL LINKS --}}
    <li class="nav-item"><a href="/home" class="text-left nav-link">Home</a></li>

@if (Auth()->user()->hasRole('admin'))
    <li class="nav-item"><a href="/users/manage" class="text-left nav-link">User Management</a></li>
@endif

@if (true)

@endif
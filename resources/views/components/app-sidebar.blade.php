<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item nav-category"></li>
    @if(Auth::user()->role == 'doctor')
      <li class="nav-item" data-route="examination">
        <a class="nav-link" href="{{ route('examination') }}">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Examination</span>
        </a>
      </li>
    @endif
    @if(Auth::user()->role == 'pharmacist')
      <li class="nav-item" data-route="receipt">
        <a class="nav-link" href="{{ route('receipt') }}">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Receipt</span>
        </a>
      </li>
    @endif
  </ul>
</nav>
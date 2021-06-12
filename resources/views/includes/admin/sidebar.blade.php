<div id="sidebar" class='active'>
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <i class="fad fa-map-marked-alt brand-icon"></i>
      <a href="{{ route('dashboard') }}" class="brand">Pemetaan Longsor</a>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class='sidebar-title'>Menu Utama</li>
        <li class="sidebar-item {{ Request::is('admin') ? 'active' : '' }}">
          <a href="{{ route('dashboard') }}" class='sidebar-link'>
            <i class="far fa-chart-pie"></i>
            <span>Data Keseluruhan</span>
          </a>
        </li>
        <li class="sidebar-item {{ Request::is('admin/data-daerah-rawan') ? 'active' : '' }}">
          <a href="{{ route('data') }}" class='sidebar-link'>
            <i class="far fa-map-marked-alt"></i>
            <span>Data Derah Rawan</span>
          </a>
        </li>
      </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>
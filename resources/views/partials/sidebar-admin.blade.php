<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.mobil') }}">
          <i class="mdi mdi-car menu-icon"></i>
          <span class="menu-title">Mobil</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#pesanan" aria-expanded="false" aria-controls="pesanan">
          <i class="mdi mdi-clipboard-text menu-icon"></i>
          <span class="menu-title">Pesanan</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="pesanan">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.pesanan.baru') }}"> Pesanan Baru </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.pesanan.diterima') }}"> Pesanan Diterima </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.pesanan.ditolak') }}"> Pesanan Ditolak </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pinjam') }}">
          <i class="mdi mdi-car-connected menu-icon"></i>
          <span class="menu-title">Mobil Dipinjam</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pengembalian') }}">
          <i class="mdi mdi-twitter-retweet menu-icon"></i>
          <span class="menu-title">Pengembalian</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.mitra') }}">
          <i class="mdi mdi-car-wash menu-icon"></i>
          <span class="menu-title">Mitra</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#file" aria-expanded="false" aria-controls="file">
          <i class="mdi mdi-file menu-icon"></i>
          <span class="menu-title">Laporan</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="file">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.laporan.transaksi') }}"> Transaksi </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.laporan.mobil') }}"> Pengembalian Mobil </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.laporan.mitra') }}"> Pinjam Dari Mitra </a></li>
          </ul>
        </div>
      </li>
    </ul>
</nav>
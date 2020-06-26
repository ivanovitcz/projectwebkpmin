<div id="sidebar-nav" class="sidebar">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <li><a href="/" class="{{ '/' == request() -> path() ? 'active' : '' }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li>
          <a href="#subSiswa" data-toggle="collapse" class="{{ 'daftarsiswa/aktif' == request() -> path() || 'daftarsiswa/tidakaktif' == request() -> path() ? 'active' : 'collapsed' }}"><i class="fa fa-users"></i> <span>Daftar Siswa</span> <i class="icon-submenu fa fa-chevron-left"></i></a>
          <div id="subSiswa" class="{{ 'daftarsiswa/aktif' == request() -> path() || 'daftarsiswa/tidakaktif' == request() -> path() ? 'collapse in' : 'collapse' }}">
            <ul class="nav">
              <li><a href="/daftarsiswa/aktif" class="{{ 'daftarsiswa/aktif' == request() -> path() ? 'active' : '' }}">Siswa Aktif</a></li>
              <li><a href="/daftarsiswa/tidakaktif" class="{{ 'daftarsiswa/tidakaktif' == request() -> path() ? 'active' : '' }}">Siswa Tidak Aktif</a></li>
            </ul>
          </div>
        </li>
        <li>
          <a href="#subBuku" data-toggle="collapse" class="{{ 'daftarbuku/tematik' == request() -> path() || 'daftarbuku/nontematik' == request() -> path() ? 'active' : 'collapsed' }}"><i class="fa fa-book"></i> <span>Daftar Buku</span> <i class="icon-submenu fa fa-chevron-left"></i></a>
          <div id="subBuku" class="{{ 'daftarbuku/tematik' == request() -> path() || 'daftarbuku/nontematik' == request() -> path() ? 'collapse in' : 'collapse' }}">
            <ul class="nav">
              <li><a href="/daftarbuku/tematik" class="{{ 'daftarbuku/tematik' == request() -> path() ? 'active' : '' }}">Buku Tematik</a></li>
              <li><a href="/daftarbuku/nontematik" class="{{ 'daftarbuku/nontematik' == request() -> path() ? 'active' : '' }}">Buku Non-Tematik</a></li>
            </ul>
          </div>
        </li>
        <li>
          <a href="#subTrans" data-toggle="collapse" class="{{ 'daftartransaksi/aktif' == request() -> path() || 'daftartransaksi/semua' == request() -> path() ? 'active' : 'collapsed' }}"><i class="fa fa-align-left"></i> <span>Daftar Transaksi</span> <i class="icon-submenu fa fa-chevron-left"></i></a>
          <div id="subTrans" class="{{ 'daftartransaksi/aktif' == request() -> path() || 'daftartransaksi/semua' == request() -> path() ? 'collapse in' : 'collapse' }}">
            <ul class="nav">
              <li><a href="/daftartransaksi/aktif" class="{{ 'daftartransaksi/aktif' == request() -> path() ? 'active' : '' }}">Transaksi Aktif</a></li>
              <li><a href="/daftartransaksi/semua" class="{{ 'daftartransaksi/semua' == request() -> path() ? 'active' : '' }}">Semua Transaksi</a></li>
            </ul>
          </div>
        </li>
        <li><a href="/pengaturan" class="{{ 'pengaturan' == request() -> path() ? 'active' : '' }}"><i class="fa fa-gears"></i> <span>Pengaturan</span></a></li>
        <li><a href="/laporan" class="{{ 'laporan' == request() -> path() ? 'active' : '' }}"><i class="fa fa-table"></i> <span>Export Data</span></a></li>
        <li><a href="/view" ><i class="fa fa-user"></i> <span>Halaman User</span></a></li>
      </ul>
    </nav>
  </div>
</div>
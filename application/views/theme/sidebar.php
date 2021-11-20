<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-book"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Perpustakaan</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('mahasiswa/read');?>">
      <i class="fas fa-fw fa-user"></i>
      <span>Mahasiswa</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('fakultas/read');?>">
      <i class="fas fa-fw fa-building"></i>
      <span>Fakultas</span></a>
  </li>
  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('buku/read');?>">
      <i class="fas fa-fw fa-book"></i>
      <span>Buku</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('kategori_buku/read');?>">
      <i class="fas fa-swatchbook"></i>
      <span>Kategori Buku</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('peminjaman/read');?>">
      <i class="fas fa-book-open"></i>
      <span>Peminjaman</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('peminjaman_buku/read');?>">
      <i class="far fa-newspaper"></i>
      <span>Peminjaman Buku</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('user/read');?>">
      <i class="far fa-newspaper"></i>
      <span>User</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('buku_ajax/read');?>">
      <i class="far fa-newspaper"></i>
      <span>Buku ajax</span></a>
  </li>

  <hr class="sidebar-divider d-none d-md-block">

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>

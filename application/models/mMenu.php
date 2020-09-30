<?php 
 class mMenu extends CI_Model{
    function LoadMenu() {
        if($this->session->userdata('akses')=='Pengelola') {
            $menu = array(
                array('text' => 'Dashboard', 'url' => 'Pengelola/Beranda', 'icon' => 'menu-icon fa fa-laptop', 'hasSub' => false),
                array('text' => 'Profil Sekolah', 'url' => 'Pengelola/Sekolah', 'icon' => 'menu-icon fa fa-building-o', 'hasSub' => false),
                array('text' => 'Master Data', 'url' => '#', 'icon' => 'menu-icon fa fa-briefcase', 'hasSub' => true),
                array('text' => 'Pengaturan', 'url' => '#', 'icon' => 'menu-icon fa fa-gear', 'hasSub' => true)
            );
        } else if($this->session->userdata('akses')=='Administrator') {
            $menu = array(
                array('text' => 'Dashboard', 'url' => 'Administrator/Beranda', 'icon' => 'menu-icon fa fa-laptop', 'hasSub' => false),
                array('text' => 'Sekolah', 'url' => 'Administrator/Sekolah', 'icon' => 'menu-icon fa fa-building-o', 'hasSub' => false),
                array('text' => 'Device', 'url' => 'Administrator/Device', 'icon' => 'menu-icon fa fa-desktop', 'hasSub' => false)
            );
        } else if($this->session->userdata('akses')=='Superadmin') {
            $menu = array(
                array('text' => 'Dashboard', 'url' => 'Superadmin/Beranda', 'icon' => 'menu-icon fa fa-laptop', 'hasSub' => false),
                array('text' => 'Master Data', 'url' => '#', 'icon' => 'menu-icon fa fa-briefcase', 'hasSub' => true)
            );
        } else {
            $menu = null;
        }
        return $menu;
    }
    
    function LoadSubMenu() {
        if($this->session->userdata('akses')=='Pengelola') {
            $submenu = array(
                array('parent' => 'Master Data', 'text' => 'Siswa', 'url' => 'Pengelola/Siswa'),
                array('parent' => 'Master Data', 'text' => 'Alumni', 'url' => 'Pengelola/Alumni'),
                array('parent' => 'Master Data', 'text' => 'Guru', 'url' => 'Pengelola/Guru'),
                array('parent' => 'Master Data', 'text' => 'Kelas', 'url' => 'Pengelola/Kelas'),
                array('parent' => 'Pengaturan', 'text' => 'Datang', 'url' => 'Pengelola/Datang'),
                array('parent' => 'Pengaturan', 'text' => 'Pulang', 'url' => 'Pengelola/Pulang')
            );
        } else if($this->session->userdata('akses')=='Administrator') {
            $submenu = null;
        } else if($this->session->userdata('akses')=='Superadmin') {
            $submenu = array(
                array('parent' => 'Master Data', 'text' => 'Pegawai', 'url' => 'Superadmin/Pegawai'),
                array('parent' => 'Master Data', 'text' => 'User', 'url' => 'Superadmin/User'),
                array('parent' => 'Master Data', 'text' => 'Sekolah', 'url' => 'Superadmin/Sekolah')
            );
        } else {
            $submenu = null;
        }
        return $submenu;
    }
 }
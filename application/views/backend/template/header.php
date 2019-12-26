<?php
    if($this->session->userdata('status') != "login"){redirect('admin/login');} 
    $page = strtolower($this->uri->segment(2));
    $page2 = strtolower($this->uri->segment(3));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Admin - Website Dinas Pendidikan dan Kebudayaan Kab. Pekalongan
        </title>
        <meta name="description" content="Page Titile">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/backend/')?>img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/backend/')?>img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="<?=base_url('assets/backend/')?>img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/fa-regular.css">
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/datagrid/datatables/datatables.bundle.css">
        <link href="<?=base_url('assets/backend/')?>/libs/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/formplugins/summernote/summernote.css">
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/formplugins/select2/select2.bundle.css">
        <style type="text/css">
            @media (min-width: 768px) {
              .modal-xl {
                width: 90%;
               max-width:1200px;
              }
            }
        </style>

        <!--<link rel="stylesheet" media="screen, print" href="css/your_styles.css">-->
    </head>
    <body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution 
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /** 
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /** 
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /** 
             * Save to localstorage 
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /** 
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <aside class="page-sidebar">
                    <div class="page-logo">
                        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                            <img src="<?=base_url('assets/backend/')?>img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                        </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
                        <div class="nav-filter">
                            <div class="position-relative">
                                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                                    <i class="fal fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="info-card">
                            <img src="<?=base_url('assets/backend/')?>img/logo.svg" class="profile-image">
                            <div class="info-card-text">
                                <a href="#" class="d-flex align-items-center text-white">
                                    <span class="text-truncate text-truncate-sm d-inline-block">
                                        <?=$this->session->userdata('nama_bidang')?>
                                    </span>
                                </a>
                                <span class="d-inline-block text-truncate text-truncate-sm">DINDIKBUD</span>
                            </div>
                            <img src="<?=base_url('assets/backend/')?>img/card-backgrounds/cover-2-lg.png" class="cover" alt="cover">
                            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                                <i class="fal fa-angle-down"></i>
                            </a>
                        </div>
                        <ul id="js-nav-menu" class="nav-menu">
                            <li <?= ($page=='') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('admin')?>" title="Dashboard" data-filter-tags="dashboard">
                                    <i class="far fa-tachometer-alt"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_components">Dashboard</span>
                                </a>
                            </li>
                            <li <?= ($page=='profil') ? 'class="active"' : '' ?>>
                                <a href="#" title="UI Components" data-filter-tags="ui components">
                                    <i class="far fa-building"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_components">Profil</span>
                                </a>
                                <ul>
                                    <li <?= ($page2=='sambutan') ? 'class="active"' : '' ?>>
                                        <a href="<?=base_url('admin/profil/sambutan')?>" title="Sambutan" data-filter-tags="sambutan">
                                            <span class="nav-link-text" data-i18n="nav.sambutan">Sambutan</span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="ui_accordion.html" title="Accordions" data-filter-tags="ui components accordions">
                                            <span class="nav-link-text" data-i18n="nav.ui_components_accordions">Visi Misi</span>
                                        </a>
                                    </li> -->
                                    <li <?= ($page2=='struktur_organisasi') ? 'class="active"' : '' ?>>
                                        <a href="<?=base_url('admin/profil/struktur_organisasi')?>" title="Struktur Organisasi" data-filter-tags="struktur organisasi">
                                            <span class="nav-link-text" data-i18n="nav.struktur_organisasi">Struktur Organisasi</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li>
                                <a href="#" title="UI Components" data-filter-tags="ui components">
                                    <i class="far fa-user-secret"></i>
                                    <span class="nav-link-text" data-i18n="nav.ui_components">Layanan</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="ui_alerts.html" title="Alerts" data-filter-tags="ui components alerts">
                                            <span class="nav-link-text" data-i18n="nav.ui_components_alerts">Umum</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_accordion.html" title="Accordions" data-filter-tags="ui components accordions">
                                            <span class="nav-link-text" data-i18n="nav.ui_components_accordions">Bidang PAUD</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_badges.html" title="Badges" data-filter-tags="ui components badges">
                                            <span class="nav-link-text" data-i18n="nav.ui_components_badges">Bidang Dikdas</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_badges.html" title="Badges" data-filter-tags="ui components badges">
                                            <span class="nav-link-text" data-i18n="nav.ui_components_badges">Bidang Sarpras</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui_badges.html" title="Badges" data-filter-tags="ui components badges">
                                            <span class="nav-link-text" data-i18n="nav.ui_components_badges">Bidang Kebudayaan</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                            <li <?= ($page=='berita') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('admin/berita')?>" title="Berita" data-filter-tags="berita">
                                    <i class="far fa-newspaper"></i>
                                    <span class="nav-link-text" data-i18n="nav.berita">Berita</span>
                                </a>
                            </li>
                            <li class="nav-title">Master</li>
                            <li <?= ($page=='bidang') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('admin/bidang')?>" title="Bidang" data-filter-tags="bidang">
                                    <i class="far fa-boxes"></i>
                                    <span class="nav-link-text" data-i18n="nav.bidang">Bidang</span>
                                </a>
                            </li>
                            <li <?= ($page=='aplikasi') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('admin/aplikasi')?>" title="Data Aplikasi" data-filter-tags="data aplikasi">
                                    <i class="far fa-certificate"></i>
                                    <span class="nav-link-text" data-i18n="nav.data_aplikasi">Data Aplikasi</span>
                                </a>
                            </li>
                            <li <?= ($page=='carousel') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('admin/carousel')?>" title="Carousel" data-filter-tags="carousel">
                                    <i class="far fa-image"></i>
                                    <span class="nav-link-text" data-i18n="nav.carousel">Carousel</span>
                                </a>
                            </li>
                            <li <?= ($page=='tags') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('admin/tags')?>" title="Tags" data-filter-tags="tags">
                                    <i class="far fa-hashtag"></i>
                                    <span class="nav-link-text" data-i18n="nav.tags">Tags</span>
                                </a>
                            </li>
                            <li <?= ($page=='user') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('admin/user')?>" title="Manajemen User" data-filter-tags="manajemen user">
                                    <i class="far fa-users"></i>
                                    <span class="nav-link-text" data-i18n="nav.manajemen_user">Manajemen User</span>
                                </a>
                            </li>
                            <li class="nav-title">Media</li>
                            <li <?= ($page=='informasi') ? 'class="active"' : '' ?>>
                                <a href="#" title="Informasi Publik" data-filter-tags="informasi publik">
                                    <i class="far fa-info-circle"></i>
                                    <span class="nav-link-text" data-i18n="nav.informasi_publik">Informasi Publik</span>
                                </a>
                                <ul>
                                    <li <?= ($page2=='renstra') ? 'class="active"' : '' ?>>
                                        <a href="<?=base_url('admin/informasi/renstra')?>" title="Renstra" data-filter-tags="informasi publik renstra">
                                            <span class="nav-link-text" data-i18n="nav.informas_publik_renstra">Renstra</span>
                                        </a>
                                    </li>
                                    <li <?= ($page2=='lkpj') ? 'class="active"' : '' ?>>
                                        <a href="<?=base_url('admin/informasi/lkpj')?>" title="LKPJ" data-filter-tags="informasi publik lkpj">
                                            <span class="nav-link-text" data-i18n="nav.informas_publik_lkpj">LKPJ</span>
                                        </a>
                                    </li>
                                    <li <?= ($page2=='layanan_umum') ? 'class="active"' : '' ?>>
                                        <a href="<?=base_url('admin/informasi/layanan_umum')?>" title="Layanan Umum" data-filter-tags="informasi publik layanan umum">
                                            <span class="nav-link-text" data-i18n="nav.informas_publik_layanan_umum">Layanan Umum</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?= ($page=='download') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('admin/download')?>" title="Download" data-filter-tags="download">
                                    <i class="far fa-cloud-download"></i>
                                    <span class="nav-link-text" data-i18n="nav.download">Download</span>
                                </a>
                            </li>
                            <li <?= ($page=='galeri') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('admin/galeri')?>" title="Galeri" data-filter-tags="galeri">
                                    <i class="far fa-images"></i>
                                    <span class="nav-link-text" data-i18n="nav.galeri">Galeri</span>
                                </a>
                            </li>
                            <li <?= ($page=='pesan') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('admin/pesan')?>" title="Pesan" data-filter-tags="pesan">
                                    <i class="far fa-envelope"></i>
                                    <span class="nav-link-text" data-i18n="nav.pesan">Pesan</span>
                                </a>
                            </li>
                        </ul>
                        <div class="filter-message js-filter-message bg-success-600"></div>
                    </nav>
                    <!-- END PRIMARY NAVIGATION -->
                    <!-- NAV FOOTER -->
                    <div class="nav-footer shadow-top">
                        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
                            <i class="ni ni-chevron-right"></i>
                            <i class="ni ni-chevron-right"></i>
                        </a>
                        <ul class="list-table m-auto nav-footer-buttons">
                            <li>
                                <a href="<?=base_url('admin/login/logout')?>" data-toggle="tooltip" data-placement="top" title="Keluar">
                                    <i class="far fa-sign-out"> Keluar</i>
                                </a>
                            </li>
                        </ul>
                    </div> <!-- END NAV FOOTER -->
                </aside>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <header class="page-header" role="banner">
                        <!-- we need this logo when user switches to nav-function-top -->
                        <div class="page-logo">
                            <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                                <img src="<?=base_url('assets/backend/')?>img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                                <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                                <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                            </a>
                        </div>
                        <!-- DOC: nav menu layout change shortcut -->
                        <div class="hidden-md-down dropdown-icon-menu position-relative">
                            <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                                <i class="ni ni-menu"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                                        <i class="ni ni-minify-nav"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                                        <i class="ni ni-lock-nav"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- DOC: mobile button appears during mobile width -->
                        <div class="hidden-lg-up">
                            <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                                <i class="ni ni-menu"></i>
                            </a>
                        </div>
                        <div class="ml-auto d-flex">
                            <!-- activate app search icon (mobile) -->
                            <div class="hidden-sm-up">
                                <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
                                    <i class="fal fa-search"></i>
                                </a>
                            </div>
                            <!-- app settings -->
                            <div class="hidden-md-down">
                                <a href="#" class="header-icon" data-toggle="modal" data-target=".js-modal-settings">
                                    <i class="fal fa-cog"></i>
                                </a>
                            </div>
                            <div>
                                <a href="#" class="header-icon" data-toggle="dropdown" title="My Apps">
                                    <i class="fal fa-cube"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated w-auto h-auto">
                                    <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top">
                                        <h4 class="m-0 text-center color-white">
                                            Quick Shortcut
                                            <small class="mb-0 opacity-80">User Applications & Addons</small>
                                        </h4>
                                    </div>
                                    <div class="custom-scroll h-100">
                                        <ul class="app-list">
                                            <li>
                                                <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-2 icon-stack-3x color-primary-600"></i>
                                                        <i class="base-3 icon-stack-2x color-primary-700"></i>
                                                        <i class="ni ni-settings icon-stack-1x text-white fs-lg"></i>
                                                    </span>
                                                    <span class="app-list-name">
                                                        Services
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-2 icon-stack-3x color-primary-400"></i>
                                                        <i class="base-10 text-white icon-stack-1x"></i>
                                                        <i class="ni md-profile color-primary-800 icon-stack-2x"></i>
                                                    </span>
                                                    <span class="app-list-name">
                                                        Account
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-9 icon-stack-3x color-success-400"></i>
                                                        <i class="base-2 icon-stack-2x color-success-500"></i>
                                                        <i class="ni ni-shield icon-stack-1x text-white"></i>
                                                    </span>
                                                    <span class="app-list-name">
                                                        Security
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-18 icon-stack-3x color-info-700"></i>
                                                        <span class="position-absolute pos-top pos-left pos-right color-white fs-md mt-2 fw-400">28</span>
                                                    </span>
                                                    <span class="app-list-name">
                                                        Calendar
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-7 icon-stack-3x color-info-500"></i>
                                                        <i class="base-7 icon-stack-2x color-info-700"></i>
                                                        <i class="ni ni-graph icon-stack-1x text-white"></i>
                                                    </span>
                                                    <span class="app-list-name">
                                                        Stats
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-4 icon-stack-3x color-danger-500"></i>
                                                        <i class="base-4 icon-stack-1x color-danger-400"></i>
                                                        <i class="ni ni-envelope icon-stack-1x text-white"></i>
                                                    </span>
                                                    <span class="app-list-name">
                                                        Messages
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-4 icon-stack-3x color-fusion-400"></i>
                                                        <i class="base-5 icon-stack-2x color-fusion-200"></i>
                                                        <i class="base-5 icon-stack-1x color-fusion-100"></i>
                                                        <i class="fal fa-keyboard icon-stack-1x color-info-50"></i>
                                                    </span>
                                                    <span class="app-list-name">
                                                        Notes
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-16 icon-stack-3x color-fusion-500"></i>
                                                        <i class="base-10 icon-stack-1x color-primary-50 opacity-30"></i>
                                                        <i class="base-10 icon-stack-1x fs-xl color-primary-50 opacity-20"></i>
                                                        <i class="fal fa-dot-circle icon-stack-1x text-white opacity-85"></i>
                                                    </span>
                                                    <span class="app-list-name">
                                                        Photos
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-19 icon-stack-3x color-primary-400"></i>
                                                        <i class="base-7 icon-stack-2x color-primary-300"></i>
                                                        <i class="base-7 icon-stack-1x fs-xxl color-primary-200"></i>
                                                        <i class="base-7 icon-stack-1x color-primary-500"></i>
                                                        <i class="fal fa-globe icon-stack-1x text-white opacity-85"></i>
                                                    </span>
                                                    <span class="app-list-name">
                                                        Maps
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-5 icon-stack-3x color-success-700 opacity-80"></i>
                                                        <i class="base-12 icon-stack-2x color-success-700 opacity-30"></i>
                                                        <i class="fal fa-comment-alt icon-stack-1x text-white"></i>
                                                    </span>
                                                    <span class="app-list-name">
                                                        Chat
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-5 icon-stack-3x color-warning-600"></i>
                                                        <i class="base-7 icon-stack-2x color-warning-800 opacity-50"></i>
                                                        <i class="fal fa-phone icon-stack-1x text-white"></i>
                                                    </span>
                                                    <span class="app-list-name">
                                                        Phone
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="app-list-item hover-white">
                                                    <span class="icon-stack">
                                                        <i class="base-6 icon-stack-3x color-danger-600"></i>
                                                        <i class="fal fa-chart-line icon-stack-1x text-white"></i>
                                                    </span>
                                                    <span class="app-list-name">
                                                        Projects
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="w-100">
                                                <a href="#" class="btn btn-default mt-4 mb-2 pr-5 pl-5"> Add more apps </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- app user menu -->
                            <div>
                                <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com" class="header-icon d-flex align-items-center justify-content-center ml-2">
                                    <img src="<?=base_url('assets/backend/img/logo_pekalongan.png')?>" class="profile-image" alt="Dr. Codex Lantern">
                                    <!-- you can also add username next to the avatar with the codes below:
                                    <span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
                                    <i class="ni ni-chevron-down hidden-xs-down"></i> -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                    <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                        <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                            <span class="mr-2">
                                                <img src="<?=base_url('assets/backend/')?>img/logo_pekalongan.png" class="profile-image" alt="Dr. Codex Lantern">
                                            </span>
                                            <div class="info-card-text">
                                                <div class="fs-lg text-truncate text-truncate-lg"><?=strtoupper($this->session->userdata('nama_bidang'))?></div>
                                                <span class="text-truncate text-truncate-md opacity-80">DINDIKBUD</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="#" class="dropdown-item" data-action="app-reset">
                                        <span data-i18n="drpdwn.reset_layout">Reset Layout</span>
                                    </a>
                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target=".js-modal-settings">
                                        <span data-i18n="drpdwn.settings">Settings</span>
                                    </a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="#" class="dropdown-item" data-action="app-fullscreen">
                                        <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
                                        <i class="float-right text-muted fw-n">F11</i>
                                    </a>
                                    <a href="#" class="dropdown-item" data-action="app-print">
                                        <span data-i18n="drpdwn.print">Print</span>
                                        <i class="float-right text-muted fw-n">Ctrl + P</i>
                                    </a>
                                    <div class="dropdown-multilevel dropdown-multilevel-left">
                                        <div class="dropdown-item">
                                            Language
                                        </div>
                                        <div class="dropdown-menu">
                                            <a href="#?lang=fr" class="dropdown-item" data-action="lang" data-lang="fr">Français</a>
                                            <a href="#?lang=en" class="dropdown-item active" data-action="lang" data-lang="en">English (US)</a>
                                            <a href="#?lang=es" class="dropdown-item" data-action="lang" data-lang="es">Español</a>
                                            <a href="#?lang=ru" class="dropdown-item" data-action="lang" data-lang="ru">Русский язык</a>
                                            <a href="#?lang=jp" class="dropdown-item" data-action="lang" data-lang="jp">日本語</a>
                                            <a href="#?lang=ch" class="dropdown-item" data-action="lang" data-lang="ch">中文</a>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item fw-500 pt-3 pb-3" href="page_login-alt.html">
                                        <span data-i18n="drpdwn.page-logout">Logout</span>
                                        <span class="float-right fw-n">&commat;codexlantern</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- END Page Header -->
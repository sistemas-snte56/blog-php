<aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-x:hidden">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ url('/')}}/{{$blog[0]['icono']}}" alt="Blog Viajero" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Blog Viajero</span>
    </a>

    <!-- Sidebar -->
    <div
        class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 789px;"></div>
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ url('/') }}/{{ $item->foto }} " class="img-circle elevation-2"
                                alt="Vicjurez">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Vicente</a>
                        </div>
                    </div>

                    <!-- SidebarSearch Form -->
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                        <div class="sidebar-search-results">
                            <div class="list-group"><a href="#" class="list-group-item">
                                    <div class="search-title"><strong class="text-light"></strong>N<strong
                                            class="text-light"></strong>o<strong class="text-light"></strong> <strong
                                            class="text-light"></strong>e<strong class="text-light"></strong>l<strong
                                            class="text-light"></strong>e<strong class="text-light"></strong>m<strong
                                            class="text-light"></strong>e<strong class="text-light"></strong>n<strong
                                            class="text-light"></strong>t<strong class="text-light"></strong> <strong
                                            class="text-light"></strong>f<strong class="text-light"></strong>o<strong
                                            class="text-light"></strong>u<strong class="text-light"></strong>n<strong
                                            class="text-light"></strong>d<strong class="text-light"></strong>!<strong
                                            class="text-light"></strong></div>
                                    <div class="search-path"></div>
                                </a></div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>
                            {{-- Administradores --}}
                            <li class="nav-item">
                                <a href="{{ url('/administradores') }}" class="nav-link">
                                    <i class="nav-icon fas fa-users-cog"></i>
                                    <p>Administradores</p>
                                </a>
                            </li>
                            {{-- Categorías --}}
                            <li class="nav-item">
                                <a href="{{ url('/categorias') }}" class="nav-link">
                                    <i class="nav-icon fas fa-list-ul"></i>
                                    <p>Categorías</p>
                                </a>
                            </li>
                            {{-- Artículos --}}
                            <li class="nav-item">
                                <a href="{{ url('/articulos') }}" class="nav-link">
                                    <i class="nav-icon fas fa-sticky-note"></i>
                                    <p>Artículos</p>
                                </a>
                            </li>
                            {{-- Opiniones --}}
                            <li class="nav-item">
                                <a href="{{ url('/opiniones') }}" class="nav-link">
                                    <i class="nav-icon fas fa-user-check"></i>
                                    <p>Opiniones</p>
                                </a>
                            </li>
                            {{-- Banner --}}
                            <li class="nav-item">
                                <a href="{{ url('/banner') }}" class="nav-link">
                                    <i class="nav-icon fas fa-images"></i>
                                    <p>Banner</p>
                                </a>
                            </li>
                            {{-- Anuncios --}}
                            <li class="nav-item">
                                <a href="{{ url('/anuncios') }}" class="nav-link">
                                    <i class="nav-icon fas fa-bullhorn"></i>
                                    <p>Anuncios</p>
                                </a>
                            </li>
                            
                            <li class="nav-header">PÁGINA WEB</li>
                            
                            {{-- Página Web --}}
                            <li class="nav-item">
                                <a href="{{ substr(url('/'),0,-11) }}" target="_blank" class="nav-link">
                                    <i class="nav-icon fas fa-globe"></i>
                                    <p>Página Web</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 49.4059%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
    <!-- /.sidebar -->
</aside>

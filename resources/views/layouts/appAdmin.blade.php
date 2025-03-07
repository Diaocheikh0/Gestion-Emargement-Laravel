<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>GROUPE ISI</title>

    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Unfixed Sidebar" />
    <meta name="author" content="ColorlibHQ" />
    <meta
        name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
        name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->

    <!--begin::Fonts-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous"
    />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
        crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
        crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <!-- Si tu as téléchargé AdminLTE, charge le fichier CSS local -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}" />
    <!-- Si tu utilises un CDN, tu peux aussi le charger comme suit -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/css/adminlte.min.css"> -->
    <!--end::Required Plugin(AdminLTE)-->

    <!-- Ajoute ici les autres liens CSS spécifiques à ton projet -->

</head>

<!--end::Head-->
<!--begin::Body-->
<body class="sidebar-expand-lg bg-body-tertiary">
<!--begin::App Wrapper-->
<div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Start Navbar Links-->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <i class="bi bi-list"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block">
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('users.index') }}" class="nav-link">Home</a>
                    @elseif(Auth::user()->role == 'gestionnaire')
                        <a href="{{ route('cours.index') }}" class="nav-link">Home</a>
                    @elseif(Auth::user()->role == 'professeur')
                        <a href="{{ route('emargements.create') }}" class="nav-link">Home</a>
                    @else
                        <a href="{{ route('users.index') }}" class="nav-link">Home</a>
                    @endif
                </li>
            </ul>
            <!--end::Start Navbar Links-->
            <!--begin::End Navbar Links-->
            <ul class="navbar-nav ms-auto">
                <!--begin::Navbar Search-->
                <!--end::Navbar Search-->
                <!--begin::Messages Dropdown Menu-->

                <!--end::Messages Dropdown Menu-->
                <!--begin::Notifications Dropdown Menu-->

                <!--end::Notifications Dropdown Menu-->
                <!--begin::Fullscreen Toggle-->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                        <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                        <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                    </a>
                </li>
                <!--end::Fullscreen Toggle-->
                <!--begin::User Menu Dropdown-->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img
                            src="/vendor/adminlte/dist/assets/img/avatar5.png"
                            class="user-image rounded-circle shadow"
                            alt="User Image"
                        />
                        <span class="d-none d-md-inline">
                                @auth()
                                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                                @endauth
                                    @guest()
                                        <a href="{{route('login')}}">Se Connecter</a>
                                    @endguest
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                        <!--begin::User Image-->
                        <li class="user-header text-bg-primary">
                            <img
                                src="/vendor/adminlte/dist/assets/img/avatar5.png"
                                class="rounded-circle shadow"
                                alt="User Image"
                            />
                            <p>
                                @auth()
                                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                                @endauth
                                <small>
                                    @auth()
                                        {{\Illuminate\Support\Facades\Auth::user()->role}}
                                    @endauth
                                </small>
                            </p>
                        </li>
                        <!--end::User Image-->
                        <!--begin::Menu Body-->
                        <!--end::Menu Body-->
                        <!--begin::Menu Footer-->
                        <li class="user-footer">
                            <form action="{{route('logout')}}" method="post">
                            @method('post')
                            @csrf
                            <button  class="btn btn-default btn-flat float-end text-center">Se déconnecter</button>
                            </form>
                        </li>
                        <!--end::Menu Footer-->
                    </ul>
                </li>
                <!--end::User Menu Dropdown-->
            </ul>
            <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
    </nav>
    <!--end::Header-->
    <!--begin::Sidebar-->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand text-center py-3" style="background-color: #003366;">
            <span class="brand-text fw-bold" style="color: white; font-size: 28px; font-family: 'Georgia', serif;">
                GROUPE <span style="font-weight: bold;">ISI</span>
            </span>
        </div>

        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <!--begin::Sidebar Menu-->
                <ul
                    class="nav sidebar-menu flex-column"
                    data-lte-toggle="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    @if(auth()->user()->role == 'administrateur')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi bi-people"></i>
                                <p>
                                    Gestion des Utilisateurs
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('users.index')}}" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Liste des Utilisateurs</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('register.create')}}" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Ajout Utilisateur</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if(auth()->user()->role == 'administrateur' || auth()->user()->role == 'gestionnaire')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-house-door"></i>
                                <p>
                                    Gestion des Salles
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('salle.index')}}" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Liste des Salles</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('salle.create')}}" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Ajout Salle</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(auth()->user()->role == 'administrateur' || auth()->user()->role == 'gestionnaire')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-book"></i>
                                <p>
                                    Gestion des Cours
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('cours.index')}}" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Lite des Cours</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('cours.create')}}" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Ajout Cour</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('cours-professeurs.index')}}" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Attribution Cours</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-check-circle"></i>
                            <p>
                                Emargements
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if(auth()->user()->role == 'administrateur' || auth()->user()->role == 'gestionnaire')
                            <li class="nav-item">
                                <a href="{{route('AllHistoriqueEmargements')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Historiques</p>
                                </a>
                            </li>
                            @endif
                            @if(auth()->user()->role == 'professeur')
                            <li class="nav-item">
                                <a href="{{route('emargements.create')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Emarger</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('emargements.index')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Historiques</p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>

                        @if(auth()->user()->role == 'administrateur' || auth()->user()->role == 'gestionnaire')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-file-earmark-text"></i>
                            <p>
                                Statistiques
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('graphiqueBarres.index')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Total Présences</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('graphiqueLigne.index')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Suivi Présences</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('graphiqueDoughnut.index')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Taux Présence</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                        @endif
                </ul>
                <!--end::Sidebar Menu-->
            </nav>
        </div>
        <!--end::Sidebar Wrapper-->
    </aside>
    <!--end::Sidebar-->
    <!--begin::App Main-->
    <main class="app-main">
        <!--begin::App Content Header-->
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            @yield('content')
            @stack('scripts')
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
    <!--begin::Footer-->
    <footer class="app-footer">
        <!--begin::To the end-->
        <!--<div class="float-end d-none d-sm-inline">Anything you want</div>-->
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
            Copyright &copy; 2024-2025&nbsp;
            <a href="https://adminlte.io" class="text-decoration-none">BY DIAO Cheikh D</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
    </footer>
    <!--end::Footer-->
</div>
<!--end::App Wrapper-->
<!--begin::Script-->
<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
    crossorigin="anonymous"
></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
    crossorigin="anonymous"
></script>

<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
></script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"
></script>

<!-- AdminLTE JS -->
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

<!-- Optional: OverlayScrollbars configure if needed -->
<script>
    $(document).ready(function () {
        // Here you can add custom config for OverlayScrollbars, if needed
        OverlayScrollbars(document.querySelectorAll('.your-selector'), {
            className: "os-theme-light",
            resize: "both",
            sizeAutoCapable: true
        });
    });
</script>
</script>
<!--end::OverlayScrollbars Configure-->
<!--end::Script-->
</body>
<!--end::Body-->
</html>

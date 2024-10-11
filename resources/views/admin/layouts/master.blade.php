<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard-rtl/">





<link href="{{ url('admin/assets/dist/css/bootstrap.rtl.min.css')}} " rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{url('admin/assets/dist/css/dashboard.rtl.css')}}" rel="stylesheet">
  </head>
  <body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"> {{ auth()->user()->name_ar?? auth()->user()->name_en}}</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="عرض/إخفاء لوحة التنقل">
    <span class="navbar-toggler-icon"></span>
  </button>
  {{-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="بحث" aria-label="بحث"> --}}
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a class="nav-link px-3" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            تسجيل الخروج
        </a>
    </div>
</div>

</header>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
                <!-- Dashboard Link -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <span data-feather="home" class="align-text-bottom"></span>
                        لوحة القيادة
                    </a>
                </li>

                <!-- Users Link -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                        <span data-feather="users" class="align-text-bottom"></span>
                        المستخدمين
                    </a>
                </li>

                <!-- Positions Link -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/positions*') ? 'active' : '' }}" href="{{ route('admin.positions.index') }}">
                        <span data-feather="briefcase" class="align-text-bottom"></span>
                        الوظائف
                    </a>
                </li>

                <!-- Applications Link -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/applications*') ? 'active' : '' }}" href="{{ route('admin.applications.index') }}">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        الطلبات
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
  </div>
</div>


    <script src="{{url('admin/assets/dist/js/bootstrap.bundle.min.js')}}"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script>
        // Function to dynamically add competency fields
        function addCompetency() {
            let container = document.getElementById('competencies-container');
            let newField = document.createElement('div');
            newField.classList.add('input-group', 'mb-2');
            newField.innerHTML = `
                <input type="text" class="form-control" name="competencies[]" placeholder="أدخل الكفاءة" required>
                <button type="button" class="btn btn-danger" onclick="removeCompetency(this)">-</button>
            `;
            container.appendChild(newField);
        }

        // Function to remove a competency field
        function removeCompetency(button) {
            button.parentElement.remove();
        }
    </script>
    </body>
</html>

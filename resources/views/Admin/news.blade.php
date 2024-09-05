<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Member Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .navbar-brand {
            margin-right: 40px; /* Adjusted spacing */
        }
        .navbar-nav {
            margin-left: auto; 
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-2" href="{{ url('admin/dashboard')}}">Member Management System</a>
  
        <button class="btn btn-link btn-sm order-0 order-lg-0 ms-5" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav ms-auto ms-md-45 me-10 me-lg-5">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            
            <div class="sb-sidenav-menu-heading">Manage</div>
            
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBlogPost" aria-expanded="false" aria-controls="collapseBlogPost">
                <div class="sb-nav-link-icon">📝</div> <!-- Memo icon -->
                Blog Post
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseBlogPost" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.createpost') }}">Add Post</a>
                    <a class="nav-link" href="{{ url('/admin/post') }}">View Post</a>
                </nav>
            </div>
            
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseNewsUpdates" aria-expanded="false" aria-controls="collapseNewsUpdates">
                <div class="sb-nav-link-icon">📰</div> <!-- Newspaper icon -->
                News and Updates
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseNewsUpdates" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.createnews') }}">Add News</a>
                    <a class="nav-link" href="{{ url('/admin/news') }}">View News</a>
                </nav>
            </div>
            
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEvents" aria-expanded="false" aria-controls="collapseEvents">
                <div class="sb-nav-link-icon">🎉</div> <!-- Party popper icon -->
                Events
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseEvents" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.createevents') }}">Add Events</a>
                    <a class="nav-link" href="{{ url('/admin/events') }}">View Events</a>
                </nav>
            </div>
            
            <a class="nav-link" href="{{ route('admin.registeredusers') }}">👤 View Users</a>
            <a class="nav-link" href="#!">💳 Payments</a>
        </div>
    </div>
</nav>

    </div>
    <div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="d-flex justify-content-between align-items-center">
                    News and Updates
                    <a href="{{route('admin.createnews')}}" class="btn btn-primary btn-sm">Add News</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table table-bordered table-hover">
                    <thead style="background-color: #343a40; color: white;">
                        <tr>
                            <th>ID</th>
                            <th>News Name</th>
                           
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($newsd as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                              
                                <td>
                                    <a href="{{url('admin/news/'.$item->id)}}" class="btn btn-primary" >Edit</a>
                                </td>
                                <td>
                                <a href="{{ url('admin/deletenews/'.$item->id) }}" class="btn btn-primary" style="background-color: red; color: white; border-color: red;">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright © Your Website 2023</div>
                        <div>
                        <a href="#">Privacy Policy</a>
                            ·
                            <a href="#">Terms & Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('admin/js/scripts.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('admin/js/datatables-simple-demo.js')}}"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('layoutSidenav_nav').classList.toggle('sb-sidenav-toggled');
        });
    </script>
</body>
</html>
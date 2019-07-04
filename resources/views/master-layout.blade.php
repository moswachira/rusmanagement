<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('desc')">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title>@yield('title')</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" >
    <link href="/assets/css/main.css" rel="stylesheet" >

    </head>
    <body>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="/">
                                    <span data-feather="home"></span>
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/product">
                                    <span data-feather="home"></span>
                                    Product <span class="sr-only">(current)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
        </main>
    </body>
</html>

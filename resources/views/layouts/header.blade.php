<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Toggle Sidebar</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-7">
                <div class="header-logo">
                    <a href="{{ url('') }}">
                        <img class="header-img" src="{{ asset('images/gray.jpg') }}" alt="example">
                    </a>
                </div>
                <div class="header-text">
                    <h2 style="color: #ff0; font-weight: bold;">Nama Yayasan</h2>
                    <p>
                        <strong>Alamat Yayasan</strong>
                    </p>
                    <p>Moto Yayasan</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .nav-height-set {
        height: 70px;
    }

    @media (max-width: 1010px) {
        .nav-height-set {
            height: auto;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-height-set">
    <a class="navbar-brand" href="index.php">
        <img src="./images/logo.png" alt="ambika" height="50" width="90" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="page.php?pid=shop&g=male">Male</a>
                    <a class="dropdown-item" href="page.php?pid=shop&g=female">Female</a>
                    <a class="dropdown-item" href="page.php?pid=shop&g=kids">Kids</a>

                </div>
            <li class="nav-item">
                <a class="nav-link" href="page.php?pid=about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./admin/admin.php">Admin</a>
            </li>
        </ul>

    </div>
</nav>
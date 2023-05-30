<style>
    .nav-height-set {
        height: 70px;
		font-size: 1.2rem;
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
                <a class="nav-link" href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a>
            </li>
			<li>
                <a class="nav-link" href="logout.php">logout</a>
            </li>
        </ul>

    </div>
</nav>
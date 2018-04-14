<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark static-top bg-dark">
        <a class="navbar-brand" href="#"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?controller=Home&action=index">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">Task</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="?controller=task&action=index">Index</a>
                        <a class="dropdown-item" href="?controller=task&action=create">Create</a>
                        <a class="dropdown-item" href="?controller=task&action=delete">Delete</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">Team</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="?controller=team&action=index">Index</a>
                        <a class="dropdown-item" href="?controller=team&action=create">Create</a>
                        <!--                        <a class="dropdown-item" href="?controller=team&action=delete">Delete</a>-->
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Member</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="?controller=member&action=index">Index</a>
                        <a class="dropdown-item" href="?controller=home&action=register">Register</a>
                        <a class="dropdown-item" href="?controller=member&action=connexion">Connexion</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">Test</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Test1</a>
                        <a class="dropdown-item" href="#">Test2</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>

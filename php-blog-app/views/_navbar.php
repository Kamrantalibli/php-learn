<?php 

    if(!empty($_GET['q'])) {
        $keyword = $_GET['q'];

        $films = array_filter($films, function ($film) use ($keyword) {
            return  (stristr($film['title'], $keyword) or stristr($film['description'], $keyword));
        });
    }

?>



<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a href="/" class="navbar-brand">BlogApp</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Link 1</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Link 2</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Link 3</a>
                </li>
            </ul>
            <form class="d-flex" action="index.php" method="GET">
                <input type="text" name="q" class="form-control me-2" placeholder="Search">
                <button class="btn btn-outline-light">Search</button>
            </form>
        </div>
    </div>
</nav>
<?php
include "db.php";
if (!isset($_SESSION["id"])) {
    header("login.php");
}


$result =$conn->query("select poperties.*, users.full_name from poperties join users on users.id = poperties.user_id ");

?>



<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
            >
                <div class="container">
                    <a class="navbar-brand" href="#">Real Estate Portal</a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="dashboard.php" aria-current="page"
                                    >Home
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="add_property.php ">add</a>
                            </li>
                            
                        </ul>
                        <form class="d-flex my-2 my-lg-0">
                             <a
                                name=""
                                id=""
                                class="btn btn-primary"
                                href="export.php"
                                role="button"
                                >export</a
                            >
                            <a
                                name=""
                                id=""
                                class="btn btn-primary"
                                href="logout.php"
                                role="button"
                                >logout.php</a
                            >
                            
                        </form>
                    </div>
                </div>
            </nav>
            
        </header>
        <main>
            <div
                class="container"
            >
                <div
                class="row justify-content-center align-items-center g-2 mt-5"
            >
            <?php while ($row = $result->fetch_assoc()) {?>
                <div class="col-12 col-md-6 col-lg-4 mb-4"><div class="card border shadow rounded">
                    <img class="card-img-top" src="uploads/<?=$row["image"]?>" alt="Title" />
                    <div class="card-body">
                        <small>By <?= $row["property_name"]?></small><small><?=$row["created_at"] ?></small>
                        <h4 class="card-title"><?= $row["location"] ?></h4>
                        <p class="card-text"><?= $row["price"] ?></p>
                        <br>
                        <small>By <?= $row["property_type"]?></small>
                        <?php if ($_SESSION["id"] == $row["user_id"]) { ?>
                        <a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="edit.php?id=<?=$row["id"]?> "
                            role="button"
                            >edit</a
                        >
                        <a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="delete.php?id=<?=$row["id"]?>"
                            role="button"
                            >del</a
                        >
                        <?php }?>
                    </div>
                </div>
                </div>
                <?php }?>

                
            </div>
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

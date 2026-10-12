<?php
include "db.php"; 
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $user_id = $_SESSION["id"];
    $pname = $_POST["pname"];
    $location = $_POST["location"];
    $price = $_POST["price"];
    $ptype = $_POST["ptype"];
    $image_name = $_FILES[image][name];
    move_uploaded_file($_FILES[image][tmp_name],"uploads/$image_name");
    $sql = $conn->prepare("insert into poperties(user_id,property_name,location,price,property_type,image) values(?,?,?,?,?,?");
    $sql->bind_param("issdss",$user_id,$pname,$location,$price,$ptype,$image_name);
    if ($sql->execute()) {
        header("location:dashboard.php");
    }
}
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
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Property_Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="pname"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">location</label>
                        <input
                            type="text"
                            class="form-control"
                            name="location"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">price</label>
                        <input
                            type="text"
                            class="form-control"
                            name="price"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Property TYpe</label>
                        <input
                            type="text"
                            class="form-control"
                            name="ptype"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Choose file</label>
                        <input
                            
                            type="file"
                            class="form-control"
                            name="image"
                            id=""
                            placeholder=""
                            aria-describedby="fileHelpId"
                        />
                        <div id="fileHelpId" class="form-text">Help text</div>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
                    </button>
                    
                    
                    
                    
                    
                </form>
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

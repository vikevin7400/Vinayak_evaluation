<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $pass = password_hash($_POST["pass"],PASSWORD_BCRYPT);
    $sql = $conn->prepare("insert into users(full_name,email,password) values(?,?,?)");
    $sql->bind_param("sss",$fname,$email,$pass);
    if ($sql->execute()) {
        header("location:login.php");
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
            <!-- place navbar here -->
        </header>
        <main>
            <div
                class="container shadow rounded border col-5 mt-5 p-3"
            >
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="fname"
                            id="formId1"
                            placeholder=""
                        />
                        <label for="formId1">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="email"
                            id="formId1"
                            placeholder=""
                        />
                        <label for="formId1">email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="pass"
                            id="formId1"
                            placeholder=""
                        />
                        <label for="formId1">Password</label>
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

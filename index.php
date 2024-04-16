<?php
include __DIR__ . '/extensions/obj_PDO.php';

try {
    $query = 'SELECT * FROM libri';
    $statement = $pdo->prepare($query);
    $statement->execute();
} catch (PDOException $e) {
    die("Check the error message: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bookstore</title>
</head>

<body>

    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">BookStore!</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="form.php">Add a new Book!</a>
                                    </li>
                                </ul>
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!--STARTING THE CARDS-->
        <div class="container">
            <div class="row gap-3">
                <div>
                    <h3 class="col mt-4">
                        ALL BOOK CARDS
                        <small class="text-body-secondary">for you update or delete!</small>
                    </h3>
                </div>
                <div class="row">
                    <div>
                        <h3 class="col mb-3">
                            IF YOU WANT
                            <small class="text-body-secondary">Include a new book
                                <a href="form.php">RIGHT NOW!</a></small>

                        </h3>
                    </div>
                </div>

                <?php
                foreach ($statement as $row) {
                    echo "<div class='col-3'>
                    <div class='card' style='width: 18rem;'>
                    <div class='card-body'>
                    <h6 class='card-title'>{$row['titolo']}</h6>
                    <p class='m-1'>{$row['autore']}</p>
                    <p class='m-1'>{$row['anno_pubblicazione']}</p>
                    <p class='m-1'>{$row['genere']}</p>
                    <div class='d-flex gap-3 mt-2'>
                    <a href='http://localhost/progetto_settimanale%20PHP.01/form.php?id={$row['id']}'><button class='btn btn-warning'>Update</button></a>
                    <a href='http://localhost/progetto_settimanale%20PHP.01/delete.php?id={$row['id']}'><button class='btn btn btn-danger'>Delete</button></a>
                    </div>
                    </div>
                    </div>
                    </div>";
                }
                ?>
                <!-- <div class="col-3">
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                            <h6 class="card-title">Book title</h6>
                            <p class="m-1">author</p>
                            <p class="m-1">year of publication</p>
                            <p class="m-1">gender</p>
                            <div class="d-flex gap-3 mt-2">
                                <a href="#" class="btn btn-warning">Update</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div> -->



            </div>

        </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
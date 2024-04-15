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

    <!--FORM TO INSERT THE NEW BOOK-->
    <main>


        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $con = mysqli_connect('localhost', 'root', '', 'gestione_libreria');

            $stmt = $con->prepare("INSERT INTO libri (id, titolo, autore, anno_pubblicazione, genere) VALUES (NULL, ?, ?, ?, ?)");
            $stmt->bind_param("ssss", $titolo, $autore, $anno, $genere);

            $titolo = $_POST['titolo'];
            $autore = $_POST['autore'];
            $anno = $_POST['anno_pubblicazione'];
            $genere = $_POST['genere'];
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Contact Records Inserted";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            mysqli_close($con);
        }
        ?>

        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-8 mt-3">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="mb-3">
                            <label for="titolo" class="form-label">Nuovo titolo</label>
                            <input type="text" class="form-control" id="titolo" name="titolo">
                        </div>

                        <div class="mb-3">
                            <label for="autore" class="form-label">Autore</label>
                            <input type="text" class="form-control" id="autore" name="autore">
                        </div>

                        <div class="mb-3">
                            <label for="anno_pubblicazione" class="form-label">Anno di publicazione</label>
                            <input type="text" class="form-control" id="anno_pubblicazione" name="anno_pubblicazione">
                        </div>

                        <div class="mb-3">
                            <label for="genere" class="form-label">Genere</label>
                            <input type="text" class="form-control" id="genere" name="genere">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
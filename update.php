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
                    </div>
                    </div>
                    </div>
                    </div>";
}
?>
<?php include __DIR__ . '/extensions/obj_PDO.php'; ?>

<?php
$id = $_GET['id'];

try {
    $query = "DELETE FROM libri WHERE id=?";
    $statement = $pdo->prepare($query);
    $statement->execute([$id]);
} catch (PDOException $e) {
    die("Check the error message: " . $e->getMessage());
}

header('Location:index.php')

?>
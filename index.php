<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="./style.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
 <header class="d-flex justify-content-center">
<p class="p-2">I NOSTRI HOTEL</p>
 </header><?php 
$hotels = [
[
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

$parkingValue = $_GET["parking"] ?? "";
$votoValue = $_GET["voto"] ?? "";

$withParking = false;
if ($parkingValue == "on") {
$withParking = true;
}
$minVote = 0;
if ($votoValue !== "") {
   $minVote  = (int)$votoValue;
}



$colCard  = "";
foreach ($hotels as $hotel) {
if ($withParking == true) {
if ($hotel["parking"] == false) {
    continue;
}
}
if ($hotel["vote"] <  $minVote){
     continue;
}

$colCard .= '<div class = "col">'. '<div class="card  p-3">';
foreach ($hotel as $key => $value) {
if ($key == "parking") {
 $value =  $value == true ? "Vero" : "Falso";
}
$colCard .= '<p>'. $key. ": ". '<strong>'. $value. '</strong>'. '</p>';
}
$colCard .= '</div>'. '</div>';
} 

?>
<main>
<div class="container">
<form class="p-4 mb-4 bg-white rounded shadow-sm" action="./index.php" method="GET">
    <h5 class="mb-3 text-center">Filtra</h5>
    <div class="form-check mb-3 d-flex justify-content-center align-items-center gap-2">
        <input class="form-check-input m-0" type="checkbox" name="parking" id="parking" <?php echo $parkingValue == "" ? "" : "checked" ?>>
        <label class="form-check-label" for="parking">
            Solo con parcheggio
        </label>
    </div>
    <div class="mb-3">
    <label for="voto" class="form-label d-block text-center">Voto minimo (1-5):</label>
    <input type="number" name="voto" id="voto" class="form-control" min="1" max="5" placeholder="Es. 3" value="<?php echo $votoValue ?>">
    </div>

   <div class="text-center"><button type="submit" class="btn btn-success w-50">Applica Filtri</button></div>
   <div class="text-center"><a href="index.php" class="mt-2 btn btn-secondary w-50">Azzera filtri</a></div>
</form>
<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-gap-3">
<?php echo $colCard?>

</div>
</div>
</main> 
</body>
</html>
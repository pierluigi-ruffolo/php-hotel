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
 </header>  
<?php 
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

$colCard  = "";
foreach ($hotels as $hotel) {

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
<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-gap-3">
<?php echo $colCard?>

</div>
</div>
</main> 
</body>
</html>
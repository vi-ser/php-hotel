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

    $filteredHotels = [];
    $vote = $_GET['vote'];

    // verifico se la checkbox sia stata selezionata
    if (isset($_GET['parking']) && $_GET['parking'] == true) {
    // filtro gli hotel con parcheggio disponibile e voto maggiore o uguale al voto selezionato dall'utente
    foreach ($hotels as $currentHotel) {
        if ($currentHotel['parking'] == true && ($vote === 'Voto' || $currentHotel['vote'] >= $vote)) {
            $filteredHotels[] = $currentHotel;
        }
    }
    } else {
    // se la checkbox non è stata selezionata, mostriamo solo gli hotel con un voto maggiore o uguale al voto selezionato dall'utente
    foreach ($hotels as $currentHotel) {
        if ($vote === 'Voto' || $currentHotel['vote'] >= $vote) {
            $filteredHotels[] = $currentHotel;
        }
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricerca Hotel</title>

     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<div class="container p-5 mt-5">
    <h1 class="mb-5">Filtri Hotel</h1>

    <form action="hotel-filtered.php" class="mb-4 d-flex align-items-center gap-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="true" id="parking" name="parking">
            <label class="form-check-label" for="parking">
              Parcheggio
            </label>
        </div>
        <select class="form-select" aria-label="Default select example" name="vote">
            <option selected>Voto</option>
            <option value="1">1+</option>
            <option value="2">2+</option>
            <option value="3">3+</option>
            <option value="4">4+</option>
            <option value="5">5</option>
        </select>
        <input type="submit" value="Filtra" class="btn btn-primary">
    </form>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Parcheggio</th>
                <th>Voto</th>
                <th>Distanza dal centro</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach($filteredHotels as $currentHotel) { ?>
            <tr>
                <td><?php echo $currentHotel['name']; ?></td>
                <td><?php echo $currentHotel['description']; ?></td>
                <td><?php echo $currentHotel['parking'] ? 'Si' : 'No'; ?></td>
                <td><?php echo $currentHotel['vote']; ?></td>
                <td><?php echo $currentHotel['distance_to_center']; ?> km</td>
            </tr>
                </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
    
 <!-- bootstrap -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
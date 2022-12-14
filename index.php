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
$park = 'Available';
$no_park = 'Unavailable';

$select_parking = isset($_GET['select_parking']);
$vote = $_GET['vote'];

if ($select_parking) {
    $hotels = hotelsWithParking($hotels, $park, $vote);
}


function hotelsWithParking($hotels, $park, $vote)
{
    $newHotelsList = [];
    foreach ($hotels as $hotel) {
        if ($hotel['parking'] == $park && $hotel['vote'] >= $vote) {
            array_push($newHotelsList, $hotel);
        }
    }
    return $newHotelsList;
}
//var_dump($hotels);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center py-3 text-primary">Hotels</h1>
        <div class="form_box py-5 px-5">
            <h2 class="text-secondary mb-3">Filters</h2>
            <form action="index.php" method="get">
                <div class="select mb-3">
                    <select class="form-select w-25" name="select_parking" id="select_parking">
                        <option selected>Choose</option>
                        <option value="true">Parking</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="vote" class="form-label text-secondary"><strong>Hotel ratings:</strong></label>
                    <input type="number" class="form-control w-25" name="vote" id="vote">
                </div>
                <button class="btn btn-primary" type="submit">Filter</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) : ?>
                    <tr>
                        <th scope="row"> <?php echo $hotel['name'] ?> </th>
                        <td> <?php echo $hotel['description'] ?> </td>
                        <td> <?php if ($hotel['parking'] == 1) {
                                    echo $park;
                                } else {
                                    echo $no_park;
                                } ?> </td>
                        <td> <?php echo $hotel['vote'] ?> </td>
                        <td> <?php echo $hotel['distance_to_center'] ?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
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
        'parking' => false,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <h1>I nostri Hotel</h1>

    <h5>Filter</h5>
    <?php
        $park_var = '';
        $vote_var = '';

        if(isset($_GET['park']) || isset($_GET['vote'])) {
        $park_var = $_GET['park'];
        $vote_var = $_GET['vote'];
        //Process further
        }
    ?>
    <form action="index.php" method="GET" class="d-flex justify-content-center">
        <select class="form-select" aria-label="Default select example" name="park">
            <option value="" <?php echo ($park_var === '' ? 'selected="selected"' : '')?>>NO Filter</option>
            <option value="false" <?php echo ($park_var === 'false' ? 'selected="selected"' : '')?>>NO</option>
            <option value="true" <?php echo ($park_var === 'true' ? 'selected="selected"' : '')?>>YES</option>
        </select>

        <select class="form-select" aria-label="Default select example" name="vote">
            <option value="" <?php echo ($vote_var === '' ? 'selected="selected"' : '')?>>NO Filter</option>
            <option value="1" <?php echo ($vote_var === '1' ? 'selected="selected"' : '')?>>1</option>
            <option value="2" <?php echo ($vote_var === '2' ? 'selected="selected"' : '')?>>2</option>
            <option value="3" <?php echo ($vote_var === '3' ? 'selected="selected"' : '')?>>3</option>
            <option value="4" <?php echo ($vote_var === '4' ? 'selected="selected"' : '')?>>4</option>
            <option value="5" <?php echo ($vote_var === '5' ? 'selected="selected"' : '')?>>5</option>
        </select>

        <button action="index.php">send</button>
    </form>
    

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Hotel Name</th>
            <th scope="col">Vote</th>
            <th scope="col">Description</th>
            <th scope="col">Distance to Center</th>
            <th scope="col">Parking</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($hotels as $hotel) { ?>
                <?php if((empty($_GET['park']) || ($_GET['park'] === 'true') === $hotel['parking']) && (empty($_GET['vote']) || intval($_GET['vote']) === $hotel['vote'])) { ?>
                    <tr>
                    <td><h6><?php echo $hotel['name']; ?></h6></td>
                    <td><?php echo $hotel['vote']; ?></td>
                    <td><?php echo $hotel['description']; ?></td>
                    <td><?php echo $hotel['distance_to_center']; ?></td>
                    <?php if ($hotel['parking'] === true) { ?>
                        <td>YES</td>
                    <?php } else { ?>
                        <td>NO</td>
                    <?php } ?>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
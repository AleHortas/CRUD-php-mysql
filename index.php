<?php
require_once('db.php');
require_once('APIHandler.php');

$apiHandler = new APIHandler($conn);
$response = $apiHandler->handleGet();

$movies = json_decode($response, true)['movies_table'];


//header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Expires: 0');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies DB</title>
    <?php include('theme/header-scripts.php'); ?>
</head>

<body>
    <?php include('./theme/header.php'); ?>

    <div class="container-fluid">
        <h1>Welcome 🌞</h1>

        <?php include('./theme/insert-ui.php'); ?>

        <h2>Dashboard</h2>
        <table class="table datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Poster</th>
                    <th>Series Title</th>
                    <th>Released Year</th>
                    <th>Runtime</th>
                    <th>Genre</th>
                    <th>IMDB Rating</th>
                    <th>Overview</th>
                    <th>Director</th>
                    <th>Star1</th>
                    <th>Star2</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            <tbody>
                <!-- if $movies is an array and has elements in it, it loops through each movie in the array using foreach($array as $variable-that-will-be-filled-with-the-array-element['specify']).-->
                <?php if (is_array($movies) && count($movies) > 0): ?>
                    <?php foreach ($movies as $movie): ?>
                        <tr>
                            <td><?php echo $movie['id']; ?></td>
                            <td><img src="<?php echo $movie['poster_link']; ?>" alt="Poster of <?php echo $movie['series_title']; ?>" style="width:100px; height:auto;"></td>
                            <td><?php echo $movie['series_title']; ?></td>
                            <td><?php echo $movie['released_year']; ?></td>
                            <td><?php echo $movie['runtime']; ?></td>
                            <td><?php echo $movie['genre']; ?></td>
                            <td><?php echo $movie['imdb_rating']; ?></td>
                            <td><?php echo $movie['overview']; ?></td>
                            <td><?php echo $movie['director']; ?></td>
                            <td><?php echo $movie['star1']; ?></td>
                            <td><?php echo $movie['star2']; ?></td>
                            <td class="text-right">
                                <a href="#" title="Edit this record">Update</a>
                                <a href="#" class="text-danger" title="Delete this record" onClick="return confirm('This will delete it permanentrly');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php include('theme/footer-scripts.php') ?>
</body>

</html>
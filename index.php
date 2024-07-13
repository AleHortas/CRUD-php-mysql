<?php
require_once('db.php');
require_once('APIHandler.php');

$apiHandler = new APIHandler($conn);
$response = $apiHandler->handleGet();

$movies = json_decode($response, true)['movies_table'];

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
    <link rel="icon" type="image/x-icon" href="/cac_final/assets/img/favicon.ico">
    <?php include('theme/header-scripts.php'); ?>
</head>

<body>
    <?php include('./theme/header.php'); ?>

    <div class="container-fluid">
        <span id="direct"></span>
        <h1>Movies Database</h1>

        <?php include('./theme/form.php'); ?>

        <h2>Dashboard</h2>
        <table class="table table-hover">
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
                <?php if (is_array($movies) && count($movies) > 0) : ?>
                    <?php foreach ($movies as $movie) : ?>
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
                                <a href="#direct" title="Edit this record" onclick="fillForm(<?php echo $movie['id']; ?>,
                                                                                      '<?php echo addslashes($movie['poster_link']); ?>',
                                                                                      '<?php echo addslashes($movie['series_title']); ?>',
                                                                                      '<?php echo addslashes($movie['released_year']); ?>', 
                                                                                      '<?php echo addslashes($movie['runtime']); ?>',
                                                                                      '<?php echo addslashes($movie['genre']); ?>',
                                                                                      '<?php echo addslashes($movie['imdb_rating']); ?>',
                                                                                      '<?php echo addslashes($movie['overview']); ?>',
                                                                                      '<?php echo addslashes($movie['director']); ?>',
                                                                                      '<?php echo addslashes($movie['star1']); ?>',
                                                                                      '<?php echo addslashes($movie['star2']); ?>');">Update</a>
                                <a href="" class="text-danger" title="Delete this record" class="text-danger" onclick="deleteMovie(<?php echo $movie['id']; ?>)">Delete</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <footer class="border-top p-4">
        <div class="card">
            <div class="card-body">
                <blockquote class="blockquote mb-0 fs-6 fw-light text-secondary">
                    <p class="user-select-none">Everything comes to an end, and so does this page.</p>
                </blockquote>
            </div>
        </div>
    </footer>
    <?php include('theme/footer-scripts.php') ?>
    <script src="./js/api.js"></script>
</body>

</html>
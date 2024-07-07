<?php
include 'Movies.php';

class APIHandler
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function handleRequest()
    {


        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->handleGet();
                break;
            case 'POST':
                $this->handlePost();
                break;
            case 'PUT':
                $this->handlePut();
                break;
            case 'DELETE':
                $this->handleDelete();
                break;
            default:
                http_response_code(405);
                echo json_encode(['message' => 'Method not allowed']);
                break;
        }
    }

    public function handleGet()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        //if id is greater than 0 it fetches the movie, otherwise return all movies again
        if ($id > 0) {
            $stmt = $this->conn->prepare("SELECT * FROM movies_table WHERE id = ?");
            $stmt->execute([$id]);
            $movie = $stmt->fetch(PDO::FETCH_ASSOC);

            // if movie is found it is converted to an object and return it in JSON, otherwise it returns error
            if ($movie) {
                $movieObject = Movies::fromArray($movie);
                return json_encode($movieObject->toArray());
            } else {
                http_response_code(404);
                return json_encode(['message' => 'No data found']);
            }
        } else {
            $stmt = $this->conn->query("SELECT * FROM movies_table");
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // convert the movies into objects and return JSON
            $movieObjects = array_map(fn ($movie) => Movies::fromArray($movie)->toArray(), $movies);
            return json_encode(['movies_table' => $movieObjects]);
        }
    }

    public function handlePost()
    {
        // check if data is sent
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['message' => 'Method not allowed']);
            return;
        }

        // extract data from POST
        $poster_link = $_POST['poster_link'] ?? '';
        $series_title = $_POST['series_title'] ?? '';
        $released_year = $_POST['released_year'] ?? '';
        $runtime = $_POST['runtime'] ?? '';
        $genre = $_POST['genre'] ?? '';
        $imdb_rating = $_POST['imdb_rating'] ?? '';
        $overview = $_POST['overview'] ?? '';
        $director = $_POST['director'] ?? '';
        $star1 = $_POST['star1'] ?? '';
        $star2 = $_POST['star2'] ?? '';

        // validate required fields
        $requiredFields = ['poster_link', 'series_title', 'released_year', 'runtime', 'genre', 'imdb_rating', 'overview', 'director', 'star1', 'star2'];
        foreach ($requiredFields as $field) {
            if (empty($$field)) {
                http_response_code(400);
                echo json_encode(['message' => 'Movie data is incomplete']);
                return;
            }
        }

        // insert into database
        try {
            $stmt = $this->conn->prepare("INSERT INTO movies_table (poster_link, series_title, released_year, runtime, genre, imdb_rating, overview, director, star1, star2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$poster_link, $series_title, $released_year, $runtime, $genre, $imdb_rating, $overview, $director, $star1, $star2]);

            http_response_code(201);
            echo json_encode(['message' => 'Movie has been created successfully']);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['message' => 'Error while creating the new movie', 'error' => $e->getMessage()]);
        }
    }


    public function handlePut()
    {
    }

    public function handleDelete()
    {
    }
}

$apiHandler = new APIHandler($conn);
$apiHandler->handleRequest();

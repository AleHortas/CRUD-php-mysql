<?php
class Movies
{
    // these represent the db fields
    public $id, $poster_link, $series_title, $released_year, $runtime, $genre,
        $imdb_rating, $overview, $director, $star1, $star2;

    // the constructor initialize the object properties
    public function __construct($id, $poster_link, $series_title, $released_year, $runtime, $genre, $imdb_rating, $overview, $director, $star1, $star2)
    {
        $this->id = $id;
        $this->poster_link = $poster_link;
        $this->series_title = $series_title;
        $this->released_year = $released_year;
        $this->runtime = $runtime;
        $this->genre = $genre;
        $this->imdb_rating = $imdb_rating;
        $this->overview = $overview;
        $this->director = $director;
        $this->star1 = $star1;
        $this->star2 = $star2;
    }

    // this takes $data and creates a new Class object that contains the values from $data
    public static function fromArray($data)
    {
        // data will contain the data recieved OR returns null
        return new self(
            $data['id'] ?? null,
            $data['poster_link'] ?? null,
            $data['series_title'] ?? null,
            $data['released_year'] ?? null,
            $data['runtime'] ?? null,
            $data['genre'] ?? null,
            $data['imdb_rating'] ?? null,
            $data['overview'] ?? null,
            $data['director'] ?? null,
            $data['star1'] ?? null,
            $data['star2'] ?? null
        );
    }


    // converts the object to an array 
    public function toArray()
    {
        return get_object_vars($this);
    }
}
?>
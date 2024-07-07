<section class="insert-ui">
    <h2>Insert</h2>
    <form action="" method="post">

        <!-- name value must match db-->
        <div class="row">
            <div class="col-md-6">
                <label for="poster_link">Poster</label>
                <input type="text" name="poster_link" id="poster_link" class="form-control">
                <br>
            </div>
            <div class="col-md-6">
                <label for="series_title">Movie Name</label>
                <input type="text" name="series_title" id="series_title" class="form-control">
                <br>
            </div>
            <div class="col-md-6">
                <label for="released_year">Release</label>
                <input type="text" name="released_year" id="released_year" class="form-control">
                <br>
            </div>
            <div class="col-md-6">
                <label for="runtime">Runtime</label>
                <input type="text" name="runtime" id="runtime" class="form-control">
                <br>
            </div>
            <div class="col-md-6">
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control">
                <br>
            </div>
            <div class="col-md-6">
                <label for="imdb_rating">IMDB Rating</label>
                <input type="text" name="imdb_rating" id="imdb_rating" class="form-control">
                <br>
            </div>
            <div class="col-md-6">
                <label for="overview">Overview</label>
                <input type="text" name="overview" id="overview" class="form-control">
                <br>
            </div>
            <div class="col-md-6">
                <label for="director">Director</label>
                <input type="text" name="director" id="director" class="form-control">
                <br>
            </div>
            <div class="col-md-6">
                <label for="star1">Star 1</label>
                <input type="text" name="star1" id="star1" class="form-control">
                <br>
            </div>
            <div class="col-md-6">
                <label for="star2">Star 2</label>
                <input type="text" name="star2" id="star2" class="form-control">
                <br>
            </div>
        </div>

        <button name="btnInsert" class="btn btn-primary">Insert Record</button>
    </form>
</section>
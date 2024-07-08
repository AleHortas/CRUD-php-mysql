<section class="insert-ui">
    <h2>Insert</h2>
    <form id="movieForm" action="" method="post" class="needs-validation" novalidate>

        <!-- name value must match db-->
        <div class="row">
            <div class="col-md-6">
                <label for="poster_link" class="form-label">Poster URL</label>
                <input type="text" name="poster_link" id="poster_link" class="form-control" required>
                <div class="invalid-feedback"> Poster URL is required</div>
                <br>
            </div>
            <div class="col-md-6">
                <label for="series_title" class="form-label">Movie Name</label>
                <input type="text" name="series_title" id="series_title" class="form-control" required>
                <div class="invalid-feedback"> Movie Name is required</div>
                <br>
            </div>
            <div class="col-md-6">
                <label for="released_year" class="form-label">Release</label>
                <input type="text" name="released_year" id="released_year" class="form-control" required>
                <div class="invalid-feedback"> Release is required</div>
                <br>
            </div>
            <div class="col-md-6">
                <label for="runtime" class="form-label">Runtime</label>
                <input type="text" name="runtime" id="runtime" class="form-control" required>
                <div class="invalid-feedback"> Runtime is required</div>
                <br>
            </div>
            <div class="col-md-6">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control" required>
                <div class="invalid-feedback"> Genre is required</div>
                <br>
            </div>
            <div class="col-md-6">
                <label for="imdb_rating" class="form-label">IMDB Rating</label>
                <input type="text" name="imdb_rating" id="imdb_rating" class="form-control" required>
                <div class="invalid-feedback"> IMDB Rating is required</div>
                <br>
            </div>
            <div class="col-md-6">
                <label for="overview" class="form-label">Overview</label>
                <input type="text" name="overview" id="overview" class="form-control" required>
                <div class="invalid-feedback"> Overview is required</div>
                <br>
            </div>
            <div class="col-md-6">
                <label for="director" class="form-label">Director</label>
                <input type="text" name="director" id="director" class="form-control" required>
                <div class="invalid-feedback"> Director is required</div>
                <br>
            </div>
            <div class="col-md-6">
                <label for="star1" class="form-label">Star 1</label>
                <input type="text" name="star1" id="star1" class="form-control" required>
                <div class="invalid-feedback"> Star 1 is required</div>
                <br>
            </div>
            <div class="col-md-6">
                <label for="star2" class="form-label">Star 2</label>
                <input type="text" name="star2" id="star2" class="form-control" required>
                <div class="invalid-feedback"> Star 2 is required</div>
                <br>
            </div>
        </div>

        <button name="btnInsert" class="btn btn-primary">Insert Record</button>
    </form>
</section>
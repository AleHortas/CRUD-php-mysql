function deleteMovie(movieId) {
    if (confirm('Are you sure you want to delete this movie?')) {
        fetch(`index.php?id=${movieId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            alert(data.message);
            location.reload();
        })
    }
}

// fill the form with the id provided
function fillForm(id, poster_link, series_title, released_year, runtime, genre, imdb_rating, overview, director, star1, star2) {
    document.getElementById('id').value = id;
    document.getElementById('poster_link').value = poster_link;
    document.getElementById('series_title').value = series_title;
    document.getElementById('released_year').value = released_year;
    document.getElementById('runtime').value = runtime;
    document.getElementById('genre').value = genre;
    document.getElementById('imdb_rating').value = imdb_rating;
    document.getElementById('overview').value = overview;
    document.getElementById('director').value = director;
    document.getElementById('star1').value = star1;
    document.getElementById('star2').value = star2;
}

function createMovie() {
    const form = document.getElementById('movieForm');
    const formData = new FormData(form);
    
    fetch('index.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.message === 'Movie has been created successfully') {
            location.reload(); // reload page
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function updateMovie() {
    const form = document.getElementById('movieForm');
    const formData = new FormData(form);
    
    // coverts FormData to JSON
    const jsonData = {};
    formData.forEach((value, key) => {
        jsonData[key] = value;
    });

    const id = document.getElementById('id').value;

    fetch(`index.php?id=${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(jsonData),
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.message === 'Movie updated successfully') {
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

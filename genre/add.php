<?php
/*
* Project Name: Film Suggestion Database (FSDB)
* Developed by Meshu Deb Nath
*/
require '../dbconnection.php';

$film_title = '';
$release_year = '';
if (isset($_GET['film_title'])) {
    $film_title = $_GET['film_title'];
}
if (isset($_GET['release_year'])) {
    $release_year = $_GET['release_year'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $genre_title = test_input($_POST["genre_title"]);
    $genre_id = time();
    pg_query($db_handle, "SELECT add_genre('{$genre_id}','{$genre_title}','{$film_title}','{$release_year}')");
    header("Location: ../genre/");
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strtolower($data);
    return $data;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FSDB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <!-- Header -->
    <div class="container bodyContainer">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">

                <div class="row">
                    <div class="menu ">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="container-fluid">
                                <a class="navbar-brand menubrand" href="/fsdb">FSDB</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                            </div>
                        </nav>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="header">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/fsdb">Home</a></li>
                                <li class="breadcrumb-item"><a href="../">Films</a></li>
                                <li class="breadcrumb-item"><a href="../genre">Genres</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@ Add Genre</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- input form -->
                <form action="" method='POST'>

                    <div class="mb-3">
                        <label for="film_title" class="form-label">Film</label>

                        <input type="text" class="form-control" name="film_title" value='<?php echo $film_title; ?>' disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="genre_title">Genres</label>
                        <select class="form-select" name="genre_title">
                            <?php
                            $genreList = array("Action", "Adventure", "Comedy", "Crime", "Fantasy", "Historical", "Horror", "Romance", "SciFi", "Cyberpunk", "Thriller", "Other");
                            $length = sizeof($genreList);
                            $row = 0;
                            while ($row < $length) {
                            ?>
                                <option value='<?php echo $genreList[$row]; ?>'><?php echo $genreList[$row]; ?></option>
                            <?php $row++;
                            } ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
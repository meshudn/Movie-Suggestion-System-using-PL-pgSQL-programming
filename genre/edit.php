<?php
/*
* Project Name: Film Suggestion Database (FSDB)
* Developed by Meshu Deb Nath
*/
require '../dbconnection.php';

$genre_id = 0;
if (isset($_GET['id'])) {
    $genre_id = $_GET['id'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $film_title = test_input($_POST["film_title"]);
    $genre_title = test_input($_POST["genre_title"]);
    $release_year = test_input($_POST["release_year"]);
    pg_query($db_handle, "SELECT edit_genre('{$genre_id}','{$genre_title}','{$film_title}','{$release_year}')");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                            </div>
                        </nav>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="header">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/fsdb">Home</a></li>
                                <li class="breadcrumb-item"><a href="../">Films</a></li>
                                <li class="breadcrumb-item"><a href="../genre">Genres</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@ Edit Genre</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- input form -->
                <form action="" method='POST'>
                    <?php
                        $result = pg_query($db_handle, "SELECT * from genres where genre_id = " .$genre_id);
                        while ($row = pg_fetch_assoc($result)) {
                            ?>
                    <input type="text" name="film_title" value='<?php echo $row['film_title']; ?>' hidden>
                    <input type="text" name="genre_id" value='<?php echo $row['genre_id']; ?>' hidden>
                    <input type="text" name="release_year" value='<?php echo $row['release_year']; ?>' hidden>
                    <input type="text" name="genre_title" value='<?php echo $row['genre_title']; ?>' hidden>

                    <div class="mb-3">
                        <label for="film_title">Film Title</label>
                        <input type="text" class="form-control" name="film_title"
                            value='<?php echo $row['film_title']; ?>' disabled>

                    </div>
                    <div class="mb-3">
                        <label for="genre_title">Genres</label>
                        <select class="form-select" name="genre_title">
                            <?php 
                                  $genreList = array("action", "adventure", "comedy", "crime", "fantasy", "historical", "horror", "romance", "scifi", "cyberpunk", "thriller", "other");
                                  $length = sizeof($genreList);
                                  $index = 0;
                                  while ($index < $length) {
                            ?>
                               <option value='<?php echo $genreList[$index]; ?>' <?php if($row['genre_title'] == $genreList[$index]) echo 'selected'; ?>><?php echo $genreList[$index]; ?></option>
                            <?php $index++;} ?>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>

                    <?php
                    }
                    ?>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
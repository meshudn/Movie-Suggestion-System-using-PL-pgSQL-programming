<?php
/*
* Project Name: Film Suggestion Database (FSDB)
* Developed by Meshu Deb Nath
*/
require '../dbconnection.php';

$user_name = '';
$suggested_film = '';
if (isset($_GET['user_name'])) {
    $user_name = $_GET['user_name'];
}
$query_result_2 = pg_query($db_handle, "SELECT array_to_json(film_suggestion) as film FROM film_suggestion('{$user_name}')");
    while ($row_1 = pg_fetch_assoc($query_result_2)) {
           $suggested_film = json_decode($row_1['film']);
    }
// var_dump($suggested_film);
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
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ms-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="../film/">Films</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="../user/">Logout</a>
                                        </li>

                                    </ul>
                                </div>
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
                                <li class="breadcrumb-item"><a href="../user/">Users</a></li>
                                <li class="breadcrumb-item active dark-font" aria-current="page">@ Film Suggestion</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Suggested Film</th>
                            <th scope="col">Release Year</th>
                            <th scope="col">Production Country</th>
                            <th scope="col">Age Limit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for($index = 0; $index < sizeof($suggested_film); $index++){
                                $query_result = pg_query($db_handle, "SELECT *from films WHERE films.film_title ='".$suggested_film[$index]."'");
                            
                                 while ($row = pg_fetch_assoc($query_result)) {
                                    echo "<tr><td>" . $row['film_title'] . "</td>";
                                    echo "<td>" . $row['release_year'] . "</td>";
                                    echo "<td>" . $row['production_country'] . "</td>";
                                    echo "<td>" . $row['age_limit'] . "</td>";
                                    echo "
                                    </tr>";
                                }
                            }
        
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
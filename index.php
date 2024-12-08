<?php

$movies = [
    ["id" => 1, "title" => "Alien: Romulus", "thumbnail" => "assets/images/poster_alien.jpg", "trailer" => "https://www.youtube.com/embed/ySB_5YucOu4?si=jsL-wD-9XdQC5XdV"],
    ["id" => 2, "title" => "The Batman", "thumbnail" => "assets/images/poster_batman.jpg", "trailer" => "https://www.youtube.com/embed/NrJRE678TiU?si=zooeJst_Hlyr9x4q"],
    ["id" => 3, "title" => "Don't Breathe", "thumbnail" => "assets/images/poster_dontbreathe.jpg", "trailer" => "https://www.youtube.com/embed/76yBTNDB6vU?si=gecxwi6hNsjF6hqP"],
    ["id" => 4, "title" => "Hello, Love, Goodbye", "thumbnail" => "assets/images/poster_hellolove.jpg", "trailer" => "https://www.youtube.com/embed/ytFpt3hGrqw?si=yPSMlL2wcbSO4WL8"],
    ["id" => 5, "title" => "Incantation", "thumbnail" => "assets/images/poster_incantation.jpg", "trailer" => "https://www.youtube.com/embed/HnyNZdcL_GY?si=gagcGT_E3UFi9_ZW"],
    ["id" => 6, "title" => "Parasite", "thumbnail" => "assets/images/poster_parasite.jpg", "trailer" => "https://www.youtube.com/embed/SEUXfv87Wpk?si=jwYcgyWEeDtMqUWd"],
    ["id" => 7, "title" => "A Quiet Place: Day One", "thumbnail" => "assets/images/poster_quietplace.jpg", "trailer" => "https://www.youtube.com/embed/MLkdY8SQ2Es?si=6oT3JXaKqF3oXMx4"],
    ["id" => 8, "title" => "Spaceman", "thumbnail" => "assets/images/poster_spaceman.jpg", "trailer" => "https://www.youtube.com/embed/rNZ0xKaCdus?si=vixchtChB4reT0ZK"],
    ["id" => 9, "title" => "Thanksgiving", "thumbnail" => "assets/images/poster_thanksgiving.jpg", "trailer" => "https://www.youtube.com/embed/OHWiTwH53lU?si=qv7h7xndn312hu1V"],
    ["id" => 10, "title" => "The Platform", "thumbnail" => "assets/images/poster_theplatform.jpg", "trailer" => "https://www.youtube.com/embed/RlfooqeZcdY?si=nbs09qAN2Xr19pW5"],
    ["id" => 11, "title" => "Uncharted", "thumbnail" => "assets/images/poster_uncharted.jpg", "trailer" => "https://www.youtube.com/embed/eHp3MbsCbMg?si=_RPkhBaqANlOlmqr"],
    ["id" => 12, "title" => "Violent Night", "thumbnail" => "assets/images/poster_violent.jpg", "trailer" => "https://www.youtube.com/embed/a53e4HHnx_s?si=sThbK1h4SCkoKuMx"],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pick N' Play</title>
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg py-0">
                <a class="navbar-brand" href="#">
                    <img src="assets/images/website_logo.png" alt="Logo">
                    Pick n' Play
                </a>
            </nav>
        </div>
    </header>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div id="featuredCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $isActive = true;
            shuffle($movies);
            foreach ($movies as $movie):
                if ($movie['id'] > 10) break;
            ?>
                <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
                    <img src="<?= $movie['thumbnail'] ?>" class="d-block w-100" alt="<?= $movie['title'] ?>" style="height: 500px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= $movie['title'] ?></h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#trailerModal" data-trailer-url="<?= $movie['trailer'] ?>">
                            View Trailer
                        </button>
                    </div>
                </div>
            <?php
                $isActive = false;
            endforeach;
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#featuredCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#featuredCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Modal for Trailer -->
    <div class="modal fade" id="trailerModal" tabindex="-1" aria-labelledby="trailerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="trailerModalLabel">Movie Trailer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="trailerFrame" width="100%" height="400" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <?php foreach ($movies as $movie): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="<?= $movie['thumbnail'] ?>" class="card-img-top" alt="<?= $movie['title'] ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $movie['title'] ?></h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#trailerModal" data-trailer-url="<?= $movie['trailer'] ?>">
                                View Trailer
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript to update iframe src with the movie's trailer URL when a button is clicked
        document.addEventListener('DOMContentLoaded', function() {
            const trailerButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
            const trailerFrame = document.getElementById('trailerFrame');

            trailerButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const trailerUrl = this.getAttribute('data-trailer-url');
                    const embedUrl = trailerUrl.replace("https://youtu.be/", "https://www.youtube.com/embed/");
                    trailerFrame.src = embedUrl;
                });
            });

            // Clear iframe source when modal is closed
            const modal = document.getElementById('trailerModal');
            modal.addEventListener('hidden.bs.modal', function() {
                trailerFrame.src = '';
            });
        });
    </script>

    <footer>
        <div class="container">
            <div class="row justify-content-between align-items-center py-4">
                <div class="col-md-4">
                    <div class="footer-logo">
                        <img src="assets/images/website_logo.png" alt="Logo" width="60" height="60">
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <p>&copy; 2024 Pick N' Play. All Rights Reserved.</p>
                </div>
                <div class="col-md-4 text-end">
                    <ul class="list-unstyled d-flex justify-content-end">
                        <li><a href="#" class="text-decoration-none me-3">Privacy Policy</a></li>
                        <li><a href="#" class="text-decoration-none me-3">Terms of Service</a></li>
                        <li><a href="#" class="text-decoration-none">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
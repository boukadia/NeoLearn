<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours en ligne - Introduction à JavaScript</title>
    <!-- <link rel="stylesheet" href="../../assests/css/style.css"> -->

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .video-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            background-color: #000;
        }

        .video-placeholder {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .course-details {
            padding: 30px;
        }

        .course-title {
            font-size: 2em;
            color: #333;
            margin-bottom: 15px;
        }

        .instructor {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .instructor-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #ddd;
            margin-right: 15px;
        }

        .instructor-info h3 {
            color: #444;
            margin-bottom: 5px;
        }

        .instructor-info p {
            color: #666;
            font-size: 0.9em;
        }

        .course-description {
            color: #555;
            margin-bottom: 25px;
            line-height: 1.8;
        }

        .course-meta {
            display: flex;
            gap: 30px;
            margin-bottom: 25px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            color: #666;
        }

        .meta-item img {
            width: 20px;
            margin-right: 8px;
        }

        .progress-bar {
            background-color: #eee;
            height: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .progress {
            width: 45%;
            height: 100%;
            background-color: #4CAF50;
            border-radius: 5px;
        }

        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .course-details {
                padding: 20px;
            }

            .course-title {
                font-size: 1.5em;
            }

            .course-meta {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="video-container">
            <div class="video-wrapper">
                <div class="video-placeholder">
                    <img src="../../assests/images/react.png" alt="Vidéo du cours">
                </div>
            </div>
            <div class="course-details">
                <h1 class="course-title">Introduction</h1>

                <div class="instructor">
                    <div class="instructor-avatar">
                        <img style="width: 50px; border-radius:50%;height:50px " src="../../assests/images/react.png" alt="Photo de l'instructeur">
                    </div>
                    <div class="instructor-info">
                        <h3>Pr</h3>
                        <p>Developpeure</p>
                    </div>
                </div>

                <p class="course-description">
                    Découvrez les fondamentaux de JavaScript
                </p>
               

                <a href="#" class="cta-button">Continuer le cours</a>
            </div>
        </div>
    </div>
</body>

</html>
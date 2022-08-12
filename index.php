<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include "header.php" ?>
    <style>
        /* home css */
        .home-bg {
            background: linear-gradient(90deg, var(--white), transparent 70%), url(img/home-bg.jpg) no-repeat;
            background-size: cover;
            background-position: center;
        }

        .home-bg .home {
            min-height: 70rem;
            display: flex;
            align-items: center;
        }

        .home-bg .home .content {
            width: 50rem;
            text-align: center;
        }

        .home-bg .home .content h3 {
            font-size: 6rem;
            color: var(--black);
            font-family: 'Merienda One', cursive;
        }

        .home-bg .home .content p {
            padding: 1rem 0;
            font-size: 1.6rem;
            color: var(--black);
            line-height: 2d;

        }
    </style>
    <div class="home-bg">
        <section class="home" id="home">
            <div class="content">
                <h3>My Shopp</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum iure quod magni ipsum reprehenderit</p>
                <a href="#about" class="btn">About Us</a>
            </div>

        </section>
    </div>
</body>

</html>
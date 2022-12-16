<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- google font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Sistem Informasi Limbah</title>
</head>

<body>
    <header data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-duration="1000" id="header">
        <nav>
            <div class="logo">
                <i class="fa-solid fa-dumpster-fire"></i>
                <div>SI Limbah <Span>Skincare</Span></div>
            </div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#waste">Waste</a></li>
            </ul>

            <div class="mobile-menu-icon">
                <div class="hamburger-menu">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section id="home">
            <div class="container-home" >
                <div class="wrapper-text" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine"
                    data-aos-delay="1000" data-aos-duration="1000">
                    <div class="teks">Selamat Datang Di Sistem Informasi <span>Limbah Skincare</span></div>
                    <div>Register Jika Belum Punya Akun</div>
                    <div class="wrapper-button">
                        <a href="login.php" class="button">Login</a>
                        <a href="register.php" class="button">Register</a>
                    </div>
                </div>
                <div class="wrapper-image" data-aos="fade-left" data-aos-offset="0" data-aos-easing="ease-in-sine"
                    data-aos-delay="1000" data-aos-duration="1000" data-aos-once="false">
                    <img src="./assets/img/image.jpeg" alt="images" class="image">
                </div>
            </div>
        </section>
        <section id="features">
            <div class="container-features">
                <div class="title-features">Features</div>
                <div class="container-list-features">
                    <div class="card-list-features" data-aos="fade-down" data-aos-easing="linear"
                         data-aos-duration="1000">
                        <span class="material-symbols-outlined">
                            insert_chart
                        </span>
                        <div>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</div>
                    </div>
                    <div class="card-list-features" data-aos="fade-down" data-aos-easing="linear"
                       data-aos-delay="500" data-aos-duration="1000">
                        <span class="material-symbols-outlined">
                            cleaning_bucket
                        </span>
                        <div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus, ea?</div>
                    </div>
                    <div class="card-list-features" data-aos="fade-down" data-aos-easing="linear"
                         data-aos-delay="600" data-aos-duration="1000">
                        <span class="material-symbols-outlined">
                            recycling
                        </span>
                        <div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo, enim.</div>
                    </div>
                    <div class="card-list-features" data-aos="fade-down" data-aos-easing="linear"
                        data-aos-delay="700" data-aos-duration="1000">
                        <span class="material-symbols-outlined">
                            payments
                        </span>
                        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, voluptatibus?</div>
                    </div>
                </div>
            </div>
        </section>
        <section id="waste">
            <div class="container-waste" >
                <div class="title-waste">List Waste</div>
                <div class="container-list-waste">
                    <div class="card-list-waste" data-aos="fade-right" data-aos-duration="1000">
                        <img src="./assets/img/image2.jpeg" alt="">
                    </div>
                    <div class="card-list-waste" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="500">
                        <img src="./assets/img/image3.jpeg" alt="">
                    </div>
                    <div class="card-list-waste" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="600">
                        <img src="./assets/img/image4.jpeg" alt="">
                    </div>
                    <div class="card-list-waste" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="700">
                        <img src="./assets/img/image5.jpeg" alt="">
                    </div>
                    <div class="card-list-waste" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="700">
                        <img src="./assets/img/image6.jpeg" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container-footer">
            <div>&copy;copyright</div>
        </div>
    </footer>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/6b4714a33f.js" crossorigin="anonymous"></script>
    <!-- close font awesome -->
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- close AOS -->
    <script src="assets/js/menu.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
<?php
session_start();

function conectarBaseDeDatos() {
    $conn = new mysqli("localhost", "pablo", "root", "leonardo");
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    return $conn;
}

function obtenerIdUsuario($conn, $usuario) {
    $stmt = $conn->prepare("SELECT idUsuario FROM Usuario WHERE nombre = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($idUsuario);
    $stmt->fetch();
    $stmt->close();
    return $idUsuario;
}

function obtenerRolUsuario($conn, $idUsuario) {
    $stmt = $conn->prepare("SELECT Rol FROM Usuario WHERE idUsuario = ?");
    $stmt->bind_param("s", $idUsuario);
    $stmt->execute();
    $stmt->bind_result($rol);
    $stmt->fetch();
    $stmt->close();
    return $rol;
}

function mostrarDashboardAdmin($usuario) {
    echo "Eres Un admin";
    echo <<<HTML
    <span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8" />
        <title>Dashboard | Leonardo</title>
        <link rel="stylesheet" href="estilo.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>
    <body>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#" class="logo">
                        <img src="/img/usuario-de-perfil.png" alt="">
                        <span class="nav-item">$usuario</span>
                    </a></li>
                    <li id="#" ><a href="index.php">
                        <i class="fas fa-home" ></i>
                        <span class="nav-item">Inicio</span>
                    </a></li>
                    <li><a href="Perfil.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Perfil</span>
                    </a></li>
                    <li><a href="vms.php">
                        <i class="fas fa-desktop"></i>
                        <span class="nav-item">Mis SV</span>
                    </a></li>
                    <li><a href="soporte.php">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Soporte</span>
                    </a></li>
                    <li><a href="cerrarsesion.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Salir</span>
                    </a></li>
                    <li><a href="ticket.php">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Panel Soporte</span>
                    </a></li>
                    <li><a href="usuarios.php">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Usuarios</span>
                    </a></li>
                </ul>
            </nav>
            <section class="main">
                <div class="main-top"></div>
                <div class="main-skills">
                    <div class="card">
                        <i class="fas fa-laptop-code"></i>
                        <h3>Web development</h3>
                        <p>Join Over 1 million Students.</p>
                        <button>Get Started</button>
                    </div>
                    <div class="card">
                        <i class="fab fa-wordpress"></i>
                        <h3>WordPress</h3>
                        <p>Join Over 3 million Students.</p>
                        <button>Get Started</button>
                    </div>
                    <div class="card">
                        <i class="fas fa-palette"></i>
                        <h3>Graphic design</h3>
                        <p>Join Over 2 million Students.</p>
                        <button>Get Started</button>
                    </div>
                    <div class="card">
                        <i class="fab fa-app-store-ios"></i>
                        <h3>iOS dev</h3>
                        <p>Join Over 1 million Students.</p>
                        <button>Get Started</button>
                    </div>
                </div>
                <section class="main-course">
                    <h1>My courses</h1>
                    <div class="course-box">
                        <ul>
                            <li class="active">In progress</li>
                            <li>Explore</li>
                            <li>Incoming</li>
                            <li>Finished</li>
                        </ul>
                        <div class="course">
                            <div class="box">
                                <h3>HTML</h3>
                                <p>80% - progress</p>
                                <button>continue</button>
                                <i class="fab fa-html5 html"></i>
                            </div>
                            <div class="box">
                                <h3>CSS</h3>
                                <p>50% - progress</p>
                                <button>continue</button>
                                <i class="fab fa-css3-alt css"></i>
                            </div>
                            <div class="box">
                                <h3>JavaScript</h3>
                                <p>30% - progress</p>
                                <button>continue</button>
                                <i class="fab fa-js-square js"></i>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </body>
    </html>
    </span>
    HTML;
}

function mostrarDashboardUsuario($usuario) {
    echo "No eres admin";
    echo <<<HTML
    <span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8" />
        <title>Dashboard | Leonardo</title>
        <link rel="stylesheet" href="estilo.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>
    <body>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#" class="logo">
                        <img src="/img/usuario-de-perfil.png" alt="">
                        <span class="nav-item">$usuario</span>
                    </a></li>
                    <li id="on"><a href="index.php">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Inicio</span>
                    </a></li>
                    <li><a href="Perfil.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Perfil</span>
                    </a></li>
                    <li><a href="vms.php">
                        <i class="fas fa-desktop"></i>
                        <span class="nav-item">Mis SV</span>
                    </a></li>
                    <li><a href="soporte.php">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Soporte</span>
                    </a></li>
                    <li><a href="cerrarsesion.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Salir</span>
                    </a></li>
                </ul>
            </nav>
            <section class="main">
                <div class="main-top"></div>
                <div class="main-skills">
                    <div class="card">
                        <i class="fas fa-laptop-code"></i>
                        <h3>Web development</h3>
                        <p>Join Over 1 million Students.</p>
                        <button>Get Started</button>
                    </div>
                    <div class="card">
                        <i class="fab fa-wordpress"></i>
                        <h3>WordPress</h3>
                        <p>Join Over 3 million Students.</p>
                        <button>Get Started</button>
                    </div>
                    <div class="card">
                        <i class="fas fa-palette"></i>
                        <h3>Graphic design</h3>
                        <p>Join Over 2 million Students.</p>
                        <button>Get Started</button>
                    </div>
                    <div class="card">
                        <i class="fab fa-app-store-ios"></i>
                        <h3>iOS dev</h3>
                        <p>Join Over 1 million Students.</p>
                        <button>Get Started</button>
                    </div>
                </div>
                <section class="main-course">
                    <h1>My courses</h1>
                    <div class="course-box">
                        <ul>
                            <li class="active">In progress</li>
                            <li>Explore</li>
                            <li>Incoming</li>
                            <li>Finished</li>
                        </ul>
                        <div class="course">
                            <div class="box">
                                <h3>HTML</h3>
                                <p>80% - progress</p>
                                <button>continue</button>
                                <i class="fab fa-html5 html"></i>
                            </div>
                            <div class="box">
                                <h3>CSS</h3>
                                <p>50% - progress</p>
                                <button>continue</button>
                                <i class="fab fa-css3-alt css"></i>
                            </div>
                            <div class="box">
                                <h3>JavaScript</h3>
                                <p>30% - progress</p>
                                <button>continue</button>
                                <i class="fab fa-js-square js"></i>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </body>
    </html>
    </span>
    HTML;
}


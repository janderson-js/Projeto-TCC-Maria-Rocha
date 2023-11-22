<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/css/styler.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" id="backgroudnav">
            <img src="../public/img/Marciarocha.png" alt="" id="image_logotipoheader">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto colorboder_hover" id="colortext">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(página atual)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Serviços
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="colordropdown_menu">
                            <a class="dropdown-item" href="#">Ação</a>
                            <a class="dropdown-item" href="#">Outra ação</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">feedbacks</a>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Desativado</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="caroucel">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" style="height: 30em;">
                    <div class="carousel-item h-100 active " style="background-image: url(../public/img/mulher.jpg);background-repeat: no-repeat; background-position: center; background-size: contain;" id="config_texto1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="background-color:black; color: #daa520; border-radius: 30px;">Fisioterapia Ortopédica</h5>
                            <p style="background-color: black; color: #daa520; border-radius: 30px;">A fisioterapia ortopédica tem como objetivo prevenir, tratar e reabilitar lesões musculoesqueléticas, </p>
                        </div>
                    </div>
                    <div class="carousel-item h-100" style="background-image: url(../public/img/sessao.jpg);background-repeat: no-repeat; background-position: center; background-size: contain;" id="config_texto2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="background-color:black; color: #daa520; border-radius: 30px;">Ventosaterapia</h5>
                            <p style="background-color:black; color: #daa520; border-radius: 30px;">O tratamento com ventosas é uma técnica muito antiga da medicina tradicional chinesa (MTC), que surgiu há pelo menos 2 mil anos.</p>
                        </div>
                    </div>
                    <div class="carousel-item h-100" style="background-image: url(../public/img/reabili.jpg);background-repeat: no-repeat; background-position: center; background-size: contain;" id="config_texto3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 style="background-color:black; color: #daa520; border-radius: 30px;">Pilates</h5>
                            <p style="background-color:black; color: #daa520; border-radius: 30px;">O Pilates é um método de exercício físico e mental que tem como objetivo melhorar a postura, a flexibilidade</p>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main>
    <div class="cont_principal">
                <div class="cont_central" >
                    <div class="cont_modal cont_modal_active"id="modal4">
                        <div class="cont_photo">
                            <div class="cont_img_back">
                                <img src="../public/img/mulher-em-sessao-de-fisioterapia.jpg" alt="" />
                            </div>
                            <div class="cont_mins">
                                <div class="sub_mins">
                                    <img src="../public/img/Marciarocha.png" alt="">
                                </div>
                                <div class="cont_icon_right">
                                    <a href="#"><i class="fa-regular fa-bookmark"></i></a>
                                </div>
                            </div>
                            <div class="cont_servings">
                                <img src="../public//img/coluna.png" alt="">
                            </div>
                            <div class="cont_detalles">
                                <h3>Quem somos</h3>
                                <p>
                                    A consultorio Fisioterapêutica Marcia rocha, fundada em 2023, emerge como um farol de inovação e cuidado na área da saúde. Localizada em um espaço moderno e acolhedor,
                                    a clínica foi concebida com a visão de proporcionar tratamentos fisioterapêuticos de vanguarda, focados na recuperação integral dos pacientes.
                                </p>
                            </div>
                        </div>
                        <div class="cont_text_ingredients">
                            <div class="cont_over_hidden">

                                <div class="cont_tabs">
                                    <ul>
                                        <li><a href="#">
                                                <h4>DESCRIPTION</h4>
                                            </a></li>
                                    </ul>
                                </div>

                                <div class="cont_text_det_preparation">
                                    <div class="cont_title_preparation">
                                        <p>Criada</p>
                                    </div>
                                    <div class="cont_info_preparation">
                                        <p>Dezembro de 2023 para entrar em funcionamento em janeiro de 2024</p>
                                    </div>
                                    <div class="cont_text_det_preparation">

                                        <div class="cont_title_preparation">
                                            <p>Features</p>
                                        </div>
                                        <div class="cont_info_preparation">
                                            <p>5.0-liter V8 engine</br>
                                                480 horsepower and 420 lb-ft of torque</br>
                                                6-speed manual transmission or 10-speed automatic transmission</br>
                                                Unique suspension</br>
                                                Unique grille, hood, and rear spoiler</br>
                                                Brembo front brakes</br>
                                                19-inch wheels</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="cont_btn_mas_dets">
                                    <a href="#"><i class="fa-solid fa-chevron-down"></i></a>
                                </div>

                            </div>
                            <div class="cont_btn_open_dets">
                                <a href="#e" onclick="open_close('modal4')"><i class="fa-solid fa-chevron-left"></i></a>
                            </div>

                        </div>
                    </div> 
                </div>
                <!-- 2 card-->
                <div class="cont_central">
                    <div class="cont_modal cont_modal_active" id="modal2">
                        <div class="cont_photo">
                            <div class="cont_img_back">
                                <img src="../public/img/mulher-em-sessao-de-fisioterapia.jpg" alt="" />
                            </div>
                            <div class="cont_mins">
                                <div class="sub_mins">
                                    <img src="../public/img/Marciarocha.png" alt="">
                                </div>
                                <div class="cont_icon_right">
                                    <a href="#"><i class="fa-regular fa-bookmark"></i></a>
                                </div>
                            </div>
                            <div class="cont_servings">
                                <img src="../public//img/coluna.png" alt="">
                            </div>
                            <div class="cont_detalles">
                                <h3>Quem somos</h3>
                                <p>
                                    A consultorio Fisioterapêutica Marcia rocha, fundada em 2023, emerge como um farol de inovação e cuidado na área da saúde. Localizada em um espaço moderno e acolhedor,
                                    a clínica foi concebida com a visão de proporcionar tratamentos fisioterapêuticos de vanguarda, focados na recuperação integral dos pacientes.
                                </p>
                            </div>
                        </div>
                        <div class="cont_text_ingredients">
                            <div class="cont_over_hidden">

                                <div class="cont_tabs">
                                    <ul>
                                        <li><a href="#">
                                                <h4>DESCRIPTION</h4>
                                            </a></li>
                                    </ul>
                                </div>

                                <div class="cont_text_det_preparation">
                                    <div class="cont_title_preparation">
                                        <p>Criada</p>
                                    </div>
                                    <div class="cont_info_preparation">
                                        <p>Dezembro de 2023 para entrar em funcionamento em janeiro de 2024</p>
                                    </div>
                                    <div class="cont_text_det_preparation">

                                        <div class="cont_title_preparation">
                                            <p>Features</p>
                                        </div>
                                        <div class="cont_info_preparation">
                                            <p>5.0-liter V8 engine</br>
                                                480 horsepower and 420 lb-ft of torque</br>
                                                6-speed manual transmission or 10-speed automatic transmission</br>
                                                Unique suspension</br>
                                                Unique grille, hood, and rear spoiler</br>
                                                Brembo front brakes</br>
                                                19-inch wheels</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="cont_btn_mas_dets">
                                    <a href="#"><i class="fa-solid fa-chevron-down"></i></a>
                                </div>

                            </div>
                            <div class="cont_btn_open_dets">
                                <a href="#e" onclick="open_close('modal2')"><i class="fa-solid fa-chevron-left"></i></a>
                            </div>

                        </div>
                    </div> 
                </div>
                <!-- card 3-->
                <div class="card3">
                    <div class="cont_central">
                        <div class="cont_modal cont_modal_active" id="modal3">
                            <div class="cont_photo">
                                <div class="cont_img_back">
                                    <img src="../public/img/mulher-em-sessao-de-fisioterapia.jpg" alt="" />
                                </div>
                                <div class="cont_mins">
                                    <div class="sub_mins">
                                        <img src="../public/img/Marciarocha.png" alt="">
                                    </div>
                                    <div class="cont_icon_right">
                                        <a href="#"><i class="fa-regular fa-bookmark"></i></a>
                                    </div>
                                </div>
                                <div class="cont_servings">
                                    <img src="../public//img/coluna.png" alt="">
                                </div>
                                <div class="cont_detalles">
                                    <h3>Quem somos</h3>
                                    <p>
                                        A consultorio Fisioterapêutica Marcia rocha, fundada em 2023, emerge como um farol de inovação e cuidado na área da saúde. Localizada em um espaço moderno e acolhedor,
                                        a clínica foi concebida com a visão de proporcionar tratamentos fisioterapêuticos de vanguarda, focados na recuperação integral dos pacientes.
                                    </p>
                                </div>
                            </div>
                            <div class="cont_text_ingredients">
                                <div class="cont_over_hidden">
                                    <div class="cont_tabs">
                                        <ul>
                                            <li><a href="#">
                                                    <h4>DESCRIPTION</h4>
                                                </a></li>
                                        </ul>
                                    </div>

                                    <div class="cont_text_det_preparation">
                                        <div class="cont_title_preparation">
                                            <p>Criada</p>
                                        </div>
                                        <div class="cont_info_preparation">
                                            <p>Dezembro de 2023 para entrar em funcionamento em janeiro de 2024</p>
                                        </div>
                                        <div class="cont_text_det_preparation">

                                            <div class="cont_title_preparation">
                                                <p>Features</p>
                                            </div>
                                            <div class="cont_info_preparation">
                                                <p>5.0-liter V8 engine</br>
                                                    480 horsepower and 420 lb-ft of torque</br>
                                                    6-speed manual transmission or 10-speed automatic transmission</br>
                                                    Unique suspension</br>
                                                    Unique grille, hood, and rear spoiler</br>
                                                    Brembo front brakes</br>
                                                    19-inch wheels</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cont_btn_mas_dets">
                                        <a href="#"><i class="fa-solid fa-chevron-down"></i></a>
                                    </div>

                                </div>
                                <div class="cont_btn_open_dets">
                                    <a href="#e" onclick="open_close('modal3')"><i class="fa-solid fa-chevron-left"></i></a>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>       
    </main>
    <footer>

        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="../public/js/script_card.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    </body>
</html>
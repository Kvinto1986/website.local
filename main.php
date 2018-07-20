<?php
require "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style_main.css" type="text/css">
    <link rel="stylesheet" href="styles/style_all_tours.css" type="text/css">
    <link rel="stylesheet" href="styles/fm.revealator.jquery.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script  src = "js/jquery.inputmask.bundle.js"> </script>
    <script src="http://malsup.github.io/jquery.cycle.all.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="js/main_script.js"></script>
    <script src="js/fm.revealator.jquery.js"></script>
    <title>Туристические туры в европу</title>
    <meta name="description" content="Туристические туры в Европу">
</head>
<body>
<div class=" d-none d-lg-block" id="background_main"></div>
<?php include 'header.php';?>
<div class="container-fluid mt-2 hidden-md-down" >
    <div class="row">
    <div class="col-1"></div>
    <div class="col-11 text-center">
    <span id="text_live" style=" text-shadow: 4px 4px 4px #17A2B8;">Туристическая компания WOLVES TRAVEL приветствует Вас! </span>
    </div>
</div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-8 ">
<div id="carouselExampleIndicators" class="carousel  slide mt-3  col-md " data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner" id="carousel-inner" style="text-shadow: black 0 0 4px;">
        <div class="carousel-item active">
            <img class="d-block w-100 img-fluid" src="images/img_big/Knights.jpg" >
            <div class="carousel-caption d-none d-md-block">
                <h3>Средневековые битвы и рыцарские фестивали</h3>
                <p >Cовершите путешествие во времени вместе с нами! Самые знаменитые и массовые реконструкции средневековых битв по всей европе.</p>
        </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 img-fluid" src="images/img_big/praga.jpg" >
            <div class="carousel-caption d-none d-md-block">
                <h3>Европейские города</h3>
                <p>Самые красивые и любимые туристами города Европы с их памятниками архитектуры и историческими достопримечательностями.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 img-fluid" src="images/img_big/dis.jpg" >
            <div class="carousel-caption d-none d-md-block">
                <h3>Семейные туры</h3>
                <p> Незабываемые туры для детей и их родителей по развлекательным и чудестным местам европы</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 img-fluid" src="images/img_big/thumb-1920-372084.jpg" >
            <div class="carousel-caption d-none d-md-block">
                <h3>Замки Европы</h3>
                <p>Средневековые замки окутаны множеством легенд и, как правило, каждый из них имеет свои привидения и неповторимую романтическую историю любви.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 img-fluid" src="images/img_big/175468.jpg" >
            <div class="carousel-caption d-none d-md-block">
                <h3>Тур по вашему желанию</h3>
                <p>Туристические туры по вашему маршруту и в любое место Европы.</p>
            </div>
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
        <div class="col-md-12 col-lg-4">
        <div class="card border-dark mt-3">
            <div class="card-header bg-transparent border-dark"><h4 class="text-center" style="font-family: Gabriola; font-weight: bold">Добро пожаловать в туристическую компанию WOLFS TRAVEL </h4></div>
            <div class="card-body text-dark" id="cards">
                <p class="card-text">WOLVES TRAVEL — это не просто надёжное туристическое агентство, это настоящий Клуб путешественников. Любой вопрос, связанный с Вашими поездками,
                    будет решён быстро, чётко, и всегда по отличной цене! Эксклюзивне туры по Европе, бронирование мест,
                    визовая поддержка, билеты, отели, индивидуальные программы маршрутов и отдыха. <br> Туры можно бронировать онлайн, мы обязательно перезвоним вам, а если Вы хотите купить тур с помощью специалистов нашей компании – будем рады видеть Вас в нашем офисе!

                </p>
                <div class="col-12" style="margin-top: " id="info_social">
                    <a href="https://www.facebook.com/"  class="badge badge-info ml-4" style="width: 50px; height: 40px" <span class="  mt-1" id="ddd"><i class="fab fa-facebook-f fa-3x"  ></i></span></a>
                    <a href="https://web.telegram.org" class="badge badge-info ml-4" style="width: 50px; height: 40px"><span class="  mt-1"><i class="fab fa-telegram-plane fa-3x" ></i></span></a>
                        <a href="https://www.instagram.com" class="badge badge-info ml-4" style="width: 50px; height: 40px"><span class="  mt-1"><i class="fab fa-instagram fa-3x" ></i></span></a>
                            <a href="https://vk.com/" class="badge badge-info ml-3" style="width: 50px; height: 40px"><span class="  mt-1"><i class="fab fa-vk fa-3x" ></i></span></a>
                <a class="btn  btn-outline-info btn-primary  btn-md ml-5 mb-3" href="about_us.php">
                    О нас</a>
                    </p>
                </div>
            </div>
            <div class="card-footer bg-transparent border-dark"  id="card_footer" style="overflow:hidden; margin-top: -5%">
                <img class="card-img-fluid "  style="border-radius: 4px; width: 100%;height: 100%"
                     src="https://www.holiday.by/files/partners/88452f12280d336c6dfc086e19f3e313-thumb-900x1500-w.jpg">
            </div>
        </div>
        </div>

    </div>
</div>

<div class="container-fluid mt-5">
    <div class="card border-dark mt-3">
        <div class="card-body text-dark">
            <div class="jumbotron text-center" style="background-color: white">
                <h1 class="display-4" style="font-family: Gabriola">Звоните нам!</h1>
                <p class="lead">Наши туры эксклюзивны по Гомелю, выбирайте поездку по категории и далее интересующий Вас тур. Бронируйте, звоните, приходите к нам в офис, мы всегда рады Вам! Поездки на комфортабельных автобусах класса "Люкс" в
                мистические замки Европы, старинные города со средневековой архитектурой, самые популярные и знаменитые реконструкции битв средневековья и рыцарские турниры, семейные поездки в Парижский Диснейленд и многое другое. Поездки по вашему заказу в любую точку Европы.</p>
                <h1 class="display-4" style="font-family: Gabriola">Наши партнеры</h1><br>
                <div class="container text-left">
                    <div class="row">

                        <div class="col-4" style="overflow: hidden">   <img class="fluid" style="width: 100%; height: 100%" src="images/icons/guf2_bel.gif" alt=""></div>
                            <div class="col-4" style="overflow: hidden">   <img class="fluid"  style="width: 100%; height: 100%" src="images/icons/logo.png" alt=""></div>
                                <div class="col-4" style="overflow: hidden">     <img class="fluid"  style="width: 100%; height: 100%" src="images/icons/best.jpg" alt=""></div>
                        <div class="col-1"></div>
                    </div>
                    <div class="row">
                                    <div class="col-6" style="overflow: hidden">    <img class="fluid" style="width: 100%; height: 300px" src="images/icons/accor.jpg" alt=""></div>
                                        <div class="col-6" style="overflow: hidden">     <img class="fluid" style="width: 100%; height: 300px" src="images/icons/domiana.jpg" alt=""></div>



                    </div>

                </div>
                <h1 class="display-4" style="font-family: Gabriola">Телефоны</h1><br>
                        <ul id="call_ul">
                            <li class="list-inline-item mt-3"><img src="images/icons/mts.png" ><span class="ml-4">+375(29)830 99 88</span></li>
                            <li class="list-inline-item ml-3 mt-3"><img src="images/icons/velcom.png" ><span class="ml-4">+375(29)630 66 33</span></li>
                            <li class="list-inline-item ml-3 mt-3"><img src="images/icons/tel.png"><span class="ml-4">+375(232)83 99 88</span></li>
                            <li class="list-inline-item ml-3 mt-3"> <img src="images/icons/skype_2.png" ><span class="ml-4">WolvesTravel.by</span></li>
                        </ul>
            </div>
                <div class="row " >
                    <div class="col-xs-2 col-sm-2  col-md-2 col-lg-1"></div>
                    <div class="col-xs-10 col-sm-10  col-md-10 col-lg-11" style="margin-left: -4%">
                        <div class="view view-choice " >
                            <img src="images/img_about/grunvaldAbout.jpg" />
                            <div class="choice_layer">
                                <h2>Реконструкции средневековых битв</h2>
                                <p>Поездки на средневековые битвы и рыцарские фестивали в Европу и по Беларуси</p>
                                <a href="knights_tours.php" class="link-info">Подробнее</a>
                            </div>
                        </div>
                        <div class="view view-choice">
                            <img src="images/img_about/prahaAbout.jpg" />
                            <div class="choice_layer">
                                <h2>Старинные Европейские города</h2>
                                <p>Путешествия в Прагу, Краков, Дрезден, Будапешт...</p>
                                <a href="europe_tours.php" class="link-info">Подробнее</a>
                            </div>
                        </div>
                        <div class="view view-choice">
                            <img src="images/img_about/ghostAbout.jpeg" />
                            <div class="choice_layer">
                                <h2>Старинные мистические замки </h2>
                                <p>Мрачные, загадочные, пугающие замки Восточной европы</p>
                                <a href="castle_tours.php" class="link-info">Подробнее</a>
                            </div>
                        </div>
                        <div class="view view-choice">
                            <img src="images/img_about/disneyAbout.jpg" />
                            <div class="choice_layer">
                                <h2>Семейные поездки в европу</h2>
                                <p>Поездки в сказочные и развлекательные места Европы</p>
                                <a href="family_tours.php" class="link-info">Подробнее</a>
                            </div>
                        </div>
                        <div class="view view-choice">
                            <img src="images/img_about/compasAbout.jpg" />
                            <div class="choice_layer">
                                <h2>Выберите маршрут своей группы самостоятельно</h2>
                                <p>Поездка Вашей группы по Вашему заданному маршруту </p>
                                <a href="way_tours.php" class="link-info">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container col-8 mt-5  text-center">
    <div class="container">
        <h1 class="display-4" style="font-family: Gabriola; font-weight: bold; text-shadow: 2px 2px 4px #17A2B8;">Актуальные и самые популярные туры</h1>
    </div>
</div>
<?php
$data=$_POST;
if( isset($data['book_up'])) {
    $user = $_SESSION['logged_user'];
    $user->tour =$data['t'];
    $user->place = $data['place'];
    $user->date=$data['d'];
    $user->confirm='Ждет подтверждения';
    R::store($user);
    $user = $_SESSION['logged_user'];
    $del = R::findOne('tours', "tourname=?", array(@$data['t']));
    $sm = $del['online'];
    $sm1 = $data['place'];
    $sum = $sm + $sm1;
    $del['online'] = $sum;
    $allplace = 40;
    $onlineplace = $del['online'];
    $offlineplace = $del['offline'];
    $freeplace = $allplace - $onlineplace - $offlineplace;
    $del['allplaces'] = $freeplace;
    R::store($del);
    echo "<meta http-equiv='refresh' content='0'>";
}
?><div class="container-fluid">
    <div class="row">
   <?php

$find = R::findAll('tours');

foreach ($find as $tours) {
    $date = $tours['date'];
    $date_tour=date("d.m.Y", strtotime($date));
    date_default_timezone_set('Russia/Moscow');
    $date_now = date('d.m.Y', time());
    $datetime1 = date_create($date_now);
    $datetime2 = date_create($date_tour);
    $interval = date_diff($datetime1, $datetime2);
    $das=$interval->format('%R%a');
    if($das<14 and $das>3 or $tours['allplaces']<10 and $tours['allplaces']>0  and $tours['comments']!=null){
        if ($tours['images']!=null or $tours['tourname']!=null ) {

            echo '<div class="card col-lg-3 col-md-11  mt-5 "  id="tours_container"style="overflow: hidden;margin-left: 6%;background-color: #17A2B8">
';

            echo ' <div class="card-top mt-3"  id="tours_container">  <a href="' . $tours['type'] . '">
        <img class="card-img " id="tour_photo" src="' . $tours['images'] . '" alt=""></a>
        </div>
        <div class="card-body text-center">
            <h5 class="card-title">' . $tours['tourname'] . '</h5>
            <p class="card-text">' . $tours['comments'] . '</p><br>
            </div>
            <ul class="list-group list-group-flush" >
            <li class="list-group-item"style="border-radius: 60px; background-color: #17A2B8">
            <i class="fas fa-calendar-alt fa-1x ml-1 mr-1" style="color: black"></i> Дата выезда:  ' . $date_tour . '        </li>';
            if ($das<14 and $das>3){

               echo '<li class="list-group-item"style="border-radius: 60px; background-color: #17A2B8;color: #63190a">
            <i class="fas fa-fire fa-1x ml-1 mr-1" style="color: #8d3d07"></i> Спешите! Осталось дней до поездки: '.abs($das).'</li>';
            }
            echo '
            <li class="list-group-item" style="border-radius: 60px; background-color: #17A2B8">
            
            <i class="fas fa-users fa-1x ml-1 mr-1" style="color: black"></i>   Количество свободных мест: ' . $tours['allplaces'] . '</li></ul>
            
            <li class="list-group-item" style="border:none; background-color: #17A2B8"><a href="' . $tours['type'] . '"><button class="btn btn-secondary mt-2 mb-2 mr-5">Подробнее</button></a></li></ul>';}
    if (isset($_SESSION['logged_user'])){
        if ($_SESSION['logged_user']->place <1){
        $data['t']=$tours['tourname'];
            $data['d']=$tours['date'];
        echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '" id="book_tour" class="needs-validation mt-5" novalidate>
                   <input type="hidden" name="t" value="' . @$data['t']. '" <br>
                   <input type="hidden" name="d" value="' . @$data['d']. '" <br>
                <label for="tel" class="ml-3"><i class="fas fa-street-view fa-1x ml-1 mr-1" style="color: black"></i>Введите количество мест:</label><br>
                <input type="number" min="1" max="' . $tours['allplaces'] . '"  class="form-control col-6 ml-3" name="place" required value="' . @$data['place']. '" > 
                <div class="invalid-feedback ml-3">
            Введите правильное количество мест от 1 до ' . $tours['allplaces'] . '
        </div>
                <button id="book_up" type="submit" name="book_up" class="btn btn-secondary mt-2 mb-2 mr-5 ml-3">Забронировать</button>
                </form>
                
                ';
    }

    }
            if ( isset($_SESSION['logged_user'])) {
                if ($_SESSION['logged_user']->place > 0) {
                    echo ' <div class="ml-3"><span id="book_error" class="mb-3">Вы уже забронировали  тур</span><br>
                 <a  class="btn btn-secondary mt-2 mb-2" data-toggle="modal" data-target="#exampleModalCenter">Изменить тур и количество мест</a>
    </div>';
                }
            }
    if (!isset($_SESSION['logged_user'])){
        echo ' <div class="ml-3"><span class="mb-3" id="book_error">Только зарегестрированные пользователи
                    могут бронировать туры
               <a  class="btn btn-secondary mt-2 mb-2" data-toggle="modal" data-target="#exampleModalCenter1">
                Регистрация
            </a></div>';
    }
    echo '</div>';

}
}
?>
    </div>
</div>
<div class="container col-11 mt-5">
    <h1 class="card-title" style="color: black; text-align: center; font-family: Gabriola; font-weight: bold; text-shadow: 2px 2px 4px #17A2B8;">Отзывы наших клиентов</h1>
<div class="card  text-white ">

    <img class="card-img" src="https://www.motto.net.ua/old_site//img/panoramas/1264541247_CFE0EDEEF0E0ECEDFBE520E2E8E4FB20E3EEF0EEE4EEE220ECE8F0E0203330.jpg" alt="Card image">
    <div class="card-img-overlay" id="slider_com" >
        <?php
        $find = R::findAll('users');
        foreach ($find as $users){
            if($users['comment']!=null or $users['comment']!=''){
                echo '<div class="card-body  col-12 mt-5 text-center " style=";color: white; text-shadow: 2px 2px 4px black;"><p style="font-size: 18px" class="card-text" >  '.$users['comment'].' </p>
                <h5 class="card-title "> '.$users['login'].' </h5> </div>';
            }
        }
        ?>

    </div>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>
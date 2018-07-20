<?php
require "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style_main.css" type="text/css">
    <link rel="stylesheet" href="styles/style_all_tours.css" type="text/css">
    <link rel="stylesheet" href="styles/fm.revealator.jquery.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script  src = "js/jquery.inputmask.bundle.js"> </script>
    <script src="http://malsup.github.io/jquery.cycle.all.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
            integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous"></script>
    <script src="js/main_script.js"></script>
    <script src="js/fm.revealator.jquery.js"></script>
    <title>Туристические туры в европу</title>
    <meta name="description" content="Туристические туры в Европу">
</head>
<body>
<div class=" d-none d-lg-block" id="background_main"></div>
<?php include 'header.php';?>
<div class="container-fluid mt-2 " >
    <div class="row">
        <div class="col-1"></div>
        <div class="col-11 text-center">
            <span id="text_live">Информация о нашей компании </span>
        </div>
    </div>
</div>
<div class="container col-lg-5 col-md-11" id="slide" style="border: 10px solid #bab800;">
    <img class="img-fluid" src="https://thumbs.gfycat.com/FairLongEyelashpitviper-size_restricted.gif">
    <img class="img-fluid" src="https://supermutlu.files.wordpress.com/2015/06/workaholics.jpg">
    <img class="img-fluid" src="https://loxotrona.net/wp-content/uploads/2017/01/Sales-American-Store-5.jpg">
    <img class="img-fluid" src="https://areagroup.ru/images/content/bg/1.jpg">
</div>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCqDJQC4lVsw4pDBHE9D7NbPnlLtqO4yE&callback=initMap">
</script>
<div class="container col-lg-10 col-md-10 mt-5 " style="background-color: white;border-radius: 20px">
    <div class="row">
    <div class="col-lg-7 col-md-11 mt-5 ml-5 " id="map" style="border-color: grey "></div>
        <div class="card  col-lg-4 col-mg-12 mt-5" style="border: none;margin-left: 4%">
            <div class="card-header " style="overflow: hidden; border-radius: 10px">
                <img class="card-img-fluid "
                      style="width: 100%;height: 100%; border-radius: 10px" src="images/img_about/Pushkin_Plaza_v_Gomele.jpg">
            </div>
            <div class="card-body text-dark" id="cards">
                <h5 class="card-title">Туристическая компания WOLFS TRAVEL приветствует Вас!</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Aperiam asperiores aspernatur blanditiis deserunt, dicta doloremque doloribus enim esse excepturi
                    iure obcaecati quae recusandae sunt temporibus ullam, veniam voluptas voluptate voluptatem!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Aperiam asperiores aspernatur blanditiis deserunt, dicta doloremque doloribus enim esse excepturi
                </p>
            </div>
            <div class="card-footer bg-transparent border-dark" id="card_footer" style="overflow:hidden;">
            </div>
        </div>
        <div class="col-11 ml-5 mt-5">
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aperiam asperiores aspernatur blanditiis deserunt, dicta doloremque doloribus enim esse excepturi
                iure obcaecati quae recusandae sunt temporibus ullam, veniam voluptas voluptate voluptatem!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aperiam asperiores aspernatur blanditiis deserunt, dicta doloremque doloribus enim esse excepturi
            </p>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aperiam asperiores aspernatur blanditiis deserunt, dicta doloremque doloribus enim esse excepturi
                iure obcaecati quae recusandae sunt temporibus ullam, veniam voluptas voluptate voluptatem!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aperiam asperiores aspernatur blanditiis deserunt, dicta doloremque doloribus enim esse excepturi
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aperiam asperiores aspernatur blanditiis deserunt, dicta doloremque doloribus enim esse excepturi
                iure obcaecati quae recusandae sunt temporibus ullam, veniam voluptas voluptate voluptatem!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aperiam asperiores aspernatur blanditiis deserunt, dicta doloremque doloribus enim esse excepturi
            </p>
            </p>
        </div>
    </div>
</div>
<script>
    function initMap() {
        var uluru = {lat: 52.433585, lng: 31.010312};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<?php include 'footer.php';?>
</body>
</html>
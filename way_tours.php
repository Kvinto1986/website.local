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
            <span id="text_live">Заказ поездки в любую точку Европы  </span>
        </div>
    </div>
</div>
<div class="container col-lg-5 col-md-11" id="slide" style="border: 10px solid #bf5c06;">
    <img class="img-fluid" src="https://images.wallpaperscraft.ru/image/kompas_karta_puteshestviya_118190_1920x1080.jpg">
    <img class="img-fluid" src="https://images.wallpaperscraft.ru/image/doroga_razmetka_gory_asfalt_napravlenie_119782_1920x1080.jpg">
    <img class="img-fluid" src="https://images.wallpaperscraft.ru/image/globus_ruka_karta_119814_1920x1080.jpg">
    <img class="img-fluid" src="https://images.wallpaperscraft.ru/image/turizm_siluety_vershina_zaka_115858_1920x1080.jpg">

</div>
<div class="container col-8 mt-5  text-center">
    <div class="container">
        <h1 class="display-4" style="font-family: Gabriola; font-weight: bold; text-shadow: 2px 2px 4px gray; border-bottom: 3px gainsboro solid">Бронируйте туры онлайн!<br></h1>
        <p style="font-size:18px; font-weight: bold; text-shadow: 2px 2px 4px gray;">Регистрируйтесь на нашем сайте и бронируйте туры онлайн! Наши специалисты обязательно перезвонят вам и отвечут на все интересующие вас вопросы и порядок бронирования мест.</p>
        <?php if(!isset($_SESSION['logged_user'])):
            ?>
            <a  class="nav-link btn " style="background-color: #bf5c06; color: white" data-toggle="modal" data-target="#exampleModalCenter1">
                Регистрация
            </a>
        <?php endif;?>
    </div>
</div>
<div class="container col-lg-9 col-mg-12 mt-5" id="map">
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                mapTypeControl: false,
                center: {lat: 52.433585, lng: 31.010312},
                zoom: 15
            });
            new AutocompleteDirectionsHandler(map);
        }
        function AutocompleteDirectionsHandler(map) {
            this.map = map;
            this.originPlaceId = 'ChIJpfH6UJtp1EYRlhM20g-jzF4';
            this.destinationPlaceId = null;
            this.travelMode = 'DRIVING';
            var originInput = document.getElementById('origin-input');
            var destinationInput = document.getElementById('destination-input');
            this.directionsService = new google.maps.DirectionsService;
            this.directionsDisplay = new google.maps.DirectionsRenderer;
            this.directionsDisplay.setMap(map);

            var originAutocomplete = new google.maps.places.Autocomplete(
                originInput, {placeIdOnly: true});
            var destinationAutocomplete = new google.maps.places.Autocomplete(
                destinationInput, {placeIdOnly: true});

            this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
            this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

            this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
            this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);

        }

        AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
            var me = this;
            autocomplete.bindTo('bounds', this.map);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                if (mode === 'ORIG') {
                    me.originPlaceId = 'ChIJpfH6UJtp1EYRlhM20g-jzF4';
                } else {
                    me.destinationPlaceId = place.place_id;
                }
                me.route();
            });
        };
        AutocompleteDirectionsHandler.prototype.route = function() {
            if (!this.originPlaceId || !this.destinationPlaceId) {
                return;
            }
            var me = this;
            this.directionsService.route({
                origin: {'placeId': this.originPlaceId},
                destination: {'placeId': this.destinationPlaceId},
                travelMode: this.travelMode
            }, function(response, status) {
                if (status === 'OK') {
                    me.directionsDisplay.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });

        };

    </script>

</div>
<?php
$data=$_POST;
if( isset($data['book_up']))
{    $user=$_SESSION['logged_user'];
    if (isset($_SESSION['logged_user'])){
        $user->tour=$data['city'];
        $user->place=$data['place'];
        $user->confirm='Ждет подтверждения';
        R::store($user);
        $tours = R::dispense('tours');
        $tours->tourname = $data['city'];
        $tours->offline = null;
        $tours->online = $data['place'];
        $tours->allplaces = 40;
        R::store($tours);
        echo "<meta http-equiv='refresh' content='0'>";
    }

}
?>
<?php
if (isset($_SESSION['logged_user'])) {
if ($_SESSION['logged_user']->place > 0) {

    echo ' <div class="container mt-5 text-center"><h5 >Вы уже забронировали  тур</h5><br>
                 <a  class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#exampleModalCenter">Изменить тур и количество мест</a>
    </div>';
                }
            }
?>

<input id="destination-input" class="controls container col-6" type="text"
       placeholder="Введите город куда едите">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCqDJQC4lVsw4pDBHE9D7NbPnlLtqO4yE&libraries=places&callback=initMap"
        async defer></script>
<?php if (isset($_SESSION['logged_user']) and ($_SESSION['logged_user']->place == 0)):?>
<div class="container col-5 mt-5 text-center" style="background-color: #bf5c06; border-radius: 8px; color: white">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="needs-validation mt-5" novalidate>
        <label for="login" class="mt-3">Введите город еще раз для бронирования поездки</label><br>
        <input type="text" name="city"  class="form-control " required value="<?php echo @$data['city'];?>" >
        <div class="invalid-feedback" style="color: white">
            Введите город
        </div><br>
        <label for="tel">Введите количество мест:</label><br>
        <input type="number" name="place" min="1" max="40" class="form-control " required value="<?php echo @$data['place'];?>">
        <div class="invalid-feedback" style="color: white">
            Введите количество мест от 1 до 40
        </div><br>
        <div class="form-check ml-2" style="color: white">
            <input class="form-check-input " type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck" style="color: white">
                Подтвердить заказ
            </label>
            <div class="invalid-feedback" style="color: white">
                Вы должны подтвердить заказ тура
            </div>
        </div><br>
        <button id="book_up" type="submit" name="book_up" class="btn btn-primary  mb-3">Забронировать</button>
    </form>

</div>
<?php endif;?>
<?php if (!isset($_SESSION['logged_user'])):?>
   <div class="container mt-5 text-center"><h5  >Только зарегестрированные пользователи
            могут бронировать туры</h5>
        <a  class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#exampleModalCenter1">
            Регистрация
        </a></div>
<?php endif;?>

<?php include 'footer.php';?>
</body>
</html>
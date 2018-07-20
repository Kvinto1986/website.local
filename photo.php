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
            <span id="text_live">Фотогалерея наших путешествий </span>
        </div>
    </div>
</div>
<div class="container col-lg-5 col-md-11" id="slide" style="border: 10px solid #3c8cba;">
    <img class="img-fluid" src="https://gdb.rferl.org/3DBB0019-8727-4DE4-8DF2-CB6C232FFE34_w1023_r1_s.jpg">
    <img class="img-fluid" src="http://katyaburg.ru/sites/default/files/pictures/prikolnye_video/avtobus-amfibiya-kataet-po-reke-turistov.jpg">
    <img class="img-fluid" src="http://www.smile-tour.com.ua/images/6.jpg">
</div>
<div class="container col-8 mt-5 mb-5  text-center">
    <div class="container">
        <h1 class="display-4" style="font-family: Gabriola; font-weight: bold; text-shadow: 2px 2px 4px gray; border-bottom: 3px gainsboro solid">Фотоотчет о наших путешествиях<br></h1>
        <p style="font-size:18px; font-weight: bold; text-shadow: 2px 2px 4px gray;">Присоединяйтесь к нашей дружной компании!</p>
    </div>
</div>
<?php if ( isset($_SESSION['logged_user']) and $_SESSION['logged_user']->status == 5):?>
<div class="container col-3 text-center" style="background-color: white">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="needs-validation mt-5" novalidate>
    <label class=" mt-5" for="input_photo">Введите ссылку на картинку</label><br>
    <input class="form-control " type="text" name="input_photo" required value="<?php echo @$img['input_photo'];?>">
    <div class="invalid-feedback">
        Введите ссылку на фото
    </div>
    <br>
    <button class="btn btn-primary mt-3 mb-3" id="sign_up_photo" type="submit" name="sign_up_photo">Добавить</button><br>
</form>
</div>
    <div class="container col-3 text-center mb-5" style="background-color: white">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="needs-validation mt-5" novalidate>
    <label class=" mt-5"for="id_photo">Введите id удаляемой картинки</label><br>
    <input class="form-control"type="number" name="id_photo" required value="<?php echo @$img['id_photo'];?>">
        <div class="invalid-feedback">
            Введите верно id фотографии
        </div><br>
        <div class="form-check ml-2">
            <input class="form-check-input " type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
                Подтвердить удаление
            </label>
            <div class="invalid-feedback">
                Вы должны подтвердить удаление фото
            </div>
        </div><br>
    <button class="btn btn-danger mt-3 mb-3"  id="del_photo" type="submit" name="del_photo">Удалить</button><br>
</form>
</div>
<?php endif;?>
<?php
$img=$_POST;
if( isset($img['sign_up_photo'])){
    $photo=R::dispense('photos');
    $photo->images=$img['input_photo'];
    R::store($photo);
    echo "<meta http-equiv='refresh' content='0'>";
}

if( isset($img['del_photo'])){
    $del = R::load('photos', $img['id_photo']);
    R::trash($del);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>

    <div class="container-fluid">
    <div class="row">
    <?php
    $find = R::findAll('photos');
    foreach ($find as $photos) {

        echo '<div class="col-lg-3  col-md-10 revealator-rotateright revealator-once text-center" id="photo_container_1">
';if (isset($_SESSION['logged_user']) and $_SESSION['logged_user']->status == 5) {
            echo '<h3 class="card-text " style="position: absolute; color:black">id фото: ' . $photos['id'] . '</h3>';
        } echo '<img class="img-fluid" src="' . $photos['images'] . '">
    </div>';
    }
?>
    </div></div>
<?php include 'footer.php';?>
</body>
</html>
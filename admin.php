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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/ru.js"></script>
    <title>Туристические туры в европу</title>
    <meta name="description" content="Туристические туры в Европу">
</head>
<body>
<div class=" d-none d-lg-block" id="background_main"></div>
<?php include 'header.php'; ?>
<div class="container-fluid mt-2 ">
    <div class="row text-center">
        <div class="col-1"></div>
        <div class="col-11 ">
            <span id="text_live">Страница администратора</span>
        </div>
    </div>
</div>
<div class="container col-lg-6 col-md-12" id="slide" style="border: 10px solid #91984a;">
    <img class="img-fluid" src="https://images.wallpaperscraft.ru/image/programmist_koder_admin_sisadmin_administrator_programmer_5628_1920x1080.jpg">
    <img class="img-fluid" src="https://2ch.hk/wrk/arch/2016-09-03/src/649623/14686654709680.png">
    <img class="img-fluid" src="https://i.ytimg.com/vi/YhqL32rffb0/maxresdefault.jpg">
</div>
<div class="container text-center">
<h2 class="text-center mb-5 mt-5">Редактирование туров</h2><br>
<button class="btn btn-primary mb-5" type="button" data-toggle="collapse" data-target="#multiCollapseExample1"
        aria-expanded="false" aria-controls="#multiCollapseExample1">
    Открыть таблицу
</button>
</div>
<?php
$data = $_POST;
if (isset($data['ref_btn'])) {
    $changetour = R::findOne('tours', 'tourname=?', array(@$data['tour_name']));
    $changetour['online'] = 0;
    $changetour['offline'] = 0;
    $changetour['date'] = null;
    $changetour['allplaces'] = 40;
    R::store($changetour);

    $changeuser = R::find('users', 'tour=?', array(@$data['tour_name']));
    foreach ($changeuser as $users) {
        $users->tour = null;
        $users->place = 0;
        $users->date = null;
        $users->confirm = null;
        R::store($users);
    }

}
if (isset($data['change_off_btn'])) {
    $off = R::findOne('tours', "tourname=?", array(@$data['tour_name']));
    $off['offline'] = @$data['off_id'];
    $allplace = 40;
    $onlineplace = $off['online'];
    $offlineplace = $off['offline'];
    $freeplace = $allplace - $onlineplace - $offlineplace;
    $off['allplaces'] = $freeplace;
    R::store($off);
}
if (isset($data['change_date_btn'])) {
    $da = R::findOne('tours', "tourname=?", array(@$data['tour_name']));
    $da['date'] = @$data['date_name'];
    R::store($da);
    $find = R::findAll('users');
    foreach ($find as $users) {
        if ($users['tour'] != @$data['tour_name']) {
            $users['date'] = $users['date'];
            R::store($users);
        } else {
            $users['date'] = @$data['date_name'];
            R::store($users);
        }
    }

}
echo ' <div class="collapse multi-collapse " id="multiCollapseExample1"><div class="container text-center">
<table class="table table-hover" style="background-color: whitesmoke">
<thead class="thead-dark">
    <tr>
        <th >tour</th>
        <th >online</th>
        <th >offline</th>
        <th >allplaces</th>
        <th >date</th>
    </tr> </thead><tbody>';
$find = R::findAll('tours');
foreach ($find as $tours) {
    echo '<tr><form method="POST" action="' . $_SERVER['PHP_SELF'] . '" class="form-inline needs-validation" novalidate>';
    @$data['off_id'] = $tours['offline'];
    @$data['tour_name'] = $tours['tourname'];
    echo '<td><label class="form-control ">' . $tours['tourname'] . '</label><br>
    <button id="ref_btn" type="submit" name="ref_btn" class="btn btn-danger mb-1">Очистить данные тура</button></td>
    <td >' . $tours['online'] . '</td>
    <td >
    <input type="hidden" name="tour_name"  value="' . @$data['tour_name'] . '">
    <input type="number" name="off_id" class="form-control" min="1" max="' . $tours['allplaces'] . '" value="' . @$data['off_id'] . '">
    <div class="invalid-feedback" style="color: #8e3035">
            Введите правильное количество мест от 1 до ' . $tours['allplaces'] . '
        </div><br>
    <button  type="submit" name="change_off_btn" class="btn btn-success mt-2">Подтвердить</button></form></td>
    <td >' . $tours['allplaces'] . '</td>
    <td ><form method="POST" action="' . $_SERVER['PHP_SELF'] . ' ">';
    @$data['date_name'] = $tours['date'];
    @$data['tour_name'] = $tours['tourname'];
    echo '<input type="hidden" name="tour_name" value="' . @$data['tour_name'] . '">
    <input type="date" id="input_time" data-date="" data-date-format="DD MMMM YYYY" name="date_name" class="form-control" value="' . @$data['date_name'] . '"><br>
    <button  type="submit" name="change_date_btn" class="btn btn-success mt-2">Подтвердить</button></form></th>
    </tr>';
}
echo '
</table>
<button class="btn btn-primary  mb-5" type="button" data-toggle="collapse" data-target="#multiCollapseExample1"
        aria-expanded="false" aria-controls="#multiCollapseExample1">
    Закрыть таблицу
</button></div></div>';
?>
<h2 class="text-center mb-5 mt-5">Неподтвержденные туры</h2><br>
<?php
$data = $_POST;
if (isset($data['confirm_id'])) {
    $conf = R::findOne('users', "id=?", array(@$data['ch_id']));
    $conf->confirm = 'Подтверждено';
    R::store($conf);
}
if (isset($data['not_confirm_id'])) {
    $del = R::findOne('tours', "tourname=?", array(@$data['tour_id']));
    $conf = R::findOne('users', "id=?", array(@$data['ch_id']));
    $sm1 = $conf['place'];
    $sm2 = $del['online'];
    $sum = $sm2 - $sm1;
    $del['online'] = $sum;
    $allplace = 40;
    $onlineplace = $del['online'];
    $offlineplace = $del['offline'];
    $freeplace = $allplace - $onlineplace - $offlineplace;
    $del['allplaces'] = $freeplace;
    R::store($del);
    $conf = R::findOne('users', "id=?", array(@$data['ch_id']));
    $conf->confirm = 'Отклонен';
    $conf->tour = null;
    $conf->place = 0;
    $conf->date = null;
    R::store($conf);
}
if (isset($data['confirm_cansel'])) {
    $conf = R::findOne('users', "id=?", array(@$data['ch_id']));
    $conf->confirm = null;
    $conf->tour = null;
    R::store($conf);
}
$find = R::findAll('users');
 echo '
<div class="container text-center">
            <table class="table table-hover" style="background-color: whitesmoke">
                <thead class="thead-dark">
                <th >id</th>
                <th >login</th>
                <th >email</th>
                <th >tel</th>
                <th >tour</th>
                <th >place</th>
                <th >date</th>
                <th >confirm</th>
                <th >Подтвердить</th>
                </tr>
                </thead><tbody>';

foreach ($find as $users) {
    if ($users['confirm'] == 'Ждет подтверждения') {

   echo '  
<tr>
    <td >' . $users['id'] . '</td>
    <td >' . $users['login'] . '</td>
    <td >' . $users['email'] . '</td>
    <td >' . $users['tel'] . '</td>
    <td >' . $users['tour'] . '</td>
    <td>' . $users['place'] . '</td>
    <td>' . $users['date'] . '</td>
    <td>' . $users['confirm'] . '</td>
       ';
        @$data['ch_id'] = $users['id'];
        @$data['tour_id'] = $users['tour'];
        echo ' <td><form method="POST" action="' . $_SERVER['PHP_SELF'] . '" class="form-inline">
        <input type="hidden" name="ch_id" value="' . @$data['ch_id'] . '">
        <input type="hidden" name="tour_id" value="' . @$data['tour_id'] . '">
    <button id="confirm_id" type="submit" name="confirm_id" class="btn btn-success ">Подтвердить</button>
    <button id="not_confirm_id" type="submit" name="not_confirm_id" class="btn btn-danger ml-3">Отклонить</button></form></td>
    </tr>
    
';
    }

}
echo '</tbody>
    </table></div>';
?>
<h2 class="text-center mb-5 mt-5">Отмененные туры</h2><br>
<?php
$find = R::findAll('users');
    echo '
<div class="container text-center">
            <table class="table table-hover" style="background-color: whitesmoke">
                <thead class="thead-dark">
                <th >id</th>
                <th >login</th>
                <th >email</th>
                <th >tel</th>
                <th >tour</th>
                <th >place</th>
                <th >date</th>
                <th >confirm</th>
                <th >Подтвердить</th>
                </tr>
                </thead><tbody>';
foreach ($find as $users) {
    if ($users['confirm'] == 'Отменен пользователем') {
        echo '
<tr>
    <td >' . $users['id'] . '</td>
    <td >' . $users['login'] . '</td>
    <td >' . $users['email'] . '</td>
    <td >' . $users['tel'] . '</td>
    <td >' . $users['tour'] . '</td>
    <td>' . $users['place'] . '</td>
    <td>' . $users['date'] . '</td>
    <td>' . $users['confirm'] . '</td>
       ';
        echo ' <td><form method="POST" action="' . $_SERVER['PHP_SELF'] . ' "class="form-inline">';
        @$data['ch_id'] = $users['id'];
        @$data['tour_id'] = $users['tour'];
        echo '<input type="hidden" name="ch_id" value="' . @$data['ch_id'] . '"><br>
        <input type="hidden" name="tour_id" value="' . @$data['tour_id'] . '"><br>
    <button id="confirm_cansel" type="submit" name="confirm_cansel" class="btn btn-success">Подтвердить</button><br>
</form></tr>';
    }

}
echo '</tbody>
    </table></div>';
?>
    <h2 class="text-center mb-5 mt-5">Поиск клиента</h2><br>

<div class="container col-3 text-center">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate >
    <label for="input_id" class="mt-5">Введите email для поиска</label><br>
    <input type="text" name="search_email_input" class="form-control" required value="<?php echo @$date['search_email_input']; ?>">
    <div class="invalid-feedback">
        Введите email
    </div><br>
    <button id="search_email_btn" type="submit" name="search_email_btn" class="btn btn-success">Вывести</button><br>
</form>
</div>

<?php
$date = $_POST;
if (isset($date['search_email_btn'])) {
    $change = R::findOne('users', 'email=?', array(@$date['search_email_input']));
    echo ' 
 <div class="container col-8 text-center mt-3">
            <table class="table table-hover" style="background-color: whitesmoke">
                <thead class="thead-dark">
                <th >id</th>
                <th >login</th>
                <th >email</th>
                <th >tel</th>
                <th >tour</th>
                <th >place</th>
                <th >status</th>
                <th >comment</th>
                </tr>
                </thead><tbody>
<tr>
    <td>' . $change->id . '</td>
    <td>' . $change->login . '</td>
    <td>' . $change->email . '</td>
    <td>' . $change->tel . '</td>
    <td>' . $change->tour . '</td>
    <td>' . $change->place . '</td>
    <td>' . $change->status . '</td>
    <td>' . $change->comment . '</td>
   </tr>
   </tbody>
    </table></div>';
}

?>
<div class="container col-3 text-center">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate >
    <label for="input_id" class="mt-5">Введите tel для поиска</label>
        <br>
        <script>$(document).ready(function(){
                $("#phone_3").inputmask("+375(99)999-99-99");
            });</script>
    <input type="text" name="search_tel_input" id="phone_3" class="form-control" required value="<?php echo @$date['search_tel_input']; ?>">

        <div class="invalid-feedback">
            Введите телефон
        </div><br>
    <button id="search_tel_btn" type="submit" name="search_tel_btn" class="btn btn-success">Вывести</button><br>
    </form>
</div>
<?php
$date = $_POST;
if (isset($date['search_tel_btn'])) {
    $change = R::findOne('users', 'tel=?', array(@$date['search_tel_input']));
    echo ' 
 <div class="container col-8 text-center mt-3">
            <table class="table table-hover" style="background-color: whitesmoke">
                <thead class="thead-dark">
                <th >id</th>
                <th >login</th>
                <th >email</th>
                <th >tel</th>
                <th >tour</th>
                <th >place</th>
                <th >status</th>
                <th >comment</th>
                </tr>
                </thead><tbody>
<tr>
    <td>' . $change->id . '</td>
    <td>' . $change->login . '</td>
    <td>' . $change->email . '</td>
    <td>' . $change->tel . '</td>
    <td>' . $change->tour . '</td>
    <td>' . $change->place . '</td>
    <td>' . $change->status . '</td>
    <td>' . $change->comment . '</td>
   </tr>
   </tbody>
    </table></div>';
}

?>
<div class="container col-3 text-center">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate >
    <label for="input_id" class="mt-5">Введите tour для поиска</label><br>
    <input type="text" name="search_tour_input" class="form-control" required value="<?php echo @$date['search_tour_input']; ?>">
        <div class="invalid-feedback">
            Введите название тура
        </div><br>
    <button id="search_tour_btn" type="submit" name="search_tour_btn" class="btn btn-success">Вывести</button><br>
</form>
</div>
<?php
$date = $_POST;
if (isset($date['search_tour_input'])) {
    $change = R::find('users', 'tour=?', array(@$date['search_tour_input']));
    echo ' 
 <div class="container col-8 text-center mt-3">
            <table class="table table-hover" style="background-color: whitesmoke">
                <thead class="thead-dark">
                <th >id</th>
                <th >login</th>
                <th >email</th>
                <th >tel</th>
                <th >tour</th>
                <th >place</th>
                <th >status</th>
                <th >comment</th>
                </tr>
                </thead><tbody>';
    foreach ($change as $users) {
        echo '<tr>
    <td >' . $users->id . '</td>
    <td >' . $users->login . '</td>
    <td >' . $users->email . '</td>
    <td >' . $users->tel . '</td>
    <td >' . $users->tour . '</td>
    <td >' . $users->place . '</td>
    <td >' . $users->status . '</td>
    <td >' . $users->comment . '</td>
   </tr>';
    }
    echo '</tbody>
    </table></div>';
}

?>


    <h2 class="text-center mb-5 mt-5">Редактирование профиля клиента</h2><br>
<div class="container col-3 text-center">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
    <label for="input_id">Введите id для редактирования</label><br>
    <input type="text" name="input_id" class="form-control" required value="<?php echo @$date['input_id']; ?>">
    <div class="invalid-feedback">
        Введите id клиента
    </div><br>
    <button id="sign_up_id" type="submit" name="sign_up_id" class="btn btn-success">Вывести</button>
    <br>
</form>
</div>
<?php
$date = $_POST;
if (isset($date['sign_up_id'])) {
    $change = R::load('users', $date['input_id']);
    echo ' <div class="container col-12 text-center mt-3">
            <table class="table table-hover" style="background-color: whitesmoke">
                <thead class="thead-dark">
                <th >id</th>
                <th >login</th>
                <th >email</th>
                <th >tel</th>
                <th >tour</th>
                <th >place</th>
                <th >status</th>
                <th >comment</th>
                </tr>
                </thead><tbody>
<tr>
    <td >' . $change->id . '</td>
    <td >' . $change->login . '</td>
    <td >' . $change->email . '</td>
    <td >' . $change->tel . '</td>
    <td >' . $change->tour . '</td>
    <td >' . $change->place . '</td>
    <td >' . $change->status . '</td>
    <td >' . $change->comment . '</td>
   </tr> </tbody>
            </table></div>
';
}
?>
<?php if (isset($date['sign_up_id'])): ?>
    <form method="POST" class="needs-validation" novalidate action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="container col-12 mt-3">
            <table class="table table-hover" style="background-color: whitesmoke">
                <thead class="thead-dark">
                <th >id</th>
                <th >login</th>
                <th >email</th>
                <th >tel</th>
                <th >tour</th>
                <th >place</th>
                <th >status</th>
                <th >comment</th>
                </tr>
                </thead>
            <tr>
                <td ><?php echo $change->id; ?></td>
                <td><input type="text" name="client_login" class="form-control"
                                           value="<?php echo @$date['client_login'] = $change->login; ?>"></td>
                <td ><input type="text" name="client_email" class="form-control"
                                           value="<?php echo @$date['client_email'] = $change->email; ?>"></td>
                <td ><input type="text" name="client_tel" class="form-control"
                                           value="<?php echo @$date['client_tel'] = $change->tel; ?>"></td>
                <td ><input type="text" name="client_tour" class="form-control"
                                           value="<?php echo @$date['client_tour'] = $change->tour; ?>"></td>
                <td ><input type="text" name="client_place" class="form-control"
                                          value="<?php echo @$date['client_place'] = $change->place; ?>"></td>
                <td ><input type="text" name="client_status" class="form-control"
                                          value="<?php echo @$date['client_status'] = $change->status; ?>"></td>
                <td ><textarea name="client_comment" rows="5" cols="150" class="form-control"
                               value="<?php echo @$date['client_comment'] = $change->comment; ?>"><?php echo @$date['client_comment'] = $change->comment; ?></textarea></td>
            </tr>
                </tbody>
            </table></div>
        <div class="container col-3 text-center mt-3">
        <label  for="input_id">Подтвердите id для редактирования</label><br>
        <input id="check_input" type="text" name="input_id" class="form-control" required value="<?php echo @$date['input_id']; ?>">
            <div class="invalid-feedback">
                Введите id повторно для подтверждения
            </div><br>
        <button id="change_id" type="submit" name="change_id" class="btn btn-success">Изменить</button>
            <button id="del_id" type="submit" name="del_id" class="btn btn-danger">Удалить</button></form>
        </div>
<?php endif; ?>

<?php
$date = $_POST;
$errors = array();
if (isset($date['change_id'])) {
    $change = R::load('users', $date['input_id']);
    $change->login = $date['client_login'];
    $change->email = $date['client_email'];
    $change->tel = $date['client_tel'];
    $change->tour = $date['client_tour'];
    $change->place = $date['client_place'];
    $change->comment = $date['client_comment'];
    R::store($change);

}
if (isset($date['del_id'])) {
    $del = R::load('users', $date['input_id']);
    R::trash($del);
}
?>

<div class="container text-center">
    <h2 class="text-center mb-5 mt-5">Все профили клиентов</h2><br>
    <button class="btn btn-primary mb-5" type="button" data-toggle="collapse" data-target="#multiCollapseExample6"
            aria-expanded="false" aria-controls="#multiCollapseExample6">
        Открыть таблицу
    </button>
</div>
<div class="collapse multi-collapse " id="multiCollapseExample6">
<?php
if (isset($_SESSION['logged_user']) and $_SESSION['logged_user']->status == 5) {
    $user = R::findAll('users');
    echo '<div class="container col-12 text-center mt-3">
    <table class="table table-hover" style="background-color: whitesmoke">
        <thead class="thead-dark">
        <th >id</th>
        <th >login</th>
        <th >email</th>
        <th >tel</th>
        <th >tour</th>
        <th >place</th>
        <th >status</th>
        <th >comment</th>
        </tr>
        </thead><tbody>';
    foreach ($user as $users) {
        if ($users['status'] == 1) {
            echo '
<tr>
    <td >' . $users['id'] . '</td>
    <td>' . $users['login'] . '</td>
    <td >' . $users['email'] . '</td>
    <td >' . $users['tel'] . '</td>
    <td >' . $users['tour'] . '</td>
    <td>' . $users['place'] . '</td>
    <td >' . $users['status'] . '</td>
    <td >' . $users['comment'] . '</td>
   </tr>';
        }
    }
}
echo '</tbody>
    </table> <button class="btn btn-primary mb-5" type="button" data-toggle="collapse" data-target="#multiCollapseExample6"
            aria-expanded="false" aria-controls="#multiCollapseExample6">
        Закрыть таблицу
    </button></div>';
?>

</div>
<?php include 'footer.php'; ?>
</body>
</html>
    
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
            <span id="text_live">Все туры организуемые нашей компанией </span>
        </div>
    </div>
</div>
<div class="container col-lg-5 col-md-11" id="slide" style="border: 10px solid lightgrey;">
    <img class="img-fluid" src="images/img_slider/pr.jpg">
    <img class="img-fluid" src="images/img_slider/dis.jpg">
    <img class="img-fluid" src="images/img_slider/2048x1148_1334831_%5Bwww.ArtFile.ru%5D.jpeg">
    <img class="img-fluid" src="images/img_slider/nov.jpg">
    <img class="img-fluid" src="images/img_slider/2048x1152_1319712_%5Bwww.ArtFile.ru%5D.jpeg">
    <img class="img-fluid" src="images/img_slider/knight.jpg">
</div>
<div class="container col-8 mt-5  text-center">
        <div class="container">
            <h1 class="display-4" style="font-family: Gabriola; font-weight: bold; text-shadow: 2px 2px 4px gray; border-bottom: 3px gainsboro solid">Бронируйте туры онлайн!<br></h1>
            <p style="font-size:18px; font-weight: bold; text-shadow: 2px 2px 4px gray;">Регистрируйтесь на нашем сайте и бронируйте туры онлайн! Наши специалисты обязательно перезвонят вам и отвечут на все интересующие вас вопросы и порядок бронирования мест.</p>
            <?php if(!isset($_SESSION['logged_user'])):
                ?>
                <a  class="nav-link btn " style="background-color: lightgray;" data-toggle="modal" data-target="#exampleModalCenter1">
                    Регистрация
                </a>
            <?php endif;?>
        </div>
</div>
<?php if (isset($_SESSION['logged_user']) and $_SESSION['logged_user']->status == 5): ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
    <div class="container" style="border:2px lightgrey solid;border-radius: 8px; background-color: lightgrey ">
        <h3 class="text-center">Добавление туров</h3>
        <div class="form-group col-12">
            <label for="input_photo">Введите ссылку на картинку</label>
            <input type="url" class="form-control" name="input_photo" required
                   value="<?php echo @$tour['input_photo']; ?>">
            <div class="invalid-feedback">
                Введите ссылку на картинку
            </div>
        </div>
        <div class="form-group col-12">
            <label for="input_name">Введите название</label><br>
            <input class="form-control" type="text" name="input_name" required
                   value="<?php echo @$tour['input_name']; ?>">
            <div class="invalid-feedback">
                Введите название тура
            </div>
        </div>
        <div class="form-group col-12">
            <label for="input_comment">Введите описание</label>
            <textarea type="text" rows="10"  class="form-control" name="input_comment" required
                      value="<?php echo $tour['input_comment']; ?>"></textarea>
            <div class="invalid-feedback">
                Введите описание
            </div>
        </div>
        <div class="form-group col-4">
            <label for="add_tour">Введите тип</label>
            <select name="input_type" class="form-control" required>
                <option value="<?php echo @$tour['input_type'] = 'europe_tours.php'; ?>">Европейский тур</option>
                <option value="<?php echo @$tour['input_type'] = 'knights_tours.php'; ?>">Реконструкции битв и турниры
                </option>
                <option value="<?php echo @$tour['input_type'] = 'family_tours.php'; ?>">Семейный отдых</option>
                <option value="<?php echo @$tour['input_type'] = 'castle_tours.php'; ?>">Замки</option>
            </select>
        </div>
        <div class="form-group col-2 col-md-4">
            <label or="input_date">Введите дату</label>
            <input id="input_time"  type="date" class="form-control" name="input_date" required
                   value="<?php echo @$tour['input_date']; ?>">

            <div class="invalid-feedback">
                Введите дату
            </div>

        </div>
        <div class="form-group col-12">
            <label for="input_hotel">Введите ссылку на отель</label>
            <input type="url" class="form-control" name="input_hotel" required
                   value="<?php echo @$tour['input_hotel']; ?>">
            <div class="invalid-feedback">
                Введите ссылку
            </div>
        </div>
        <div class="form-group col-2 col-md-4">
            <label for="input_cost">Введите цену</label>
            <input type="text" class="form-control" name="input_cost" required
                   value="<?php echo @$tour['input_cost']; ?>">
            <div class="invalid-feedback">
                Введите стоимость
            </div>
        </div>
        <button type="submit" name="add_tour" class="btn btn-primary ml-3 mb-3">Добавить</button>
    </div>

    </div>
    </form>
    <div class="container col-2 col-md-4" style="background-color: lightgrey; border-radius: 8px">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="clients_info " class="needs-validation mt-5" novalidate>
            <label for="input_id" class="mt-3">Введите id для редактирования</label><br>
            <input type="number"  name="change_id" class="form-control" required
                   value="<?php echo @$recch['change_id']; ?>">
            <div class="invalid-feedback">
                Введите id тура
            </div><br>
            <button id="sign_up_id" type="submit" name="sign_up_id" class="btn btn-primary mb-3 ">Редактировать</button>
        </form>
    </div>

    <?php
    $recch = $_POST;
    if (isset($recch['sign_up_id'])):?>
        <?php $ch = R::findOne('tours', "id=?", array(@$recch['change_id'])) ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation mt-5" novalidate>
            <div class="container" style="border:2px lightgrey solid;border-radius: 8px; background-color: lightgrey ">
                <h3 class="text-center">Редактирование туров</h3>
                <div class="form-group col-12">
                    <input type="hidden" class="form-control" name="change_id"
                           required value="<?php echo @$change['change_id'] = $ch->id; ?>">
                    <div class="form-group col-12">
                        <label for="change_photo">Измените ссылку на картинку</label>
                        <input type="text" class="form-control" name="change_photo"
                               required value="<?php echo $change['change_photo'] = $ch->images; ?>">
                        <div class="invalid-feedback">
                            Введите ссылку на картинку
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="input_name">Измените название</label><br>
                        <input type="text" name="change_name" class="form-control"
                               required value="<?php echo @$change['change_name'] = $ch->tourname; ?>">
                        <div class="invalid-feedback">
                            Введите название тура
                        </div><br>
                    </div>
                    <div class="form-group  col-12">
                        <label for="change_comment">Изменить описание</label>
                        <textarea type="text" rows="10" name="change_comment" class="form-control"
                                  required  value="<?php echo $change['change_comment'] = $ch->comments; ?>"><?php echo $change['change_comment'] = $ch->comments; ?></textarea>
                        <div class="invalid-feedback">
                            Введите описание
                        </div>
                    </div>
                    <div class="form-group col-4">
                        <label for="change_type">Измените тип</label><br>
                        <select name="change_type" class="form-control">
                            <option value="<?php echo @$change['change_type'] = 'europe_tours.php'; ?>">Европейский
                                тур
                            </option>
                            <option value="<?php echo @$change['change_type'] = 'knights_tours.php'; ?>">Реконструкции
                                битв и турниры
                            </option>
                            <option value="<?php echo @$change['change_type'] = 'dis_tours.php'; ?>">Семейный отдых
                            </option>
                            <option value="<?php echo @$change['change_type'] = 'castle_tours.php'; ?>">Замки</option>
                        </select>
                        <div class="invalid-feedback">
                            Введите тип тура
                        </div>
                    </div>
                    <div class="form-group col-2 col-md-4">
                        <label for="change_date">Измените дату</label><br>
                        <input type="date" id="input_time" data-date="" data-date-format="DD MMMM YYYY" name="change_date" class="form-control"
                               required value="<?php echo @$change['change_date'] = $ch->date; ?>">
                        <script>
                            $(document).ready(function() {
                                $("#input_time").on("change", function () {
                                    this.setAttribute(
                                        "data-date",
                                        moment(this.value, "YYYY-MM-DD")
                                            .format(this.getAttribute("data-date-format"))
                                    )
                                }).trigger("change");
                            });
                        </script>
                        <div class="invalid-feedback">
                            Введите дату
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="change_hotel">Измените отель</label><br>
                        <input type="url" name="change_hotel" class="form-control"
                               required value="<?php echo @$change['change_hotel'] = $ch->hotel; ?>">
                        <div class="invalid-feedback">
                            Введите ссылку на отель
                        </div>
                    </div>
                    <div class="form-group col-2 col-md-4">
                        <label for="change_cost">Измените цену</label><br>
                        <input type="text" name="change_cost" class="form-control"
                               required value="<?php echo @$change['change_cost'] = $ch->cost; ?>">
                        <div class="invalid-feedback">
                            Введите цену тура
                        </div>
                    </div>
                    <button id="change_tour" type="submit" name="change_tour" class="btn btn-primary ml-3 ">Изменить</button>
                </div>
            </div>
        </form>
        <?php ;endif; ?>
<div class="container col-2 col-md-4" style="background-color: lightgrey; border-radius: 8px">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation mt-5" novalidate>
        <label for="del_tour" class="mt-3">Введите id удаляемого тура</label><br>
        <input type="number" name="del_tour" class="form-control" required
               value="<?php echo @$tour['del_tour']; ?>"><div class="invalid-feedback">
            Введите id тура
        </div><br>
        <div class="form-check ml-2">
        <input class="form-check-input " type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">
            Подтвердить удаление
        </label>
        <div class="invalid-feedback">
            Вы должны подтвердить удаление тура
        </div>
            </div><br>
        <button id="delete_tour" type="submit" name="delete_tour" class="btn btn-danger mb-3">Удалить</button>
    </form>
</div>
<?php endif; ?>

<div class="container-fluid">
    <div class="row">

        <?php
        $find = R::findAll('tours');
        foreach ($find as $tours) {
            $date = $tours['date'];
            $date_tour=date("d.m.Y", strtotime($date));
            date_default_timezone_set('Russia/Moscow');
            if ($tours['images'] !== null or $tours['comments'] !== null) {
                echo '<div class="card col-lg-3 col-md-11  mt-5 "  id="tours_container"style="overflow: hidden;margin-left: 6%">
';
                if (isset($_SESSION['logged_user']) and $_SESSION['logged_user']->status == 5) {
                    echo '<h5 class="card-text text-center mt-2">ID тура: ' . $tours['id'] . '</h5>';
                }
                echo ' <div class="card-top mt-3"  id="tours_container">  <a href="' . $tours['type'] . '">
        <img class="card-img " id="tour_photo" src="' . $tours['images'] . '" alt=""></a>
        </div>
        <div class="card-body text-center">
            <h5 class="card-title">' . $tours['tourname'] . '</h5>
            <p class="card-text">' . $tours['comments'] . '</p><br>
            </div>
            <ul class="list-group list-group-flush" >
            <li class="list-group-item"style="border-radius: 60px; background-color: lightgray">
            <i class="fas fa-calendar-alt fa-1x ml-1 mr-1" style="color: black"></i> Дата выезда:  ' . $date_tour . '        </li>
           
            <li class="list-group-item" style="border-radius: 60px; background-color: lightgray">
            <i class="fas fa-users fa-1x ml-1 mr-1" style="color: black"></i>   Количество свободных мест: ' . $tours['allplaces'] . '</li>
            <li class="list-group-item" style="border-radius: 60px; background-color: lightgray">
            <i class="fas fa-bed fa-1x ml-1 mr-1" style="color: black"></i> <a href="' . $tours['hotel'] . '">Отель</a></li>
            <li class="list-group-item" style="border-radius: 60px; background-color: lightgray">
            <i class="fas fa-hand-holding-usd fa-1x ml-1 mr-1" style="color: black"></i>   Стоимость: ' . $tours['cost'] . '$</li></ul>
            <li class="list-group-item " style="border:none; background-color: lightgray"><a href="' . $tours['type'] . '"><button class="btn btn-secondary mt-2 mb-2 mr-5">Подробнее</button></a></li></ul>';

                if (isset($_SESSION['logged_user'])) {
                    if ($_SESSION['logged_user']->place < 1 and $tours['allplaces']>1) {
                        $data['t'] = $tours['tourname'];
                        $data['d'] = $tours['date'];
                        echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '" class="needs-validation mt-5" novalidate>
                   <input type="hidden" name="t" value="' . @$data['t'] . '" <br>
                   <input type="hidden" name="d" value="' . @$data['d'] . '" <br>
                <label for="tel" class="ml-3"><i class="fas fa-street-view fa-1x ml-1 mr-1" style="color: black"></i>Введите количество мест:</label><br>
                <input type="number" min="1" max="' . $tours['allplaces'] . '" class="form-control col-6 ml-3" name="place" required value="' . @$data['place'] . '" > 
                <div class="invalid-feedback ml-3">
            Введите правильное количество мест от 1 до ' . $tours['allplaces'] . '
        </div>
                <button id="book_up" type="submit" name="book_up" class="btn btn-secondary mt-2 mb-2 mr-5 ml-3">Забронировать</button>
                </form>
                
                ';
                    }
                   elseif($tours['allplaces']<1){
                        echo ' <h5  class="mb-3 ml-3" style="color: crimson">К сожaлению на этот тур мест уже нет</h5>';
                    }

                }
                if (isset($_SESSION['logged_user'])) {
                    if ($_SESSION['logged_user']->place > 0) {
                        echo ' <div class="ml-3 text-center" ><span id="book_error" class="mb-3">Вы уже забронировали  тур</span><br>
                 <a  class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#exampleModalCenter">Изменить тур и количество мест</a>
    </div>';
                    }
                }
                if (!isset($_SESSION['logged_user'])) {
                    echo ' <div class="ml-3 text-center"><p class="mb-3" id="book_error">Только зарегестрированные пользователи
                    могут бронировать туры</p>
               <a  class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#exampleModalCenter1">
                Регистрация
            </a></div>
                ';
                }
                echo '</div>';

            }
        }
        ?>
    </div>
</div>
<?php
$change = $_POST;
if (isset($change['change_tour'])) {
    $rec = R::findOne('tours', "id=?", array($change['change_id']));
    $rec->images = $change['change_photo'];
    $rec->comments = $change['change_comment'];
    $rec->tourname = $change['change_name'];
    $rec->type = $change['change_type'];
    $rec->date = $change['change_date'];
    $rec->hotel = $change['change_hotel'];
    $rec->cost = $change['change_cost'];
    R::store($rec);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
<?php
$tour = $_POST;
if (isset($tour['add_tour'])) {
    $tours = R::dispense('tours');
    $tours->images = $tour['input_photo'];
    $tours->comments = $tour['input_comment'];
    $tours->tourname = $tour['input_name'];
    $tours->type = $tour['input_type'];
    $tours->date = $tour['input_date'];
    $tours->hotel = $tour['input_hotel'];
    $tours->cost = $tour['input_cost'];
    $tours->online = null;
    $tours->offline = null;
    $tours->allplaces = 40;
    R::store($tours);
    echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($tour['delete_tour'])) {
    $del = R::load('tours', $tour['del_tour']);
    R::trash($del);

}
$data = $_POST;
if (isset($data['book_up'])) {
    $user = $_SESSION['logged_user'];
    $user->tour = $data['t'];
    $user->place = $data['place'];
    $user->date = $data['d'];
    $user->confirm = 'Ждет подтверждения';
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
?>
<?php include 'footer.php'; ?>
</body>
</html>
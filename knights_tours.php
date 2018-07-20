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
            <span id="text_live">Туры "Реконструкции средневековых битв и фестивали"  </span>
        </div>
    </div>
</div>
<div class="container col-lg-5 col-md-11" id="slide" style="border: 10px solid #8e3035;">
    <img class="img-fluid" src="https://shakal.today/images/News/2017/Knights/Knights_main2.jpg">
    <img class="img-fluid" src="https://i.ytimg.com/vi/dG8MnQ70Czs/maxresdefault.jpg">
    <img class="img-fluid" src="https://static.riafan.ru/uploads/2017/05/05/orig-149398186220291f8941b4377190d0b8141bab5efa.jpeg">
    <img class="img-fluid" src="http://dk-korabel.com/wp-content/uploads/2017/09/knight-tournament-feodosia.jpg">
    <img class="img-fluid" src="https://c.pxhere.com/photos/5e/9b/knight_middle_ages_tournament_knights_joust_armor_horses-590976.jpg!d">

</div>
<div class="container col-8 mt-5  text-center">
    <div class="container">
        <h1 class="display-4" style="font-family: Gabriola; font-weight: bold; text-shadow: 2px 2px 4px gray; border-bottom: 3px gainsboro solid">Бронируйте туры онлайн!<br></h1>
        <p style="font-size:18px; font-weight: bold; text-shadow: 2px 2px 4px gray;">Регистрируйтесь на нашем сайте и бронируйте туры онлайн! Наши специалисты обязательно перезвонят вам и отвечут на все интересующие вас вопросы и порядок бронирования мест.</p>
        <?php if(!isset($_SESSION['logged_user'])):
            ?>
            <a  class="nav-link btn " style="background-color: #8e3035; color: white" data-toggle="modal" data-target="#exampleModalCenter1">
                Регистрация
            </a>
        <?php endif;?>
    </div>
</div>
<?php if ( isset($_SESSION['logged_user']) and $_SESSION['logged_user']->status == 5):?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="needs-validation" novalidate>
<div class="container" style="border:2px lightgrey solid;border-radius: 8px; background-color: lightgrey ">
        <h3 class="text-center">Добавление туров</h3>
    <div class="form-group col-12">
        <label for="input_video">Введите ссылку на видео с youtube</label>
        <input type="url" class="form-control" name="input_video" required value="<?php echo @$tour['input_video'];?>">
        <div class="invalid-feedback">
            Введите ссылку на видео
        </div>
    </div>
    <div class="form-group col-12">
        <label for="input_name">Введите название</label>
        <input class="form-control" type="text" name="input_name" required value="<?php echo @$tour['input_name'];?>">
        <div class="invalid-feedback" >
            Введите сназвание
        </div>
    </div>
    <div class="form-group col-12">
        <label for="input_comment">Введите расписание</label>
        <textarea type="text" rows="10"  class="form-control" name="input_comment" required value="<?php echo $tour['input_comment'];?>"></textarea>
        <div class="invalid-feedback" >
            Введите расписание
        </div>
    </div>

    <button type="submit" name="add_tour" class="btn btn-primary ml-3 mb-3">Добавить</button>
</div>
</form>

    <div class="container col-2 col-md-4" style="background-color: lightgrey; border-radius: 8px">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="clients_info " class="needs-validation mt-5" novalidate>
            <label for="input_id" class="mt-3">Введите id для редактирования</label><br>
            <input type="number" name="change_id" class="form-control" required
                   value="<?php echo @$recch['change_id'];?>">
            <div class="invalid-feedback">
                Введите id тура
            </div><br>
            <button id="sign_up_id" type="submit" name="sign_up_id" class="btn btn-primary mb-3 ">Редактировать</button>
        </form>
    </div>

    <?php
    $recch=$_POST;
    if( isset($recch['sign_up_id'])):?>
        <?php $ch = R::findOne('specifictours', "id=?", array(@$recch['change_id']))?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="needs-validation mt-5" novalidate>
            <div class="container" style="border:2px lightgrey solid;border-radius: 8px; background-color: lightgrey ">
                <h3 class="text-center">Редактирование туров</h3>
                <div class="form-group col-12">
                    <input type="hidden" class="form-control" name="change_id" required value="<?php echo @$change['change_id']=$ch->id;?>">
                    <div class="form-group col-12">
                        <label for="change_video">Измените ссылку на видео</label>
                        <input type="text" class="form-control" name="change_video" required value="<?php echo @$change['change_video']=$ch->video;?>">
                        <div class="invalid-feedback">
                            Введите ссылку на видео
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="input_name">Измените название</label><br>
                        <input type="text" name="change_name" class="form-control" required value="<?php echo @$change['change_name']=$ch->tourname;?>">
                        <div class="invalid-feedback">
                            Введите название
                        </div><br>
                    </div>
                    <div class="form-group  col-12">
                        <label for="change_comment">Введите описание</label>
                        <textarea rows="10"  type="text" wrap="hard" name="change_comment" class="form-control " required  value="<?php echo $change['change_comment']=$ch->comments;?>"><?php echo $change['change_comment']=$ch->comments;?></textarea>
                        <div class="invalid-feedback">
                            Введите расписание
                        </div>
                    </div>
                    <button id="change_tour" type="submit" name="change_tour" class="btn btn-primary ">Изменить</button>
                </div>
            </div>
        </form>
        </div>
        <?php;endif;?>
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
<?php endif;?>
<div class="container-fluid">

<?php
    $find = R::findAll('specifictours');
    foreach ($find as $specifictours) {

        if ($specifictours['video'] != null and $specifictours['tourname'] != null and $specifictours['type'] === 'knights_tours.php') {
            echo '
<div class="container col-lg-7 col-md-11">
              <div class="card  col-lg-12  col-md-12  mt-5 "  id="tours_container_k" style="overflow: hidden;">
    
    <div class="card-top mt-3 embed-responsive embed-responsive-16by9" id="tours_container">
  <iframe class="embed-responsive-item" src="' . $specifictours['video'] . '" allowfullscreen></iframe>
</div>
               <div class="card-body text-center">';
            if (isset($_SESSION['logged_user']) and $_SESSION['logged_user']->status == 5) {
                echo '<h5 class="card-text">ID тура: ' . $specifictours['id'] . '</h5><br>';
            }
            echo '<h2 class="card-title">' . $specifictours['tourname'] . '</h2>';
            echo ' <a class="btn btn-primary mt-3 mb-3" data-toggle="collapse" href="#' . $specifictours['id'] . '" role="button" aria-expanded="false" aria-controls="' . $specifictours['id'] . '">Открыть расписание мероприятий</a>';
           echo nl2br(' <div class="collapse multi-collapse text-left" id="' . $specifictours['id'] . '"><p class="card-text">' . $specifictours['comments'] . '</p><br><p class="text-center"><a class="btn btn-primary mb-3 " data-toggle="collapse" href="#' . $specifictours['id'] . '" role="button" aria-expanded="false" aria-controls="' . $specifictours['id'] . '">Закрыть расписание мероприятий</a></p></div>');
            $led = R::findOne('tours', "tourname=?", array($specifictours['tourname']));
            $date = $led->date;
            $date_tour=date("d.m.Y", strtotime($date));
            date_default_timezone_set('Russia/Moscow');
            echo '<ul class="list-group list-group-flush" id="tours_container_k_ul">
<li class="list-group-item"><i class="fas fa-mobile-alt fa-1x  mr-1" style="color: red">
</i> +375(29)8309988<i class="fas fa-mobile-alt fa-1x ml-3 mr-1" style="color: yellow"></i> +375(29)6306633
</i><i class="fas fa-fax fa-1x ml-3 mr-1" style="color: black"></i>+375(232)839988
<i class="fab fa-skype fa-1x ml-3 mr-1" style="color: skyblue"></i>WolvesTravel.by</li>
<li class="list-group-item"><i class="fas fa-calendar-alt fa-1x ml-5 mr-1" style="color: black"></i> Дата выезда: ' . $date_tour . ' <i class="fas fa-users fa-1x ml-5 mr-1" style="color: black"></i> Количество свободных мест: ' . $led->allplaces . '    </li>
            <li class="list-group-item"><i class="fas fa-bed fa-1x ml-5 mr-1" style="color: black"></i> <a href="' . $led->hotel . '">Отель</a>  <i class="fas fa-hand-holding-usd fa-1x ml-5 mr-1" style="color: black"></i>   Стоимость: ' . $led->cost . '$</li></ul>
                ';

            if (isset($_SESSION['logged_user'])) {
                if ($_SESSION['logged_user']->place < 1 and $led['allplaces']>1) {
                    $data['n'] = $led['tourname'];
                    $data['d'] = $led['date'];
                    echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '"
                 class="needs-validation mt-5" novalidate>
                   <input type="hidden" name="n" value="' . @$data['n'] . '" <br>
                   <input type="hidden" name="d" value="' . @$data['d'] . '" <br>
                <label for="place" class="">Введите количество мест</label><br>
                <input type="number" name="place" min="1" max="' . $led['allplaces'] . '" class="form-control col-3 " style="margin-left:37.5%" required value="' . @$data['place'] . '" >
                <div class="invalid-feedback" style="color: white">
            Введите правильное количество мест от 1 до ' . $led['allplaces'] . '
        </div><br>
                <button id="book_up" type="submit" name="book_up" class="btn btn-dark mt-2 mb-2 mr-5 ml-5">Забронировать</button>
                </form></div></div></div>
                ';
                }
                elseif($led['allplaces']<1){
                    echo ' <h5  class="mt-3 mb-3 ml-3" style="color: white">К сожaлению на этот тур мест уже нет</h5></div>';
                }
            }
            if (isset($_SESSION['logged_user'])) {
                if ($_SESSION['logged_user']->place > 0) {

                    echo ' <div class="ml-3 text-center"><span id="book_error" class="mb-3">Вы уже забронировали  тур</span><br>
                 <a  class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#exampleModalCenter">Изменить тур и количество мест</a>
    </div></div></div></div>
                
                ';
                }
            }
            if (!isset($_SESSION['logged_user'])) {
                echo ' <div class="ml-3"><p class="mb-3" id="book_error">Только зарегестрированные пользователи
                    могут бронировать туры</p>
               <a  class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#exampleModalCenter1">
                Регистрация
            </a></div></div></div></div>
                ';
            }
        }
    }

?>

</div>
<?php
$change=$_POST;
if( isset($change['change_tour'])){
    $rec=R::findOne('specifictours', "id=?", array($change['change_id']));
    if ($change['change_video']!=$rec->video){
        $str=$change['change_video'];
        $arr=explode("/",$str);
        $str="https://www.youtube.com/embed/".array_pop($arr);
        $rec->video=$str;}
    $rec->comments=$change['change_comment'];
    $rec->tourname=$change['change_name'];
    R::store($rec);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
<?php
$tour=$_POST;
if( isset($tour['add_tour'])){
    $add=R::dispense('specifictours');
    $str=$tour['input_video'];
    $arr=explode("/",$str);
    $str="https://www.youtube.com/embed/".array_pop($arr);
    $add->video=$str;
    $add->comments=$tour['input_comment'];
    $add->tourname=$tour['input_name'];
    $add->type='knights_tours.php';
    R::store($add);
    echo "<meta http-equiv='refresh' content='0'>";
}

if( isset($tour['delete_tour'])){
    $del = R::load('specifictours', $tour['del_tour']);
    R::trash($del);
    echo "<meta http-equiv='refresh' content='0'>";
}
$data=$_POST;
if( isset($data['book_up'])) {
    $user = $_SESSION['logged_user'];
    $user->tour =$data['n'];
    $user->date=$data['d'];
    $user->place = $data['place'];
    $user->confirm='Ждет подтверждения';
    R::store($user);
    $user = $_SESSION['logged_user'];
    $del = R::findOne('tours', "tourname=?", array(@$data['n']));
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

<?php include 'footer.php';?>
</body>
</html>

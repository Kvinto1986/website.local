
<header>

    <?php
    $data=$_POST;
    if( isset($data['sign_login'])) {
        $errors = array();
        $user = R::findOne('users', 'email=?', array($data['email']));
        if ($user) {
            if (password_verify($data['user_password'], $user->password)
            ) {
                $_SESSION['logged_user']=$user;

            } else {
                $errors[] = 'Неверно введен пароль';
            }
        } else {
            $errors[] = 'Неверно введен email ';
        }
    }

    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark " >
                    <a class="navbar-brand" href="main.php" style="text-decoration: none"><span
                            style="text-shadow: 6px 6px 6px #17A2B8;font-size: 55px;font-weight: bold;font-family:'Algerian', arial;
    color: white;">WOLVES TRAVEL</span>
                </a>
                    <button class="navbar-toggler btn  btn-outline-info btn-primary" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class=" col-8" >
            <ul class="navbar-nav ml-5" id="main_menu_list">
                <li class="nav-item">
                    <a class="nav-link" href="main.php">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="all_tours.php">Все туры</a>
                </li>
                <div class="dropdown show" style="color: white">
                    <a class=" nav-link dropdown-toggle" href="all_tours.php"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Выбор тура
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink" style="color: white">
                        <a class="dropdown-item" href="knights_tours.php">Реконструкции</a>
                        <a class="dropdown-item" href="europe_tours.php">Европа</a>
                        <a class="dropdown-item" href="castle_tours.php">Замки</a>
                        <a class="dropdown-item" href="family_tours.php">Семейный</a>
                        <a class="dropdown-item" href="way_tours.php">Ваш</a>
                    </div>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="way_tours.php">Направление</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="turists_info.php">Туристу</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="photo.php">Фотогалерея</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">О нас</a>
                </li>
                <?php
                if (isset($_SESSION['logged_user']) and $_SESSION['logged_user']->status == 5) {

                    echo '<li class="nav-item" >
                        <a class="nav-link btn btn-secondary " href = "admin.php">Админ</a >
                    </li >';}

                else
                    if (isset($_SESSION['logged_user']) and $_SESSION['logged_user']->status == 1) {
                        echo '<li class="nav-item">
                   
                    <a  class="nav-link btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
  Профиль
</a>
                </li>';
                    } else {
                        echo '<li class="nav-item">
                       <a  class="nav-link btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter1">
  Регистрация
</a>
                    </li>';
                    }

                ?>
            </ul>
        </div>
                <div class="col-4">
            <?php if ( isset($_SESSION['logged_user'])):?>
                    <div class="input-group ">
                <span class="input-group-addon mt-2 ml-5 "><i class="fas fa-user fa-3x" style="color: #17A2B8"></i></span>
                        <span class="input-group-addon ml-5 mt-2" style="color:#17A2B8;font-size: 25px "><?php echo $_SESSION['logged_user']->login; ?></span>
                <a class="btn  btn-outline-info btn-primary  btn-lg ml-5 mt-2" href="logout.php">
                        Выход</a>
                    </div>
                <?php endif;?>
            <?php if ( !isset($_SESSION['logged_user'])):?>
            <form class="form-inline " id="login_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                <div class="input-group mt-2">
                    <span class="input-group-addon ml-1 mr-2 mt-1"><i class="fas fa-envelope fa-2x" style="color: #17A2B8"></i></span>
                    <input class="form-control " type="email" name="email"  required value="<?php echo @$data['email'];?> ">

                    </div>
                <div class="input-group mt-2">
                    <span class="input-group-addon ml-1 mr-2 mt-1"><i class="fas fa-key fa-2x " style="color: #17A2B8"></i></span>
                    <input class="form-control " type="password" name="user_password" required value="<?php echo @$data['user_password'];?>  ">
                    </div>
                <button type="submit" class="btn  btn-outline-info btn-primary ml-4" name="sign_login" >Вход</button>
                <?php
                $data=$_POST;
                if( isset($data['sign_login'])) {
                    $errors = array();
                    $user = R::findOne('users', 'email=?', array($data['email']));
                    if ($user) {
                        if (password_verify($data['user_password'], $user->password)
                        ) {
                            $_SESSION['logged_user']=$user;

                        } else {
                            $errors[] = 'Неверно введен пароль';
                        }
                    } else {
                        $errors[] = 'Неверно введен email';
                    }
                    if (!empty($errors)) {
                        echo '
                    <span class="badge badge-pill  " 
                    style="background-color:darkred; color:white; font-size: 15px;width: 305px; margin-left: 7%;margin-top: 7%" >
                    '.array_shift($errors).'</span>';
                    }

                }
                ?>
            </form>
            <?php endif;?>
                </div>
        </div>
            </div>
        </nav>
    <div class="modal fade text-cetner" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Данные профиля</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Профиль</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Изменить данные профиля</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> <span class="list-group-addon ml-1 mr-2 mt-1"><i class="fas fa-user fa-1x" style="color: #17A2B8"></i><span class="ml-3">Имя пользователя: <?php echo $_SESSION['logged_user']->login;?></span></span></li>
                                <li class="list-group-item"><span class="list-group-addon ml-1 mr-2 mt-1"><i class="fas fa-envelope fa-1x" style="color: #17A2B8"></i><span class="ml-3">Email пользователя: <?php echo $_SESSION['logged_user']->email;?></span></span></li>
                                <li class="list-group-item"><span class="list-group-addon ml-1 mr-2 mt-1"><i class="fas fa-phone-square fa-1x" style="color: #17A2B8"></i><span class="ml-3">Телефон пользователя: <?php echo $_SESSION['logged_user']->tel;?></span></span></li>
                                <?php
                                if ($_SESSION['logged_user']->tour!==null):
                                ?>
                                <li class="list-group-item"><span class="list-group-addon ml-1 mr-2 mt-1"><i class="fas fa-map fa-1x" style="color: #17A2B8"></i><span class="ml-3">Забронированный тур: <?php echo $_SESSION['logged_user']->tour;?></span></span></li>
                                <li class="list-group-item"><span class="list-group-addon ml-1 mr-2 mt-1"><i class="fas fa-calendar-alt fa-1x" style="color: #17A2B8"></i><span class="ml-3">Дата выезда: <?php $date = $_SESSION['logged_user']->date;
                                            $date_tour=date("d.m.Y", strtotime($date));
                                            date_default_timezone_set('Russia/Moscow'); echo $date_tour;?></span></span></li>
                                <li class="list-group-item"><span class="list-group-addon ml-1 mr-2 mt-1"><i class="fas fa-street-view fa-1x" style="color: #17A2B8"></i><span class="ml-3">Количество мест: <?php echo $_SESSION['logged_user']->place;?></span></span></li>
                                <li class="list-group-item"><span class="list-group-addon ml-1 mr-2 mt-1"><i class="fas fa-check-circle fa-1x" style="color: #17A2B8"></i><span class="ml-3">Статус бронирования: <?php echo $_SESSION['logged_user']->confirm;?></span></span></li>
                                <?php endif;?>
                                <?php if ($_SESSION['logged_user']->confirm == 'Отклонен'):?>
                                    <li class="list-group-item"><span class="list-group-addon ml-1 mr-2 mt-1"><i class="fas fa-check-circle fa-1x" style="color: #17A2B8"></i><span class="ml-3">Статус бронирования: <?php echo $_SESSION['logged_user']->confirm;?></span></span></li>
                                <?php endif;?>
                                    <?php if ($_SESSION['logged_user']->comment!==null):
                                    ?>
                                <li class="list-group-item"><span class="list-group-addon ml-1 mr-2 mt-1"><i class="fas fa-comment fa-1x" style="color: #17A2B8"></i><span class="ml-3">Комментарий:<br> <?php echo $_SESSION['logged_user']->comment;?></span></span></li>
                                <?php endif;?>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div id="profile_container" class="profile_container_items text-center">
                                <h5 class="mt-2">При незаполненном поле останутся Ваши прежние данные</h5><br>
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="mt-3"  >
                                            <input type="text" name="login_ch" class="form-control" placeholder="Имя: <?php echo $_SESSION['logged_user']->login;?>" value="<?php echo @$data['login_ch'];?>"><br>
                                            <label for="password">Введите ваш новый пароль:</label><br>
                                            <input type="password" name="user_password_2"  class="form-control" placeholder="*****" value="<?php echo @$data['user_password_2'];?>"><br>
                                            <label for="password">Введите ваш новый пароль еще раз</label><br>
                                            <input type="password" name="user_password_3" class="form-control" placeholder="*****" value="<?php echo @$data['user_password_3'];?>"><br>
                                            <label for="email_ch">Введите вашу новую почту:</label><br>
                                            <input type="email" name="email_ch" class="form-control" placeholder="<?php echo $_SESSION['logged_user']->email;?>" value="<?php echo @$data['email_ch'];?>"><br>
                                            <label for="tel_ch">Введите новый номер телефона:</label><br>
                                    <script>$(document).ready(function(){
                                            $("#phone_2").inputmask("+375(99)999-99-99");
                                        });</script>
                                            <input type="tel" id="phone_2" name="tel_ch" class="form-control" placeholder="<?php echo $_SESSION['logged_user']->tel;?>" value="<?php echo @$data['tel_ch'];?>"><br>
                                            <label for="input_comment">Редактируйте ваш комментарий</label><br>
                                             <textarea name="input_comment" rows="10" class="form-control" value="<?php $data['input_comment'];?>"><?php echo $data['input_comment']=$_SESSION['logged_user']->comment;?></textarea><br>
                                    <button id="sign_up" type="submit" name="sign_up" class="btn  btn-success ">Изменить данные</button>
                                    <br>
                                    <?php if ($_SESSION['logged_user']->confirm == 'Отклонен'):?>
                                                <p style="font-size: 18px; color: red">Ваш заказ отклонен</p>
                                            <?php endif;?>
                                            <?php if ($_SESSION['logged_user']->place!=0):?>
                                                <h5 class="mt-5">Текущий забронированный тур: <h5 style="color: blue"><?php echo $_SESSION['logged_user']->tour;?></h5></h5>
                                                <h5>Текущее состояние заказа: <h5 style="color: blue"><?php echo $_SESSION['logged_user']->confirm;?></h5></h5>
                                                <br>
                                                <label for="book_tour">Забронированный тур:</label><br>
                                                <select  name="book_tour" class="form-control">
                                                    <option selected><?php echo $data['book_tour']=$_SESSION['logged_user']->tour;?></option>
                                                    <?php
                                                    $find = R::findAll('tours');
                                                    foreach ($find as $tours):?>
                                                        <option  value="<?php echo @$data['book_tour']=$tours['tourname'];?>"><?php echo $tours['tourname'];?></option>;
                                                        }
                                                    <?php endforeach;?>
                                                </select><br>
                                                <button id="sign_up" type="submit" name="sign_up" class="btn  btn-success ">Изменить тур</button><br>
                                                <label for="book_place" class="mt-5">Забронированные места:</label><br>
                                                <input type="number" min="1" max="40" name="book_place" class="form-control" placeholder="<?php echo @$data['book_place']=$_SESSION['logged_user']->place;?>" value="<?php echo @$data['book_place']?>"><br>
                                                <button id="sign_up" type="submit" name="sign_up" class="btn  btn-success ">Изменить количество мест</button>
                                                <br>
                                                <button id="delete" type="submit" name="delete" class="btn  btn-danger btn-block mt-3">Отменить бронирование</button>
                                            <?php endif;?>


                                </form>

                                <?php
                                $data=$_POST;
                                $user=$_SESSION['logged_user'];
                                if(isset($data['delete'])) {
                                    $deltour = R::findOne('tours', "tourname=?", array($user->tour));
                                    $userplace1 = $user->place;
                                    $onlineplace1 = $deltour['online'];
                                    $freeplace1 = $onlineplace1 - $userplace1;
                                    $deltour['online'] = $freeplace1;
                                    $allplace = 40;
                                    $onlineplace = $deltour['online'];
                                    $offlineplace = $deltour['offline'];
                                    $freeplace = $allplace - $onlineplace - $offlineplace;
                                    $deltour['allplaces'] = $freeplace;
                                    R::store($deltour);
                                    $user->place = 0;
                                    $user->tour=null;
                                    $user->date=null;
                                    $user->confirm='Отменен пользователем';
                                    R::store($user);
                                    echo "<meta http-equiv='refresh' content='0'>";
                                    echo '<i class="fas fa-check-circle fa-2x mr-3 mt-5" style="color: green"></i><h5>Ваши данные изменены успешно </h5>
        <a href="main.php" class="btn btn-success">Обновить данные</a>
        ';
                                }
                                ?>
                                <?php
                                if( isset($data['sign_up']))
                                {
                                    $_SESSION['logged_user']=$user;
                                    $errors=array();
                                    if ($data['user_password_2'] != $data['user_password_3']) {
                                        $errors[] = 'Введите верно повторный пароль';
                                    }
                                    if (R::count('users', "login=?", array($data['login_ch'])) > 0) {
                                        $errors[] = 'Пользователь с таким логином уже существует';
                                    }
                                    if (R::count('users', "email=?", array($data['email_ch'])) > 0) {
                                        $errors[] = 'Пользователь с таким email-ом уже существует';
                                    }
                                    if (R::count('users', "tel=?", array($data['tel_ch'])) > 0) {
                                        $errors[] = 'Пользователь с таким номером телефона уже существует';
                                    }
                                    if (empty($errors)) {
                                        if (trim($data['login_ch']) == '') {
                                            $user->login = $_SESSION['logged_user']->login;
                                        } else {
                                            $user->login = $data['login_ch'];
                                        }
                                        if (trim($data['email_ch']) == '') {
                                            $user->email = $_SESSION['logged_user']->email;
                                        } else {
                                            $user->email = $data['email_ch'];
                                        }
                                        if (trim($data['tel_ch']) == '') {
                                            $user->tel = $_SESSION['logged_user']->tel;
                                        } else {
                                            $user->tel = $data['tel_ch'];
                                        }

                                        if (trim($data['user_password_3']) == '') {
                                            $user->password = $_SESSION['logged_user']->password;
                                        } else {
                                            $user->password = password_hash($data['user_password_3'], PASSWORD_DEFAULT);
                                        }
                                        if ($_SESSION['logged_user']->place!=0) {
                                            $del = R::findOne('tours', "tourname=?", array($user->tour));
                                            if ($user->place != $data['book_place'] and $data['book_tour'] != $del['tourname'])
                                            {
                                                $userplace = $data['book_place'];
                                                $onlineplace = $del['online'];
                                                $freeplace = $onlineplace - $userplace;
                                                $del['online'] = $freeplace;
                                                $offlineplace = $del['offline'];
                                                $allplace = 40;
                                                $freeplace = $allplace - $freeplace - $offlineplace;
                                                $del['allplaces'] = $freeplace;
                                                R::store($del);
                                                $dell = R::findOne('tours', "tourname=?", array($data['book_tour']));
                                                $userplace1 = $data['book_place'];
                                                $onlineplace1 = $dell['online'];
                                                $freeplace1 = $onlineplace1 + $userplace1;
                                                $dell['online'] = $freeplace1;
                                                $allplace1 = 40;
                                                $onlineplace1 = $dell['online'];
                                                $offlineplace1 = $dell['offline'];
                                                $freeplace1 = $allplace1 - $onlineplace1 - $offlineplace1;
                                                $dell['allplaces'] = $freeplace1;
                                                R::store($dell);
                                            }
                                            if ($user->place != $data['book_place'] and $data['book_tour'] = $del['tourname']) {
                                                $useroldplace = $user->place;
                                                $usernewplace = $data['book_place'];
                                                $userplace = $data['book_place'] - $user->place;
                                                $onlineplace = $del['online'];
                                                $freeplace = $onlineplace + $userplace;
                                                $del['online'] = $freeplace;
                                                $offlineplace = $del['offline'];
                                                $allplace = 40;
                                                $freeplace = $allplace - $freeplace - $offlineplace;
                                                $del['allplaces'] = $freeplace;
                                                R::store($del);
                                            }

                                            if ($user->place = $data['book_place'] and $data['book_tour'] != $del['tourname']) {
                                                $userplace = $data['book_place'];
                                                $onlineplace = $del['online'];
                                                $freeplace = $onlineplace - $userplace;
                                                $del['online'] = $freeplace;
                                                $offlineplace = $del['offline'];
                                                $allplace = 40;
                                                $freeplace = $allplace - $freeplace - $offlineplace;
                                                $del['allplaces'] = $freeplace;
                                                R::store($del);
                                                $dell = R::findOne('tours', "tourname=?", array($data['book_tour']));
                                                $userplace = $data['book_place'];
                                                $onlineplace = $dell['online'];
                                                $freeplace = $onlineplace + $userplace;
                                                $dell['online'] = $freeplace;
                                                $allplace = 40;
                                                $onlineplace = $dell['online'];
                                                $offlineplace = $dell['offline'];
                                                $freeplace = $allplace - $onlineplace - $offlineplace;
                                                $dell['allplaces'] = $freeplace;
                                                R::store($dell);
                                            }


                                        }
                                        if ($data['input_comment']=='')
                                        {
                                            $user->comment=null;
                                        }
                                        else {
                                        $user->comment = $data['input_comment'];
                                        }
                                        $user->place=$data['book_place'];
                                        $user->tour=$data['book_tour'];
                                        $user->confirm='Ждет подтверждения';
                                        R::store($user);
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }
                                    else {
                                        echo '<h2 class="text-center mt-3" style="color: red">' . array_shift($errors) . '</h2>';
                                    }
                                }
                                ?>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-center" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center">
                <div class="modal-header text-center">
                    <h5 class="modal-title " id="exampleModalLongTitle">Регистрация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class=" needs-validation text-center" novalidate>
                            <label for="login" class="mt-4">Введите ваш логин:</label><br>
                            <input type="text" class="form-control" name="login" required value="<?php echo @$data['login'];?>"><br>
                            <div class="invalid-feedback" style="margin-top: -5%">
                                Введите логин
                            </div>
                            <label for="email" class="mt-4">Введите вашу почту:</label><br>
                            <input type="email"class="form-control"  name="email" required value="<?php echo @$data['email'];?>"><br>
                            <div class="invalid-feedback" style="margin-top: -5%">
                                Введите правильный Email
                            </div>
                            <label for="password" class="mt-4">Введите ваш пароль:</label><br>
                            <input type="password" class="form-control" name="user_password" required value="<?php echo @$data['user_password'];?>"><br>
                            <div class="invalid-feedback" style="margin-top: -5%">
                                Введите пароль
                            </div>
                            <label for="password" class="mt-4">Введите ваш пароль еще раз:</label><br>
                            <input type="password" class="form-control" name="user_password_2" required value="<?php echo @$data['user_password_2'];?>"><br>
                            <div class="invalid-feedback" style="margin-top: -5%">
                                Введите пароль еще раз
                            </div>
                            <label for="tel" class="mt-4">Введите ваш телефон:</label><br>
<script>$(document).ready(function(){
        $("#phone_1").inputmask("+375(99)999-99-99");
    });</script>

                            <input type="tel" id="phone_1" class="form-control" name="tel" required value="<?php echo @$data['tel'];?>"><br>
                            <div class="invalid-feedback" style="margin-top: -5%">
                                Введите телефон
                            </div>

                            <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function() {
                                    'use strict';
                                    window.addEventListener('load', function() {
                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                        var forms = document.getElementsByClassName('needs-validation');
                                        // Loop over them and prevent submission
                                        var validation = Array.prototype.filter.call(forms, function(form) {
                                            form.addEventListener('submit', function(event) {
                                                if (form.checkValidity() === false) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add('was-validated');
                                            }, false);
                                        });
                                    }, false);
                                })();
                            </script>
                            <button id="reg_up" class="btn btn-success mt-4" type="submit" name="reg_up">Регистрация</button>
                        </form>

                    <?php
                    $data=$_POST;
                    if( isset($data['reg_up']))
                    {
                        $errors=array();
                        if ($data['user_password']!=$data['user_password_2'])
                        {
                            $errors[]='Введите повторный пароль верно';
                        }
                        if (R::count('users',"login=?", array($data['login']))>0)
                        {
                            $errors[]='Пользователь с таким логином уже существует';
                        }
                        if (R::count('users',"email=?", array($data['email']))>0)
                        {
                            $errors[]='Пользователь с таким email-ом уже существует';
                        }
                        if (R::count('users',"tel=?", array($data['tel']))>0)
                        {
                            $errors[]='Пользователь с таким телефоном уже существует';
                        }
                        if (empty($errors)){
                            $user=R::dispense('users');
                            $user->login=$data['login'];
                            $user->email=$data['email'];
                            $user->comment=$data['comment'];
                            $user->tel=$data['tel'];
                            $user->status=1;
                            $user->tour=null;
                            $user->place=0;
                            $user->date=null;
                            $user->confirm=null;
                            $user->password=password_hash($data['user_password'], PASSWORD_DEFAULT);
                            R::store($user);
                            echo '<i class="fas fa-check-circle fa-2x mr-3 mt-5 " style="color: green"></i><h5>Вы успешно зарегистрированы</h5>
        <a href="main.php" class="btn btn-success">На главную</a>
        ';
                        }
                        else
                        {
                            echo '<h3  class="text-center" style="color: red">'.array_shift($errors).'</h3>';
                        }
                    }
                    ?>
                            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>

                </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
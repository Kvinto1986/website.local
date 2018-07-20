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
<?php
$data=$_POST;
if( isset($data['show_comment'])) {
    if (isset($_SESSION['logged_user'])) {
        $user = $_SESSION['logged_user'];
        $user->comment = $data['comment'];
        R::store($user);

    }
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
<?php include 'header.php';?>
<div class="container-fluid mt-2 " >
    <div class="row">
        <div class="col-1"></div>
        <div class="col-11 text-center">
            <span id="text_live">Информация для клиентов и отзывы наших клиентов  </span>
        </div>
    </div>
</div>
<div class="container col-lg-5 col-md-11" id="slide" style="border: 10px solid white;">
    <img class="img-fluid" src="https://espanarusa.com/files/autoupload/73/11/18/rf1vkg1x380921.jpg">
    <img class="img-fluid" src="https://images7.alphacoders.com/317/317196.jpg">
    <img class="img-fluid" src="http://media2.s-nbcnews.com/j/msnbc/components/video/201611/tdy_jackson_trump_161117.nbcnews-ux-1080-600.jpg">


</div>
<div class="container col-lg-6 mt-5 "  >
    <div class="row">
        <div class="col-lg-7 " style="overflow: hidden;" >
            <img class="img-fluid" style="width: 100%; height: 100%; border-radius: 8px" src="http://4stur.com.ua/media/text/viza/visa3.jpeg">
    </div>
            <div class="card col-lg-5 mt-2 mb-2">
                <div class="card-body">
                    <h5 class="card-title">Порядок получения шенгенской визы</h5>
                    <p class="card-text"> Шенгенская виза - это виза, которая даёт возможность свободно перемещаться по целому ряду государств Европейского союза, подписавших Шенгенское соглашение. Стоит обратить внимание, что не все страны-члены Евросоюза являются участниками Шенгенского соглашения.
                        Поэтому в некоторые европейские страны потребуется отдельная виза.</p>
                    <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#multiCollapseExample1"
                            aria-expanded="false" aria-controls="#multiCollapseExample1">
                        Читать
                    </button>
                </div>
            </div>
    </div>
</div>
<div class="container col-10">
    <div class="collapse multi-collapse col-12" id="multiCollapseExample1">
        <div class="card card-body mt-5 ">
            <div class="item-page item-page blognews">
                <h2>Как получить шенгенскую визу?</a>
                </h2>
                <p><span>Если вы собираетесь посетить какую-то из стран Европы, вам в большинстве случаев потребуется шенгенская виза. Это единая виза, которая дает возможность свободно перемещаться по целому ряду государств региона.</span></p>
                <p>&nbsp;</p>
                <p>Шенгенская виза не выдается любому желающему, для ее получения существует ряд условий. Поэтому иногда граждане получают отказ в такой визе, при этом в посольствах могут не объяснять причины отказа.</p>
                <p>В этой статье мы попробуем разобраться, что такое шенгенская виза и как увеличить шансы на ее получене.</p>
                <p>&nbsp;<br style="clear: both;"></p>
                <p><strong>Куда подавать заявление на визу?</strong></p>
                <p>Ответ на этот вопрос зависит от того, какое государство вы собираетесь посетить. Если вы намерены побывать только в одной стране, то вам просто надо обратиться в консульский отдел ее посольства. Кстати, собираясь в Германию, Чехию, Польшу, Литву или Латвию, в некоторых случаях вы можете подать заявление на получение национальной визы этих стран. Она стоит гораздо дешевле, однако выдается лишь в строго определенных случаях, не связанных с туристическими целями (поездки по работе, к родственникам и др.).</p>
                <p>&nbsp;</p>
                <p>В случае, если вы намерены побывать сразу в нескольких странах, обращаться следует в консульский отдел посольства той страны, которая является основным пунктом маршрута. Если же вы не выделяете какую-ту одну страну как главную, отправляйтесь в посольство того государства, которое намерены посетить первым.</p>
                <p><span style="line-height: 1.3em;">Вопросы получения визы в шенгенскую страну, у которой нет дипломатического представительства на территории Республики Беларусь, могут быть решены уполномоченными посольствами. Так, французское посольство выдает визы не только во Францию, но и в Испанию, Португалию, Норвегию и Исландию. Посольство Венгрии уполномочено выдавать швейцарские визы.</span></p>
                <p>&nbsp;</p>
                <p><span style="line-height: 1.3em;">Чтобы избавить себя от лишних хлопот с визовыми формальностями, вы можете обратиться в специализированную организацию, которая поможет вам легко собрать пакет документов в консульство, грамотно заполнить визовую анкету, помочь с переводом бумаг на иностранный язык, окажет курьерские услуги... Так, у нашей команды "VisaLand.by" за несколько лет работы на рынке появились серьезные наработки по открытию одноразовых и многоразовых шенгенских виз. Мы предлагаем полный набор визовых услуг, делая акцент на качество и оперативность.</span></p>
                <p>&nbsp;</p>
                <h3><span style="line-height: 1.3em;">Какие документы нужно подготовить?</span></h3>
                <p>Если вы собираетесь выехать в Шенгенскую зону, то, по закону, от вас могут потребовать ряд различных документов, которые оговорены в Шенгенском соглашении. Однако никто заранее не может угадать полный перечень бумаг, какие истребуют конкретно в вашем случае.</p>
                <p>Дело в том, что дополнительные документы требуются тогда, когда основные не убеждают консула однозначно в вашей благонадежности. Поэтому если, например, ваша зарплата не очень велика, что подтверждает справка с места работы, могут потребоваться другие бумаги, подтверждающие вашу финансовую стабильность (справка из банка о состоянии вашего счета и др.).</p>
                <p>Однако тот, кто претендует на получение шенгенской визы, в любом случае должен предоставить:</p>
                <ol>
                    <li>паспорт, имеющий не менее двух чистых страниц, выданный не более десяти лет назад и срок действия которого прекращается не менее чем через три месяца после даты выезда с территории Шенгенской зоны;</li>
                    <li>документы, которые подтверждают цель и характер поездки (приглашение частного лица, деловое приглашение, подтверждение брони отеля и проч.);</li>
                    <li>международную медицинскую страховку, действительную для всех стран Шенгена;</li>
                    <li>анкету, правильно заполненную и не содержащую ложных сведений (например, не нужно утаивать, если вы ранее обращались в посольство, и в визе было отказано);</li>
                    <li>бронь билетов на самолет, поезд или автобус (либо, если поездка осуществляется на своей машине, ксерокопии водительского удостоверения и техпаспорта, а также полис ОСГО по системе "Зеленая карта");</li>
                    <li>фотографии, сделанные незадолго до обращения в посольство. В некоторых посольствах предъявляют особые требования к тому, как вы должны выглядеть на снимках: с улыбкой или без, с очками или без оных, какую часть снимка должно занимать лицо, какой должен быть фон и др.</li>
                </ol>
                <p>&nbsp;</p>
                <p>При этом выезжающий гражданин должен располагать необходимой суммой денежных средств (на банковском счете, в виде наличных или трэвел-чеков) на каждый день пребывания в чужой стране, а также достаточной для возвращения обратно, - или предоставить гарантийные обязательства принимающей стороны по покрытию всех расходов, связанных с поездкой.</p>
                <p><span style="line-height: 1.3em;">Невыполнение хотя бы одного из вышеперечисленных условий автоматически влечет отказ в получении визы на въезд в Шенгенскую зону.</span></p>
                <p>&nbsp;</p>
                <p><span style="line-height: 1.3em;">Следует помнить, что несовершеннолетние должны выезжать за рубеж в сопровождении, по меньшей мере, одного из родителей; в иных случаях требуется письменное разрешение от обоих родителей. Подпись родителя в таком разрешении должна быть подтверждена и удостоверена нотариусом или в ЖЭСе. Кроме того у ребенка, независимо от его возраста, должен быть паспорт.</span></p>
                <p>&nbsp;</p>
                <h3>Что еще нужно знать?</h3>
                <p>Если гражданин едет в индивидуальном порядке (не через турфирму), для оформления шенгенской визы документы в консульский отдел посольства он должен подавать лично. Однако в этом случае турагентство или визовая служба может помочь подготовить требуемый пакет документов: правильно оформить анкету, подтвердить бронь в отеле, заказать билеты...</p>
                <p>Во французском посольстве личная подача обязательна в любом случае: это связано с тем, что там уже введена система сбора биометрических данных - отпечатков пальцев (в дальнейшем к этому должны прийти и в диппредставительствах других шенгенских стран). Хотя некоторых такая перспектива настораживает, в этом есть и свои плюсы: тем, кто сдал отпечатки один раз, в дальнейшем будет проще получить шенгенскую визу в любом посольстве.</p>
                <p>Кстати, в посольстве Франции для заявителей также предусмотрено собеседование с сотрудником консульской службы, которое играет далеко не последнюю роль в вопросе выдачи вам визы. Конечно же, стоит постараться произвести на консула хорошее впечатление: выглядеть опрятно, вести себя вежливо, говорить уверенно и не давать повода усомниться в правдивости своих слов.</p>
                <p>Если вы собираетесь побывать в зоне Шенгена несколько раз в течение сравнительно небольшого периода времени, для вас может быть выгодно получить многократную шенгенскую визу, или мультивизу. Правда, надо помнить, что для поездок с туристическими целями она не выдается.</p>
                <p>Срок действия шенгенской мультивизы - от месяца до двух лет. Однако находиться на территории Шенгенской зоны обычно разрешается лишь в течение количества дней, в сумме составляющего половину срока действия визы: для полугодовой это 90 дней, для годовой - 180 и т. д. Если этот лимит выбран, за месяц до фактического окончания действующей визы вы можете подать документы на получение новой.</p>
                <p>Для получения шенгенской визы вам необходимо заплатить консульский сбор. Как для однократной, так и для многократной визы он составляет 60 евро для взрослых. За детей в возрасте до 12 лет (не включительно) нужно платить 35 евро, а в посольствах некоторых стран Шенгена (например, Чехии) виза им выдается бесплатно. Кроме того, шенгенская виза всегда выдается бесплатно детям до 6 лет (не включительно) и иногда – неработающим пенсионерам в возрасте от 65 лет.</p>
                <p>Для трудоспособных взрослых в отдельных случаях (поездки с целью оздоровления, участия в научных конференциях и др.) консульский сбор также может быть уменьшен или вообще не взиматься, однако все это решается в индивидуальном порядке и зависит от договоренностей с приглашающей стороной. При отказе в получении визы консульский сбор не возвращается.</p>
                <p>В посольствах могут рассматривать документы заявителя на визу до 30 дней. Но, как показывает практика, все происходит гораздо быстрее.</p>
                <p>&nbsp;</p>
                <h3>Если в получении визы отказали...</h3>
                <p>Необходимо различать отказ в получении визы и запрет на въезд в страну. Второй случай гораздо серьезнее, запрет является суровой мерой и применяется к нарушителям правопорядка.</p>
                <p>Что касается отказа, его может получить как отдельное лицо, так и целая группа по вине одного или нескольких граждан, к которым возникли вопросы у работников паспортно-визовой службы (например, при выезде с территории Шенгенской зоны позже разрешенного срока). Каждый раз отказ в получении визы регистрируется в посольстве. В паспорте заявителя могут проставить штамп с датой обращения за визой, однако это не является правилом для всех посольств. Например, в одном посольстве ставят отметку в паспорт в случае обращения, а в другом - только при отказе. Наличие отметки в паспорте вовсе не говорит о том, что заявитель лишается права на получение визы в другом посольстве или при следующем обращении в это же.</p>
                <p>&nbsp;</p>
                <p><span style="line-height: 1.3em;">Если вы получили отказ в визе, проанализируйте причину данного решения. В подавляющем большинстве случаев оно обусловлено неточным соблюдением требований посольства. Рекомендуем повторно обращаться в посольство, когда у вас появятся новые сведения, свидетельствующие об изменении вашей ситуации.</span></p>
                <p>Специалисты также дают ряд советов, которые помогут вам повысить свои шансы на получение единой европейской визы.</p>
                <p>&nbsp;</p>
                <h3>Рекомендации специалистов</h3>
                <p>Если вы желаете получить шенгенскую визу, не лишним будет попытаться показать сотрудникам посольства, как вы "привязаны" к Беларуси. В качестве доказательств сойдут документы на недвижимость, выписка из банка о состоянии вашего счета, уставные документы на фирму, если вы являетесь ее совладельцем либо собственником. Правда, не во всяком посольстве эти бумаги могут быть приняты во внимание.</p>
                <p>Чаще всего отказ получают незамужние девушки и холостые молодые люди. Однако если у разведенной женщины в Беларуси остается ребенок, вероятнее всего, она получит визу.</p>
                <p>Студенты, которые занимаются на дневном отделении, и школьники должны представить справку из вуза/школы, подтверждающую факт их обучения в данном заведении, и разрешение на пропуск занятий на срок пребывания в зоне Шенгена, а также спонсорское письмо от одного из родителей (к письму прикладывается справка о доходах родителя с места его работы).</p>
                <p>Если вы предъявили паспорт, число различных виз в котором показывает, что вы являетесь заядлым путешественником, вероятность получения шенгенской визы существенно возрастает. Если вы собираетесь менять паспорт, постарайтесь сделать ксерокопии его страниц с отметками виз: это понадобится, чтобы при подаче документов вписать эти данные в специальную анкету.</p>
                <p>Увеличивают шансы на получение шенгенской визы грамотно составленная справка с места работы (лучше, если это госпредприятие) - на фирменном бланке с указанием всех реквизитов компании, а также, для некоторых посольств, хорошая трудовая книжка.</p>
                <p>&nbsp;</p>
                <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#multiCollapseExample1"
                        aria-expanded="false" aria-controls="#multiCollapseExample1">
                    Закрыть
                </button>
            </div>
        </div>
    </div>
</div>
<div class="container col-lg-6 mt-5 "  >
    <div class="row">
        <div class="col-lg-7 " style="overflow: hidden;" >
            <img class="img-fluid" style="width: 100%; height: 100%; border-radius: 8px" src="https://autopoisk24.net/wp-content/uploads/2014/03/NEOPLAN-Tourliner.jpg">
        </div>
        <div class="card col-lg-5 mt-2 mb-2">
            <div class="card-body">
                <h5 class="card-title">Правила поведения в автобусе и правила безопасности</h5>
                <p class="card-text">Заказчик (представитель Заказчика) или иное лицо, представляющее интересы группы (сопровождающий и т. п.), принимает на себя и несет ответственность за соблюдение
                    Правил поведения и основ техники безопасности на экскурсии согласно п. 5.7 </p>
                <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#multiCollapseExample2"
                        aria-expanded="false" aria-controls="#multiCollapseExample2">
                    Читать
                </button>
            </div>
        </div>
    </div>
</div>


<div class="container col-10">
    <div class="collapse multi-collapse col-12" id="multiCollapseExample2">
        <div class="card card-body mt-5 ">
            <div style="margin-bottom:50px;"><p><strong>ПРАВИЛА ПОВЕДЕНИЯ В АВТОБУСЕ И ПРАВИЛА БЕЗОПАСНОСТИ</strong></p>

                <ol>
                    <li>Пассажир должен бережно обращаться с оборудованием автобуса, не допускать его порчи.</li>
                    <li>Распитие спиртных напитков и курение в салоне и туалетной комнате строго запрещается!</li>
                    <li>Запрещается ходить по салону во время движения автобуса.</li>
                    <li>Запрещается стоять в проходах во время движения автобуса.</li>
                    <li>Категорически запрещается ставить сумки в проходах. В целях безопасности движения проход должен быть свободным.</li>
                    <li>Запрещается отвлекать водителя во время движения.</li>
                    <li>Мусор необходимо складывать в индивидуальные пакеты и выбрасывать в мусоросборник на стоянках. В процессе езды мусорные пакеты строго запрещается вешать на боковые ручки сидений автобуса, т.к.&nbsp;при чрезвычайной ситуации это может создать затруднение.</li>
                    <li>Полки над сидениями предназначены только для мелкой ручной клади.</li>
                    <li>Пользоваться кипятком можно только с разрешения водителя, руководителя группы или сопровождающего. Несанкционированное использование кипятильника может привести к его поломке, что сделает невозможным подогрев воды на протяжении всего путешествия.</li>
                    <li>Во избежание несчастных случаев пользоваться кипятком во время движения автобуса строго запрещается!</li>
                    <li>Пассажир несет ответственность за ущерб, нанесенный им транспортному средству.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</li>
                </ol>

                <p><strong>БЕЗОПАСНОСТЬ</strong></p>

                <ul>
                    <li><strong>Прежде всего убедитесь , что Вы правильно записали контактный телефон руководителя вашей группы, который он сообщает всем участникам тура в самом начале поездки !</strong></li>
                    <li>Если Вы заблудились в городе, Вам следует:&nbsp;<br>
                        <strong>1</strong>&nbsp;Связаться с сопровождающим по телефону и сообщить об этом.&nbsp;<br>
                        <strong>2</strong>&nbsp;Взять такси, сказать (или показать) место парковки или название и адрес отеля.&nbsp;<br>
                        <strong>3</strong>&nbsp;Обратиться к прохожим (полицейскому) с просьбой помочь и указать на карте место встречи или показать адрес (название) отеля.<br>
                        Вы также можете обратиться за помощью в полицейский участок, посольство РБ&nbsp; или позвонив в офис компании&nbsp; «ВНЕШИНТУРИСТ»&nbsp; (с 09:00 до 19:00 по минскому времени).+375&nbsp;173 35-26-85 или в офис компании, в которой Вы приобретали путевку .</li>
                    <li>График поездки подразумевает соблюдение его всеми участниками поездки, и если Вы решили покинуть группу —НЕОБХОДИМО сообщить об этом заранее. В любом случае, уточните у сопровождающего телефоны и адреса отелей по маршруту. Если Вы отстали от группы или у Вас возникли непредвиденные ситуации (потеря паспорта, денег и т.д.) — немедленно обращайтесь в полицию и просите направить Вас в консульство Республики Беларусь, где Вам должны оказать помощь.</li>
                    <li><strong>В случае, если Вы опоздали к&nbsp; назначенному руководителем группы месту и времени встречи, либо ко времени отъезда из отеля (например на отдыхе) более, чем на 15 мин и не предупредили по телефону руководителя группы либо туроператора в РБ, автобус с группой&nbsp; продолжают выполнение программы тура, а опоздавшие туристы добираются к месту следующей остановки автобуса самостоятельно (даже в случае, если следующая остановка предполагается в другом городе и стране) !!!</strong></li>
                    <li>Будьте внимательны: крупные города и туристические центры во всем мире привлекают жуликов и карманных воришек. Деньги и документы необходимо хранить так, чтобы они не стали добычей мошенников в то время, когда Вы осматриваете достопримечательности. К числу мест повышенной опасности относятся все вокзалы, аэропорты, где Вас могут вовлечь в азартные игры или совершить кражу, оставив без денег и/или документов.</li>
                    <li>Не оставляйте без присмотра Ваши вещи во избежание их кражи. Важно!! Будьте внимательны к своим вещам в холлах и ресторанах отелей. Не вешайте сумки на спинки стульев.</li>
                    <li><strong>Не оставляйте ценные вещи в автобусе, покидая его во время экскурсий, свободного времени и для размещения в отеле. ООО «Внешинтурист», равно как перевозчик и водители автобуса не несут ответственности за денежные средства и вещи, похищенные из салона или багажного отделения автобуса.</strong></li>
                </ul>

                <p><strong>ОТЕЛЬ</strong></p>

                <ul>
                    <li>В соответствии с законодательными нормами страны пребывания, размещение в отеле происходит при предъявлении паспорта. Администрация отеля вправе попросить туриста заполнить анкету, либо оставить паспорт на некоторое время, в этом случае не забудьте самостоятельно забрать свой паспорт на рецепции!</li>
                    <li>Размещение групп в отеле по международным правилам возможно не ранее 14:00, номера в день выезда необходимо освободить не позднее 10:00.</li>
                    <li>Не разрешается приносить в номер еду и напитки.</li>
                    <li>Напряжение в электрической сети – 220V, розетки европейского типа, рекомендуем взять с собой адаптер. Для подзарядки фото и видеоаппаратуры Вам может понадобиться тройник.</li>
                    <li>Не оставляйте ценные вещи без присмотра или у открытого окна в номере. Ваши ценные вещи всегда можно оставить на рецепции в сейфе (услуга, как правило, платная).</li>
                    <li><strong>ООО «Внешинтурист» не несет ответственности за денежные средства и вещи, похищенные у туристов во время пребывания в отеле.</strong></li>
                    <li>Внимание! Некоторые отели в Европе предлагают туристам в номере дополнительные платные услуги: горячие каналы по телевизору (обычно они выделяются красными кнопками на пульте), телефонные переговоры, мини бар с напитками и пр. В любом случае, прежде чем воспользоваться услугой, необходимо ознакомиться с ее стоимостью. В случае, если Вы воспользовались платными услугами – при выезде из отеля необходимо оплатить их стоимость на рецепции.</li>
                    <li>Необходимо помнить о том, что за завтраком и ужином «шведский стол» запрещается забирать еду с собой из ресторана, это может быть расценено как кража.</li>
                    <li><strong>Напитки за ужином в большинстве отелей платные и администрация отелей строго запрещает приносить и распивать за ужином&nbsp; любые напитки, не приобретенные в ресторане отеля!</strong></li>
                    <li>Ответственность и выплата компенсаций за причиненный отелю ущерб возлагается на туриста.</li>
                </ul>

                <p><strong>ПРАВИЛА НА ПАРОМЕ</strong></p>

                <ul>
                    <li><strong>Посадочный талон</strong>&nbsp;необходимо сохранять в течение всей поездки. На некоторых паромах посадочный талон необходим при выходе с парома. На паромах Tallink Silja Line талон необходимо предъявлять еще при входе в зал ожидания. Пройдя через турникет Вы уже не сможете выйти на улицу и Вам придется ожидать посадки на паром Tallink Silja Line в зале ожидания.</li>
                    <li>Пассажиры, находящиеся в состоянии опьянения, могут быть не допущены на борт парома.</li>
                    <li>При покупке товаров в магазинах Вы должны иметь при себе посадочный талон. Купленные в магазинах&nbsp;<strong>DUTY FREE</strong>&nbsp;алкогольные напитки нельзя распивать в ресторанах парома. При покупке алкогольных напитков помните о таможенных ограничениях на их ввоз.</li>
                    <li>На судне&nbsp;<strong>запрещено пользование</strong>&nbsp;утюгом, кипятильником и приборами для приготовления пищи.</li>
                    <li><strong>Курение&nbsp;</strong>в каютах строго запрещено. Пользуйтесь специально отведенными местами для курения.</li>
                    <li><strong>Запрещено</strong>&nbsp;фотографировать членов экипажа судна без их согласия.</li>
                    <li><strong>Бюро находок</strong>. Вещи, забытые на кораблях Tallink Silja/Viking Line, направляются в Центральное бюро находок Финляндии (Suomen LOYTOTAVARAPALVELU). Адрес: Kauppiaankatu 8-10, 00160 Helsinki, Финляндия. Тел. в Финляндии: 0600-41006. Все забытые алкогольные напитки остаются на корабле.</li>
                </ul>

                <p><strong>ТАМОЖЕННЫЕ ПРАВИЛА</strong></p>

                <ul>
                    <li>Разрешено беспрепятственно ввозить/вывозить наличную валюту в эквиваленте: до 3000 долларов – при устном декларировании; от 3000 до 10000 долларов – при письменном декларировании.</li>
                    <li>Ввоз/вывоз: алкогольных напитков свыше 1 литра, табачных изделий свыше 200 штук (в Польшу – свыше 40 штук!!) - облагается таможенной пошлиной. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                    <li>На территорию стран Евросоюза запрещено ввозить продукты, содержащие мясо или молоко, в том числе колбасу, консервы, сало и даже шоколадные конфеты. Запрет не распространяется на специальные препараты, необходимые для людей с определенными хроническими заболеваниями (в этом случае продукты должны быть тщательно упакованы, а их вес не должен превышать 2 кг). В случае обнаружения мясомолочных продуктов они будут конфискованы, а пассажиру придется заплатить штраф. Запрещены к ввозу взрывчатые вещества, радиоактивные вещества, наркотические вещества, сильнодействующие ядовитые вещества.</li>
                    <li>Ввозить на территорию Республики Беларусь разрешается личные вещи, а также продукты питания общей массой не более 30 кг на человека.</li>
                    <li><strong>Внимание!!</strong>&nbsp;В некоторых городах (Амстердам) разрешено употребление легких наркотиков. Вывоз любых наркотических средств через границу Нидерландов запрещен. Проверки (с привлечением собак) возможны не только при выезде из Евросоюза (польско–белорусская граница), но и на любой границе между шенгенскими странами.</li>
                </ul>

                <p>Уважаемые туристы! Помните, что вы сами несете всю ответственность за использование во время тура или провоз (попытку провоза) запрещенных или ограниченных в свободном обороте веществ или предметов, в том числе: алкогольных напитков, психотропных, наркотических, легковоспламеняющихся, взрывчатых веществ, биологических объектов, оружия и т.д., а также за последствия таких действий.</p>
                <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#multiCollapseExample2"
                        aria-expanded="false" aria-controls="#multiCollapseExample2">
                    Закрыть
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container col-8 mt-5 text-center"  >
        <div class="card" >
            <div class="card-header bg-transparent"><h3>Оставьте отзыв о нашей работе!</h3></div>
        <div class="card-body">
            <?php if (isset($_SESSION['logged_user']) and $_SESSION['logged_user']->comment==null ): ?>
            <div class="form-group text-center">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ;?>" class="needs-validation" novalidate>
                <textarea class="form-control" name="comment" id="comments_area" rows="5" required value="<?php echo @$data['comment'];?>"></textarea>
                <div class="invalid-feedback">
                    Вы не написали комментарий
                </div>
                <button class="btn btn-primary mt-2" type="submit" id="show_comment" name="show_comment" href="#comments_area">Оставить отзыв</button>
                </button>
            </form>
        </div>
            <?php endif;?>
            <?php if (isset($_SESSION['logged_user']) and  $_SESSION['logged_user']->comment!==null): ?>
               <div class="ml-3"><h5  class="mb-3" style="color: green">Вы уже оставили комментарий!</h5><br>
                    <a  class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#exampleModalCenter" style="color: whitesmoke">Изменить комментарий в профиле</a>
                </div>
            <?php endif;?>
            <?php if (!isset($_SESSION['logged_user'])): ?>
                <div class="ml-3"><p class="mb-3" id="book_error">Только зарегестрированные пользователи
                        могут оставлять комментарии</p>
                    <a  class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#exampleModalCenter1" style="color: white">
                        Регистрация
                    </a></div>
            <?php endif;?>
        </div>
        <div class="card-footer bg-transparent ">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="#multiCollapseExample3">
                Читать комментарии всех пользователей
            </button>
        </div>
    </div>
</div>
<div class="container col-8 mt-2">
    <div class="collapse multi-collapse" id="multiCollapseExample3" style="background-color: white">
        <table class="table">
            <tbody>

                <?php
                $find = R::findAll('users');
                foreach ($find as $users) {
                    if ($users['comment']!==null){
                        echo '<tr><td><i class="fas fa-user fa-1x" style="color: black"></i></td>
                <td>'. $users['login'].'</td>
                <td>'. $users['comment'].'</td></tr>';
                    }
                }
?>

            </tbody>
        </table>
        <button class="btn btn-primary btn-block  " type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="#multiCollapseExample3">
            Закрыть
        </button>
    </div>
</div>
<?php include 'footer.php';?>
</body>
</html>
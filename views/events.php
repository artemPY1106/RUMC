<?php 
	require_once('../php/connectdb.php');
?>
<div class="events-wrapper">
    <p class="other-pages-tittle first-word">МЕРОПРИЯТИЯ <i class="fa-regular fa-calendar-days"></i></p>
    <div class="head-events">
        <?php 
            $lastEvent = $conn->query('SELECT `idEvent`, `tittle`, `tittleImage` FROM `event` ORDER BY `idEvent` DESC LIMIT 1');
            foreach ($lastEvent as $row) {
                echo '
                    <div class="last-event first-word">
                        <a class="link-event" href="./event.php?id='.$row['idEvent'].'">
                            <div class="corner-lse">
                                <p class="first-word">НОВОЕ!</p>
                            </div>
                            <div class="img-event">
                                <img src="./'.$row['tittleImage'].'" />
                            </div>
                            <div class="tittle-event">
                                <p>
                                    '.$row['tittle'].'
                                </p>
                            </div>
                        </a>
                    </div>
                ';
            }
        ?>
        <div class="event-calendar-wrapper">
            <iframe src="https://calendar.yandex.ru/embed/month?&layer_ids=27699746&tz_id=Asia/Novosibirsk&layer_names=Календарь мероприятий РУМЦ"></iframe>
        </div>
    </div>
    <div class="type-events-wrapper">
        <ul>
            <li id="allEvents">ВСЕ</li>
            <li id="vebinars">ВЕБИНАРЫ</li>
            <li id="other">ДРУГОЕ</li>
        </ul>
    </div>
    <div class="all-news-wrapper">
        <?php 
            $allEvent = $conn->query('SELECT `idEvent`, `tittle`, `tittleImage` FROM `event` ORDER BY `idEvent` DESC');
            foreach ($allEvent as $row) {
                echo '
                    <div class="news-block">
                        <a class="link-event" href="./event.php?id='.$row['idEvent'].'">
                            <div class="img-event">
                                <img src="./'.$row['tittleImage'].'" />
                            </div>
                            <div class="tittle-event">
                                <p>
                                    '.$row['tittle'].'
                                </p>
                            </div>
                        </a>
                    </div>
                ';
            }
        ?>
    </div>
</div>
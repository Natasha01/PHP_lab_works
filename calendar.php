<?php

date_default_timezone_set('Europe/Minsk');

if ($_GET['y'] > 0) {
    $year = htmlspecialchars($_GET['y']);
} else {
    $year = date('Y');
}


function СreatingСalendar($m) {
    
    //$month = date('m',$m);
    
    $holidays = array(
        '011' => 'Новый год',
        '017' => 'Рождество Христово (православное Рождество)',
        '038' => 'День женщин',
        '051' => 'Праздник труда',
        '059' => 'День Победы',
        '073' => 'День Независимости Республики Беларусь (День Республики)',
        '117' => 'День Октябрьской революции',
        '1225' => 'Рождество Христово (католическое Рождество)',
        '1231' => 'НГ',
    );

    global $year;
    $today = date('Y-m-j', time());
    $ym = date('Y-m', mktime(0, 0, 0, $m, 1, $year));

    echo date('F', mktime(0, 0, 0, $m, 1, $year));
    
    $timestamp = strtotime($ym . '-01');
    if ($timestamp === false) {
        $timestamp = time();
    }
    $day_count = date('t', $timestamp);
 
    $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
    $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
 
    // 0:Sun 1:Mon 2:Tue ...
    $str = date('w', mktime(0, 0, 0, $m, 1, $year));
 
    global $week, $weeks;
    $weeks = array();
    $week = '';
 
    $week .= str_repeat('<td></td>', $str);
    $month = date('m',$timestamp);
 
    for ( $day = 1; $day <= $day_count; $day++, $str++) {
        
        $date = $ym.'-'.$day;   
        if ($today == $date) {
            if (isset($holidays[$month . $day])) {
                $holi = $holidays[$month . $day];
                $week .= "<td title='$holi' class='today holiday'>" . $day;
            } else {
                $week .= "<td class='today'>" . $day;
            }
        } else {
            if (isset($holidays[$month . $day])) {
                $holi = $holidays[$month . $day];
                $week .= "<td title='$holi' class='holiday'>" . $day;
            } else {
                $week .= '<td>' . $day;
            }
        }
        $week .= '</td>';    
        // End of the week OR End of the month
        if ($str % 7 == 6 || $day == $day_count) {       
            if($day == $day_count) {
                $week .= str_repeat('<td></td>', 6 - ($str % 7));
            }        
            $weeks[] = '<tr>'.$week.'</tr>';        
            $week = '';        
        }
    }   
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Календарь</title>
        <link rel="stylesheet" href="css/calendar.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    </head>
    <body>
    <div class="container">   
        <?php
            for ($i = 1; $i <= 12; $i++) {
                echo '<table class="table table-bordered">
                        <tr>
                            <th>S</th>
                            <th>M</th>
                            <th>T</th>
                            <th>W</th>
                            <th>T</th>
                            <th>F</th>
                            <th>S</th>
                        </tr>';                    
                    СreatingСalendar($i);
                    foreach ($weeks as $week) {
                        echo $week;
                    }
            }  
            echo "</table>";
        ?>       
    </div>
</body>
</html>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 //start the session first
 session_start();

/**
 * @param number ONE_DaY The result of 24hours x 3600 to get the value of 1 day in seconds
 */
define('ONE_DAY', 86400);
define('DATE_FORMAT', 'l, d/m/Y');
define('RESULTS_PER_PAGE', 30);

/**
 * @param date $TODAY STRING It returns todays date well formatted
 */
define('TODAY_FORMATTED', date(DATE_FORMAT));

/**
 * @param date $today REturns a date with the format d/m/Y
 */
define('TODAY' , date("d/m/Y"));

/**
 * Returns the current date
 * @param date $TODAY STRING It returns todays date in the format Y/m/d
 */
define('TODAY_STRING', date("Y/m/d"));

define('DAY', date("d"));
define('MONTH', date("m"));
define('YEAR', date("Y"));


function number($table, $type)
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
		OR die("Error connecting to the database");

    $new_query = "SELECT * FROM $table WHERE status_id = $type";
    $new_result = mysqli_query($dbc, $new_query);

    return mysqli_num_rows($new_result);
}

function glyphicon ($id)
{
    switch($id)
    {
        case -1:
            $span = '<span class="glyphicon glyphicon-ban-circle"></span>';
            break;
        case 1:
            $span = '<span class="glyphicon glyphicon-ok"></span>';
            break;
        case 3:
            $span = '<span class="glyphicon glyphicon-info-sign"></span>';
            break;
        default :
            $span = '';
            break;

    }

    return $span;
}

function form_query($table1, $table2, $using)
{

    $fnx_query = '';
}



function get_money($money)
{
    $regex = '/[\s\,\.\-]/';
    if(preg_match($regex, $money))
    {
        $filter = preg_filter($regex, '', $money);
    }
    else
    {
        $filter = $money;
    }

    return $filter;
}

function date_from_timestamp($timestamp)
{
    $array = explode(' ', $timestamp);
    $date = $array[0];


    $final_date = format_date($date);

    return $final_date;
}

function time_from_timestamp($string)
{
    $array = explode(' ', $string);
    $time = $array[1];

    $final_time = format_time($time);

    return $final_time;
}

function format_date($date)
{
    $date_string = strtotime($date);
    $final_date = date("l, d/M/Y", $date_string);

    return $final_date;
}

function format_month($date)
{
    $date_string = strtotime($date);
    $final_date = date("d F Y", $date_string);

    return $final_date;
}

function format_time($time)
{
    $time_string = strtotime($time);
    $final_time = date("h:i:s a", $time_string);

    return $final_time;
}

/**
 *
 * @param type $date it swaps a date from 12/02/2001 to 2001/02/12 and vice versa
 * @return string date
 */
function get_date($date)
{
    $pattern1 = '/\//';
    $pattern2 = '/[\-]/';

    if(preg_match($pattern2, $date))
    {
        $date_array = explode('-', $date);
        $day = $date_array[0];
        $month = $date_array[1];
        $year = $date_array[2];

        // Now build the date to the format Month/day/Year
        // So as to store in the database;


        $final_date = $month . '/' . $day . '/' . $year;
        return $final_date;
    }

    else if(preg_match ($pattern1, $date))
    {
        $date_array = explode('/', $date);
        $day = $date_array[0];
        $month = $date_array[1];
        $year = $date_array[2];

        // Now build the date to the format Month/day/Year
        // So as to store in the database;


        $final_date = $month . '/' . $day . '/' . $year;
        return $final_date;
    }
    else
    {
        return $date;
    }

}



function date_to_mysql_date($date)
{
    $pattern1 = '/\//';
    $pattern2 = '/[\-]/';

    if(preg_match($pattern2, $date))
    {
        $date_array = explode('-', $date);
        $day = $date_array[0];
        $month = $date_array[1];
        $year = $date_array[2];

        // Now build the date to the format Month/day/Year
        // So as to store in the database;


        $final_date = $year . '-' . $month . '-' . $day;
        return $final_date;
    }

    else if(preg_match ($pattern1, $date))
    {
        $date_array = explode('/', $date);
        $day = $date_array[0];
        $month = $date_array[1];
        $year = $date_array[2];

        // Now build the date to the format Month/day/Year
        // So as to store in the database;


        $final_date = $year . '-' . $month . '-' . $day;
        return $final_date;
    }
    else
    {
        return $date;
    }
}


function get_month_from_date($date)
{
    $pattern1 = '/\//';
    $pattern2 = '/[\-]/';

    if(preg_match($pattern2, $date))
    {
        $date_array = explode('-', $date);
        $day = $date_array[0];
        $month = $date_array[1];
        $year = $date_array[2];

        // Now build the date to the format Month/day/Year
        // So as to store in the database;


        $final_date = $month ;
        return $final_date;
    }

    else if(preg_match ($pattern1, $date))
    {
        $date_array = explode('/', $date);
        $day = $date_array[0];
        $month = $date_array[1];
        $year = $date_array[2];

        // Now build the date to the format Month/day/Year
        // So as to store in the database;


        $final_date = $month;
        return $final_date;
    }
    else
    {
        return $date;
    }
}

function filter($input)
{
    $db  = new dbc();
    $dbc = $db->get_instance();


    $data = trim(htmlentities(strip_tags($input)));

    if (get_magic_quotes_gpc())
		$data = stripslashes($data);

    $result = mysqli_real_escape_string($dbc, $data);

    return $result;
}

function filter_array($array)
{
    //loop through the array and filter each item
    foreach($array as $value)
    {
        //call the filter funciton just above
        filter($value);
    }
}

function get_number($number)
{
    $pattern = '/[\s\-\.\,\/]/';
    if(preg_match($pattern, $number))
    {
        $num = preg_filter($pattern, '', $number);
        return $num;
    }

    else
    {
        return $number;
    }
}

function days_between($start_date, $end_date)
{
    $date1 = strtotime($start_date);
    $date2 = strtotime($end_date);

    $diff = $date2 - $date1;

    return $diff / ONE_DAY;
}

function get_user_id()
{
    if(isset($_SESSION['user_id']))
    {
        return $_SESSION['user_id'];
    }
    else
    {
        return "NONE";
    }
}

function hash_key($key)
{
    return md5(sha1(sha1($key)));
}

function get_month($i)
{
    if($i == '1')
    {
        $month = 'January';
    }
    elseif($i == '2')
    {
        $month = "February";
    }
    elseif($i == '3')
    {
        $month = "March";
    }
    elseif($i == '4')
    {
        $month = "April";
    }
    elseif($i == '5')
    {
        $month = "May";
    }
    elseif($i == '6')
    {
        $month = "June";
    }
    elseif($i == '7')
    {
        $month = "July";
    }
    elseif($i == '8')
    {
        $month = "August";
    }
    elseif($i == '9')
    {
        $month = "September";
    }
    elseif($i == '10')
    {
        $month = "October";
    }
    elseif($i == '11')
    {
        $month = "November";
    }
    elseif($i == '12')
    {
        $month = "December";
    }
    else
    {
        $month = 'Invalid Month Number';
    }

    return $month;
}

function get_month2($i)
{
    if($i == '1')
    {
        $month = 'January';
    }
    elseif($i == '2')
    {
        $month = "February";
    }
    elseif($i == '3')
    {
        $month = "March";
    }
    elseif($i == '4')
    {
        $month = "April";
    }
    elseif($i == '5')
    {
        $month = "May";
    }
    elseif($i == '6')
    {
        $month = "June";
    }
    elseif($i == '7')
    {
        $month = "July";
    }
    elseif($i == '8')
    {
        $month = "August";
    }
    elseif($i == '9')
    {
        $month = "September";
    }
    elseif($i == '10')
    {
        $month = "October";
    }
    elseif($i == '11')
    {
        $month = "November";
    }
    elseif($i == '12')
    {
        $month = "December";
    }
    else
    {
        $month = ' ';
    }

    return $month;
}

function get_short_month($i)
{
    if($i == '1')
    {
        $month = 'Jan';
    }
    elseif($i == '2')
    {
        $month = "Feb";
    }
    elseif($i == '3')
    {
        $month = "March";
    }
    elseif($i == '4')
    {
        $month = "April";
    }
    elseif($i == '5')
    {
        $month = "May";
    }
    elseif($i == '6')
    {
        $month = "June";
    }
    elseif($i == '7')
    {
        $month = "July";
    }
    elseif($i == '8')
    {
        $month = "Aug";
    }
    elseif($i == '9')
    {
        $month = "Sept";
    }
    elseif($i == '10')
    {
        $month = "Oct";
    }
    elseif($i == '11')
    {
        $month = "Nov";
    }
    elseif($i == '12')
    {
        $month = "Dec";
    }
    else
    {
        $month = 'Invalid Month Number';
    }

    return $month;
}

function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

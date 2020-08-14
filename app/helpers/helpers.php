<?php

use Illuminate\Support\Facades\DB;
use XenditClient\XenditPHPClient;

// use DateInterval;
// use DatePeriod;
// use DateTime;
use Carbon\Carbon;

function rupiah($number)
{
    return "Rp " . number_format($number, 0, ',', '.');
}

function setActiveMenu($nav, $parent, $hasSub = 0)
{
    if (isset($nav) && isset($parent)) {
        if ($nav['menu'] == $parent) {
            if ($hasSub == 1) {
                return 'kt-menu__item--active kt-menu__item--open';
            } else {
                return 'kt-menu__item--active';
            }
        }
    }
}

function setActiveSubMenu($nav, $parent)
{
    if (isset($nav) && isset($parent)) {
        if ($nav['submenu'] == $parent) {
            return 'kt-menu__item--active';
        }
    }
}

function widgetActiveMenu($nav, $active)
{
    if (isset($nav) && isset($active)) {
        if ($nav['widgetmenu'] == $active) {
            return 'kt-widget__item--active';
        }
    }
}

// FOLDER SIZE
function formatSize($bytes)
{
    $kb = 1024;
    $mb = $kb * 1024;
    $gb = $mb * 1024;
    $tb = $gb * 1024;
    if (($bytes >= 0) && ($bytes < $kb)) {
        return $bytes . ' B';
    } elseif (($bytes >= $kb) && ($bytes < $mb)) {
        return round($bytes / $kb,2) . ' KB';
    } elseif (($bytes >= $mb) && ($bytes < $gb)) {
        return round($bytes / $mb,2) . ' MB';
    } elseif (($bytes >= $gb) && ($bytes < $tb)) {
        return round($bytes / $gb,2) . ' GB';
    } elseif ($bytes >= $tb) {
        return round($bytes / $tb,2) . ' TB';
    } else {
        return $bytes . ' B';
    }
}

function folderSize($dir)
{
    $total_size = 0;
    $count = 0;
    $dir_array = scandir($dir);
    foreach ($dir_array as $key => $filename) {
        if ($filename != ".." && $filename != ".") {
            if (is_dir($dir . "/" . $filename)) {
                $new_foldersize = foldersize($dir . "/" . $filename);
                $total_size = $total_size + $new_foldersize;
            } else if (is_file($dir . "/" . $filename)) {
                $total_size = $total_size + filesize($dir . "/" . $filename);
                $count++;
            }
        }
    }
    return $total_size;
}

function getThumbs($path)
{
    $img = $path;
    $img_thumb = explode('/', $img);
    $directory = dirname($img);

    $thumbnail = $directory . '/thumbs/' . end($img_thumb);

    return $thumbnail;
}

function randomPassword()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function transactionStatus($token)
{
    $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
    $XGateway = new XenditPHPClient($option);

    $responses = $XGateway->getInvoice($token);

    return $responses['status'];

}

function createTransaction($external_id, $amount, $payer_email, $description, $success_redirect_url)
{
    $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
    $XGateway = new XenditPHPClient($option);

    $responses = $XGateway->createInvoice($external_id, $amount, $payer_email, $description, $success_redirect_url);

    return $responses;
}

function getYoutubeID($url)
{
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    return $match[1];
}

function formatDateTime($date)
{
    if (empty($date)) {
        return '-';
    }
    return \Carbon\Carbon::parse($date)->formatLocalized('%A, %d %h %Y, %H:%M');
}

function formatDateOnly($date){
    if (empty($date)) {
        return '-';
    }
    return \Carbon\Carbon::parse($date)->formatLocalized('%A, %d %h %Y');
}

// from https://write.corbpie.com/converting-minutes-to-hours-and-minutes-with-php/
function hoursandmins($time, $format = '%02d:%02d')
{

    if ($time < 1) {
        return '-';
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

function makeDaterange($start, $end, $interval)
{
    $begin_ = new DateTime(Carbon::parse($start)->format(DateTime::ATOM));
    $end_ = new DateTime(Carbon::parse($end)->format(DateTime::ATOM));

    $interval = new DateInterval($interval);

    $daterange = new DatePeriod($begin_, $interval, $end_);

    return $daterange;
}

function set_db_lang_format()
{
    $my = auth()->user();
    $lang = collect(DB::select('SELECT @@lc_time_names as lang'))->first();
    if ($lang->lang != $my->lang) {
        DB::statement('SET lc_time_names = ?', [$my->lang]);
    }
}

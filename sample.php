<?php

require_once __DIR__ . "/vendor/autoload.php";

use ArrayCollection\Vector;
use ArrayCollection\HashMap;

var_dump(phpversion());

$a = ["foo" => "bar"];
$b = new HashMap($a);

// PHP 7系はWarning出ないけどPHP 8系はWarning出る
var_dump($a["bar"]);
// PHP 7系もPHP 8系もWarning出ない
var_dump($b["bar"]);

$c = [1, 2, 3];
$d = new Vector($c);

// PHP 7系はWarning出ないけどPHP 8系はWarning出る
var_dump($c[3]);
// PHP 7系もPHP 8系もWarning出ない
var_dump($d[3]);

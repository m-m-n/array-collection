<?php

require_once __DIR__ . "/vendor/autoload.php";

use ArrayCollection\Vector;
use ArrayCollection\HashMap;

var_dump(phpversion());

$a = ["foo" => "bar"];
$b = new HashMap($a);

var_dump($a["bar"]);
var_dump($b["bar"]);

$c = [1, 2, 3];
$d = new Vector($c);

var_dump($c[3]);
var_dump($d[3]);

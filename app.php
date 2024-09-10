<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Value as Value;
use \App\Bin as Bin;
use \App\Rate as Rate;


 $value = new Value($argv[1]);

 $bin = new Bin($value->getData());
 $binResults = $bin->getData();

 $rate = new Rate($value->getData());
 $rateResult = $rate->getData();

$data = $rate->calculateCommissions($binResults);


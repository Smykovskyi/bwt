<?php

namespace App;


class Bin
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $this->binResult($data);
    }

    public function getData()
    {
        return $this->data;
    }

    protected function binResult($data)
    {
        $raw = [];

        foreach($data as $value) {
            echo 'Value in Bin ';
            var_dump($value);
            $result = file_get_contents('https://lookup.binlist.net/' . $value->bin);
            var_dump($result);

            if(!$result) {
                die('Error!');
            }

            $r = json_decode($result);
            // Add new property to our Obj
            $r->isEu = $this->isEu($r->country->alpha2 ?: null);

            $raw[] = $r;
        }
        return $raw;
    }

    protected function isEu($country)
    {
        $countryList = include __DIR__ . '/../data.php';

        if(in_array($country, $countryList)) {
            return true;
        }
        return false;

    }

}
<?php


namespace App;


class Value
{
    protected $data;

    public function __construct($data)
    {
        $raw_data = explode("\n", file_get_contents($data));

        foreach($raw_data as $value) {
            if($this->isEmpty($value)) {
                die('You do not have data');
            }
            $this->data[] = json_decode($value);
        }
    }

    public function getData()
    {
        return $this->data;
    }

    protected function isEmpty($data)
    {
        if(empty($data)) {
            return true;
        }
    }

}
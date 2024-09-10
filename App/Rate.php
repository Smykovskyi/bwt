<?php


namespace App;


class Rate
{
    protected $data;

    public function __construct($data)
    {
        foreach($data as $value) {
            echo 'Value in Rate: ';
            var_dump($value);
            $rate = json_decode(file_get_contents('https://api.exchangeratesapi.io/latest'), true)['rates'][$value->currency];
            echo 'Rate: ';
            var_dump($rate);

            if($this->isEur($value->currency or $this->rateIsZero($rate))) {
                $this->data[] = $value->amount;
            } else {
                $this->data[] = $value->amount / $rate;
            }
        }
    }

    public function getData()
    {
        return $this->data;
    }

    public function calculateCommissions($data)
    {
        $result = [];

        foreach($data as $value) {
            foreach ($this->data as $v) {
                var_dump($value);
                $result[] = $value * (true == $v->isEu ? 0.01 : 0.02);
            }
        }
        return $result;
    }

    protected function isEur($data)
    {
        if($data == 'EUR') {
            return true;
        }
        return false;
    }

    protected function rateIsZero($data) {
        if($data == 0) {
            return true;
        }
        return false;
    }
}
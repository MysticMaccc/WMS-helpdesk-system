<?php

namespace App;

trait UtilitiesTrait
{
    public function generateReferenceNumber()
    {
        $date = now()->format('YmdHis');
        $random = mt_rand(1000000000, 9999999999);

        return $date . '-' . $random;
    }
}

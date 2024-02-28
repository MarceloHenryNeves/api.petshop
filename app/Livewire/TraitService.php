<?php

namespace App\Livewire;

trait TraitService
{
    public static function prizeCalculate($base_prize, $size_prize, $coat_prize){
        return $base_prize + $size_prize + $coat_prize;
    }

}

<?php
namespace App\Helpers;

interface ArabicToRoman {
    public function convert(int $number):string;
}

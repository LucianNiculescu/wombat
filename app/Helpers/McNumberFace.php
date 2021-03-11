<?php
namespace App\Helpers;

interface McNumberFace {
    public function convert(int $number): string;
}

<?php

namespace App\Logic;

/**
 * Class McNumberFace used for client Numeral McNumberFace implementing the ArabicToRoman interface
 * Used to generate roman numbers from a given arabic number between 1 and 3999
 *
 * NOTICE: because there's not a consensus on what constitutes a valid Roman number, numbers like 1999 can be both represented as 'MIM', 'MDCCCCLXXXXVIIII' or 'MCMXCIX'
 */
class Client {
    /*
     * Properties of the class
     * For the moment we are using only one static property
     */
    protected $map = [
        'M'     => 1000,
        'CM'    => 900,
        'D'     => 500,
        'CD'    => 400,
        'C'     => 100,
        'XC'    => 90,
        'L'     => 50,
        'XL'    => 40,
        'X'     => 10,
        'IX'    => 9,
        'V'     => 5,
        'IV'    => 4,
        'I'     => 1
    ];

    /**
     * Checks if the number is between 0 and 3999 and if it's integer
     *
     * @param int $number
     * @return boolean
     */
    protected function checkArabicNumber($number):bool {
        if(!empty($number) && is_integer($number) && $number < 4000)
            return true;

        //Default return value is false
        return false;
    }
}

<?php

namespace App\Helpers;

/**
 * Class McNumberFace used for client Numeral McNumberFace implementing the ArabicToRoman interface
 * Used to generate roman numbers from a given arabic number between 1 and 3999
 *
 * NOTICE: because there's not a consensus on what constitutes a valid Roman number, numbers like 1999 can be both represented as 'MIM', 'MDCCCCLXXXXVIIII' or 'MCMXCIX'
 */
class McNumberFace implements ArabicToRoman {
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
     * Generates a roman number from a given arabic integer
     *
     * @param int $number
     * @return bool|string
     */
    public function convert(int $number):string {
        $returnValue = '';

        //Check if the number is supported
        if(!self::checkArabicNumber($number))
            return false;

        //Create the roman representation by looping through the number and extracting the actual number of the roman letter from it
        while( $number > 0 ) {
            foreach( $this->map as $roman => $int ) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }

        return $returnValue;
    }

    /**
     * Checks if the number is between 0 and 3999 and if it's integer
     *
     * @param int $number
     * @return boolean
     */
    private function checkArabicNumber(int $number):bool {
        if(!empty($number) && is_integer($number) && $number < 4000)
            return true;

        //Default return value is false
        return false;
    }
}

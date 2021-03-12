<?php

namespace App\Logic;

/**
 * Class McNumberFace used for client Numeral McNumberFace implementing the ArabicToRoman interface
 * Used to generate roman numbers from a given arabic number between 1 and 3999
 *
 * NOTICE: because there's not a consensus on what constitutes a valid Roman number, numbers like 1999 can be both represented as 'MIM', 'MDCCCCLXXXXVIIII' or 'MCMXCIX'
 */
class McNumberFace extends Client implements ArabicToRoman {

    /**
     * Generates a roman number from a given arabic integer
     *
     * @param $number
     * @return bool|string
     */
    public function convert($number):string {
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
}

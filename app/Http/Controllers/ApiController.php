<?php

namespace App\Http\Controllers;

use App\Helpers\ArabicToRoman;
use App\Models\Conversion;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $result = [
        'success'   => false,
        'data'      => []
    ];

    /**
     * Converts the given input arabic_number to a roman number and saves it into DB
     * @return array
     */
    public function convertArabicToRoman():array {
        //Get the input parameter from the request
        $arabicNumber   = \Request::all()['arabic_number'];
        //Validate if we have the input
        if(empty($arabicNumber) || !is_int((int) $arabicNumber)) {
            $this->result['errors'] = 'Please supply a valid parameter: arabic_number';
            return $this->result;
        }

        $romanNumber    = new ArabicToRoman();
        $romanNumber    = $romanNumber->convert($arabicNumber);
        $conversion     = '';
        //Check if we have a string ( that means it's a valid Roman number )
        if(!empty($romanNumber) && is_string($romanNumber)) {
            //Save in the database
            $conversion         = new Conversion();
            $conversion->input  = $arabicNumber;
            $conversion->output = $romanNumber;
            $conversion->save();
        }
        $this->result['success']    = true;
        $this->result['data']       = $conversion;

        return $this->result;
    }
}

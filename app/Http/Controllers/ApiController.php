<?php

namespace App\Http\Controllers;

use App\Logic\McNumberFace;
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
        //Convert the input to int ( for the strings that include numbers )
        $arabicNumber = (int) $arabicNumber;

        $romanNumber    = new McNumberFace();
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

    /**
     * Gets the most recent conversions with a simple pagination
     * @return array
     */
    public function getRecentlyConversions():array {
        //Retrieve the latest 10 records
        $conversions = Conversion::orderBy('updated_at', 'desc')->simplePaginate(10);
        //Validation if we don't have any conversions
        if($conversions->count() < 1)
            return $this->result;
        //Set the successful result and return it
        $this->result['success']    = true;
        $this->result['data']       = $conversions;

        return $this->result;

    }

    /**
     * Gets the top 10 conversions
     *
     * @return array
     */
    public function getTop10Conversions():array {
        //Retrieve the top 10 conversions
        $conversions = Conversion::selectRaw('count(*) as total, input, output, updated_at')
            ->groupBy('input')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();
        //Validation if we don't have any conversions
        if($conversions->count() < 1)
            return $this->result;

        //Set the successful result and return it
        $this->result['success']    = true;
        $this->result['data']       = $conversions;

        return $this->result;
    }
}

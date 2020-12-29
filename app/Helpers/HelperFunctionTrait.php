<?php

namespace App\Helpers;

use DateTime;


trait HelperFunctionTrait
{
    ///////////////////////////////////////////////////////////
    // Ahmed
    ///////////////////////////////////////////////////////////

    public function getMonthNameByDate($date)
    {
        $monthNum  = date('m', strtotime($date));
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);

        return $dateObj->format('F');
    }

    ////****************************************************////

    //------------------------------------------------------------------//

    ///////////////////////////////////////////////////////////
    // Mohammed
    ///////////////////////////////////////////////////////////


    /**
     * Generate Random String
     *
     * @param integer $length
     * @return void
     */
    public function randomCode($length = 8)
    {
        // 0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ
        // $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
    ////****************************************************////
    /**
     * Generate Random String
     *
     * @param integer $length
     * @return void
     */
    public function randomString($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        // $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
    ////****************************************************////

    public function validFieldOrNot($data, $validationArray)
    {
    }
}

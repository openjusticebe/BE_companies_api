<?php

namespace App\Helpers;

class Helper
{
    public static function fixEnterpriseNumber($EnterpriseNumberRequest)
    {
        # remove non-numeric characters
        $EnterpriseNumber = preg_replace('/[^0-9]/', '', $EnterpriseNumberRequest);

        # if the EnterpriseNumber is not 10 characters long and does not starts with 0, add a 0
        if (strlen($EnterpriseNumber) != 10 && substr($EnterpriseNumber, 0, 1) != '0') {
            $EnterpriseNumber = '0' . $EnterpriseNumber;
        }
   
        # add . every after the 4th character and the 7th character
        $EnterpriseNumber = substr($EnterpriseNumber, 0, 4) . '.' . substr($EnterpriseNumber, 4, 3) . '.' . substr($EnterpriseNumber, 7, 3);

        return $EnterpriseNumber;
    }
}

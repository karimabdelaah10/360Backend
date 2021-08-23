<?php

namespace App\Modules\BaseApp\Enums;

abstract class GeneralEnum
{
    const PENDING = 'pending',
          TRANSFORMED='transformed',
          IN_STOCK='in_stock',

          UNDER_REVIEW='under_review',
          WITH_SHIPPING_COMPANY='with_shipping_company',
          NO_ANSWER='no_answer',
          NOT_SERIOUS='not_serious',
          REFUSED='refused',
          RETURNED_TO_STOCK='returned_to_stock',
          DELIVERED ='delivered'



    ;

}

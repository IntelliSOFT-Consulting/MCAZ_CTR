<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use App\Utility\Xoro;

class UtilComponent extends Component
{
    public function generateXOR($object_id)
    {
        return Xoro::generateXOR($object_id);
    }


    public function reverseXOR($xor_id)
    {
        return Xoro::reverseXOR($xor_id);
    }

}

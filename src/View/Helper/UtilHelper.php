<?php
/* src/View/Helper/UtilHelper.php */
namespace App\View\Helper;

use Cake\View\Helper;
use App\Utility\Xoro;

class UtilHelper extends Helper
{
	// App::import('Component', 'UtilComponent');
	// protected $theComponent = new UtilComponent();
	//public $theComponent->yourMethod();

    // public function generateXOR($object_id)
    // {
    //     return ($object_id* 121) ^ 21541124;
    // }


    // public function reverseXOR($xor_id)
    // {
    //     return ($xor_id ^ 21541124)/121;
    // }

    public function generateXOR($object_id)
    {
        return Xoro::generateXOR($object_id);
    }


    public function reverseXOR($xor_id)
    {
        return Xoro::reverseXOR($xor_id);
    }
}
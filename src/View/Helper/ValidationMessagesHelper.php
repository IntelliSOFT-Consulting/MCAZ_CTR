<?php
/* src/View/Helper/ValidationMessagesHelper.php */
namespace App\View\Helper;

use Cake\View\Helper;

class ValidationMessagesHelper extends Helper
{
    public function array_flatten($array) {
              if (!is_array($array)) {
                return FALSE;
              }
              $result = array();
              foreach ($array as $key => $value) {
                if (is_array($value)) {
                  $result = array_merge($result, $this->array_flatten($value));
                }
                else {
                  $result[$key] = $value;
                }
              }
              return $result;
    }
    // [date] => The ided value is invalid

    public function flatten_array($arg) {
      return is_array($arg) ? array_reduce($arg, function ($c, $a) { return array_merge($c, $this->flatten_array($a)); },[]) : [$arg];
    }
    // [[0] => The provided value is invalid
    // [1] => The ided value is invalid]


    function flatten($array, $prefix = '') {
        $result = array();
        foreach($array as $key=>$value) {
            if(is_array($value)) {
                $result = $result + $this->flatten($value, $prefix . $key . '.');
            }
            else {
                $result[$prefix . $key] = $value;
            }
        }
        return $result;
    }
    // [
    //     [participants.0.date_of_birth.date] => The provided value is invalid
    //     [participants.1.date_of_birth.date] => The ided value is invalid
    // ]

	public function display($errors)
    {
        if (!empty($errors)) {
            $myarr = $this->flatten($errors);
            echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span></button> ';
                            $i = 0;
                            foreach ($myarr as $key => $value) {
                                $i++;
                                if ($i <= 3) {
                                    echo '<i class="fa fa-exclamation-triangle"></i> '.$value.'<br/>';
                                }                                
                            }
                            if (count($myarr ) > 3) {
                                echo '<small class="accordion-toggle" data-toggle="collapse" data-target="#demo">
                                            more...
                                        </small>
                                        <div id="demo" class="collapse">'; 
                                $i = 0;
                                foreach ($myarr as $key => $value) {
                                    $i++;
                                    if ($i > 3) {
                                        echo '<i class="fa fa-exclamation-triangle"></i> '.$value.'<br/>';
                                    }                                
                                }
                                echo '</div>'; 
                            }
          echo '</div>';
        } 
    }

}
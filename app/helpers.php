<?php

use App\Models\Category;
use App\Models\User;
use App\Models\SiteSetting;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

// if(!function_exists('site_settings')){
//     function site_settings(){

//         $settings = SiteSetting::find(1);
//         return $settings;

//     }
// }

function category($id){

        $category = Category::find($id);



        echo $category->cat_name;


}


function category_name($id){

        $category = Category::find($id);

        return $category;


}


//user role by id
if (!function_exists('getUserRole')) {
    function getUserRole($user_id)
    {

        $user = User::find($user_id);
        $roles = $user->roles->pluck('name') ->toArray();



        foreach ($roles as $key => $value) {
            echo '<span class="badge badge-success">'.$value.'</span>'.'&nbsp;';
        }
    }
}


function get7DaysDates($days, $format = 'l'){
    $m = date("m"); $de= date("d"); $y= date("Y");
    $dateArray = array();
    for($i=0; $i<=$days-1; $i++){
        $dateArray[] = '' . date($format, mktime(0,0,0,$m,($de-$i),$y)) . '';
    }
    return array_reverse($dateArray);
}
function getlast12Month(){
$month = time();
 $months[] = date("M", $month);
for ($i = 1; $i < 12; $i++) {
  $month = strtotime('last month', $month);
  $months[] = date("M", $month);
}
return($months);
}



function getMonthlist(){
        $array = array();
array_push($array, date('F')) ;
for ($i=1; $i<=  12 - date('m'); $i++ ){
    array_push($array, date('F', strtotime("+$i months"))) ;
}
    return $array;
}



function is_valid_json( $raw_json ){
    return ( json_decode( $raw_json , true ) == NULL ) ? false : true ; // Yes! thats it.
}


function status($status){

if( $status == 1){
            echo '<span class="badge badge-success">Active</span>';
        }

        else if($status == 0){
            echo '<span class="badge badge-warning">InActive</span>';
        }

}



//price formate
if (!function_exists('price_formate')) {
    function price_formate($price_formate)
    {
        return number_format($price_formate, 3, '.', ',');
    }
}

//datetime formate
if (!function_exists('date_formate')) {
    function date_formate($date_time)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date_time)->toDayDateTimeString();
    }
}
//datetime formate
if (!function_exists('date_formated')) {
    function date_formated($date_time)
    {
        return Carbon::createFromFormat('Y-m-d', $date_time)->toFormattedDateString();
    }
}
//date format
//date formate
if (!function_exists('date_formate_only')) {
    function date_formate_only($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->toFormattedDateString();
    }
}

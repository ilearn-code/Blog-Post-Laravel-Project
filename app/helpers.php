<?php

if (!function_exists('pp')) {
    function pp($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

// if(!function_exists('isLogin'))
// {

//     function isLogin()
//     {

//        if(request()->session()->get('user_id')!==null)
//        {
//         return true;
//        }
//        return false;
//     }
// }
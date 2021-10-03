<?php

class Pages{

    public static function showPages($links){

        if( $links == 'login' ||
            $links == 'users' ||
            $links == 'update' ||
            $links == 'logout'       
        ){

            $moduleNav = 'views/modules/'.$links.'.php';

        }elseif($links == 'index'){

            $moduleNav = 'views/modules/register.php';

        }else{
            
            $moduleNav = 'views/modules/register.php';
        }

        return $moduleNav;

    }
}
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

        }elseif($links == 'ok'){

            $moduleNav = 'views/modules/register.php';

        }elseif($links == 'error'){

            $moduleNav = 'views/modules/login.php';

        }elseif($links == 'captchafail'){

            $moduleNav = 'views/modules/login.php';

        }elseif($links == 'edit'){

            $moduleNav = 'views/modules/users.php';

        }else{
            
            $moduleNav = 'views/modules/register.php';
        }

        return $moduleNav;

    }
}
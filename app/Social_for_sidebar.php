<?php


namespace App;


class Social_for_sidebar
{
    public function get_social(){
        foreach (social_networks::all() as $social){
            echo '<a href="'. $social->link.'"><img width="20px" src="'. $social->image.'"> '.$social->name .'</a><br>';
        }
    }
}

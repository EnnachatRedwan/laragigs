<?php

namespace App\Models;

class Listing {

    const listingsList = [
        ['id'=>1,'title'=>'listing 1','text'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque temporibus perferendis, exercitationem molestiae facilis quasi.'],
        ['id'=>2,'title'=>'listing 2','text'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque temporibus perferendis, exercitationem molestiae facilis quasi.']
    ];

    public static function all(){
        return self::listingsList;
    }

    public static function find($id){
        foreach(self::listingsList as $listing){
            if($listing['id'] == $id){
                return $listing;
            }
        }
    }
}
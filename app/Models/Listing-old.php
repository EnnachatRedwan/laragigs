<?php

namespace App\Models;

class Listing {

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
<?php

namespace App\Assistan;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Fournisseur;
use App\Models\Client;
use App\User;
use App\Setting;
use App\Models\Rayon;
use Illuminate\Support\Carbon;
use App\Models\Event;
use App\Models\history;

class Assistant
{
    
    static function getElements ($value, $type)
    {
        $cat = Categorie::all();
        $ray = Rayon::all();

        $produit = Produit::all();
        $produit->cat = $cat;
        $produit->ray = $ray;
        $produit->value = $value;
        $produit->type = $type;

        return $produit;
    }

    static function getCalendarEvent()
    {
        # code...
        $cal = Event::all();
        session()->put('cal' , $cal);
    }

    static function getStory()
    {
        # code...
        $story = history::all();
        session()->put('story' , $story);
    }

    static function countProduit()
    {
        # code...
        return count(Produit::all());
    }

    static function countFournisseur()
    {
        # code...
        return count(Fournisseur::all());
    }

    static function countUser()
    {
        # code...
        return count(User::whereIsActive(1)->get());
    }

    static function countClient()
    {
        # code...
        return count(Client::all());
    }


    static function getNotification()
    {
        # code...
        
    }

    static function getSettingValue()
    {
        # code...
        return Setting::first();
    }
}

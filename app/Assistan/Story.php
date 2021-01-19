<?php

namespace App\Assistan;
use App\Models\History;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Story
{
    
   static function saveFromStory($value)
   {
   	# code...
   	$history = new History();
   	$history->events = $value;
   	$history->date = Carbon::now();
   	$history->user = Auth::user()->id;
   	$history->save();
   }
        
}

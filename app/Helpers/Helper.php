<?php

use App\Models\settings;


function getValueFromSettingsTable($name)
{
   $setting = settings::where('name', $name)->first();

   if(!empty($setting)){
       return $setting->value;
   }
   return null;
   
}

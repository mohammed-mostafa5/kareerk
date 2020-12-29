<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use League\Flysystem\Config;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AppBaseController;
use App\Models\Setting;


class CustomSettingController extends AppBaseController
{
    public function settings()
    {
        return view('custome_settings.settings');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'theme' => '',
            'logo' => '',
            'favicon' => '',
            'title_prefix' => '',
            'site_name' => '',
            'primary_bg' => '',
            'primary_hover' => '',
        ]);

        foreach ($data as $key => $value) {
            if(!empty($value)){

                $setting = Setting::where('key', $key)->first();
        
                $setting->update(['value' => $value]);
            }
        }

        return back();
    
    }

}

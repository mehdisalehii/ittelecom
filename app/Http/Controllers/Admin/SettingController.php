<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class SettingController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('content_view') ) {
            abort(401);
        }
        $set_name = Setting::where('name','webname')->value('value');
        $set_page = Setting::where('name','page')->value('value');
        $set_bussiness = Setting::where('name','bussiness')->value('value');
        $set_brand = Setting::where('name','brand')->value('value');
        return view('admin.pages.setting.index', compact('set_name','set_page','set_bussiness','set_brand'));
    }
    public function saveIndex(Request $request)
    {
        if (! Gate::allows('developer_view') ) {
            return abort(404);
        }
        if (! Gate::allows('developer_view') ) {
            abort(401);
        }
        $set_name = Setting::where('name','webname')->first();
        $set_name->value = $request->set_name;
        $set_name->save();

        $set_page = Setting::where('name','page')->first();
        $set_page->value = $request->set_page;
        $set_page->save();

        $set_bussiness = Setting::where('name','bussiness')->first();
        $set_bussiness->value = $request->set_bussiness;
        $set_bussiness->save();

        $set_brand = Setting::where('name','brand')->first();
        $set_brand->value = $request->set_brand;
        $set_brand->save();

        session()->flash('success', 'تنظیمات عنوان بروزرسانی شد.');
        return back();
    }

    public function motto()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('developer_view') ) {
            abort(401);
        }
        $set_motto_fa = Setting::where('name','motto_fa')->value('value');
        $set_motto_en = Setting::where('name','motto_en')->value('value');
        $set_confer = Setting::where('name','confer')->value('value');
        $set_footer_copyright = Setting::where('name','footer_copyright')->value('value');
        return view('admin.pages.setting.motto', compact('set_motto_fa','set_motto_en','set_confer','set_footer_copyright'));
    }
    public function saveMotto(Request $request)
    {
        if (! Gate::allows('developer_view') ) {
            return abort(404);
        }
        if (! Gate::allows('developer_view') ) {
            abort(401);
        }
        $set_motto_fa = Setting::where('name','motto_fa')->first();
        $set_motto_fa->value = $request->set_motto_fa;
        $set_motto_fa->save();

        $set_motto_en = Setting::where('name','motto_en')->first();
        $set_motto_en->value = $request->set_motto_en;
        $set_motto_en->save();

        $set_confer = Setting::where('name','confer')->first();
        $set_confer->value = $request->set_confer;
        $set_confer->save();

        $set_footer_copyright = Setting::where('name','footer_copyright')->first();
        $set_footer_copyright->value = $request->set_footer_copyright;
        $set_footer_copyright->save();

        session()->flash('success', 'تنظیمات شعار بروزرسانی شد.');
        return back();
    }

    public function about()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('content_view') ) {
            abort(401);
        }
        $set_about_footer = Setting::where('name','about_footer')->value('value');
        $set_description = Setting::where('name','description')->value('value');
        return view('admin.pages.setting.about', compact('set_about_footer','set_description'));
    }
    public function saveAbout(Request $request)
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        $set_about_footer = Setting::where('name','about_footer')->first();
        $set_about_footer->value = $request->set_about_footer;
        $set_about_footer->save();

        $set_description = Setting::where('name','description')->first();
        $set_description->value = $request->set_description;
        $set_description->save();

        session()->flash('success', 'تنظیمات درباره بروزرسانی شد.');
        return back();
    }

    public function meta()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('content_view') ) {
            abort(401);
        }
        $set_unit = Setting::where('name','unit')->value('value');
        $set_language = Setting::where('name','language')->value('value');
        $set_copyright = Setting::where('name','copyright')->value('value');
        return view('admin.pages.setting.meta', compact('set_unit','set_language', 'set_copyright'));
    }
    public function saveMeta(Request $request)
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        $set_unit = Setting::where('name','unit')->first();
        $set_unit->value = $request->set_unit;
        $set_unit->save();

        $set_language = Setting::where('name','language')->first();
        $set_language->value = $request->set_language;
        $set_language->save();

        $set_copyright = Setting::where('name','copyright')->first();
        $set_copyright->value = $request->set_copyright;
        $set_copyright->save();

        session()->flash('success', 'تنظیمات متا بروزرسانی شد.');
        return back();
    }

    public function token()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('content_view') ) {
            abort(401);
        }
        $set_google_verification = Setting::where('name','google_verification')->value('value');
        $set_google_tagmanager_id = Setting::where('name','google_tagmanager_id')->value('value');
        $set_sms = Setting::where('name','sms')->value('value');
        $set_yektanet = Setting::where('name','yektanet')->value('value');
        $set_hotjar = Setting::where('name','hotjar')->value('value');
        $set_clarity = Setting::where('name','clarity')->value('value');
        return view('admin.pages.setting.token', compact('set_google_verification','set_google_tagmanager_id','set_sms','set_yektanet','set_hotjar','set_clarity'));
    }
    public function saveToken(Request $request)
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        $set_google_verification = Setting::where('name','google_verification')->first();
        $set_google_verification->value = $request->set_google_verification;
        $set_google_verification->save();

        $set_google_tagmanager_id = Setting::where('name','google_tagmanager_id')->first();
        $set_google_tagmanager_id->value = $request->set_google_tagmanager_id;
        $set_google_tagmanager_id->save();

        $set_sms = Setting::where('name','sms')->first();
        $set_sms->value = $request->set_sms;
        $set_sms->save();

        $set_yektanet = Setting::where('name','yektanet')->first();
        $set_yektanet->value = $request->set_yektanet;
        $set_yektanet->save();

        $set_hotjar = Setting::where('name','hotjar')->first();
        $set_hotjar->value = $request->set_hotjar;
        $set_hotjar->save();

        $set_clarity = Setting::where('name','clarity')->first();
        $set_clarity->value = $request->set_clarity;
        $set_clarity->save();

        session()->flash('success', 'تنظیمات توکن بروزرسانی شد.');
        return back();
    }

    public function namad()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('developer_view') ) {
            abort(401);
        }
        $set_enamad_url = Setting::where('name','enamad_url')->value('value');
        $set_enamad_logo = Setting::where('name','enamad_logo')->value('value');
        $set_sazmandehi_url = Setting::where('name','sazmandehi_url')->value('value');
        $set_sazmandehi_logo = Setting::where('name','sazmandehi_logo')->value('value');
        return view('admin.pages.setting.namad', compact('set_enamad_url','set_enamad_logo','set_sazmandehi_url','set_sazmandehi_logo'));
    }
    public function saveNamad(Request $request)
    {
        if (! Gate::allows('developer_view') ) {
            return abort(404);
        }
        if (! Gate::allows('developer_view') ) {
            abort(401);
        }
        $set_enamad_url = Setting::where('name','enamad_url')->first();
        $set_enamad_url->value = $request->set_enamad_url;
        $set_enamad_url->save();

        $set_enamad_logo = Setting::where('name','enamad_logo')->first();
        $set_enamad_logo->value = $request->set_enamad_logo;
        $set_enamad_logo->save();

        $set_sazmandehi_url = Setting::where('name','sazmandehi_url')->first();
        $set_sazmandehi_url->value = $request->set_sazmandehi_url;
        $set_sazmandehi_url->save();

        $set_sazmandehi_logo = Setting::where('name','sazmandehi_logo')->first();
        $set_sazmandehi_logo->value = $request->set_sazmandehi_logo;
        $set_sazmandehi_logo->save();

        session()->flash('success', 'تنظیمات نماد بروزرسانی شد.');
        return back();
    }

    public function contact()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('developer_view') ) {
            abort(401);
        }
        $set_email = Setting::where('name','email')->value('value');
        $set_telephone = Setting::where('name','telephone')->value('value');
        $set_fax = Setting::where('name','fax')->value('value');
        $set_mobile = Setting::where('name','mobile')->value('value');
        $set_skype_id = Setting::where('name','skype_id')->value('value');
        $set_telegram_id = Setting::where('name','telegram_id')->value('value');
        $set_work_time = Setting::where('name','work_time')->value('value');
        $set_address = Setting::where('name','address')->value('value');
        $set_postal = Setting::where('name','postal')->value('value');
        return view('admin.pages.setting.contact', compact('set_email','set_telephone','set_fax','set_mobile','set_skype_id','set_telegram_id','set_work_time','set_address','set_postal'));
    }
    public function saveContact(Request $request)
    {
        if (! Gate::allows('developer_view') ) {
            return abort(404);
        }
        if (! Gate::allows('developer_view') ) {
            abort(401);
        }
        $set_email = Setting::where('name','email')->first();
        $set_email->value = $request->set_email;
        $set_email->save();

        $set_telephone = Setting::where('name','telephone')->first();
        $set_telephone->value = $request->set_telephone;
        $set_telephone->save();

        $set_fax = Setting::where('name','fax')->first();
        $set_fax->value = $request->set_fax;
        $set_fax->save();

        $set_mobile = Setting::where('name','mobile')->first();
        $set_mobile->value = $request->set_mobile;
        $set_mobile->save();

        $set_skype_id = Setting::where('name','skype_id')->first();
        $set_skype_id->value = $request->set_skype_id;
        $set_skype_id->save();

        $set_telegram_id = Setting::where('name','telegram_id')->first();
        $set_telegram_id->value = $request->set_telegram_id;
        $set_telegram_id->save();

        $set_work_time = Setting::where('name','work_time')->first();
        $set_work_time->value = $request->set_work_time;
        $set_work_time->save();

        $set_address = Setting::where('name','address')->first();
        $set_address->value = $request->set_address;
        $set_address->save();

        $set_postal = Setting::where('name','postal')->first();
        $set_postal->value = $request->set_postal;
        $set_postal->save();

        session()->flash('success', 'تنظیمات تماس بروزرسانی شد.');
        return back();
    }

    public function social()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('content_view') ) {
            abort(401);
        }
        $set_facebook = Setting::where('name','facebook')->value('value');
        $set_twitter = Setting::where('name','twitter')->value('value');
        $set_instagram = Setting::where('name','instagram')->value('value');
        $set_linkedin = Setting::where('name','linkedin')->value('value');
        $set_telegram = Setting::where('name','telegram')->value('value');
        $set_aparat = Setting::where('name','aparat')->value('value');
        $set_pinterest = Setting::where('name','pinterest')->value('value');
        return view('admin.pages.setting.social', compact('set_facebook','set_twitter','set_instagram','set_linkedin','set_telegram','set_aparat','set_pinterest'));
    }
    public function saveSocial(Request $request)
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        $set_facebook = Setting::where('name','facebook')->first();
        $set_facebook->value = $request->set_facebook;
        $set_facebook->save();

        $set_twitter = Setting::where('name','twitter')->first();
        $set_twitter->value = $request->set_twitter;
        $set_twitter->save();

        $set_instagram = Setting::where('name','instagram')->first();
        $set_instagram->value = $request->set_instagram;
        $set_instagram->save();

        $set_linkedin = Setting::where('name','linkedin')->first();
        $set_linkedin->value = $request->set_linkedin;
        $set_linkedin->save();

        $set_telegram = Setting::where('name','telegram')->first();
        $set_telegram->value = $request->set_telegram;
        $set_telegram->save();

        $set_aparat = Setting::where('name','aparat')->first();
        $set_aparat->value = $request->set_aparat;
        $set_aparat->save();

        $set_pinterest = Setting::where('name','pinterest')->first();
        $set_pinterest->value = $request->set_pinterest;
        $set_pinterest->save();

        session()->flash('success', 'تنظیمات شبکه اجتماعی بروزرسانی شد.');
        return back();
    }

    public function map()
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        if (! Gate::allows('content_view') ) {
            abort(401);
        }
        $set_map_latitude = Setting::where('name','map_latitude')->value('value');
        $set_map_longitude = Setting::where('name','map_longitude')->value('value');
        $set_map_address = Setting::where('name','set_map_address')->value('value');
        $set_map_url = Setting::where('name','map_url')->value('value');
        return view('admin.pages.setting.map', compact('set_map_latitude','set_map_longitude','set_map_address','set_map_url'));
    }
    public function saveMap(Request $request)
    {
        if (! Gate::allows('admin_panel') ) {
            return abort(404);
        }
        $set_map_latitude = Setting::where('name','map_latitude')->first();
        $set_map_latitude->value = $request->set_map_latitude;
        $set_map_latitude->save();

        $set_map_longitude = Setting::where('name','map_longitude')->first();
        $set_map_longitude->value = $request->set_map_longitude;
        $set_map_longitude->save();

        $set_map_address = Setting::where('name','map_address')->first();
        $set_map_address->value = $request->set_map_address;
        $set_map_address->save();

        $set_map_url = Setting::where('name','map_url')->first();
        $set_map_url->value = $request->set_map_url;
        $set_map_url->save();

        session()->flash('success', 'تنظیمات مپ بروزرسانی شد.');
        return back();
    }

}

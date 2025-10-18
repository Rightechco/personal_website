<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Setting\UpdateSettingRequest;
use App\Http\Requests\Admin\Setting\UpdateBannerRequest;
use App\Models\Setting;

class PanelController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index() {
      return view('admin.panel.index');
    }

    public function setting() {
      $setting = Setting::where('type',1)->first();
      return view('admin.panel.setting', compact('setting'));
    }

    public function settingUpdate(Setting $setting, UpdateSettingRequest $request) {
      if($request->logo != null) {
        $logoName = rand(1,1000).'-'.time().'.'.$request->logo->extension();
        $request->logo->move(public_path('uploads/setting'), $logoName);
      } else {
          $logoName = $setting->logo;
      }
      $setting->update([
        'title' => $request->title,
        'address' => $request->address,
        'tell' => $request->tell,
        'mobile' => $request->mobile,
        'fax' => $request->fax,
        'logo' => $logoName
      ]);

      return back()->with('updateSetting', 'تنظیمات سایت بروزرسانی گردید');
    }

    public function banner() {
      $banner = Setting::where('type',2)->first();
      return view('admin.panel.banner', compact('banner'));
    }

    public function bannerUpdate(Setting $setting, UpdateBannerRequest $request) {
      if($request->banner_top != null) {
        $bannerTopName = rand(1,1000).'-'.time().'.'.$request->banner_top->extension();
        $request->banner_top->move(public_path('uploads/setting'), $bannerTopName);
      } else {
          $bannerTopName = $setting->banner_top;
      }
      if($request->banner_bottom != null) {
        $bannerBottomName = rand(1,1000).'-'.time().'.'.$request->banner_bottom->extension();
        $request->banner_bottom->move(public_path('uploads/setting'), $bannerBottomName);
      } else {
          $bannerBottomName = $setting->banner_bottom;
      }
      $setting->update([
        'banner_top' => $bannerTopName,
        'banner_bottom' => $bannerBottomName
      ]);

      return back()->with('updateBanner', 'بنر بروزرسانی گردید');
    }
}

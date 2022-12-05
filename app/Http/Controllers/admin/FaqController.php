<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\phones;
use App\Models\Settings;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index() {
        if(session('admin_email')) {
            $siteInfo = Settings::all();
            $faq = Faq::all();
            return view('admin.faqparameters.index', compact('siteInfo', 'faq'));
            } else {
                return redirect()->route('admin.loginshow');
            }
    }
    public function delete($id) {
        if(session('admin_email')) {
            $deleted = Faq::destroy($id);
            if($deleted) {
                return redirect()->route('admin.faq.index')->with('deletesuccess', 'Sual uğurla silindi');
            } else {
                return redirect()->route('admin.faq.index')->with('deleterror', 'Sual silinməsi zamanı xəta');
            }
        } else {
            return redirect()->route('admin.loginshow');
        }
    }
    public function store(Request $req) {
        if(session('admin_email')) {
            $req->validate([
                'title' => 'required',
                'desc' => 'required',
            ]);

            $all = $req->all();
            $created = Faq::create($all);
            if($created) {
                return redirect()->route('admin.faq.index')->with('addsuccess', 'Sual uğurla əlavə edildi');
            } else {
                return redirect()->route('admin.faq.index')->with('adderror', 'Sualın əlavə edilməsi zamanı xəta');
            }
        } else {
                return redirect()->route('admin.loginshow');
        }
    }

    public function edit($id) {
        if(session('admin_email')) {
            $siteInfo = Settings::all();
            $question = Faq::find($id);
            return view('admin.faqparameters.edit', compact('question', 'siteInfo'));
            } else {
                return redirect()->route('admin.loginshow');
            }
        }

    public function update(Request $req, $id) {
        if(session('admin_email')) {
            $req->validate([
                'title' => 'required',
                'desc' => 'required',
            ]);
            $all = $req->all();
            $question = Faq::find($id);
            $updated = $question->update($all);
            if($updated) {
                return redirect()->route('admin.faq.index')->with('success', 'Məlumatlar uğurla yeniləndilər');
            } else {
                return redirect()->route('admin.faq.index')->with('error', 'Məlumatlar;n yenilənməsi zamanı xəta');
            }
        } else {
            return redirect()->route('admin.loginshow');
        }
    }
}

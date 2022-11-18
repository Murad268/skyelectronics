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
        $siteInfo = Settings::all();
        $faq = Faq::all();
        return view('admin.faqparameters.index', compact('siteInfo', 'faq'));
    }
    public function delete($id) {
        $deleted = Faq::destroy($id);
        if($deleted) {
            return redirect()->route('admin.faq.index')->with('deletesuccess', 'Sual uğurla silindi');
        } else {
            return redirect()->route('admin.faq.index')->with('deleterror', 'Sual silinməsi zamanı xəta');
        }
    }
    public function store(Request $req) {
        $all = $req->all();
        $created = Faq::create($all);
        if($created) {
            return redirect()->route('admin.faq.index')->with('addsuccess', 'Sual uğurla əlavə edildi');
        } else {
            return redirect()->route('admin.faq.index')->with('adderror', 'Sualın əlavə edilməsi zamanı xəta');
        }
    }

    public function edit($id) {
        $siteInfo = Settings::all();
        $question = Faq::find($id);
        return view('admin.faqparameters.edit', compact('question', 'siteInfo'));
    }

    public function update(Request $req, $id) {
        $all = $req->all();
        $question = Faq::find($id);
        $updated = $question->update($all);
        if($updated) {
            return redirect()->route('admin.faq.index')->with('success', 'Məlumatlar uğurla yeniləndilər');
        } else {
            return redirect()->route('admin.faq.index')->with('error', 'Məlumatlar;n yenilənməsi zamanı xəta');
        }
    }
}

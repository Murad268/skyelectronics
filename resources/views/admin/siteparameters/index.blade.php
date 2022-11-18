@extends('admin.layouts.admin')
@section('content')
<div class="panel">
    <div class="search">
        <i class="fa fa-search"></i>
        <input type="text" class="form-control" placeholder="axtar">
        <button class="btn btn-success">Search</button>
    </div>
    <div class="panel__cordinate">
        <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
        <i class="me-2 fas fa-angle-right"></i>
        <span><a href="">Ümumi parametrlər</a></span>
    </div>
    <form method="post" action="{{Route('admin.siteparametersedit')}}" enctype="multipart/form-data">
        @csrf
        <div class="panel__info">
            <div class="siteLogo">
                <img src="{{asset('admin/assets/images/'.$siteInfo[0]->siteLogosu)}}" alt="">
            </div>
            <label for="disabledTextInput" class="form-label">Logonu dəyiş</label>
            <input type="file" name="sitelogosu" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Mağazanın Adı</label>
            <input value="{{$siteInfo[0]->siteName}}" type="text" id="disabledTextInput" name="siteName" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Saytın Başlığı</label>
            <input value="{{$siteInfo[0]->siteTitle}}" type="text" id="disabledTextInput" name="siteTitle" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Açıqlama Mətni</label>
            <input value="{{$siteInfo[0]->siteDesc}}" type="text" id="disabledTextInput" name="siteDesc" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Açar sözlər</label>
            <input value="{{$siteInfo[0]->siteKeywords}}" type="text" id="disabledTextInput" name="siteKeywords" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Kopirayt mətni</label>
            <input value="{{$siteInfo[0]->siteCopywriteMetni}}" type="text" name="siteCopywriteMetni" id="disabledTextInput" class="form-control">
            @if(session('success'))
                <div class="mt-3 alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="mt-3 alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            
        </div>
        <button style="margin: 0 auto" class="d-block mt-4 btn btn-success">Məlumatları yenilə</button>
    </form>
</div>
@endsection

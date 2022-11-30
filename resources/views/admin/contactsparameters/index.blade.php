@extends('admin.layouts.admin')
@section('content')
<div class="panel">
    <div class="search">
        <i class="fa fa-search"></i>
        <input type="text" class="form-control" placeholder="axtar">
        <button class="btn btn-success">Axtar</button>
    </div>
    <div class="panel__cordinate">
        <a href=""><i class="me-2 fa fa-home" aria-hidden="true"></i></a>
        <i class="me-2 fas fa-angle-right"></i>
        <span><a href="">Ümumi parametrlər</a></span>
    </div>
    <form method="post" action="{{Route('admin.contactsparametersedit')}}" enctype="multipart/form-data">
        @csrf
        <div class="panel__info">
            <label for="disabledTextInput" class="mt-4 form-label">Saytın elekyron poçtu</label>
            <input value="{{$siteInfo[0]->siteMailAdresi}}" type="email" id="disabledTextInput" name="siteMailAdresi" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Saytın elekyron poçtunun şifrəsi</label>
            <input value="{{$siteInfo[0]->siteEmailSifresi}}" type="text" id="disabledTextInput" name="siteEmailSifresi" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">host</label>
            <input value="{{$siteInfo[0]->host}}" type="text" id="disabledTextInput" name="host" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Saytın ünvanı</label>
            <input value="{{$siteInfo[0]->siteAdresi}}" type="text" id="disabledTextInput" name="siteAdresi" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Facebook ünvanı</label>
            <input value="{{$siteInfo[0]->SosyalLinkFacebook}}" type="text" name="SosyalLinkFacebook" id="disabledTextInput" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Twitter ünvanı</label>
            <input value="{{$siteInfo[0]->SosyalLinkTwitter}}" type="text" name="SosyalLinkTwitter" id="disabledTextInput" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Instagram ünvanı</label>
            <input value="{{$siteInfo[0]->SosyalLinkInstagram}}" type="text" name="SosyalLinkInstagram" id="disabledTextInput" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Linkedin ünvanı</label>
            <input value="{{$siteInfo[0]->SosyalLinkLinkedin}}" type="text" name="SosyalLinkLinkedin" id="disabledTextInput" class="form-control">
            <label for="disabledTextInput" class="mt-4 form-label">Youtube ünvanı</label>
            <input value="{{$siteInfo[0]->SosyalLinkYoutube}}" type="text" name="SosyalLinkYoutube" id="disabledTextInput" class="form-control">
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

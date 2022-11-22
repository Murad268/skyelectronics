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
        <span><a href="">Ən çox verilən suallar</a></span>
    </div>
    <form method="post" action="{{Route('admin.faq.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="panel__info">
            @if(session('success'))
                    <div class="mt-3 alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                @if(session('adderror'))
                    <div class="mt-3 alert alert-danger">
                        {{session('adderror')}}
                    </div>
                @endif
            @foreach($faq as $question)
                <div class="mt-3 faq__body">
                    <div class="faq__title">{{$question->title}}&nbsp;&nbsp;&nbsp;<a href="{{route('admin.faq.edit', ['id' => $question->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;<a href="{{route('admin.faq.delete', ['id' => $question->id])}}"><i onclick="return confirm('Sualı silmək istədiyinizdən əminsiniz?')" style="cursor: pointer;" class="text-danger ml-5 fa fa-trash"></i></a>
                </div>
                    <div class="faq__desc">{{$question->desc}}</div>
                </div>
            @endforeach
            @if(session('deletesuccess'))
                <div class="mt-3 alert alert-success">
                    {{session('deletesuccess')}}
                </div>
            @endif
            @if(session('deleterror'))
                <div class="mt-3 alert alert-danger">
                    {{session('deleterror')}}
                </div>
            @endif
            <label for="disabledTextInput" class="mt-4 form-label">Sualın başlığı</label>
            <input value="" type="text" id="disabledTextInput" name="title" class="form-control">
            <label for="disabledTextInput" class="mt-3 form-label">Sual</label>
            <input value="" type="text" id="disabledTextInput" name="desc" class="form-control">
                @if(session('addsuccess'))
                    <div class="mt-3 alert alert-success">
                        {{session('addsuccess')}}
                    </div>
                @endif
                @if(session('adderror'))
                    <div class="mt-3 alert alert-danger">
                        {{session('adderror')}}
                    </div>
                @endif
            <button class="mt-3 btn btn-success">
                Yeni sual əlavə ekə
            </button>
        </div>

    </form>
</div>
@endsection

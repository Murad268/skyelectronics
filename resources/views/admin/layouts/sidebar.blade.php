<div class="dashboard">
    <div class="dashboard__logo">
        <a href="{{route('admin.index')}}"><img src="{{asset('admin/assets/images/'.$siteInfo[0]->siteLogosu)}}" alt=""></a>
    </div>
    <div class="dashboard__btns">
        <div class="dashboard__button">
            <a href="{{route('admin.faq.index')}}">Sayt Məlumatları</a>
        </div>
        <div class="dashboard__button">
            <a href="{{route('admin.categories.index')}}">Kateqoriyalar</a>
        </div>
        <div class="dashboard__button">
            <a href="{{route('admin.firms.index')}}">Firma parametrləri</a>
        </div>
        <div class="select-menu">
            <div class="select-btn">
                <span class="sBtn-text">
                    Sayt Parametrləri
                    <i style="margin: 5px 0 0 40px;" class="text-success fas fa-caret-square-down"></i>
                </span>
            </div>
            <ul style="width: 230px;" class="options">
                <li class="option">
                    <span class="option-text"><a href="{{route('admin.siteparameters')}}">Ümumi parametrlər</a></span>
                </li>
                <li class="option">
                    <span class="option-text"><a href="{{route('admin.phonesparameters')}}">Telefon Parametrləri</a></span>
                </li>
                <li class="option">
                    <span class="option-text"><a href="{{route('admin.contactsparameters')}}">Əlaqə Parametrləri</a></span>
                </li>
            </ul>
        </div>

    </div>

</div>

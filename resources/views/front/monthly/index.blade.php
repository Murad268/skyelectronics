
   @extends('front.layouts.front')
   @section('title')
    <title>{{"Aylıq ödənişlərin həyata keçməsi"}}</title>
   @endsection
   @section('content')

   <div class="content monthly">
      <div class="container">
         <div class="good__content__top">
            <a href="">ana səhifə</a> >>> <a href="">aylıq ödənişlərin həyata keçməsi</a>
         </div>
         <h2 class="mt-5 about__subtitle">Aylıq ödənişlərin həyata keçməsi</h2>
         <b style="display: block; margin-bottom: 20px;" class="monthly__main__title">I.Aylıq ödənişlərimi necə həyata keçirə bilərəm?</b>
         <ul style="list-style-type: disc;">
            <li>
                <b> 1) Terminal vasitəsilə</b>
               <br><br>
               <span>Aylıq ödənişlərinizi şəhərdə mövcud olan MilliÖn terminallarından edə bilərsiniz.

                  Bunun üçün e-manat ve million terminallarının əsas menyunun ikinci səhifəsində olan “Mağazalar şəbəkəsi və E-ticarət” qovluğuna daxil olub, “Kontakt”-u seçməlisiniz. Daha sonra öz şəxsiyyət vəsiqənizin FIN kodunu və müqavilə nömrənizi daxil edərək ödənişlərinizi edə bilərsiniz.</span>
            </li>
            <li>
               <b>2) Onlayn şəkildə</b>
               <br><br>
               <span>Qeyd olunan linklə daxil olaraq ödəniş üsullardan birini istifadə edərək həyata keçirməyiniz mümkündür. <a href="">Aylıq ödəniş.</a></span>
            </li>
            <li>

              <b> 3) Tətbiq vasitəsilə</b>
               <br><br>
               <ul>
                  <li>Telefonunuzda MilliÖn tətbiqi (aplikasiya) mövcuddursa, həmin tətbiqdə

                     “Xidmətlər” bölməsindən “Mağazalar şəbəkəsi və E-ticarət” qovluğuna daxil olaraq “Kontakt”-u seçib, öz şəxsiyyət vəsiqənizin FİN kodunu və müqavilə nömrənizi daxil edərək ödənişlərinizi edə bilərsiz.
                     <br>
                      Android cihazlar üçün: <a href="">Play market million app</a>
                      <br>
                      İOS cihazlar üçün: <a href="">App store million app</a></li>
                     <li>Telefonunuzda ABB mobil tətbiqi (aplikasiya) mövcuddursa, həmin tətbiqdə “Ödənişlər” bölməsinə daxil olaraq – “Kredit” qovluğuna keçid edirsiniz, burada “Kontakt”-u seçib öz şəxsiyyət vəsiqənizin FİN kodunu və müqavilə nömrənizi daxil edərək ödənişlərinizi edə bilərsiniz.
                     <br>
                     Android cihazlar üçün: <a href="">Play market ABB app </a> <br>
                     İOS cihazlar üçün: <a href="">App store ABB app</a>  </li>
                     <li>
                        Telefonunuzda BirBank mobil tətbiqi (aplikasiya) mövcuddursa, həmin tətbiqdə“  Ödənişlər və Köçürmələr” bölməsinə daxil olaraq – “Bütün” qovluğuna keçid edirsiniz, burada “Kredit” qovluğuna keçid alaraq  “Kontakt Home”-u seçib öz şəxsiyyət vəsiqənizin FİN kodunu və müqavilə nömrənizi daxil edərək ödənişlərinizi edə bilərsiniz.
                        <br>
                        Android cihazlar üçün: <a href="">Play market BirBank app</a> <br>
                        İOS cihazlar üçün: <a href="">App store BirBank app  </a>
                     </li>
               </ul>
            </li>
         </ul>
         <b class="d-block mb-3 monthly__main__title">II. FİN kod nədir?</b>
         <br>
         <span>
            FİN kod – şəxsiyyət vəsiqənizin sağ aşağı küncündəki, axırdan birinci simvolu buraxmaqla, sonrakı 7 simvoldan ibarət koddur.

            Yeni şəxsiyyət vəsiqələrində Fərdi İdentifikasiya Nömrəsi (FİN kod) vəsiqənin üzərində qeyd olunub.</span>
            <a target="_blank" href="./assets/images/2pass.png"><img src="{{asset('front/assets/images/2pass.png')}}" alt=""></a>
            <b class="d-block mb-3 monthly__main__title">III.  Müqavilə nömrəsi nədir?</b>
            <span>Əldə etdiyiniz məhsula aid ödəniş cədvəlində qeyd olunan rəqəmlər toplusudur. (Bunu izah etmək üçün şəkil yerləşdiriləcək)

               Əgər ödəniş cədvəli hazırda sizdə deyilsə, müqavilə nömrənizi öyrənmək üçün *6060 Çağrı Mərkəzimizə zəng edə, 050 828 60 60 WhatsApp nömrəmizə və ya sosial şəbəkələrdən bizə mesaj yaza bilərsiniz.</span>
               <b class="d-block mb-3 mt-3 monthly__main__title">IV.  Taksit kartı ilə sizdən məhsul əldə etmişdim, aylıq ödənişimi necə edim?</b>
               <span>
                  Taksit kartı ilə əldə olunan məhsul nağd alış olduğu üçün siz aylıq ödənişinizi banka edirsiniz. Bu halda ödənişi həyata keçirmək üçün taksit kartınızı əldə etdiyiniz müvafiq banka müraciət etməlisiniz.</span>
      </div>
   </div>




   @endsection


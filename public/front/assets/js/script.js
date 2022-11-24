try {
   function cartArrow(arrowSelector1, arrowSelector2) {
      let arrow1 = document.querySelector(arrowSelector1);
      let arrow2 = document.querySelector(arrowSelector2);
      arrow1.addEventListener("click", () => {
         if(arrow1.classList.contains('odrardown')) {
            arrow1.classList.remove('arrowActive');
            arrow1.classList.add('arrowPassive');
            arrow2.classList.add('arrowActive');
            arrow2.classList.remove('arrowPassive');
         } else {
            arrow1.classList.remove('arrowActive');
            arrow1.classList.add('arrowPassive');
            arrow2.classList.add('arrowActive');
            arrow2.classList.remove('arrowPassive');
         }
      })
      arrow2.addEventListener("click", () => {
      
      })
   }
   cartArrow('.odrardown', '.odrarup')
   cartArrow('.odrarup', '.odrardown')
   
   
   var swiper = new Swiper(".mySwiper", {
      autoplay: {
      delay: 5000,
   },
   });
   
   
   
   function good__slider(mainSlider, miniSliders) {
      const main = document.querySelector(mainSlider);
      const sliders = document.querySelectorAll(miniSliders);
      sliders.forEach(item => {
         item.addEventListener('click', (e) => {
            main.src = e.target.src;
         })
      })
   }
   good__slider('.good__content__wrapper__slider__img img', '.good__content__wrapper__slider__mini__img img');
   
   
   
   function listenerClass(btnSelector1, btnSelector2, contentSelector1, contentSelector2) {
      const btn1 = document.querySelector(btnSelector1);
      const btn2 = document.querySelector(btnSelector2);
      const content1 = document.querySelector(contentSelector1);
      const content2 = document.querySelector(contentSelector2);
      btn1.addEventListener('click', (e) => {
         btn2.classList.remove('active__cont__btn');
         e.target.classList.add('active__cont__btn');
         content2.classList.add('active__cont__disble');
         content1.classList.remove('active__cont__disble');
      })
      btn2.addEventListener('click', (e) => {
         btn1.classList.remove('active__cont__btn');
         e.target.classList.add('active__cont__btn');
         content1.classList.add('active__cont__disble');
         content2.classList.remove('active__cont__disble');
      })
   }
   listenerClass(".good__content__listeners__top1", '.good__content__listeners__top2', '.first__cont', '.second__cont')
   
   function menuOpen(btnSelector, menuSelector, closeSelector) {
      const btn = document.querySelector(btnSelector);
      const menu = document.querySelector(menuSelector);
      const close = document.querySelector(closeSelector);
   
      btn.addEventListener("click", () => {
         menu.classList.add('categories__menu__active')
         close.style.display = "inline";
         btn.style.display = "none";
      })
      close.addEventListener("click", () => {
         menu.classList.remove('categories__menu__active');
         close.style.display = "none";
         btn.style.display = "inline";
      });
   }
   menuOpen('.fa-bars', '.categories__menu', '.fa-window-close');
   
   
   function creditMonths(triggersSelector) {
      const triggers = document.querySelectorAll(triggersSelector);
      triggers.forEach(trigger => {
         trigger.addEventListener('click', () => {
            triggers.forEach(trigger => {
               trigger.classList.remove('creadit__modal__center__month__active');
            })
            trigger.classList.add('creadit__modal__center__month__active');
         });
      });
   }
   
   creditMonths('.creadit__modal__center__month');
   
   
   function orderType(cashInputSelector, creditInputSelector, creditInfoSelector) {
      const cash = document.querySelector(cashInputSelector),
            credit = document.querySelector(creditInputSelector);
            creditInfo = document.querySelector(creditInfoSelector);
            credit.addEventListener('change', () => {
               creditInfo.classList.add("activeInfo")
            })
            cash.addEventListener('change', () => {
               creditInfo.classList.remove("activeInfo")
            })
   }
   
   orderType('#cashInput', '#crInput', '.credit__info');
} catch {
   
}

let dropdowns = document.querySelectorAll('.dropdown-toggle')
dropdowns.forEach((dd)=>{
    dd.addEventListener('click', function (e) {
        var el = this.nextElementSibling
        el.style.display = el.style.display==='block'?'none':'block'
    })
})



function multimenu(triggersSelector, menuSelector) {
   const triggers = document.querySelectorAll(triggersSelector),
         menu = document.querySelector(menuSelector);
         triggers.forEach(trigger => {
            trigger.addEventListener("click", () => {
               document.querySelector(".shadow").style.visibility = "visible"
               menu.style.width = "900px";
               menu.style.background = "white"
            });
         });
}

multimenu('.multimenu', '.category__list');



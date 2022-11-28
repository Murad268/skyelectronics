

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

        function creditCalculator(calcSelector, monSelector, perSelector, priceSelector) {
            const calc = document.querySelector(calcSelector);
            const monthly_pay = document.querySelector(monSelector);
            const percent = document.querySelector(perSelector);
            const price = document.querySelector(priceSelector);

            let drop = 0;
            switch(calc.value) {
                case '1':
                    drop = 6
                    break
                case '2':
                    drop = 9
                    break
                case '3':
                    drop = 12
                    break
                case '4':
                    drop = 15
                    break
                case '5':
                    drop = 18
                    break
                case '6':
                    drop = 24
                    break
            }

            monthly_pay.textContent = ((+price.textContent/drop) * +percent.value/100).toFixed(2)
            calc.addEventListener('change', (e) => {

                switch(e.target.value) {
                    case '1':
                        drop = 6
                        break
                    case '2':
                        drop = 9
                        break
                    case '3':
                        drop = 12
                        break
                    case '4':
                        drop = 15
                        break
                    case '5':
                        drop = 18
                        break
                    case '6':
                        drop = 24
                        break
                }
                monthly_pay.textContent = ((+price.textContent/drop) * +percent.value/100).toFixed(2)
            })
        }

        creditCalculator('#calculator', '.monthly_pay', '.goods__percent', '.goods_price')

        function cashdicount(cashdiscountSelector, priceSelector, countSelector, allPriceSelector, cashAllSelector, lastPriceSelector) {
            let cashdiscount = document.querySelectorAll(cashdiscountSelector);
            let price = document.querySelectorAll(priceSelector);
            let count = document.querySelectorAll(countSelector);
            let allPrice = document.querySelector(allPriceSelector);
            let cashAll = document.querySelector(cashAllSelector);
            let lastPrice = document.querySelector(lastPriceSelector);
            let all = 0;
            let cashDis = 0;
            let last = 0;
            price.forEach((item, i) => {
                all += (parseFloat(item.textContent) * +count[i].value);
                cashDis += parseFloat(cashdiscount[i].value);
                allPrice.textContent = all + " ⫙";
                cashAll.textContent = ("-" + cashDis)+ ' ⫙';

            })
            last += parseFloat(allPrice.textContent) - parseFloat(cashAll.textContent);

            lastPrice.textContent = last + ' ⫙';
        }

        cashdicount('.cashdiscount1', '.creadit__modal__top__right__top__price1', '.quantitity1', '.allprice1', '.cashall1', '.lastall');


        function cashdicount1(countSelector, priceSelector, timeSelector, monthlySelector, triggerSelector, percentSeelector) {
            let count = document.querySelectorAll(countSelector);
            let price = document.querySelectorAll(priceSelector);
            let time = document.querySelector(timeSelector);
            let monthly = document.querySelector(monthlySelector);
            let triggers = document.querySelectorAll(triggerSelector);
            const percent = document.querySelectorAll(percentSeelector);
            let month = 6;
            let prices = 0;

            price.forEach((item, i) => {
                prices += parseFloat(item.textContent) * parseFloat(count[i].value);
                monthly.textContent = (prices/month * +percent[i].value/100).toFixed(2);
            })
            time.textContent = month;
            triggers.forEach((trigger, i) => {
                trigger.addEventListener('click', () => {
                    price.forEach((item, i) => {
                        monthly.textContent = (prices/parseFloat(trigger.textContent) * +percent[i].value/100).toFixed(2);
                    })
                    time.textContent = parseFloat(trigger.textContent);
                })
            })
        }
        cashdicount1('.cartelcount', '.cartelprice', '.cartduration', '.monthlypacart', '.creadit__modal__center__month div', '.cartelper');




} catch {

}




function lastcart(totalPricesSelector, totalSelector, cartcashdicountSelector, cashtotalpricesSelector, lastpricesSelector) {
    let totalPrices = document.querySelectorAll(totalPricesSelector);
    let total = document.querySelector(totalSelector);
    let cartcashdicount = document.querySelectorAll(cartcashdicountSelector);
    let cashtotalprices = document.querySelector(cashtotalpricesSelector);
    let lastprices = document.querySelector(lastpricesSelector);
    let t = 0;
    let cash = 0;
    totalPrices.forEach((total, i) => {
        t += parseFloat(total.textContent);
        cash += +cartcashdicount[i].value;

    })
    total.textContent = t + " AZN";
    cashtotalprices.textContent = cash + " AZN";
    lastprices.textContent = parseFloat(total.textContent) - parseFloat(cashtotalprices.textContent) + ' AZN';
}
lastcart('.carttotalprices', '.totalprices', '.cartcashdicount', '.cashtotalprices', '.lastprices');

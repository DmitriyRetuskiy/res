window.onload = function(){
    var 
      btns = document.querySelectorAll('a')
      ulSecond = document.querySelectorAll('.clSecond')
      blClick = false;
  // Проходим по массиву
     ulSecond.forEach(function(ul) {
        // ul.style.color = 'red';
         ul.style.visibility = 'hidden';
     })

     
     btns.forEach(function(btn) {     // события нажатия на кнопки меню
     btn.addEventListener('click', function(e) {
            let strIdUl =  'ul' + this.id.substring(2,4);
            let objUl = document.getElementById(strIdUl);

                if(objUl.style.visibility == 'hidden') // если не было видимым отобразим
                {
                    objUl.style.visibility = 'visible';
                    objUl.style.width = '300px';
                    objUl.style.height = '30px';
                } else {                               // иначе скрываем
                    objUl.style.visibility = 'hidden';
                    objUl.style.width = '0px';
                    objUl.style.height = '0px';
                }
        })
    })


}


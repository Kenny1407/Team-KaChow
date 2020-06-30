  function disableInput(){
    var radiobox = document.getElementById('radiocheckcod');
    var creditname = document.getElementById('cname');
    var creditnum = document.getElementById('ccnum');
    var expmonth = document.getElementById('expmonth');
    var expyear = document.getElementById('expyear');
    var creditnum = document.getElementById('creditnum');

    radiobox.addEventListener('click', disableInput()){
      if(this.checked){
        creditname.disable = 'false';
        creditnum.disable = 'false';
        expmonth.disable = 'false';
        expyear.disable = 'false';
        creditnum.disable = 'false';
      }else {
        creditname.disable = '';
        creditnum.disable = '';
        expmonth.disable = '';
        expyear.disable = '';
        creditnum.disable = '';
      }
    }

  }

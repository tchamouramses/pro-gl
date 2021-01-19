function controlinput(id,pla) {
  // body...
  var prix = parseFloat(id);
  var plafond = parseFloat(pla);

  if(Number.isNaN(plafond)){
  	plafond = parseFloat(document.getElementById(pla.id).innerHTML);
  }

  if(Number.isNaN(prix)){
    prix = parseFloat(document.getElementById(id.id).innerHTML);
  }
  var reste = document.getElementById('reste');
  var avel = document.getElementById('avance');
  var avance = parseFloat(avel.value);
  if(Number.isNaN(prix) || prix < 0 || Number.isNaN(avance)){
      reste.innerHTML = "saisie invalide";
    }else{
      if(prix<avance || avance>plafond){
        avel.value = plafond;
      reste.innerHTML = '0';
      }else{
        reste.innerHTML = plafond - avance;
      }
    }
}


function statecontrol(id, dat, qt, prix, hidden, quant, type) {
  var date = document.getElementById(dat).value;
  var qte = document.getElementById(qt).value;
  if(type === 1){
    //ici on gere les valeurs des checkbox
      if(id.checked){
        if(qte.trim() === '' || date.trim() === ''){
          id.checked = false;
          Swal.fire({
            icon: 'error',
            title : 'Veuillez remplir les champs',
            showConfirmButton: true,
            timer: 4000
          })
        }else{
          var prixx = (parseFloat(qte) * prix);
          document.getElementById(hidden).value = prixx;
          document.getElementById('net').innerHTML = prixx  + parseFloat(document.getElementById('net').innerHTML);
        }
    }else{
      document.getElementById('net').innerHTML = parseFloat(document.getElementById('net').innerHTML) - parseFloat(document.getElementById(hidden).value);
    }  
  }else{
    //ici on gere les valeurs du input number
    if(parseFloat(document.getElementById(qt).value) > parseFloat(quant)){
      document.getElementById(qt).value = quant;
    }

    if(document.getElementById(id).checked){
      var newv = parseFloat(document.getElementById(qt).value) * prix;
      document.getElementById('net').innerHTML = (parseFloat(document.getElementById('net').innerHTML) - parseFloat(document.getElementById(hidden).value)) + parseFloat(newv);
      document.getElementById(hidden).value = newv;
    }
  }
  return false;
}


function saveLivraison() {
  // body...
  var liste = document.getElementsByClassName('add');
  var values = [];
  var isAll = [];
  var count = true;
   for (var i = liste.length - 1; i >= 0; i--) {
     if(liste[i].checked){
      var val = [];
      val.push({
        quantite_livre    : parseFloat(document.getElementById('qte'+liste[i].value).value),
        date_peremption   : document.getElementById('date'+liste[i].value).value,
        nb_par_carton   : document.getElementById('nbCart'+liste[i].value).value
      });

      var prod = [];
      prod.push({
        quantite_stock : 0
      });
      values.push({
        id        : liste[i].value,
        value     : val,
        prod      : prod
      })
     }else{
      count = false;
     }
   }

   if(count){
    isAll.push({
      status  : 'TERMINER'
    });
  }else{
    isAll.push({
      status  : 'PARTIELLE'
    });
  }

    if(values.length === 0){
      Swal.fire({
        icon: 'error',
        title : 'selectioner un element avant de Livré',
        showConfirmButton: true,
        timer: 4000
      })
    }else{
      var data = {
          // "_token": $('input[name=_token]').val(),
          "value": values,
          "isAll": isAll
        }
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "POST",
          url: '/admin/livraison/livrer',
          data: data,
          success: function(response){
            Swal.fire({
              icon: 'success',
              title : response['status'],
              showConfirmButton: true,
              timer: 2000
            }).then((result) => {
                window.location.href = '/admin/commande';
            });
          }
        });
    }
}


function actionSubmit(element) {
  // body...
  // element.disabled = true;
}


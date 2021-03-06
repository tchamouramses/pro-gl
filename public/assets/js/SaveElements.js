

function addDevis() {
  var id = document.getElementById('design').value;
  var quantite = document.getElementById('quantite').value;
  var nature = document.getElementById('nature').value;
  var test = false;
  if(id === "all" || quantite.trim() === "" || nature.trim() === "all"){
    document.getElementById('error').innerHTML = "Erreur Remplissage";
  }else{
    var sel = document.getElementById('design');
    var designation = sel.options[sel.selectedIndex].text;
    var table = document.getElementById("tableramses");
    for (var i = table.rows.length - 1; i >= 1; i--) {
      var p = 0;
      if(designation === table.rows[i].cells[0].innerHTML){
        test = true;
        if(nature === table.rows[i].cells[4].innerHTML){
          table.rows[i].cells[1].innerHTML = parseInt(table.rows[i].cells[1].innerHTML) + parseInt(quantite);
          for (var i = table.rows.length - 1; i >= 1; i--) {
                p = p + parseFloat(table.rows[i].cells[2].innerHTML) * parseInt(table.rows[i].cells[1].innerHTML);
              }
              document.getElementById('prixx').innerHTML = p;
          return;
        }
        
      }
    }
    document.getElementById('error').innerHTML = "";
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var data = {
          // "_token": $('input[name=_token]').val(),
          "produit": id,
        }

    console.log(data);
        $.ajax({
          type: "GET",
          url: "/admin/commande/element",
          data: data,
          success: function(response){
            cell1.innerHTML = designation;
            cell2.innerHTML = quantite;            
            cell3.innerHTML = (response. PU_vente_HT + (response.PU_vente_HT*response.TVA)/100);
            if(nature === 'GROS'){
              cell3.innerHTML = (response. PU_vente_carton_HT + (response.PU_vente_HT*response.TVA)/100);
            }
            cell4.innerHTML = response.quantite_stock;
            cell5.innerHTML = nature;
            id = id + 20000;
            if(test){
              id = id + 200000;
            }
            cell6.innerHTML = '<button id='+id+' type="button" onclick="deleteRow('+id+')" class="btn btn-danger btn-sm  deleted_element" title="Delete Commande"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
            var p = 0;
            for (var i = table.rows.length - 1; i >= 1; i--) {
              p = p + parseFloat(table.rows[i].cells[2].innerHTML) * parseInt(table.rows[i].cells[1].innerHTML);
            }
            document.getElementById('prixx').innerHTML = p;
            document.getElementById('quantite').value = '1';
          }
        });
  }
}




function saveDataDevis() {
  // body...
  var liv = [];
  var table = document.getElementById("tableramses");
    for (var i = table.rows.length - 1; i >= 1; i--) {
      liv.push({
        produit : table.rows[i].cells[0].innerHTML,
        quantite: table.rows[i].cells[1].innerHTML,
        nature    : table.rows[i].cells[4].innerHTML
      });
    }


  var com = {
    "Date_Commande"         : document.getElementById('Date_Commande').value,
    "Client" : document.getElementById('Client').value,
    "Observation"              : document.getElementById('Observation').value
  };

    var data = {
          "_token": $('input[name=_token]').val(),
          "livraison": liv,
          "commande" : com
        }
        $.ajax({
          type: "POST",
          url: "/admin/devis",
          data: data,
          success: function(response){
            Swal.fire({
              icon: 'success',
              title : response['status'],
              showConfirmButton: true,
              timer: 1500
            }).then((result) => {
              window.location.href = '/admin/devis';
            });
          }
        });
        return false;
}


function updateData(id) {
  // body...

    var data = {
          // "_token": $('input[name=_token]').val(),
          "data" : {
            produit : document.getElementById(id+"produit").value,
            quantite_commande: document.getElementById(id+"quantite").value,
            PU_TTC    : document.getElementById(id+"prix").value,
            id      : id
          }
        }
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "POST",
          url: "/admin/commande/updateLivraison",
          data: data,
          success: function(response){
            Swal.fire({
              icon: response['type'],
              title : response['status'],
              showConfirmButton: true,
              timer: 4000
            }).then((result) => {
              if(response['type'] === 'success'){
                location.reload();
              }
            });
          }
        });
        return false;
}


function addPermission(id1) {
  // body...
  var id = document.getElementById('permissions');
  var result = [];
  var options = id && id.options;
  var opt;
  for (var i = 0,ilen = options.length; i < ilen; i++) {
    opt = options[i];
    if(opt.selected){
      result.push(opt.value);
    }
  }
  var data = {
          "_token": $('input[name=_token]').val(),
          "user_id" : id1,
          "permissions" : result
        }
        $.ajax({
          type: "POST",
          url: "/admin/permission",
          data: data,
          success: function(response){
            Swal.fire({
              icon: "success",
              title : response['status'],
              showConfirmButton: true,
              timer: 4000
            }).then((result) => {
                location.reload();
            });
          }
        });
  return false;
}



function detachPermission(path,id) {
  // body...
  var elements = document.getElementsByClassName('getvalue');
  var value = [];
  console.log(elements);
  for (var i = 0; i < elements.length; i++) {
    if(elements[i].checked)
      value.push(elements[i].value)
  }
  if (value.length !== 0) {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: true
    })

    swalWithBootstrapButtons.fire({
      title: 'Confirmer La Suppression?',
      text: "Cette action est irreversible!",
      icon: 'warning',

      width: 600,
      padding: '3em',
      backdrop: `
            rgba(68,68,68,0.7)
            `
        ,

      showCancelButton: true,
      confirmButtonText: 'Oui, Supprimé!',
      cancelButtonText: 'Non Annulé!',
      reverseButtons: true
    }).then((result) => {

      if (result.isConfirmed) {
        var data = {
          // "_token": $('input[name=_token]').val(),
          "permissions": value,
          "user_id" : id
        }
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "POST",
          url: path,
          data: data,
          success: function(response){
            swalWithBootstrapButtons.fire(
              response['status'],
              '....',
              'success',
            ).then((result) => {
                location.reload();
            });
          }
        });
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Annulé',
          'Suppression annulée',
          'error'
        )
      }
    });

  }else{
    Swal.fire({
      icon: 'error',
      title : 'selectioner un element avant de supprimer',
      showConfirmButton: true,
      timer: 4000
    })
  return false;
  }
}
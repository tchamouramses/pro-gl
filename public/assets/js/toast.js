

$('.toast').toast(option);

$(document).ready(function() {
        alert("Settings page was loaded");
    });
function text() {
  toastr.success("{{session('flash_message')}}");
}




function confirmation(path) {
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
          "value": value,
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



function myFunction() {
  var id = document.getElementById('design').value;
  var quantite = document.getElementById('quantite').value;
  var prix = document.getElementById('prix').value;
  if(id === "all" || quantite.trim() === "" || prix.trim() === ""){
    document.getElementById('error').innerHTML = "Erreur Remplissage";
  }else{
    prix = parseFloat(prix);
    if(Number.isNaN(prix) || prix < 0){
      document.getElementById('error').innerHTML = "veuillez entrez un Montant valide";
    }else{

    var sel = document.getElementById('design');
    var designation = sel.options[sel.selectedIndex].text;
    var table = document.getElementById("tableramses");
    for (var i = table.rows.length - 1; i >= 1; i--) {
      var p = 0;
      if(designation === table.rows[i].cells[0].innerHTML){
        table.rows[i].cells[1].innerHTML = parseInt(table.rows[i].cells[1].innerHTML) + parseInt(quantite);
        for (var i = table.rows.length - 1; i >= 1; i--) {
              p = p + parseFloat(table.rows[i].cells[2].innerHTML) * parseInt(table.rows[i].cells[1].innerHTML);
            }
            document.getElementById('prixx').innerHTML = p;
        return;
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
        $.ajax({
          type: "GET",
          url: "/admin/commande/element",
          data: data,
          success: function(response){
            cell1.innerHTML = designation;
            cell2.innerHTML = quantite;
            cell3.innerHTML = prix;
            cell4.innerHTML = response.quantite_stock;
            cell5.innerHTML = response.stock_alert;
            id = id + 20000;
            cell6.innerHTML = '<button id='+id+' type="button" onclick="deleteRow('+id+')" class="btn btn-danger btn-sm  deleted_element" title="Delete Commande"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
            var p = 0;
            for (var i = table.rows.length - 1; i >= 1; i--) {
              p = p + parseFloat(table.rows[i].cells[2].innerHTML) * parseInt(table.rows[i].cells[1].innerHTML);
            }
            document.getElementById('prixx').innerHTML = p;
            document.getElementById('reste').innerHTML = p;
            document.getElementById('quantite').value = '1';
            document.getElementById('prix').value = '';
          }
        });

    }
  }
}




function deleteRow(id) {
  // body...
  table = document.getElementById("tableramses");
  var index = (document.getElementById(id).parentElement).parentElement.rowIndex;
  var p = parseFloat(document.getElementById('prixx').innerHTML) - parseFloat(table.rows[index].cells[2].innerHTML) * parseInt(table.rows[index].cells[1].innerHTML);
  document.getElementById('prixx').innerHTML = p;
  table.deleteRow(index);
}



function saveData() {
  // body...
  var liv = [];
  var table = document.getElementById("tableramses");
    for (var i = table.rows.length - 1; i >= 1; i--) {
      liv.push({
        produit : table.rows[i].cells[0].innerHTML,
        quantite: table.rows[i].cells[1].innerHTML,
        prix    : table.rows[i].cells[2].innerHTML
      });
    }


  var com = {
    "date_commande"         : document.getElementById('date_commande').value,
    "Adresses_De_Livraison" : document.getElementById('Adresses_De_Livraison').value,
    "Facturer"              : document.getElementById('Facturer').value,
    "fournisseur"           : document.getElementById('fournisseur').value,
    "observation"           : document.getElementById('observation').value,
    "avance"                : parseFloat(document.getElementById('avance').value)
  };

    var data = {
          "_token": $('input[name=_token]').val(),
          "livraison": liv,
          "commande" : com
        }
        $.ajax({
          type: "POST",
          url: "/admin/commande",
          data: data,
          success: function(response){
            console.log(response);
            Swal.fire({
              icon: 'success',
              title : response['status'],
              showConfirmButton: true,
              timer: 4000
            }).then((result) => {
              window.location.href = '/admin/commande';
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



function addVente() {
  var id = document.getElementById('design');
  var quantite = document.getElementById('quantite').value;
  var nature = document.getElementById('nature').value;
  var client = document.getElementById('client').value;
  quantite = parseInt(quantite);
  var result = [];
  var options = id && id.options;
  var opt;
  for (var i = 0,ilen = options.length; i < ilen; i++) {
    opt = options[i];
    if(opt.selected){
      result.push(opt.value);
    }
  }
  if(Number.isNaN(quantite) || quantite < 0 ||  result.length === 0){
    document.getElementById('error').innerHTML = "veuillez bienremplir le formulaire";
  }else{
    var table = document.getElementById("tableramses");

    document.getElementById('error').innerHTML = "";

    var data = {
          "_token": $('input[name=_token]').val(),
          "produit": result,
          "nature" : nature,
          "client" : client,
          "quantite" : quantite
        }

        $.ajax({
          type: "POST",
          url: "/admin/vente/addpagnier",
          data: data,
          success: function(response){
              if(response.produit === 'erreur'){
                document.getElementById('error').innerHTML = "ce produit n'est plus en quanite suffisante dans le stock";
              }else{

                var liste_prod = response.produit;
                for (var i = 0; i < liste_prod.length; i++) {
                  var produit = liste_prod[i];
                  var testvalue = 0;
                  //on evite d'ajouter un tuple deja exisant dans le pagnier
                    for (var j = table.rows.length - 1; j >= 1; j--) {
                      if(produit.nature === table.rows[j].cells[3].innerHTML && produit.designation === table.rows[j].cells[0].innerHTML){
                        if(produit.nature === 'GROS' && produit.nature === table.rows[j].cells[3].innerHTML && (parseInt(table.rows[j].cells[1].innerHTML) + parseInt(quantite)) > produit.quantite_stock){
                          document.getElementById('error').innerHTML = "ce produit n'est plus en quanite suffisante dans le stock";
                          testvalue = 10;
                        }

                        if(produit.nature === 'DETAILS' && produit.nature === table.rows[j].cells[3].innerHTML && (parseInt(table.rows[j].cells[1].innerHTML) + parseInt(quantite)) > produit.nb_unitaire){
                          document.getElementById('error').innerHTML = "ce produit n'est plus en quanite suffisante dans le stock";
                          testvalue = 10;
                        }

                        if(testvalue == 0){
                          table.rows[j].cells[1].innerHTML = parseInt(table.rows[j].cells[1].innerHTML) + parseInt(quantite);
                            testvalue = 100;
                        }
                      }
                    }

                  if(testvalue === 0){
                    var row = table.insertRow(1);
                    var des = row.insertCell(0);
                    var qte = row.insertCell(1);
                    var pu = row.insertCell(2);
                    var stock = row.insertCell(3);
                    var perem = row.insertCell(4);
                    var red = row.insertCell(5);
                    var act = row.insertCell(6);

                    des.innerHTML = produit.designation;
                    qte.innerHTML = quantite;
                    if(produit.nature === 'GROS'){
                      pu.innerHTML = produit.prixG;
                    }else{
                      pu.innerHTML = produit.prixU;
                    }
                    stock.innerHTML = produit.nature;
                    perem.innerHTML = produit.peremption;
                    var id =produit.id + 20000;
                    red.innerHTML = produit.reduction+" %";
                    act.innerHTML = '<button id='+id+' type="button" onclick="deleteRow('+id+')" class="btn btn-danger btn-sm  deleted_element" title="Supprimer du panier"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
                  
                  }
                  var p = 0;
                  for (var k = table.rows.length - 1; k >= 1; k--) {
                    p = p + parseFloat(table.rows[k].cells[2].innerHTML) * parseInt(table.rows[k].cells[1].innerHTML);
                  }
                  document.getElementById('prixx').innerHTML = p;
                }              
              }
            }
        });

    }
}


function showReste(objet) {
  // body...
  var reste = parseFloat(document.getElementById('reste').innerHTML);
  var prix = parseFloat(document.getElementById('prixx').innerHTML);
  var montant = parseFloat(objet.value);

  if(Number.isNaN(prix) || prix <= 0 || Number.isNaN(montant) || montant < 0){
    document.getElementById('erreurmontant').innerHTML = "entrez un montant valide(verifier le prix total)";
  }else{
    document.getElementById('erreurmontant').innerHTML = "";
    document.getElementById('reste').innerHTML = montant - prix;
  }


  console.log(montant);
}
            

  function saveVente(id_client) {
    // body...
    console.log(id_client);
  var produit = [];
  var table = document.getElementById("tableramses");
    for (var i = table.rows.length - 1; i >= 1; i--) {
      produit.push({
        produit : table.rows[i].cells[0].innerHTML,
        quantite: table.rows[i].cells[1].innerHTML,
        prix    : table.rows[i].cells[2].innerHTML,
        nature  : table.rows[i].cells[3].innerHTML,
        peremption  : table.rows[i].cells[4].innerHTML,
        reduction  : table.rows[i].cells[5].innerHTML,
      });
    }


  var vente = {
    "client"         : id_client
    };

    var data = {
          "_token": $('input[name=_token]').val(),
          "produit": produit,
          "vente" : vente
        }

        $.ajax({
          type: "POST",
          url: "/admin/vente/vente",
          data: data,
          success: function(response){
            console.log(response);
            Swal.fire({
              icon: 'success',
              title : response['status'],
              showConfirmButton: true,
              timer: 4000
            }).then((result) => {
              window.location.href = '/admin/vente';
            });
          }
        });
        return false;
  }


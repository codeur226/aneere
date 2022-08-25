require('./bootstrap');

require('alpinejs');

import Swal from "sweetalert2";
window.deleteConfirm=function(formId){

    Swal.fire({
        text: "Voulez vous vraiment supprimer cet élément?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimer!',
        cancelButtontext: 'Annuler'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById(formId).submit();
        }
      })

}

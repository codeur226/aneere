<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>




    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success ',
        cancelButton: 'btn btn-danger '
      },
      buttonsStyling: false
    })
    function handerBtnDelete(user){
        Swal.fire({
      title: 'Suppression',
      text: "Voulez vous supprimer ce compte ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Annuler',
      confirmButtonText: 'Confirmer'
    }).then((result) => {
      if (result.isConfirmed) {
          console.log(user)
        deleteRequest(user.uuid)

      }
    })
    }
    function handerBtnDesactivate(user) {
        swalWithBootstrapButtons.fire({
            title: 'Désativation',
            text: "Voulez vous désactiver le compte !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Désactiver',
            cancelButtonText: 'Annuler',
            reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
              desactivateRequest(user.uuid)
          }
        })
    }
    function handerBtnActivate(user) {
        swalWithBootstrapButtons.fire({
            title: 'Activation de compte',
            text: "Voulez vous activer ce compte ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Activer',
            cancelButtonText: 'Annuler',
            reverseButtons: true

        }).then((result) => {
          if (result.isConfirmed) {
              activateRequest(user.uuid)
          }
        })
    }


    function activateRequest(uuid) {
        console.log(uuid)
        $.ajax({
            url: '/admin/utilisateur/active-user/'+uuid,
            type: 'GET',
            success: (res) => {
                //console.log("je t'ai eu", res)
                location.reload(),
                swalWithBootstrapButtons.fire(
                    'Activation de compte',
                    'Votre compte à été activé avec succès !!!',
                    'success'
                )


            },
            error: (error) => {
                console.log("Qu'est ce que j'ai manque", error)
                let message = "Echec d'activation. Probleme interne."
                switch (error?.status) {
                    case 404:
                        message = error?.statusText
                        break;
                    default:
                        if (error?.responseJSON?.message) {
                            message = error?.responseJSON?.message
                        }
                        break;
                }
                swalWithBootstrapButtons.fire(
                    'Echec',
                    message,
                    'error'
                )
            }
        })
    }
    function desactivateRequest(uuid) {
        console.log(uuid)
        $.ajax({
            url: '/admin/utilisateur/desactive-user/'+uuid,
            type: 'GET',
            success: (res) => {

                location.reload(),
                swalWithBootstrapButtons.fire(
                    'Désactivation de compte',
                    'Le compte à été desactivé avec succès !!!',
                    'success'
                )

            },
            error: (error) => {
                console.log("Qu'est ce que j'ai manque", error)
                let message = "Echec de desactivation. Probleme interne."
                switch (error?.status) {
                    case 404:
                        message = error?.statusText
                        break;
                    default:
                        if (error?.responseJSON?.message) {
                            message = error?.responseJSON?.message
                        }
                        break;
                }
                swalWithBootstrapButtons.fire(
                    'Echec',
                    message,
                    'error'
                )
            }
        })
    }
    function deleteRequest(uuid) {

        $.ajax({
            url: '/admin/utilisateur/delete/'+uuid,
            type: 'GET',

            success: (res) => {
                window.history.back(),
                // location.reload(),

                swalWithBootstrapButtons.fire(
                    'Suppression',
                    'Le compte à été supprimé avec succès !!!',
                    'success'
                )
            },
            error: (error) => {
               // console.log("Qu'est ce que j'ai manque", error)
                let message = "Echec de désactivation. Problème interne."
                switch (error?.status) {
                    case 404:
                        message = error?.statusText
                        break;
                    default:
                        if (error?.responseJSON?.message) {
                            message = error?.responseJSON?.message
                        }
                        break;
                }
                swalWithBootstrapButtons.fire(
                    'Echec',
                    message,
                    'error'
                )
            }
        })
    }



        // $(".active").click(function(event){
        //     event.preventDefault();
        //      let uuid =  $('#uuid').val();
        //      console.log(uuid)
        //     $.ajax({
        //       url: "/utilisateur/active-user/".uuid ,
        //       type:"post",
        //       data:{
        //         uuid:uuid,
        //     },
        //       success:function(response){
        //         console.log(response);
        //         if(response) {
        //           $('.success').text(response.success);
        //           $("#ajaxform")[0].reset();
        //         }
        //       },
        //      });
        // });
      </script>
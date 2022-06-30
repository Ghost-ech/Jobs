$(()=>{

    $('#save').click(()=>{
        $('#notif').html('<i>Please wait....</i>');
        let data = new FormData();
        data.append('name',$('#nom').val());
        data.append('subname',$('#prenom').val());
        data.append('phone',$('#phone').val());
        data.append('mail',$('#mail').val());
        data.append('residence',$('#residence').val());

        fetch(""+$('#app_save_customer').val()+"",{
            method: "post",
            body: data
        }).then(async (response)=>{

            let contentType = response.headers.get("content-type");
            if(contentType && contentType.indexOf("application/json") !== -1){

                const json = await response.json();

               json.map((n)=>{
                
                     $('#notif').html(
                        '<div class="alert alert-success">'+n.msg+'</div>'
                     ).show('slow')
                    
                    //  on vide maintenant les champs
                    $('#nom').val('');
                    $('#prenom').val('');
                    $('#phone').val('');
                    $('#mail').val('');
                    $('residence').val();

               });

            }else{
                // cau cas ou il y'a erreur lors de la reponse du serveur 
               alert('Erreur au niveau du serveur ');
            }
        });


    })
})
$(()=>{
    // gerons les choix sur le poste
    $('#poste_choice').change(()=>{
        $('#poste').val($('#poste_choice').val());
    })

    // gerons le click avant envoie du formulaire
    $('#send').click(()=>{
       
        $('#notif').html('<br /><i>please wait...</i> <br /><br /><br />');
          
        let data = new FormData();
        data.append('user_id',$('#user').val());
        data.append('poste',$('#poste').val());
        data.append('last_company',$('#last_company').val());
        data.append('date',$('#dat').val());

        fetch(""+$('#app_save_tenicien').val()+"",{
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
                    $('#last_company').val('');
                    $('#dat').val('');
                    $('#poste').val('');

               });

            }else{
                // cau cas ou il y'a erreur lors de la reponse du serveur 
               alert('Erreur au niveau du serveur ');
            }
        });


    });

})
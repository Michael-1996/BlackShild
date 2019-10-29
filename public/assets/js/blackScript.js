/*-------------------------------*\
| Chercher un Planning
\*-------------------------------*/
  function search_plannig(){
    var form=$("#form-search")

    $.ajax({
        url     : form.attr('action'),
        type    : form.attr('method'),
        data    : form.serialize(),
        dataType: 'json',
        beforeSend: function(){
          $("div.close").show()
        },
        success: function (data) {
          $('#div_table_planning').html(data.table_provisoire)
          $("div.close").hide()
        },
        error:function(xhr){
          // alert(Object.getOwnPropertyNames(xhr.responseJSON))
          // alert(xhr.responseJSON.date_debut)
         // $('#validation-errors').html('');
          $.each(xhr.responseJSON, function(key,value) {
              //Affichage des erreurs
              $('div.form-group.'+key).addClass('has-error');
              $('div.form-group.'+key).append('<label class="control-label text-danger" for="inputError"><i class="fa fa-times-circle-o"></i>'+value+'</label>');
              $("div.close").show()
          }); 
        }
    });
  }
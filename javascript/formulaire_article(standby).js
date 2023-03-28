$(document).ready(function(){

    let globalVerif = function(){
        let validated = $('.valid');
        console.log($('#submit').prop("disabled"));
        if(validated.length!=4){			
            $('#submit').prop("disabled","true");			
        }else {			
            $('#submit').prop("disabled",null);
        }
        return validated.length;
    }

    $('#image').blur(function(){
        let inputContent = $('#image').val();
        if(!inputContent){
            $(this).removeClass("valid");
            $(this).addClass("notValid");
            $(this).next('.error').html("Le champ ne doit pas être vide");
            globalVerif()
        } else {
            $(this).removeClass("notValid");
            $(this).addClass("valid");
            $(this).next('.error').html("");
            globalVerif()
        }   
    }) 
	
	$('#titre').blur(function(){
        let inputContent = $('#titre').val();
        if(!inputContent){
            $(this).removeClass("valid");
            $(this).addClass("notValid");
            $(this).next('.error').html("Le champ ne doit pas être vide");
            globalVerif()
        } else {
            $(this).removeClass("notValid");
            $(this).addClass("valid");
            $(this).next('.error').html("");
            globalVerif()
        }   
    }) 

  

    $('#contenu').blur(function(){
        let inputContent = $('#contenu').val();
        if(!inputContent){
            $(this).removeClass("valid");
            $(this).addClass("notValid");
            $(this).next('.error').html("Le champ ne doit pas être vide");
            globalVerif()
        } else {
            $(this).removeClass("notValid");
            $(this).addClass("valid");
            $(this).next('.error').html("");
            globalVerif()
        }   
    }) 
	
    $('#check').click(function(){
        let inputContent =( $('#check input:checked').length!==0);
        if(!inputContent)
      {
        $(this).removeClass("valid");
        $(this).addClass("notValid");
        $(this).next('.error').html("Une case, au moins,  doit être cochée");
        globalVerif();
    }else {
        $(this).removeClass("notValid");
        $(this).addClass("valid");
        $(this).next('.error').html("");
        globalVerif();
    }
})

  /* $('form').submit(function(e){
        let totalValidated = globalVerif();
        if(totalValidated != 4){			
            e.preventDefault();
			
        }
    })*/
})


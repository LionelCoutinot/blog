
$(document).ready(function(){

    let globalVerif = function(){
        let validated = $('.valid');
        console.log($('#submit').prop("disabled"));
        if(validated.length!=2){			
            $('#submit').prop("disabled","true");			
        }else {			
            $('#submit').prop("disabled",null);
        }
        return validated.length;
    }

    $('#pseudo').blur(function(){
        let inputContent = $('#pseudo').val();
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
	
	$('#content').blur(function(){
        let inputContent = $('#content').val();
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

   

    $('#comment_form').submit(function(e){
        let totalValidated = globalVerif();
        if(totalValidated != 2){			
            e.preventDefault();
			
        }
    })
})

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

$(document).ready(function(){

    let globalVerif = function(){
        let validated = $('.valid');
        console.log($('#submit').prop("disabled"));
        if(validated.length!=3){			
            $('#submit').prop("disabled","true");			
        }else {			
            $('#submit').prop("disabled",null);
        }
        return validated.length;
    }

    $('#pseudo2').blur(function(){
        let inputContent = $('#pseudo2').val();
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
	
    $('#email').blur(function(){
        let email = $('#email').val();
        let validation = new RegExp(/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i);
        let validEmail = validation.test(email);
        if(!email){
            $(this).removeClass("valid");
            $(this).addClass("notValid");
            $(this).next('.error').html("Le champ ne doit pas être vide");
            globalVerif()
        }
        else if(!validEmail){
            $(this).removeClass("valid");
            $(this).addClass("notValid");
            $(this).next('.error').html("Veuillez saisir un email valide");
            globalVerif()
        } else {
            $(this).removeClass("notValid");
            $(this).addClass("valid");
            $(this).next('.error').html("");
            globalVerif()
        }   
    })

  

    $('#pass').blur(function(){
        let inputContent = $('#pass').val();
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
	
  

  /* $('form').submit(function(e){
        let totalValidated = globalVerif();
        if(totalValidated != 4){			
            e.preventDefault();
			
        }
    })*/
})












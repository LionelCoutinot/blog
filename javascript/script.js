
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

})

    $('#content').blur(function(){
        let message = $('#content').val();
        if(!message){
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

    $('#agree').click(function(){
        let checked = $('#agree').prop("checked");
        if(!checked){
            $(this).removeClass("valid");
            $(this).addClass("notValid");
            $(this).next('.error').html("La case doit être cochée");
            globalVerif();
        }else {
            $(this).removeClass("notValid");
            $(this).addClass("valid");
            $(this).next('.error').html("");
            globalVerif();
        }
    })
    
    $('form').submit(function(e){
        let totalValidated = globalVerif();
        if(totalValidated != 3){
            e.preventDefault();
        }
    })

$(document).ready(function(){ /* Vérification d'un deuxième formulaire */

    let globalVerif = function(){
        let validated = $('.valid');
        console.log($('#submit').prop("disabled"));
        if(validated.length!=4){			
            $('#submit').prop("disabled","true");			
        }else {			
            $('#submit').prop("disabled",null);
        }
        return validated.length; /* Les quatre champs  du formulaire doivent être remplis pour que le formulaire soit envoyé */
    }

    $('#image').blur(function(){ /* Vérification du champ " image "*/
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
	
	$('#titre').blur(function(){ /* Vérification du champ " titre "*/
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
        let inputContent = $('#contenu').val(); /* Vérification du champ " contenu "*/
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
	
    $('#check').click(function(){ /* Vérification du champ " check "*/
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

$(document).ready(function(){ /*  Vérification d'un troisième formulaire */

    let globalVerif = function(){
        let validated = $('.valid');
        console.log($('#submit').prop("disabled"));
        if(validated.length!=3){			
            $('#submit').prop("disabled","true");			
        }else {			
            $('#submit').prop("disabled",null);
        }
        return validated.length; /* Les trois champs  du formulaire doivent être remplis pour que le formulaire soit envoyé */
    }

    $('#pseudo2').blur(function(){ /* Vérification du champ " pseudo2 "*/
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
	
    $('#email').blur(function(){ /* Vérification du champ " email  "*/
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

  

    $('#pass').blur(function(){ /* Vérification du champ " pass "*/
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












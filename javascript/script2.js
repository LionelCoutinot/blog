let label = document.querySelector("label .password-icon");
let passwordField = document.querySelector("#pass");
 passwordField.addEventListener("keypress", () => { /*affiche l'oeil une fois le premier caractère tapé !*/
	label.style.color = "black";
});

function viewPassword(){
  let passwordInput = document.getElementById('pass');
  let passStatus = document.getElementById('pass-status'); 
  if (passwordInput.type == 'password'){ /* input type passe en mode "text" si click sur l'oeil et passwordInput.type == 'password' */
    passwordInput.type='text';
    passStatus.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye';   /* input type passe en mode "password" si click sur l'oeil et passwordInput.type == 'text'*/
  }
}
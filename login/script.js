function login() {
    // Obtener los valores de usuario y contraseña ingresados por el usuario
    var usernameInput = document.getElementById('username').value;
    var passwordInput = document.getElementById('password').value;

    // Verificar las credenciales
    if (usernameInput === 'ricardo.escobedo' && passwordInput === '21060212') {
        window.location.href="/admin/index.html"
    }
    if  (usernameInput == 'martin.salas' && passwordInput == '070523'){
        alert('Inicia de sesion como martin');
    }if  (usernameInput == 'victor.daniel' && passwordInput == '070523'){
        alert('Inicia de sesion como martin'); 
    }if (usernameInput == "yolanda.escobedo" && passwordInput == "yolanda.escobedo"){
        window.location.href = "/homePage/index.html"
    }
     else {
        // Credenciales inválidas, mostrar un mensaje de error
        alert('Credenciales incorrectas. Inténtalo de nuevo.');
    }
}
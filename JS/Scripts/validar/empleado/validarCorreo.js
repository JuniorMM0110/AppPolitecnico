const formulario = document.getElementById("formulario")
const inputs = document.querySelectorAll('#formulario input')
const expresiones = {
	user: /^[a-zA-Z0-9\_\-]{6,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,30}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/, // 7 a 14 numeros.
    cedula: /^[0-9]{12,12}$/ //cedula
}
const campos = {
    user:true,
    password : false,
    correo: false,
    telefono :false,

}
//funcion para validar formulario
const valForm = (e) =>{
    switch(e.target.name){
        //nombre de usuario
         /*case user:
            validarCamp(expresiones.NombreUser,e.target,'nombreUs');
         break;*/
         //contraseña
         case pass:
            validarCamp(expresiones.pass,e.target,'password');
         break;
         //repetir la contrasña
         case pass2:
             //funcion para revisar si la contraseña es la misma
            validarPass();
         break;
         //correo
         case correo:
            validarCamp(expresiones.correo,e.target,'correo');
         break;
        //telefono
         case telef:
            validarCamp(expresiones.telefono,e.target,'telefono');
         break;
        //cedula
        /* case cedula:
            validarCamp(expresiones.cedula,e.target,'cedula');
         break;*/
    }
}
//funcion para validar pass 2
const validarPass = ()=>{
    const inputPass = document.getElementById('pass')
    const inputPass2 = document.getElementById('pass2')
    //comprobacion
    if(inputPass.value !== inputPass2.value){
        document.getElementById(`pass2`).classList.add("campo-incorrecto");
        document.getElementById(`pass2`).classList.remove("campo-correcto");
    }else{
        document.getElementById(`pass2`).classList.remove("campo-incorrecto");
        document.getElementById(`pass2`).classList.add("campo-correcto");
    }
}
//validar campo
const validarCamp = (expresion,input,campo )=>{
    if(expresion.test(input.value)){
        document.getElementById(`${campo}`).classList.remove("campo-incorrecto");
        document.getElementById(`${campo}`).classList.add("campo-correcto");
        campos[campo] = true;
        //si van a añadir iconos cambienle la clase desde aqui
    } else{
        document.getElementById(`${campo}`).classList.add("campo-incorrecto");
        document.getElementById(`${campo}`).classList.remove("campo-correcto");
        campos[campo] = false;
    }
}
//funcion anonima por cada input
inputs.forEach((input)=>{
    input.addEventListener('keyup',valForm);
    input.addEventListener('blur',valForm);
})
//evento para el btn
formulario.addEventListener('submit', (e)=>{
    //para prevenir que el objeto sea ejecutado sin comprobar
    e.preventDefault();   
    if(campos.NombreUser && campos.cedula && campos.correo && campos.pass && campos.telef){
        formulario.reset();
    }
 
})

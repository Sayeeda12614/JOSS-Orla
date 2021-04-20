/* MOSTRAR VENTANA JUGADORES */
// $(document).ready(function(){
//     $("#botonEmpezar").on( "click", function(){
//         $(".formularioDivInicioJugadores").show();
//     });
//     $("#botonEmpezar").on( "click", function(){
//         $(".divInicio").hide();
//     });
// });

/*Seleccionamos el numero de jugadores que queremos que jueguen, y dependiendo cuantos, mostramos las cajas de texto para insertar los nombres */
function mostrarFormularios(){
    getSelectValue = document.getElementById("jugadores").value;

    if(getSelectValue=="alumnos"){
        document.getElementById("caja1").style.display = "inline-block";
        document.getElementById("caja2").style.display = "none";
    }else if(getSelectValue=="profesores"){
        document.getElementById("caja1").style.display = "none";
        document.getElementById("caja2").style.display = "inline-block";
    }
}

/* Validacion del formulario*/
// document.addEventListener("DOMContentLoaded", function() {
// document.getElementById("formularioJugadores").addEventListener('submit', validarFormulario); 
// });
// function validarFormulario(evento){
//     evento.preventDefault();
//     var jugador1 = document.getElementById('nombreJ1').value;
//     var jugador2 = document.getElementById('nombreJ2').value;
//     var jugador3 = document.getElementById('nombreJ3').value;
//     var jugador4 = document.getElementById('nombreJ4').value;
//     jugadores=document.getElementById("jugadores").selectedIndex;
    
//     if(jugadores==0){
//         window.alert("No se ha seleccionado ningun jugador");
//         return false;
//     }else if(jugadores>0){
//         localStorage.nombreJ1= document.getElementById("nombreJ1").value;
//         localStorage.nombreJ2= document.getElementById("nombreJ2").value;
//         localStorage.nombreJ3= document.getElementById("nombreJ3").value;
//         localStorage.nombreJ4= document.getElementById("nombreJ4").value;
        
//             if(jugadores==1){
//                 if(jugador1.length==0){
//                     window.alert('No se pueden dejar campos vacios');
//                         return true;
//                 }else{
//                     this.submit();
//                 }
//             }
//             else if(jugadores==2){
//                 if(jugador1.length==0 && jugador2.length==0){
//                     window.alert('No se pueden dejar campos vacios');
//                         return true;
//                 }else{
//                     this.submit();
//                 }
//             }
//             else if(jugadores==3){
//                 if(jugador1.length==0 || jugador2.length==0 || jugador3.lemgth==0){
//                     window.alert('No se pueden dejar campos vacios');
//                         return true;
//                 }else{
//                     this.submit();
//                 }
//             }
//             else if(jugadores==4){
//                 if(jugador1.length==0 || jugador2.length==0 || jugador3.lemgth==0 || jugador4.length==0){
//                     window.alert('No se pueden dejar campos vacios');
//                         return true;
//                 }else{
//                     this.submit();
//                 }
//             }
//     }
//     this.submit();
// }
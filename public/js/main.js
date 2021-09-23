document.addEventListener('DOMContentLoaded', function(){
    
    // cambiar swicth
    let btnCancelarSwitch = document.querySelector('#CambiarSwicth'),
        bntSwitch = document.querySelector('#customSwitch3');

    btnCancelarSwitch.addEventListener('click', function(){
        bntSwitch.click();
    });
});
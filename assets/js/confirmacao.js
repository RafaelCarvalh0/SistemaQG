/*function submitForm(event){
    event.preventDefault();
  }
  */

  
function validaConfirmacao() {
    let campo = document.querySelector('#campo-form');
    let botao = document.querySelector('#botao');

    botao.style.backgroundColor = 'green';
    botao.style.color = 'white';
    botao.innerHTML = 'Confirmado';

    function abreModal() {
        $("#myModal").modal({
             show: true
           });
        }
       setTimeout(abreModal, 600);
    
    return true
}  

function sair() {
    window.location = 'login.php'
}


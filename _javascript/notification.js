document.addEventListener('DOMContentLoaded', function() {
  if (Notification.permission !== 'granted') {
    Notification.requestPermission();
  }
});

  function notifyMe(icon, title, mensagem, link) {
    if (!Notification) {
      alert('Sem suporte a notificação')
      return;
    }
    if (Notification.permission !== "granted") {
      Notification.requestPermission();
    }else{
      var notification = new Notification(title, {
        icon: icon,
        body: mensagem
      });
      notification.onclick = function(){
        window.open(link);
      } 
    }
  }

  var icon = '_imagens/tisemus.png';
  var title = "OS SEMUS";
  var mensagem = 'Sistema OS está Ativo';
  var link = 'http://10.1.70.204/tisemus/viewcopy.php';
  setTimeout(function(){
    notifyMe(icon, title, mensagem, link)
  }, 5000);
  
  window.addEventListener('load', function() {
    
  });
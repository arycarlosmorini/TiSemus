$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });
 
 (function() {
            
    document.querySelector('button').addEventListener('click', toTextarea);
  
    function toTextarea() {
      var $urlInput = document.querySelector('input[type="url"]'),
          url       = $urlInput.value,
          inputName = $urlInput.getAttribute('name'),
          repeat    = document.querySelector('input[type="number"]').value;
  
      if (url && repeat) {
  
        var output = '';
        for (var i = 0; i < repeat; i++)
          output += inputName + '[' + i + ']="' + url + '"; ';
        document.querySelector('textarea').textContent = output;
      }
    }
  })();

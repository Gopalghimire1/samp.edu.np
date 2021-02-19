var toastem = (function($){

  var normal = function(content){
  
    var item = $('<div class="notification normal"><span>'+content+'</span></div>');
    $("#toastem").append($(item));
    $(item).animate({"right":"12px"}, "fast");
    setInterval(function(){
      $(item).animate({"right":"-400px"},function(){
        $(item).remove();
      });
    },2000);
  
};

var warning = function(content){
  
  var item = $('<div class="notification warning"><span>'+content+'</span></div>');
  $("#toastem").append($(item));
  $(item).animate({"right":"12px"}, "fast");
  setInterval(function(){
    $(item).animate({"right":"-400px"},function(){
      $(item).remove();
    });
  },2000);

};





var success = function(content){
  
      var item = $('<div class="notification success"><span>'+content+'</span></div>');
      $("#toastem").append($(item));
      $(item).animate({"right":"12px"}, "fast");
      setInterval(function(){
        $(item).animate({"right":"-400px"},function(){
          $(item).remove();
        });
      },2000);
    
};


var error = function(content){
 
    var item = $('<div class="notification error"><span>'+content+'</span></div>');
    $("#toastem").append($(item));
    $(item).animate({"right":"12px"}, "fast");
    setInterval(function(){
      $(item).animate({"right":"-400px"},function(){
        $(item).remove();
      });
    },2000);
};

  $(document).on('click','.notification', function(){
      $(this).fadeOut(400,function(){
        $(this).remove();
      });
  });

  return{
    normal: normal,
    success: success,
    error: error,
    warning: warning
  };

})(jQuery);

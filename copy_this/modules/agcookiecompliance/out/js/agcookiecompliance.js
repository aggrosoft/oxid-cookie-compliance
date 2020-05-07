$(function(){
  $('.cc-btn').click(function(){

    document.cookie = 'cc-set=1; path=/;';

    if($(this).hasClass('cc-save')){
      var categories = $('.cc-category:checked').map(function(){ return $(this).val(); }).get();
      document.cookie  = 'cc-categories=' + JSON.stringify(categories) + '; path=/;';
    }else if($(this).hasClass('cc-allow-all')){
      document.cookie = 'cc-categories=ALL; path=/;';
    }else if($(this).hasClass('cc-disallow-all')){
      document.cookie = 'cc-categories=NONE; path=/;';
    }

  });

});
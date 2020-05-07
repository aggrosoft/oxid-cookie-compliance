$(function(){
  $('.cc-btn').click(function(){

    document.cookie = 'cc-set=1; path=/;';

    if($(this).hasClass('cc-save')){
      var categories = $('.cc-category:checked').map(function(){ return $(this).val(); }).get();
      document.cookie  = 'cc-categories=' + JSON.stringify(categories) + '; path=/;';
    }else if($(this).hasClass('cc-allow-all')){
      $('.cc-category').prop('checked',true);
      document.cookie = 'cc-categories=ALL; path=/;';
    }else if($(this).hasClass('cc-disallow-all')){
      $('.cc-category').prop('checked',false);
      document.cookie = 'cc-categories=NONE; path=/;';
    }

    $('.cc-window').hide();
    $('.cc-revoke').css('display','');

  });

  $('.cc-revoke').hover(function(){ $(this).toggleClass('cc-active') });

  $('.cc-revoke').click(function(){
    $('.cc-revoke').hide();
    $('.cc-window').css('display','');
  });

});
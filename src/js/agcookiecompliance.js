$(function(){
  $('.cc-btn').click(function(){

    document.cookie = 'cc-set=1; max-age=31536000; path=/;';

    if($(this).hasClass('cc-save')){
      var categories = $('.cc-category:checked').map(function(){ return $(this).val(); }).get();
      document.cookie  = 'cc-categories=' + JSON.stringify(categories) + '; max-age=31536000; path=/;';
    }else if($(this).hasClass('cc-allow-all')){
      $('.cc-category').prop('checked',true);
      document.cookie = 'cc-categories=ALL; max-age=31536000; path=/;';
    }else if($(this).hasClass('cc-disallow-all')){
      $('.cc-category').prop('checked',false);
      document.cookie = 'cc-categories=NONE; max-age=31536000; path=/;';
    }

    $('.cc-window').hide();
    $('.cc-revoke').css('display','');

    $.ajax({
      url: window.COOKIE_COMPLIANCE_URL,
      method: 'POST',
      data: {
        cl: 'cookietrainer',
        fnc: 'remove'
      },
      success: function(){
        location.reload();
      }
    })

    return false;

  });

  $('.cc-revoke').hover(function(){ $(this).toggleClass('cc-active') });

  $('.cc-revoke').click(function(){
    $('.cc-revoke').hide();
    $('.cc-window').css('display','');
    return false;
  });

});
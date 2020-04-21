$(function(){
  window.cookieconsent.initialise({
    cookie: {
      // This is the name of this cookie - you can ignore this
      name: 'cookieconsent_status',
      // This is the url path that the cookie 'name' belongs to. The cookie can only be read at this location
      path: '/',
      domain: window.location.host,
      expiryDays: 365,
      secure: document.location.protocol === 'https:'
    },
    onStatusChange: function(status) {
      console.log(this.hasConsented() ?
        'enable cookies' : 'disable cookies');
    },
  });
})
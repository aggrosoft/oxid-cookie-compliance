$(function(){



  var CC = window.CookieConsent
  var cc = new CC(Object.assign(window.COOKIE_COMPLIANCE_SETTINGS,{
    cookie: {
      // This is the name of this cookie - you can ignore this
      name: 'cookieconsent_status',
      // This is the url path that the cookie 'name' belongs to. The cookie can only be read at this location
      path: '/',
      domain: window.location.host,
      expiryDays: 365,
      secure: document.location.protocol === 'https:'
    }
  }));
  cc.on( "initialized", ( ...args ) => console.log( args ) )
  cc.on( "error", console.error )
  cc.on( "popupOpened", () => console.log( "Popup Open" ) )
  cc.on( "popupClosed", () => console.log( "Popup Closed" ) )
  cc.on( "revokeChoice", () => console.log( "Popup Reset" ) )
  cc.on( "statusChanged", ( ...args ) => console.log( args ) )
})
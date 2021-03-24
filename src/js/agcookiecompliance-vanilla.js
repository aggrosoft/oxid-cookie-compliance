document.addEventListener('DOMContentLoaded', function () {
  [].forEach.call(document.querySelectorAll('.cc-btn'), function (el) {
    el.addEventListener('click', function () {
      document.cookie = 'cc-set=1; max-age=31536000; path=/;';
      if (this.classList.contains('cc-save')) {
        var nodes = Array.prototype.slice.call(document.querySelectorAll('.cc-category:checked'),0);
        var categories = nodes.map(function (el) {
          return el.value;
        });
        document.cookie = 'cc-categories=' + JSON.stringify(categories) + '; max-age=31536000; path=/;';
      } else if (this.classList.contains('cc-allow-only')) {
        var categories = el.getAttribute('data-cc-categories');
        document.cookie = 'cc-categories=' + JSON.stringify(categories) + '; max-age=31536000; path=/;';
      } else if (this.classList.contains('cc-allow-all')) {
        document.querySelector('.cc-category').checked = true;
        document.cookie = 'cc-categories=ALL; max-age=31536000; path=/;';
      } else if (this.classList.contains('cc-disallow-all')) {
        document.querySelector('.cc-category').checked = false;
        document.cookie = 'cc-categories=NONE; max-age=31536000; path=/;';
      }

      document.querySelector('.cc-window').style.display = 'none';
      document.querySelector('.cc-revoke').style.display = 'inherit';
      fetch(window.COOKIE_COMPLIANCE_URL, {
        method: 'POST',
        body: {
          cl: 'cookietrainer',
          fnc: 'remove'
        }
      }).then(function (response) {
        if (response.ok) {
          return location.reload();
        } else {
          return Promise.reject(response);
        }
      }).catch(function (err) {
        console.warn('Something went wrong.', err);
      });

      return false;
    })
  })
});

var ccRevoke = document.querySelector('.cc-revoke');
ccRevoke.addEventListener('mouseenter', function () {
  this.classList.add('cc-active');
})
ccRevoke.addEventListener('mouseleave', function () {
  this.classList.remove('cc-active');
})

// This will run when the .click-me element is clicked
ccRevoke.addEventListener('click', function (event) {
  this.style.display = 'none';
  document.querySelector('.cc-window').style.display = 'inherit';
  return false;
});

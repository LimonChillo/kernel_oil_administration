(function () {
  // var text = document.getElementsByTagName("th").innerHTML ;

  // var s = document.createElement("script");

  // s.src = "http://api.microsofttranslator.com/V2/Ajax.svc/Translate?oncomplete=doneCallback&appId=MyAppID&from=en&to=ar&text=" + text[0];
  // //document.getElementsByTagName("th")[0].appendChild(s);
  // console.log(s)

  jqueryTranslate();

  }) ();

function jqueryTranslate() {
    var p = {};
    p.appid = settings.appID;
    p.to = "de";
    p.from = "en";
    p.text = "Goodbye Cruel World";
    p.contentType = 'text/html';
    $.ajax({
      url: 'http://api.microsofttranslator.com/V2/Ajax.svc/Translate',
      data: p,
      dataType: 'jsonp',
      jsonp: 'oncomplete',
      complete: function (request, status) {
      },
      success: function (result, status) {
        alert(result);
      },
      error: function (a, b, c) {
        alert(b + '-' + c);
      }
    });
  }
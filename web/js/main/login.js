$(document).ready(function () {
   $('input[name="submit"]').click(function (event) {
       event.preventDefault();
       var username = $('#username').val();
       if (!username) {
           alert("Вы не указалии логин");
           return;
       }

       var pass = $('#password').val();
       if (!pass) {
           alert("Вы не указали пароль");
           return;
       }

       if (username == 'admin' || username == 'user') {
           if (pass != 'dnepr') {
               alert("Вы указали неверный пароль");
               return;
           }
           else location.href = 'http://' + location.host + '?username=' + username;
       }
       else alert("Вы указали неверный логин");

   })
});
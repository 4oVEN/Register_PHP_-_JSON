$(document).ready(function () {
  
  
  $('#register').validate({
    rules: {
      password: "required",
      password_confirm: {
        equalTo: "#password"
      }
    }
  });
  $('#login').validate();




//  $('.login-btn').click(function (e){

//   e.preventDefault();

//   let login = $('input[name="username"]').val();
//   let password = $('input[name="password"]').val();
  
//   $.ajax({
//     url: "login.php",
//     type: 'POST',
//     dataType: 'json',
//     data: {
//       username: login,
//       password: password
//     },
//     success (data){
//       console.log(data);
//     },
//   });


// });

});

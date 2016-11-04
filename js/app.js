function init(){

  // Add event handler to submit button
  document.getElementById('btnSubmit').addEventListener('click', function(e){

    e.preventDefault();

    var form = document.getElementById('userForm'),
        name = document.getElementById('name').value,
        email = document.getElementById('email').value,
        pass = document.getElementById('pass').value,
        phone = document.getElementById('phone').value,
        company = document.getElementById('company').value;
        birth = document.getElementById('birthdate').value;

    if (!name || !email || !pass || !birth || !phone){
      alert("Its necessary to complete the form to add a new user :)");
      return;
    } else {
      form.submit();
    }
  });
}

init();
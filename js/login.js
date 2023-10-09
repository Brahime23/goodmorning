function checkValidation()
{
	if(document.getElementById('username').value=="")
	{
		alert("Please Enter Your user name .!");
		 
		document.getElementById('username').focus();
		document.getElementById('username').select();
		return false;
	}
	re = /^\w+$/;
	if(!re.test( document.getElementById('username').value))
	{ 
		alert("Error: Username must contain only letters, numbers and underscores!");
		 
		document.getElementById('username').focus();
		return false;
	} 
	
	if(document.getElementById('password').value=="")
	{
		alert("Please Enter Your password .!");
		 
		document.getElementById('password').focus();
		document.getElementById('password').select();
		return false;
	}
	 if (/[^a-zA-Z0-9]/.test(document.getElementById('password').value)) 
	 {
        alert("The password contains illegal characters.");
		 
		document.getElementById('password').focus();
		document.getElementById('password').select();
		return false;
      }
	if(document.getElementById('password').value.length<6)
	{
		alert("Please Enter Your password at least 6 characters .!");
		 
		document.getElementById('password').focus();
		document.getElementById('password').select();
		return false;
	}
	if(document.getElementById('password').value == document.getElementById('user_name').value)
	{
		alert("Error: Password must be different from Username!");
		 
		document.getElementById('password').focus();
		return false; 
	} 
	 
	
	return true;
} 
function checkValidation()
{
	if(document.getElementById('category_name').value=="")
	{
		alert("Please Enter Category.!");
		 
		document.getElementById('category_name').focus();
		document.getElementById('category_name').select();
		return false;
	}
	
	return true;
} 
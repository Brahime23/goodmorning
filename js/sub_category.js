function checkValidation()
{
	if(document.getElementById('category').value=="")
	{
		alert("Please Select Category.!");
		 
		document.getElementById('category').focus();		 
		return false;
	}
	if(document.getElementById('sub_category_name').value=="")
	{
		alert("Please Enter Sub Category.!");
		 
		document.getElementById('sub_category_name').focus();		 
		return false;
	}
	
	return true;
} 
function validatenumber(field,lowerlimit,upperlimit,defaultval)
{
	if (defaultval==0)
		defaultval=0;
	if ((field.value=='') || (field.value==null))
	{
		alert("Value should not empty");
		field.value = defaultval;
	}
	else if(isNaN(field.value)==true)
	{
		alert(field.value + " is not a valid number");
		field.value = defaultval;
	}
	else
	{
		if(field.value < lowerlimit)
		{
			alert(field.value + " should not be below " + lowerlimit);
			field.value = defaultval;
		}
		if(field.value > upperlimit)
		{
			alert(field.value + " should not exceed " + upperlimit);
			field.value = defaultval;
		}
	}
}

function validatenumberemptyallowed(field,lowerlimit,upperlimit,defaultval)
{
	if (defaultval==0)
		defaultval=0;
	if ((field.value=='') || (field.value==null))
		return;
	else if(isNaN(field.value)==true)
	{
		alert(field.value + " is not a valid number");
		field.value = defaultval;
	}
	else
	{
		if(field.value < lowerlimit)
		{
			alert(field.value + " should not be below " + lowerlimit);
			field.value = defaultval;
		}
		if(field.value > upperlimit)
		{
			alert(field.value + " should not exceed " + upperlimit);
			field.value = defaultval;
		}
	}
}



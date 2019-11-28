/*
	FileName : validatorUtils.js
	Author : Osman Sulaiman
*/

/* ##### COMMON UTILITIES ##### */

/*
	Purpose :  trim string for leading and trailing spaces
	Source : Javascript & DHTML CookBook
*/
function trimString(str) {
	var tStr = str.toString();
	while (tStr.charAt(0) == " ")
	{
		tStr = tStr.substring(1);
	}
	while (tStr.charAt(tStr.length - 1) == " ")
	{
		tStr = tStr.substring(0, tStr.length - 1);
	}
	return tStr;
}

/*
	Purpose :  focus and select on specified element
	Source : Javascript & DHTML CookBook
*/
function focusElement(formName, elemName, sel) {
	if (sel == null)
	{
		sel = true;
	}
	var elem = document.forms[formName].elements[elemName];
	elem.focus();
	if (sel)
	{
		elem.select();
	}
}

/*
	Purpose : strip all commas from any given string or number
	Source : http://www.java2s.com/Code/JavaScript/Language-Basics/StripCommas.htm
*/
function stripCommas(numString) {
    var re = /,/g;
    return numString.replace(re,"");
}

/* 
	##### VALIDATION FUNCTIONS ##### 
	Note : should be rewritten to use supporting function.
*/

/*
	Purpose : Validates that the field value string has one or more characters in it
	Source : Javascript & DHTML CookBook
*/
function isFldNotEmpty(elem, notif) {
//	var str = elem.value;
	var str = trimString(elem.value);
	if (str == null || str.length == 0)
	{
		if (notif != null)
		{
			alert(notif);
		}
		else {
			alert("This field cannot be empty");
		}
		return false;
	} else {
		return true;
	}
}

/* 
	Purpose : check the element if its a number or not. 
	Notes : it will return true if the element value is a number or an empty string.
			it also allows minus sign and decimal point.
	Source : Javascript & DHTML CookBook
*/
function isFldNumber(elem, notif) {
	var str = elem.value;
	var oneDecimal = false;
	var oneChar = 0;
	// make sure value hasn't cast to a number type
	str = str.toString();
	for (var i = 0; i < str.length; i++)
	{
		oneChar = str.charAt(i).charCodeAt(0);
		// OK for minus sign as first character
		if (oneChar == 45)
		{
			if (i == 0)
			{
				continue;
			} else {
				if (notif != null)
				{
					alert(notif);
				} else {
					alert("Only the first character may be a minus sign.");
				}
//				elem.focus();
//				elem.select();
				return false;
			}
		}
		// ok for one decimal point
		if (oneChar == 46)
		{
			if (!oneDecimal)
			{
				oneDecimal = true;
				continue;
			} else {
				if (notif != null)
				{
					alert(notif);
				} else {
					alert("Only one decimal is allowed in a number.");
				}
				return false;
			}
		}
		// ok too for comma, only before decimal point
		if (oneChar == 44)
		{
			if (!oneDecimal)
			{
				continue;
			} else {
				if (notif != null)
				{
					alert(notif);
				} else {
					alert("Comma is allowed only before decimal in a number.");
				}
				return false;
			}
		}
		// characters outside of 0 through 9 not OK
		if (oneChar < 48 || oneChar > 57)
		{
			if (notif != null)
			{
				alert(notif);
			} else {
				alert("Enter only numbers into the field.");
			}
			return false;
		}
	}
	return true;
}

/* 
	Purpose : check the element if its a number or not. 
	Notes : it will return true if the element value is a number or an empty string.
			it also allows minus sign and decimal point.
	Source : Javascript & DHTML CookBook
*/
function isFldUnsignedNumber(elem, notif) {
	var str = elem.value;
	var oneDecimal = false;
	var oneChar = 0;
	// make sure value hasn't cast to a number type
	str = str.toString();
	for (var i = 0; i < str.length; i++)
	{
		oneChar = str.charAt(i).charCodeAt(0);
		// ok for one decimal point
		if (oneChar == 46)
		{
			if (!oneDecimal)
			{
				oneDecimal = true;
				continue;
			} else {
				if (notif != null)
				{
					alert(notif);
				} else {
					alert("Only one decimal is allowed in a number.");
				}
				return false;
			}
		}
		// ok too for comma, only before decimal point
		if (oneChar == 44)
		{
			if (!oneDecimal)
			{
				continue;
			} else {
				if (notif != null)
				{
					alert(notif);
				} else {
					alert("Comma is allowed only before decimal in a number.");
				}
				return false;
			}
		}
		// characters outside of 0 through 9 not OK
		if (oneChar < 48 || oneChar > 57)
		{
			if (notif != null)
			{
				alert(notif);
			} else {
				alert("Enter proper unsigned numbers into the field.");
			}
			return false;
		}
	}
	return true;
}

/*
	Purpose : check the element if its a number or not. 
	Notes : this function is the same as isFldNumber function
			except that this function checks only unsigned integer without decimal
*/
function isFldInteger(elem, notif) {
	var str = elem.value.toString();
	var oneChar = 0;
	for (var i = 0; i < str.length; i++) {
		oneChar = str.charAt(i).charCodeAt(0);
		// characters outside of 0 through 9 not OK
		if (oneChar < 48 || oneChar > 57)
		{
			if (notif != null)
			{
				alert(notif);
			} else {
				alert("Enter only unsigned numbers into the field.");
			}
			return false;
		}
	}
	return true;
}

/*
	Purpose : Validates that the field is formatted as an email address.
	Source : Javascript & DHTML CookBook
*/
function isFldEmailAddr(elem, notif) {
	var str = elem.value.toLowerCase();
	if (str.length <= 0)
	{
		return true;
	}
	var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
	if (!str.match(re))
	{
		if (notif != null)
		{
			alert(notif);
		} else {
			alert("Verify the email address format.");
		}
		return false;
	} else {
		return true;
	}
}

function isMaxLength(elem, maxVal, notif) {
	var str = elem.value;
	if (str.length > maxVal)
	{
		if (notif != null)
		{
			alert(notif);
		} else {
			alert(maxVal + " characters maximum.");
		}
		return false;
	} else {
		return true;
	}
}

function isMinLength(elem, minVal, notif) {
	var str = elem.value;
	if (str.length < minVal)
	{
		if (notif != null)
		{
			alert(notif);
		} else {
			alert(minVal + " characters minimum.");
		}
		return false;
	} else {
		return true;
	}
}

function isNotSelect(elem, index, notif) {
	var elemVal = elem.selectedIndex;
	if (elemVal == index)
	{
		if (notif != null)
		{
			alert(notif);
		} else {
			alert("Please select a value.");
		}
		return false;
	} else {
		return true;
	}
}

/* ##### VALIDATION SUPPORT FUNCTION ##### */

function isInteger(arg) {
	var str = arg.toString();
	var oneChar = 0;
	for (var i = 0; i < str.length; i++) {
		oneChar = str.charAt(i).charCodeAt(0);
		// characters outside of 0 through 9 not OK
		if (oneChar < 48 || oneChar > 57)
		{
			return false;
		}
	}
	return true;
}

function isNumber(arg) {
	var str = arg.toString();
	var oneDecimal = false;
	var oneChar = 0;
	for (var i = 0; i < str.length; i++)
	{
		oneChar = str.charAt(i).charCodeAt(0);
		// OK for minus sign as first character
		if (oneChar == 45)
		{
			if (i == 0)
			{
				continue;
			} else {
				return false;
			}
		}
		// ok for one decimal point
		if (oneChar == 46)
		{
			if (!oneDecimal)
			{
				oneDecimal = true;
				continue;
			} else {
				return false;
			}
		}
		// ok too for comma, only before decimal point
		if (oneChar == 44)
		{
			if (!oneDecimal)
			{
				continue;
			} else {
				return false;
			}
		}
		// characters outside of 0 through 9 not OK
		if (oneChar < 48 || oneChar > 57)
		{
			return false;
		}
	}
	return true;
}

function isEmailAddr(arg) {
	var str = arg.toLowerCase();
	if (str.length <= 0)
	{
		return true;
	}
	var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
	if (!str.match(re))
	{
		return false;
	} else {
		return true;
	}
}

function isEmptyStr(arg) {
	var str = trimString(arg);
	if (str == null || str.length == 0)
	{
		return true;
	}
	return false;
}
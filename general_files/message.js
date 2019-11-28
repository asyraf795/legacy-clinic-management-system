
	var message = { umSubject:null, umContent:null };
	var msg0 = function(data)
	{
	  if (data != null && typeof data == 'object'){
	  	//alert(dwr.util.toDescriptiveString(data, 2));
	  	dwr.util.setEscapeHtml(false);
	  	DWRUtil.setValues(data);
	  	document.getElementById('themessage').style.display='block';
	  }
	  else {
	  	dwr.util.setValue('msubj', dwr.util.toDescriptiveString(data, 0));
	  }
	}

	function loadMessage(ctl,msgid)
	{
		messageMgr.viewMessage(msgid, msg0);
		displayLayerRelated(ctl,'messageLayer');
	}

	function resizeMessageTable()
	{
		var swidth = screen.width;
		var sheight = screen.height;

		document.getElementById('main-message').style.width=swidth-80+"px";
		document.getElementById('row').style.width=swidth-80+"px";
	}


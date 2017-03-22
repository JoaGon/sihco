function pruebaEditor(){
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		convert_newlines_to_brs : true,
		force_br_newlines : true,
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		
		force_p_newlines : false,
		convert_fonts_to_spans : true,	

        formats : {
            alignleft : {selector : 'br,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'left'},
            aligncenter : {selector : 'br,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'center'},
            alignright : {selector : 'br,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'right'},
            alignfull : {selector : 'br,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'full'},
            bold : {inline : 'span', 'classes' : 'bold'},
            italic : {inline : 'span', 'classes' : 'italic'},
            underline : {inline : 'span', 'classes' : 'underline', exact : true},
            strikethrough : {inline : 'del'},
            forecolor : {inline : 'span', classes : 'forecolor', styles : {color : '%value'}},
            hilitecolor : {inline : 'span', classes : 'hilitecolor', styles : {backgroundColor : '%value'}},
            custom_format : {block : 'h1', attributes : {title : "Header"}, styles : {color : red}}
        },		
		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});	
}
function editorWord(){
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "newdocument,|,preview,print,|,fullscreen,|,bold,italic,strikethrough,|,forecolor,|,justifyleft,justifycenter,justifyright,justifyfull,|,hr,|,sub,sup,charmap,|,undo,redo,|,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,code,|,image,bullist,numlist,|,outdent,indent,|,insertdate,inserttime,tablecontrols",
		theme_advanced_buttons3 : "",
		//theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		//content_css : "css/word.css",
		//content_css : "css/content.css",
		content_css : "http://lila.adm.ula.ve/glori/public/templates/horizontal/menu.css",
		
		theme_advanced_font_sizes: "7pt,8pt,9pt,10pt,11pt,12pt,13pt,14pt,15pt,16pt,18pt,20pt",
		font_size_style_values : "7pt,8pt,9pt,10pt,11pt,12pt,13pt,14pt,15pt,16pt,18pt,20pt",
		//font_size_legacy_values : "1=8pt,2=10pt,3=12pt,4=14pt,5=18pt,6=24pt,7=32pt",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		style_formats : [
		     			{title : 'Bold text', inline : 'b'},
		     			{title : 'Salto', inline : 'p', styles : {padding : '5px 0px'}},
		     			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
		     			{title : 'Example 1', inline : 'span', classes : 'example1'},
		     			{title : 'Example 2', inline : 'span', classes : 'example2'},
		     			{title : 'Table styles'},
		     			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		     		],
/*
		entity_encoding : "raw",
		add_unload_trigger : false,
		remove_linebreaks : false,
		inline_styles : false,
		convert_fonts_to_spans : false,
*/		
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
}

function ajaxSave() {
//	alert("entro");
	var ed = tinyMCE.get('cuerpouacep');
	// Do you ajax call here, window.setTimeout fakes ajax call
	ed.setProgressState(1); // Show progress
	window.setTimeout(function() {
	ed.setProgressState(0); // Hide progress
	document.form.opcion.value='ingresar';
	tinyMCE.triggerSave();
	document.form.submit();
//	alert(ed.getContent());
	}, 3000);
//	alert("salio")
}
function editorWordConsulta(){
	tinyMCE.init({
		// General options
//		readonly : true,
		mode : "textareas",
		theme : "advanced",
//		readonly : true,
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "newdocument,|,preview,print,|,fullscreen,|,bold,italic,strikethrough,|,forecolor,|,justifyleft,justifycenter,justifyright,justifyfull,|,hr,|,sub,sup,charmap,|,undo,redo,|,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,code,|,bullist,numlist,|,outdent,indent,|,insertdate,inserttime,tablecontrols",
		theme_advanced_buttons3 : "",
		//theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true		
	});
}
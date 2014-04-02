	jQuery(document).ready(function(){
	jQuery('#_optthemes_webformcodehtml').change(change_selects);
	jQuery('#_launchpage_autorespondercode').change(change_launch_selects);
	jQuery('#_seo_webformcodehtml').change(change_seo_selects);

	function str_replace (search, replace, subject, count) {
	var i = 0, j = 0, temp = '', repl = '', sl = 0, fl = 0,
				f = [].concat(search),
				r = [].concat(replace),
				s = subject,
				ra = r instanceof Array, sa = s instanceof Array;
		s = [].concat(s);
		if (count) {
			this.window[count] = 0;
		}
	 
		for (i=0, sl=s.length; i < sl; i++) {
			if (s[i] === '') {
				continue;
			}
			for (j=0, fl=f.length; j < fl; j++) {
				temp = s[i]+'';
				repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
				s[i] = (temp).split(f[j]).join(repl);
				if (count && s[i] !== temp) {
					this.window[count] += (temp.length-s[i].length)/f[j].length;}
			}
		}
		return sa ? s : s[0];
	}	

	function change_selects(){
		var tags = ['a','iframe','frame','frameset','script'], reg, val = jQuery('#_optthemes_webformcodehtml').val(),
			hdn = jQuery('#popup_domination_hdn_div2'), formurl = jQuery('#_optthemes_optinformurl'), hiddenfields = jQuery('#_optthemes_webformhiddenhtml');
	    formurl.val('');
		if(jQuery.trim(val) == '')
			return false;
		jQuery('#popup_domination_hdn_div').html('');
		jQuery('#popup_domination_hdn_div2').html('');
		/*var tmp = jQuery(val);
		tmp.find('a,iframe,frame,frameset,script,img').remove();
		tmp.find('input[type="image"]').attr('src','');*/
		for(var i=0;i<5;i++){
			reg = new RegExp('<'+tags[i]+'([^<>+]*[^\/])>.*?</'+tags[i]+'>', "gi");
			val = val.replace(reg,'');
			
			reg = new RegExp('<'+tags[i]+'([^<>+]*)>', "gi");
			val = val.replace(reg,'');
		}
		var tmpval;
		try {
			tmpval = decodeURIComponent(val);
		} catch(err){
			tmpval = val;
		}
		hdn.append(tmpval);
		/*alert(hdn.html());*/
		var num = 0;
		var name_selected = '';
		var email_selected = '';
		jQuery(':text',hdn).each(function(){
			var name = jQuery(this).attr('name'),
				//name_selected = name == $('#popup_domination_name_box_selected').val() ? ' selected="selected"' : '', 
				//email_selected = name == $('#popup_domination_email_box_selected').val() ? ' selected="selected"' : '';
				//jQuery('#popup_domination_name_box').append('<option value="'+name+'"'+name_selected+'>'+name+'</option>');
				//jQuery('#popup_domination_email_box').append('<option value="'+name+'"'+email_selected+'>'+name+'</option>');
				name_selected = num == '0' ? name : (num != '0' ? name_selected : ''), 
				email_selected = num == '1' ? name : email_selected;
				if(num=='0') jQuery('#_optthemes_optinname').val(name_selected);
				if(num=='1') jQuery('#_optthemes_optinemail').val(email_selected);
		num++;
		});
		jQuery(':input[type=hidden]',hdn).each(function(){
			jQuery('#popup_domination_hdn_div').append(jQuery('<input type="hidden" name="'+jQuery(this).attr('name')+'" />').val(jQuery(this).val()));
		});		
		var hidden_f = jQuery('#popup_domination_hdn_div').html();
		formurl.val(jQuery('form',hdn).attr('action'));
		hidden_f = str_replace("&lt;", "<", hidden_f);
		hidden_f = str_replace("&gt;", ">", hidden_f);
		hiddenfields.val(hidden_f);
		//alert(tmpval);
		hdn.html('');
	};

	function change_launch_selects(){
		var tags = ['a','iframe','frame','frameset','script'], reg, val = jQuery('#_launchpage_autorespondercode').val(),
			hdn = jQuery('#optin_launch_hdn_div2'), formurl = jQuery('#_launchpage_optinformurl'), hiddenfields = jQuery('#_launchpage_webformhiddenhtml');
	    formurl.val('');
		if(jQuery.trim(val) == '')
			return false;
		jQuery('#optin_launch_hdn_div').html('');
		jQuery('#optin_launch_hdn_div2').html('');
		/*var tmp = jQuery(val);
		tmp.find('a,iframe,frame,frameset,script,img').remove();
		tmp.find('input[type="image"]').attr('src','');*/
		for(var i=0;i<5;i++){
			reg = new RegExp('<'+tags[i]+'([^<>+]*[^\/])>.*?</'+tags[i]+'>', "gi");
			val = val.replace(reg,'');
			
			reg = new RegExp('<'+tags[i]+'([^<>+]*)>', "gi");
			val = val.replace(reg,'');
		}
		var tmpval;
		try {
			tmpval = decodeURIComponent(val);
		} catch(err){
			tmpval = val;
		}
		hdn.append(tmpval);
		/*alert(hdn.html());*/
		var num = 0;
		var name_selected = '';
		var email_selected = '';
		jQuery(':text',hdn).each(function(){
			var name = jQuery(this).attr('name'),
				name_selected = num == '0' ? name : (num != '0' ? name_selected : ''), 
				email_selected = num == '1' ? name : email_selected;
				if(num=='0') jQuery('#_launchpage_optinboxname').val(name_selected);
				if(num=='1') jQuery('#_launchpage_optinboxemail').val(email_selected);
		num++;
		});
		jQuery(':input[type=hidden]',hdn).each(function(){
			jQuery('#optin_launch_hdn_div').append(jQuery('<input type="hidden" name="'+jQuery(this).attr('name')+'" />').val(jQuery(this).val()));
		});		
		var hidden_f = jQuery('#optin_launch_hdn_div').html();
		formurl.val(jQuery('form',hdn).attr('action'));
		hidden_f = str_replace("&lt;", "<", hidden_f);
		hidden_f = str_replace("&gt;", ">", hidden_f);
		hiddenfields.val(hidden_f);
		//alert(tmpval);
		hdn.html('');
	};
	
	function change_seo_selects(){
		var tags = ['a','iframe','frame','frameset','script'], reg, val = jQuery('#_seo_webformcodehtml').val(),
			hdn = jQuery('#popup_domination_hdn_div2'), formurl = jQuery('#_seo_optinformurl'), hiddenfields = jQuery('#_seo_webformhiddenhtml');
	    formurl.val('');
		if(jQuery.trim(val) == '')
			return false;
		jQuery('#popup_domination_hdn_div').html('');
		jQuery('#popup_domination_hdn_div2').html('');
		/*var tmp = jQuery(val);
		tmp.find('a,iframe,frame,frameset,script,img').remove();
		tmp.find('input[type="image"]').attr('src','');*/
		for(var i=0;i<5;i++){
			reg = new RegExp('<'+tags[i]+'([^<>+]*[^\/])>.*?</'+tags[i]+'>', "gi");
			val = val.replace(reg,'');
			
			reg = new RegExp('<'+tags[i]+'([^<>+]*)>', "gi");
			val = val.replace(reg,'');
		}
		var tmpval;
		try {
			tmpval = decodeURIComponent(val);
		} catch(err){
			tmpval = val;
		}
		hdn.append(tmpval);
		/*alert(hdn.html());*/
		var num = 0;
		var name_selected = '';
		var email_selected = '';
		jQuery(':text',hdn).each(function(){
			var name = jQuery(this).attr('name'),
				//name_selected = name == $('#popup_domination_name_box_selected').val() ? ' selected="selected"' : '', 
				//email_selected = name == $('#popup_domination_email_box_selected').val() ? ' selected="selected"' : '';
				//jQuery('#popup_domination_name_box').append('<option value="'+name+'"'+name_selected+'>'+name+'</option>');
				//jQuery('#popup_domination_email_box').append('<option value="'+name+'"'+email_selected+'>'+name+'</option>');
				name_selected = num == '0' ? name : (num != '0' ? name_selected : ''), 
				email_selected = num == '1' ? name : email_selected;
				if(num=='0') jQuery('#_seo_optinname').val(name_selected);
				if(num=='1') jQuery('#_seo_optinemail').val(email_selected);
		num++;
		});
		jQuery(':input[type=hidden]',hdn).each(function(){
			jQuery('#popup_domination_hdn_div').append(jQuery('<input type="hidden" name="'+jQuery(this).attr('name')+'" />').val(jQuery(this).val()));
		});		
		var hidden_f = jQuery('#popup_domination_hdn_div').html();
		formurl.val(jQuery('form',hdn).attr('action'));
		hidden_f = str_replace("&lt;", "<", hidden_f);
		hidden_f = str_replace("&gt;", ">", hidden_f);
		hiddenfields.val(hidden_f);
		//alert(tmpval);
		hdn.html('');
	};
	
});
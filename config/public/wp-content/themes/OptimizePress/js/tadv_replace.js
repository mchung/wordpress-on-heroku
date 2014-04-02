
tadvReplace = {

	init : function() {
		var t = this, btn1, btn2, tb = document.getElementById('ed_toolbar'), c = document.getElementById('content'), se;
		se = ( 'undefined' != typeof switchEditors ) ? switchEditors : null;


/*
		if ( 'undefined' != typeof tb ) {
			btn1 = document.createElement('input');
			btn1.type = 'button';
			btn1.value = 'autop';
			btn1.className = 'ed_button';
			btn1.title = 'autop';
			btn1.id = 'ed_autop';
			btn1.onclick = function(){tadvReplace.btn_autop();};
			tb.appendChild(btn1);

			btn2 = document.createElement('input');
			btn2.type = 'button';
			btn2.value = 'undo';
			btn2.className = 'ed_button';
			btn2.title = 'undo';
			btn2.id = 'ed_undo';
			btn2.style.color = '#888';
			btn2.onclick = function(){tadvReplace.btn_undo();};
			tb.appendChild(btn2);
		}
*/
	},

	pre_format : function(c) {

		c = c.replace(/<(pre|script)[^>]*>[\s\S]+?<\/\1>/g, function(a) {
			a = a.replace(/<br ?\/?>[\r\n]*/g, '\n');
			return a.replace(/<\/?p( [^>]*)?>[\r\n]*/g, '\n');
        });

		//c = c.replace(/<p>(\s|<br ?\/?>|\u00a0)*<\/p>/g, '<p><br class="spacer_" /></p>'); // keep empty paragraphs...
		c = c.replace(/<p>(\s|<br ?\/?>|\u00a0)*<\/p>/g, '<br />');
        c = c.replace(/\[\/sourcecode\]\s*<br \/>\s*<br \/>/g, '[/sourcecode]\n');
		c = c.replace(/<p( [^>]*)?>/g, '\n<p$1>');
		c = c.replace(/<\/p>/g, '</p>\n');
		c = c.replace(/<\/p>\s*<p/g, '</p>\n\n<p');
		c = c.replace(/<((blockquote|ul|ol|li|table|thead|tbody|tr|th|td|div|h[1-6])[^>]*)>\s*<p/g, '<$1><p');
		c = c.replace(/<\/p>\s*<\/(blockquote|ul|ol|li|table|thead|tbody|tr|th|td|div|h[1-6])>/g, '</p></$1>');
		//c = c.replace(/<br ?\/?>[\r\n]*/g, '<br />\n');
		c = c.replace(/<li([^>]*)>/g, '\t<li$1>');
		c = c.replace(new RegExp('\\s*\\[caption([^\\[]+)\\[/caption\\]\\s*', 'gi'), '\n\n[caption$1[/caption]\n\n');
		c = c.replace(new RegExp('caption\\]\\n\\n+\\[caption', 'g'), 'caption]\n\n[caption');

		c = c.replace(/<object[\s\S]+?<\/object>/g, function(a) {
			return a.replace(/[\r\n]*/g, '');
        });
		
		return tinymce.trim(c);
	},

	cache : '',

	btn_undo : function() {
		var t = this, btn_undo = document.getElementById('ed_undo');

		if ( t.cache ) document.getElementById('content').value = t.cache;
		btn_undo.style.color = '#888';
	},

	btn_autop : function() {
		var c = document.getElementById('content'), t = this, sel, btn_undo = document.getElementById('ed_undo'), autop = switchEditors.tadv_pre_wpautop;
		t.cache = c.value;
		
		if( c.value != null ) { if ( c.value == '<br />\n' ) c.value = ''; if ( c.value == '<p> </p>' ) c.value = '';  }

		if ( document.selection ) { //ie
			c.focus();
			sel = document.selection.createRange();
			if ( sel.text.length > 0 ) 
				sel.text = autop(sel.text);
			else c.value = autop(c.value);

		} else if ( c.selectionEnd > 0 && c.selectionStart != c.selectionEnd ) { //ff
			var startPos = c.selectionStart, endPos = c.selectionEnd, scrollTop = c.scrollTop;

			c.value = c.value.substring(0, startPos)
					+ autop(c.value.substring(startPos, endPos))
					+ c.value.substring(endPos, c.value.length);
		    c.scrollTop = scrollTop;
        } else
			c.value = autop(c.value);

        c.focus();

		btn_undo.style.color = '#000';
	},

	noautop : function(c) {return c;}
}

addLoadEvent(function(){tadvReplace.init();});

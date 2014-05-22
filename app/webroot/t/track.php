<?php
header("Content-type: text/javascript");
?>
if(!window['AKApp']) {

	window['AKApp'] = {

		initHasRun: false,

		init: function(id){
			this.doInit(id);
		},

		doInit: function(id){
			if(this.initHasRun){
				return;
			}
			this.initHasRun = true;
			this.id = id;
			this.main();
			if(this.cookiesEnabled()) {
			}
		},

		main: function() {
			var value = this.readCookie('p10');
			if (value == null || value == '') {
				var referrer = (document.referrer ? encodeURIComponent(document.referrer) : 'p10');
				this.createCookie('p10', referrer);
				this.save();
			}
		},

		save: function() {
			var params = {
				account: this.id,
				url : encodeURIComponent(document.URL),
				referrer : (document.referrer ? encodeURIComponent(document.referrer) : ""),
				resolution : screen.width + ',' + screen.height,
				title : escape(document.title)
			};
			var serialisedGetParams = [];
			for (var param in params) {
				if ( ! params.hasOwnProperty(param)) {
				continue;
				}
				serialisedGetParams.push(param + '=' + params[param]);
			}
			serialisedGetParams = serialisedGetParams.join('&');
			(new Image).src = 'http://www.gourmetdev.com/t/tracking.php?' + serialisedGetParams;
		},

		createCookie: function(name, value, secs) {
			if(secs) {
				var date = new Date();
				date.setTime(date.getTime() + (secs * 1000));
				var expires = '; expires=' + date.toGMTString();
			} else var expires = '';
			document.cookie = name + '=' + value + expires + '; path=/';
		},

		readCookie: function(name) {
			if(document.cookie && document.cookie.substr) {
				var nameEQ = name + "=";
				var ca = document.cookie.split(';');
				for(var i = 0; i < ca.length; i++) {
					var c = ca[i];
					while (c.charAt(0) == ' ') c = c.substring(1, c.length);
					if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
				}
				return null;
			} else {
				return null;
			}
		},

		eraseCookie: function(name) {
			this.createCookie(name, '', -1);
		},

		cookiesEnabled: function() {
			if(this.cookiesAreEnabled == 'yes'){
				return true;
			} else if(this.cookiesAreEnabled == 'no') {
				return false;
			} else {
				this.createCookie('_p10', 'ak');
				if(this.readCookie('_p10') == 'ak'){
					this.cookiesAreEnabled = 'yes';
					return true;
				} else {
					this.cookiesAreEnabled = 'no';
					return false;
				}
			}
		}

	}

}

function AKNew(){
	AKApp.init('<?php echo $_GET['id'];?>');
	return AKApp;
}

try { var P = AKNew(); } catch(err) {}


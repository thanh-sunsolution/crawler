function mySetCookie(c_name,value,expiredays)
{
	var exdate = new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie = c_name+ '=' +escape(value)+((expiredays==null) ? '' : ';expires='+exdate.toGMTString());
}

function myGetCookie(c_name)
{
	if (document.cookie.length>0)
	{
		c_start=document.cookie.indexOf(c_name + '=')
		if (c_start!=-1)
		{
			c_start = c_start + c_name.length+1;
			c_end = document.cookie.indexOf(';',c_start);
			if (c_end==-1) c_end = document.cookie.length
				return unescape(document.cookie.substring(c_start,c_end));
		}
	}
	return '';
}

function showPopupOnce() {
   var hasSeenPopup = myGetCookie('has_seen_popup');
	if (hasSeenPopup == null || hasSeenPopup == ''){
		window.open('https://www.google.com.vn/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwitqef6_dXKAhUDFqYKHUfLAz4QFggaMAA&url=http%3A%2F%2Fwww.chupamobile.com%2Fios-utilities%2Fdtool-downloader-and-idownload-manager-12710&usg=AFQjCNFnATit7l4BQV_mJd_uRiUDSzuh_g&sig2=Y_IatiX3ZHLju3Zvtmej8Q', 'myPopupWindow');
	}
	mySetCookie('has_seen_popup', 'true', 1); // 365 days = 1 year
}
//showPopupOnce();

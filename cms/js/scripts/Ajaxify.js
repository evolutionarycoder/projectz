!function(t){var e=function(t,e){for(var s in t[0])t[0].hasOwnProperty(s)&&e.appendData(s,t[0][s])},s=function(t,e){for(var s in t[0])t[0].hasOwnProperty(s)&&e.appendUrl(s,t[0][s])},r=function(t){t.postData=new FormData},h=function(t,e){for(var s in e.headers[0])e.headers[0].hasOwnProperty(s)&&t.setRequestHeader(s,e.headers[0][s]);return t},n=function(e){if(t.XMLHttpRequest)e.xhr=new XMLHttpRequest;else try{e.xhr=new ActiveXObject("Microsoft.XMLHTTP")}catch(s){e.xhr=!1}},i=function(t){return new i.init(t)};i.prototype={appendData:function(t,e){return this.postData.append(t,e),this},appendUrl:function(t,e){return e=encodeURIComponent(e),-1===this.host.indexOf("?")?this.host+="?"+t+"="+e:this.host+="&"+t+"="+e,this},addHeader:function(t,e){return this.xhr.setRequestHeader(t,e),this},sendRequest:function(){var t=this;if(this.xhr){var e=function(){4===t.xhr.readyState&&200===t.xhr.status?"text"===t.responseType?t.Success(t.xhr.responseText):t.Success(t.xhr.responseXML):200!==t.xhr.status&&4===t.xhr.readyState&&t.Failure()};this.xhr.open(this.method,this.host,!0),this.headers&&(this.xhr=h(this.xhr,this)),this.xhr.onreadystatechange=e,this.xhr.send(this.postData)}}},i.init=function(t){this.host=t.host,t.execute=t.execute||!1,this.Success=t.Success||!1,this.Failure=t.Failure||!1,this.responseType=t.responseType.toLowerCase()||"text",this.method=t.method.toUpperCase()||"POST",this.headers=t.headers||!1;var h=t.data||!1;n(this),h&&("POST"===t.method.toUpperCase()?(r(this),e(h,this)):"GET"===t.method.toUpperCase()&&s(h,this)),t.execute&&this.sendRequest()},i.init.prototype=i.prototype,t.Ajaxify=i}(this);
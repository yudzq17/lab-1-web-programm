!function(){"use strict";function t(t){if(t){var e=function(){t&&t.parentNode&&t.parentNode.removeChild(t)};i(t,"show"),a(t,"hide"),t.addEventListener("transitionend",e),setTimeout(e,u)}}function e(t){var e=t.offsetHeight,n=window.innerHeight?window.innerHeight:document.documentElement.clientHeight?document.documentElement.clientHeight:screen.height,o=n/2-e/2;t.style.top=o+"px"}function n(t){var e=document.createElement("div");return e.innerHTML=t,e.firstChild}function o(t,e){var n="data-"+e,o=document.createElement("div");o.appendChild(t);var i=o.querySelector("["+n+"]");if(!i)throw new Error('Unable to find: "'+n+'" attribute.');return i}function i(t,e){var n=t.getAttribute("class"),o=n?n.split(" "):[],i=o.indexOf(e);i!==-1&&o.splice(i,1),t.className=o.join(" ")}function a(t,e){var n=t.getAttribute("class"),o=n?n.split(" "):[];o.push(e),t.className=o.join(" ")}function s(t){return JSON.parse(JSON.stringify(t))}function l(){var l={parent:document.body,dialogWidth:"400px",dialogPersistent:!0,dialogContainerClass:"alertify",dialogButtons:{ok:{label:"Ok",autoClose:!0,template:'<button data-alertify-btn="ok" tabindex="1"></button>'},cancel:{label:"Cancel",autoClose:!0,template:'<button data-alertify-btn="cancel" tabindex="2"></button>'},custom:{label:"Custom",autoClose:!1,template:'<button data-alertify-btn tabindex="3"></button>'}},logDelay:5e3,logMaxItems:2,logPosition:{v:"bottom",h:"left"},logContainerClass:"alertify-logs",logTemplateMethod:null,templates:{dialogButtonsHolder:"<nav data-alertify-btn-holder></nav>",dialogMessage:"<div data-alertify-msg></div>",dialogInput:'<input data-alertify-input type="text">',logMessage:"<div data-alertify-log-msg></div>"}},u=function(e){var i=this;this.type=e,this.fixed=!1,this.template=d.logTemplateMethod,this.dom={},this.createDomElements=function(t){this.dom.wrapper=n(t),this.dom.message=o(this.dom.wrapper,"alertify-log-msg"),setTimeout(function(){i.dom.wrapper.className+=" show"},10)},this.getDomElements=function(){return this.dom},this.setMessage=function(t){var e=t;this.template&&(e=this.template(t)),e instanceof HTMLElement?(this.dom.message.innerHTML="",this.dom.message.appendChild(e)):this.dom.message.innerHTML=e},this.setType=function(t){a(this.dom.message,t)},this.setClickEvent=function(t){this.dom.wrapper.addEventListener("click",function(e){t(e,i)})},this.injectHtml=function(){var t=r.elements;0===t.length||"top"===d.logPosition.v?r.container.appendChild(this.dom.wrapper):r.container.insertBefore(this.dom.wrapper,t[t.length-1].dom.wrapper),r.elements.push(this)},this.stick=function(t){this.fixed=t},this.isFixed=function(){return this.fixed},this.remove=function(){t(this.dom.wrapper);var e=r.elements.indexOf(this);e>-1&&r.elements.splice(e,1)}},d={version:"1.0.11",parent:l.parent,dialogWidth:l.dialogWidth,dialogPersistent:l.dialogPersistent,dialogContainerClass:l.dialogContainerClass,dialogButtons:s(l.dialogButtons),promptValue:"",logDelay:l.logDelay,logMaxItems:l.logMaxItems,logPosition:l.logPosition,logContainerClass:l.logContainerClass,logTemplateMethod:l.logTemplateMethod,templates:s(l.templates),build:function(t,e){var i={};if(i.container=document.createElement("div"),i.container.className=this.dialogContainerClass+" hide",i.wrapper=document.createElement("div"),i.wrapper.className="dialog",i.dialog=document.createElement("div"),i.dialog.style.width=this.dialogWidth,i.content=document.createElement("div"),i.content.className="content","dialog"===t.type?i.content.innerHTML=t.message:(i.messageWrapper=n(this.templates.dialogMessage),i.message=o(i.messageWrapper,"alertify-msg"),i.message.innerHTML=t.message,i.content.appendChild(i.messageWrapper)),i.buttonsWrapper=n(this.templates.dialogButtonsHolder),i.buttonsHolder=o(i.buttonsWrapper,"alertify-btn-holder"),"prompt"===t.type){var a=n(this.templates.dialogInput);i.input=o(a,"alertify-input"),i.content.appendChild(a)}i.container.appendChild(i.wrapper),i.wrapper.appendChild(i.dialog),i.dialog.appendChild(i.content),i.dialog.appendChild(i.buttonsWrapper),i.buttonsHolder.innerHTML="",i.buttons=[];for(var s=0;s<e.length;s++){var l=o(e[s].element,"alertify-btn");l.innerHTML=e[s].label,i.buttonsHolder.appendChild(e[s].element)}return i},prepareDialogButton:function(t,e){var n={};return!e||"object"!=typeof e||e instanceof Array||(n=e),"function"==typeof e&&(n.click=e),n.type=t,n},createButtonsDefinition:function(t){for(var e=[],o=0;o<t.buttons.length;o++){var i=this.buildButtonObject(t.buttons[o]);("dialog"===t.type||"alert"===t.type&&"ok"===i.type||["confirm","prompt"].indexOf(t.type)!==-1&&["ok","cancel"].indexOf(i.type)!==-1)&&(i.element=n(i.template),e.push(i))}return e},buildButtonObject:function(t){var e={},n=t.type||"custom",o=this.dialogButtons,i=["ok","cancel","custom"];if("undefined"!=typeof t.type&&i.indexOf(t.type)===-1)throw new Error('Wrong button type: "'+t.type+'". Valid values: "'+i.join('", "')+'"');return e.type=n,e.label="undefined"!=typeof t.label?t.label:o[n].label,e.autoClose="undefined"!=typeof t.autoClose?t.autoClose:o[n].autoClose,e.template="undefined"!=typeof t.template?t.template:o[n].template,e.click="undefined"!=typeof t.click?t.click:o[n].click,e},close:function(t,e){e=e&&!isNaN(+e)?+e:this.logDelay,e<0?t.remove():e>0&&setTimeout(function(){t.remove()},e)},dialog:function(t,e,n){return this.setup({type:e,message:t,buttons:n})},log:function(t,e,n){for(var o=r.elements,i=[],a=0,s=o.length;a<s;a++)o[a].isFixed()||i.push(o[a]);var l=i.length-this.logMaxItems;if(l>=0)for(var u=0,d=l+1;u<d;u++)this.close(i[u],-1);this.notify(t,e,n)},setLogContainerClass:function(t){this.logContainerClass=l.logContainerClass+" "+t},setLogPosition:function(t){var e=t.split(" ");if(["top","bottom"].indexOf(e[0])===-1||["left","right"].indexOf(e[1])===-1)throw new Error('Wrong value for "logPosition" parameter.');this.logPosition={v:e[0],h:e[1]}},setLogFixed:function(t){if("boolean"!=typeof t)throw new Error('Wrong value for "logFixed" parameter. Should be boolean.');this.logFixed=t},setupLogContainer:function(){var e=this.logPosition.v+" "+this.logPosition.h,n=this.logContainerClass+" "+e,o=r.container&&r.container.parentNode!==this.parent;r.container&&!o||(o&&t(r.container),r.elements=[],r.container=document.createElement("div"),r.container.className=n,this.parent.appendChild(r.container)),r.container.className!==n&&(r.container.className=n)},notify:function(t,e,n){this.setupLogContainer();var o=new u;o.createDomElements(this.templates.logMessage),o.setMessage(t),o.setType(e),"function"==typeof n&&o.setClickEvent(n),o.injectHtml(),this.close(o,this.logDelay)},setup:function(n){function o(t){"function"!=typeof t&&(t=function(){});for(var e=0;e<l.length;e++){var n=l[e],o=function(e){return function(n){s=e,e.click&&"function"==typeof e.click&&e.click(n,u),t({ui:u,event:n}),e.autoClose===!0&&u.closeDialog()}}(n);n.element.addEventListener("click",o)}d&&d.addEventListener("keyup",function(t){13===t.which&&a.click()})}for(var a,s,l=this.createButtonsDefinition(n),r=this.build(n,l),u={},d=r.input,c=0;c<l.length;c++)"ok"===l[c].type&&(a=l[c].element);d&&"string"==typeof this.promptValue&&(d.value=this.promptValue),u.dom=r,u.closeDialog=function(){t(r.container)},u.centerDialog=function(){e(r.wrapper)},u.setMessage=function(t){r.message.innerHTML=t},u.setContent=function(t){r.content.innerHTML=t},u.getInputValue=function(){if(r.input)return r.input.value},u.getButtonObject=function(){if(s)return{type:s.type,label:s.label,autoClose:s.autoClose,element:s.element}};var p;return"function"==typeof Promise?p=new Promise(o):o(),this.dialogPersistent===!1&&r.container.addEventListener("click",function(e){e.target!==this&&e.target!==r.wrapper||t(r.container)}),window.onresize=function(){u.centerDialog()},this.parent.appendChild(r.container),setTimeout(function(){i(r.container,"hide"),u.centerDialog(),d&&n.type&&"prompt"===n.type?(d.select(),d.focus()):a&&a.focus()},100),p},setLogDelay:function(t){return t=t||0,this.logDelay=isNaN(t)?l.logDelay:parseInt(t,10),this},setLogMaxItems:function(t){this.logMaxItems=parseInt(t||l.logMaxItems)},setDialogWidth:function(t){"number"==typeof t&&(t+="px"),this.dialogWidth="string"==typeof t?t:l.dialogWidth},setDialogPersistent:function(t){this.dialogPersistent=t},setDialogContainerClass:function(t){this.dialogContainerClass=l.dialogContainerClass+" "+t},setTheme:function(t){if(t){if("string"==typeof t)switch(t.toLowerCase()){case"bootstrap":this.dialogButtons.ok.template='<button data-alertify-btn="ok" class="btn btn-primary" tabindex="1"></button>',this.dialogButtons.cancel.template='<button data-alertify-btn="cancel" class="btn btn-danger" tabindex="2"></button>',this.dialogButtons.custom.template='<button data-alertify-btn="custom" class="btn btn-default" tabindex="3"></button>',this.templates.dialogInput="<input data-alertify-input class='form-control' type='text'>";break;case"purecss":this.dialogButtons.ok.template='<button data-alertify-btn="ok" class="pure-button" tabindex="1"></button>',this.dialogButtons.cancel.template='<button data-alertify-btn="cancel" class="pure-button" tabindex="2"></button>',this.dialogButtons.custom.template='<button data-alertify-btn="custom" class="pure-button" tabindex="3"></button>';break;case"mdl":case"material-design-light":this.dialogButtons.ok.template='<button data-alertify-btn="ok" class=" mdl-button mdl-js-button mdl-js-ripple-effect"  tabindex="1"></button>',this.dialogButtons.cancel.template='<button data-alertify-btn="cancel" class=" mdl-button mdl-js-button mdl-js-ripple-effect" tabindex="2"></button>',this.dialogButtons.custom.template='<button data-alertify-btn="custom" class=" mdl-button mdl-js-button mdl-js-ripple-effect" tabindex="3"></button>',this.templates.dialogInput='<div class="mdl-textfield mdl-js-textfield"><input data-alertify-input class="mdl-textfield__input"></div>';break;case"angular-material":this.dialogButtons.ok.template='<button data-alertify-btn="ok" class="md-primary md-button" tabindex="1"></button>',this.dialogButtons.cancel.template='<button data-alertify-btn="cancel" class="md-button" tabindex="2"></button>',this.dialogButtons.custom.template='<button data-alertify-btn="custom" class="md-button" tabindex="3"></button>',this.templates.dialogInput='<div layout="column"><md-input-container md-no-float><input data-alertify-input type="text"></md-input-container></div>';break;case"default":default:this.dialogButtons=s(l.dialogButtons),this.templates=s(l.templates)}if("object"==typeof t){var e=Object.keys(this.templates);for(var n in t){if(e.indexOf(n)===-1)throw new Error('Wrong template name: "'+n+'". Valid values: "'+e.join('", "')+'"');this.templates[n]=t[n]}}}},reset:function(){this.setTheme("default"),this.parent=l.parent,this.dialogWidth=l.dialogWidth,this.dialogPersistent=l.dialogPersistent,this.dialogContainerClass=l.dialogContainerClass,this.promptValue="",this.logDelay=l.logDelay,this.logMaxItems=l.logMaxItems,this.logPosition=l.logPosition,this.logContainerClass=l.logContainerClass,this.logTemplateMethod=l.logTemplateMethod},injectCSS:function(){if(!document.querySelector("#alertifyCSS")){var t=document.getElementsByTagName("head")[0],e=document.createElement("style");e.type="text/css",e.id="alertifyCSS",t.insertBefore(e,t.firstChild)}},removeCSS:function(){var t=document.querySelector("#alertifyCSS");t&&t.parentNode&&t.parentNode.removeChild(t)}};return d.injectCSS(),{_$$alertify:d,_$$defaults:l,reset:function(){return d.reset(),this},parent:function(t){d.parent=t},theme:function(t){return d.setTheme(t),this},dialog:function(t,e){return d.dialog(t,"dialog",e)||this},alert:function(t,e){var n=[d.prepareDialogButton("ok",e)];return d.dialog(t,"alert",n)||this},confirm:function(t,e,n){var o=[d.prepareDialogButton("ok",e),d.prepareDialogButton("cancel",n)];return d.dialog(t,"confirm",o)||this},prompt:function(t,e,n,o){var i=[d.prepareDialogButton("ok",n),d.prepareDialogButton("cancel",o)];return d.promptValue=e||"",d.dialog(t,"prompt",i)||this},dialogWidth:function(t){return d.setDialogWidth(t),this},dialogPersistent:function(t){return d.setDialogPersistent(t),this},dialogContainerClass:function(t){return d.setDialogContainerClass(t||""),this},clearDialogs:function(){for(var t;t=d.parent.querySelector(":scope > ."+l.dialogContainerClass);)d.parent.removeChild(t);return this},log:function(t,e){return d.log(t,"default",e),this},success:function(t,e){return d.log(t,"success",e),this},warning:function(t,e){return d.log(t,"warning",e),this},error:function(t,e){return d.log(t,"error",e),this},logDelay:function(t){return d.setLogDelay(t),this},logMaxItems:function(t){return d.setLogMaxItems(t),this},logPosition:function(t){return d.setLogPosition(t||""),this},logContainerClass:function(t){return d.setLogContainerClass(t||""),this},logMessageTemplate:function(t){return d.logTemplateMethod=t,this},getLogs:function(){return r.elements},clearLogs:function(){return r.container.innerHTML="",r.elements=[],this},version:d.version}}var r={container:null,elements:[]},u=500;if("undefined"!=typeof module&&module&&module.exports){module.exports=function(){return new l};var d=new l;for(var c in d)module.exports[c]=d[c]}else"function"==typeof define&&define.amd?define(function(){return new l}):window.alertify=new l}();
if (!document.loadedScripts) document.loadedScripts =[];document.loadedScripts.push('/assets/js/jquery.inputmask.min.js');document.loadedScripts.push('/assets/js/jquery.maskedinput.min.js');document.loadedScripts.push('/assets/js/jquery.autocomplete.min.js');document.loadedScripts.push('/assets/js/jquery.fancybox.min.js');document.loadedScripts.push('/assets/js/jquery.serializejson.min.js');document.loadedScripts.push('/assets/js/air-datepicker.js');document.loadedScripts.push('/assets/js/jquery.toast.min.js');document.loadedScripts.push('/assets/js/main.js');document.loadedScripts.push('/assets/js/new.js');document.loadedScripts.push('/assets/js/blogFilter.js');document.loadedScripts.push('/assets/js/auth.js');document.loadedScripts.push('/assets/js/cabinet.js');
;

;
/*!
 * dist/jquery.inputmask.min
 * https://github.com/RobinHerbots/Inputmask
 * Copyright (c) 2010 - 2022 Robin Herbots
 * Licensed under the MIT license
 * Version: 5.0.8-beta.17
 */
!function(e,t){if("object"==typeof exports&&"object"==typeof module)module.exports=t(require("jquery"));else if("function"==typeof define&&define.amd)define(["jquery"],t);else{var i="object"==typeof exports?t(require("jquery")):t(e.jQuery);for(var a in i)("object"==typeof exports?exports:e)[a]=i[a]}}(this,(function(e){return function(){"use strict";var t={3046:function(e,t,i){var a;Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0,i(3851),i(219),i(207),i(5296);var n=((a=i(2394))&&a.__esModule?a:{default:a}).default;t.default=n},8741:function(e,t){Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var i=!("undefined"==typeof window||!window.document||!window.document.createElement);t.default=i},3976:function(e,t,i){Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var a,n=(a=i(5581))&&a.__esModule?a:{default:a};var r={_maxTestPos:500,placeholder:"_",optionalmarker:["[","]"],quantifiermarker:["{","}"],groupmarker:["(",")"],alternatormarker:"|",escapeChar:"\\",mask:null,regex:null,oncomplete:function(){},onincomplete:function(){},oncleared:function(){},repeat:0,greedy:!1,autoUnmask:!1,removeMaskOnSubmit:!1,clearMaskOnLostFocus:!0,insertMode:!0,insertModeVisual:!0,clearIncomplete:!1,alias:null,onKeyDown:function(){},onBeforeMask:null,onBeforePaste:function(e,t){return"function"==typeof t.onBeforeMask?t.onBeforeMask.call(this,e,t):e},onBeforeWrite:null,onUnMask:null,showMaskOnFocus:!0,showMaskOnHover:!0,onKeyValidation:function(){},skipOptionalPartCharacter:" ",numericInput:!1,rightAlign:!1,undoOnEscape:!0,radixPoint:"",_radixDance:!1,groupSeparator:"",keepStatic:null,positionCaretOnTab:!0,tabThrough:!1,supportsInputType:["text","tel","url","password","search"],ignorables:[n.default.BACKSPACE,n.default.TAB,n.default["PAUSE/BREAK"],n.default.ESCAPE,n.default.PAGE_UP,n.default.PAGE_DOWN,n.default.END,n.default.HOME,n.default.LEFT,n.default.UP,n.default.RIGHT,n.default.DOWN,n.default.INSERT,n.default.DELETE,93,112,113,114,115,116,117,118,119,120,121,122,123,0,229],isComplete:null,preValidation:null,postValidation:null,staticDefinitionSymbol:void 0,jitMasking:!1,nullable:!0,inputEventOnly:!1,noValuePatching:!1,positionCaretOnClick:"lvp",casing:null,inputmode:"text",importDataAttributes:!0,shiftPositions:!0,usePrototypeDefinitions:!0,validationEventTimeOut:3e3,substitutes:{}};t.default=r},7392:function(e,t){Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;t.default={9:{validator:"[0-9\uff10-\uff19]",definitionSymbol:"*"},a:{validator:"[A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5]",definitionSymbol:"*"},"*":{validator:"[0-9\uff10-\uff19A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5]"}}},3287:function(e,t,i){Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var a,n=(a=i(2047))&&a.__esModule?a:{default:a};if(void 0===n.default)throw"jQuery not loaded!";var r=n.default;t.default=r},9845:function(e,t,i){Object.defineProperty(t,"__esModule",{value:!0}),t.mobile=t.iphone=t.iemobile=t.ie=void 0;var a,n=(a=i(9380))&&a.__esModule?a:{default:a};var r=n.default.navigator&&n.default.navigator.userAgent||"",o=r.indexOf("MSIE ")>0||r.indexOf("Trident/")>0,s=n.default.navigator&&n.default.navigator.maxTouchPoints||"ontouchstart"in n.default,l=/iemobile/i.test(r),u=/iphone/i.test(r)&&!l;t.iphone=u,t.iemobile=l,t.mobile=s,t.ie=o},7184:function(e,t){Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e){return e.replace(i,"\\$1")};var i=new RegExp("(\\"+["/",".","*","+","?","|","(",")","[","]","{","}","\\","$","^"].join("|\\")+")","gim")},6030:function(e,t,i){Object.defineProperty(t,"__esModule",{value:!0}),t.EventHandlers=void 0;var a,n=i(8711),r=(a=i(5581))&&a.__esModule?a:{default:a},o=i(9845),s=i(7215),l=i(7760),u=i(4713);function c(e,t){var i="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!i){if(Array.isArray(e)||(i=function(e,t){if(!e)return;if("string"==typeof e)return f(e,t);var i=Object.prototype.toString.call(e).slice(8,-1);"Object"===i&&e.constructor&&(i=e.constructor.name);if("Map"===i||"Set"===i)return Array.from(e);if("Arguments"===i||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(i))return f(e,t)}(e))||t&&e&&"number"==typeof e.length){i&&(e=i);var a=0,n=function(){};return{s:n,n:function(){return a>=e.length?{done:!0}:{done:!1,value:e[a++]}},e:function(e){throw e},f:n}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var r,o=!0,s=!1;return{s:function(){i=i.call(e)},n:function(){var e=i.next();return o=e.done,e},e:function(e){s=!0,r=e},f:function(){try{o||null==i.return||i.return()}finally{if(s)throw r}}}}function f(e,t){(null==t||t>e.length)&&(t=e.length);for(var i=0,a=new Array(t);i<t;i++)a[i]=e[i];return a}var d={keydownEvent:function(e){var t=this.inputmask,i=t.opts,a=t.dependencyLib,c=t.maskset,f=this,d=a(f),p=e.keyCode,h=n.caret.call(t,f),v=i.onKeyDown.call(this,e,n.getBuffer.call(t),h,i);if(void 0!==v)return v;if(p===r.default.BACKSPACE||p===r.default.DELETE||o.iphone&&p===r.default.BACKSPACE_SAFARI||e.ctrlKey&&p===r.default.X&&!("oncut"in f))e.preventDefault(),s.handleRemove.call(t,f,p,h),(0,l.writeBuffer)(f,n.getBuffer.call(t,!0),c.p,e,f.inputmask._valueGet()!==n.getBuffer.call(t).join(""));else if(p===r.default.END||p===r.default.PAGE_DOWN){e.preventDefault();var m=n.seekNext.call(t,n.getLastValidPosition.call(t));n.caret.call(t,f,e.shiftKey?h.begin:m,m,!0)}else p===r.default.HOME&&!e.shiftKey||p===r.default.PAGE_UP?(e.preventDefault(),n.caret.call(t,f,0,e.shiftKey?h.begin:0,!0)):i.undoOnEscape&&p===r.default.ESCAPE&&!0!==e.altKey?((0,l.checkVal)(f,!0,!1,t.undoValue.split("")),d.trigger("click")):p!==r.default.INSERT||e.shiftKey||e.ctrlKey||void 0!==t.userOptions.insertMode?!0===i.tabThrough&&p===r.default.TAB?!0===e.shiftKey?(h.end=n.seekPrevious.call(t,h.end,!0),!0===u.getTest.call(t,h.end-1).match.static&&h.end--,h.begin=n.seekPrevious.call(t,h.end,!0),h.begin>=0&&h.end>0&&(e.preventDefault(),n.caret.call(t,f,h.begin,h.end))):(h.begin=n.seekNext.call(t,h.begin,!0),h.end=n.seekNext.call(t,h.begin,!0),h.end<c.maskLength&&h.end--,h.begin<=c.maskLength&&(e.preventDefault(),n.caret.call(t,f,h.begin,h.end))):e.shiftKey||i.insertModeVisual&&!1===i.insertMode&&(p===r.default.RIGHT?setTimeout((function(){var e=n.caret.call(t,f);n.caret.call(t,f,e.begin)}),0):p===r.default.LEFT&&setTimeout((function(){var e=n.translatePosition.call(t,f.inputmask.caretPos.begin);n.translatePosition.call(t,f.inputmask.caretPos.end);t.isRTL?n.caret.call(t,f,e+(e===c.maskLength?0:1)):n.caret.call(t,f,e-(0===e?0:1))}),0)):s.isSelection.call(t,h)?i.insertMode=!i.insertMode:(i.insertMode=!i.insertMode,n.caret.call(t,f,h.begin,h.begin));t.ignorable=i.ignorables.includes(p)},keypressEvent:function(e,t,i,a,o){var u=this.inputmask||this,c=u.opts,f=u.dependencyLib,d=u.maskset,p=u.el,h=f(p),v=e.keyCode;if(!(!0===t||e.ctrlKey&&e.altKey)&&(e.ctrlKey||e.metaKey||u.ignorable))return v===r.default.ENTER&&u.undoValue!==u._valueGet(!0)&&(u.undoValue=u._valueGet(!0),setTimeout((function(){h.trigger("change")}),0)),u.skipInputEvent=!0,!0;if(v){44!==v&&46!==v||3!==e.location||""===c.radixPoint||(v=c.radixPoint.charCodeAt(0));var m,g=t?{begin:o,end:o}:n.caret.call(u,p),k=String.fromCharCode(v);k=c.substitutes[k]||k,d.writeOutBuffer=!0;var y=s.isValid.call(u,g,k,a,void 0,void 0,void 0,t);if(!1!==y&&(n.resetMaskSet.call(u,!0),m=void 0!==y.caret?y.caret:n.seekNext.call(u,y.pos.begin?y.pos.begin:y.pos),d.p=m),m=c.numericInput&&void 0===y.caret?n.seekPrevious.call(u,m):m,!1!==i&&(setTimeout((function(){c.onKeyValidation.call(p,v,y)}),0),d.writeOutBuffer&&!1!==y)){var b=n.getBuffer.call(u);(0,l.writeBuffer)(p,b,m,e,!0!==t)}if(e.preventDefault(),t)return!1!==y&&(y.forwardPosition=m),y}},keyupEvent:function(e){var t=this.inputmask;t.dependencyLib;t.isComposing&&(e.keyCode!==r.default.KEY_229&&e.keyCode!==r.default.ENTER||t.$el.trigger("input"))},pasteEvent:function(e){var t,i=this.inputmask,a=i.opts,r=i._valueGet(!0),o=n.caret.call(i,this);i.isRTL&&(t=o.end,o.end=n.translatePosition.call(i,o.begin),o.begin=n.translatePosition.call(i,t));var s=r.substr(0,o.begin),u=r.substr(o.end,r.length);if(s==(i.isRTL?n.getBufferTemplate.call(i).slice().reverse():n.getBufferTemplate.call(i)).slice(0,o.begin).join("")&&(s=""),u==(i.isRTL?n.getBufferTemplate.call(i).slice().reverse():n.getBufferTemplate.call(i)).slice(o.end).join("")&&(u=""),window.clipboardData&&window.clipboardData.getData)r=s+window.clipboardData.getData("Text")+u;else{if(!e.clipboardData||!e.clipboardData.getData)return!0;r=s+e.clipboardData.getData("text/plain")+u}var f=r;if(i.isRTL){f=f.split("");var d,p=c(n.getBufferTemplate.call(i));try{for(p.s();!(d=p.n()).done;){var h=d.value;f[0]===h&&f.shift()}}catch(e){p.e(e)}finally{p.f()}f=f.join("")}if("function"==typeof a.onBeforePaste){if(!1===(f=a.onBeforePaste.call(i,f,a)))return!1;f||(f=r)}(0,l.checkVal)(this,!0,!1,f.toString().split(""),e),e.preventDefault()},inputFallBackEvent:function(e){var t=this.inputmask,i=t.opts,a=t.dependencyLib;var s=this,c=s.inputmask._valueGet(!0),f=(t.isRTL?n.getBuffer.call(t).slice().reverse():n.getBuffer.call(t)).join(""),p=n.caret.call(t,s,void 0,void 0,!0);if(f!==c){c=function(e,i,a){if(o.iemobile){var r=i.replace(n.getBuffer.call(t).join(""),"");if(1===r.length){var s=i.split("");s.splice(a.begin,0,r),i=s.join("")}}return i}(0,c,p);var h=function(e,a,r){for(var o,s,l,c=e.substr(0,r.begin).split(""),f=e.substr(r.begin).split(""),d=a.substr(0,r.begin).split(""),p=a.substr(r.begin).split(""),h=c.length>=d.length?c.length:d.length,v=f.length>=p.length?f.length:p.length,m="",g=[],k="~";c.length<h;)c.push(k);for(;d.length<h;)d.push(k);for(;f.length<v;)f.unshift(k);for(;p.length<v;)p.unshift(k);var y=c.concat(f),b=d.concat(p);for(s=0,o=y.length;s<o;s++)switch(l=u.getPlaceholder.call(t,n.translatePosition.call(t,s)),m){case"insertText":b[s-1]===y[s]&&r.begin==y.length-1&&g.push(y[s]),s=o;break;case"insertReplacementText":case"deleteContentBackward":y[s]===k?r.end++:s=o;break;default:y[s]!==b[s]&&(y[s+1]!==k&&y[s+1]!==l&&void 0!==y[s+1]||(b[s]!==l||b[s+1]!==k)&&b[s]!==k?b[s+1]===k&&b[s]===y[s+1]?(m="insertText",g.push(y[s]),r.begin--,r.end--):y[s]!==l&&y[s]!==k&&(y[s+1]===k||b[s]!==y[s]&&b[s+1]===y[s+1])?(m="insertReplacementText",g.push(y[s]),r.begin--):y[s]===k?(m="deleteContentBackward",(n.isMask.call(t,n.translatePosition.call(t,s),!0)||b[s]===i.radixPoint)&&r.end++):s=o:(m="insertText",g.push(y[s]),r.begin--,r.end--))}return{action:m,data:g,caret:r}}(c,f,p);switch((s.inputmask.shadowRoot||s.ownerDocument).activeElement!==s&&s.focus(),(0,l.writeBuffer)(s,n.getBuffer.call(t)),n.caret.call(t,s,p.begin,p.end,!0),h.action){case"insertText":case"insertReplacementText":h.data.forEach((function(e,i){var n=new a.Event("keypress");n.keyCode=e.charCodeAt(0),t.ignorable=!1,d.keypressEvent.call(s,n)})),setTimeout((function(){t.$el.trigger("keyup")}),0);break;case"deleteContentBackward":var v=new a.Event("keydown");v.keyCode=r.default.BACKSPACE,d.keydownEvent.call(s,v);break;default:(0,l.applyInputValue)(s,c)}e.preventDefault()}},compositionendEvent:function(e){var t=this.inputmask;t.isComposing=!1,t.$el.trigger("input")},setValueEvent:function(e){var t=this.inputmask,i=this,a=e&&e.detail?e.detail[0]:arguments[1];void 0===a&&(a=i.inputmask._valueGet(!0)),(0,l.applyInputValue)(i,a),(e.detail&&void 0!==e.detail[1]||void 0!==arguments[2])&&n.caret.call(t,i,e.detail?e.detail[1]:arguments[2])},focusEvent:function(e){var t=this.inputmask,i=t.opts,a=this,r=a.inputmask._valueGet();i.showMaskOnFocus&&r!==n.getBuffer.call(t).join("")&&(0,l.writeBuffer)(a,n.getBuffer.call(t),n.seekNext.call(t,n.getLastValidPosition.call(t))),!0!==i.positionCaretOnTab||!1!==t.mouseEnter||s.isComplete.call(t,n.getBuffer.call(t))&&-1!==n.getLastValidPosition.call(t)||d.clickEvent.apply(a,[e,!0]),t.undoValue=t._valueGet(!0)},invalidEvent:function(e){this.inputmask.validationEvent=!0},mouseleaveEvent:function(){var e=this.inputmask,t=e.opts,i=this;e.mouseEnter=!1,t.clearMaskOnLostFocus&&(i.inputmask.shadowRoot||i.ownerDocument).activeElement!==i&&(0,l.HandleNativePlaceholder)(i,e.originalPlaceholder)},clickEvent:function(e,t){var i=this.inputmask,a=this;if((a.inputmask.shadowRoot||a.ownerDocument).activeElement===a){var r=n.determineNewCaretPosition.call(i,n.caret.call(i,a),t);void 0!==r&&n.caret.call(i,a,r)}},cutEvent:function(e){var t=this.inputmask,i=t.maskset,a=this,o=n.caret.call(t,a),u=t.isRTL?n.getBuffer.call(t).slice(o.end,o.begin):n.getBuffer.call(t).slice(o.begin,o.end),c=t.isRTL?u.reverse().join(""):u.join("");window.navigator.clipboard?window.navigator.clipboard.writeText(c):window.clipboardData&&window.clipboardData.getData&&window.clipboardData.setData("Text",c),s.handleRemove.call(t,a,r.default.DELETE,o),(0,l.writeBuffer)(a,n.getBuffer.call(t),i.p,e,t.undoValue!==t._valueGet(!0))},blurEvent:function(e){var t=this.inputmask,i=t.opts,a=(0,t.dependencyLib)(this),r=this;if(r.inputmask){(0,l.HandleNativePlaceholder)(r,t.originalPlaceholder);var o=r.inputmask._valueGet(),u=n.getBuffer.call(t).slice();""!==o&&(i.clearMaskOnLostFocus&&(-1===n.getLastValidPosition.call(t)&&o===n.getBufferTemplate.call(t).join("")?u=[]:l.clearOptionalTail.call(t,u)),!1===s.isComplete.call(t,u)&&(setTimeout((function(){a.trigger("incomplete")}),0),i.clearIncomplete&&(n.resetMaskSet.call(t),u=i.clearMaskOnLostFocus?[]:n.getBufferTemplate.call(t).slice())),(0,l.writeBuffer)(r,u,void 0,e)),t.undoValue!==t._valueGet(!0)&&(t.undoValue=t._valueGet(!0),a.trigger("change"))}},mouseenterEvent:function(){var e=this.inputmask,t=e.opts,i=this;if(e.mouseEnter=!0,(i.inputmask.shadowRoot||i.ownerDocument).activeElement!==i){var a=(e.isRTL?n.getBufferTemplate.call(e).slice().reverse():n.getBufferTemplate.call(e)).join("");e.placeholder!==a&&i.placeholder!==e.originalPlaceholder&&(e.originalPlaceholder=i.placeholder),t.showMaskOnHover&&(0,l.HandleNativePlaceholder)(i,a)}},submitEvent:function(){var e=this.inputmask,t=e.opts;e.undoValue!==e._valueGet(!0)&&e.$el.trigger("change"),-1===n.getLastValidPosition.call(e)&&e._valueGet&&e._valueGet()===n.getBufferTemplate.call(e).join("")&&e._valueSet(""),t.clearIncomplete&&!1===s.isComplete.call(e,n.getBuffer.call(e))&&e._valueSet(""),t.removeMaskOnSubmit&&(e._valueSet(e.unmaskedvalue(),!0),setTimeout((function(){(0,l.writeBuffer)(e.el,n.getBuffer.call(e))}),0))},resetEvent:function(){var e=this.inputmask;e.refreshValue=!0,setTimeout((function(){(0,l.applyInputValue)(e.el,e._valueGet(!0))}),0)}};t.EventHandlers=d},9716:function(e,t,i){Object.defineProperty(t,"__esModule",{value:!0}),t.EventRuler=void 0;var a=s(i(2394)),n=s(i(5581)),r=i(8711),o=i(7760);function s(e){return e&&e.__esModule?e:{default:e}}var l={on:function(e,t,i){var s=e.inputmask.dependencyLib,l=function(t){t.originalEvent&&(t=t.originalEvent||t,arguments[0]=t);var l,u=this,c=u.inputmask,f=c?c.opts:void 0;if(void 0===c&&"FORM"!==this.nodeName){var d=s.data(u,"_inputmask_opts");s(u).off(),d&&new a.default(d).mask(u)}else{if(["submit","reset","setvalue"].includes(t.type)||"FORM"===this.nodeName||!(u.disabled||u.readOnly&&!("keydown"===t.type&&t.ctrlKey&&67===t.keyCode||!1===f.tabThrough&&t.keyCode===n.default.TAB))){switch(t.type){case"input":if(!0===c.skipInputEvent||t.inputType&&"insertCompositionText"===t.inputType)return c.skipInputEvent=!1,t.preventDefault();break;case"keydown":c.skipKeyPressEvent=!1,c.skipInputEvent=c.isComposing=t.keyCode===n.default.KEY_229;break;case"keyup":case"compositionend":c.isComposing&&(c.skipInputEvent=!1);break;case"keypress":if(!0===c.skipKeyPressEvent)return t.preventDefault();c.skipKeyPressEvent=!0;break;case"click":case"focus":return c.validationEvent?(c.validationEvent=!1,e.blur(),(0,o.HandleNativePlaceholder)(e,(c.isRTL?r.getBufferTemplate.call(c).slice().reverse():r.getBufferTemplate.call(c)).join("")),setTimeout((function(){e.focus()}),f.validationEventTimeOut),!1):(l=arguments,void setTimeout((function(){e.inputmask&&i.apply(u,l)}),0))}var p=i.apply(u,arguments);return!1===p&&(t.preventDefault(),t.stopPropagation()),p}t.preventDefault()}};["submit","reset"].includes(t)?(l=l.bind(e),null!==e.form&&s(e.form).on(t,l)):s(e).on(t,l),e.inputmask.events[t]=e.inputmask.events[t]||[],e.inputmask.events[t].push(l)},off:function(e,t){if(e.inputmask&&e.inputmask.events){var i=e.inputmask.dependencyLib,a=e.inputmask.events;for(var n in t&&((a=[])[t]=e.inputmask.events[t]),a){for(var r=a[n];r.length>0;){var o=r.pop();["submit","reset"].includes(n)?null!==e.form&&i(e.form).off(n,o):i(e).off(n,o)}delete e.inputmask.events[n]}}}};t.EventRuler=l},219:function(e,t,i){var a=d(i(2394)),n=d(i(5581)),r=d(i(7184)),o=i(8711),s=i(4713);function l(e){return l="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},l(e)}function u(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var i=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null==i)return;var a,n,r=[],o=!0,s=!1;try{for(i=i.call(e);!(o=(a=i.next()).done)&&(r.push(a.value),!t||r.length!==t);o=!0);}catch(e){s=!0,n=e}finally{try{o||null==i.return||i.return()}finally{if(s)throw n}}return r}(e,t)||function(e,t){if(!e)return;if("string"==typeof e)return c(e,t);var i=Object.prototype.toString.call(e).slice(8,-1);"Object"===i&&e.constructor&&(i=e.constructor.name);if("Map"===i||"Set"===i)return Array.from(e);if("Arguments"===i||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(i))return c(e,t)}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function c(e,t){(null==t||t>e.length)&&(t=e.length);for(var i=0,a=new Array(t);i<t;i++)a[i]=e[i];return a}function f(e,t){for(var i=0;i<t.length;i++){var a=t[i];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}function d(e){return e&&e.__esModule?e:{default:e}}var p=a.default.dependencyLib,h=function(){function e(t,i,a){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.mask=t,this.format=i,this.opts=a,this._date=new Date(1,0,1),this.initDateObject(t,this.opts)}var t,i,a;return t=e,(i=[{key:"date",get:function(){return void 0===this._date&&(this._date=new Date(1,0,1),this.initDateObject(void 0,this.opts)),this._date}},{key:"initDateObject",value:function(e,t){var i;for(P(t).lastIndex=0;i=P(t).exec(this.format);){var a=new RegExp("\\d+$").exec(i[0]),n=a?i[0][0]+"x":i[0],r=void 0;if(void 0!==e){if(a){var o=P(t).lastIndex,s=O(i.index,t);P(t).lastIndex=o,r=e.slice(0,e.indexOf(s.nextMatch[0]))}else r=e.slice(0,n.length);e=e.slice(r.length)}Object.prototype.hasOwnProperty.call(g,n)&&this.setValue(this,r,n,g[n][2],g[n][1])}}},{key:"setValue",value:function(e,t,i,a,n){if(void 0!==t&&(e[a]="ampm"===a?t:t.replace(/[^0-9]/g,"0"),e["raw"+a]=t.replace(/\s/g,"_")),void 0!==n){var r=e[a];("day"===a&&29===parseInt(r)||"month"===a&&2===parseInt(r))&&(29!==parseInt(e.day)||2!==parseInt(e.month)||""!==e.year&&void 0!==e.year||e._date.setFullYear(2012,1,29)),"day"===a&&(m=!0,0===parseInt(r)&&(r=1)),"month"===a&&(m=!0),"year"===a&&(m=!0,r.length<4&&(r=w(r,4,!0))),""===r||isNaN(r)||n.call(e._date,r),"ampm"===a&&n.call(e._date,r)}}},{key:"reset",value:function(){this._date=new Date(1,0,1)}},{key:"reInit",value:function(){this._date=void 0,this.date}}])&&f(t.prototype,i),a&&f(t,a),Object.defineProperty(t,"prototype",{writable:!1}),e}(),v=(new Date).getFullYear(),m=!1,g={d:["[1-9]|[12][0-9]|3[01]",Date.prototype.setDate,"day",Date.prototype.getDate],dd:["0[1-9]|[12][0-9]|3[01]",Date.prototype.setDate,"day",function(){return w(Date.prototype.getDate.call(this),2)}],ddd:[""],dddd:[""],m:["[1-9]|1[012]",function(e){var t=e?parseInt(e):0;return t>0&&t--,Date.prototype.setMonth.call(this,t)},"month",function(){return Date.prototype.getMonth.call(this)+1}],mm:["0[1-9]|1[012]",function(e){var t=e?parseInt(e):0;return t>0&&t--,Date.prototype.setMonth.call(this,t)},"month",function(){return w(Date.prototype.getMonth.call(this)+1,2)}],mmm:[""],mmmm:[""],yy:["[0-9]{2}",Date.prototype.setFullYear,"year",function(){return w(Date.prototype.getFullYear.call(this),2)}],yyyy:["[0-9]{4}",Date.prototype.setFullYear,"year",function(){return w(Date.prototype.getFullYear.call(this),4)}],h:["[1-9]|1[0-2]",Date.prototype.setHours,"hours",Date.prototype.getHours],hh:["0[1-9]|1[0-2]",Date.prototype.setHours,"hours",function(){return w(Date.prototype.getHours.call(this),2)}],hx:[function(e){return"[0-9]{".concat(e,"}")},Date.prototype.setHours,"hours",function(e){return Date.prototype.getHours}],H:["1?[0-9]|2[0-3]",Date.prototype.setHours,"hours",Date.prototype.getHours],HH:["0[0-9]|1[0-9]|2[0-3]",Date.prototype.setHours,"hours",function(){return w(Date.prototype.getHours.call(this),2)}],Hx:[function(e){return"[0-9]{".concat(e,"}")},Date.prototype.setHours,"hours",function(e){return function(){return w(Date.prototype.getHours.call(this),e)}}],M:["[1-5]?[0-9]",Date.prototype.setMinutes,"minutes",Date.prototype.getMinutes],MM:["0[0-9]|1[0-9]|2[0-9]|3[0-9]|4[0-9]|5[0-9]",Date.prototype.setMinutes,"minutes",function(){return w(Date.prototype.getMinutes.call(this),2)}],s:["[1-5]?[0-9]",Date.prototype.setSeconds,"seconds",Date.prototype.getSeconds],ss:["0[0-9]|1[0-9]|2[0-9]|3[0-9]|4[0-9]|5[0-9]",Date.prototype.setSeconds,"seconds",function(){return w(Date.prototype.getSeconds.call(this),2)}],l:["[0-9]{3}",Date.prototype.setMilliseconds,"milliseconds",function(){return w(Date.prototype.getMilliseconds.call(this),3)}],L:["[0-9]{2}",Date.prototype.setMilliseconds,"milliseconds",function(){return w(Date.prototype.getMilliseconds.call(this),2)}],t:["[ap]",y,"ampm",b,1],tt:["[ap]m",y,"ampm",b,2],T:["[AP]",y,"ampm",b,1],TT:["[AP]M",y,"ampm",b,2],Z:[".*",void 0,"Z",function(){var e=this.toString().match(/\((.+)\)/)[1];e.includes(" ")&&(e=(e=e.replace("-"," ").toUpperCase()).split(" ").map((function(e){return u(e,1)[0]})).join(""));return e}],o:[""],S:[""]},k={isoDate:"yyyy-mm-dd",isoTime:"HH:MM:ss",isoDateTime:"yyyy-mm-dd'T'HH:MM:ss",isoUtcDateTime:"UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"};function y(e){var t=this.getHours();e.toLowerCase().includes("p")?this.setHours(t+12):e.toLowerCase().includes("a")&&t>=12&&this.setHours(t-12)}function b(){var e=this.getHours();return(e=e||12)>=12?"PM":"AM"}function x(e){var t=new RegExp("\\d+$").exec(e[0]);if(t&&void 0!==t[0]){var i=g[e[0][0]+"x"].slice("");return i[0]=i[0](t[0]),i[3]=i[3](t[0]),i}if(g[e[0]])return g[e[0]]}function P(e){if(!e.tokenizer){var t=[],i=[];for(var a in g)if(/\.*x$/.test(a)){var n=a[0]+"\\d+";-1===i.indexOf(n)&&i.push(n)}else-1===t.indexOf(a[0])&&t.push(a[0]);e.tokenizer="("+(i.length>0?i.join("|")+"|":"")+t.join("+|")+")+?|.",e.tokenizer=new RegExp(e.tokenizer,"g")}return e.tokenizer}function E(e,t,i){if(!m)return!0;if(void 0===e.rawday||!isFinite(e.rawday)&&new Date(e.date.getFullYear(),isFinite(e.rawmonth)?e.month:e.date.getMonth()+1,0).getDate()>=e.day||"29"==e.day&&(!isFinite(e.rawyear)||void 0===e.rawyear||""===e.rawyear)||new Date(e.date.getFullYear(),isFinite(e.rawmonth)?e.month:e.date.getMonth()+1,0).getDate()>=e.day)return t;if("29"==e.day){var a=O(t.pos,i);if("yyyy"===a.targetMatch[0]&&t.pos-a.targetMatchIndex==2)return t.remove=t.pos+1,t}else if("02"==e.month&&"30"==e.day&&void 0!==t.c)return e.day="03",e.date.setDate(3),e.date.setMonth(1),t.insert=[{pos:t.pos,c:"0"},{pos:t.pos+1,c:t.c}],t.caret=o.seekNext.call(this,t.pos+1),t;return!1}function S(e,t,i,a){var n,o,s="";for(P(i).lastIndex=0;n=P(i).exec(e);){if(void 0===t)if(o=x(n))s+="("+o[0]+")";else switch(n[0]){case"[":s+="(";break;case"]":s+=")?";break;default:s+=(0,r.default)(n[0])}else if(o=x(n))if(!0!==a&&o[3])s+=o[3].call(t.date);else o[2]?s+=t["raw"+o[2]]:s+=n[0];else s+=n[0]}return s}function w(e,t,i){for(e=String(e),t=t||2;e.length<t;)e=i?e+"0":"0"+e;return e}function _(e,t,i){return"string"==typeof e?new h(e,t,i):e&&"object"===l(e)&&Object.prototype.hasOwnProperty.call(e,"date")?e:void 0}function M(e,t){return S(t.inputFormat,{date:e},t)}function O(e,t){var i,a,n=0,r=0;for(P(t).lastIndex=0;a=P(t).exec(t.inputFormat);){var o=new RegExp("\\d+$").exec(a[0]);if((n+=r=o?parseInt(o[0]):a[0].length)>=e+1){i=a,a=P(t).exec(t.inputFormat);break}}return{targetMatchIndex:n-r,nextMatch:a,targetMatch:i}}a.default.extendAliases({datetime:{mask:function(e){return e.numericInput=!1,g.S=e.i18n.ordinalSuffix.join("|"),e.inputFormat=k[e.inputFormat]||e.inputFormat,e.displayFormat=k[e.displayFormat]||e.displayFormat||e.inputFormat,e.outputFormat=k[e.outputFormat]||e.outputFormat||e.inputFormat,e.placeholder=""!==e.placeholder?e.placeholder:e.inputFormat.replace(/[[\]]/,""),e.regex=S(e.inputFormat,void 0,e),e.min=_(e.min,e.inputFormat,e),e.max=_(e.max,e.inputFormat,e),null},placeholder:"",inputFormat:"isoDateTime",displayFormat:null,outputFormat:null,min:null,max:null,skipOptionalPartCharacter:"",i18n:{dayNames:["Mon","Tue","Wed","Thu","Fri","Sat","Sun","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],monthNames:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","January","February","March","April","May","June","July","August","September","October","November","December"],ordinalSuffix:["st","nd","rd","th"]},preValidation:function(e,t,i,a,n,r,o,s){if(s)return!0;if(isNaN(i)&&e[t]!==i){var l=O(t,n);if(l.nextMatch&&l.nextMatch[0]===i&&l.targetMatch[0].length>1){var u=g[l.targetMatch[0]][0];if(new RegExp(u).test("0"+e[t-1]))return e[t]=e[t-1],e[t-1]="0",{fuzzy:!0,buffer:e,refreshFromBuffer:{start:t-1,end:t+1},pos:t+1}}}return!0},postValidation:function(e,t,i,a,n,r,o,l){var u,c;if(o)return!0;if(!1===a&&(((u=O(t+1,n)).targetMatch&&u.targetMatchIndex===t&&u.targetMatch[0].length>1&&void 0!==g[u.targetMatch[0]]||(u=O(t+2,n)).targetMatch&&u.targetMatchIndex===t+1&&u.targetMatch[0].length>1&&void 0!==g[u.targetMatch[0]])&&(c=g[u.targetMatch[0]][0]),void 0!==c&&(void 0!==r.validPositions[t+1]&&new RegExp(c).test(i+"0")?(e[t]=i,e[t+1]="0",a={pos:t+2,caret:t}):new RegExp(c).test("0"+i)&&(e[t]="0",e[t+1]=i,a={pos:t+2})),!1===a))return a;if(a.fuzzy&&(e=a.buffer,t=a.pos),(u=O(t,n)).targetMatch&&u.targetMatch[0]&&void 0!==g[u.targetMatch[0]]){var f=g[u.targetMatch[0]];c=f[0];var d=e.slice(u.targetMatchIndex,u.targetMatchIndex+u.targetMatch[0].length);if(!1===new RegExp(c).test(d.join(""))&&2===u.targetMatch[0].length&&r.validPositions[u.targetMatchIndex]&&r.validPositions[u.targetMatchIndex+1]&&(r.validPositions[u.targetMatchIndex+1].input="0"),"year"==f[2])for(var p=s.getMaskTemplate.call(this,!1,1,void 0,!0),h=t+1;h<e.length;h++)e[h]=p[h],delete r.validPositions[h]}var m=a,k=_(e.join(""),n.inputFormat,n);return m&&k.date.getTime()==k.date.getTime()&&(n.prefillYear&&(m=function(e,t,i){if(e.year!==e.rawyear){var a=v.toString(),n=e.rawyear.replace(/[^0-9]/g,""),r=a.slice(0,n.length),o=a.slice(n.length);if(2===n.length&&n===r){var s=new Date(v,e.month-1,e.day);e.day==s.getDate()&&(!i.max||i.max.date.getTime()>=s.getTime())&&(e.date.setFullYear(v),e.year=a,t.insert=[{pos:t.pos+1,c:o[0]},{pos:t.pos+2,c:o[1]}])}}return t}(k,m,n)),m=function(e,t,i,a,n){if(!t)return t;if(t&&i.min&&i.min.date.getTime()==i.min.date.getTime()){var r;for(e.reset(),P(i).lastIndex=0;r=P(i).exec(i.inputFormat);){var o;if((o=x(r))&&o[3]){for(var s=o[1],l=e[o[2]],u=i.min[o[2]],c=i.max?i.max[o[2]]:u,f=[],d=!1,p=0;p<u.length;p++)void 0!==a.validPositions[p+r.index]||d?(f[p]=l[p],d=d||l[p]>u[p]):(f[p]=u[p],"year"===o[2]&&l.length-1==p&&u!=c&&(f=(parseInt(f.join(""))+1).toString().split("")),"ampm"===o[2]&&u!=c&&i.min.date.getTime()>e.date.getTime()&&(f[p]=c[p]));s.call(e._date,f.join(""))}}t=i.min.date.getTime()<=e.date.getTime(),e.reInit()}return t&&i.max&&i.max.date.getTime()==i.max.date.getTime()&&(t=i.max.date.getTime()>=e.date.getTime()),t}(k,m=E.call(this,k,m,n),n,r)),void 0!==t&&m&&a.pos!==t?{buffer:S(n.inputFormat,k,n).split(""),refreshFromBuffer:{start:t,end:a.pos},pos:a.caret||a.pos}:m},onKeyDown:function(e,t,i,a){e.ctrlKey&&e.keyCode===n.default.RIGHT&&(this.inputmask._valueSet(M(new Date,a)),p(this).trigger("setvalue"))},onUnMask:function(e,t,i){return t?S(i.outputFormat,_(e,i.inputFormat,i),i,!0):t},casing:function(e,t,i,a){return 0==t.nativeDef.indexOf("[ap]")?e.toLowerCase():0==t.nativeDef.indexOf("[AP]")?e.toUpperCase():e},onBeforeMask:function(e,t){return"[object Date]"===Object.prototype.toString.call(e)&&(e=M(e,t)),e},insertMode:!1,shiftPositions:!1,keepStatic:!1,inputmode:"numeric",prefillYear:!0}})},3851:function(e,t,i){var a,n=(a=i(2394))&&a.__esModule?a:{default:a},r=i(8711),o=i(4713);n.default.extendDefinitions({A:{validator:"[A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5]",casing:"upper"},"&":{validator:"[0-9A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5]",casing:"upper"},"#":{validator:"[0-9A-Fa-f]",casing:"upper"}});var s=new RegExp("25[0-5]|2[0-4][0-9]|[01][0-9][0-9]");function l(e,t,i,a,n){return i-1>-1&&"."!==t.buffer[i-1]?(e=t.buffer[i-1]+e,e=i-2>-1&&"."!==t.buffer[i-2]?t.buffer[i-2]+e:"0"+e):e="00"+e,s.test(e)}n.default.extendAliases({cssunit:{regex:"[+-]?[0-9]+\\.?([0-9]+)?(px|em|rem|ex|%|in|cm|mm|pt|pc)"},url:{regex:"(https?|ftp)://.*",autoUnmask:!1,keepStatic:!1,tabThrough:!0},ip:{mask:"i{1,3}.j{1,3}.k{1,3}.l{1,3}",definitions:{i:{validator:l},j:{validator:l},k:{validator:l},l:{validator:l}},onUnMask:function(e,t,i){return e},inputmode:"decimal",substitutes:{",":"."}},email:{mask:function(e){var t="*{1,64}[.*{1,64}][.*{1,64}][.*{1,63}]@-{1,63}.-{1,63}[.-{1,63}][.-{1,63}]",i=t;if(e.separator)for(var a=0;a<e.quantifier;a++)i+="[".concat(e.separator).concat(t,"]");return i},greedy:!1,casing:"lower",separator:null,quantifier:5,skipOptionalPartCharacter:"",onBeforePaste:function(e,t){return(e=e.toLowerCase()).replace("mailto:","")},definitions:{"*":{validator:"[0-9\uff11-\uff19A-Za-z\u0410-\u044f\u0401\u0451\xc0-\xff\xb5!#$%&'*+/=?^_`{|}~-]"},"-":{validator:"[0-9A-Za-z-]"}},onUnMask:function(e,t,i){return e},inputmode:"email"},mac:{mask:"##:##:##:##:##:##"},vin:{mask:"V{13}9{4}",definitions:{V:{validator:"[A-HJ-NPR-Za-hj-npr-z\\d]",casing:"upper"}},clearIncomplete:!0,autoUnmask:!0},ssn:{mask:"999-99-9999",postValidation:function(e,t,i,a,n,s,l){var u=o.getMaskTemplate.call(this,!0,r.getLastValidPosition.call(this),!0,!0);return/^(?!219-09-9999|078-05-1120)(?!666|000|9.{2}).{3}-(?!00).{2}-(?!0{4}).{4}$/.test(u.join(""))}}})},207:function(e,t,i){var a=s(i(2394)),n=s(i(5581)),r=s(i(7184)),o=i(8711);function s(e){return e&&e.__esModule?e:{default:e}}var l=a.default.dependencyLib;function u(e,t){for(var i="",n=0;n<e.length;n++)a.default.prototype.definitions[e.charAt(n)]||t.definitions[e.charAt(n)]||t.optionalmarker[0]===e.charAt(n)||t.optionalmarker[1]===e.charAt(n)||t.quantifiermarker[0]===e.charAt(n)||t.quantifiermarker[1]===e.charAt(n)||t.groupmarker[0]===e.charAt(n)||t.groupmarker[1]===e.charAt(n)||t.alternatormarker===e.charAt(n)?i+="\\"+e.charAt(n):i+=e.charAt(n);return i}function c(e,t,i,a){if(e.length>0&&t>0&&(!i.digitsOptional||a)){var n=e.indexOf(i.radixPoint),r=!1;i.negationSymbol.back===e[e.length-1]&&(r=!0,e.length--),-1===n&&(e.push(i.radixPoint),n=e.length-1);for(var o=1;o<=t;o++)isFinite(e[n+o])||(e[n+o]="0")}return r&&e.push(i.negationSymbol.back),e}function f(e,t){var i=0;if("+"===e){for(i in t.validPositions);i=o.seekNext.call(this,parseInt(i))}for(var a in t.tests)if((a=parseInt(a))>=i)for(var n=0,r=t.tests[a].length;n<r;n++)if((void 0===t.validPositions[a]||"-"===e)&&t.tests[a][n].match.def===e)return a+(void 0!==t.validPositions[a]&&"-"!==e?1:0);return i}function d(e,t){var i=-1;for(var a in t.validPositions){var n=t.validPositions[a];if(n&&n.match.def===e){i=parseInt(a);break}}return i}function p(e,t,i,a,n){var r=t.buffer?t.buffer.indexOf(n.radixPoint):-1,o=(-1!==r||a&&n.jitMasking)&&new RegExp(n.definitions[9].validator).test(e);return n._radixDance&&-1!==r&&o&&null==t.validPositions[r]?{insert:{pos:r===i?r+1:r,c:n.radixPoint},pos:i}:o}a.default.extendAliases({numeric:{mask:function(e){e.repeat=0,e.groupSeparator===e.radixPoint&&e.digits&&"0"!==e.digits&&("."===e.radixPoint?e.groupSeparator=",":","===e.radixPoint?e.groupSeparator=".":e.groupSeparator="")," "===e.groupSeparator&&(e.skipOptionalPartCharacter=void 0),e.placeholder.length>1&&(e.placeholder=e.placeholder.charAt(0)),"radixFocus"===e.positionCaretOnClick&&""===e.placeholder&&(e.positionCaretOnClick="lvp");var t="0",i=e.radixPoint;!0===e.numericInput&&void 0===e.__financeInput?(t="1",e.positionCaretOnClick="radixFocus"===e.positionCaretOnClick?"lvp":e.positionCaretOnClick,e.digitsOptional=!1,isNaN(e.digits)&&(e.digits=2),e._radixDance=!1,i=","===e.radixPoint?"?":"!",""!==e.radixPoint&&void 0===e.definitions[i]&&(e.definitions[i]={},e.definitions[i].validator="["+e.radixPoint+"]",e.definitions[i].placeholder=e.radixPoint,e.definitions[i].static=!0,e.definitions[i].generated=!0)):(e.__financeInput=!1,e.numericInput=!0);var a,n="[+]";if(n+=u(e.prefix,e),""!==e.groupSeparator?(void 0===e.definitions[e.groupSeparator]&&(e.definitions[e.groupSeparator]={},e.definitions[e.groupSeparator].validator="["+e.groupSeparator+"]",e.definitions[e.groupSeparator].placeholder=e.groupSeparator,e.definitions[e.groupSeparator].static=!0,e.definitions[e.groupSeparator].generated=!0),n+=e._mask(e)):n+="9{+}",void 0!==e.digits&&0!==e.digits){var o=e.digits.toString().split(",");isFinite(o[0])&&o[1]&&isFinite(o[1])?n+=i+t+"{"+e.digits+"}":(isNaN(e.digits)||parseInt(e.digits)>0)&&(e.digitsOptional||e.jitMasking?(a=n+i+t+"{0,"+e.digits+"}",e.keepStatic=!0):n+=i+t+"{"+e.digits+"}")}else e.inputmode="numeric";return n+=u(e.suffix,e),n+="[-]",a&&(n=[a+u(e.suffix,e)+"[-]",n]),e.greedy=!1,function(e){void 0===e.parseMinMaxOptions&&(null!==e.min&&(e.min=e.min.toString().replace(new RegExp((0,r.default)(e.groupSeparator),"g"),""),","===e.radixPoint&&(e.min=e.min.replace(e.radixPoint,".")),e.min=isFinite(e.min)?parseFloat(e.min):NaN,isNaN(e.min)&&(e.min=Number.MIN_VALUE)),null!==e.max&&(e.max=e.max.toString().replace(new RegExp((0,r.default)(e.groupSeparator),"g"),""),","===e.radixPoint&&(e.max=e.max.replace(e.radixPoint,".")),e.max=isFinite(e.max)?parseFloat(e.max):NaN,isNaN(e.max)&&(e.max=Number.MAX_VALUE)),e.parseMinMaxOptions="done")}(e),""!==e.radixPoint&&e.substituteRadixPoint&&(e.substitutes["."==e.radixPoint?",":"."]=e.radixPoint),n},_mask:function(e){return"("+e.groupSeparator+"999){+|1}"},digits:"*",digitsOptional:!0,enforceDigitsOnBlur:!1,radixPoint:".",positionCaretOnClick:"radixFocus",_radixDance:!0,groupSeparator:"",allowMinus:!0,negationSymbol:{front:"-",back:""},prefix:"",suffix:"",min:null,max:null,SetMaxOnOverflow:!1,step:1,inputType:"text",unmaskAsNumber:!1,roundingFN:Math.round,inputmode:"decimal",shortcuts:{k:"1000",m:"1000000"},placeholder:"0",greedy:!1,rightAlign:!0,insertMode:!0,autoUnmask:!1,skipOptionalPartCharacter:"",usePrototypeDefinitions:!1,stripLeadingZeroes:!0,substituteRadixPoint:!0,definitions:{0:{validator:p},1:{validator:p,definitionSymbol:"9"},9:{validator:"[0-9\uff10-\uff19\u0660-\u0669\u06f0-\u06f9]",definitionSymbol:"*"},"+":{validator:function(e,t,i,a,n){return n.allowMinus&&("-"===e||e===n.negationSymbol.front)}},"-":{validator:function(e,t,i,a,n){return n.allowMinus&&e===n.negationSymbol.back}}},preValidation:function(e,t,i,a,n,r,o,s){if(!1!==n.__financeInput&&i===n.radixPoint)return!1;var l=e.indexOf(n.radixPoint),u=t;if(t=function(e,t,i,a,n){return n._radixDance&&n.numericInput&&t!==n.negationSymbol.back&&e<=i&&(i>0||t==n.radixPoint)&&(void 0===a.validPositions[e-1]||a.validPositions[e-1].input!==n.negationSymbol.back)&&(e-=1),e}(t,i,l,r,n),"-"===i||i===n.negationSymbol.front){if(!0!==n.allowMinus)return!1;var c=!1,p=d("+",r),h=d("-",r);return-1!==p&&(c=[p,h]),!1!==c?{remove:c,caret:u-n.negationSymbol.back.length}:{insert:[{pos:f.call(this,"+",r),c:n.negationSymbol.front,fromIsValid:!0},{pos:f.call(this,"-",r),c:n.negationSymbol.back,fromIsValid:void 0}],caret:u+n.negationSymbol.back.length}}if(i===n.groupSeparator)return{caret:u};if(s)return!0;if(-1!==l&&!0===n._radixDance&&!1===a&&i===n.radixPoint&&void 0!==n.digits&&(isNaN(n.digits)||parseInt(n.digits)>0)&&l!==t)return{caret:n._radixDance&&t===l-1?l+1:l};if(!1===n.__financeInput)if(a){if(n.digitsOptional)return{rewritePosition:o.end};if(!n.digitsOptional){if(o.begin>l&&o.end<=l)return i===n.radixPoint?{insert:{pos:l+1,c:"0",fromIsValid:!0},rewritePosition:l}:{rewritePosition:l+1};if(o.begin<l)return{rewritePosition:o.begin-1}}}else if(!n.showMaskOnHover&&!n.showMaskOnFocus&&!n.digitsOptional&&n.digits>0&&""===this.__valueGet.call(this.el))return{rewritePosition:l};return{rewritePosition:t}},postValidation:function(e,t,i,a,n,r,o){if(!1===a)return a;if(o)return!0;if(null!==n.min||null!==n.max){var s=n.onUnMask(e.slice().reverse().join(""),void 0,l.extend({},n,{unmaskAsNumber:!0}));if(null!==n.min&&s<n.min&&(s.toString().length>n.min.toString().length||s<0))return!1;if(null!==n.max&&s>n.max)return!!n.SetMaxOnOverflow&&{refreshFromBuffer:!0,buffer:c(n.max.toString().replace(".",n.radixPoint).split(""),n.digits,n).reverse()}}return a},onUnMask:function(e,t,i){if(""===t&&!0===i.nullable)return t;var a=e.replace(i.prefix,"");return a=(a=a.replace(i.suffix,"")).replace(new RegExp((0,r.default)(i.groupSeparator),"g"),""),""!==i.placeholder.charAt(0)&&(a=a.replace(new RegExp(i.placeholder.charAt(0),"g"),"0")),i.unmaskAsNumber?(""!==i.radixPoint&&-1!==a.indexOf(i.radixPoint)&&(a=a.replace(r.default.call(this,i.radixPoint),".")),a=(a=a.replace(new RegExp("^"+(0,r.default)(i.negationSymbol.front)),"-")).replace(new RegExp((0,r.default)(i.negationSymbol.back)+"$"),""),Number(a)):a},isComplete:function(e,t){var i=(t.numericInput?e.slice().reverse():e).join("");return i=(i=(i=(i=(i=i.replace(new RegExp("^"+(0,r.default)(t.negationSymbol.front)),"-")).replace(new RegExp((0,r.default)(t.negationSymbol.back)+"$"),"")).replace(t.prefix,"")).replace(t.suffix,"")).replace(new RegExp((0,r.default)(t.groupSeparator)+"([0-9]{3})","g"),"$1"),","===t.radixPoint&&(i=i.replace((0,r.default)(t.radixPoint),".")),isFinite(i)},onBeforeMask:function(e,t){var i=t.radixPoint||",";isFinite(t.digits)&&(t.digits=parseInt(t.digits)),"number"!=typeof e&&"number"!==t.inputType||""===i||(e=e.toString().replace(".",i));var a="-"===e.charAt(0)||e.charAt(0)===t.negationSymbol.front,n=e.split(i),o=n[0].replace(/[^\-0-9]/g,""),s=n.length>1?n[1].replace(/[^0-9]/g,""):"",l=n.length>1;e=o+(""!==s?i+s:s);var u=0;if(""!==i&&(u=t.digitsOptional?t.digits<s.length?t.digits:s.length:t.digits,""!==s||!t.digitsOptional)){var f=Math.pow(10,u||1);e=e.replace((0,r.default)(i),"."),isNaN(parseFloat(e))||(e=(t.roundingFN(parseFloat(e)*f)/f).toFixed(u)),e=e.toString().replace(".",i)}if(0===t.digits&&-1!==e.indexOf(i)&&(e=e.substring(0,e.indexOf(i))),null!==t.min||null!==t.max){var d=e.toString().replace(i,".");null!==t.min&&d<t.min?e=t.min.toString().replace(".",i):null!==t.max&&d>t.max&&(e=t.max.toString().replace(".",i))}return a&&"-"!==e.charAt(0)&&(e="-"+e),c(e.toString().split(""),u,t,l).join("")},onBeforeWrite:function(e,t,i,a){function n(e,t){if(!1!==a.__financeInput||t){var i=e.indexOf(a.radixPoint);-1!==i&&e.splice(i,1)}if(""!==a.groupSeparator)for(;-1!==(i=e.indexOf(a.groupSeparator));)e.splice(i,1);return e}var o,s;if(a.stripLeadingZeroes&&(s=function(e,t){var i=new RegExp("(^"+(""!==t.negationSymbol.front?(0,r.default)(t.negationSymbol.front)+"?":"")+(0,r.default)(t.prefix)+")(.*)("+(0,r.default)(t.suffix)+(""!=t.negationSymbol.back?(0,r.default)(t.negationSymbol.back)+"?":"")+"$)").exec(e.slice().reverse().join("")),a=i?i[2]:"",n=!1;return a&&(a=a.split(t.radixPoint.charAt(0))[0],n=new RegExp("^[0"+t.groupSeparator+"]*").exec(a)),!(!n||!(n[0].length>1||n[0].length>0&&n[0].length<a.length))&&n}(t,a)))for(var u=t.join("").lastIndexOf(s[0].split("").reverse().join(""))-(s[0]==s.input?0:1),f=s[0]==s.input?1:0,d=s[0].length-f;d>0;d--)delete this.maskset.validPositions[u+d],delete t[u+d];if(e)switch(e.type){case"blur":case"checkval":if(null!==a.min){var p=a.onUnMask(t.slice().reverse().join(""),void 0,l.extend({},a,{unmaskAsNumber:!0}));if(null!==a.min&&p<a.min)return{refreshFromBuffer:!0,buffer:c(a.min.toString().replace(".",a.radixPoint).split(""),a.digits,a).reverse()}}if(t[t.length-1]===a.negationSymbol.front){var h=new RegExp("(^"+(""!=a.negationSymbol.front?(0,r.default)(a.negationSymbol.front)+"?":"")+(0,r.default)(a.prefix)+")(.*)("+(0,r.default)(a.suffix)+(""!=a.negationSymbol.back?(0,r.default)(a.negationSymbol.back)+"?":"")+"$)").exec(n(t.slice(),!0).reverse().join(""));0==(h?h[2]:"")&&(o={refreshFromBuffer:!0,buffer:[0]})}else if(""!==a.radixPoint){t.indexOf(a.radixPoint)===a.suffix.length&&(o&&o.buffer?o.buffer.splice(0,1+a.suffix.length):(t.splice(0,1+a.suffix.length),o={refreshFromBuffer:!0,buffer:n(t)}))}if(a.enforceDigitsOnBlur){var v=(o=o||{})&&o.buffer||t.slice().reverse();o.refreshFromBuffer=!0,o.buffer=c(v,a.digits,a,!0).reverse()}}return o},onKeyDown:function(e,t,i,a){var r,o=l(this);if(3!=e.location){var s,u=String.fromCharCode(e.keyCode).toLowerCase();if((s=a.shortcuts&&a.shortcuts[u])&&s.length>1)return this.inputmask.__valueSet.call(this,parseFloat(this.inputmask.unmaskedvalue())*parseInt(s)),o.trigger("setvalue"),!1}if(e.ctrlKey)switch(e.keyCode){case n.default.UP:return this.inputmask.__valueSet.call(this,parseFloat(this.inputmask.unmaskedvalue())+parseInt(a.step)),o.trigger("setvalue"),!1;case n.default.DOWN:return this.inputmask.__valueSet.call(this,parseFloat(this.inputmask.unmaskedvalue())-parseInt(a.step)),o.trigger("setvalue"),!1}if(!e.shiftKey&&(e.keyCode===n.default.DELETE||e.keyCode===n.default.BACKSPACE||e.keyCode===n.default.BACKSPACE_SAFARI)&&i.begin!==t.length){if(t[e.keyCode===n.default.DELETE?i.begin-1:i.end]===a.negationSymbol.front)return r=t.slice().reverse(),""!==a.negationSymbol.front&&r.shift(),""!==a.negationSymbol.back&&r.pop(),o.trigger("setvalue",[r.join(""),i.begin]),!1;if(!0===a._radixDance){var f=t.indexOf(a.radixPoint);if(a.digitsOptional){if(0===f)return(r=t.slice().reverse()).pop(),o.trigger("setvalue",[r.join(""),i.begin>=r.length?r.length:i.begin]),!1}else if(-1!==f&&(i.begin<f||i.end<f||e.keyCode===n.default.DELETE&&(i.begin===f||i.begin-1===f))){var d=void 0;return i.begin===i.end&&(e.keyCode===n.default.BACKSPACE||e.keyCode===n.default.BACKSPACE_SAFARI?i.begin++:e.keyCode===n.default.DELETE&&i.begin-1===f&&(d=l.extend({},i),i.begin--,i.end--)),(r=t.slice().reverse()).splice(r.length-i.begin,i.begin-i.end+1),r=c(r,a.digits,a).join(""),d&&(i=d),o.trigger("setvalue",[r,i.begin>=r.length?f+1:i.begin]),!1}}}}},currency:{prefix:"",groupSeparator:",",alias:"numeric",digits:2,digitsOptional:!1},decimal:{alias:"numeric"},integer:{alias:"numeric",inputmode:"numeric",digits:0},percentage:{alias:"numeric",min:0,max:100,suffix:" %",digits:0,allowMinus:!1},indianns:{alias:"numeric",_mask:function(e){return"("+e.groupSeparator+"99){*|1}("+e.groupSeparator+"999){1|1}"},groupSeparator:",",radixPoint:".",placeholder:"0",digits:2,digitsOptional:!1}})},9380:function(e,t,i){var a;Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n=((a=i(8741))&&a.__esModule?a:{default:a}).default?window:{};t.default=n},7760:function(e,t,i){Object.defineProperty(t,"__esModule",{value:!0}),t.HandleNativePlaceholder=function(e,t){var i=e?e.inputmask:this;if(l.ie){if(e.inputmask._valueGet()!==t&&(e.placeholder!==t||""===e.placeholder)){var a=o.getBuffer.call(i).slice(),n=e.inputmask._valueGet();if(n!==t){var r=o.getLastValidPosition.call(i);-1===r&&n===o.getBufferTemplate.call(i).join("")?a=[]:-1!==r&&f.call(i,a),p(e,a)}}}else e.placeholder!==t&&(e.placeholder=t,""===e.placeholder&&e.removeAttribute("placeholder"))},t.applyInputValue=c,t.checkVal=d,t.clearOptionalTail=f,t.unmaskedvalue=function(e){var t=e?e.inputmask:this,i=t.opts,a=t.maskset;if(e){if(void 0===e.inputmask)return e.value;e.inputmask&&e.inputmask.refreshValue&&c(e,e.inputmask._valueGet(!0))}var n=[],r=a.validPositions;for(var s in r)r[s]&&r[s].match&&(1!=r[s].match.static||Array.isArray(a.metadata)&&!0!==r[s].generatedInput)&&n.push(r[s].input);var l=0===n.length?"":(t.isRTL?n.reverse():n).join("");if("function"==typeof i.onUnMask){var u=(t.isRTL?o.getBuffer.call(t).slice().reverse():o.getBuffer.call(t)).join("");l=i.onUnMask.call(t,u,l,i)}return l},t.writeBuffer=p;var a,n=(a=i(5581))&&a.__esModule?a:{default:a},r=i(4713),o=i(8711),s=i(7215),l=i(9845),u=i(6030);function c(e,t){var i=e?e.inputmask:this,a=i.opts;e.inputmask.refreshValue=!1,"function"==typeof a.onBeforeMask&&(t=a.onBeforeMask.call(i,t,a)||t),d(e,!0,!1,t=t.toString().split("")),i.undoValue=i._valueGet(!0),(a.clearMaskOnLostFocus||a.clearIncomplete)&&e.inputmask._valueGet()===o.getBufferTemplate.call(i).join("")&&-1===o.getLastValidPosition.call(i)&&e.inputmask._valueSet("")}function f(e){e.length=0;for(var t,i=r.getMaskTemplate.call(this,!0,0,!0,void 0,!0);void 0!==(t=i.shift());)e.push(t);return e}function d(e,t,i,a,n){var l=e?e.inputmask:this,c=l.maskset,f=l.opts,d=l.dependencyLib,h=a.slice(),v="",m=-1,g=void 0,k=f.skipOptionalPartCharacter;f.skipOptionalPartCharacter="",o.resetMaskSet.call(l),c.tests={},m=f.radixPoint?o.determineNewCaretPosition.call(l,{begin:0,end:0},!1,!1===f.__financeInput?"radixFocus":void 0).begin:0,c.p=m,l.caretPos={begin:m};var y=[],b=l.caretPos;if(h.forEach((function(e,t){if(void 0!==e){var a=new d.Event("_checkval");a.keyCode=e.toString().charCodeAt(0),v+=e;var n=o.getLastValidPosition.call(l,void 0,!0);!function(e,t){for(var i=r.getMaskTemplate.call(l,!0,0).slice(e,o.seekNext.call(l,e,!1,!1)).join("").replace(/'/g,""),a=i.indexOf(t);a>0&&" "===i[a-1];)a--;var n=0===a&&!o.isMask.call(l,e)&&(r.getTest.call(l,e).match.nativeDef===t.charAt(0)||!0===r.getTest.call(l,e).match.static&&r.getTest.call(l,e).match.nativeDef==="'"+t.charAt(0)||" "===r.getTest.call(l,e).match.nativeDef&&(r.getTest.call(l,e+1).match.nativeDef===t.charAt(0)||!0===r.getTest.call(l,e+1).match.static&&r.getTest.call(l,e+1).match.nativeDef==="'"+t.charAt(0)));if(!n&&a>0&&!o.isMask.call(l,e,!1,!0)){var s=o.seekNext.call(l,e);l.caretPos.begin<s&&(l.caretPos={begin:s})}return n}(m,v)?(g=u.EventHandlers.keypressEvent.call(l,a,!0,!1,i,l.caretPos.begin))&&(m=l.caretPos.begin+1,v=""):g=u.EventHandlers.keypressEvent.call(l,a,!0,!1,i,n+1),g?(void 0!==g.pos&&c.validPositions[g.pos]&&!0===c.validPositions[g.pos].match.static&&void 0===c.validPositions[g.pos].alternation&&(y.push(g.pos),l.isRTL||(g.forwardPosition=g.pos+1)),p.call(l,void 0,o.getBuffer.call(l),g.forwardPosition,a,!1),l.caretPos={begin:g.forwardPosition,end:g.forwardPosition},b=l.caretPos):void 0===c.validPositions[t]&&h[t]===r.getPlaceholder.call(l,t)&&o.isMask.call(l,t,!0)?l.caretPos.begin++:l.caretPos=b}})),y.length>0){var x,P,E=o.seekNext.call(l,-1,void 0,!1);if(!s.isComplete.call(l,o.getBuffer.call(l))&&y.length<=E||s.isComplete.call(l,o.getBuffer.call(l))&&y.length>0&&y.length!==E&&0===y[0])for(var S=E;void 0!==(x=y.shift());){var w=new d.Event("_checkval");if((P=c.validPositions[x]).generatedInput=!0,w.keyCode=P.input.charCodeAt(0),(g=u.EventHandlers.keypressEvent.call(l,w,!0,!1,i,S))&&void 0!==g.pos&&g.pos!==x&&c.validPositions[g.pos]&&!0===c.validPositions[g.pos].match.static)y.push(g.pos);else if(!g)break;S++}}t&&p.call(l,e,o.getBuffer.call(l),g?g.forwardPosition:l.caretPos.begin,n||new d.Event("checkval"),n&&("input"===n.type&&l.undoValue!==o.getBuffer.call(l).join("")||"paste"===n.type)),f.skipOptionalPartCharacter=k}function p(e,t,i,a,r){var l=e?e.inputmask:this,u=l.opts,c=l.dependencyLib;if(a&&"function"==typeof u.onBeforeWrite){var f=u.onBeforeWrite.call(l,a,t,i,u);if(f){if(f.refreshFromBuffer){var d=f.refreshFromBuffer;s.refreshFromBuffer.call(l,!0===d?d:d.start,d.end,f.buffer||t),t=o.getBuffer.call(l,!0)}void 0!==i&&(i=void 0!==f.caret?f.caret:i)}}if(void 0!==e&&(e.inputmask._valueSet(t.join("")),void 0===i||void 0!==a&&"blur"===a.type||o.caret.call(l,e,i,void 0,void 0,void 0!==a&&"keydown"===a.type&&(a.keyCode===n.default.DELETE||a.keyCode===n.default.BACKSPACE)),!0===r)){var p=c(e),h=e.inputmask._valueGet();e.inputmask.skipInputEvent=!0,p.trigger("input"),setTimeout((function(){h===o.getBufferTemplate.call(l).join("")?p.trigger("cleared"):!0===s.isComplete.call(l,t)&&p.trigger("complete")}),0)}}},2394:function(e,t,i){Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0,i(7149),i(3194);var a=i(157),n=m(i(3287)),r=m(i(9380)),o=i(2391),s=i(4713),l=i(8711),u=i(7215),c=i(7760),f=i(9716),d=m(i(7392)),p=m(i(3976)),h=m(i(8741));function v(e){return v="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},v(e)}function m(e){return e&&e.__esModule?e:{default:e}}var g=r.default.document,k="_inputmask_opts";function y(e,t,i){if(h.default){if(!(this instanceof y))return new y(e,t,i);this.dependencyLib=n.default,this.el=void 0,this.events={},this.maskset=void 0,!0!==i&&("[object Object]"===Object.prototype.toString.call(e)?t=e:(t=t||{},e&&(t.alias=e)),this.opts=n.default.extend(!0,{},this.defaults,t),this.noMasksCache=t&&void 0!==t.definitions,this.userOptions=t||{},b(this.opts.alias,t,this.opts)),this.refreshValue=!1,this.undoValue=void 0,this.$el=void 0,this.skipKeyPressEvent=!1,this.skipInputEvent=!1,this.validationEvent=!1,this.ignorable=!1,this.maxLength,this.mouseEnter=!1,this.originalPlaceholder=void 0,this.isComposing=!1}}function b(e,t,i){var a=y.prototype.aliases[e];return a?(a.alias&&b(a.alias,void 0,i),n.default.extend(!0,i,a),n.default.extend(!0,i,t),!0):(null===i.mask&&(i.mask=e),!1)}y.prototype={dataAttribute:"data-inputmask",defaults:p.default,definitions:d.default,aliases:{},masksCache:{},get isRTL(){return this.opts.isRTL||this.opts.numericInput},mask:function(e){var t=this;return"string"==typeof e&&(e=g.getElementById(e)||g.querySelectorAll(e)),(e=e.nodeName?[e]:Array.isArray(e)?e:[].slice.call(e)).forEach((function(e,i){var s=n.default.extend(!0,{},t.opts);if(function(e,t,i,a){function o(t,n){var o=""===a?t:a+"-"+t;null!==(n=void 0!==n?n:e.getAttribute(o))&&("string"==typeof n&&(0===t.indexOf("on")?n=r.default[n]:"false"===n?n=!1:"true"===n&&(n=!0)),i[t]=n)}if(!0===t.importDataAttributes){var s,l,u,c,f=e.getAttribute(a);if(f&&""!==f&&(f=f.replace(/'/g,'"'),l=JSON.parse("{"+f+"}")),l)for(c in u=void 0,l)if("alias"===c.toLowerCase()){u=l[c];break}for(s in o("alias",u),i.alias&&b(i.alias,i,t),t){if(l)for(c in u=void 0,l)if(c.toLowerCase()===s.toLowerCase()){u=l[c];break}o(s,u)}}n.default.extend(!0,t,i),("rtl"===e.dir||t.rightAlign)&&(e.style.textAlign="right");("rtl"===e.dir||t.numericInput)&&(e.dir="ltr",e.removeAttribute("dir"),t.isRTL=!0);return Object.keys(i).length}(e,s,n.default.extend(!0,{},t.userOptions),t.dataAttribute)){var l=(0,o.generateMaskSet)(s,t.noMasksCache);void 0!==l&&(void 0!==e.inputmask&&(e.inputmask.opts.autoUnmask=!0,e.inputmask.remove()),e.inputmask=new y(void 0,void 0,!0),e.inputmask.opts=s,e.inputmask.noMasksCache=t.noMasksCache,e.inputmask.userOptions=n.default.extend(!0,{},t.userOptions),e.inputmask.el=e,e.inputmask.$el=(0,n.default)(e),e.inputmask.maskset=l,n.default.data(e,k,t.userOptions),a.mask.call(e.inputmask))}})),e&&e[0]&&e[0].inputmask||this},option:function(e,t){return"string"==typeof e?this.opts[e]:"object"===v(e)?(n.default.extend(this.userOptions,e),this.el&&!0!==t&&this.mask(this.el),this):void 0},unmaskedvalue:function(e){if(this.maskset=this.maskset||(0,o.generateMaskSet)(this.opts,this.noMasksCache),void 0===this.el||void 0!==e){var t=("function"==typeof this.opts.onBeforeMask&&this.opts.onBeforeMask.call(this,e,this.opts)||e).split("");c.checkVal.call(this,void 0,!1,!1,t),"function"==typeof this.opts.onBeforeWrite&&this.opts.onBeforeWrite.call(this,void 0,l.getBuffer.call(this),0,this.opts)}return c.unmaskedvalue.call(this,this.el)},remove:function(){if(this.el){n.default.data(this.el,k,null);var e=this.opts.autoUnmask?(0,c.unmaskedvalue)(this.el):this._valueGet(this.opts.autoUnmask);e!==l.getBufferTemplate.call(this).join("")?this._valueSet(e,this.opts.autoUnmask):this._valueSet(""),f.EventRuler.off(this.el),Object.getOwnPropertyDescriptor&&Object.getPrototypeOf?Object.getOwnPropertyDescriptor(Object.getPrototypeOf(this.el),"value")&&this.__valueGet&&Object.defineProperty(this.el,"value",{get:this.__valueGet,set:this.__valueSet,configurable:!0}):g.__lookupGetter__&&this.el.__lookupGetter__("value")&&this.__valueGet&&(this.el.__defineGetter__("value",this.__valueGet),this.el.__defineSetter__("value",this.__valueSet)),this.el.inputmask=void 0}return this.el},getemptymask:function(){return this.maskset=this.maskset||(0,o.generateMaskSet)(this.opts,this.noMasksCache),l.getBufferTemplate.call(this).join("")},hasMaskedValue:function(){return!this.opts.autoUnmask},isComplete:function(){return this.maskset=this.maskset||(0,o.generateMaskSet)(this.opts,this.noMasksCache),u.isComplete.call(this,l.getBuffer.call(this))},getmetadata:function(){if(this.maskset=this.maskset||(0,o.generateMaskSet)(this.opts,this.noMasksCache),Array.isArray(this.maskset.metadata)){var e=s.getMaskTemplate.call(this,!0,0,!1).join("");return this.maskset.metadata.forEach((function(t){return t.mask!==e||(e=t,!1)})),e}return this.maskset.metadata},isValid:function(e){if(this.maskset=this.maskset||(0,o.generateMaskSet)(this.opts,this.noMasksCache),e){var t=("function"==typeof this.opts.onBeforeMask&&this.opts.onBeforeMask.call(this,e,this.opts)||e).split("");c.checkVal.call(this,void 0,!0,!1,t)}else e=this.isRTL?l.getBuffer.call(this).slice().reverse().join(""):l.getBuffer.call(this).join("");for(var i=l.getBuffer.call(this),a=l.determineLastRequiredPosition.call(this),n=i.length-1;n>a&&!l.isMask.call(this,n);n--);return i.splice(a,n+1-a),u.isComplete.call(this,i)&&e===(this.isRTL?l.getBuffer.call(this).slice().reverse().join(""):l.getBuffer.call(this).join(""))},format:function(e,t){this.maskset=this.maskset||(0,o.generateMaskSet)(this.opts,this.noMasksCache);var i=("function"==typeof this.opts.onBeforeMask&&this.opts.onBeforeMask.call(this,e,this.opts)||e).split("");c.checkVal.call(this,void 0,!0,!1,i);var a=this.isRTL?l.getBuffer.call(this).slice().reverse().join(""):l.getBuffer.call(this).join("");return t?{value:a,metadata:this.getmetadata()}:a},setValue:function(e){this.el&&(0,n.default)(this.el).trigger("setvalue",[e])},analyseMask:o.analyseMask},y.extendDefaults=function(e){n.default.extend(!0,y.prototype.defaults,e)},y.extendDefinitions=function(e){n.default.extend(!0,y.prototype.definitions,e)},y.extendAliases=function(e){n.default.extend(!0,y.prototype.aliases,e)},y.format=function(e,t,i){return y(t).format(e,i)},y.unmask=function(e,t){return y(t).unmaskedvalue(e)},y.isValid=function(e,t){return y(t).isValid(e)},y.remove=function(e){"string"==typeof e&&(e=g.getElementById(e)||g.querySelectorAll(e)),(e=e.nodeName?[e]:e).forEach((function(e){e.inputmask&&e.inputmask.remove()}))},y.setValue=function(e,t){"string"==typeof e&&(e=g.getElementById(e)||g.querySelectorAll(e)),(e=e.nodeName?[e]:e).forEach((function(e){e.inputmask?e.inputmask.setValue(t):(0,n.default)(e).trigger("setvalue",[t])}))},y.dependencyLib=n.default,r.default.Inputmask=y;var x=y;t.default=x},5296:function(e,t,i){function a(e){return a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},a(e)}var n=h(i(9380)),r=h(i(2394)),o=h(i(8741));function s(e,t){for(var i=0;i<t.length;i++){var a=t[i];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}function l(e,t){if(t&&("object"===a(t)||"function"==typeof t))return t;if(void 0!==t)throw new TypeError("Derived constructors may only return object or undefined");return function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e)}function u(e){var t="function"==typeof Map?new Map:void 0;return u=function(e){if(null===e||(i=e,-1===Function.toString.call(i).indexOf("[native code]")))return e;var i;if("function"!=typeof e)throw new TypeError("Super expression must either be null or a function");if(void 0!==t){if(t.has(e))return t.get(e);t.set(e,a)}function a(){return c(e,arguments,p(this).constructor)}return a.prototype=Object.create(e.prototype,{constructor:{value:a,enumerable:!1,writable:!0,configurable:!0}}),d(a,e)},u(e)}function c(e,t,i){return c=f()?Reflect.construct:function(e,t,i){var a=[null];a.push.apply(a,t);var n=new(Function.bind.apply(e,a));return i&&d(n,i.prototype),n},c.apply(null,arguments)}function f(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}function d(e,t){return d=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e},d(e,t)}function p(e){return p=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)},p(e)}function h(e){return e&&e.__esModule?e:{default:e}}var v=n.default.document;if(o.default&&v&&v.head&&v.head.attachShadow&&n.default.customElements&&void 0===n.default.customElements.get("input-mask")){var m=function(e){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),Object.defineProperty(e,"prototype",{writable:!1}),t&&d(e,t)}(c,e);var t,i,a,n,o,u=(t=c,i=f(),function(){var e,a=p(t);if(i){var n=p(this).constructor;e=Reflect.construct(a,arguments,n)}else e=a.apply(this,arguments);return l(this,e)});function c(){var e;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,c);var t=(e=u.call(this)).getAttributeNames(),i=e.attachShadow({mode:"closed"}),a=v.createElement("input");for(var n in a.type="text",i.appendChild(a),t)Object.prototype.hasOwnProperty.call(t,n)&&a.setAttribute(t[n],e.getAttribute(t[n]));var o=new r.default;return o.dataAttribute="",o.mask(a),a.inputmask.shadowRoot=i,e}return a=c,n&&s(a.prototype,n),o&&s(a,o),Object.defineProperty(a,"prototype",{writable:!1}),a}(u(HTMLElement));n.default.customElements.define("input-mask",m)}},443:function(e,t,i){var a=o(i(2047)),n=o(i(2394));function r(e){return r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},r(e)}function o(e){return e&&e.__esModule?e:{default:e}}void 0===a.default.fn.inputmask&&(a.default.fn.inputmask=function(e,t){var i,o=this[0];if(void 0===t&&(t={}),"string"==typeof e)switch(e){case"unmaskedvalue":return o&&o.inputmask?o.inputmask.unmaskedvalue():(0,a.default)(o).val();case"remove":return this.each((function(){this.inputmask&&this.inputmask.remove()}));case"getemptymask":return o&&o.inputmask?o.inputmask.getemptymask():"";case"hasMaskedValue":return!(!o||!o.inputmask)&&o.inputmask.hasMaskedValue();case"isComplete":return!o||!o.inputmask||o.inputmask.isComplete();case"getmetadata":return o&&o.inputmask?o.inputmask.getmetadata():void 0;case"setvalue":n.default.setValue(o,t);break;case"option":if("string"!=typeof t)return this.each((function(){if(void 0!==this.inputmask)return this.inputmask.option(t)}));if(o&&void 0!==o.inputmask)return o.inputmask.option(t);break;default:return t.alias=e,i=new n.default(t),this.each((function(){i.mask(this)}))}else{if(Array.isArray(e))return t.alias=e,i=new n.default(t),this.each((function(){i.mask(this)}));if("object"==r(e))return i=new n.default(e),void 0===e.mask&&void 0===e.alias?this.each((function(){if(void 0!==this.inputmask)return this.inputmask.option(e);i.mask(this)})):this.each((function(){i.mask(this)}));if(void 0===e)return this.each((function(){(i=new n.default(t)).mask(this)}))}})},2391:function(e,t,i){Object.defineProperty(t,"__esModule",{value:!0}),t.analyseMask=function(e,t,i){var a,o,s,l,u,c,f=/(?:[?*+]|\{[0-9+*]+(?:,[0-9+*]*)?(?:\|[0-9+*]*)?\})|[^.?*+^${[]()|\\]+|./g,d=/\[\^?]?(?:[^\\\]]+|\\[\S\s]?)*]?|\\(?:0(?:[0-3][0-7]{0,2}|[4-7][0-7]?)?|[1-9][0-9]*|x[0-9A-Fa-f]{2}|u[0-9A-Fa-f]{4}|c[A-Za-z]|[\S\s]?)|\((?:\?[:=!]?)?|(?:[?*+]|\{[0-9]+(?:,[0-9]*)?\})\??|[^.?*+^${[()|\\]+|./g,p=!1,h=new n.default,v=[],m=[],g=!1;function k(e,a,n){n=void 0!==n?n:e.matches.length;var o=e.matches[n-1];if(t)0===a.indexOf("[")||p&&/\\d|\\s|\\w/i.test(a)||"."===a?e.matches.splice(n++,0,{fn:new RegExp(a,i.casing?"i":""),static:!1,optionality:!1,newBlockMarker:void 0===o?"master":o.def!==a,casing:null,def:a,placeholder:void 0,nativeDef:a}):(p&&(a=a[a.length-1]),a.split("").forEach((function(t,a){o=e.matches[n-1],e.matches.splice(n++,0,{fn:/[a-z]/i.test(i.staticDefinitionSymbol||t)?new RegExp("["+(i.staticDefinitionSymbol||t)+"]",i.casing?"i":""):null,static:!0,optionality:!1,newBlockMarker:void 0===o?"master":o.def!==t&&!0!==o.static,casing:null,def:i.staticDefinitionSymbol||t,placeholder:void 0!==i.staticDefinitionSymbol?t:void 0,nativeDef:(p?"'":"")+t})}))),p=!1;else{var s=i.definitions&&i.definitions[a]||i.usePrototypeDefinitions&&r.default.prototype.definitions[a];s&&!p?e.matches.splice(n++,0,{fn:s.validator?"string"==typeof s.validator?new RegExp(s.validator,i.casing?"i":""):new function(){this.test=s.validator}:new RegExp("."),static:s.static||!1,optionality:s.optional||!1,defOptionality:s.optional||!1,newBlockMarker:void 0===o||s.optional?"master":o.def!==(s.definitionSymbol||a),casing:s.casing,def:s.definitionSymbol||a,placeholder:s.placeholder,nativeDef:a,generated:s.generated}):(e.matches.splice(n++,0,{fn:/[a-z]/i.test(i.staticDefinitionSymbol||a)?new RegExp("["+(i.staticDefinitionSymbol||a)+"]",i.casing?"i":""):null,static:!0,optionality:!1,newBlockMarker:void 0===o?"master":o.def!==a&&!0!==o.static,casing:null,def:i.staticDefinitionSymbol||a,placeholder:void 0!==i.staticDefinitionSymbol?a:void 0,nativeDef:(p?"'":"")+a}),p=!1)}}function y(){if(v.length>0){if(k(l=v[v.length-1],o),l.isAlternator){u=v.pop();for(var e=0;e<u.matches.length;e++)u.matches[e].isGroup&&(u.matches[e].isGroup=!1);v.length>0?(l=v[v.length-1]).matches.push(u):h.matches.push(u)}}else k(h,o)}function b(e){var t=new n.default(!0);return t.openGroup=!1,t.matches=e,t}function x(){if((s=v.pop()).openGroup=!1,void 0!==s)if(v.length>0){if((l=v[v.length-1]).matches.push(s),l.isAlternator){for(var e=(u=v.pop()).matches[0].matches?u.matches[0].matches.length:1,t=0;t<u.matches.length;t++)u.matches[t].isGroup=!1,u.matches[t].alternatorGroup=!1,null===i.keepStatic&&e<(u.matches[t].matches?u.matches[t].matches.length:1)&&(i.keepStatic=!0),e=u.matches[t].matches?u.matches[t].matches.length:1;v.length>0?(l=v[v.length-1]).matches.push(u):h.matches.push(u)}}else h.matches.push(s);else y()}function P(e){var t=e.pop();return t.isQuantifier&&(t=b([e.pop(),t])),t}t&&(i.optionalmarker[0]=void 0,i.optionalmarker[1]=void 0);for(;a=t?d.exec(e):f.exec(e);){if(o=a[0],t){switch(o.charAt(0)){case"?":o="{0,1}";break;case"+":case"*":o="{"+o+"}";break;case"|":if(0===v.length){var E=b(h.matches);E.openGroup=!0,v.push(E),h.matches=[],g=!0}}if("\\d"===o)o="[0-9]"}if(p)y();else switch(o.charAt(0)){case"$":case"^":t||y();break;case i.escapeChar:p=!0,t&&y();break;case i.optionalmarker[1]:case i.groupmarker[1]:x();break;case i.optionalmarker[0]:v.push(new n.default(!1,!0));break;case i.groupmarker[0]:v.push(new n.default(!0));break;case i.quantifiermarker[0]:var S=new n.default(!1,!1,!0),w=(o=o.replace(/[{}?]/g,"")).split("|"),_=w[0].split(","),M=isNaN(_[0])?_[0]:parseInt(_[0]),O=1===_.length?M:isNaN(_[1])?_[1]:parseInt(_[1]),T=isNaN(w[1])?w[1]:parseInt(w[1]);"*"!==M&&"+"!==M||(M="*"===O?0:1),S.quantifier={min:M,max:O,jit:T};var A=v.length>0?v[v.length-1].matches:h.matches;if((a=A.pop()).isAlternator){A.push(a),A=a.matches;var C=new n.default(!0),D=A.pop();A.push(C),A=C.matches,a=D}a.isGroup||(a=b([a])),A.push(a),A.push(S);break;case i.alternatormarker:if(v.length>0){var j=(l=v[v.length-1]).matches[l.matches.length-1];c=l.openGroup&&(void 0===j.matches||!1===j.isGroup&&!1===j.isAlternator)?v.pop():P(l.matches)}else c=P(h.matches);if(c.isAlternator)v.push(c);else if(c.alternatorGroup?(u=v.pop(),c.alternatorGroup=!1):u=new n.default(!1,!1,!1,!0),u.matches.push(c),v.push(u),c.openGroup){c.openGroup=!1;var B=new n.default(!0);B.alternatorGroup=!0,v.push(B)}break;default:y()}}g&&x();for(;v.length>0;)s=v.pop(),h.matches.push(s);h.matches.length>0&&(!function e(a){a&&a.matches&&a.matches.forEach((function(n,r){var o=a.matches[r+1];(void 0===o||void 0===o.matches||!1===o.isQuantifier)&&n&&n.isGroup&&(n.isGroup=!1,t||(k(n,i.groupmarker[0],0),!0!==n.openGroup&&k(n,i.groupmarker[1]))),e(n)}))}(h),m.push(h));(i.numericInput||i.isRTL)&&function e(t){for(var a in t.matches=t.matches.reverse(),t.matches)if(Object.prototype.hasOwnProperty.call(t.matches,a)){var n=parseInt(a);if(t.matches[a].isQuantifier&&t.matches[n+1]&&t.matches[n+1].isGroup){var r=t.matches[a];t.matches.splice(a,1),t.matches.splice(n+1,0,r)}void 0!==t.matches[a].matches?t.matches[a]=e(t.matches[a]):t.matches[a]=((o=t.matches[a])===i.optionalmarker[0]?o=i.optionalmarker[1]:o===i.optionalmarker[1]?o=i.optionalmarker[0]:o===i.groupmarker[0]?o=i.groupmarker[1]:o===i.groupmarker[1]&&(o=i.groupmarker[0]),o)}var o;return t}(m[0]);return m},t.generateMaskSet=function(e,t){var i;function n(e,i,n){var o,s,l=!1;if(null!==e&&""!==e||((l=null!==n.regex)?e=(e=n.regex).replace(/^(\^)(.*)(\$)$/,"$2"):(l=!0,e=".*")),1===e.length&&!1===n.greedy&&0!==n.repeat&&(n.placeholder=""),n.repeat>0||"*"===n.repeat||"+"===n.repeat){var u="*"===n.repeat?0:"+"===n.repeat?1:n.repeat;e=n.groupmarker[0]+e+n.groupmarker[1]+n.quantifiermarker[0]+u+","+n.repeat+n.quantifiermarker[1]}return s=l?"regex_"+n.regex:n.numericInput?e.split("").reverse().join(""):e,null!==n.keepStatic&&(s="ks_"+n.keepStatic+s),void 0===r.default.prototype.masksCache[s]||!0===t?(o={mask:e,maskToken:r.default.prototype.analyseMask(e,l,n),validPositions:{},_buffer:void 0,buffer:void 0,tests:{},excludes:{},metadata:i,maskLength:void 0,jitOffset:{}},!0!==t&&(r.default.prototype.masksCache[s]=o,o=a.default.extend(!0,{},r.default.prototype.masksCache[s]))):o=a.default.extend(!0,{},r.default.prototype.masksCache[s]),o}"function"==typeof e.mask&&(e.mask=e.mask(e));if(Array.isArray(e.mask)){if(e.mask.length>1){null===e.keepStatic&&(e.keepStatic=!0);var o=e.groupmarker[0];return(e.isRTL?e.mask.reverse():e.mask).forEach((function(t){o.length>1&&(o+=e.alternatormarker),void 0!==t.mask&&"function"!=typeof t.mask?o+=t.mask:o+=t})),n(o+=e.groupmarker[1],e.mask,e)}e.mask=e.mask.pop()}i=e.mask&&void 0!==e.mask.mask&&"function"!=typeof e.mask.mask?n(e.mask.mask,e.mask,e):n(e.mask,e.mask,e);null===e.keepStatic&&(e.keepStatic=!1);return i};var a=o(i(3287)),n=o(i(9695)),r=o(i(2394));function o(e){return e&&e.__esModule?e:{default:e}}},157:function(e,t,i){Object.defineProperty(t,"__esModule",{value:!0}),t.mask=function(){var e=this,t=this.opts,i=this.el,a=this.dependencyLib;s.EventRuler.off(i);var f=function(t,i){"textarea"!==t.tagName.toLowerCase()&&i.ignorables.push(n.default.ENTER);var l=t.getAttribute("type"),u="input"===t.tagName.toLowerCase()&&i.supportsInputType.includes(l)||t.isContentEditable||"textarea"===t.tagName.toLowerCase();if(!u)if("input"===t.tagName.toLowerCase()){var c=document.createElement("input");c.setAttribute("type",l),u="text"===c.type,c=null}else u="partial";return!1!==u?function(t){var n,l;function u(){return this.inputmask?this.inputmask.opts.autoUnmask?this.inputmask.unmaskedvalue():-1!==r.getLastValidPosition.call(e)||!0!==i.nullable?(this.inputmask.shadowRoot||this.ownerDocument).activeElement===this&&i.clearMaskOnLostFocus?(e.isRTL?o.clearOptionalTail.call(e,r.getBuffer.call(e).slice()).reverse():o.clearOptionalTail.call(e,r.getBuffer.call(e).slice())).join(""):n.call(this):"":n.call(this)}function c(e){l.call(this,e),this.inputmask&&(0,o.applyInputValue)(this,e)}if(!t.inputmask.__valueGet){if(!0!==i.noValuePatching){if(Object.getOwnPropertyDescriptor){var f=Object.getPrototypeOf?Object.getOwnPropertyDescriptor(Object.getPrototypeOf(t),"value"):void 0;f&&f.get&&f.set?(n=f.get,l=f.set,Object.defineProperty(t,"value",{get:u,set:c,configurable:!0})):"input"!==t.tagName.toLowerCase()&&(n=function(){return this.textContent},l=function(e){this.textContent=e},Object.defineProperty(t,"value",{get:u,set:c,configurable:!0}))}else document.__lookupGetter__&&t.__lookupGetter__("value")&&(n=t.__lookupGetter__("value"),l=t.__lookupSetter__("value"),t.__defineGetter__("value",u),t.__defineSetter__("value",c));t.inputmask.__valueGet=n,t.inputmask.__valueSet=l}t.inputmask._valueGet=function(t){return e.isRTL&&!0!==t?n.call(this.el).split("").reverse().join(""):n.call(this.el)},t.inputmask._valueSet=function(t,i){l.call(this.el,null==t?"":!0!==i&&e.isRTL?t.split("").reverse().join(""):t)},void 0===n&&(n=function(){return this.value},l=function(e){this.value=e},function(t){if(a.valHooks&&(void 0===a.valHooks[t]||!0!==a.valHooks[t].inputmaskpatch)){var n=a.valHooks[t]&&a.valHooks[t].get?a.valHooks[t].get:function(e){return e.value},s=a.valHooks[t]&&a.valHooks[t].set?a.valHooks[t].set:function(e,t){return e.value=t,e};a.valHooks[t]={get:function(t){if(t.inputmask){if(t.inputmask.opts.autoUnmask)return t.inputmask.unmaskedvalue();var a=n(t);return-1!==r.getLastValidPosition.call(e,void 0,void 0,t.inputmask.maskset.validPositions)||!0!==i.nullable?a:""}return n(t)},set:function(e,t){var i=s(e,t);return e.inputmask&&(0,o.applyInputValue)(e,t),i},inputmaskpatch:!0}}}(t.type),function(t){s.EventRuler.on(t,"mouseenter",(function(){var t=this.inputmask._valueGet(!0);t!==(e.isRTL?r.getBuffer.call(e).reverse():r.getBuffer.call(e)).join("")&&(0,o.applyInputValue)(this,t)}))}(t))}}(t):t.inputmask=void 0,u}(i,t);if(!1!==f){e.originalPlaceholder=i.placeholder,e.maxLength=void 0!==i?i.maxLength:void 0,-1===e.maxLength&&(e.maxLength=void 0),"inputMode"in i&&null===i.getAttribute("inputmode")&&(i.inputMode=t.inputmode,i.setAttribute("inputmode",t.inputmode)),!0===f&&(t.showMaskOnFocus=t.showMaskOnFocus&&-1===["cc-number","cc-exp"].indexOf(i.autocomplete),l.iphone&&(t.insertModeVisual=!1),s.EventRuler.on(i,"submit",c.EventHandlers.submitEvent),s.EventRuler.on(i,"reset",c.EventHandlers.resetEvent),s.EventRuler.on(i,"blur",c.EventHandlers.blurEvent),s.EventRuler.on(i,"focus",c.EventHandlers.focusEvent),s.EventRuler.on(i,"invalid",c.EventHandlers.invalidEvent),s.EventRuler.on(i,"click",c.EventHandlers.clickEvent),s.EventRuler.on(i,"mouseleave",c.EventHandlers.mouseleaveEvent),s.EventRuler.on(i,"mouseenter",c.EventHandlers.mouseenterEvent),s.EventRuler.on(i,"paste",c.EventHandlers.pasteEvent),s.EventRuler.on(i,"cut",c.EventHandlers.cutEvent),s.EventRuler.on(i,"complete",t.oncomplete),s.EventRuler.on(i,"incomplete",t.onincomplete),s.EventRuler.on(i,"cleared",t.oncleared),!0!==t.inputEventOnly&&(s.EventRuler.on(i,"keydown",c.EventHandlers.keydownEvent),s.EventRuler.on(i,"keypress",c.EventHandlers.keypressEvent),s.EventRuler.on(i,"keyup",c.EventHandlers.keyupEvent)),(l.mobile||t.inputEventOnly)&&i.removeAttribute("maxLength"),s.EventRuler.on(i,"input",c.EventHandlers.inputFallBackEvent),s.EventRuler.on(i,"compositionend",c.EventHandlers.compositionendEvent)),s.EventRuler.on(i,"setvalue",c.EventHandlers.setValueEvent),r.getBufferTemplate.call(e).join(""),e.undoValue=e._valueGet(!0);var d=(i.inputmask.shadowRoot||i.ownerDocument).activeElement;if(""!==i.inputmask._valueGet(!0)||!1===t.clearMaskOnLostFocus||d===i){(0,o.applyInputValue)(i,i.inputmask._valueGet(!0),t);var p=r.getBuffer.call(e).slice();!1===u.isComplete.call(e,p)&&t.clearIncomplete&&r.resetMaskSet.call(e),t.clearMaskOnLostFocus&&d!==i&&(-1===r.getLastValidPosition.call(e)?p=[]:o.clearOptionalTail.call(e,p)),(!1===t.clearMaskOnLostFocus||t.showMaskOnFocus&&d===i||""!==i.inputmask._valueGet(!0))&&(0,o.writeBuffer)(i,p),d===i&&r.caret.call(e,i,r.seekNext.call(e,r.getLastValidPosition.call(e)))}}};var a,n=(a=i(5581))&&a.__esModule?a:{default:a},r=i(8711),o=i(7760),s=i(9716),l=i(9845),u=i(7215),c=i(6030)},9695:function(e,t){Object.defineProperty(t,"__esModule",{value:!0}),t.default=function(e,t,i,a){this.matches=[],this.openGroup=e||!1,this.alternatorGroup=!1,this.isGroup=e||!1,this.isOptional=t||!1,this.isQuantifier=i||!1,this.isAlternator=a||!1,this.quantifier={min:1,max:1}}},3194:function(){Array.prototype.includes||Object.defineProperty(Array.prototype,"includes",{value:function(e,t){if(null==this)throw new TypeError('"this" is null or not defined');var i=Object(this),a=i.length>>>0;if(0===a)return!1;for(var n=0|t,r=Math.max(n>=0?n:a-Math.abs(n),0);r<a;){if(i[r]===e)return!0;r++}return!1}})},7149:function(){function e(t){return e="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},e(t)}"function"!=typeof Object.getPrototypeOf&&(Object.getPrototypeOf="object"===e("test".__proto__)?function(e){return e.__proto__}:function(e){return e.constructor.prototype})},8711:function(e,t,i){Object.defineProperty(t,"__esModule",{value:!0}),t.caret=function(e,t,i,a,n){var r,o=this,s=this.opts;if(void 0===t)return"selectionStart"in e&&"selectionEnd"in e?(t=e.selectionStart,i=e.selectionEnd):window.getSelection?(r=window.getSelection().getRangeAt(0)).commonAncestorContainer.parentNode!==e&&r.commonAncestorContainer!==e||(t=r.startOffset,i=r.endOffset):document.selection&&document.selection.createRange&&(r=document.selection.createRange(),t=0-r.duplicate().moveStart("character",-e.inputmask._valueGet().length),i=t+r.text.length),{begin:a?t:u.call(o,t),end:a?i:u.call(o,i)};if(Array.isArray(t)&&(i=o.isRTL?t[0]:t[1],t=o.isRTL?t[1]:t[0]),void 0!==t.begin&&(i=o.isRTL?t.begin:t.end,t=o.isRTL?t.end:t.begin),"number"==typeof t){t=a?t:u.call(o,t),i="number"==typeof(i=a?i:u.call(o,i))?i:t;var l=parseInt(((e.ownerDocument.defaultView||window).getComputedStyle?(e.ownerDocument.defaultView||window).getComputedStyle(e,null):e.currentStyle).fontSize)*i;if(e.scrollLeft=l>e.scrollWidth?l:0,e.inputmask.caretPos={begin:t,end:i},s.insertModeVisual&&!1===s.insertMode&&t===i&&(n||i++),e===(e.inputmask.shadowRoot||e.ownerDocument).activeElement)if("setSelectionRange"in e)e.setSelectionRange(t,i);else if(window.getSelection){if(r=document.createRange(),void 0===e.firstChild||null===e.firstChild){var c=document.createTextNode("");e.appendChild(c)}r.setStart(e.firstChild,t<e.inputmask._valueGet().length?t:e.inputmask._valueGet().length),r.setEnd(e.firstChild,i<e.inputmask._valueGet().length?i:e.inputmask._valueGet().length),r.collapse(!0);var f=window.getSelection();f.removeAllRanges(),f.addRange(r)}else e.createTextRange&&((r=e.createTextRange()).collapse(!0),r.moveEnd("character",i),r.moveStart("character",t),r.select())}},t.determineLastRequiredPosition=function(e){var t,i,r=this,s=this.maskset,l=this.dependencyLib,u=a.getMaskTemplate.call(r,!0,o.call(r),!0,!0),c=u.length,f=o.call(r),d={},p=s.validPositions[f],h=void 0!==p?p.locator.slice():void 0;for(t=f+1;t<u.length;t++)i=a.getTestTemplate.call(r,t,h,t-1),h=i.locator.slice(),d[t]=l.extend(!0,{},i);var v=p&&void 0!==p.alternation?p.locator[p.alternation]:void 0;for(t=c-1;t>f&&(((i=d[t]).match.optionality||i.match.optionalQuantifier&&i.match.newBlockMarker||v&&(v!==d[t].locator[p.alternation]&&1!=i.match.static||!0===i.match.static&&i.locator[p.alternation]&&n.checkAlternationMatch.call(r,i.locator[p.alternation].toString().split(","),v.toString().split(","))&&""!==a.getTests.call(r,t)[0].def))&&u[t]===a.getPlaceholder.call(r,t,i.match));t--)c--;return e?{l:c,def:d[c]?d[c].match:void 0}:c},t.determineNewCaretPosition=function(e,t,i){var n=this,u=this.maskset,c=this.opts;t&&(n.isRTL?e.end=e.begin:e.begin=e.end);if(e.begin===e.end){switch(i=i||c.positionCaretOnClick){case"none":break;case"select":e={begin:0,end:r.call(n).length};break;case"ignore":e.end=e.begin=l.call(n,o.call(n));break;case"radixFocus":if(function(e){if(""!==c.radixPoint&&0!==c.digits){var t=u.validPositions;if(void 0===t[e]||t[e].input===a.getPlaceholder.call(n,e)){if(e<l.call(n,-1))return!0;var i=r.call(n).indexOf(c.radixPoint);if(-1!==i){for(var o in t)if(t[o]&&i<o&&t[o].input!==a.getPlaceholder.call(n,o))return!1;return!0}}}return!1}(e.begin)){var f=r.call(n).join("").indexOf(c.radixPoint);e.end=e.begin=c.numericInput?l.call(n,f):f;break}default:var d=e.begin,p=o.call(n,d,!0),h=l.call(n,-1!==p||s.call(n,0)?p:-1);if(d<=h)e.end=e.begin=s.call(n,d,!1,!0)?d:l.call(n,d);else{var v=u.validPositions[p],m=a.getTestTemplate.call(n,h,v?v.match.locator:void 0,v),g=a.getPlaceholder.call(n,h,m.match);if(""!==g&&r.call(n)[h]!==g&&!0!==m.match.optionalQuantifier&&!0!==m.match.newBlockMarker||!s.call(n,h,c.keepStatic,!0)&&m.match.def===g){var k=l.call(n,h);(d>=k||d===h)&&(h=k)}e.end=e.begin=h}}return e}},t.getBuffer=r,t.getBufferTemplate=function(){var e=this.maskset;void 0===e._buffer&&(e._buffer=a.getMaskTemplate.call(this,!1,1),void 0===e.buffer&&(e.buffer=e._buffer.slice()));return e._buffer},t.getLastValidPosition=o,t.isMask=s,t.resetMaskSet=function(e){var t=this.maskset;t.buffer=void 0,!0!==e&&(t.validPositions={},t.p=0)},t.seekNext=l,t.seekPrevious=function(e,t){var i=this,n=e-1;if(e<=0)return 0;for(;n>0&&(!0===t&&(!0!==a.getTest.call(i,n).match.newBlockMarker||!s.call(i,n,void 0,!0))||!0!==t&&!s.call(i,n,void 0,!0));)n--;return n},t.translatePosition=u;var a=i(4713),n=i(7215);function r(e){var t=this.maskset;return void 0!==t.buffer&&!0!==e||(t.buffer=a.getMaskTemplate.call(this,!0,o.call(this),!0),void 0===t._buffer&&(t._buffer=t.buffer.slice())),t.buffer}function o(e,t,i){var a=this.maskset,n=-1,r=-1,o=i||a.validPositions;for(var s in void 0===e&&(e=-1),o){var l=parseInt(s);o[l]&&(t||!0!==o[l].generatedInput)&&(l<=e&&(n=l),l>=e&&(r=l))}return-1===n||n==e?r:-1==r||e-n<r-e?n:r}function s(e,t,i){var n=this,r=this.maskset,o=a.getTestTemplate.call(n,e).match;if(""===o.def&&(o=a.getTest.call(n,e).match),!0!==o.static)return o.fn;if(!0===i&&void 0!==r.validPositions[e]&&!0!==r.validPositions[e].generatedInput)return!0;if(!0!==t&&e>-1){if(i){var s=a.getTests.call(n,e);return s.length>1+(""===s[s.length-1].match.def?1:0)}var l=a.determineTestTemplate.call(n,e,a.getTests.call(n,e)),u=a.getPlaceholder.call(n,e,l.match);return l.match.def!==u}return!1}function l(e,t,i){var n=this;void 0===i&&(i=!0);for(var r=e+1;""!==a.getTest.call(n,r).match.def&&(!0===t&&(!0!==a.getTest.call(n,r).match.newBlockMarker||!s.call(n,r,void 0,!0))||!0!==t&&!s.call(n,r,void 0,i));)r++;return r}function u(e){var t=this.opts,i=this.el;return!this.isRTL||"number"!=typeof e||t.greedy&&""===t.placeholder||!i||(e=this._valueGet().length-e)<0&&(e=0),e}},4713:function(e,t,i){Object.defineProperty(t,"__esModule",{value:!0}),t.determineTestTemplate=u,t.getDecisionTaker=o,t.getMaskTemplate=function(e,t,i,a,n){var r=this,o=this.opts,c=this.maskset,f=o.greedy;n&&o.greedy&&(o.greedy=!1,r.maskset.tests={});t=t||0;var p,h,v,m,g=[],k=0;do{if(!0===e&&c.validPositions[k])v=n&&c.validPositions[k].match.optionality&&void 0===c.validPositions[k+1]&&(!0===c.validPositions[k].generatedInput||c.validPositions[k].input==o.skipOptionalPartCharacter&&k>0)?u.call(r,k,d.call(r,k,p,k-1)):c.validPositions[k],h=v.match,p=v.locator.slice(),g.push(!0===i?v.input:!1===i?h.nativeDef:s.call(r,k,h));else{v=l.call(r,k,p,k-1),h=v.match,p=v.locator.slice();var y=!0!==a&&(!1!==o.jitMasking?o.jitMasking:h.jit);(m=(m&&h.static&&h.def!==o.groupSeparator&&null===h.fn||c.validPositions[k-1]&&h.static&&h.def!==o.groupSeparator&&null===h.fn)&&c.tests[k]&&1===c.tests[k].length)||!1===y||void 0===y||"number"==typeof y&&isFinite(y)&&y>k?g.push(!1===i?h.nativeDef:s.call(r,k,h)):m=!1}k++}while(!0!==h.static||""!==h.def||t>k);""===g[g.length-1]&&g.pop();!1===i&&void 0!==c.maskLength||(c.maskLength=k-1);return o.greedy=f,g},t.getPlaceholder=s,t.getTest=c,t.getTestTemplate=l,t.getTests=d,t.isSubsetOf=f;var a,n=(a=i(2394))&&a.__esModule?a:{default:a};function r(e,t){var i=(null!=e.alternation?e.mloc[o(e)]:e.locator).join("");if(""!==i)for(;i.length<t;)i+="0";return i}function o(e){var t=e.locator[e.alternation];return"string"==typeof t&&t.length>0&&(t=t.split(",")[0]),void 0!==t?t.toString():""}function s(e,t,i){var a=this.opts,n=this.maskset;if(void 0!==(t=t||c.call(this,e).match).placeholder||!0===i)return"function"==typeof t.placeholder?t.placeholder(a):t.placeholder;if(!0===t.static){if(e>-1&&void 0===n.validPositions[e]){var r,o=d.call(this,e),s=[];if(o.length>1+(""===o[o.length-1].match.def?1:0))for(var l=0;l<o.length;l++)if(""!==o[l].match.def&&!0!==o[l].match.optionality&&!0!==o[l].match.optionalQuantifier&&(!0===o[l].match.static||void 0===r||!1!==o[l].match.fn.test(r.match.def,n,e,!0,a))&&(s.push(o[l]),!0===o[l].match.static&&(r=o[l]),s.length>1&&/[0-9a-bA-Z]/.test(s[0].match.def)))return a.placeholder.charAt(e%a.placeholder.length)}return t.def}return a.placeholder.charAt(e%a.placeholder.length)}function l(e,t,i){return this.maskset.validPositions[e]||u.call(this,e,d.call(this,e,t?t.slice():t,i))}function u(e,t){var i=this.opts,a=function(e,t){var i=0,a=!1;t.forEach((function(e){e.match.optionality&&(0!==i&&i!==e.match.optionality&&(a=!0),(0===i||i>e.match.optionality)&&(i=e.match.optionality))})),i&&(0==e||1==t.length?i=0:a||(i=0));return i}(e,t);e=e>0?e-1:0;var n,o,s,l=r(c.call(this,e));i.greedy&&t.length>1&&""===t[t.length-1].match.def&&t.pop();for(var u=0;u<t.length;u++){var f=t[u];n=r(f,l.length);var d=Math.abs(n-l);(void 0===o||""!==n&&d<o||s&&!i.greedy&&s.match.optionality&&s.match.optionality-a>0&&"master"===s.match.newBlockMarker&&(!f.match.optionality||f.match.optionality-a<1||!f.match.newBlockMarker)||s&&!i.greedy&&s.match.optionalQuantifier&&!f.match.optionalQuantifier)&&(o=d,s=f)}return s}function c(e,t){var i=this.maskset;return i.validPositions[e]?i.validPositions[e]:(t||d.call(this,e))[0]}function f(e,t,i){function a(e){for(var t,i=[],a=-1,n=0,r=e.length;n<r;n++)if("-"===e.charAt(n))for(t=e.charCodeAt(n+1);++a<t;)i.push(String.fromCharCode(a));else a=e.charCodeAt(n),i.push(e.charAt(n));return i.join("")}return e.match.def===t.match.nativeDef||!(!(i.regex||e.match.fn instanceof RegExp&&t.match.fn instanceof RegExp)||!0===e.match.static||!0===t.match.static)&&-1!==a(t.match.fn.toString().replace(/[[\]/]/g,"")).indexOf(a(e.match.fn.toString().replace(/[[\]/]/g,"")))}function d(e,t,i){var a,r,o=this,s=this.dependencyLib,l=this.maskset,c=this.opts,d=this.el,p=l.maskToken,h=t?i:0,v=t?t.slice():[0],m=[],g=!1,k=t?t.join(""):"";function y(t,i,r,o){function s(r,o,u){function p(e,t){var i=0===t.matches.indexOf(e);return i||t.matches.every((function(a,n){return!0===a.isQuantifier?i=p(e,t.matches[n-1]):Object.prototype.hasOwnProperty.call(a,"matches")&&(i=p(e,a)),!i})),i}function v(e,t,i){var a,n;if((l.tests[e]||l.validPositions[e])&&(l.tests[e]||[l.validPositions[e]]).every((function(e,r){if(e.mloc[t])return a=e,!1;var o=void 0!==i?i:e.alternation,s=void 0!==e.locator[o]?e.locator[o].toString().indexOf(t):-1;return(void 0===n||s<n)&&-1!==s&&(a=e,n=s),!0})),a){var r=a.locator[a.alternation];return(a.mloc[t]||a.mloc[r]||a.locator).slice((void 0!==i?i:a.alternation)+1)}return void 0!==i?v(e,t):void 0}function b(e,t){var i=e.alternation,a=void 0===t||i===t.alternation&&-1===e.locator[i].toString().indexOf(t.locator[i]);if(!a&&i>t.alternation)for(var n=t.alternation;n<i;n++)if(e.locator[n]!==t.locator[n]){i=n,a=!0;break}if(a){e.mloc=e.mloc||{};var r=e.locator[i];if(void 0!==r){if("string"==typeof r&&(r=r.split(",")[0]),void 0===e.mloc[r]&&(e.mloc[r]=e.locator.slice()),void 0!==t){for(var o in t.mloc)"string"==typeof o&&(o=o.split(",")[0]),void 0===e.mloc[o]&&(e.mloc[o]=t.mloc[o]);e.locator[i]=Object.keys(e.mloc).join(",")}return!0}e.alternation=void 0}return!1}function x(e,t){if(e.locator.length!==t.locator.length)return!1;for(var i=e.alternation+1;i<e.locator.length;i++)if(e.locator[i]!==t.locator[i])return!1;return!0}if(h>e+c._maxTestPos)throw"Inputmask: There is probably an error in your mask definition or in the code. Create an issue on github with an example of the mask you are using. "+l.mask;if(h===e&&void 0===r.matches){if(m.push({match:r,locator:o.reverse(),cd:k,mloc:{}}),!r.optionality||void 0!==u||!(c.definitions&&c.definitions[r.nativeDef]&&c.definitions[r.nativeDef].optional||n.default.prototype.definitions[r.nativeDef]&&n.default.prototype.definitions[r.nativeDef].optional))return!0;g=!0,h=e}else if(void 0!==r.matches){if(r.isGroup&&u!==r){if(r=s(t.matches[t.matches.indexOf(r)+1],o,u))return!0}else if(r.isOptional){var P=r,E=m.length;if(r=y(r,i,o,u)){if(m.forEach((function(e,t){t>=E&&(e.match.optionality=e.match.optionality?e.match.optionality+1:1)})),a=m[m.length-1].match,void 0!==u||!p(a,P))return!0;g=!0,h=e}}else if(r.isAlternator){var S,w=r,_=[],M=m.slice(),O=o.length,T=!1,A=i.length>0?i.shift():-1;if(-1===A||"string"==typeof A){var C,D=h,j=i.slice(),B=[];if("string"==typeof A)B=A.split(",");else for(C=0;C<w.matches.length;C++)B.push(C.toString());if(void 0!==l.excludes[e]){for(var R=B.slice(),L=0,I=l.excludes[e].length;L<I;L++){var F=l.excludes[e][L].toString().split(":");o.length==F[1]&&B.splice(B.indexOf(F[0]),1)}0===B.length&&(delete l.excludes[e],B=R)}(!0===c.keepStatic||isFinite(parseInt(c.keepStatic))&&D>=c.keepStatic)&&(B=B.slice(0,1));for(var N=0;N<B.length;N++){C=parseInt(B[N]),m=[],i="string"==typeof A&&v(h,C,O)||j.slice();var V=w.matches[C];if(V&&s(V,[C].concat(o),u))r=!0;else if(0===N&&(T=!0),V&&V.matches&&V.matches.length>w.matches[0].matches.length)break;S=m.slice(),h=D,m=[];for(var G=0;G<S.length;G++){var H=S[G],K=!1;H.match.jit=H.match.jit||T,H.alternation=H.alternation||O,b(H);for(var U=0;U<_.length;U++){var $=_[U];if("string"!=typeof A||void 0!==H.alternation&&B.includes(H.locator[H.alternation].toString())){if(H.match.nativeDef===$.match.nativeDef){K=!0,b($,H);break}if(f(H,$,c)){b(H,$)&&(K=!0,_.splice(_.indexOf($),0,H));break}if(f($,H,c)){b($,H);break}if(Z=$,!0===(W=H).match.static&&!0!==Z.match.static&&Z.match.fn.test(W.match.def,l,e,!1,c,!1)){x(H,$)||void 0!==d.inputmask.userOptions.keepStatic?b(H,$)&&(K=!0,_.splice(_.indexOf($),0,H)):c.keepStatic=!0;break}}}K||_.push(H)}}m=M.concat(_),h=e,g=m.length>0,r=_.length>0,i=j.slice()}else r=s(w.matches[A]||t.matches[A],[A].concat(o),u);if(r)return!0}else if(r.isQuantifier&&u!==t.matches[t.matches.indexOf(r)-1])for(var q=r,z=i.length>0?i.shift():0;z<(isNaN(q.quantifier.max)?z+1:q.quantifier.max)&&h<=e;z++){var Q=t.matches[t.matches.indexOf(q)-1];if(r=s(Q,[z].concat(o),Q)){if((a=m[m.length-1].match).optionalQuantifier=z>=q.quantifier.min,a.jit=(z+1)*(Q.matches.indexOf(a)+1)>q.quantifier.jit,a.optionalQuantifier&&p(a,Q)){g=!0,h=e;break}return a.jit&&(l.jitOffset[e]=Q.matches.length-Q.matches.indexOf(a)),!0}}else if(r=y(r,i,o,u))return!0}else h++;var W,Z}for(var u=i.length>0?i.shift():0;u<t.matches.length;u++)if(!0!==t.matches[u].isQuantifier){var p=s(t.matches[u],[u].concat(r),o);if(p&&h===e)return p;if(h>e)break}}if(e>-1){if(void 0===t){for(var b,x=e-1;void 0===(b=l.validPositions[x]||l.tests[x])&&x>-1;)x--;void 0!==b&&x>-1&&(v=function(e,t){var i,a=[];return Array.isArray(t)||(t=[t]),t.length>0&&(void 0===t[0].alternation||!0===c.keepStatic?0===(a=u.call(o,e,t.slice()).locator.slice()).length&&(a=t[0].locator.slice()):t.forEach((function(e){""!==e.def&&(0===a.length?(i=e.alternation,a=e.locator.slice()):e.locator[i]&&-1===a[i].toString().indexOf(e.locator[i])&&(a[i]+=","+e.locator[i]))}))),a}(x,b),k=v.join(""),h=x)}if(l.tests[e]&&l.tests[e][0].cd===k)return l.tests[e];for(var P=v.shift();P<p.length;P++){if(y(p[P],v,[P])&&h===e||h>e)break}}return(0===m.length||g)&&m.push({match:{fn:null,static:!0,optionality:!1,casing:null,def:"",placeholder:""},locator:[],mloc:{},cd:k}),void 0!==t&&l.tests[e]?r=s.extend(!0,[],m):(l.tests[e]=s.extend(!0,[],m),r=l.tests[e]),m.forEach((function(e){e.match.optionality=e.match.defOptionality||!1})),r}},7215:function(e,t,i){Object.defineProperty(t,"__esModule",{value:!0}),t.alternate=l,t.checkAlternationMatch=function(e,t,i){for(var a,n=this.opts.greedy?t:t.slice(0,1),r=!1,o=void 0!==i?i.split(","):[],s=0;s<o.length;s++)-1!==(a=e.indexOf(o[s]))&&e.splice(a,1);for(var l=0;l<e.length;l++)if(n.includes(e[l])){r=!0;break}return r},t.handleRemove=function(e,t,i,a,s){var u=this,c=this.maskset,f=this.opts;if((f.numericInput||u.isRTL)&&(t===r.default.BACKSPACE?t=r.default.DELETE:t===r.default.DELETE&&(t=r.default.BACKSPACE),u.isRTL)){var d=i.end;i.end=i.begin,i.begin=d}var p,h=o.getLastValidPosition.call(u,void 0,!0);i.end>=o.getBuffer.call(u).length&&h>=i.end&&(i.end=h+1);t===r.default.BACKSPACE?i.end-i.begin<1&&(i.begin=o.seekPrevious.call(u,i.begin)):t===r.default.DELETE&&i.begin===i.end&&(i.end=o.isMask.call(u,i.end,!0,!0)?i.end+1:o.seekNext.call(u,i.end)+1);if(!1!==(p=m.call(u,i))){if(!0!==a&&!1!==f.keepStatic||null!==f.regex&&-1!==n.getTest.call(u,i.begin).match.def.indexOf("|")){var v=l.call(u,!0);if(v){var g=void 0!==v.caret?v.caret:v.pos?o.seekNext.call(u,v.pos.begin?v.pos.begin:v.pos):o.getLastValidPosition.call(u,-1,!0);(t!==r.default.DELETE||i.begin>g)&&i.begin}}!0!==a&&(c.p=t===r.default.DELETE?i.begin+p:i.begin,c.p=o.determineNewCaretPosition.call(u,{begin:c.p,end:c.p},!1,!1===f.insertMode&&t===r.default.BACKSPACE?"none":void 0).begin)}},t.isComplete=c,t.isSelection=f,t.isValid=d,t.refreshFromBuffer=h,t.revalidateMask=m;var a,n=i(4713),r=(a=i(5581))&&a.__esModule?a:{default:a},o=i(8711),s=i(6030);function l(e,t,i,a,r,s){var u,c,f,p,h,v,m,g,k,y,b,x=this,P=this.dependencyLib,E=this.opts,S=x.maskset,w=P.extend(!0,{},S.validPositions),_=P.extend(!0,{},S.tests),M=!1,O=!1,T=void 0!==r?r:o.getLastValidPosition.call(x);if(s&&(y=s.begin,b=s.end,s.begin>s.end&&(y=s.end,b=s.begin)),-1===T&&void 0===r)u=0,c=(p=n.getTest.call(x,u)).alternation;else for(;T>=0;T--)if((f=S.validPositions[T])&&void 0!==f.alternation){if(p&&p.locator[f.alternation]!==f.locator[f.alternation])break;u=T,c=S.validPositions[u].alternation,p=f}if(void 0!==c){m=parseInt(u),S.excludes[m]=S.excludes[m]||[],!0!==e&&S.excludes[m].push((0,n.getDecisionTaker)(p)+":"+p.alternation);var A=[],C=-1;for(h=m;h<o.getLastValidPosition.call(x,void 0,!0)+1;h++)-1===C&&e<=h&&void 0!==t&&(A.push(t),C=A.length-1),(v=S.validPositions[h])&&!0!==v.generatedInput&&(void 0===s||h<y||h>=b)&&A.push(v.input),delete S.validPositions[h];for(-1===C&&void 0!==t&&(A.push(t),C=A.length-1);void 0!==S.excludes[m]&&S.excludes[m].length<10;){for(S.tests={},o.resetMaskSet.call(x,!0),M=!0,h=0;h<A.length&&(g=M.caret||o.getLastValidPosition.call(x,void 0,!0)+1,k=A[h],M=d.call(x,g,k,!1,a,!0));h++)h===C&&(O=M),1==e&&M&&(O={caretPos:h});if(M)break;if(o.resetMaskSet.call(x),p=n.getTest.call(x,m),S.validPositions=P.extend(!0,{},w),S.tests=P.extend(!0,{},_),!S.excludes[m]){O=l.call(x,e,t,i,a,m-1,s);break}var D=(0,n.getDecisionTaker)(p);if(-1!==S.excludes[m].indexOf(D+":"+p.alternation)){O=l.call(x,e,t,i,a,m-1,s);break}for(S.excludes[m].push(D+":"+p.alternation),h=m;h<o.getLastValidPosition.call(x,void 0,!0)+1;h++)delete S.validPositions[h]}}return O&&!1===E.keepStatic||delete S.excludes[m],O}function u(e,t,i){var a=this.opts,n=this.maskset;switch(a.casing||t.casing){case"upper":e=e.toUpperCase();break;case"lower":e=e.toLowerCase();break;case"title":var o=n.validPositions[i-1];e=0===i||o&&o.input===String.fromCharCode(r.default.SPACE)?e.toUpperCase():e.toLowerCase();break;default:if("function"==typeof a.casing){var s=Array.prototype.slice.call(arguments);s.push(n.validPositions),e=a.casing.apply(this,s)}}return e}function c(e){var t=this,i=this.opts,a=this.maskset;if("function"==typeof i.isComplete)return i.isComplete(e,i);if("*"!==i.repeat){var r=!1,s=o.determineLastRequiredPosition.call(t,!0),l=o.seekPrevious.call(t,s.l);if(void 0===s.def||s.def.newBlockMarker||s.def.optionality||s.def.optionalQuantifier){r=!0;for(var u=0;u<=l;u++){var c=n.getTestTemplate.call(t,u).match;if(!0!==c.static&&void 0===a.validPositions[u]&&!0!==c.optionality&&!0!==c.optionalQuantifier||!0===c.static&&e[u]!==n.getPlaceholder.call(t,u,c)){r=!1;break}}}return r}}function f(e){var t=this.opts.insertMode?0:1;return this.isRTL?e.begin-e.end>t:e.end-e.begin>t}function d(e,t,i,a,r,s,p){var g=this,k=this.dependencyLib,y=this.opts,b=g.maskset;i=!0===i;var x=e;function P(e){if(void 0!==e){if(void 0!==e.remove&&(Array.isArray(e.remove)||(e.remove=[e.remove]),e.remove.sort((function(e,t){return t.pos-e.pos})).forEach((function(e){m.call(g,{begin:e,end:e+1})})),e.remove=void 0),void 0!==e.insert&&(Array.isArray(e.insert)||(e.insert=[e.insert]),e.insert.sort((function(e,t){return e.pos-t.pos})).forEach((function(e){""!==e.c&&d.call(g,e.pos,e.c,void 0===e.strict||e.strict,void 0!==e.fromIsValid?e.fromIsValid:a)})),e.insert=void 0),e.refreshFromBuffer&&e.buffer){var t=e.refreshFromBuffer;h.call(g,!0===t?t:t.start,t.end,e.buffer),e.refreshFromBuffer=void 0}void 0!==e.rewritePosition&&(x=e.rewritePosition,e=!0)}return e}function E(t,i,r){var s=!1;return n.getTests.call(g,t).every((function(l,c){var d=l.match;if(o.getBuffer.call(g,!0),!1!==(s=(!d.jit||void 0!==b.validPositions[o.seekPrevious.call(g,t)])&&(null!=d.fn?d.fn.test(i,b,t,r,y,f.call(g,e)):(i===d.def||i===y.skipOptionalPartCharacter)&&""!==d.def&&{c:n.getPlaceholder.call(g,t,d,!0)||d.def,pos:t}))){var p=void 0!==s.c?s.c:i,h=t;return p=p===y.skipOptionalPartCharacter&&!0===d.static?n.getPlaceholder.call(g,t,d,!0)||d.def:p,!0!==(s=P(s))&&void 0!==s.pos&&s.pos!==t&&(h=s.pos),!0!==s&&void 0===s.pos&&void 0===s.c?!1:(!1===m.call(g,e,k.extend({},l,{input:u.call(g,p,d,h)}),a,h)&&(s=!1),!1)}return!0})),s}void 0!==e.begin&&(x=g.isRTL?e.end:e.begin);var S=!0,w=k.extend(!0,{},b.validPositions);if(!1===y.keepStatic&&void 0!==b.excludes[x]&&!0!==r&&!0!==a)for(var _=x;_<(g.isRTL?e.begin:e.end);_++)void 0!==b.excludes[_]&&(b.excludes[_]=void 0,delete b.tests[_]);if("function"==typeof y.preValidation&&!0!==a&&!0!==s&&(S=P(S=y.preValidation.call(g,o.getBuffer.call(g),x,t,f.call(g,e),y,b,e,i||r))),!0===S){if(S=E(x,t,i),(!i||!0===a)&&!1===S&&!0!==s){var M=b.validPositions[x];if(!M||!0!==M.match.static||M.match.def!==t&&t!==y.skipOptionalPartCharacter){if(y.insertMode||void 0===b.validPositions[o.seekNext.call(g,x)]||e.end>x){var O=!1;if(b.jitOffset[x]&&void 0===b.validPositions[o.seekNext.call(g,x)]&&!1!==(S=d.call(g,x+b.jitOffset[x],t,!0,!0))&&(!0!==r&&(S.caret=x),O=!0),e.end>x&&(b.validPositions[x]=void 0),!O&&!o.isMask.call(g,x,y.keepStatic&&0===x))for(var T=x+1,A=o.seekNext.call(g,x,!1,0!==x);T<=A;T++)if(!1!==(S=E(T,t,i))){S=v.call(g,x,void 0!==S.pos?S.pos:T)||S,x=T;break}}}else S={caret:o.seekNext.call(g,x)}}!1!==S||!y.keepStatic||!c.call(g,o.getBuffer.call(g))&&0!==x||i||!0===r?f.call(g,e)&&b.tests[x]&&b.tests[x].length>1&&y.keepStatic&&!i&&!0!==r&&(S=l.call(g,!0)):S=l.call(g,x,t,i,a,void 0,e),!0===S&&(S={pos:x})}if("function"==typeof y.postValidation&&!0!==a&&!0!==s){var C=y.postValidation.call(g,o.getBuffer.call(g,!0),void 0!==e.begin?g.isRTL?e.end:e.begin:e,t,S,y,b,i,p);void 0!==C&&(S=!0===C?S:C)}S&&void 0===S.pos&&(S.pos=x),!1===S||!0===s?(o.resetMaskSet.call(g,!0),b.validPositions=k.extend(!0,{},w)):v.call(g,void 0,x,!0);var D=P(S);void 0!==g.maxLength&&(o.getBuffer.call(g).length>g.maxLength&&!a&&(o.resetMaskSet.call(g,!0),b.validPositions=k.extend(!0,{},w),D=!1));return D}function p(e,t,i){for(var a=this.maskset,r=!1,o=n.getTests.call(this,e),s=0;s<o.length;s++){if(o[s].match&&(o[s].match.nativeDef===t.match[i.shiftPositions?"def":"nativeDef"]&&(!i.shiftPositions||!t.match.static)||o[s].match.nativeDef===t.match.nativeDef||i.regex&&!o[s].match.static&&o[s].match.fn.test(t.input))){r=!0;break}if(o[s].match&&o[s].match.def===t.match.nativeDef){r=void 0;break}}return!1===r&&void 0!==a.jitOffset[e]&&(r=p.call(this,e+a.jitOffset[e],t,i)),r}function h(e,t,i){var a,n,r=this,l=this.maskset,u=this.opts,c=this.dependencyLib,f=u.skipOptionalPartCharacter,d=r.isRTL?i.slice().reverse():i;if(u.skipOptionalPartCharacter="",!0===e)o.resetMaskSet.call(r),l.tests={},e=0,t=i.length,n=o.determineNewCaretPosition.call(r,{begin:0,end:0},!1).begin;else{for(a=e;a<t;a++)delete l.validPositions[a];n=e}var p=new c.Event("keypress");for(a=e;a<t;a++){p.keyCode=d[a].toString().charCodeAt(0),r.ignorable=!1;var h=s.EventHandlers.keypressEvent.call(r,p,!0,!1,!1,n);!1!==h&&void 0!==h&&(n=h.forwardPosition)}u.skipOptionalPartCharacter=f}function v(e,t,i){var a=this,r=this.maskset,s=this.dependencyLib;if(void 0===e)for(e=t-1;e>0&&!r.validPositions[e];e--);for(var l=e;l<t;l++){if(void 0===r.validPositions[l]&&!o.isMask.call(a,l,!1))if(0==l?n.getTest.call(a,l):r.validPositions[l-1]){var u=n.getTests.call(a,l).slice();""===u[u.length-1].match.def&&u.pop();var c,f=n.determineTestTemplate.call(a,l,u);if(f&&(!0!==f.match.jit||"master"===f.match.newBlockMarker&&(c=r.validPositions[l+1])&&!0===c.match.optionalQuantifier)&&((f=s.extend({},f,{input:n.getPlaceholder.call(a,l,f.match,!0)||f.match.def})).generatedInput=!0,m.call(a,l,f,!0),!0!==i)){var p=r.validPositions[t].input;return r.validPositions[t]=void 0,d.call(a,t,p,!0,!0)}}}}function m(e,t,i,a){var r=this,s=this.maskset,l=this.opts,u=this.dependencyLib;function c(e,t,i){var a=t[e];if(void 0!==a&&!0===a.match.static&&!0!==a.match.optionality&&(void 0===t[0]||void 0===t[0].alternation)){var n=i.begin<=e-1?t[e-1]&&!0===t[e-1].match.static&&t[e-1]:t[e-1],r=i.end>e+1?t[e+1]&&!0===t[e+1].match.static&&t[e+1]:t[e+1];return n&&r}return!1}var f=0,h=void 0!==e.begin?e.begin:e,v=void 0!==e.end?e.end:e,m=!0;if(e.begin>e.end&&(h=e.end,v=e.begin),a=void 0!==a?a:h,void 0===i&&(h!==v||l.insertMode&&void 0!==s.validPositions[a]||void 0===t||t.match.optionalQuantifier||t.match.optionality)){var g,k=u.extend(!0,{},s.validPositions),y=o.getLastValidPosition.call(r,void 0,!0);for(s.p=h,g=y;g>=h;g--)delete s.validPositions[g],void 0===t&&delete s.tests[g+1];var b,x,P=a,E=P;for(t&&(s.validPositions[a]=u.extend(!0,{},t),E++,P++),g=t?v:v-1;g<=y;g++){if(void 0!==(b=k[g])&&!0!==b.generatedInput&&(g>=v||g>=h&&c(g,k,{begin:h,end:v}))){for(;""!==n.getTest.call(r,E).match.def;){if(!1!==(x=p.call(r,E,b,l))||"+"===b.match.def){"+"===b.match.def&&o.getBuffer.call(r,!0);var S=d.call(r,E,b.input,"+"!==b.match.def,!0);if(m=!1!==S,P=(S.pos||E)+1,!m&&x)break}else m=!1;if(m){void 0===t&&b.match.static&&g===e.begin&&f++;break}if(!m&&o.getBuffer.call(r),E>s.maskLength)break;E++}""==n.getTest.call(r,E).match.def&&(m=!1),E=P}if(!m)break}if(!m)return s.validPositions=u.extend(!0,{},k),o.resetMaskSet.call(r,!0),!1}else t&&n.getTest.call(r,a).match.cd===t.match.cd&&(s.validPositions[a]=u.extend(!0,{},t));return o.resetMaskSet.call(r,!0),f}},2047:function(t){t.exports=e},5581:function(e){e.exports=JSON.parse('{"BACKSPACE":8,"BACKSPACE_SAFARI":127,"DELETE":46,"DOWN":40,"END":35,"ENTER":13,"ESCAPE":27,"HOME":36,"INSERT":45,"LEFT":37,"PAGE_DOWN":34,"PAGE_UP":33,"RIGHT":39,"SPACE":32,"TAB":9,"UP":38,"X":88,"Z":90,"CONTROL":17,"PAUSE/BREAK":19,"WINDOWS_LEFT":91,"WINDOWS_RIGHT":92,"KEY_229":229}')}},i={};function a(e){var n=i[e];if(void 0!==n)return n.exports;var r=i[e]={exports:{}};return t[e](r,r.exports,a),r.exports}var n={};return function(){var e=n;Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var t,i=(t=a(3046))&&t.__esModule?t:{default:t};a(443);var r=i.default;e.default=r}(),n}()}));
;
/*
    jQuery Masked Input Plugin
    Copyright (c) 2007 - 2015 Josh Bush (digitalbush.com)
    Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license)
    Version: 1.4.1
*/
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){var b,c=navigator.userAgent,d=/iphone/i.test(c),e=/chrome/i.test(c),f=/android/i.test(c);a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},autoclear:!0,dataName:"rawMaskFn",placeholder:"_"},a.fn.extend({caret:function(a,b){var c;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof a?(b="number"==typeof b?b:a,this.each(function(){this.setSelectionRange?this.setSelectionRange(a,b):this.createTextRange&&(c=this.createTextRange(),c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select())})):(this[0].setSelectionRange?(a=this[0].selectionStart,b=this[0].selectionEnd):document.selection&&document.selection.createRange&&(c=document.selection.createRange(),a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length),{begin:a,end:b})},unmask:function(){return this.trigger("unmask")},mask:function(c,g){var h,i,j,k,l,m,n,o;if(!c&&this.length>0){h=a(this[0]);var p=h.data(a.mask.dataName);return p?p():void 0}return g=a.extend({autoclear:a.mask.autoclear,placeholder:a.mask.placeholder,completed:null},g),i=a.mask.definitions,j=[],k=n=c.length,l=null,a.each(c.split(""),function(a,b){"?"==b?(n--,k=a):i[b]?(j.push(new RegExp(i[b])),null===l&&(l=j.length-1),k>a&&(m=j.length-1)):j.push(null)}),this.trigger("unmask").each(function(){function h(){if(g.completed){for(var a=l;m>=a;a++)if(j[a]&&C[a]===p(a))return;g.completed.call(B)}}function p(a){return g.placeholder.charAt(a<g.placeholder.length?a:0)}function q(a){for(;++a<n&&!j[a];);return a}function r(a){for(;--a>=0&&!j[a];);return a}function s(a,b){var c,d;if(!(0>a)){for(c=a,d=q(b);n>c;c++)if(j[c]){if(!(n>d&&j[c].test(C[d])))break;C[c]=C[d],C[d]=p(d),d=q(d)}z(),B.caret(Math.max(l,a))}}function t(a){var b,c,d,e;for(b=a,c=p(a);n>b;b++)if(j[b]){if(d=q(b),e=C[b],C[b]=c,!(n>d&&j[d].test(e)))break;c=e}}function u(){var a=B.val(),b=B.caret();if(o&&o.length&&o.length>a.length){for(A(!0);b.begin>0&&!j[b.begin-1];)b.begin--;if(0===b.begin)for(;b.begin<l&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}else{for(A(!0);b.begin<n&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}h()}function v(){A(),B.val()!=E&&B.change()}function w(a){if(!B.prop("readonly")){var b,c,e,f=a.which||a.keyCode;o=B.val(),8===f||46===f||d&&127===f?(b=B.caret(),c=b.begin,e=b.end,e-c===0&&(c=46!==f?r(c):e=q(c-1),e=46===f?q(e):e),y(c,e),s(c,e-1),a.preventDefault()):13===f?v.call(this,a):27===f&&(B.val(E),B.caret(0,A()),a.preventDefault())}}function x(b){if(!B.prop("readonly")){var c,d,e,g=b.which||b.keyCode,i=B.caret();if(!(b.ctrlKey||b.altKey||b.metaKey||32>g)&&g&&13!==g){if(i.end-i.begin!==0&&(y(i.begin,i.end),s(i.begin,i.end-1)),c=q(i.begin-1),n>c&&(d=String.fromCharCode(g),j[c].test(d))){if(t(c),C[c]=d,z(),e=q(c),f){var k=function(){a.proxy(a.fn.caret,B,e)()};setTimeout(k,0)}else B.caret(e);i.begin<=m&&h()}b.preventDefault()}}}function y(a,b){var c;for(c=a;b>c&&n>c;c++)j[c]&&(C[c]=p(c))}function z(){B.val(C.join(""))}function A(a){var b,c,d,e=B.val(),f=-1;for(b=0,d=0;n>b;b++)if(j[b]){for(C[b]=p(b);d++<e.length;)if(c=e.charAt(d-1),j[b].test(c)){C[b]=c,f=b;break}if(d>e.length){y(b+1,n);break}}else C[b]===e.charAt(d)&&d++,k>b&&(f=b);return a?z():k>f+1?g.autoclear||C.join("")===D?(B.val()&&B.val(""),y(0,n)):z():(z(),B.val(B.val().substring(0,f+1))),k?b:l}var B=a(this),C=a.map(c.split(""),function(a,b){return"?"!=a?i[a]?p(b):a:void 0}),D=C.join(""),E=B.val();B.data(a.mask.dataName,function(){return a.map(C,function(a,b){return j[b]&&a!=p(b)?a:null}).join("")}),B.one("unmask",function(){B.off(".mask").removeData(a.mask.dataName)}).on("focus.mask",function(){if(!B.prop("readonly")){clearTimeout(b);var a;E=B.val(),a=A(),b=setTimeout(function(){B.get(0)===document.activeElement&&(z(),a==c.replace("?","").length?B.caret(0,a):B.caret(a))},10)}}).on("blur.mask",v).on("keydown.mask",w).on("keypress.mask",x).on("input.mask paste.mask",function(){B.prop("readonly")||setTimeout(function(){var a=A(!0);B.caret(a),h()},0)}),e&&f&&B.off("input.mask").on("input.mask",u),A()})}})});
;
/**
*  Ajax Autocomplete for jQuery, version 1.4.11
*  (c) 2017 Tomas Kirda
*
*  Ajax Autocomplete for jQuery is freely distributable under the terms of an MIT-style license.
*  For details, see the web site: https://github.com/devbridge/jQuery-Autocomplete
*/
!function(t){"use strict";"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof exports&&"function"==typeof require?t(require("jquery")):t(jQuery)}(function(t){"use strict";var e={escapeRegExChars:function(t){return t.replace(/[|\\{}()[\]^$+*?.]/g,"\\$&")},createNode:function(t){var e=document.createElement("div");return e.className=t,e.style.position="absolute",e.style.display="none",e}},s=27,i=9,n=13,o=38,a=39,u=40,l=t.noop;function r(e,s){this.element=e,this.el=t(e),this.suggestions=[],this.badQueries=[],this.selectedIndex=-1,this.currentValue=this.element.value,this.timeoutId=null,this.cachedResponse={},this.onChangeTimeout=null,this.onChange=null,this.isLocal=!1,this.suggestionsContainer=null,this.noSuggestionsContainer=null,this.options=t.extend(!0,{},r.defaults,s),this.classes={selected:"autocomplete-selected",suggestion:"autocomplete-suggestion"},this.hint=null,this.hintValue="",this.selection=null,this.initialize(),this.setOptions(s)}r.utils=e,t.Autocomplete=r,r.defaults={ajaxSettings:{},autoSelectFirst:!1,appendTo:"body",serviceUrl:null,lookup:null,onSelect:null,onHint:null,width:"auto",minChars:1,maxHeight:300,deferRequestBy:0,params:{},formatResult:function(t,s){if(!s)return t.value;var i="("+e.escapeRegExChars(s)+")";return t.value.replace(new RegExp(i,"gi"),"<strong>$1</strong>").replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/&lt;(\/?strong)&gt;/g,"<$1>")},formatGroup:function(t,e){return'<div class="autocomplete-group">'+e+"</div>"},delimiter:null,zIndex:9999,type:"GET",noCache:!1,onSearchStart:l,onSearchComplete:l,onSearchError:l,preserveInput:!1,containerClass:"autocomplete-suggestions",tabDisabled:!1,dataType:"text",currentRequest:null,triggerSelectOnValidInput:!0,preventBadQueries:!0,lookupFilter:function(t,e,s){return-1!==t.value.toLowerCase().indexOf(s)},paramName:"query",transformResult:function(e){return"string"==typeof e?t.parseJSON(e):e},showNoSuggestionNotice:!1,noSuggestionNotice:"No results",orientation:"bottom",forceFixPosition:!1},r.prototype={initialize:function(){var e,s=this,i="."+s.classes.suggestion,n=s.classes.selected,o=s.options;s.element.setAttribute("autocomplete","off"),s.noSuggestionsContainer=t('<div class="autocomplete-no-suggestion"></div>').html(this.options.noSuggestionNotice).get(0),s.suggestionsContainer=r.utils.createNode(o.containerClass),(e=t(s.suggestionsContainer)).appendTo(o.appendTo||"body"),"auto"!==o.width&&e.css("width",o.width),e.on("mouseover.autocomplete",i,function(){s.activate(t(this).data("index"))}),e.on("mouseout.autocomplete",function(){s.selectedIndex=-1,e.children("."+n).removeClass(n)}),e.on("click.autocomplete",i,function(){s.select(t(this).data("index"))}),e.on("click.autocomplete",function(){clearTimeout(s.blurTimeoutId)}),s.fixPositionCapture=function(){s.visible&&s.fixPosition()},t(window).on("resize.autocomplete",s.fixPositionCapture),s.el.on("keydown.autocomplete",function(t){s.onKeyPress(t)}),s.el.on("keyup.autocomplete",function(t){s.onKeyUp(t)}),s.el.on("blur.autocomplete",function(){s.onBlur()}),s.el.on("focus.autocomplete",function(){s.onFocus()}),s.el.on("change.autocomplete",function(t){s.onKeyUp(t)}),s.el.on("input.autocomplete",function(t){s.onKeyUp(t)})},onFocus:function(){this.disabled||(this.fixPosition(),this.el.val().length>=this.options.minChars&&this.onValueChange())},onBlur:function(){var e=this,s=e.options,i=e.el.val(),n=e.getQuery(i);e.blurTimeoutId=setTimeout(function(){e.hide(),e.selection&&e.currentValue!==n&&(s.onInvalidateSelection||t.noop).call(e.element)},200)},abortAjax:function(){this.currentRequest&&(this.currentRequest.abort(),this.currentRequest=null)},setOptions:function(e){var s=t.extend({},this.options,e);this.isLocal=Array.isArray(s.lookup),this.isLocal&&(s.lookup=this.verifySuggestionsFormat(s.lookup)),s.orientation=this.validateOrientation(s.orientation,"bottom"),t(this.suggestionsContainer).css({"max-height":s.maxHeight+"px",width:s.width+"px","z-index":s.zIndex}),this.options=s},clearCache:function(){this.cachedResponse={},this.badQueries=[]},clear:function(){this.clearCache(),this.currentValue="",this.suggestions=[]},disable:function(){this.disabled=!0,clearTimeout(this.onChangeTimeout),this.abortAjax()},enable:function(){this.disabled=!1},fixPosition:function(){var e=t(this.suggestionsContainer),s=e.parent().get(0);if(s===document.body||this.options.forceFixPosition){var i=this.options.orientation,n=e.outerHeight(),o=this.el.outerHeight(),a=this.el.offset(),u={top:a.top,left:a.left};if("auto"===i){var l=t(window).height(),r=t(window).scrollTop(),h=-r+a.top-n,c=r+l-(a.top+o+n);i=Math.max(h,c)===h?"top":"bottom"}if(u.top+="top"===i?-n:o,s!==document.body){var g,d=e.css("opacity");this.visible||e.css("opacity",0).show(),g=e.offsetParent().offset(),u.top-=g.top,u.top+=s.scrollTop,u.left-=g.left,this.visible||e.css("opacity",d).hide()}"auto"===this.options.width&&(u.width=this.el.outerWidth()+"px"),e.css(u)}},isCursorAtEnd:function(){var t,e=this.el.val().length,s=this.element.selectionStart;return"number"==typeof s?s===e:!document.selection||((t=document.selection.createRange()).moveStart("character",-e),e===t.text.length)},onKeyPress:function(t){if(this.disabled||this.visible||t.which!==u||!this.currentValue){if(!this.disabled&&this.visible){switch(t.which){case s:this.el.val(this.currentValue),this.hide();break;case a:if(this.hint&&this.options.onHint&&this.isCursorAtEnd()){this.selectHint();break}return;case i:if(this.hint&&this.options.onHint)return void this.selectHint();if(-1===this.selectedIndex)return void this.hide();if(this.select(this.selectedIndex),!1===this.options.tabDisabled)return;break;case n:if(-1===this.selectedIndex)return void this.hide();this.select(this.selectedIndex);break;case o:this.moveUp();break;case u:this.moveDown();break;default:return}t.stopImmediatePropagation(),t.preventDefault()}}else this.suggest()},onKeyUp:function(t){var e=this;if(!e.disabled){switch(t.which){case o:case u:return}clearTimeout(e.onChangeTimeout),e.currentValue!==e.el.val()&&(e.findBestHint(),e.options.deferRequestBy>0?e.onChangeTimeout=setTimeout(function(){e.onValueChange()},e.options.deferRequestBy):e.onValueChange())}},onValueChange:function(){if(this.ignoreValueChange)this.ignoreValueChange=!1;else{var e=this.options,s=this.el.val(),i=this.getQuery(s);this.selection&&this.currentValue!==i&&(this.selection=null,(e.onInvalidateSelection||t.noop).call(this.element)),clearTimeout(this.onChangeTimeout),this.currentValue=s,this.selectedIndex=-1,e.triggerSelectOnValidInput&&this.isExactMatch(i)?this.select(0):i.length<e.minChars?this.hide():this.getSuggestions(i)}},isExactMatch:function(t){var e=this.suggestions;return 1===e.length&&e[0].value.toLowerCase()===t.toLowerCase()},getQuery:function(e){var s,i=this.options.delimiter;return i?(s=e.split(i),t.trim(s[s.length-1])):e},getSuggestionsLocal:function(e){var s,i=this.options,n=e.toLowerCase(),o=i.lookupFilter,a=parseInt(i.lookupLimit,10);return s={suggestions:t.grep(i.lookup,function(t){return o(t,e,n)})},a&&s.suggestions.length>a&&(s.suggestions=s.suggestions.slice(0,a)),s},getSuggestions:function(e){var s,i,n,o,a=this,u=a.options,l=u.serviceUrl;u.params[u.paramName]=e,!1!==u.onSearchStart.call(a.element,u.params)&&(i=u.ignoreParams?null:u.params,t.isFunction(u.lookup)?u.lookup(e,function(t){a.suggestions=t.suggestions,a.suggest(),u.onSearchComplete.call(a.element,e,t.suggestions)}):(a.isLocal?s=a.getSuggestionsLocal(e):(t.isFunction(l)&&(l=l.call(a.element,e)),n=l+"?"+t.param(i||{}),s=a.cachedResponse[n]),s&&Array.isArray(s.suggestions)?(a.suggestions=s.suggestions,a.suggest(),u.onSearchComplete.call(a.element,e,s.suggestions)):a.isBadQuery(e)?u.onSearchComplete.call(a.element,e,[]):(a.abortAjax(),o={url:l,data:i,type:u.type,dataType:u.dataType},t.extend(o,u.ajaxSettings),a.currentRequest=t.ajax(o).done(function(t){var s;a.currentRequest=null,s=u.transformResult(t,e),a.processResponse(s,e,n),u.onSearchComplete.call(a.element,e,s.suggestions)}).fail(function(t,s,i){u.onSearchError.call(a.element,e,t,s,i)}))))},isBadQuery:function(t){if(!this.options.preventBadQueries)return!1;for(var e=this.badQueries,s=e.length;s--;)if(0===t.indexOf(e[s]))return!0;return!1},hide:function(){var e=t(this.suggestionsContainer);t.isFunction(this.options.onHide)&&this.visible&&this.options.onHide.call(this.element,e),this.visible=!1,this.selectedIndex=-1,clearTimeout(this.onChangeTimeout),t(this.suggestionsContainer).hide(),this.onHint(null)},suggest:function(){if(this.suggestions.length){var e,s=this.options,i=s.groupBy,n=s.formatResult,o=this.getQuery(this.currentValue),a=this.classes.suggestion,u=this.classes.selected,l=t(this.suggestionsContainer),r=t(this.noSuggestionsContainer),h=s.beforeRender,c="";s.triggerSelectOnValidInput&&this.isExactMatch(o)?this.select(0):(t.each(this.suggestions,function(t,u){i&&(c+=function(t,n){var o=t.data[i];return e===o?"":(e=o,s.formatGroup(t,e))}(u,0)),c+='<div class="'+a+'" data-index="'+t+'">'+n(u,o,t)+"</div>"}),this.adjustContainerWidth(),r.detach(),l.html(c),t.isFunction(h)&&h.call(this.element,l,this.suggestions),this.fixPosition(),l.show(),s.autoSelectFirst&&(this.selectedIndex=0,l.scrollTop(0),l.children("."+a).first().addClass(u)),this.visible=!0,this.findBestHint())}else this.options.showNoSuggestionNotice?this.noSuggestions():this.hide()},noSuggestions:function(){var e=this.options.beforeRender,s=t(this.suggestionsContainer),i=t(this.noSuggestionsContainer);this.adjustContainerWidth(),i.detach(),s.empty(),s.append(i),t.isFunction(e)&&e.call(this.element,s,this.suggestions),this.fixPosition(),s.show(),this.visible=!0},adjustContainerWidth:function(){var e,s=this.options,i=t(this.suggestionsContainer);"auto"===s.width?(e=this.el.outerWidth(),i.css("width",e>0?e:300)):"flex"===s.width&&i.css("width","")},findBestHint:function(){var e=this.el.val().toLowerCase(),s=null;e&&(t.each(this.suggestions,function(t,i){var n=0===i.value.toLowerCase().indexOf(e);return n&&(s=i),!n}),this.onHint(s))},onHint:function(e){var s=this.options.onHint,i="";e&&(i=this.currentValue+e.value.substr(this.currentValue.length)),this.hintValue!==i&&(this.hintValue=i,this.hint=e,t.isFunction(s)&&s.call(this.element,i))},verifySuggestionsFormat:function(e){return e.length&&"string"==typeof e[0]?t.map(e,function(t){return{value:t,data:null}}):e},validateOrientation:function(e,s){return e=t.trim(e||"").toLowerCase(),-1===t.inArray(e,["auto","bottom","top"])&&(e=s),e},processResponse:function(t,e,s){var i=this.options;t.suggestions=this.verifySuggestionsFormat(t.suggestions),i.noCache||(this.cachedResponse[s]=t,i.preventBadQueries&&!t.suggestions.length&&this.badQueries.push(e)),e===this.getQuery(this.currentValue)&&(this.suggestions=t.suggestions,this.suggest())},activate:function(e){var s,i=this.classes.selected,n=t(this.suggestionsContainer),o=n.find("."+this.classes.suggestion);return n.find("."+i).removeClass(i),this.selectedIndex=e,-1!==this.selectedIndex&&o.length>this.selectedIndex?(s=o.get(this.selectedIndex),t(s).addClass(i),s):null},selectHint:function(){var e=t.inArray(this.hint,this.suggestions);this.select(e)},select:function(t){this.hide(),this.onSelect(t)},moveUp:function(){if(-1!==this.selectedIndex)return 0===this.selectedIndex?(t(this.suggestionsContainer).children("."+this.classes.suggestion).first().removeClass(this.classes.selected),this.selectedIndex=-1,this.ignoreValueChange=!1,this.el.val(this.currentValue),void this.findBestHint()):void this.adjustScroll(this.selectedIndex-1)},moveDown:function(){this.selectedIndex!==this.suggestions.length-1&&this.adjustScroll(this.selectedIndex+1)},adjustScroll:function(e){var s=this.activate(e);if(s){var i,n,o,a=t(s).outerHeight();i=s.offsetTop,o=(n=t(this.suggestionsContainer).scrollTop())+this.options.maxHeight-a,i<n?t(this.suggestionsContainer).scrollTop(i):i>o&&t(this.suggestionsContainer).scrollTop(i-this.options.maxHeight+a),this.options.preserveInput||(this.ignoreValueChange=!0,this.el.val(this.getValue(this.suggestions[e].value))),this.onHint(null)}},onSelect:function(e){var s=this.options.onSelect,i=this.suggestions[e];this.currentValue=this.getValue(i.value),this.currentValue===this.el.val()||this.options.preserveInput||this.el.val(this.currentValue),this.onHint(null),this.suggestions=[],this.selection=i,t.isFunction(s)&&s.call(this.element,i)},getValue:function(t){var e,s,i=this.options.delimiter;return i?1===(s=(e=this.currentValue).split(i)).length?t:e.substr(0,e.length-s[s.length-1].length)+t:t},dispose:function(){this.el.off(".autocomplete").removeData("autocomplete"),t(window).off("resize.autocomplete",this.fixPositionCapture),t(this.suggestionsContainer).remove()}},t.fn.devbridgeAutocomplete=function(e,s){return arguments.length?this.each(function(){var i=t(this),n=i.data("autocomplete");"string"==typeof e?n&&"function"==typeof n[e]&&n[e](s):(n&&n.dispose&&n.dispose(),n=new r(this,e),i.data("autocomplete",n))}):this.first().data("autocomplete")},t.fn.autocomplete||(t.fn.autocomplete=t.fn.devbridgeAutocomplete)});

;
// ==================================================
// fancyBox v3.5.7
//
// Licensed GPLv3 for open source use
// or fancyBox Commercial License for commercial use
//
// http://fancyapps.com/fancybox/
// Copyright 2019 fancyApps
//
// ==================================================
!function(t,e,n,o){"use strict";function i(t,e){var o,i,a,s=[],r=0;t&&t.isDefaultPrevented()||(t.preventDefault(),e=e||{},t&&t.data&&(e=h(t.data.options,e)),o=e.$target||n(t.currentTarget).trigger("blur"),(a=n.fancybox.getInstance())&&a.$trigger&&a.$trigger.is(o)||(e.selector?s=n(e.selector):(i=o.attr("data-fancybox")||"",i?(s=t.data?t.data.items:[],s=s.length?s.filter('[data-fancybox="'+i+'"]'):n('[data-fancybox="'+i+'"]')):s=[o]),r=n(s).index(o),r<0&&(r=0),a=n.fancybox.open(s,e,r),a.$trigger=o))}if(t.console=t.console||{info:function(t){}},n){if(n.fn.fancybox)return void console.info("fancyBox already initialized");var a={closeExisting:!1,loop:!1,gutter:50,keyboard:!0,preventCaptionOverlap:!0,arrows:!0,infobar:!0,smallBtn:"auto",toolbar:"auto",buttons:["zoom","slideShow","thumbs","close"],idleTime:3,protect:!1,modal:!1,image:{preload:!1},ajax:{settings:{data:{fancybox:!0}}},iframe:{tpl:'<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" allowfullscreen="allowfullscreen" allow="autoplay; fullscreen" src=""></iframe>',preload:!0,css:{},attr:{scrolling:"auto"}},video:{tpl:'<video class="fancybox-video" controls controlsList="nodownload" poster="{{poster}}"><source src="{{src}}" type="{{format}}" />Sorry, your browser doesn\'t support embedded videos, <a href="{{src}}">download</a> and watch with your favorite video player!</video>',format:"",autoStart:!0},defaultType:"image",animationEffect:"zoom",animationDuration:366,zoomOpacity:"auto",transitionEffect:"fade",transitionDuration:366,slideClass:"",baseClass:"",baseTpl:'<div class="fancybox-container" role="dialog" tabindex="-1"><div class="fancybox-bg"></div><div class="fancybox-inner"><div class="fancybox-infobar"><span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span></div><div class="fancybox-toolbar">{{buttons}}</div><div class="fancybox-navigation">{{arrows}}</div><div class="fancybox-stage"></div><div class="fancybox-caption"><div class="fancybox-caption__body"></div></div></div></div>',spinnerTpl:'<div class="fancybox-loading"></div>',errorTpl:'<div class="fancybox-error"><p>{{ERROR}}</p></div>',btnTpl:{download:'<a download data-fancybox-download class="fancybox-button fancybox-button--download" title="{{DOWNLOAD}}" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.62 17.09V19H5.38v-1.91zm-2.97-6.96L17 11.45l-5 4.87-5-4.87 1.36-1.32 2.68 2.64V5h1.92v7.77z"/></svg></a>',zoom:'<button data-fancybox-zoom class="fancybox-button fancybox-button--zoom" title="{{ZOOM}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.7 17.3l-3-3a5.9 5.9 0 0 0-.6-7.6 5.9 5.9 0 0 0-8.4 0 5.9 5.9 0 0 0 0 8.4 5.9 5.9 0 0 0 7.7.7l3 3a1 1 0 0 0 1.3 0c.4-.5.4-1 0-1.5zM8.1 13.8a4 4 0 0 1 0-5.7 4 4 0 0 1 5.7 0 4 4 0 0 1 0 5.7 4 4 0 0 1-5.7 0z"/></svg></button>',close:'<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"/></svg></button>',arrowLeft:'<button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.28 15.7l-1.34 1.37L5 12l4.94-5.07 1.34 1.38-2.68 2.72H19v1.94H8.6z"/></svg></div></button>',arrowRight:'<button data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}"><div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.4 12.97l-2.68 2.72 1.34 1.38L19 12l-4.94-5.07-1.34 1.38 2.68 2.72H5v1.94z"/></svg></div></button>',smallBtn:'<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"/></svg></button>'},parentEl:"body",hideScrollbar:!0,autoFocus:!0,backFocus:!0,trapFocus:!0,fullScreen:{autoStart:!1},touch:{vertical:!0,momentum:!0},hash:null,media:{},slideShow:{autoStart:!1,speed:3e3},thumbs:{autoStart:!1,hideOnClose:!0,parentEl:".fancybox-container",axis:"y"},wheel:"auto",onInit:n.noop,beforeLoad:n.noop,afterLoad:n.noop,beforeShow:n.noop,afterShow:n.noop,beforeClose:n.noop,afterClose:n.noop,onActivate:n.noop,onDeactivate:n.noop,clickContent:function(t,e){return"image"===t.type&&"zoom"},clickSlide:"close",clickOutside:"close",dblclickContent:!1,dblclickSlide:!1,dblclickOutside:!1,mobile:{preventCaptionOverlap:!1,idleTime:!1,clickContent:function(t,e){return"image"===t.type&&"toggleControls"},clickSlide:function(t,e){return"image"===t.type?"toggleControls":"close"},dblclickContent:function(t,e){return"image"===t.type&&"zoom"},dblclickSlide:function(t,e){return"image"===t.type&&"zoom"}},lang:"en",i18n:{en:{CLOSE:"Close",NEXT:"Next",PREV:"Previous",ERROR:"The requested content cannot be loaded. <br/> Please try again later.",PLAY_START:"Start slideshow",PLAY_STOP:"Pause slideshow",FULL_SCREEN:"Full screen",THUMBS:"Thumbnails",DOWNLOAD:"Download",SHARE:"Share",ZOOM:"Zoom"},de:{CLOSE:"Schlie&szlig;en",NEXT:"Weiter",PREV:"Zur&uuml;ck",ERROR:"Die angeforderten Daten konnten nicht geladen werden. <br/> Bitte versuchen Sie es sp&auml;ter nochmal.",PLAY_START:"Diaschau starten",PLAY_STOP:"Diaschau beenden",FULL_SCREEN:"Vollbild",THUMBS:"Vorschaubilder",DOWNLOAD:"Herunterladen",SHARE:"Teilen",ZOOM:"Vergr&ouml;&szlig;ern"}}},s=n(t),r=n(e),c=0,l=function(t){return t&&t.hasOwnProperty&&t instanceof n},d=function(){return t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.oRequestAnimationFrame||function(e){return t.setTimeout(e,1e3/60)}}(),u=function(){return t.cancelAnimationFrame||t.webkitCancelAnimationFrame||t.mozCancelAnimationFrame||t.oCancelAnimationFrame||function(e){t.clearTimeout(e)}}(),f=function(){var t,n=e.createElement("fakeelement"),o={transition:"transitionend",OTransition:"oTransitionEnd",MozTransition:"transitionend",WebkitTransition:"webkitTransitionEnd"};for(t in o)if(void 0!==n.style[t])return o[t];return"transitionend"}(),p=function(t){return t&&t.length&&t[0].offsetHeight},h=function(t,e){var o=n.extend(!0,{},t,e);return n.each(e,function(t,e){n.isArray(e)&&(o[t]=e)}),o},g=function(t){var o,i;return!(!t||t.ownerDocument!==e)&&(n(".fancybox-container").css("pointer-events","none"),o={x:t.getBoundingClientRect().left+t.offsetWidth/2,y:t.getBoundingClientRect().top+t.offsetHeight/2},i=e.elementFromPoint(o.x,o.y)===t,n(".fancybox-container").css("pointer-events",""),i)},b=function(t,e,o){var i=this;i.opts=h({index:o},n.fancybox.defaults),n.isPlainObject(e)&&(i.opts=h(i.opts,e)),n.fancybox.isMobile&&(i.opts=h(i.opts,i.opts.mobile)),i.id=i.opts.id||++c,i.currIndex=parseInt(i.opts.index,10)||0,i.prevIndex=null,i.prevPos=null,i.currPos=0,i.firstRun=!0,i.group=[],i.slides={},i.addContent(t),i.group.length&&i.init()};n.extend(b.prototype,{init:function(){var o,i,a=this,s=a.group[a.currIndex],r=s.opts;r.closeExisting&&n.fancybox.close(!0),n("body").addClass("fancybox-active"),!n.fancybox.getInstance()&&!1!==r.hideScrollbar&&!n.fancybox.isMobile&&e.body.scrollHeight>t.innerHeight&&(n("head").append('<style id="fancybox-style-noscroll" type="text/css">.compensate-for-scrollbar{margin-right:'+(t.innerWidth-e.documentElement.clientWidth)+"px;}</style>"),n("body").addClass("compensate-for-scrollbar")),i="",n.each(r.buttons,function(t,e){i+=r.btnTpl[e]||""}),o=n(a.translate(a,r.baseTpl.replace("{{buttons}}",i).replace("{{arrows}}",r.btnTpl.arrowLeft+r.btnTpl.arrowRight))).attr("id","fancybox-container-"+a.id).addClass(r.baseClass).data("FancyBox",a).appendTo(r.parentEl),a.$refs={container:o},["bg","inner","infobar","toolbar","stage","caption","navigation"].forEach(function(t){a.$refs[t]=o.find(".fancybox-"+t)}),a.trigger("onInit"),a.activate(),a.jumpTo(a.currIndex)},translate:function(t,e){var n=t.opts.i18n[t.opts.lang]||t.opts.i18n.en;return e.replace(/\{\{(\w+)\}\}/g,function(t,e){return void 0===n[e]?t:n[e]})},addContent:function(t){var e,o=this,i=n.makeArray(t);n.each(i,function(t,e){var i,a,s,r,c,l={},d={};n.isPlainObject(e)?(l=e,d=e.opts||e):"object"===n.type(e)&&n(e).length?(i=n(e),d=i.data()||{},d=n.extend(!0,{},d,d.options),d.$orig=i,l.src=o.opts.src||d.src||i.attr("href"),l.type||l.src||(l.type="inline",l.src=e)):l={type:"html",src:e+""},l.opts=n.extend(!0,{},o.opts,d),n.isArray(d.buttons)&&(l.opts.buttons=d.buttons),n.fancybox.isMobile&&l.opts.mobile&&(l.opts=h(l.opts,l.opts.mobile)),a=l.type||l.opts.type,r=l.src||"",!a&&r&&((s=r.match(/\.(mp4|mov|ogv|webm)((\?|#).*)?$/i))?(a="video",l.opts.video.format||(l.opts.video.format="video/"+("ogv"===s[1]?"ogg":s[1]))):r.match(/(^data:image\/[a-z0-9+\/=]*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg|ico)((\?|#).*)?$)/i)?a="image":r.match(/\.(pdf)((\?|#).*)?$/i)?(a="iframe",l=n.extend(!0,l,{contentType:"pdf",opts:{iframe:{preload:!1}}})):"#"===r.charAt(0)&&(a="inline")),a?l.type=a:o.trigger("objectNeedsType",l),l.contentType||(l.contentType=n.inArray(l.type,["html","inline","ajax"])>-1?"html":l.type),l.index=o.group.length,"auto"==l.opts.smallBtn&&(l.opts.smallBtn=n.inArray(l.type,["html","inline","ajax"])>-1),"auto"===l.opts.toolbar&&(l.opts.toolbar=!l.opts.smallBtn),l.$thumb=l.opts.$thumb||null,l.opts.$trigger&&l.index===o.opts.index&&(l.$thumb=l.opts.$trigger.find("img:first"),l.$thumb.length&&(l.opts.$orig=l.opts.$trigger)),l.$thumb&&l.$thumb.length||!l.opts.$orig||(l.$thumb=l.opts.$orig.find("img:first")),l.$thumb&&!l.$thumb.length&&(l.$thumb=null),l.thumb=l.opts.thumb||(l.$thumb?l.$thumb[0].src:null),"function"===n.type(l.opts.caption)&&(l.opts.caption=l.opts.caption.apply(e,[o,l])),"function"===n.type(o.opts.caption)&&(l.opts.caption=o.opts.caption.apply(e,[o,l])),l.opts.caption instanceof n||(l.opts.caption=void 0===l.opts.caption?"":l.opts.caption+""),"ajax"===l.type&&(c=r.split(/\s+/,2),c.length>1&&(l.src=c.shift(),l.opts.filter=c.shift())),l.opts.modal&&(l.opts=n.extend(!0,l.opts,{trapFocus:!0,infobar:0,toolbar:0,smallBtn:0,keyboard:0,slideShow:0,fullScreen:0,thumbs:0,touch:0,clickContent:!1,clickSlide:!1,clickOutside:!1,dblclickContent:!1,dblclickSlide:!1,dblclickOutside:!1})),o.group.push(l)}),Object.keys(o.slides).length&&(o.updateControls(),(e=o.Thumbs)&&e.isActive&&(e.create(),e.focus()))},addEvents:function(){var e=this;e.removeEvents(),e.$refs.container.on("click.fb-close","[data-fancybox-close]",function(t){t.stopPropagation(),t.preventDefault(),e.close(t)}).on("touchstart.fb-prev click.fb-prev","[data-fancybox-prev]",function(t){t.stopPropagation(),t.preventDefault(),e.previous()}).on("touchstart.fb-next click.fb-next","[data-fancybox-next]",function(t){t.stopPropagation(),t.preventDefault(),e.next()}).on("click.fb","[data-fancybox-zoom]",function(t){e[e.isScaledDown()?"scaleToActual":"scaleToFit"]()}),s.on("orientationchange.fb resize.fb",function(t){t&&t.originalEvent&&"resize"===t.originalEvent.type?(e.requestId&&u(e.requestId),e.requestId=d(function(){e.update(t)})):(e.current&&"iframe"===e.current.type&&e.$refs.stage.hide(),setTimeout(function(){e.$refs.stage.show(),e.update(t)},n.fancybox.isMobile?600:250))}),r.on("keydown.fb",function(t){var o=n.fancybox?n.fancybox.getInstance():null,i=o.current,a=t.keyCode||t.which;if(9==a)return void(i.opts.trapFocus&&e.focus(t));if(!(!i.opts.keyboard||t.ctrlKey||t.altKey||t.shiftKey||n(t.target).is("input,textarea,video,audio,select")))return 8===a||27===a?(t.preventDefault(),void e.close(t)):37===a||38===a?(t.preventDefault(),void e.previous()):39===a||40===a?(t.preventDefault(),void e.next()):void e.trigger("afterKeydown",t,a)}),e.group[e.currIndex].opts.idleTime&&(e.idleSecondsCounter=0,r.on("mousemove.fb-idle mouseleave.fb-idle mousedown.fb-idle touchstart.fb-idle touchmove.fb-idle scroll.fb-idle keydown.fb-idle",function(t){e.idleSecondsCounter=0,e.isIdle&&e.showControls(),e.isIdle=!1}),e.idleInterval=t.setInterval(function(){++e.idleSecondsCounter>=e.group[e.currIndex].opts.idleTime&&!e.isDragging&&(e.isIdle=!0,e.idleSecondsCounter=0,e.hideControls())},1e3))},removeEvents:function(){var e=this;s.off("orientationchange.fb resize.fb"),r.off("keydown.fb .fb-idle"),this.$refs.container.off(".fb-close .fb-prev .fb-next"),e.idleInterval&&(t.clearInterval(e.idleInterval),e.idleInterval=null)},previous:function(t){return this.jumpTo(this.currPos-1,t)},next:function(t){return this.jumpTo(this.currPos+1,t)},jumpTo:function(t,e){var o,i,a,s,r,c,l,d,u,f=this,h=f.group.length;if(!(f.isDragging||f.isClosing||f.isAnimating&&f.firstRun)){if(t=parseInt(t,10),!(a=f.current?f.current.opts.loop:f.opts.loop)&&(t<0||t>=h))return!1;if(o=f.firstRun=!Object.keys(f.slides).length,r=f.current,f.prevIndex=f.currIndex,f.prevPos=f.currPos,s=f.createSlide(t),h>1&&((a||s.index<h-1)&&f.createSlide(t+1),(a||s.index>0)&&f.createSlide(t-1)),f.current=s,f.currIndex=s.index,f.currPos=s.pos,f.trigger("beforeShow",o),f.updateControls(),s.forcedDuration=void 0,n.isNumeric(e)?s.forcedDuration=e:e=s.opts[o?"animationDuration":"transitionDuration"],e=parseInt(e,10),i=f.isMoved(s),s.$slide.addClass("fancybox-slide--current"),o)return s.opts.animationEffect&&e&&f.$refs.container.css("transition-duration",e+"ms"),f.$refs.container.addClass("fancybox-is-open").trigger("focus"),f.loadSlide(s),void f.preload("image");c=n.fancybox.getTranslate(r.$slide),l=n.fancybox.getTranslate(f.$refs.stage),n.each(f.slides,function(t,e){n.fancybox.stop(e.$slide,!0)}),r.pos!==s.pos&&(r.isComplete=!1),r.$slide.removeClass("fancybox-slide--complete fancybox-slide--current"),i?(u=c.left-(r.pos*c.width+r.pos*r.opts.gutter),n.each(f.slides,function(t,o){o.$slide.removeClass("fancybox-animated").removeClass(function(t,e){return(e.match(/(^|\s)fancybox-fx-\S+/g)||[]).join(" ")});var i=o.pos*c.width+o.pos*o.opts.gutter;n.fancybox.setTranslate(o.$slide,{top:0,left:i-l.left+u}),o.pos!==s.pos&&o.$slide.addClass("fancybox-slide--"+(o.pos>s.pos?"next":"previous")),p(o.$slide),n.fancybox.animate(o.$slide,{top:0,left:(o.pos-s.pos)*c.width+(o.pos-s.pos)*o.opts.gutter},e,function(){o.$slide.css({transform:"",opacity:""}).removeClass("fancybox-slide--next fancybox-slide--previous"),o.pos===f.currPos&&f.complete()})})):e&&s.opts.transitionEffect&&(d="fancybox-animated fancybox-fx-"+s.opts.transitionEffect,r.$slide.addClass("fancybox-slide--"+(r.pos>s.pos?"next":"previous")),n.fancybox.animate(r.$slide,d,e,function(){r.$slide.removeClass(d).removeClass("fancybox-slide--next fancybox-slide--previous")},!1)),s.isLoaded?f.revealContent(s):f.loadSlide(s),f.preload("image")}},createSlide:function(t){var e,o,i=this;return o=t%i.group.length,o=o<0?i.group.length+o:o,!i.slides[t]&&i.group[o]&&(e=n('<div class="fancybox-slide"></div>').appendTo(i.$refs.stage),i.slides[t]=n.extend(!0,{},i.group[o],{pos:t,$slide:e,isLoaded:!1}),i.updateSlide(i.slides[t])),i.slides[t]},scaleToActual:function(t,e,o){var i,a,s,r,c,l=this,d=l.current,u=d.$content,f=n.fancybox.getTranslate(d.$slide).width,p=n.fancybox.getTranslate(d.$slide).height,h=d.width,g=d.height;l.isAnimating||l.isMoved()||!u||"image"!=d.type||!d.isLoaded||d.hasError||(l.isAnimating=!0,n.fancybox.stop(u),t=void 0===t?.5*f:t,e=void 0===e?.5*p:e,i=n.fancybox.getTranslate(u),i.top-=n.fancybox.getTranslate(d.$slide).top,i.left-=n.fancybox.getTranslate(d.$slide).left,r=h/i.width,c=g/i.height,a=.5*f-.5*h,s=.5*p-.5*g,h>f&&(a=i.left*r-(t*r-t),a>0&&(a=0),a<f-h&&(a=f-h)),g>p&&(s=i.top*c-(e*c-e),s>0&&(s=0),s<p-g&&(s=p-g)),l.updateCursor(h,g),n.fancybox.animate(u,{top:s,left:a,scaleX:r,scaleY:c},o||366,function(){l.isAnimating=!1}),l.SlideShow&&l.SlideShow.isActive&&l.SlideShow.stop())},scaleToFit:function(t){var e,o=this,i=o.current,a=i.$content;o.isAnimating||o.isMoved()||!a||"image"!=i.type||!i.isLoaded||i.hasError||(o.isAnimating=!0,n.fancybox.stop(a),e=o.getFitPos(i),o.updateCursor(e.width,e.height),n.fancybox.animate(a,{top:e.top,left:e.left,scaleX:e.width/a.width(),scaleY:e.height/a.height()},t||366,function(){o.isAnimating=!1}))},getFitPos:function(t){var e,o,i,a,s=this,r=t.$content,c=t.$slide,l=t.width||t.opts.width,d=t.height||t.opts.height,u={};return!!(t.isLoaded&&r&&r.length)&&(e=n.fancybox.getTranslate(s.$refs.stage).width,o=n.fancybox.getTranslate(s.$refs.stage).height,e-=parseFloat(c.css("paddingLeft"))+parseFloat(c.css("paddingRight"))+parseFloat(r.css("marginLeft"))+parseFloat(r.css("marginRight")),o-=parseFloat(c.css("paddingTop"))+parseFloat(c.css("paddingBottom"))+parseFloat(r.css("marginTop"))+parseFloat(r.css("marginBottom")),l&&d||(l=e,d=o),i=Math.min(1,e/l,o/d),l*=i,d*=i,l>e-.5&&(l=e),d>o-.5&&(d=o),"image"===t.type?(u.top=Math.floor(.5*(o-d))+parseFloat(c.css("paddingTop")),u.left=Math.floor(.5*(e-l))+parseFloat(c.css("paddingLeft"))):"video"===t.contentType&&(a=t.opts.width&&t.opts.height?l/d:t.opts.ratio||16/9,d>l/a?d=l/a:l>d*a&&(l=d*a)),u.width=l,u.height=d,u)},update:function(t){var e=this;n.each(e.slides,function(n,o){e.updateSlide(o,t)})},updateSlide:function(t,e){var o=this,i=t&&t.$content,a=t.width||t.opts.width,s=t.height||t.opts.height,r=t.$slide;o.adjustCaption(t),i&&(a||s||"video"===t.contentType)&&!t.hasError&&(n.fancybox.stop(i),n.fancybox.setTranslate(i,o.getFitPos(t)),t.pos===o.currPos&&(o.isAnimating=!1,o.updateCursor())),o.adjustLayout(t),r.length&&(r.trigger("refresh"),t.pos===o.currPos&&o.$refs.toolbar.add(o.$refs.navigation.find(".fancybox-button--arrow_right")).toggleClass("compensate-for-scrollbar",r.get(0).scrollHeight>r.get(0).clientHeight)),o.trigger("onUpdate",t,e)},centerSlide:function(t){var e=this,o=e.current,i=o.$slide;!e.isClosing&&o&&(i.siblings().css({transform:"",opacity:""}),i.parent().children().removeClass("fancybox-slide--previous fancybox-slide--next"),n.fancybox.animate(i,{top:0,left:0,opacity:1},void 0===t?0:t,function(){i.css({transform:"",opacity:""}),o.isComplete||e.complete()},!1))},isMoved:function(t){var e,o,i=t||this.current;return!!i&&(o=n.fancybox.getTranslate(this.$refs.stage),e=n.fancybox.getTranslate(i.$slide),!i.$slide.hasClass("fancybox-animated")&&(Math.abs(e.top-o.top)>.5||Math.abs(e.left-o.left)>.5))},updateCursor:function(t,e){var o,i,a=this,s=a.current,r=a.$refs.container;s&&!a.isClosing&&a.Guestures&&(r.removeClass("fancybox-is-zoomable fancybox-can-zoomIn fancybox-can-zoomOut fancybox-can-swipe fancybox-can-pan"),o=a.canPan(t,e),i=!!o||a.isZoomable(),r.toggleClass("fancybox-is-zoomable",i),n("[data-fancybox-zoom]").prop("disabled",!i),o?r.addClass("fancybox-can-pan"):i&&("zoom"===s.opts.clickContent||n.isFunction(s.opts.clickContent)&&"zoom"==s.opts.clickContent(s))?r.addClass("fancybox-can-zoomIn"):s.opts.touch&&(s.opts.touch.vertical||a.group.length>1)&&"video"!==s.contentType&&r.addClass("fancybox-can-swipe"))},isZoomable:function(){var t,e=this,n=e.current;if(n&&!e.isClosing&&"image"===n.type&&!n.hasError){if(!n.isLoaded)return!0;if((t=e.getFitPos(n))&&(n.width>t.width||n.height>t.height))return!0}return!1},isScaledDown:function(t,e){var o=this,i=!1,a=o.current,s=a.$content;return void 0!==t&&void 0!==e?i=t<a.width&&e<a.height:s&&(i=n.fancybox.getTranslate(s),i=i.width<a.width&&i.height<a.height),i},canPan:function(t,e){var o=this,i=o.current,a=null,s=!1;return"image"===i.type&&(i.isComplete||t&&e)&&!i.hasError&&(s=o.getFitPos(i),void 0!==t&&void 0!==e?a={width:t,height:e}:i.isComplete&&(a=n.fancybox.getTranslate(i.$content)),a&&s&&(s=Math.abs(a.width-s.width)>1.5||Math.abs(a.height-s.height)>1.5)),s},loadSlide:function(t){var e,o,i,a=this;if(!t.isLoading&&!t.isLoaded){if(t.isLoading=!0,!1===a.trigger("beforeLoad",t))return t.isLoading=!1,!1;switch(e=t.type,o=t.$slide,o.off("refresh").trigger("onReset").addClass(t.opts.slideClass),e){case"image":a.setImage(t);break;case"iframe":a.setIframe(t);break;case"html":a.setContent(t,t.src||t.content);break;case"video":a.setContent(t,t.opts.video.tpl.replace(/\{\{src\}\}/gi,t.src).replace("{{format}}",t.opts.videoFormat||t.opts.video.format||"").replace("{{poster}}",t.thumb||""));break;case"inline":n(t.src).length?a.setContent(t,n(t.src)):a.setError(t);break;case"ajax":a.showLoading(t),i=n.ajax(n.extend({},t.opts.ajax.settings,{url:t.src,success:function(e,n){"success"===n&&a.setContent(t,e)},error:function(e,n){e&&"abort"!==n&&a.setError(t)}})),o.one("onReset",function(){i.abort()});break;default:a.setError(t)}return!0}},setImage:function(t){var o,i=this;setTimeout(function(){var e=t.$image;i.isClosing||!t.isLoading||e&&e.length&&e[0].complete||t.hasError||i.showLoading(t)},50),i.checkSrcset(t),t.$content=n('<div class="fancybox-content"></div>').addClass("fancybox-is-hidden").appendTo(t.$slide.addClass("fancybox-slide--image")),!1!==t.opts.preload&&t.opts.width&&t.opts.height&&t.thumb&&(t.width=t.opts.width,t.height=t.opts.height,o=e.createElement("img"),o.onerror=function(){n(this).remove(),t.$ghost=null},o.onload=function(){i.afterLoad(t)},t.$ghost=n(o).addClass("fancybox-image").appendTo(t.$content).attr("src",t.thumb)),i.setBigImage(t)},checkSrcset:function(e){var n,o,i,a,s=e.opts.srcset||e.opts.image.srcset;if(s){i=t.devicePixelRatio||1,a=t.innerWidth*i,o=s.split(",").map(function(t){var e={};return t.trim().split(/\s+/).forEach(function(t,n){var o=parseInt(t.substring(0,t.length-1),10);if(0===n)return e.url=t;o&&(e.value=o,e.postfix=t[t.length-1])}),e}),o.sort(function(t,e){return t.value-e.value});for(var r=0;r<o.length;r++){var c=o[r];if("w"===c.postfix&&c.value>=a||"x"===c.postfix&&c.value>=i){n=c;break}}!n&&o.length&&(n=o[o.length-1]),n&&(e.src=n.url,e.width&&e.height&&"w"==n.postfix&&(e.height=e.width/e.height*n.value,e.width=n.value),e.opts.srcset=s)}},setBigImage:function(t){var o=this,i=e.createElement("img"),a=n(i);t.$image=a.one("error",function(){o.setError(t)}).one("load",function(){var e;t.$ghost||(o.resolveImageSlideSize(t,this.naturalWidth,this.naturalHeight),o.afterLoad(t)),o.isClosing||(t.opts.srcset&&(e=t.opts.sizes,e&&"auto"!==e||(e=(t.width/t.height>1&&s.width()/s.height()>1?"100":Math.round(t.width/t.height*100))+"vw"),a.attr("sizes",e).attr("srcset",t.opts.srcset)),t.$ghost&&setTimeout(function(){t.$ghost&&!o.isClosing&&t.$ghost.hide()},Math.min(300,Math.max(1e3,t.height/1600))),o.hideLoading(t))}).addClass("fancybox-image").attr("src",t.src).appendTo(t.$content),(i.complete||"complete"==i.readyState)&&a.naturalWidth&&a.naturalHeight?a.trigger("load"):i.error&&a.trigger("error")},resolveImageSlideSize:function(t,e,n){var o=parseInt(t.opts.width,10),i=parseInt(t.opts.height,10);t.width=e,t.height=n,o>0&&(t.width=o,t.height=Math.floor(o*n/e)),i>0&&(t.width=Math.floor(i*e/n),t.height=i)},setIframe:function(t){var e,o=this,i=t.opts.iframe,a=t.$slide;t.$content=n('<div class="fancybox-content'+(i.preload?" fancybox-is-hidden":"")+'"></div>').css(i.css).appendTo(a),a.addClass("fancybox-slide--"+t.contentType),t.$iframe=e=n(i.tpl.replace(/\{rnd\}/g,(new Date).getTime())).attr(i.attr).appendTo(t.$content),i.preload?(o.showLoading(t),e.on("load.fb error.fb",function(e){this.isReady=1,t.$slide.trigger("refresh"),o.afterLoad(t)}),a.on("refresh.fb",function(){var n,o,s=t.$content,r=i.css.width,c=i.css.height;if(1===e[0].isReady){try{n=e.contents(),o=n.find("body")}catch(t){}o&&o.length&&o.children().length&&(a.css("overflow","visible"),s.css({width:"100%","max-width":"100%",height:"9999px"}),void 0===r&&(r=Math.ceil(Math.max(o[0].clientWidth,o.outerWidth(!0)))),s.css("width",r||"").css("max-width",""),void 0===c&&(c=Math.ceil(Math.max(o[0].clientHeight,o.outerHeight(!0)))),s.css("height",c||""),a.css("overflow","auto")),s.removeClass("fancybox-is-hidden")}})):o.afterLoad(t),e.attr("src",t.src),a.one("onReset",function(){try{n(this).find("iframe").hide().unbind().attr("src","//about:blank")}catch(t){}n(this).off("refresh.fb").empty(),t.isLoaded=!1,t.isRevealed=!1})},setContent:function(t,e){var o=this;o.isClosing||(o.hideLoading(t),t.$content&&n.fancybox.stop(t.$content),t.$slide.empty(),l(e)&&e.parent().length?((e.hasClass("fancybox-content")||e.parent().hasClass("fancybox-content"))&&e.parents(".fancybox-slide").trigger("onReset"),t.$placeholder=n("<div>").hide().insertAfter(e),e.css("display","inline-block")):t.hasError||("string"===n.type(e)&&(e=n("<div>").append(n.trim(e)).contents()),t.opts.filter&&(e=n("<div>").html(e).find(t.opts.filter))),t.$slide.one("onReset",function(){n(this).find("video,audio").trigger("pause"),t.$placeholder&&(t.$placeholder.after(e.removeClass("fancybox-content").hide()).remove(),t.$placeholder=null),t.$smallBtn&&(t.$smallBtn.remove(),t.$smallBtn=null),t.hasError||(n(this).empty(),t.isLoaded=!1,t.isRevealed=!1)}),n(e).appendTo(t.$slide),n(e).is("video,audio")&&(n(e).addClass("fancybox-video"),n(e).wrap("<div></div>"),t.contentType="video",t.opts.width=t.opts.width||n(e).attr("width"),t.opts.height=t.opts.height||n(e).attr("height")),t.$content=t.$slide.children().filter("div,form,main,video,audio,article,.fancybox-content").first(),t.$content.siblings().hide(),t.$content.length||(t.$content=t.$slide.wrapInner("<div></div>").children().first()),t.$content.addClass("fancybox-content"),t.$slide.addClass("fancybox-slide--"+t.contentType),o.afterLoad(t))},setError:function(t){t.hasError=!0,t.$slide.trigger("onReset").removeClass("fancybox-slide--"+t.contentType).addClass("fancybox-slide--error"),t.contentType="html",this.setContent(t,this.translate(t,t.opts.errorTpl)),t.pos===this.currPos&&(this.isAnimating=!1)},showLoading:function(t){var e=this;(t=t||e.current)&&!t.$spinner&&(t.$spinner=n(e.translate(e,e.opts.spinnerTpl)).appendTo(t.$slide).hide().fadeIn("fast"))},hideLoading:function(t){var e=this;(t=t||e.current)&&t.$spinner&&(t.$spinner.stop().remove(),delete t.$spinner)},afterLoad:function(t){var e=this;e.isClosing||(t.isLoading=!1,t.isLoaded=!0,e.trigger("afterLoad",t),e.hideLoading(t),!t.opts.smallBtn||t.$smallBtn&&t.$smallBtn.length||(t.$smallBtn=n(e.translate(t,t.opts.btnTpl.smallBtn)).appendTo(t.$content)),t.opts.protect&&t.$content&&!t.hasError&&(t.$content.on("contextmenu.fb",function(t){return 2==t.button&&t.preventDefault(),!0}),"image"===t.type&&n('<div class="fancybox-spaceball"></div>').appendTo(t.$content)),e.adjustCaption(t),e.adjustLayout(t),t.pos===e.currPos&&e.updateCursor(),e.revealContent(t))},adjustCaption:function(t){var e,n=this,o=t||n.current,i=o.opts.caption,a=o.opts.preventCaptionOverlap,s=n.$refs.caption,r=!1;s.toggleClass("fancybox-caption--separate",a),a&&i&&i.length&&(o.pos!==n.currPos?(e=s.clone().appendTo(s.parent()),e.children().eq(0).empty().html(i),r=e.outerHeight(!0),e.empty().remove()):n.$caption&&(r=n.$caption.outerHeight(!0)),o.$slide.css("padding-bottom",r||""))},adjustLayout:function(t){var e,n,o,i,a=this,s=t||a.current;s.isLoaded&&!0!==s.opts.disableLayoutFix&&(s.$content.css("margin-bottom",""),s.$content.outerHeight()>s.$slide.height()+.5&&(o=s.$slide[0].style["padding-bottom"],i=s.$slide.css("padding-bottom"),parseFloat(i)>0&&(e=s.$slide[0].scrollHeight,s.$slide.css("padding-bottom",0),Math.abs(e-s.$slide[0].scrollHeight)<1&&(n=i),s.$slide.css("padding-bottom",o))),s.$content.css("margin-bottom",n))},revealContent:function(t){var e,o,i,a,s=this,r=t.$slide,c=!1,l=!1,d=s.isMoved(t),u=t.isRevealed;return t.isRevealed=!0,e=t.opts[s.firstRun?"animationEffect":"transitionEffect"],i=t.opts[s.firstRun?"animationDuration":"transitionDuration"],i=parseInt(void 0===t.forcedDuration?i:t.forcedDuration,10),!d&&t.pos===s.currPos&&i||(e=!1),"zoom"===e&&(t.pos===s.currPos&&i&&"image"===t.type&&!t.hasError&&(l=s.getThumbPos(t))?c=s.getFitPos(t):e="fade"),"zoom"===e?(s.isAnimating=!0,c.scaleX=c.width/l.width,c.scaleY=c.height/l.height,a=t.opts.zoomOpacity,"auto"==a&&(a=Math.abs(t.width/t.height-l.width/l.height)>.1),a&&(l.opacity=.1,c.opacity=1),n.fancybox.setTranslate(t.$content.removeClass("fancybox-is-hidden"),l),p(t.$content),void n.fancybox.animate(t.$content,c,i,function(){s.isAnimating=!1,s.complete()})):(s.updateSlide(t),e?(n.fancybox.stop(r),o="fancybox-slide--"+(t.pos>=s.prevPos?"next":"previous")+" fancybox-animated fancybox-fx-"+e,r.addClass(o).removeClass("fancybox-slide--current"),t.$content.removeClass("fancybox-is-hidden"),p(r),"image"!==t.type&&t.$content.hide().show(0),void n.fancybox.animate(r,"fancybox-slide--current",i,function(){r.removeClass(o).css({transform:"",opacity:""}),t.pos===s.currPos&&s.complete()},!0)):(t.$content.removeClass("fancybox-is-hidden"),u||!d||"image"!==t.type||t.hasError||t.$content.hide().fadeIn("fast"),void(t.pos===s.currPos&&s.complete())))},getThumbPos:function(t){var e,o,i,a,s,r=!1,c=t.$thumb;return!(!c||!g(c[0]))&&(e=n.fancybox.getTranslate(c),o=parseFloat(c.css("border-top-width")||0),i=parseFloat(c.css("border-right-width")||0),a=parseFloat(c.css("border-bottom-width")||0),s=parseFloat(c.css("border-left-width")||0),r={top:e.top+o,left:e.left+s,width:e.width-i-s,height:e.height-o-a,scaleX:1,scaleY:1},e.width>0&&e.height>0&&r)},complete:function(){var t,e=this,o=e.current,i={};!e.isMoved()&&o.isLoaded&&(o.isComplete||(o.isComplete=!0,o.$slide.siblings().trigger("onReset"),e.preload("inline"),p(o.$slide),o.$slide.addClass("fancybox-slide--complete"),n.each(e.slides,function(t,o){o.pos>=e.currPos-1&&o.pos<=e.currPos+1?i[o.pos]=o:o&&(n.fancybox.stop(o.$slide),o.$slide.off().remove())}),e.slides=i),e.isAnimating=!1,e.updateCursor(),e.trigger("afterShow"),o.opts.video.autoStart&&o.$slide.find("video,audio").filter(":visible:first").trigger("play").one("ended",function(){Document.exitFullscreen?Document.exitFullscreen():this.webkitExitFullscreen&&this.webkitExitFullscreen(),e.next()}),o.opts.autoFocus&&"html"===o.contentType&&(t=o.$content.find("input[autofocus]:enabled:visible:first"),t.length?t.trigger("focus"):e.focus(null,!0)),o.$slide.scrollTop(0).scrollLeft(0))},preload:function(t){var e,n,o=this;o.group.length<2||(n=o.slides[o.currPos+1],e=o.slides[o.currPos-1],e&&e.type===t&&o.loadSlide(e),n&&n.type===t&&o.loadSlide(n))},focus:function(t,o){var i,a,s=this,r=["a[href]","area[href]",'input:not([disabled]):not([type="hidden"]):not([aria-hidden])',"select:not([disabled]):not([aria-hidden])","textarea:not([disabled]):not([aria-hidden])","button:not([disabled]):not([aria-hidden])","iframe","object","embed","video","audio","[contenteditable]",'[tabindex]:not([tabindex^="-"])'].join(",");s.isClosing||(i=!t&&s.current&&s.current.isComplete?s.current.$slide.find("*:visible"+(o?":not(.fancybox-close-small)":"")):s.$refs.container.find("*:visible"),i=i.filter(r).filter(function(){return"hidden"!==n(this).css("visibility")&&!n(this).hasClass("disabled")}),i.length?(a=i.index(e.activeElement),t&&t.shiftKey?(a<0||0==a)&&(t.preventDefault(),i.eq(i.length-1).trigger("focus")):(a<0||a==i.length-1)&&(t&&t.preventDefault(),i.eq(0).trigger("focus"))):s.$refs.container.trigger("focus"))},activate:function(){var t=this;n(".fancybox-container").each(function(){var e=n(this).data("FancyBox");e&&e.id!==t.id&&!e.isClosing&&(e.trigger("onDeactivate"),e.removeEvents(),e.isVisible=!1)}),t.isVisible=!0,(t.current||t.isIdle)&&(t.update(),t.updateControls()),t.trigger("onActivate"),t.addEvents()},close:function(t,e){var o,i,a,s,r,c,l,u=this,f=u.current,h=function(){u.cleanUp(t)};return!u.isClosing&&(u.isClosing=!0,!1===u.trigger("beforeClose",t)?(u.isClosing=!1,d(function(){u.update()}),!1):(u.removeEvents(),a=f.$content,o=f.opts.animationEffect,i=n.isNumeric(e)?e:o?f.opts.animationDuration:0,f.$slide.removeClass("fancybox-slide--complete fancybox-slide--next fancybox-slide--previous fancybox-animated"),!0!==t?n.fancybox.stop(f.$slide):o=!1,f.$slide.siblings().trigger("onReset").remove(),i&&u.$refs.container.removeClass("fancybox-is-open").addClass("fancybox-is-closing").css("transition-duration",i+"ms"),u.hideLoading(f),u.hideControls(!0),u.updateCursor(),"zoom"!==o||a&&i&&"image"===f.type&&!u.isMoved()&&!f.hasError&&(l=u.getThumbPos(f))||(o="fade"),"zoom"===o?(n.fancybox.stop(a),s=n.fancybox.getTranslate(a),c={top:s.top,left:s.left,scaleX:s.width/l.width,scaleY:s.height/l.height,width:l.width,height:l.height},r=f.opts.zoomOpacity,
"auto"==r&&(r=Math.abs(f.width/f.height-l.width/l.height)>.1),r&&(l.opacity=0),n.fancybox.setTranslate(a,c),p(a),n.fancybox.animate(a,l,i,h),!0):(o&&i?n.fancybox.animate(f.$slide.addClass("fancybox-slide--previous").removeClass("fancybox-slide--current"),"fancybox-animated fancybox-fx-"+o,i,h):!0===t?setTimeout(h,i):h(),!0)))},cleanUp:function(e){var o,i,a,s=this,r=s.current.opts.$orig;s.current.$slide.trigger("onReset"),s.$refs.container.empty().remove(),s.trigger("afterClose",e),s.current.opts.backFocus&&(r&&r.length&&r.is(":visible")||(r=s.$trigger),r&&r.length&&(i=t.scrollX,a=t.scrollY,r.trigger("focus"),n("html, body").scrollTop(a).scrollLeft(i))),s.current=null,o=n.fancybox.getInstance(),o?o.activate():(n("body").removeClass("fancybox-active compensate-for-scrollbar"),n("#fancybox-style-noscroll").remove())},trigger:function(t,e){var o,i=Array.prototype.slice.call(arguments,1),a=this,s=e&&e.opts?e:a.current;if(s?i.unshift(s):s=a,i.unshift(a),n.isFunction(s.opts[t])&&(o=s.opts[t].apply(s,i)),!1===o)return o;"afterClose"!==t&&a.$refs?a.$refs.container.trigger(t+".fb",i):r.trigger(t+".fb",i)},updateControls:function(){var t=this,o=t.current,i=o.index,a=t.$refs.container,s=t.$refs.caption,r=o.opts.caption;o.$slide.trigger("refresh"),r&&r.length?(t.$caption=s,s.children().eq(0).html(r)):t.$caption=null,t.hasHiddenControls||t.isIdle||t.showControls(),a.find("[data-fancybox-count]").html(t.group.length),a.find("[data-fancybox-index]").html(i+1),a.find("[data-fancybox-prev]").prop("disabled",!o.opts.loop&&i<=0),a.find("[data-fancybox-next]").prop("disabled",!o.opts.loop&&i>=t.group.length-1),"image"===o.type?a.find("[data-fancybox-zoom]").show().end().find("[data-fancybox-download]").attr("href",o.opts.image.src||o.src).show():o.opts.toolbar&&a.find("[data-fancybox-download],[data-fancybox-zoom]").hide(),n(e.activeElement).is(":hidden,[disabled]")&&t.$refs.container.trigger("focus")},hideControls:function(t){var e=this,n=["infobar","toolbar","nav"];!t&&e.current.opts.preventCaptionOverlap||n.push("caption"),this.$refs.container.removeClass(n.map(function(t){return"fancybox-show-"+t}).join(" ")),this.hasHiddenControls=!0},showControls:function(){var t=this,e=t.current?t.current.opts:t.opts,n=t.$refs.container;t.hasHiddenControls=!1,t.idleSecondsCounter=0,n.toggleClass("fancybox-show-toolbar",!(!e.toolbar||!e.buttons)).toggleClass("fancybox-show-infobar",!!(e.infobar&&t.group.length>1)).toggleClass("fancybox-show-caption",!!t.$caption).toggleClass("fancybox-show-nav",!!(e.arrows&&t.group.length>1)).toggleClass("fancybox-is-modal",!!e.modal)},toggleControls:function(){this.hasHiddenControls?this.showControls():this.hideControls()}}),n.fancybox={version:"3.5.7",defaults:a,getInstance:function(t){var e=n('.fancybox-container:not(".fancybox-is-closing"):last').data("FancyBox"),o=Array.prototype.slice.call(arguments,1);return e instanceof b&&("string"===n.type(t)?e[t].apply(e,o):"function"===n.type(t)&&t.apply(e,o),e)},open:function(t,e,n){return new b(t,e,n)},close:function(t){var e=this.getInstance();e&&(e.close(),!0===t&&this.close(t))},destroy:function(){this.close(!0),r.add("body").off("click.fb-start","**")},isMobile:/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),use3d:function(){var n=e.createElement("div");return t.getComputedStyle&&t.getComputedStyle(n)&&t.getComputedStyle(n).getPropertyValue("transform")&&!(e.documentMode&&e.documentMode<11)}(),getTranslate:function(t){var e;return!(!t||!t.length)&&(e=t[0].getBoundingClientRect(),{top:e.top||0,left:e.left||0,width:e.width,height:e.height,opacity:parseFloat(t.css("opacity"))})},setTranslate:function(t,e){var n="",o={};if(t&&e)return void 0===e.left&&void 0===e.top||(n=(void 0===e.left?t.position().left:e.left)+"px, "+(void 0===e.top?t.position().top:e.top)+"px",n=this.use3d?"translate3d("+n+", 0px)":"translate("+n+")"),void 0!==e.scaleX&&void 0!==e.scaleY?n+=" scale("+e.scaleX+", "+e.scaleY+")":void 0!==e.scaleX&&(n+=" scaleX("+e.scaleX+")"),n.length&&(o.transform=n),void 0!==e.opacity&&(o.opacity=e.opacity),void 0!==e.width&&(o.width=e.width),void 0!==e.height&&(o.height=e.height),t.css(o)},animate:function(t,e,o,i,a){var s,r=this;n.isFunction(o)&&(i=o,o=null),r.stop(t),s=r.getTranslate(t),t.on(f,function(c){(!c||!c.originalEvent||t.is(c.originalEvent.target)&&"z-index"!=c.originalEvent.propertyName)&&(r.stop(t),n.isNumeric(o)&&t.css("transition-duration",""),n.isPlainObject(e)?void 0!==e.scaleX&&void 0!==e.scaleY&&r.setTranslate(t,{top:e.top,left:e.left,width:s.width*e.scaleX,height:s.height*e.scaleY,scaleX:1,scaleY:1}):!0!==a&&t.removeClass(e),n.isFunction(i)&&i(c))}),n.isNumeric(o)&&t.css("transition-duration",o+"ms"),n.isPlainObject(e)?(void 0!==e.scaleX&&void 0!==e.scaleY&&(delete e.width,delete e.height,t.parent().hasClass("fancybox-slide--image")&&t.parent().addClass("fancybox-is-scaling")),n.fancybox.setTranslate(t,e)):t.addClass(e),t.data("timer",setTimeout(function(){t.trigger(f)},o+33))},stop:function(t,e){t&&t.length&&(clearTimeout(t.data("timer")),e&&t.trigger(f),t.off(f).css("transition-duration",""),t.parent().removeClass("fancybox-is-scaling"))}},n.fn.fancybox=function(t){var e;return t=t||{},e=t.selector||!1,e?n("body").off("click.fb-start",e).on("click.fb-start",e,{options:t},i):this.off("click.fb-start").on("click.fb-start",{items:this,options:t},i),this},r.on("click.fb-start","[data-fancybox]",i),r.on("click.fb-start","[data-fancybox-trigger]",function(t){n('[data-fancybox="'+n(this).attr("data-fancybox-trigger")+'"]').eq(n(this).attr("data-fancybox-index")||0).trigger("click.fb-start",{$trigger:n(this)})}),function(){var t=null;r.on("mousedown mouseup focus blur",".fancybox-button",function(e){switch(e.type){case"mousedown":t=n(this);break;case"mouseup":t=null;break;case"focusin":n(".fancybox-button").removeClass("fancybox-focus"),n(this).is(t)||n(this).is("[disabled]")||n(this).addClass("fancybox-focus");break;case"focusout":n(".fancybox-button").removeClass("fancybox-focus")}})}()}}(window,document,jQuery),function(t){"use strict";var e={youtube:{matcher:/(youtube\.com|youtu\.be|youtube\-nocookie\.com)\/(watch\?(.*&)?v=|v\/|u\/|embed\/?)?(videoseries\?list=(.*)|[\w-]{11}|\?listType=(.*)&list=(.*))(.*)/i,params:{autoplay:1,autohide:1,fs:1,rel:0,hd:1,wmode:"transparent",enablejsapi:1,html5:1},paramPlace:8,type:"iframe",url:"https://www.youtube-nocookie.com/embed/$4",thumb:"https://img.youtube.com/vi/$4/hqdefault.jpg"},vimeo:{matcher:/^.+vimeo.com\/(.*\/)?([\d]+)(.*)?/,params:{autoplay:1,hd:1,show_title:1,show_byline:1,show_portrait:0,fullscreen:1},paramPlace:3,type:"iframe",url:"//player.vimeo.com/video/$2"},instagram:{matcher:/(instagr\.am|instagram\.com)\/p\/([a-zA-Z0-9_\-]+)\/?/i,type:"image",url:"//$1/p/$2/media/?size=l"},gmap_place:{matcher:/(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(((maps\/(place\/(.*)\/)?\@(.*),(\d+.?\d+?)z))|(\?ll=))(.*)?/i,type:"iframe",url:function(t){return"//maps.google."+t[2]+"/?ll="+(t[9]?t[9]+"&z="+Math.floor(t[10])+(t[12]?t[12].replace(/^\//,"&"):""):t[12]+"").replace(/\?/,"&")+"&output="+(t[12]&&t[12].indexOf("layer=c")>0?"svembed":"embed")}},gmap_search:{matcher:/(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(maps\/search\/)(.*)/i,type:"iframe",url:function(t){return"//maps.google."+t[2]+"/maps?q="+t[5].replace("query=","q=").replace("api=1","")+"&output=embed"}}},n=function(e,n,o){if(e)return o=o||"","object"===t.type(o)&&(o=t.param(o,!0)),t.each(n,function(t,n){e=e.replace("$"+t,n||"")}),o.length&&(e+=(e.indexOf("?")>0?"&":"?")+o),e};t(document).on("objectNeedsType.fb",function(o,i,a){var s,r,c,l,d,u,f,p=a.src||"",h=!1;s=t.extend(!0,{},e,a.opts.media),t.each(s,function(e,o){if(c=p.match(o.matcher)){if(h=o.type,f=e,u={},o.paramPlace&&c[o.paramPlace]){d=c[o.paramPlace],"?"==d[0]&&(d=d.substring(1)),d=d.split("&");for(var i=0;i<d.length;++i){var s=d[i].split("=",2);2==s.length&&(u[s[0]]=decodeURIComponent(s[1].replace(/\+/g," ")))}}return l=t.extend(!0,{},o.params,a.opts[e],u),p="function"===t.type(o.url)?o.url.call(this,c,l,a):n(o.url,c,l),r="function"===t.type(o.thumb)?o.thumb.call(this,c,l,a):n(o.thumb,c),"youtube"===e?p=p.replace(/&t=((\d+)m)?(\d+)s/,function(t,e,n,o){return"&start="+((n?60*parseInt(n,10):0)+parseInt(o,10))}):"vimeo"===e&&(p=p.replace("&%23","#")),!1}}),h?(a.opts.thumb||a.opts.$thumb&&a.opts.$thumb.length||(a.opts.thumb=r),"iframe"===h&&(a.opts=t.extend(!0,a.opts,{iframe:{preload:!1,attr:{scrolling:"no"}}})),t.extend(a,{type:h,src:p,origSrc:a.src,contentSource:f,contentType:"image"===h?"image":"gmap_place"==f||"gmap_search"==f?"map":"video"})):p&&(a.type=a.opts.defaultType)});var o={youtube:{src:"https://www.youtube.com/iframe_api",class:"YT",loading:!1,loaded:!1},vimeo:{src:"https://player.vimeo.com/api/player.js",class:"Vimeo",loading:!1,loaded:!1},load:function(t){var e,n=this;if(this[t].loaded)return void setTimeout(function(){n.done(t)});this[t].loading||(this[t].loading=!0,e=document.createElement("script"),e.type="text/javascript",e.src=this[t].src,"youtube"===t?window.onYouTubeIframeAPIReady=function(){n[t].loaded=!0,n.done(t)}:e.onload=function(){n[t].loaded=!0,n.done(t)},document.body.appendChild(e))},done:function(e){var n,o,i;"youtube"===e&&delete window.onYouTubeIframeAPIReady,(n=t.fancybox.getInstance())&&(o=n.current.$content.find("iframe"),"youtube"===e&&void 0!==YT&&YT?i=new YT.Player(o.attr("id"),{events:{onStateChange:function(t){0==t.data&&n.next()}}}):"vimeo"===e&&void 0!==Vimeo&&Vimeo&&(i=new Vimeo.Player(o),i.on("ended",function(){n.next()})))}};t(document).on({"afterShow.fb":function(t,e,n){e.group.length>1&&("youtube"===n.contentSource||"vimeo"===n.contentSource)&&o.load(n.contentSource)}})}(jQuery),function(t,e,n){"use strict";var o=function(){return t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.oRequestAnimationFrame||function(e){return t.setTimeout(e,1e3/60)}}(),i=function(){return t.cancelAnimationFrame||t.webkitCancelAnimationFrame||t.mozCancelAnimationFrame||t.oCancelAnimationFrame||function(e){t.clearTimeout(e)}}(),a=function(e){var n=[];e=e.originalEvent||e||t.e,e=e.touches&&e.touches.length?e.touches:e.changedTouches&&e.changedTouches.length?e.changedTouches:[e];for(var o in e)e[o].pageX?n.push({x:e[o].pageX,y:e[o].pageY}):e[o].clientX&&n.push({x:e[o].clientX,y:e[o].clientY});return n},s=function(t,e,n){return e&&t?"x"===n?t.x-e.x:"y"===n?t.y-e.y:Math.sqrt(Math.pow(t.x-e.x,2)+Math.pow(t.y-e.y,2)):0},r=function(t){if(t.is('a,area,button,[role="button"],input,label,select,summary,textarea,video,audio,iframe')||n.isFunction(t.get(0).onclick)||t.data("selectable"))return!0;for(var e=0,o=t[0].attributes,i=o.length;e<i;e++)if("data-fancybox-"===o[e].nodeName.substr(0,14))return!0;return!1},c=function(e){var n=t.getComputedStyle(e)["overflow-y"],o=t.getComputedStyle(e)["overflow-x"],i=("scroll"===n||"auto"===n)&&e.scrollHeight>e.clientHeight,a=("scroll"===o||"auto"===o)&&e.scrollWidth>e.clientWidth;return i||a},l=function(t){for(var e=!1;;){if(e=c(t.get(0)))break;if(t=t.parent(),!t.length||t.hasClass("fancybox-stage")||t.is("body"))break}return e},d=function(t){var e=this;e.instance=t,e.$bg=t.$refs.bg,e.$stage=t.$refs.stage,e.$container=t.$refs.container,e.destroy(),e.$container.on("touchstart.fb.touch mousedown.fb.touch",n.proxy(e,"ontouchstart"))};d.prototype.destroy=function(){var t=this;t.$container.off(".fb.touch"),n(e).off(".fb.touch"),t.requestId&&(i(t.requestId),t.requestId=null),t.tapped&&(clearTimeout(t.tapped),t.tapped=null)},d.prototype.ontouchstart=function(o){var i=this,c=n(o.target),d=i.instance,u=d.current,f=u.$slide,p=u.$content,h="touchstart"==o.type;if(h&&i.$container.off("mousedown.fb.touch"),(!o.originalEvent||2!=o.originalEvent.button)&&f.length&&c.length&&!r(c)&&!r(c.parent())&&(c.is("img")||!(o.originalEvent.clientX>c[0].clientWidth+c.offset().left))){if(!u||d.isAnimating||u.$slide.hasClass("fancybox-animated"))return o.stopPropagation(),void o.preventDefault();i.realPoints=i.startPoints=a(o),i.startPoints.length&&(u.touch&&o.stopPropagation(),i.startEvent=o,i.canTap=!0,i.$target=c,i.$content=p,i.opts=u.opts.touch,i.isPanning=!1,i.isSwiping=!1,i.isZooming=!1,i.isScrolling=!1,i.canPan=d.canPan(),i.startTime=(new Date).getTime(),i.distanceX=i.distanceY=i.distance=0,i.canvasWidth=Math.round(f[0].clientWidth),i.canvasHeight=Math.round(f[0].clientHeight),i.contentLastPos=null,i.contentStartPos=n.fancybox.getTranslate(i.$content)||{top:0,left:0},i.sliderStartPos=n.fancybox.getTranslate(f),i.stagePos=n.fancybox.getTranslate(d.$refs.stage),i.sliderStartPos.top-=i.stagePos.top,i.sliderStartPos.left-=i.stagePos.left,i.contentStartPos.top-=i.stagePos.top,i.contentStartPos.left-=i.stagePos.left,n(e).off(".fb.touch").on(h?"touchend.fb.touch touchcancel.fb.touch":"mouseup.fb.touch mouseleave.fb.touch",n.proxy(i,"ontouchend")).on(h?"touchmove.fb.touch":"mousemove.fb.touch",n.proxy(i,"ontouchmove")),n.fancybox.isMobile&&e.addEventListener("scroll",i.onscroll,!0),((i.opts||i.canPan)&&(c.is(i.$stage)||i.$stage.find(c).length)||(c.is(".fancybox-image")&&o.preventDefault(),n.fancybox.isMobile&&c.parents(".fancybox-caption").length))&&(i.isScrollable=l(c)||l(c.parent()),n.fancybox.isMobile&&i.isScrollable||o.preventDefault(),(1===i.startPoints.length||u.hasError)&&(i.canPan?(n.fancybox.stop(i.$content),i.isPanning=!0):i.isSwiping=!0,i.$container.addClass("fancybox-is-grabbing")),2===i.startPoints.length&&"image"===u.type&&(u.isLoaded||u.$ghost)&&(i.canTap=!1,i.isSwiping=!1,i.isPanning=!1,i.isZooming=!0,n.fancybox.stop(i.$content),i.centerPointStartX=.5*(i.startPoints[0].x+i.startPoints[1].x)-n(t).scrollLeft(),i.centerPointStartY=.5*(i.startPoints[0].y+i.startPoints[1].y)-n(t).scrollTop(),i.percentageOfImageAtPinchPointX=(i.centerPointStartX-i.contentStartPos.left)/i.contentStartPos.width,i.percentageOfImageAtPinchPointY=(i.centerPointStartY-i.contentStartPos.top)/i.contentStartPos.height,i.startDistanceBetweenFingers=s(i.startPoints[0],i.startPoints[1]))))}},d.prototype.onscroll=function(t){var n=this;n.isScrolling=!0,e.removeEventListener("scroll",n.onscroll,!0)},d.prototype.ontouchmove=function(t){var e=this;return void 0!==t.originalEvent.buttons&&0===t.originalEvent.buttons?void e.ontouchend(t):e.isScrolling?void(e.canTap=!1):(e.newPoints=a(t),void((e.opts||e.canPan)&&e.newPoints.length&&e.newPoints.length&&(e.isSwiping&&!0===e.isSwiping||t.preventDefault(),e.distanceX=s(e.newPoints[0],e.startPoints[0],"x"),e.distanceY=s(e.newPoints[0],e.startPoints[0],"y"),e.distance=s(e.newPoints[0],e.startPoints[0]),e.distance>0&&(e.isSwiping?e.onSwipe(t):e.isPanning?e.onPan():e.isZooming&&e.onZoom()))))},d.prototype.onSwipe=function(e){var a,s=this,r=s.instance,c=s.isSwiping,l=s.sliderStartPos.left||0;if(!0!==c)"x"==c&&(s.distanceX>0&&(s.instance.group.length<2||0===s.instance.current.index&&!s.instance.current.opts.loop)?l+=Math.pow(s.distanceX,.8):s.distanceX<0&&(s.instance.group.length<2||s.instance.current.index===s.instance.group.length-1&&!s.instance.current.opts.loop)?l-=Math.pow(-s.distanceX,.8):l+=s.distanceX),s.sliderLastPos={top:"x"==c?0:s.sliderStartPos.top+s.distanceY,left:l},s.requestId&&(i(s.requestId),s.requestId=null),s.requestId=o(function(){s.sliderLastPos&&(n.each(s.instance.slides,function(t,e){var o=e.pos-s.instance.currPos;n.fancybox.setTranslate(e.$slide,{top:s.sliderLastPos.top,left:s.sliderLastPos.left+o*s.canvasWidth+o*e.opts.gutter})}),s.$container.addClass("fancybox-is-sliding"))});else if(Math.abs(s.distance)>10){if(s.canTap=!1,r.group.length<2&&s.opts.vertical?s.isSwiping="y":r.isDragging||!1===s.opts.vertical||"auto"===s.opts.vertical&&n(t).width()>800?s.isSwiping="x":(a=Math.abs(180*Math.atan2(s.distanceY,s.distanceX)/Math.PI),s.isSwiping=a>45&&a<135?"y":"x"),"y"===s.isSwiping&&n.fancybox.isMobile&&s.isScrollable)return void(s.isScrolling=!0);r.isDragging=s.isSwiping,s.startPoints=s.newPoints,n.each(r.slides,function(t,e){var o,i;n.fancybox.stop(e.$slide),o=n.fancybox.getTranslate(e.$slide),i=n.fancybox.getTranslate(r.$refs.stage),e.$slide.css({transform:"",opacity:"","transition-duration":""}).removeClass("fancybox-animated").removeClass(function(t,e){return(e.match(/(^|\s)fancybox-fx-\S+/g)||[]).join(" ")}),e.pos===r.current.pos&&(s.sliderStartPos.top=o.top-i.top,s.sliderStartPos.left=o.left-i.left),n.fancybox.setTranslate(e.$slide,{top:o.top-i.top,left:o.left-i.left})}),r.SlideShow&&r.SlideShow.isActive&&r.SlideShow.stop()}},d.prototype.onPan=function(){var t=this;if(s(t.newPoints[0],t.realPoints[0])<(n.fancybox.isMobile?10:5))return void(t.startPoints=t.newPoints);t.canTap=!1,t.contentLastPos=t.limitMovement(),t.requestId&&i(t.requestId),t.requestId=o(function(){n.fancybox.setTranslate(t.$content,t.contentLastPos)})},d.prototype.limitMovement=function(){var t,e,n,o,i,a,s=this,r=s.canvasWidth,c=s.canvasHeight,l=s.distanceX,d=s.distanceY,u=s.contentStartPos,f=u.left,p=u.top,h=u.width,g=u.height;return i=h>r?f+l:f,a=p+d,t=Math.max(0,.5*r-.5*h),e=Math.max(0,.5*c-.5*g),n=Math.min(r-h,.5*r-.5*h),o=Math.min(c-g,.5*c-.5*g),l>0&&i>t&&(i=t-1+Math.pow(-t+f+l,.8)||0),l<0&&i<n&&(i=n+1-Math.pow(n-f-l,.8)||0),d>0&&a>e&&(a=e-1+Math.pow(-e+p+d,.8)||0),d<0&&a<o&&(a=o+1-Math.pow(o-p-d,.8)||0),{top:a,left:i}},d.prototype.limitPosition=function(t,e,n,o){var i=this,a=i.canvasWidth,s=i.canvasHeight;return n>a?(t=t>0?0:t,t=t<a-n?a-n:t):t=Math.max(0,a/2-n/2),o>s?(e=e>0?0:e,e=e<s-o?s-o:e):e=Math.max(0,s/2-o/2),{top:e,left:t}},d.prototype.onZoom=function(){var e=this,a=e.contentStartPos,r=a.width,c=a.height,l=a.left,d=a.top,u=s(e.newPoints[0],e.newPoints[1]),f=u/e.startDistanceBetweenFingers,p=Math.floor(r*f),h=Math.floor(c*f),g=(r-p)*e.percentageOfImageAtPinchPointX,b=(c-h)*e.percentageOfImageAtPinchPointY,m=(e.newPoints[0].x+e.newPoints[1].x)/2-n(t).scrollLeft(),v=(e.newPoints[0].y+e.newPoints[1].y)/2-n(t).scrollTop(),y=m-e.centerPointStartX,x=v-e.centerPointStartY,w=l+(g+y),$=d+(b+x),S={top:$,left:w,scaleX:f,scaleY:f};e.canTap=!1,e.newWidth=p,e.newHeight=h,e.contentLastPos=S,e.requestId&&i(e.requestId),e.requestId=o(function(){n.fancybox.setTranslate(e.$content,e.contentLastPos)})},d.prototype.ontouchend=function(t){var o=this,s=o.isSwiping,r=o.isPanning,c=o.isZooming,l=o.isScrolling;if(o.endPoints=a(t),o.dMs=Math.max((new Date).getTime()-o.startTime,1),o.$container.removeClass("fancybox-is-grabbing"),n(e).off(".fb.touch"),e.removeEventListener("scroll",o.onscroll,!0),o.requestId&&(i(o.requestId),o.requestId=null),o.isSwiping=!1,o.isPanning=!1,o.isZooming=!1,o.isScrolling=!1,o.instance.isDragging=!1,o.canTap)return o.onTap(t);o.speed=100,o.velocityX=o.distanceX/o.dMs*.5,o.velocityY=o.distanceY/o.dMs*.5,r?o.endPanning():c?o.endZooming():o.endSwiping(s,l)},d.prototype.endSwiping=function(t,e){var o=this,i=!1,a=o.instance.group.length,s=Math.abs(o.distanceX),r="x"==t&&a>1&&(o.dMs>130&&s>10||s>50);o.sliderLastPos=null,"y"==t&&!e&&Math.abs(o.distanceY)>50?(n.fancybox.animate(o.instance.current.$slide,{top:o.sliderStartPos.top+o.distanceY+150*o.velocityY,opacity:0},200),i=o.instance.close(!0,250)):r&&o.distanceX>0?i=o.instance.previous(300):r&&o.distanceX<0&&(i=o.instance.next(300)),!1!==i||"x"!=t&&"y"!=t||o.instance.centerSlide(200),o.$container.removeClass("fancybox-is-sliding")},d.prototype.endPanning=function(){var t,e,o,i=this;i.contentLastPos&&(!1===i.opts.momentum||i.dMs>350?(t=i.contentLastPos.left,e=i.contentLastPos.top):(t=i.contentLastPos.left+500*i.velocityX,e=i.contentLastPos.top+500*i.velocityY),o=i.limitPosition(t,e,i.contentStartPos.width,i.contentStartPos.height),o.width=i.contentStartPos.width,o.height=i.contentStartPos.height,n.fancybox.animate(i.$content,o,366))},d.prototype.endZooming=function(){var t,e,o,i,a=this,s=a.instance.current,r=a.newWidth,c=a.newHeight;a.contentLastPos&&(t=a.contentLastPos.left,e=a.contentLastPos.top,i={top:e,left:t,width:r,height:c,scaleX:1,scaleY:1},n.fancybox.setTranslate(a.$content,i),r<a.canvasWidth&&c<a.canvasHeight?a.instance.scaleToFit(150):r>s.width||c>s.height?a.instance.scaleToActual(a.centerPointStartX,a.centerPointStartY,150):(o=a.limitPosition(t,e,r,c),n.fancybox.animate(a.$content,o,150)))},d.prototype.onTap=function(e){var o,i=this,s=n(e.target),r=i.instance,c=r.current,l=e&&a(e)||i.startPoints,d=l[0]?l[0].x-n(t).scrollLeft()-i.stagePos.left:0,u=l[0]?l[0].y-n(t).scrollTop()-i.stagePos.top:0,f=function(t){var o=c.opts[t];if(n.isFunction(o)&&(o=o.apply(r,[c,e])),o)switch(o){case"close":r.close(i.startEvent);break;case"toggleControls":r.toggleControls();break;case"next":r.next();break;case"nextOrClose":r.group.length>1?r.next():r.close(i.startEvent);break;case"zoom":"image"==c.type&&(c.isLoaded||c.$ghost)&&(r.canPan()?r.scaleToFit():r.isScaledDown()?r.scaleToActual(d,u):r.group.length<2&&r.close(i.startEvent))}};if((!e.originalEvent||2!=e.originalEvent.button)&&(s.is("img")||!(d>s[0].clientWidth+s.offset().left))){if(s.is(".fancybox-bg,.fancybox-inner,.fancybox-outer,.fancybox-container"))o="Outside";else if(s.is(".fancybox-slide"))o="Slide";else{if(!r.current.$content||!r.current.$content.find(s).addBack().filter(s).length)return;o="Content"}if(i.tapped){if(clearTimeout(i.tapped),i.tapped=null,Math.abs(d-i.tapX)>50||Math.abs(u-i.tapY)>50)return this;f("dblclick"+o)}else i.tapX=d,i.tapY=u,c.opts["dblclick"+o]&&c.opts["dblclick"+o]!==c.opts["click"+o]?i.tapped=setTimeout(function(){i.tapped=null,r.isAnimating||f("click"+o)},500):f("click"+o);return this}},n(e).on("onActivate.fb",function(t,e){e&&!e.Guestures&&(e.Guestures=new d(e))}).on("beforeClose.fb",function(t,e){e&&e.Guestures&&e.Guestures.destroy()})}(window,document,jQuery),function(t,e){"use strict";e.extend(!0,e.fancybox.defaults,{btnTpl:{slideShow:'<button data-fancybox-play class="fancybox-button fancybox-button--play" title="{{PLAY_START}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.5 5.4v13.2l11-6.6z"/></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8.33 5.75h2.2v12.5h-2.2V5.75zm5.15 0h2.2v12.5h-2.2V5.75z"/></svg></button>'},slideShow:{autoStart:!1,speed:3e3,progress:!0}});var n=function(t){this.instance=t,this.init()};e.extend(n.prototype,{timer:null,isActive:!1,$button:null,init:function(){var t=this,n=t.instance,o=n.group[n.currIndex].opts.slideShow;t.$button=n.$refs.toolbar.find("[data-fancybox-play]").on("click",function(){t.toggle()}),n.group.length<2||!o?t.$button.hide():o.progress&&(t.$progress=e('<div class="fancybox-progress"></div>').appendTo(n.$refs.inner))},set:function(t){var n=this,o=n.instance,i=o.current;i&&(!0===t||i.opts.loop||o.currIndex<o.group.length-1)?n.isActive&&"video"!==i.contentType&&(n.$progress&&e.fancybox.animate(n.$progress.show(),{scaleX:1},i.opts.slideShow.speed),n.timer=setTimeout(function(){o.current.opts.loop||o.current.index!=o.group.length-1?o.next():o.jumpTo(0)},i.opts.slideShow.speed)):(n.stop(),o.idleSecondsCounter=0,o.showControls())},clear:function(){var t=this;clearTimeout(t.timer),t.timer=null,t.$progress&&t.$progress.removeAttr("style").hide()},start:function(){var t=this,e=t.instance.current;e&&(t.$button.attr("title",(e.opts.i18n[e.opts.lang]||e.opts.i18n.en).PLAY_STOP).removeClass("fancybox-button--play").addClass("fancybox-button--pause"),t.isActive=!0,e.isComplete&&t.set(!0),t.instance.trigger("onSlideShowChange",!0))},stop:function(){var t=this,e=t.instance.current;t.clear(),t.$button.attr("title",(e.opts.i18n[e.opts.lang]||e.opts.i18n.en).PLAY_START).removeClass("fancybox-button--pause").addClass("fancybox-button--play"),t.isActive=!1,t.instance.trigger("onSlideShowChange",!1),t.$progress&&t.$progress.removeAttr("style").hide()},toggle:function(){var t=this;t.isActive?t.stop():t.start()}}),e(t).on({"onInit.fb":function(t,e){e&&!e.SlideShow&&(e.SlideShow=new n(e))},"beforeShow.fb":function(t,e,n,o){var i=e&&e.SlideShow;o?i&&n.opts.slideShow.autoStart&&i.start():i&&i.isActive&&i.clear()},"afterShow.fb":function(t,e,n){var o=e&&e.SlideShow;o&&o.isActive&&o.set()},"afterKeydown.fb":function(n,o,i,a,s){var r=o&&o.SlideShow;!r||!i.opts.slideShow||80!==s&&32!==s||e(t.activeElement).is("button,a,input")||(a.preventDefault(),r.toggle())},"beforeClose.fb onDeactivate.fb":function(t,e){var n=e&&e.SlideShow;n&&n.stop()}}),e(t).on("visibilitychange",function(){var n=e.fancybox.getInstance(),o=n&&n.SlideShow;o&&o.isActive&&(t.hidden?o.clear():o.set())})}(document,jQuery),function(t,e){"use strict";var n=function(){for(var e=[["requestFullscreen","exitFullscreen","fullscreenElement","fullscreenEnabled","fullscreenchange","fullscreenerror"],["webkitRequestFullscreen","webkitExitFullscreen","webkitFullscreenElement","webkitFullscreenEnabled","webkitfullscreenchange","webkitfullscreenerror"],["webkitRequestFullScreen","webkitCancelFullScreen","webkitCurrentFullScreenElement","webkitCancelFullScreen","webkitfullscreenchange","webkitfullscreenerror"],["mozRequestFullScreen","mozCancelFullScreen","mozFullScreenElement","mozFullScreenEnabled","mozfullscreenchange","mozfullscreenerror"],["msRequestFullscreen","msExitFullscreen","msFullscreenElement","msFullscreenEnabled","MSFullscreenChange","MSFullscreenError"]],n={},o=0;o<e.length;o++){var i=e[o];if(i&&i[1]in t){for(var a=0;a<i.length;a++)n[e[0][a]]=i[a];return n}}return!1}();if(n){var o={request:function(e){e=e||t.documentElement,e[n.requestFullscreen](e.ALLOW_KEYBOARD_INPUT)},exit:function(){t[n.exitFullscreen]()},toggle:function(e){e=e||t.documentElement,this.isFullscreen()?this.exit():this.request(e)},isFullscreen:function(){return Boolean(t[n.fullscreenElement])},enabled:function(){return Boolean(t[n.fullscreenEnabled])}};e.extend(!0,e.fancybox.defaults,{btnTpl:{fullScreen:'<button data-fancybox-fullscreen class="fancybox-button fancybox-button--fsenter" title="{{FULL_SCREEN}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/></svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 16h3v3h2v-5H5zm3-8H5v2h5V5H8zm6 11h2v-3h3v-2h-5zm2-11V5h-2v5h5V8z"/></svg></button>'},fullScreen:{autoStart:!1}}),e(t).on(n.fullscreenchange,function(){var t=o.isFullscreen(),n=e.fancybox.getInstance();n&&(n.current&&"image"===n.current.type&&n.isAnimating&&(n.isAnimating=!1,n.update(!0,!0,0),n.isComplete||n.complete()),n.trigger("onFullscreenChange",t),n.$refs.container.toggleClass("fancybox-is-fullscreen",t),n.$refs.toolbar.find("[data-fancybox-fullscreen]").toggleClass("fancybox-button--fsenter",!t).toggleClass("fancybox-button--fsexit",t))})}e(t).on({"onInit.fb":function(t,e){var i;if(!n)return void e.$refs.toolbar.find("[data-fancybox-fullscreen]").remove();e&&e.group[e.currIndex].opts.fullScreen?(i=e.$refs.container,i.on("click.fb-fullscreen","[data-fancybox-fullscreen]",function(t){t.stopPropagation(),t.preventDefault(),o.toggle()}),e.opts.fullScreen&&!0===e.opts.fullScreen.autoStart&&o.request(),e.FullScreen=o):e&&e.$refs.toolbar.find("[data-fancybox-fullscreen]").hide()},"afterKeydown.fb":function(t,e,n,o,i){e&&e.FullScreen&&70===i&&(o.preventDefault(),e.FullScreen.toggle())},"beforeClose.fb":function(t,e){e&&e.FullScreen&&e.$refs.container.hasClass("fancybox-is-fullscreen")&&o.exit()}})}(document,jQuery),function(t,e){"use strict";var n="fancybox-thumbs";e.fancybox.defaults=e.extend(!0,{btnTpl:{thumbs:'<button data-fancybox-thumbs class="fancybox-button fancybox-button--thumbs" title="{{THUMBS}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14.59 14.59h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76H5.65v-3.76zm8.94-4.47h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76h-3.76v-3.76zm-4.47 0h3.76v3.76H5.65v-3.76zm8.94-4.47h3.76v3.76h-3.76V5.65zm-4.47 0h3.76v3.76h-3.76V5.65zm-4.47 0h3.76v3.76H5.65V5.65z"/></svg></button>'},thumbs:{autoStart:!1,hideOnClose:!0,parentEl:".fancybox-container",axis:"y"}},e.fancybox.defaults);var o=function(t){this.init(t)};e.extend(o.prototype,{$button:null,$grid:null,$list:null,isVisible:!1,isActive:!1,init:function(t){var e=this,n=t.group,o=0;e.instance=t,e.opts=n[t.currIndex].opts.thumbs,t.Thumbs=e,e.$button=t.$refs.toolbar.find("[data-fancybox-thumbs]");for(var i=0,a=n.length;i<a&&(n[i].thumb&&o++,!(o>1));i++);o>1&&e.opts?(e.$button.removeAttr("style").on("click",function(){e.toggle()}),e.isActive=!0):e.$button.hide()},create:function(){var t,o=this,i=o.instance,a=o.opts.parentEl,s=[];o.$grid||(o.$grid=e('<div class="'+n+" "+n+"-"+o.opts.axis+'"></div>').appendTo(i.$refs.container.find(a).addBack().filter(a)),o.$grid.on("click","a",function(){i.jumpTo(e(this).attr("data-index"))})),o.$list||(o.$list=e('<div class="'+n+'__list">').appendTo(o.$grid)),e.each(i.group,function(e,n){t=n.thumb,t||"image"!==n.type||(t=n.src),s.push('<a href="javascript:;" tabindex="0" data-index="'+e+'"'+(t&&t.length?' style="background-image:url('+t+')"':'class="fancybox-thumbs-missing"')+"></a>")}),o.$list[0].innerHTML=s.join(""),"x"===o.opts.axis&&o.$list.width(parseInt(o.$grid.css("padding-right"),10)+i.group.length*o.$list.children().eq(0).outerWidth(!0))},focus:function(t){var e,n,o=this,i=o.$list,a=o.$grid;o.instance.current&&(e=i.children().removeClass("fancybox-thumbs-active").filter('[data-index="'+o.instance.current.index+'"]').addClass("fancybox-thumbs-active"),n=e.position(),"y"===o.opts.axis&&(n.top<0||n.top>i.height()-e.outerHeight())?i.stop().animate({scrollTop:i.scrollTop()+n.top},t):"x"===o.opts.axis&&(n.left<a.scrollLeft()||n.left>a.scrollLeft()+(a.width()-e.outerWidth()))&&i.parent().stop().animate({scrollLeft:n.left},t))},update:function(){var t=this;t.instance.$refs.container.toggleClass("fancybox-show-thumbs",this.isVisible),t.isVisible?(t.$grid||t.create(),t.instance.trigger("onThumbsShow"),t.focus(0)):t.$grid&&t.instance.trigger("onThumbsHide"),t.instance.update()},hide:function(){this.isVisible=!1,this.update()},show:function(){this.isVisible=!0,this.update()},toggle:function(){this.isVisible=!this.isVisible,this.update()}}),e(t).on({"onInit.fb":function(t,e){var n;e&&!e.Thumbs&&(n=new o(e),n.isActive&&!0===n.opts.autoStart&&n.show())},"beforeShow.fb":function(t,e,n,o){var i=e&&e.Thumbs;i&&i.isVisible&&i.focus(o?0:250)},"afterKeydown.fb":function(t,e,n,o,i){var a=e&&e.Thumbs;a&&a.isActive&&71===i&&(o.preventDefault(),a.toggle())},"beforeClose.fb":function(t,e){var n=e&&e.Thumbs;n&&n.isVisible&&!1!==n.opts.hideOnClose&&n.$grid.hide()}})}(document,jQuery),function(t,e){"use strict";function n(t){var e={"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;","/":"&#x2F;","`":"&#x60;","=":"&#x3D;"};return String(t).replace(/[&<>"'`=\/]/g,function(t){return e[t]})}e.extend(!0,e.fancybox.defaults,{btnTpl:{share:'<button data-fancybox-share class="fancybox-button fancybox-button--share" title="{{SHARE}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M2.55 19c1.4-8.4 9.1-9.8 11.9-9.8V5l7 7-7 6.3v-3.5c-2.8 0-10.5 2.1-11.9 4.2z"/></svg></button>'},share:{url:function(t,e){return!t.currentHash&&"inline"!==e.type&&"html"!==e.type&&(e.origSrc||e.src)||window.location},
tpl:'<div class="fancybox-share"><h1>{{SHARE}}</h1><p><a class="fancybox-share__button fancybox-share__button--fb" href="https://www.facebook.com/sharer/sharer.php?u={{url}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m287 456v-299c0-21 6-35 35-35h38v-63c-7-1-29-3-55-3-54 0-91 33-91 94v306m143-254h-205v72h196" /></svg><span>Facebook</span></a><a class="fancybox-share__button fancybox-share__button--tw" href="https://twitter.com/intent/tweet?url={{url}}&text={{descr}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m456 133c-14 7-31 11-47 13 17-10 30-27 37-46-15 10-34 16-52 20-61-62-157-7-141 75-68-3-129-35-169-85-22 37-11 86 26 109-13 0-26-4-37-9 0 39 28 72 65 80-12 3-25 4-37 2 10 33 41 57 77 57-42 30-77 38-122 34 170 111 378-32 359-208 16-11 30-25 41-42z" /></svg><span>Twitter</span></a><a class="fancybox-share__button fancybox-share__button--pt" href="https://www.pinterest.com/pin/create/button/?url={{url}}&description={{descr}}&media={{media}}"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m265 56c-109 0-164 78-164 144 0 39 15 74 47 87 5 2 10 0 12-5l4-19c2-6 1-8-3-13-9-11-15-25-15-45 0-58 43-110 113-110 62 0 96 38 96 88 0 67-30 122-73 122-24 0-42-19-36-44 6-29 20-60 20-81 0-19-10-35-31-35-25 0-44 26-44 60 0 21 7 36 7 36l-30 125c-8 37-1 83 0 87 0 3 4 4 5 2 2-3 32-39 42-75l16-64c8 16 31 29 56 29 74 0 124-67 124-157 0-69-58-132-146-132z" fill="#fff"/></svg><span>Pinterest</span></a></p><p><input class="fancybox-share__input" type="text" value="{{url_raw}}" onclick="select()" /></p></div>'}}),e(t).on("click","[data-fancybox-share]",function(){var t,o,i=e.fancybox.getInstance(),a=i.current||null;a&&("function"===e.type(a.opts.share.url)&&(t=a.opts.share.url.apply(a,[i,a])),o=a.opts.share.tpl.replace(/\{\{media\}\}/g,"image"===a.type?encodeURIComponent(a.src):"").replace(/\{\{url\}\}/g,encodeURIComponent(t)).replace(/\{\{url_raw\}\}/g,n(t)).replace(/\{\{descr\}\}/g,i.$caption?encodeURIComponent(i.$caption.text()):""),e.fancybox.open({src:i.translate(i,o),type:"html",opts:{touch:!1,animationEffect:!1,afterLoad:function(t,e){i.$refs.container.one("beforeClose.fb",function(){t.close(null,0)}),e.$content.find(".fancybox-share__button").click(function(){return window.open(this.href,"Share","width=550, height=450"),!1})},mobile:{autoFocus:!1}}}))})}(document,jQuery),function(t,e,n){"use strict";function o(){var e=t.location.hash.substr(1),n=e.split("-"),o=n.length>1&&/^\+?\d+$/.test(n[n.length-1])?parseInt(n.pop(-1),10)||1:1,i=n.join("-");return{hash:e,index:o<1?1:o,gallery:i}}function i(t){""!==t.gallery&&n("[data-fancybox='"+n.escapeSelector(t.gallery)+"']").eq(t.index-1).focus().trigger("click.fb-start")}function a(t){var e,n;return!!t&&(e=t.current?t.current.opts:t.opts,""!==(n=e.hash||(e.$orig?e.$orig.data("fancybox")||e.$orig.data("fancybox-trigger"):""))&&n)}n.escapeSelector||(n.escapeSelector=function(t){return(t+"").replace(/([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g,function(t,e){return e?"\0"===t?"�":t.slice(0,-1)+"\\"+t.charCodeAt(t.length-1).toString(16)+" ":"\\"+t})}),n(function(){!1!==n.fancybox.defaults.hash&&(n(e).on({"onInit.fb":function(t,e){var n,i;!1!==e.group[e.currIndex].opts.hash&&(n=o(),(i=a(e))&&n.gallery&&i==n.gallery&&(e.currIndex=n.index-1))},"beforeShow.fb":function(n,o,i,s){var r;i&&!1!==i.opts.hash&&(r=a(o))&&(o.currentHash=r+(o.group.length>1?"-"+(i.index+1):""),t.location.hash!=="#"+o.currentHash&&(s&&!o.origHash&&(o.origHash=t.location.hash),o.hashTimer&&clearTimeout(o.hashTimer),o.hashTimer=setTimeout(function(){"replaceState"in t.history?(t.history[s?"pushState":"replaceState"]({},e.title,t.location.pathname+t.location.search+"#"+o.currentHash),s&&(o.hasCreatedHistory=!0)):t.location.hash=o.currentHash,o.hashTimer=null},300)))},"beforeClose.fb":function(n,o,i){i&&!1!==i.opts.hash&&(clearTimeout(o.hashTimer),o.currentHash&&o.hasCreatedHistory?t.history.back():o.currentHash&&("replaceState"in t.history?t.history.replaceState({},e.title,t.location.pathname+t.location.search+(o.origHash||"")):t.location.hash=o.origHash),o.currentHash=null)}}),n(t).on("hashchange.fb",function(){var t=o(),e=null;n.each(n(".fancybox-container").get().reverse(),function(t,o){var i=n(o).data("FancyBox");if(i&&i.currentHash)return e=i,!1}),e?e.currentHash===t.gallery+"-"+t.index||1===t.index&&e.currentHash==t.gallery||(e.currentHash=null,e.close()):""!==t.gallery&&i(t)}),setTimeout(function(){n.fancybox.getInstance()||i(o())},50))})}(window,document,jQuery),function(t,e){"use strict";var n=(new Date).getTime();e(t).on({"onInit.fb":function(t,e,o){e.$refs.stage.on("mousewheel DOMMouseScroll wheel MozMousePixelScroll",function(t){var o=e.current,i=(new Date).getTime();e.group.length<2||!1===o.opts.wheel||"auto"===o.opts.wheel&&"image"!==o.type||(t.preventDefault(),t.stopPropagation(),o.$slide.hasClass("fancybox-animated")||(t=t.originalEvent||t,i-n<250||(n=i,e[(-t.deltaY||-t.deltaX||t.wheelDelta||-t.detail)<0?"next":"previous"]())))})}})}(document,jQuery);
;
/*!
  SerializeJSON jQuery plugin.
  https://github.com/marioizquierdo/jquery.serializeJSON
  version 3.2.1 (Feb, 2021)

  Copyright (c) 2012-2021 Mario Izquierdo
  Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
  and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
*/
!function(e){if("function"==typeof define&&define.amd)define(["jquery"],e);else if("object"==typeof exports){var n=require("jquery");module.exports=e(n)}else e(window.jQuery||window.Zepto||window.$)}(function(e){"use strict";var n=/\r?\n/g,r=/^(?:submit|button|image|reset|file)$/i,t=/^(?:input|select|textarea|keygen)/i,i=/^(?:checkbox|radio)$/i;e.fn.serializeJSON=function(n){var r=e.serializeJSON,t=r.setupOpts(n),i=e.extend({},t.defaultTypes,t.customTypes),a=r.serializeArray(this,t),u={};return e.each(a,function(n,a){var s=a.name,l=e(a.el).attr("data-value-type");if(!l&&!t.disableColonTypes){var o=r.splitType(a.name);s=o[0],l=o[1]}if("skip"!==l){l||(l=t.defaultType);var p=r.applyTypeFunc(a.name,a.value,l,a.el,i);if(p||!r.shouldSkipFalsy(a.name,s,l,a.el,t)){var f=r.splitInputNameIntoKeysArray(s);r.deepSet(u,f,p,t)}}}),u},e.serializeJSON={defaultOptions:{},defaultBaseOptions:{checkboxUncheckedValue:void 0,useIntKeysAsArrayIndex:!1,skipFalsyValuesForTypes:[],skipFalsyValuesForFields:[],disableColonTypes:!1,customTypes:{},defaultTypes:{string:function(e){return String(e)},number:function(e){return Number(e)},boolean:function(e){return-1===["false","null","undefined","","0"].indexOf(e)},null:function(e){return-1===["false","null","undefined","","0"].indexOf(e)?e:null},array:function(e){return JSON.parse(e)},object:function(e){return JSON.parse(e)},skip:null},defaultType:"string"},setupOpts:function(n){null==n&&(n={});var r=e.serializeJSON,t=["checkboxUncheckedValue","useIntKeysAsArrayIndex","skipFalsyValuesForTypes","skipFalsyValuesForFields","disableColonTypes","customTypes","defaultTypes","defaultType"];for(var i in n)if(-1===t.indexOf(i))throw new Error("serializeJSON ERROR: invalid option '"+i+"'. Please use one of "+t.join(", "));return e.extend({},r.defaultBaseOptions,r.defaultOptions,n)},serializeArray:function(a,u){null==u&&(u={});var s=e.serializeJSON;return a.map(function(){var n=e.prop(this,"elements");return n?e.makeArray(n):this}).filter(function(){var n=e(this),a=this.type;return this.name&&!n.is(":disabled")&&t.test(this.nodeName)&&!r.test(a)&&(this.checked||!i.test(a)||null!=s.getCheckboxUncheckedValue(n,u))}).map(function(r,t){var a=e(this),l=a.val(),p=this.type;return null==l?null:(i.test(p)&&!this.checked&&(l=s.getCheckboxUncheckedValue(a,u)),o(l)?e.map(l,function(e){return{name:t.name,value:e.replace(n,"\r\n"),el:t}}):{name:t.name,value:l.replace(n,"\r\n"),el:t})}).get()},getCheckboxUncheckedValue:function(e,n){var r=e.attr("data-unchecked-value");return null==r&&(r=n.checkboxUncheckedValue),r},applyTypeFunc:function(e,n,r,t,i){var u=i[r];if(!u)throw new Error("serializeJSON ERROR: Invalid type "+r+" found in input name '"+e+"', please use one of "+a(i).join(", "));return u(n,t)},splitType:function(e){var n=e.split(":");if(n.length>1){var r=n.pop();return[n.join(":"),r]}return[e,""]},shouldSkipFalsy:function(n,r,t,i,a){var u=e(i).attr("data-skip-falsy");if(null!=u)return"false"!==u;var s=a.skipFalsyValuesForFields;if(s&&(-1!==s.indexOf(r)||-1!==s.indexOf(n)))return!0;var l=a.skipFalsyValuesForTypes;return!(!l||-1===l.indexOf(t))},splitInputNameIntoKeysArray:function(n){var r=n.split("[");return""===(r=e.map(r,function(e){return e.replace(/\]/g,"")}))[0]&&r.shift(),r},deepSet:function(n,r,t,i){null==i&&(i={});var a=e.serializeJSON;if(s(n))throw new Error("ArgumentError: param 'o' expected to be an object or array, found undefined");if(!r||0===r.length)throw new Error("ArgumentError: param 'keys' expected to be an array with least one element");var p=r[0];if(1!==r.length){var f=r[1],c=r.slice(1);if(""===p){var d=n.length-1,y=n[d];p=u(y)&&s(a.deepGet(y,c))?d:d+1}""===f?!s(n[p])&&o(n[p])||(n[p]=[]):i.useIntKeysAsArrayIndex&&l(f)?!s(n[p])&&o(n[p])||(n[p]=[]):!s(n[p])&&u(n[p])||(n[p]={}),a.deepSet(n[p],c,t,i)}else""===p?n.push(t):n[p]=t},deepGet:function(n,r){var t=e.serializeJSON;if(s(n)||s(r)||0===r.length||!u(n)&&!o(n))return n;var i=r[0];if(""!==i){if(1===r.length)return n[i];var a=r.slice(1);return t.deepGet(n[i],a)}}};var a=function(e){if(Object.keys)return Object.keys(e);var n,r=[];for(n in e)r.push(n);return r},u=function(e){return e===Object(e)},s=function(e){return void 0===e},l=function(e){return/^[0-9]+$/.test(String(e))},o=Array.isArray||function(e){return"[object Array]"===Object.prototype.toString.call(e)}});

;
!function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t():"function"==typeof define&&define.amd?define([],t):"object"==typeof exports?exports.AirDatepicker=t():e.AirDatepicker=t()}(this,(function(){return function(){"use strict";var e={d:function(t,i){for(var s in i)e.o(i,s)&&!e.o(t,s)&&Object.defineProperty(t,s,{enumerable:!0,get:i[s]})},o:function(e,t){return Object.prototype.hasOwnProperty.call(e,t)}},t={};e.d(t,{default:function(){return K}});var i={days:"days",months:"months",years:"years",day:"day",month:"month",year:"year",eventChangeViewDate:"changeViewDate",eventChangeCurrentView:"changeCurrentView",eventChangeFocusDate:"changeFocusDate",eventChangeSelectedDate:"changeSelectedDate",eventChangeTime:"changeTime",eventChangeLastSelectedDate:"changeLastSelectedDate",actionSelectDate:"selectDate",actionUnselectDate:"unselectDate",cssClassWeekend:"-weekend-"},s={classes:"",inline:!1,locale:{days:["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"],daysShort:["Вос","Пон","Вто","Сре","Чет","Пят","Суб"],daysMin:["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],months:["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],monthsShort:["Янв","Фев","Мар","Апр","Май","Июн","Июл","Авг","Сен","Окт","Ноя","Дек"],today:"Сегодня",clear:"Очистить",dateFormat:"dd.MM.yyyy",timeFormat:"HH:mm",firstDay:1},startDate:new Date,firstDay:"",weekends:[6,0],dateFormat:"",altField:"",altFieldDateFormat:"T",toggleSelected:!0,keyboardNav:!0,selectedDates:!1,container:"",isMobile:!1,visible:!1,position:"bottom left",offset:12,view:i.days,minView:i.days,showOtherMonths:!0,selectOtherMonths:!0,moveToOtherMonthsOnSelect:!0,showOtherYears:!0,selectOtherYears:!0,moveToOtherYearsOnSelect:!0,minDate:"",maxDate:"",disableNavWhenOutOfRange:!0,multipleDates:!1,multipleDatesSeparator:", ",range:!1,dynamicRange:!0,buttons:!1,monthsField:"monthsShort",showEvent:"focus",autoClose:!1,prevHtml:'<svg><path d="M 17,12 l -5,5 l 5,5"></path></svg>',nextHtml:'<svg><path d="M 14,12 l 5,5 l -5,5"></path></svg>',navTitles:{days:"MMMM, <i>yyyy</i>",months:"yyyy",years:"yyyy1 - yyyy2"},timepicker:!1,onlyTimepicker:!1,dateTimeSeparator:" ",timeFormat:"",minHours:0,maxHours:24,minMinutes:0,maxMinutes:59,hoursStep:1,minutesStep:1,onSelect:!1,onChangeViewDate:!1,onChangeView:!1,onRenderCell:!1,onShow:!1,onHide:!1};function a(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:document;return"string"==typeof e?t.querySelector(e):e}function n(){let{tagName:e="div",className:t="",innerHtml:i="",id:s="",attrs:a={}}=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},n=document.createElement(e);if(t&&n.classList.add(...t.split(" ")),s&&(n.id=s),i&&(n.innerHTML=i),a)for(let e in a)n.setAttribute(e,a[e]);return n}function r(e,t){for(let[i,s]of Object.entries(t))e.setAttribute(i,s);return e}function h(e){return new Date(e.getFullYear(),e.getMonth()+1,0).getDate()}function o(e){let t=e.getHours(),i=t%12==0?12:t%12;return{year:e.getFullYear(),month:e.getMonth(),fullMonth:e.getMonth()+1<10?"0"+(e.getMonth()+1):e.getMonth()+1,date:e.getDate(),fullDate:e.getDate()<10?"0"+e.getDate():e.getDate(),day:e.getDay(),hours:t,fullHours:l(t),hours12:i,fullHours12:l(i),minutes:e.getMinutes(),fullMinutes:e.getMinutes()<10?"0"+e.getMinutes():e.getMinutes()}}function l(e){return e<10?"0"+e:e}function d(e){let t=10*Math.floor(e.getFullYear()/10);return[t,t+9]}function c(){let e=[];for(var t=arguments.length,i=new Array(t),s=0;s<t;s++)i[s]=arguments[s];return i.forEach((t=>{if("object"==typeof t)for(let i in t)t[i]&&e.push(i);else t&&e.push(t)})),e.join(" ")}function u(e,t){let s=arguments.length>2&&void 0!==arguments[2]?arguments[2]:i.days;if(!e||!t)return!1;let a=o(e),n=o(t),r={[i.days]:a.date===n.date&&a.month===n.month&&a.year===n.year,[i.months]:a.month===n.month&&a.year===n.year,[i.years]:a.year===n.year};return r[s]}function p(e,t,i){let s=g(e,!1).getTime(),a=g(t,!1).getTime();return i?s>=a:s>a}function m(e,t){return!p(e,t,!0)}function g(e){let t=!(arguments.length>1&&void 0!==arguments[1])||arguments[1],i=new Date(e.getTime());return"boolean"!=typeof t||t||D(i),i}function D(e){return e.setHours(0,0,0,0),e}function v(e,t,i){e.length?e.forEach((e=>{e.addEventListener(t,i)})):e.addEventListener(t,i)}function y(e,t){return!(!e||e===document||e instanceof DocumentFragment)&&(e.matches(t)?e:y(e.parentNode,t))}function f(e,t,i){return e>i?i:e<t?t:e}function w(e){for(var t=arguments.length,i=new Array(t>1?t-1:0),s=1;s<t;s++)i[s-1]=arguments[s];return i.filter((e=>e)).forEach((t=>{for(let[i,s]of Object.entries(t))if(void 0!==s&&"[object Object]"===s.toString()){let t=void 0!==e[i]?e[i].toString():void 0,a=s.toString(),n=Array.isArray(s)?[]:{};e[i]=e[i]?t!==a?n:e[i]:n,w(e[i],s)}else e[i]=s})),e}function b(e){let t=e;return e instanceof Date||(t=new Date(e)),isNaN(t.getTime())&&(console.log('Unable to convert value "'.concat(e,'" to Date object')),t=!1),t}function k(e){let t="\\s|\\.|-|/|\\\\|,|\\$|\\!|\\?|:|;";return new RegExp("(^|>|"+t+")("+e+")($|<|"+t+")","g")}function C(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}class _{constructor(){let{type:e,date:t,dp:i,opts:s,body:a}=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};C(this,"focus",(()=>{this.$cell.classList.add("-focus-"),this.focused=!0})),C(this,"removeFocus",(()=>{this.$cell.classList.remove("-focus-"),this.focused=!1})),C(this,"select",(()=>{this.$cell.classList.add("-selected-"),this.selected=!0})),C(this,"removeSelect",(()=>{this.$cell.classList.remove("-selected-","-range-from-","-range-to-"),this.selected=!1})),C(this,"onChangeSelectedDate",(()=>{this.isDisabled||(this._handleSelectedStatus(),this.opts.range&&this._handleRangeStatus())})),C(this,"onChangeFocusDate",(e=>{if(!e)return void(this.focused&&this.removeFocus());let t=u(e,this.date,this.type);t?this.focus():!t&&this.focused&&this.removeFocus(),this.opts.range&&this._handleRangeStatus()})),C(this,"render",(()=>(this.$cell.innerHTML=this._getHtml(),this.$cell.adpCell=this,this.$cell))),this.type=e,this.singleType=this.type.slice(0,-1),this.date=t,this.dp=i,this.opts=s,this.body=a,this.customData=!1,this.init()}init(){let{range:e,onRenderCell:t}=this.opts;t&&(this.customData=t({date:this.date,cellType:this.singleType,datepicker:this.dp})),this._createElement(),this._bindDatepickerEvents(),this._handleInitialFocusStatus(),this.dp.hasSelectedDates&&(this._handleSelectedStatus(),e&&this._handleRangeStatus())}_bindDatepickerEvents(){this.dp.on(i.eventChangeSelectedDate,this.onChangeSelectedDate),this.dp.on(i.eventChangeFocusDate,this.onChangeFocusDate)}unbindDatepickerEvents(){this.dp.off(i.eventChangeSelectedDate,this.onChangeSelectedDate),this.dp.off(i.eventChangeFocusDate,this.onChangeFocusDate)}_createElement(){let{year:e,month:t,date:i}=o(this.date);this.$cell=n({className:this._getClassName(),attrs:{"data-year":e,"data-month":t,"data-date":i}})}_getClassName(){var e,t;let s=new Date,{selectOtherMonths:a,selectOtherYears:n}=this.opts,{minDate:r,maxDate:h}=this.dp,{day:l}=o(this.date),d=this._isOutOfMinMaxRange(),p=null===(e=this.customData)||void 0===e?void 0:e.disabled,m=c("air-datepicker-cell","-".concat(this.singleType,"-"),{"-current-":u(s,this.date,this.type),"-min-date-":r&&u(r,this.date,this.type),"-max-date-":h&&u(h,this.date,this.type)}),g="";switch(this.type){case i.days:g=c({"-weekend-":this.dp.isWeekend(l),"-other-month-":this.isOtherMonth,"-disabled-":this.isOtherMonth&&!a||d||p});break;case i.months:g=c({"-disabled-":d||p});break;case i.years:g=c({"-other-decade-":this.isOtherDecade,"-disabled-":d||this.isOtherDecade&&!n||p})}return c(m,g,null===(t=this.customData)||void 0===t?void 0:t.classes)}_getHtml(){var e;let{year:t,month:s,date:a}=o(this.date),{showOtherMonths:n,showOtherYears:r}=this.opts;if(null!==(e=this.customData)&&void 0!==e&&e.html)return this.customData.html;switch(this.type){case i.days:return!n&&this.isOtherMonth?"":a;case i.months:return this.dp.locale[this.opts.monthsField][s];case i.years:return!r&&this.isOtherDecade?"":t}}_isOutOfMinMaxRange(){let{minDate:e,maxDate:t}=this.dp,{type:s,date:a}=this,{month:n,year:r,date:h}=o(a),l=s===i.days,d=s===i.years,c=!!e&&new Date(r,d?e.getMonth():n,l?h:e.getDate()),u=!!t&&new Date(r,d?t.getMonth():n,l?h:t.getDate());return e&&t?m(c,e)||p(u,t):e?m(c,e):t?p(u,t):void 0}destroy(){this.unbindDatepickerEvents()}_handleRangeStatus(){let{rangeDateFrom:e,rangeDateTo:t}=this.dp,i=c({"-in-range-":e&&t&&(s=this.date,a=e,n=t,p(s,a)&&m(s,n)),"-range-from-":e&&u(this.date,e,this.type),"-range-to-":t&&u(this.date,t,this.type)});var s,a,n;this.$cell.classList.remove("-range-from-","-range-to-","-in-range-"),i&&this.$cell.classList.add(...i.split(" "))}_handleSelectedStatus(){let e=this.dp._checkIfDateIsSelected(this.date,this.type);e?this.select():!e&&this.selected&&this.removeSelect()}_handleInitialFocusStatus(){u(this.dp.focusDate,this.date,this.type)&&this.focus()}get isDisabled(){return this.$cell.matches(".-disabled-")}get isOtherMonth(){return this.dp.isOtherMonth(this.date)}get isOtherDecade(){return this.dp.isOtherDecade(this.date)}}function M(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}let $={[i.days]:'<div class="air-datepicker-body--day-names"></div>'+'<div class="air-datepicker-body--cells -'.concat(i.days,'-"></div>'),[i.months]:'<div class="air-datepicker-body--cells -'.concat(i.months,'-"></div>'),[i.years]:'<div class="air-datepicker-body--cells -'.concat(i.years,'-"></div>')};class S{constructor(e){let{dp:t,type:s,opts:a}=e;M(this,"handleClick",(e=>{let t=y(e.target,".air-datepicker-cell");if(!t)return;let i=t.adpCell;if(i.isDisabled)return;if(!this.dp.isMinViewReached)return void this.dp.down();let s=this.dp._checkIfDateIsSelected(i.date,i.type);s?this.dp._handleAlreadySelectedDates(s,i.date):this.dp.selectDate(i.date)})),M(this,"onChangeCurrentView",(e=>{e!==this.type?this.hide():(this.show(),this.render())})),M(this,"onMouseOverCell",(e=>{let t=y(e.target,".air-datepicker-cell");this.dp.setFocusDate(!!t&&t.adpCell.date)})),M(this,"onMouseOutCell",(()=>{this.dp.setFocusDate(!1)})),M(this,"onClickCell",(e=>{this.handleClick(e)})),M(this,"onMouseDown",(e=>{this.pressed=!0;let t=y(e.target,".air-datepicker-cell"),i=t&&t.adpCell;u(i.date,this.dp.rangeDateFrom)&&(this.rangeFromFocused=!0),u(i.date,this.dp.rangeDateTo)&&(this.rangeToFocused=!0)})),M(this,"onMouseMove",(e=>{if(!this.pressed||!this.dp.isMinViewReached)return;e.preventDefault();let t=y(e.target,".air-datepicker-cell"),i=t&&t.adpCell,{selectedDates:s,rangeDateTo:a,rangeDateFrom:n}=this.dp;if(!i||i.isDisabled)return;let{date:r}=i;if(2===s.length){if(this.rangeFromFocused&&!p(r,a)){let{hours:e,minutes:t}=o(n);r.setHours(e),r.setMinutes(t),this.dp.rangeDateFrom=r,this.dp.replaceDate(n,r)}if(this.rangeToFocused&&!m(r,n)){let{hours:e,minutes:t}=o(a);r.setHours(e),r.setMinutes(t),this.dp.rangeDateTo=r,this.dp.replaceDate(a,r)}}})),M(this,"onMouseUp",(()=>{this.pressed=!1,this.rangeFromFocused=!1,this.rangeToFocused=!1})),M(this,"onChangeViewDate",((e,t)=>{if(!this.isVisible)return;let s=d(e),a=d(t);switch(this.dp.currentView){case i.days:if(u(e,t,i.months))return;break;case i.months:if(u(e,t,i.years))return;break;case i.years:if(s[0]===a[0]&&s[1]===a[1])return}this.render()})),M(this,"render",(()=>{this.destroyCells(),this._generateCells(),this.cells.forEach((e=>{this.$cells.appendChild(e.render())}))})),this.dp=t,this.type=s,this.opts=a,this.cells=[],this.$el="",this.pressed=!1,this.isVisible=!0,this.init()}init(){this._buildBaseHtml(),this.type===i.days&&this.renderDayNames(),this.render(),this._bindEvents(),this._bindDatepickerEvents()}_bindEvents(){let{range:e,dynamicRange:t}=this.opts;v(this.$el,"mouseover",this.onMouseOverCell),v(this.$el,"mouseout",this.onMouseOutCell),v(this.$el,"click",this.onClickCell),e&&t&&(v(this.$el,"mousedown",this.onMouseDown),v(this.$el,"mousemove",this.onMouseMove),v(window.document,"mouseup",this.onMouseUp))}_bindDatepickerEvents(){this.dp.on(i.eventChangeViewDate,this.onChangeViewDate),this.dp.on(i.eventChangeCurrentView,this.onChangeCurrentView)}_buildBaseHtml(){this.$el=n({className:"air-datepicker-body -".concat(this.type,"-"),innerHtml:$[this.type]}),this.$names=a(".air-datepicker-body--day-names",this.$el),this.$cells=a(".air-datepicker-body--cells",this.$el)}_getDayNamesHtml(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this.dp.locale.firstDay,t="",s=this.dp.isWeekend,a=e,n=0;for(;n<7;){let e=a%7,r=c("air-datepicker-body--day-name",{[i.cssClassWeekend]:s(e)}),h=this.dp.locale.daysMin[e];t+='<div class="'.concat(r,'">').concat(h,"</div>"),n++,a++}return t}_getDaysCells(){let{viewDate:e,locale:{firstDay:t}}=this.dp,i=h(e),{year:s,month:a}=o(e),n=new Date(s,a,1),r=new Date(s,a,i),l=n.getDay()-t,d=6-r.getDay()+t;l=l<0?l+7:l,d=d>6?d-7:d;let c=function(e,t){let{year:i,month:s,date:a}=o(e);return new Date(i,s,a-t)}(n,l),u=i+l+d,p=c.getDate(),{year:m,month:g}=o(c),D=0;for(;D<u;){let e=new Date(m,g,p+D);this._generateCell(e),D++}}_generateCell(e){let{type:t,dp:i,opts:s}=this,a=new _({type:t,dp:i,opts:s,date:e,body:this});return this.cells.push(a),a}_generateDayCells(){this._getDaysCells()}_generateMonthCells(){let{year:e}=this.dp.parsedViewDate,t=0;for(;t<12;)this.cells.push(this._generateCell(new Date(e,t))),t++}_generateYearCells(){let e=d(this.dp.viewDate),t=e[0]-1,i=e[1]+1,s=t;for(;s<=i;)this.cells.push(this._generateCell(new Date(s,0))),s++}renderDayNames(){this.$names.innerHTML=this._getDayNamesHtml()}_generateCells(){switch(this.type){case i.days:this._generateDayCells();break;case i.months:this._generateMonthCells();break;case i.years:this._generateYearCells()}}show(){this.isVisible=!0,this.$el.classList.remove("-hidden-")}hide(){this.isVisible=!1,this.$el.classList.add("-hidden-")}destroyCells(){this.cells.forEach((e=>e.destroy())),this.cells=[],this.$cells.innerHTML=""}destroy(){this.destroyCells(),this.dp.off(i.eventChangeViewDate,this.onChangeViewDate),this.dp.off(i.eventChangeCurrentView,this.onChangeCurrentView)}}function T(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}class F{constructor(e){let{dp:t,opts:i}=e;T(this,"onClickNav",(e=>{let t=y(e.target,".air-datepicker-nav--action");if(!t)return;let i=t.dataset.action;this.dp[i]()})),T(this,"onChangeViewDate",(()=>{this.render(),this._resetNavStatus(),this.handleNavStatus()})),T(this,"onChangeCurrentView",(()=>{this.render(),this._resetNavStatus(),this.handleNavStatus()})),T(this,"onClickNavTitle",(()=>{this.dp.isFinalView||this.dp.up()})),T(this,"update",(()=>{let{prevHtml:e,nextHtml:t}=this.opts;this.$prev.innerHTML=e,this.$next.innerHTML=t,this._resetNavStatus(),this.render(),this.handleNavStatus()})),T(this,"renderDelay",(()=>{setTimeout(this.render)})),T(this,"render",(()=>{this.$title.innerHTML=this._getTitle(),function(e,t){for(let i in t)t[i]?e.classList.add(i):e.classList.remove(i)}(this.$title,{"-disabled-":this.dp.isFinalView})})),this.dp=t,this.opts=i,this.init()}init(){this._createElement(),this._buildBaseHtml(),this._defineDOM(),this.render(),this.handleNavStatus(),this._bindEvents(),this._bindDatepickerEvents()}_defineDOM(){this.$title=a(".air-datepicker-nav--title",this.$el),this.$prev=a('[data-action="prev"]',this.$el),this.$next=a('[data-action="next"]',this.$el)}_bindEvents(){this.$el.addEventListener("click",this.onClickNav),this.$title.addEventListener("click",this.onClickNavTitle)}_bindDatepickerEvents(){this.dp.on(i.eventChangeViewDate,this.onChangeViewDate),this.dp.on(i.eventChangeCurrentView,this.onChangeCurrentView),this.isNavIsFunction&&(this.dp.on(i.eventChangeSelectedDate,this.renderDelay),this.dp.opts.timepicker&&this.dp.on(i.eventChangeTime,this.render))}destroy(){this.dp.off(i.eventChangeViewDate,this.onChangeViewDate),this.dp.off(i.eventChangeCurrentView,this.onChangeCurrentView),this.isNavIsFunction&&(this.dp.off(i.eventChangeSelectedDate,this.renderDelay),this.dp.opts.timepicker&&this.dp.off(i.eventChangeTime,this.render))}_createElement(){this.$el=n({tagName:"nav",className:"air-datepicker-nav"})}_getTitle(){let{dp:e,opts:t}=this,i=t.navTitles[e.currentView];return"function"==typeof i?i(e):e.formatDate(e.viewDate,i)}handleNavStatus(){let{disableNavWhenOutOfRange:e}=this.opts,{minDate:t,maxDate:s}=this.dp;if(!t&&!s||!e)return;let{year:a,month:n}=this.dp.parsedViewDate,r=!!t&&o(t),h=!!s&&o(s);switch(this.dp.currentView){case i.days:t&&r.month>=n&&r.year>=a&&this._disableNav("prev"),s&&h.month<=n&&h.year<=a&&this._disableNav("next");break;case i.months:t&&r.year>=a&&this._disableNav("prev"),s&&h.year<=a&&this._disableNav("next");break;case i.years:{let e=d(this.dp.viewDate);t&&r.year>=e[0]&&this._disableNav("prev"),s&&h.year<=e[1]&&this._disableNav("next");break}}}_disableNav(e){a('[data-action="'+e+'"]',this.$el).classList.add("-disabled-")}_resetNavStatus(){!function(e){for(var t=arguments.length,i=new Array(t>1?t-1:0),s=1;s<t;s++)i[s-1]=arguments[s];e.length?e.forEach((e=>{e.classList.remove(...i)})):e.classList.remove(...i)}(this.$el.querySelectorAll(".air-datepicker-nav--action"),"-disabled-")}_buildBaseHtml(){let{prevHtml:e,nextHtml:t}=this.opts;this.$el.innerHTML='<div class="air-datepicker-nav--action" data-action="prev">'.concat(e,"</div>")+'<div class="air-datepicker-nav--title"></div>'+'<div class="air-datepicker-nav--action" data-action="next">'.concat(t,"</div>")}get isNavIsFunction(){let{navTitles:e}=this.opts;return Object.keys(e).find((t=>"function"==typeof e[t]))}}var V={today:{content:e=>e.locale.today,onClick:e=>e.setViewDate(new Date)},clear:{content:e=>e.locale.clear,onClick:e=>e.clear()}};class H{constructor(e){let{dp:t,opts:i}=e;this.dp=t,this.opts=i,this.init()}init(){this.createElement(),this.render()}createElement(){this.$el=n({className:"air-datepicker-buttons"})}destroy(){this.$el.parentNode.removeChild(this.$el)}clearHtml(){return this.$el.innerHTML="",this}generateButtons(){let{buttons:e}=this.opts;Array.isArray(e)||(e=[e]),e.forEach((e=>{let t=e;"string"==typeof e&&V[e]&&(t=V[e]);let i=this.createButton(t);t.onClick&&this.attachEventToButton(i,t.onClick),this.$el.appendChild(i)}))}attachEventToButton(e,t){e.addEventListener("click",(()=>{t(this.dp)}))}createButton(e){let{content:t,className:i,tagName:s="button",attrs:a={}}=e,r="function"==typeof t?t(this.dp):t;return n({tagName:s,innerHtml:"<span tabindex='-1'>".concat(r,"</span>"),className:c("air-datepicker-button",i),attrs:a})}render(){this.generateButtons()}}function x(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}class L{constructor(){let{opts:e,dp:t}=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};x(this,"toggleTimepickerIsActive",(e=>{this.dp.timepickerIsActive=e})),x(this,"onChangeSelectedDate",(e=>{let{date:t,updateTime:i=!1}=e;t&&(this.setMinMaxTime(t),this.setCurrentTime(!!i&&t),this.addTimeToDate(t))})),x(this,"onChangeLastSelectedDate",(e=>{e&&(this.setTime(e),this.render())})),x(this,"onChangeInputRange",(e=>{let t=e.target;this[t.getAttribute("name")]=t.value,this.updateText(),this.dp.trigger(i.eventChangeTime,{hours:this.hours,minutes:this.minutes})})),x(this,"onMouseEnterLeave",(e=>{let t=e.target.getAttribute("name"),i=this.$minutesText;"hours"===t&&(i=this.$hoursText),i.classList.toggle("-focus-")})),x(this,"onFocus",(()=>{this.toggleTimepickerIsActive(!0)})),x(this,"onBlur",(()=>{this.toggleTimepickerIsActive(!1)})),this.opts=e,this.dp=t;let{timeFormat:s}=this.dp.locale;s&&(s.match(k("h"))||s.match(k("hh")))&&(this.ampm=!0),this.init()}init(){this.setTime(this.dp.lastSelectedDate||this.dp.viewDate),this.createElement(),this.buildHtml(),this.defineDOM(),this.render(),this.bindDatepickerEvents(),this.bindDOMEvents()}bindDatepickerEvents(){this.dp.on(i.eventChangeSelectedDate,this.onChangeSelectedDate),this.dp.on(i.eventChangeLastSelectedDate,this.onChangeLastSelectedDate)}bindDOMEvents(){let e="input";navigator.userAgent.match(/trident/gi)&&(e="change"),v(this.$ranges,e,this.onChangeInputRange),v(this.$ranges,"mouseenter",this.onMouseEnterLeave),v(this.$ranges,"mouseleave",this.onMouseEnterLeave),v(this.$ranges,"focus",this.onFocus),v(this.$ranges,"mousedown",this.onFocus),v(this.$ranges,"blur",this.onBlur)}createElement(){this.$el=n({className:c("air-datepicker-time",{"-am-pm-":this.dp.ampm})})}destroy(){this.dp.off(i.eventChangeSelectedDate,this.onChangeSelectedDate),this.dp.off(i.eventChangeLastSelectedDate,this.onChangeLastSelectedDate),this.$el.parentNode.removeChild(this.$el)}buildHtml(){let{ampm:e,hours:t,displayHours:i,minutes:s,minHours:a,minMinutes:n,maxHours:r,maxMinutes:h,dayPeriod:o,opts:{hoursStep:d,minutesStep:c}}=this;this.$el.innerHTML='<div class="air-datepicker-time--current">'+'   <span class="air-datepicker-time--current-hours">'.concat(l(i),"</span>")+'   <span class="air-datepicker-time--current-colon">:</span>'+'   <span class="air-datepicker-time--current-minutes">'.concat(l(s),"</span>")+"   ".concat(e?"<span class='air-datepicker-time--current-ampm'>".concat(o,"</span>"):"")+'</div><div class="air-datepicker-time--sliders">   <div class="air-datepicker-time--row">'+'      <input type="range" name="hours" value="'.concat(t,'" min="').concat(a,'" max="').concat(r,'" step="').concat(d,'"/>')+'   </div>   <div class="air-datepicker-time--row">'+'      <input type="range" name="minutes" value="'.concat(s,'" min="').concat(n,'" max="').concat(h,'" step="').concat(c,'"/>')+"   </div></div>"}defineDOM(){let e=e=>a(e,this.$el);this.$ranges=this.$el.querySelectorAll('[type="range"]'),this.$hours=e('[name="hours"]'),this.$minutes=e('[name="minutes"]'),this.$hoursText=e(".air-datepicker-time--current-hours"),this.$minutesText=e(".air-datepicker-time--current-minutes"),this.$ampm=e(".air-datepicker-time--current-ampm")}setTime(e){this.setMinMaxTime(e),this.setCurrentTime(e)}addTimeToDate(e){e&&(e.setHours(this.hours),e.setMinutes(this.minutes))}setMinMaxTime(e){if(this.setMinMaxTimeFromOptions(),e){let{minDate:t,maxDate:i}=this.dp;t&&u(e,t)&&this.setMinTimeFromMinDate(t),i&&u(e,i)&&this.setMaxTimeFromMaxDate(i)}}setCurrentTime(e){let{hours:t,minutes:i}=e?o(e):this;this.hours=f(t,this.minHours,this.maxHours),this.minutes=f(i,this.minMinutes,this.maxMinutes)}setMinMaxTimeFromOptions(){let{minHours:e,minMinutes:t,maxHours:i,maxMinutes:s}=this.opts;this.minHours=f(e,0,23),this.minMinutes=f(t,0,59),this.maxHours=f(i,0,23),this.maxMinutes=f(s,0,59)}setMinTimeFromMinDate(e){let{lastSelectedDate:t}=this.dp;this.minHours=e.getHours(),t&&t.getHours()>e.getHours()?this.minMinutes=this.opts.minMinutes:this.minMinutes=e.getMinutes()}setMaxTimeFromMaxDate(e){let{lastSelectedDate:t}=this.dp;this.maxHours=e.getHours(),t&&t.getHours()<e.getHours()?this.maxMinutes=this.opts.maxMinutes:this.maxMinutes=e.getMinutes()}getDayPeriod(e,t){let i=e,s=Number(e);e instanceof Date&&(i=o(e),s=Number(i.hours));let a="am";if(t||this.ampm){switch(!0){case 12===s:case s>11:a="pm"}s=s%12==0?12:s%12}return{hours:s,dayPeriod:a}}updateSliders(){r(this.$hours,{min:this.minHours,max:this.maxHours}).value=this.hours,r(this.$minutes,{min:this.minMinutes,max:this.maxMinutes}).value=this.minutes}updateText(){this.$hoursText.innerHTML=l(this.displayHours),this.$minutesText.innerHTML=l(this.minutes),this.ampm&&(this.$ampm.innerHTML=this.dayPeriod)}set hours(e){this._hours=e;let{hours:t,dayPeriod:i}=this.getDayPeriod(e);this.displayHours=t,this.dayPeriod=i}get hours(){return this._hours}render(){this.updateSliders(),this.updateText()}}function O(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}class E{constructor(e){let{dp:t,opts:i}=e;O(this,"pressedKeys",new Set),O(this,"hotKeys",new Map([[[["Control","ArrowRight"],["Control","ArrowUp"]],e=>e.month++],[[["Control","ArrowLeft"],["Control","ArrowDown"]],e=>e.month--],[[["Shift","ArrowRight"],["Shift","ArrowUp"]],e=>e.year++],[[["Shift","ArrowLeft"],["Shift","ArrowDown"]],e=>e.year--],[[["Alt","ArrowRight"],["Alt","ArrowUp"]],e=>e.year+=10],[[["Alt","ArrowLeft"],["Alt","ArrowDown"]],e=>e.year-=10],[["Control","Shift","ArrowUp"],(e,t)=>t.up()]])),O(this,"handleHotKey",(e=>{let t=this.hotKeys.get(e),i=o(this.getInitialFocusDate());t(i,this.dp);let{year:s,month:a,date:n}=i,r=h(new Date(s,a));r<n&&(n=r);let l=this.dp.getClampedDate(new Date(s,a,n));this.dp.setFocusDate(l,{viewDateTransition:!0})})),O(this,"isHotKeyPressed",(()=>{let e=!1,t=this.pressedKeys.size,i=e=>this.pressedKeys.has(e);for(let[s]of this.hotKeys){if(e)break;if(Array.isArray(s[0]))s.forEach((a=>{e||t!==a.length||(e=a.every(i)&&s)}));else{if(t!==s.length)continue;e=s.every(i)&&s}}return e})),O(this,"isArrow",(e=>e>=37&&e<=40)),O(this,"onKeyDown",(e=>{let{key:t,which:i}=e,{dp:s,dp:{focusDate:a},opts:n}=this;this.registerKey(t);let r=this.isHotKeyPressed();if(r)return e.preventDefault(),void this.handleHotKey(r);if(this.isArrow(i))return e.preventDefault(),void this.focusNextCell(t);if("Enter"===t){if(s.currentView!==n.minView)return void s.down();if(a){let e=s._checkIfDateIsSelected(a);return void(e?s._handleAlreadySelectedDates(e,a):s.selectDate(a))}}"Escape"===t&&this.dp.hide()})),O(this,"onKeyUp",(e=>{this.removeKey(e.key)})),this.dp=t,this.opts=i,this.init()}init(){this.bindKeyboardEvents()}bindKeyboardEvents(){let{$el:e}=this.dp;e.addEventListener("keydown",this.onKeyDown),e.addEventListener("keyup",this.onKeyUp)}destroy(){let{$el:e}=this.dp;e.removeEventListener("keydown",this.onKeyDown),e.removeEventListener("keyup",this.onKeyUp),this.hotKeys=null,this.pressedKeys=null}getInitialFocusDate(){let{focusDate:e,currentView:t,selectedDates:s,parsedViewDate:{year:a,month:n}}=this.dp,r=e||s[s.length-1];if(!r)switch(t){case i.days:r=new Date(a,n,(new Date).getDate());break;case i.months:r=new Date(a,n,1);break;case i.years:r=new Date(a,0,1)}return r}focusNextCell(e){let t=this.getInitialFocusDate(),{currentView:s}=this.dp,{days:a,months:n,years:r}=i,h=o(t),l=h.year,d=h.month,c=h.date;switch(e){case"ArrowLeft":s===a&&(c-=1),s===n&&(d-=1),s===r&&(l-=1);break;case"ArrowUp":s===a&&(c-=7),s===n&&(d-=3),s===r&&(l-=4);break;case"ArrowRight":s===a&&(c+=1),s===n&&(d+=1),s===r&&(l+=1);break;case"ArrowDown":s===a&&(c+=7),s===n&&(d+=3),s===r&&(l+=4)}let u=this.dp.getClampedDate(new Date(l,d,c));this.dp.setFocusDate(u,{viewDateTransition:!0})}registerKey(e){this.pressedKeys.add(e)}removeKey(e){this.pressedKeys.delete(e)}}let A={on(e,t){this.__events||(this.__events={}),this.__events[e]?this.__events[e].push(t):this.__events[e]=[t]},off(e,t){this.__events&&this.__events[e]&&(this.__events[e]=this.__events[e].filter((e=>e!==t)))},removeAllEvents(){this.__events={}},trigger(e){for(var t=arguments.length,i=new Array(t>1?t-1:0),s=1;s<t;s++)i[s-1]=arguments[s];this.__events&&this.__events[e]&&this.__events[e].forEach((e=>{e(...i)}))}};function N(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}let I="",R="",P="",B=!1;class K{constructor(e,t){var r=this;if(N(this,"viewIndexes",[i.days,i.months,i.years]),N(this,"next",(()=>{let{year:e,month:t}=this.parsedViewDate;switch(this.currentView){case i.days:this.setViewDate(new Date(e,t+1,1));break;case i.months:this.setViewDate(new Date(e+1,t,1));break;case i.years:this.setViewDate(new Date(e+10,0,1))}})),N(this,"prev",(()=>{let{year:e,month:t}=this.parsedViewDate;switch(this.currentView){case i.days:this.setViewDate(new Date(e,t-1,1));break;case i.months:this.setViewDate(new Date(e-1,t,1));break;case i.years:this.setViewDate(new Date(e-10,0,1))}})),N(this,"_finishHide",(()=>{this.hideAnimation=!1,this._destroyComponents(),this.$container.removeChild(this.$datepicker)})),N(this,"setPosition",(function(e){let t=arguments.length>1&&void 0!==arguments[1]&&arguments[1];if("function"==typeof(e=e||r.opts.position))return void(r.customHide=e({$datepicker:r.$datepicker,$target:r.$el,$pointer:r.$pointer,isViewChange:t,done:r._finishHide}));let i,s,{isMobile:a}=r.opts,n=r.$el.getBoundingClientRect(),h=r.$el.getBoundingClientRect(),o=r.$datepicker.offsetParent,l=r.$el.offsetParent,d=r.$datepicker.getBoundingClientRect(),c=e.split(" "),u=window.scrollY,p=window.scrollX,m=r.opts.offset,g=c[0],D=c[1];if(a)r.$datepicker.style.cssText="left: 50%; top: 50%";else{if(o===l&&o!==document.body&&(h={top:r.$el.offsetTop,left:r.$el.offsetLeft,width:n.width,height:r.$el.offsetHeight},u=0,p=0),o!==l&&o!==document.body){let e=o.getBoundingClientRect();h={top:n.top-e.top,left:n.left-e.left,width:n.width,height:n.height},u=0,p=0}switch(g){case"top":i=h.top-d.height-m;break;case"right":s=h.left+h.width+m;break;case"bottom":i=h.top+h.height+m;break;case"left":s=h.left-d.width-m}switch(D){case"top":i=h.top;break;case"right":s=h.left+h.width-d.width;break;case"bottom":i=h.top+h.height-d.height;break;case"left":s=h.left;break;case"center":/left|right/.test(g)?i=h.top+h.height/2-d.height/2:s=h.left+h.width/2-d.width/2}r.$datepicker.style.cssText="left: ".concat(s+p,"px; top: ").concat(i+u,"px")}})),N(this,"_setInputValue",(()=>{let{opts:e,$altField:t,locale:{dateFormat:i}}=this,{altFieldDateFormat:s,altField:a}=e;a&&t&&(t.value=this._getInputValue(s)),this.$el.value=this._getInputValue(i)})),N(this,"_getInputValue",(e=>{let{selectedDates:t,opts:i}=this,{multipleDates:s,multipleDatesSeparator:a}=i;if(!t.length)return"";let n="function"==typeof e,r=n?e(s?t:t[0]):t.map((t=>this.formatDate(t,e)));return r=n?r:r.join(a),r})),N(this,"_checkIfDateIsSelected",(function(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:i.days,s=!1;return r.selectedDates.some((i=>{let a=u(e,i,t);return s=a&&i,a})),s})),N(this,"_scheduleCallAfterTransition",(e=>{this._cancelScheduledCall(),e&&e(!1),this._onTransitionEnd=()=>{e&&e(!0)},this.$datepicker.addEventListener("transitionend",this._onTransitionEnd,{once:!0})})),N(this,"_cancelScheduledCall",(()=>{this.$datepicker.removeEventListener("transitionend",this._onTransitionEnd)})),N(this,"setViewDate",(e=>{if(!((e=b(e))instanceof Date))return;if(u(e,this.viewDate))return;let t=this.viewDate;this.viewDate=e;let{onChangeViewDate:s}=this.opts;if(s){let{month:e,year:t}=this.parsedViewDate;s({month:e,year:t,decade:this.curDecade})}this.trigger(i.eventChangeViewDate,e,t)})),N(this,"setFocusDate",(function(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};(!e||(e=b(e))instanceof Date)&&(r.focusDate=e,r.opts.range&&e&&r._handleRangeOnFocus(),r.trigger(i.eventChangeFocusDate,e,t))})),N(this,"setCurrentView",(e=>{if(this.viewIndexes.includes(e)){if(this.currentView=e,this.elIsInput&&this.visible&&this.setPosition(void 0,!0),this.trigger(i.eventChangeCurrentView,e),!this.views[e]){let t=this.views[e]=new S({dp:this,opts:this.opts,type:e});this.$content.appendChild(t.$el)}this.opts.onChangeView&&this.opts.onChangeView(e)}})),N(this,"_updateLastSelectedDate",(e=>{this.lastSelectedDate=e,this.trigger(i.eventChangeLastSelectedDate,e)})),N(this,"destroy",(()=>{let{showEvent:e,isMobile:t}=this.opts,i=this.$datepicker.parentNode;i&&i.removeChild(this.$datepicker),this.$el.removeEventListener(e,this._onFocus),this.$el.removeEventListener("blur",this._onBlur),window.removeEventListener("resize",this._onResize),t&&this._removeMobileAttributes(),this.keyboardNav&&this.keyboardNav.destroy(),this.views=null,this.nav=null,this.$datepicker=null,this.opts=null,this.$customContainer=null,this.viewDate=null,this.focusDate=null,this.selectedDates=null,this.rangeDateFrom=null,this.rangeDateTo=null})),N(this,"update",(e=>{let t=w({},this.opts);w(this.opts,e);let{timepicker:s,buttons:a,range:n,selectedDates:r,isMobile:h}=this.opts,o=this.visible||this.treatAsInline;this._createMinMaxDates(),this._limitViewDateByMaxMinDates(),this._handleLocale(),!t.selectedDates&&r&&this.selectDate(r),e.view&&this.setCurrentView(e.view),this._setInputValue(),t.range&&!n?(this.rangeDateTo=!1,this.rangeDateFrom=!1):!t.range&&n&&this.selectedDates.length&&(this.rangeDateFrom=this.selectedDates[0],this.rangeDateTo=this.selectedDates[1]),t.timepicker&&!s?(o&&this.timepicker.destroy(),this.timepicker=!1,this.$timepicker.parentNode.removeChild(this.$timepicker)):!t.timepicker&&s&&this._addTimepicker(),!t.buttons&&a?this._addButtons():t.buttons&&!a?(this.buttons.destroy(),this.$buttons.parentNode.removeChild(this.$buttons)):o&&t.buttons&&a&&this.buttons.clearHtml().render(),!t.isMobile&&h?(this.treatAsInline||P||this._createMobileOverlay(),this._addMobileAttributes(),this.visible&&this._showMobileOverlay()):t.isMobile&&!h&&(this._removeMobileAttributes(),this.visible&&(P.classList.remove("-active-"),"function"!=typeof this.opts.position&&this.setPosition())),o&&(this.nav.update(),this.views[this.currentView].render(),this.currentView===i.days&&this.views[this.currentView].renderDayNames())})),N(this,"isOtherMonth",(e=>{let{month:t}=o(e);return t!==this.parsedViewDate.month})),N(this,"isOtherYear",(e=>{let{year:t}=o(e);return t!==this.parsedViewDate.year})),N(this,"isOtherDecade",(e=>{let{year:t}=o(e),[i,s]=d(this.viewDate);return t<i||t>s})),N(this,"_onChangeSelectedDate",(e=>{let{silent:t}=e;setTimeout((()=>{this._setInputValue(),this.opts.onSelect&&!t&&this._triggerOnSelect()}))})),N(this,"_onChangeFocusedDate",(function(e){let{viewDateTransition:t}=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(!e)return;let i=!1;t&&(i=r.isOtherMonth(e)||r.isOtherYear(e)||r.isOtherDecade(e)),i&&r.setViewDate(e)})),N(this,"_onChangeTime",(e=>{let{hours:t,minutes:i}=e,s=new Date,{lastSelectedDate:a,opts:{onSelect:n}}=this,r=a;a||(r=s);let h=this.getCell(r,this.currentViewSingular),o=h&&h.adpCell;o&&o.isDisabled||(r.setHours(t),r.setMinutes(i),a?(this._setInputValue(),n&&this._triggerOnSelect()):this.selectDate(r))})),N(this,"_onFocus",(e=>{this.visible||this.show()})),N(this,"_onBlur",(e=>{this.inFocus||!this.visible||this.opts.isMobile||this.hide()})),N(this,"_onMouseDown",(e=>{this.inFocus=!0})),N(this,"_onMouseUp",(e=>{this.inFocus=!1,this.$el.focus()})),N(this,"_onResize",(()=>{this.visible&&"function"!=typeof this.opts.position&&this.setPosition()})),N(this,"_onClickOverlay",(()=>{this.visible&&this.hide()})),N(this,"isWeekend",(e=>this.opts.weekends.includes(e))),N(this,"getClampedDate",(e=>{let{minDate:t,maxDate:i}=this,s=e;return i&&p(e,i)?s=i:t&&m(e,t)&&(s=t),s})),this.$el=a(e),!this.$el)return;this.$datepicker=n({className:"air-datepicker"}),this.opts=w({},s,t),this.$customContainer=!!this.opts.container&&a(this.opts.container),this.$altField=a(this.opts.altField||!1),I||(I=a("body"));let{view:h,startDate:l}=this.opts;l||(this.opts.startDate=new Date),"INPUT"===this.$el.nodeName&&(this.elIsInput=!0),this.inited=!1,this.visible=!1,this.viewDate=b(this.opts.startDate),this.focusDate=!1,this.initialReadonly=this.$el.getAttribute("readonly"),this.customHide=!1,this.currentView=h,this.selectedDates=[],this.views={},this.keys=[],this.rangeDateFrom="",this.rangeDateTo="",this.timepickerIsActive=!1,this.treatAsInline=this.opts.inline||!this.elIsInput,this.init()}init(){let{opts:e,treatAsInline:t,opts:{inline:i,isMobile:s,selectedDates:a,keyboardNav:r,onlyTimepicker:h}}=this;var o;B||i||!this.elIsInput||(B=!0,R=n({className:o=K.defaultContainerId,id:o}),I.appendChild(R)),!s||P||t||this._createMobileOverlay(),this._handleLocale(),this._bindSubEvents(),this._createMinMaxDates(),this._limitViewDateByMaxMinDates(),this.elIsInput&&(i||this._bindEvents(),r&&!h&&(this.keyboardNav=new E({dp:this,opts:e}))),a&&this.selectDate(a,{silent:!0}),this.opts.visible&&!t&&this.show(),t&&this._createComponents()}_createMobileOverlay(){P=n({className:"air-datepicker-overlay"}),R.appendChild(P)}_createComponents(){let{opts:e,treatAsInline:t,opts:{inline:i,buttons:s,timepicker:a,position:n,classes:r,onlyTimepicker:h,isMobile:o}}=this;this._buildBaseHtml(),this.elIsInput&&(i||this._setPositionClasses(n)),!i&&this.elIsInput||this.$datepicker.classList.add("-inline-"),r&&this.$datepicker.classList.add(...r.split(" ")),h&&this.$datepicker.classList.add("-only-timepicker-"),o&&!t&&this._addMobileAttributes(),this.views[this.currentView]=new S({dp:this,type:this.currentView,opts:e}),this.nav=new F({dp:this,opts:e}),a&&this._addTimepicker(),s&&this._addButtons(),this.$content.appendChild(this.views[this.currentView].$el),this.$nav.appendChild(this.nav.$el)}_destroyComponents(){for(let e in this.views)this.views[e].destroy();this.views={},this.nav.destroy(),this.timepicker&&this.timepicker.destroy()}_addMobileAttributes(){P.addEventListener("click",this._onClickOverlay),this.$datepicker.classList.add("-is-mobile-"),this.$el.setAttribute("readonly",!0)}_removeMobileAttributes(){P.removeEventListener("click",this._onClickOverlay),this.$datepicker.classList.remove("-is-mobile-"),this.initialReadonly||""===this.initialReadonly||this.$el.removeAttribute("readonly")}_createMinMaxDates(){let{minDate:e,maxDate:t}=this.opts;this.minDate=!!e&&b(e),this.maxDate=!!t&&b(t)}_addTimepicker(){this.$timepicker=n({className:"air-datepicker--time"}),this.$datepicker.appendChild(this.$timepicker),this.timepicker=new L({dp:this,opts:this.opts}),this.$timepicker.appendChild(this.timepicker.$el)}_addButtons(){this.$buttons=n({className:"air-datepicker--buttons"}),this.$datepicker.appendChild(this.$buttons),this.buttons=new H({dp:this,opts:this.opts}),this.$buttons.appendChild(this.buttons.$el)}_bindSubEvents(){this.on(i.eventChangeSelectedDate,this._onChangeSelectedDate),this.on(i.eventChangeFocusDate,this._onChangeFocusedDate),this.on(i.eventChangeTime,this._onChangeTime)}_buildBaseHtml(){let{inline:e}=this.opts;var t,i;this.elIsInput?e?(t=this.$datepicker,(i=this.$el).parentNode.insertBefore(t,i.nextSibling)):this.$container.appendChild(this.$datepicker):this.$el.appendChild(this.$datepicker),this.$datepicker.innerHTML='<i class="air-datepicker--pointer"></i><div class="air-datepicker--navigation"></div><div class="air-datepicker--content"></div>',this.$content=a(".air-datepicker--content",this.$datepicker),this.$pointer=a(".air-datepicker--pointer",this.$datepicker),this.$nav=a(".air-datepicker--navigation",this.$datepicker)}_handleLocale(){let{locale:e,dateFormat:t,firstDay:i,timepicker:s,onlyTimepicker:a,timeFormat:n,dateTimeSeparator:r}=this.opts;var h;this.locale=(h=e,JSON.parse(JSON.stringify(h))),t&&(this.locale.dateFormat=t),void 0!==n&&""!==n&&(this.locale.timeFormat=n);let{timeFormat:o}=this.locale;if(""!==i&&(this.locale.firstDay=i),s&&"function"!=typeof t){let e=o?r:"";this.locale.dateFormat=[this.locale.dateFormat,o||""].join(e)}a&&(this.locale.dateFormat=this.locale.timeFormat)}_setPositionClasses(e){if("function"==typeof e)return void this.$datepicker.classList.add("-custom-position-");let t=(e=e.split(" "))[0],i=e[1],s="air-datepicker -".concat(t,"-").concat(i,"- -from-").concat(t,"-");this.$datepicker.classList.add(...s.split(" "))}_bindEvents(){this.$el.addEventListener(this.opts.showEvent,this._onFocus),this.$el.addEventListener("blur",this._onBlur),this.$datepicker.addEventListener("mousedown",this._onMouseDown),this.$datepicker.addEventListener("mouseup",this._onMouseUp),window.addEventListener("resize",this._onResize)}_limitViewDateByMaxMinDates(){let{viewDate:e,minDate:t,maxDate:i}=this;i&&p(e,i)&&this.setViewDate(i),t&&m(e,t)&&this.setViewDate(t)}formatDate(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:this.viewDate,t=arguments.length>1?arguments[1]:void 0;if(e=b(e),!(e instanceof Date))return;let i=t,s=this.locale,a=o(e),n=d(e),r=K.replacer,h="am";this.opts.timepicker&&this.timepicker&&(h=this.timepicker.getDayPeriod(e).dayPeriod);let l={T:e.getTime(),m:a.minutes,mm:a.fullMinutes,h:a.hours12,hh:a.fullHours12,H:a.hours,HH:a.fullHours,aa:h,AA:h.toUpperCase(),E:s.daysShort[a.day],EEEE:s.days[a.day],d:a.date,dd:a.fullDate,M:a.month+1,MM:a.fullMonth,MMM:s.monthsShort[a.month],MMMM:s.months[a.month],yy:a.year.toString().slice(-2),yyyy:a.year,yyyy1:n[0],yyyy2:n[1]};for(let[e,t]of Object.entries(l))i=r(i,k(e),t);return i}down(e){this._handleUpDownActions(e,"down")}up(e){this._handleUpDownActions(e,"up")}selectDate(e){let t,s=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},{currentView:a,parsedViewDate:n,selectedDates:r}=this,{updateTime:h}=s,{moveToOtherMonthsOnSelect:o,moveToOtherYearsOnSelect:l,multipleDates:d,range:c,autoClose:u}=this.opts,m=r.length;if(Array.isArray(e))return e.forEach((e=>{this.selectDate(e,s)})),new Promise((e=>{setTimeout(e)}));if((e=b(e))instanceof Date){if(a===i.days&&e.getMonth()!==n.month&&o&&(t=new Date(e.getFullYear(),e.getMonth(),1)),a===i.years&&e.getFullYear()!==n.year&&l&&(t=new Date(e.getFullYear(),0,1)),t&&this.setViewDate(t),d&&!c){if(m===d)return;this._checkIfDateIsSelected(e)||r.push(e)}else if(c)switch(m){case 1:r.push(e),this.rangeDateTo||(this.rangeDateTo=e),p(this.rangeDateFrom,this.rangeDateTo)&&(this.rangeDateTo=this.rangeDateFrom,this.rangeDateFrom=e),this.selectedDates=[this.rangeDateFrom,this.rangeDateTo];break;case 2:this.selectedDates=[e],this.rangeDateFrom=e,this.rangeDateTo="";break;default:this.selectedDates=[e],this.rangeDateFrom=e}else this.selectedDates=[e];return this.trigger(i.eventChangeSelectedDate,{action:i.actionSelectDate,silent:null==s?void 0:s.silent,date:e,updateTime:h}),this._updateLastSelectedDate(e),u&&!this.timepickerIsActive&&this.visible&&(d||c?c&&1===m&&this.hide():this.hide()),new Promise((e=>{setTimeout(e)}))}}unselectDate(e){let t=this.selectedDates,s=this;if((e=b(e))instanceof Date)return t.some(((a,n)=>{if(u(a,e))return t.splice(n,1),s.selectedDates.length?s._updateLastSelectedDate(s.selectedDates[s.selectedDates.length-1]):(s.rangeDateFrom="",s.rangeDateTo="",s._updateLastSelectedDate(!1)),this.trigger(i.eventChangeSelectedDate,{action:i.actionUnselectDate,date:e}),!0}))}replaceDate(e,t){let s=this.selectedDates.find((t=>u(t,e,this.currentView))),a=this.selectedDates.indexOf(s);a<0||u(this.selectedDates[a],t,this.currentView)||(this.selectedDates[a]=t,this.trigger(i.eventChangeSelectedDate,{action:i.actionSelectDate,date:t,updateTime:!0}),this._updateLastSelectedDate(t))}clear(){this.selectedDates=[],this.rangeDateFrom=!1,this.rangeDateTo=!1,this.trigger(i.eventChangeSelectedDate,{action:i.actionUnselectDate})}show(){let{onShow:e,isMobile:t}=this.opts;this._cancelScheduledCall(),this.visible||this.hideAnimation||this._createComponents(),this.setPosition(this.opts.position),this.$datepicker.classList.add("-active-"),this.visible=!0,e&&this._scheduleCallAfterTransition(e),t&&this._showMobileOverlay()}hide(){let{onHide:e,isMobile:t}=this.opts,i=this._hasTransition();this.visible=!1,this.hideAnimation=!0,this.$datepicker.classList.remove("-active-"),this.customHide&&this.customHide(),this.elIsInput&&this.$el.blur(),this._scheduleCallAfterTransition((t=>{!this.customHide&&(t&&i||!t&&!i)&&this._finishHide(),e&&e(t)})),t&&P.classList.remove("-active-")}_triggerOnSelect(){let e=[],t=[],{selectedDates:i,locale:s,opts:{onSelect:a,multipleDates:n,range:r}}=this,h=n||r,o="function"==typeof s.dateFormat;i.length&&(e=i.map(g),t=o?n?s.dateFormat(e):e.map((e=>s.dateFormat(e))):e.map((e=>this.formatDate(e,s.dateFormat)))),a({date:h?e:e[0],formattedDate:h?t:t[0],datepicker:this})}_handleAlreadySelectedDates(e,t){let{range:i,toggleSelected:s}=this.opts;i?s?this.unselectDate(t):2!==this.selectedDates.length&&this.selectDate(t):s&&this.unselectDate(t),s||this._updateLastSelectedDate(e)}_handleUpDownActions(e,t){if(!((e=b(e||this.focusDate||this.viewDate))instanceof Date))return;let i="up"===t?this.viewIndex+1:this.viewIndex-1;i>2&&(i=2),i<0&&(i=0),this.setViewDate(new Date(e.getFullYear(),e.getMonth(),1)),this.setCurrentView(this.viewIndexes[i])}_handleRangeOnFocus(){1===this.selectedDates.length&&(p(this.selectedDates[0],this.focusDate)?(this.rangeDateTo=this.selectedDates[0],this.rangeDateFrom=this.focusDate):(this.rangeDateTo=this.focusDate,this.rangeDateFrom=this.selectedDates[0]))}getCell(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:i.day;if(!((e=b(e))instanceof Date))return;let{year:s,month:a,date:n}=o(e),r='[data-year="'.concat(s,'"]'),h='[data-month="'.concat(a,'"]'),l='[data-date="'.concat(n,'"]'),d={[i.day]:"".concat(r).concat(h).concat(l),[i.month]:"".concat(r).concat(h),[i.year]:"".concat(r)};return this.views[this.currentView].$el.querySelector(d[t])}_showMobileOverlay(){P.classList.add("-active-")}_hasTransition(){return window.getComputedStyle(this.$datepicker).getPropertyValue("transition-duration").split(", ").reduce(((e,t)=>parseFloat(t)+e),0)>0}get parsedViewDate(){return o(this.viewDate)}get currentViewSingular(){return this.currentView.slice(0,-1)}get curDecade(){return d(this.viewDate)}get viewIndex(){return this.viewIndexes.indexOf(this.currentView)}get isFinalView(){return this.currentView===i.years}get hasSelectedDates(){return this.selectedDates.length>0}get isMinViewReached(){return this.currentView===this.opts.minView||this.currentView===i.days}get $container(){return this.$customContainer||R}static replacer(e,t,i){return e.replace(t,(function(e,t,s,a){return t+i+a}))}}var j;return N(K,"defaults",s),N(K,"version","3.1.0"),N(K,"defaultContainerId","air-datepicker-global-container"),j=K.prototype,Object.assign(j,A),t.default}()}));
;
"function"!=typeof Object.create&&(Object.create=function(t){function o(){}return o.prototype=t,new o}),function(t,o,i,s){"use strict";var n={_positionClasses:["bottom-left","bottom-right","top-right","top-left","bottom-center","top-center","mid-center"],_defaultIcons:["success","error","info","warning"],init:function(o,i){this.prepareOptions(o,t.toast.options),this.process()},prepareOptions:function(o,i){var s={};"string"==typeof o||o instanceof Array?s.text=o:s=o,this.options=t.extend({},i,s)},process:function(){this.setup(),this.addToDom(),this.position(),this.bindToast(),this.animate()},setup:function(){var o="";if(this._toastEl=this._toastEl||t("<div></div>",{class:"jq-toast-single"}),o+='<span class="jq-toast-loader"></span>',this.options.allowToastClose&&(o+='<span class="close-jq-toast-single">&times;</span>'),this.options.text instanceof Array){this.options.heading&&(o+='<h2 class="jq-toast-heading">'+this.options.heading+"</h2>"),o+='<ul class="jq-toast-ul">';for(var i=0;i<this.options.text.length;i++)o+='<li class="jq-toast-li" id="jq-toast-item-'+i+'">'+this.options.text[i]+"</li>";o+="</ul>"}else this.options.heading&&(o+='<h2 class="jq-toast-heading">'+this.options.heading+"</h2>"),o+=this.options.text;this._toastEl.html(o),!1!==this.options.bgColor&&this._toastEl.css("background-color",this.options.bgColor),!1!==this.options.textColor&&this._toastEl.css("color",this.options.textColor),this.options.textAlign&&this._toastEl.css("text-align",this.options.textAlign),!1!==this.options.icon&&(this._toastEl.addClass("jq-has-icon"),-1!==t.inArray(this.options.icon,this._defaultIcons)&&this._toastEl.addClass("jq-icon-"+this.options.icon)),!1!==this.options.class&&this._toastEl.addClass(this.options.class)},position:function(){"string"==typeof this.options.position&&-1!==t.inArray(this.options.position,this._positionClasses)?"bottom-center"===this.options.position?this._container.css({left:t(o).outerWidth()/2-this._container.outerWidth()/2,bottom:20}):"top-center"===this.options.position?this._container.css({left:t(o).outerWidth()/2-this._container.outerWidth()/2,top:20}):"mid-center"===this.options.position?this._container.css({left:t(o).outerWidth()/2-this._container.outerWidth()/2,top:t(o).outerHeight()/2-this._container.outerHeight()/2}):this._container.addClass(this.options.position):"object"==typeof this.options.position?this._container.css({top:this.options.position.top?this.options.position.top:"auto",bottom:this.options.position.bottom?this.options.position.bottom:"auto",left:this.options.position.left?this.options.position.left:"auto",right:this.options.position.right?this.options.position.right:"auto"}):this._container.addClass("bottom-left")},bindToast:function(){var t=this;this._toastEl.on("afterShown",function(){t.processLoader()}),this._toastEl.find(".close-jq-toast-single").on("click",function(o){o.preventDefault(),"fade"===t.options.showHideTransition?(t._toastEl.trigger("beforeHide"),t._toastEl.fadeOut(function(){t._toastEl.trigger("afterHidden")})):"slide"===t.options.showHideTransition?(t._toastEl.trigger("beforeHide"),t._toastEl.slideUp(function(){t._toastEl.trigger("afterHidden")})):(t._toastEl.trigger("beforeHide"),t._toastEl.hide(function(){t._toastEl.trigger("afterHidden")}))}),"function"==typeof this.options.beforeShow&&this._toastEl.on("beforeShow",function(){t.options.beforeShow(t._toastEl)}),"function"==typeof this.options.afterShown&&this._toastEl.on("afterShown",function(){t.options.afterShown(t._toastEl)}),"function"==typeof this.options.beforeHide&&this._toastEl.on("beforeHide",function(){t.options.beforeHide(t._toastEl)}),"function"==typeof this.options.afterHidden&&this._toastEl.on("afterHidden",function(){t.options.afterHidden(t._toastEl)}),"function"==typeof this.options.onClick&&this._toastEl.on("click",function(){t.options.onClick(t._toastEl)})},addToDom:function(){var o=t(".jq-toast-wrap");if(0===o.length?(o=t("<div></div>",{class:"jq-toast-wrap",role:"alert","aria-live":"polite"}),t("body").append(o)):this.options.stack&&!isNaN(parseInt(this.options.stack,10))||o.empty(),o.find(".jq-toast-single:hidden").remove(),o.append(this._toastEl),this.options.stack&&!isNaN(parseInt(this.options.stack),10)){var i=o.find(".jq-toast-single").length-this.options.stack;i>0&&t(".jq-toast-wrap").find(".jq-toast-single").slice(0,i).remove()}this._container=o},canAutoHide:function(){return!1!==this.options.hideAfter&&!isNaN(parseInt(this.options.hideAfter,10))},processLoader:function(){if(!this.canAutoHide()||!1===this.options.loader)return!1;var t=this._toastEl.find(".jq-toast-loader"),o=(this.options.hideAfter-400)/1e3+"s",i=this.options.loaderBg,s=t.attr("style")||"";s=s.substring(0,s.indexOf("-webkit-transition")),s+="-webkit-transition: width "+o+" ease-in;                       -o-transition: width "+o+" ease-in;                       transition: width "+o+" ease-in;                       background-color: "+i+";",t.attr("style",s).addClass("jq-toast-loaded")},animate:function(){t=this;if(this._toastEl.hide(),this._toastEl.trigger("beforeShow"),"fade"===this.options.showHideTransition.toLowerCase()?this._toastEl.fadeIn(function(){t._toastEl.trigger("afterShown")}):"slide"===this.options.showHideTransition.toLowerCase()?this._toastEl.slideDown(function(){t._toastEl.trigger("afterShown")}):this._toastEl.show(function(){t._toastEl.trigger("afterShown")}),this.canAutoHide()){var t=this;o.setTimeout(function(){"fade"===t.options.showHideTransition.toLowerCase()?(t._toastEl.trigger("beforeHide"),t._toastEl.fadeOut(function(){t._toastEl.trigger("afterHidden")})):"slide"===t.options.showHideTransition.toLowerCase()?(t._toastEl.trigger("beforeHide"),t._toastEl.slideUp(function(){t._toastEl.trigger("afterHidden")})):(t._toastEl.trigger("beforeHide"),t._toastEl.hide(function(){t._toastEl.trigger("afterHidden")}))},this.options.hideAfter)}},reset:function(o){"all"===o?t(".jq-toast-wrap").remove():this._toastEl.remove()},update:function(t){this.prepareOptions(t,this.options),this.setup(),this.bindToast()},close:function(){this._toastEl.find(".close-jq-toast-single").click()}};t.toast=function(t){var o=Object.create(n);return o.init(t,this),{reset:function(t){o.reset(t)},update:function(t){o.update(t)},close:function(){o.close()}}},t.toast.options={text:"",heading:"",showHideTransition:"fade",allowToastClose:!0,hideAfter:3e3,loader:!0,loaderBg:"#9EC600",stack:5,position:"bottom-left",bgColor:!1,textColor:!1,textAlign:"left",icon:!1,beforeShow:function(){},afterShown:function(){},beforeHide:function(){},afterHidden:function(){},onClick:function(){}}}(jQuery,window,document);

;
$(function () {

    $(document).ready(function () {
        $(document).delegate('.select .select__main', 'click', function () {
            $(this).parent().toggleClass('active');
            return false;
        }).delegate('.select .select__item', 'click', function (e) {
            //e.stopPropagation(); - не работает фильр блога
            var value = false;
            if ($(this).hasClass('select__item--checkbox')) {
                var ne = false;
                value  = [];
                $(this).closest('.select__list').find('.select__item--checkbox').each(function () {
                    if ($(this).find('input[type=checkbox]:checked').length) {
                        value.push($(this).find('.select__name:first').text());
                        ne = true;
                    }
                });
                value = value.join(', ');
                $(this).closest('.select').toggleClass('has-values', ne).find('.select__values:first').html(value);
            } else {
                value = $(this).html();
                $(this).addClass('active').siblings('.select__item').removeClass('active');
                $(this).closest('.select').removeClass('active').find('.select__main:first').html(value);
                if ($(this).data('id') !== undefined) value = $(this).data('id');
                $(this).closest('.select').find('input[type=hidden]').each(function () {
                    $(this).val(value);
                });
            }
        })

        $('body').on('click', 'a.--openfilter', function () {
            $($(this).attr('href')).show();
            return false;
        }).on('click', '.--closefilter', function () {
            $(this).closest('.mainfilter').hide();
            return false;
        }).on('click', '.data-tab-link', function () {
            var W = $('.data-tab-wrapper[data-tabs="' + $(this).attr('data-tabs') + '"]:first');
            var T = W.find('.data-tab-item[data-tab="' + $(this).attr('data-tab') + '"]:first');
            $(this).addClass('active').siblings('.data-tab-link').removeClass('active');
            T.addClass('active').siblings('.data-tab-item').removeClass('active');
            return false;
        }).on('click', '.--openpopup', function () {
            var P = $(this).attr('data-popup');
            var _f = $(this).data('call');

            $('body').find('div.' + P + ':first').show();
            setTimeout(function() {
                $(document).find('.gallery__slider').each(function () {
                    new Swiper(this, {
                        loop: true, slidesPerView: 1, speed: 1000, spaceBetween: 30,
                        navigation: { nextEl: '.gallery__nav .next', prevEl: '.gallery__nav .prev' },
                    });
                });
            }, 600);
            //return false;
        }).on('click', '.--switchpopup', function () {
            var P = $(this).attr('data-popup');
            $(this).closest('.popup').hide();
            $('body').find('div.' + P + ':first').show();
            return false;
        }).on('click', '.popup__panel.--succed.d-block .popup__close', function (e) {
            e.stopPropagation();
            $(this).closest('.popup').hide();
            $(this).closest('.popup').find('.popup__panel.d-none:not(.--succed)').removeClass('d-none');
            $(this).closest('.popup').find('.--succed.d-block').removeClass('d-block');
            window.location.reload();
            return false;
        }).on('click', '.popup__close', function () {
            $(this).closest('.popup').hide();
            return false;
        }).on('click', 'button.burger', function (e) {
            e.stopPropagation();
            $(this).toggleClass('active');
            $('#mainmenu').toggleClass('active', $(this).hasClass('active'));
        }).on('click', '#mainmenu', function (e) {
            e.stopPropagation();
        }).on('click', '.accardeon .accardeon__click', function () {
            if ($(this).closest('.accardeon').hasClass('active')) {
                $(this).closest('.accardeon').removeClass('active');
            } else {
                $(this).closest('.accardeon').addClass('active').siblings('.accardeon').removeClass('active');
            }
            return false;
        }).on('___click', '.select .select__main', function () { // ###############
            if ($(this).parent().hasClass('active')) {
                $(this).parent().removeClass('active');
            } else {
                $('.select').each(function () {
                    $(this).removeClass('active');
                });
                $(this).parent().addClass('active');
            }
            return false;
        }).on('___click', '.select .select__item', function (e) { // ###############
            //e.stopPropagation(); - не работает фильр блога
            var value = false;
            if ($(this).hasClass('select__item--checkbox')) {
                var ne = false;
                value = [];
                $(this).closest('.select__list').find('.select__item--checkbox').each(function () {
                    if ($(this).find('input[type=checkbox]:checked').length) {
                        value.push($(this).find('.select__name:first').text());
                        ne = true;
                    }
                });
                value = value.join(', ');
                $(this).closest('.select').toggleClass('has-values', ne).find('.select__values:first').html(value);
            } else {
                value = $(this).html();
                $(this).addClass('active').siblings('.select__item').removeClass('active');
                $(this).closest('.select').removeClass('active').find('.select__main:first').html(value);
                $(this).closest('.select').find('input[type=hidden]').each(function () {
                    $(this).val(value);
                });
            }
        }).on('click', '.admin-editor button.user__edit', function () {
            $(this).closest('.admin-editor').find('.profile-edit:first').addClass('active');
            return false;
        }).on('click', '.account button.user__edit.all', function () {
            $(this).parents('.account').find('.profile-edit').toggleClass('active');
            return false;
        }).on('click', '.account button.user__edit:not(.all)', function () {
            $(this).closest('.account').find('.profile-edit:first').toggleClass('active');
            return false;
        }).on('click', '.popup__overlay', function () {
            $(this).closest('.popup').hide();
        }).on('click', '.profile-menu', function (e) {
            e.stopPropagation();
            $(this).toggleClass('active');
        }).on('click', 'button.flag-date__ico', function () {
            $(this).toggleClass('checked');
        }).on('change', '.hider-checkbox input[type=checkbox]', function (e) {
            $('[data-hide="' + $(this).parent().attr('data-hide-input') + '"]').toggle(!(this.checked));
        }).on('change', '.show-checkbox input[type=checkbox]', function (e) {
            $('[data-show="' + $(this).parent().attr('data-show-input') + '"]').toggle(this.checked);
        }).on('click', '.repeater-delete', function () {
            $(this).closest('.repeater-item').remove();
            return false;
        }).on('click', '.repeater-add', function () {
            var R = $(this).attr('data-repeater');
            var S = $('.repeater-sample[data-repeater="' + R + '"]:first');
            var C = $('.repeater-container[data-repeater="' + R + '"]:first');
            if (S) if (C) {
                S = S.clone();
                S.removeClass('repeater-sample').addClass('repeater-item').appendTo(C);
                S.trigger('repeaterAdd');
            }
            return false;
        }).on('repeaterAdd', '[data-repeater="license"]', function () {
            $(this).find('input').attr('name', 'licenses[]');
        }).on('repeaterAdd', '[data-repeater="study"]', function () {
            var _max_idx = $(this).parents('.repeater-container')
                .find('.profile-education__inner.row[data-idx]:last')
                .data('idx');
            _max_idx++;
            $(this).attr('data-idx', _max_idx);
            $(this).find('input[name="stages[][stage]"]').attr('name', 'stages[' + _max_idx + '][stage]');
            $(this).find('input[name="stages[][year]"]').attr('name', 'stages[' + _max_idx + '][year]');
            $(this).find('input[name="stages[][year_end]"]').attr('name', 'stages[' + _max_idx + '][year_end]');

        }).on('click', '.ddl', function () {
            $(this).toggleClass('active');
            return false;
        }).on('click', '.ddl a', function () {
            $(this).parent().toggleClass('active');
            return false;
        });

        $('html').on('click', 'body', function () {
            $('.select').removeClass('active');
            $('button.burger').removeClass('active');
            $('#mainmenu').removeClass('active');
            $('.profile-menu').removeClass('active');
        }).on('click', 'header', function () {
            $('#mainfilter').hide();
        });

        $(document).find('.gallery__slider').each(function () {
            new Swiper(this, {
                loop: true, slidesPerView: 1, speed: 1000, spaceBetween: 30,
                navigation: { nextEl: '.gallery__nav .next', prevEl: '.gallery__nav .prev' },
            });

        })

        initPlugins = function () {

            $('.datebirthdaypickr').each(function () {
                new AirDatepicker(this, {
                    selectedDates: [$(this).val() || (new Date())],
                    autoClose: true,
                    dateFormat: 'dd.MM.yyyy',
                    timepicker: false
                });
            });
            $('.daterangepickr').each(function () {
                new AirDatepicker(this, {
                    autoClose: true,
                    range: true,
                    multipleDatesSeparator: ' - '
                });
            });
            $('.yearpickr').each(function () {
                new AirDatepicker(this, {
                    selectedDates: [$(this).val() || (new Date())],
                    view: 'years',
                    timepicker: false,
                    minView: 'years',
                    dateFormat: 'yyyy',
                    autoClose: true
                });
            });

            $('.datepickr').each(function () {
                new AirDatepicker(this, {
                    selectedDates: [$(this).val() || (new Date())],
                    timepicker: false,
                    dateFormat: 'dd.MM.yyyy',
                    autoClose: true
                });
            });
            $('.datetimepickr').each(function () {
                new AirDatepicker(this, {
                    selectedDates: [$(this).val() || (new Date())],
                    minHours: 8,
                    maxHours: 20,
                    timepicker: true,
                    autoClose: true,
                    minutesStep: 10,
                    dateFormat: 'dd.MM.yyyy',
                    timeFormat: "HH:mm"
                });
            });

            $('input[data-inputmask]').each(function () {
                $(this).inputmask();
            });
            //
            //$('input.autocomplete').each(function () {
            //    $(this).autocomplete({
            //        noCache: true,
            //        minChars: 3,
            //    });
            //});

            $('input.autocomplete-inline').each(function () {
                let _lookup = $(this).data('lookup');
                if(!!_lookup){
                    _lookup = _lookup.split(',');
                } else {
                    _lookup = [];
                }
                $(this).autocomplete({
                    noCache: true,
                    minChars: 1,
                    noSuggestionNotice: '<p>Нет результатов..</p>',
                    lookup: function (query, done) {
                        // Do Ajax call or lookup locally, when done,
                        // call the callback and pass your results:
                        var _res = [];
                        _lookup.forEach(function(v, k){
                            _res.push({"value": v, "data": k});
                        });
                        var result = {suggestions: _res};
                        done(result);
                    },
                });
            });
        };

        $(document).on('wb-verify-false', function (e, el, err) {
            if (err !== undefined) {
                alert(err)
                //wbapp.toast(wbapp._settings.sysmsg.error, err, { target: '.content-toasts', 'bgcolor': 'warning', 'txcolor': 'white' });
            }
        });

        $(document).on('wb-save-error', function (e, res) {
            if (res.data == undefined) return;
            if (res.data.error == true) {
                alert(res.data.msg)
                //wbapp.toast(wbapp._settings.sysmsg.error, err, { target: '.content-toasts', 'bgcolor': 'warning', 'txcolor': 'white' });
            }
        });

        $(document).on('wb-ajax-done', function (e, res) {
            if (res.data.error == true) {
                alert(res.data.msg)
                //wbapp.toast(wbapp._settings.sysmsg.error, err, { target: '.content-toasts', 'bgcolor': 'warning', 'txcolor': 'white' });
            }
        });

        function getCookie(name) {
            var match = document.cookie.match(RegExp('(?:^|;\\s*)' + name + '=([^;]*)'));
            return match ? match[1] : null;
        }

        function setCookie(c_name, value, exdays) {
            var exdate = new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
            document.cookie = c_name + "=" + c_value;
        }

        /*
         var map = document.querySelector('#map');
         if (map) {
         new google.maps.Map(map, {
         center: { lat: 55.742403, lng: 37.575313 },
         zoom: 12,
         });
         }
         */

        /*
         var header = $('.header'),
         scrollPrev = 0;

         $(window).scroll(function() {
         var scrolled = $(window).scrollTop();

         if ((scrolled > 10) && (scrolled > scrollPrev)) {
         header.addClass('out');
         } else {
         header.removeClass('out');
         }

         scrollPrev = scrolled;
         });

         */

        //header flip
        /*
         if($('.header__logo').hasClass('header__logo-red')){
         setTimeout(function(){
         $('.header__logo-red').addClass('active');
         }, 2000);
         }
         */

        //sliders
        var swiper = new Swiper('.product-slider', {
            slidesPerView: 1,
            watchSlidesVisibility: true,
            watchOverflow: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        /*
         var swiper = new Swiper('.post-slider', {
         slidesPerView: 1,
         watchOverflow: true,
         spaceBetween: 30,
         });

         */

        if (getCookie('cookok')) {
            $('.cookies-block').remove()
        } else {
            $('.cookies-block').addClass('cookies-block--active')
            $('.cookies-block .cookies-block__accept-button').on('click', function () {
                setCookie('cookok', true, 300)
                $('.cookies-block').removeClass('cookies-block--active')
            })
        }

        // top button
        $('.to_top_btn').click(function () {
            $('html, body').animate({ scrollTop: 0 }, 800);
        })

        if (window.pageYOffset > 10) {
            $('.header').addClass('out');
            $('.to_top_btn').addClass('showed');
        }

        $(window).scroll(function () {
            if ($(this).scrollTop() <= 10) {
                $('.header').removeClass('out');
                $('.to_top_btn').removeClass('showed');
            }
            if ($(this).scrollTop() > 10) {
                $('.header').addClass('out');
                $('.to_top_btn').addClass('showed');
            }
        });

    });

});
;
$(function(){

	if($(".header__logo-red").length > 0 && $('main.page').attr('data-barba-namespace') == 'lnd'){
		setTimeout(function(){$('.header__logo-red').addClass('active');}, 1000);
	}

	$('.data-tab-link').on('click', function(){
		if($('main.page').attr('data-barba-namespace') == 'problems'){
			if($(this).attr('data-tab') == 'gyn')
				$('.problems-filter').css('display', 'none');
			else
				$('.problems-filter').css('display', 'block');
		}
	});


	//start DELETE ALL
	//service__header
	$('.mainfilter__left .mainfilter__checkbox input').on('click', function(){
		$(this).toggleClass('act');

		function getRandomInt(max) {
		  return Math.floor(Math.random() * max);
		}

		var attr = $(this).parents('.mainfilter__checkbox').attr('data-name'),
				name = $(this).parents('.checkbox').find('.checbox__name').text(),
				letter = $(this).parents('.accardeon').find('.accardeon__name').text().substr(0,1),
				rand =  getRandomInt(30000);

		if($(this).hasClass('act') && attr == undefined){
			//console.log('1');
			var color = $(this).parents('.accardeon').find('.accardeon__name').attr('class').replace(/accardeon__name /g, '');
			$(this).attr('data-rand', rand);
			$('.mainfilter__choice-main .mainfilter__tags').append("<div class='mainfilter-tag' id='" + rand + "'><div class='mainfilter-tag__name'><div class='mainfilter-tag__delete'><svg class='svgsprite _delete'><use xlink:href='assets/img/sprites/svgsprites.svg#delete'></use></svg></div><a class='mainfilter-tag__link' href='/landing.html'>" + name + "</a></div><div class='mainfilter-tag__group " + color + " --yellow'>" + letter + "</div></div>");
		}
		else if(!$(this).hasClass('act') && attr == undefined){
			//console.log('2');
			$("#" + $(this).attr('data-rand')).remove();
			$(this).removeAttr("data-rand");
		}
		else if($(this).hasClass('act') && $(this).parents('.mainfilter__checkbox').attr('data-name')){
			//console.log('3');
			for(var i = 0; i < $('.' + attr).length; i++){
				var atts = $('.' + attr).eq(i).attr('class').replace(/checkbox mainfilter__checkbox /g, ''),
						att = $(this).parents('.checkbox').attr('data-name'),
						tt = $('.' + attr).eq(i).find('.checbox__name').text(),
						ll = $('.' + attr).eq(i).parents('.accardeon').find('.accardeon__name').text().substr(0,1),
						cc = $('.' + attr).eq(i).parents('.accardeon').find('.accardeon__name').attr('class').replace(/accardeon__name /g, '');
				
				if(!$('.' + attr).eq(i).attr('data-sp') > 0){
					rand =  getRandomInt(30000);
					$('.' + attr).eq(i).attr('data-sp', rand);
					$(this).attr('data-kt2', rand);
					$('.mainfilter__symptoms .mainfilter__tags').append("<div class='mainfilter-tag "+att+"' data-fof='" + atts + " 'data-kt='" + rand + "'><div class='mainfilter-tag__name'><div class='mainfilter-tag__delete'><svg class='svgsprite _delete'><use xlink:href='assets/img/sprites/svgsprites.svg#delete'></use></svg></div><a class='mainfilter-tag__link' href='/landing.html'>" + tt + "</a></div><div class='mainfilter-tag__group " + cc + " --yellow'>" + ll + "</div></div>");
				}
				else{
					if($('.mainfilter__symptoms .mainfilter__tags').find('.mainfilter-tag').eq(i).attr('data-fof').indexOf(att) > 0){
						//console.log('==1');
						$('.mainfilter__symptoms .mainfilter__tags').find('.mainfilter-tag').eq(i).addClass($(this).parents('.checkbox').attr('data-name'));
					}
					else{
						//console.log('==2');
						//$('.mainfilter__symptoms .mainfilter__tags').append("<div class='mainfilter-tag "+att+"' data-fof='" + atts + "'><div class='mainfilter-tag__name'><div class='mainfilter-tag__delete'><svg class='svgsprite _delete'><use xlink:href='assets/img/sprites/svgsprites.svg#delete'></use></svg></div><a class='mainfilter-tag__link' href='/landing.html'>" + tt + "</a></div><div class='mainfilter-tag__group " + cc + " --yellow'>" + ll + "</div></div>");
					}
				}
			}
		}
		else if(!$(this).hasClass('act') && $(this).parents('.mainfilter__checkbox').attr('data-name')){
			console.log('4');
			for(var i = 0; i < $('.mainfilter__tags .mainfilter-tag').length; i++){
				if($('.mainfilter__symptoms').find('.mainfilter-tag').eq(i).hasClass(attr)){
					$('.mainfilter__symptoms').find('.mainfilter-tag').eq(i).removeClass(attr);
					if($('.mainfilter__symptoms').find('.mainfilter-tag').eq(i).attr('class').length == 14){
						$('.' + attr).eq(i).removeAttr( "data-sp" );
						$('.mainfilter__symptoms').find('.mainfilter-tag').eq(i).addClass('del');
					}
				}
			}
			setTimeout(function(){
				$('.del').remove();
			}, 10);
		}

	});

	$('.mainfilter__choice-main .mainfilter__tags').on('click', 'svg', function(){
		$('[data-rand = "' + $(this).parents('.mainfilter-tag').attr('id') + '"]').removeClass('act').removeAttr('data-rand').removeAttr("checked");
		$(this).parents('.mainfilter-tag').remove();
	});

	$('.mainfilter__symptoms .mainfilter__tags').on('click', 'svg', function(){
		//console.log('sd');
		//$('[data-rand = "' + $(this).parents('.mainfilter-tag').attr('id') + '"]').removeClass('act').removeAttr('data-rand').removeAttr("checked");
		$(this).parents('.mainfilter-tag').remove();
	});
	//end DELETE ALL


	//service__item
	$('.service__item input').on('click', function(){

		function getRandomInt(max) {
		  return Math.floor(Math.random() * max);
		}

		$(this).toggleClass('act');

		var attrNum = getRandomInt(30000),
				text  = $(this).parents('.service__item').find('.service__name').text(),
				price = $(this).parents('.service__item').find('.service__price').text(),
				block = "<div class='all-form__service' data-servId='" + attrNum + "'><div class='all-form__service-name'><div class='all-form__service-delete'><svg class='svgsprite _delete'><use xlink:href='assets/img/sprites/svgsprites.svg#delete'></use></svg></div><p>" + text + "</p></div><div class='all-form__service__summ'>" + price + "</div></div>",
				summBlock  = $(this).parents('.all-tab').find('.all-form__summ p').eq(1),
				summ  = $(summBlock).text().replace(/[^0-9]/gi, ''),
				price2 = price.replace(/[^0-9]/gi, '');


		if($(this).hasClass('act')){
			$(this).attr('data-servNum', attrNum);
			$('.all-form__services').append(block);
			$(summBlock).text((+summ + +price2).toLocaleString('ru') + " ₽");
		}
		else{
			$(this).removeAttr('data-servNum');
			$(this).parents('.all-tab').find( ".all-form__service:contains('" + text + "')" ).remove();
			$(summBlock).text((+summ - +price2).toLocaleString('ru') + " ₽");
		}

		$('.input-sv').val($('.all-form .all-form__service').text().replace(/₽/gi, '₽\n'));
	});

	$('.all-form__services').on('click', 'svg', function(){
		var summ1 = $('.all-form__summ p').eq(1).text().replace(/[^0-9]/gi, ''),
				summ2 = $(this).parents('.all-form__service').find('.all-form__service__summ').text().replace(/[^0-9]/gi, ''),
				summ3 = +summ1 - +summ2;

		$('.all-form__summ').find('p').eq(1).text((summ3).toLocaleString('ru') + " ₽");

		$('[data-servNum = "' + $(this).parents('.all-form__service').attr('data-servId') + '"]').removeClass('act').removeAttr('data-servNum checked');
		$(this).parents('.all-form__service').remove();

		$('.input-sv').val($('.all-form .all-form__service').text().replace(/₽/gi, '₽\n'));
	});


	$(":input").inputmask();

	//header and filter
	$('.--openfilter').on('click', function(){
		if($('.header').hasClass('header-fix')){
			$('.header').removeClass('header-fix');
			setTimeout(function(){$('#mainfilter').css('display', 'none');}, 10);
		}
		else{
			$('.header').addClass('header-fix');
			$('#mainfilter').css('display', 'block');
		}
	});
	$('.mainfilter .mainfilter__close').on('click', function(){
		$('.header').removeClass('header-fix');
		$('#mainfilter').css('display', 'none');
	});

	$('.mainfilter-mob').on('click', function(e){
		e.preventDefault();

		$('.mainfilter').animate({scrollTop : $('.mainfilter__choice').offset().top},400);
	});

});
;
var filter;

function BlogFilter(){

	this.blog_category = null;
	this.blog_year = null;
	this.blog_mouth = null;

	this.periods = null;
	this.id_list = [];

	this.category_container = $('.filter-select__list#category');
	this.category_items = this.category_container.find('.filter-select__item');

	this.years_container = $('.filter-select__list#years');
	this.years_items = this.years_container.find('.filter-select__item');

	this.months_container = $('.filter-select__list#months');
	this.months_items = this.months_container.find('.filter-select__item');

	this.get_data_ajax = function(){
		var _this = this, filter_params;
		filter.getDates();

		if(_this.blog_category === null){
			filter_params = {
				'id' : {'$in': _this.id_list},
			}
		}else{
			filter_params = {
				'id' : {'$in': _this.id_list},
				'category': _this.blog_category
			}
		}

		return JSON.stringify({
			target: '#blogList',
			filter_remove: 'category',
			filter_add: filter_params
		});
	}

	this.getDates = function(){
		var _this = this;

		$.ajax({
			url: '/form/blog/getDates',
			method: 'post',
			data: {
				month: this.blog_mouth,
				year: this.blog_year
			},
			async: false,
			success: function(data){
				_this.id_list = data;
			}
		})
	}

	this.init = function(){
		var _this = this;

		let cat_cloned = _this.category_items.eq(0).clone();
		cat_cloned.attr('data-id', 'all').text('Все').addClass('active').prependTo(_this.category_container);

		$.ajax({
			url: '/form/blog/getPeriods',
			method: 'get',
			success: function(data){
				_this.periods = data;

				$.each(_this.periods.months, function(i, month){
					let cloned = _this.months_items.eq(0).clone();
					cloned
						.text(month)
						.removeClass('active').removeClass('blank')
						.appendTo(_this.months_container);
				})

				$.each(_this.periods.years, function(i, year){
					let cloned = _this.years_items.eq(0).clone();
					cloned
						.text(year)
						.removeClass('active').removeClass('blank')
						.appendTo(_this.years_container);
				})
			}
		})
	}
}


$(document).ready(function(){
	if($('div').is('#blogFilter')){
		filter = new BlogFilter();
		filter.init();

		$('.filter-select__list#months').on('click', '.filter-select__item', function(){
			filter.blog_mouth = $(this).text();
			$(this).attr('data-ajax', filter.get_data_ajax());
		})

		$('.filter-select__list#years').on('click', '.filter-select__item', function(){
			filter.blog_year = $(this).text();
			$(this).attr('data-ajax', filter.get_data_ajax());
		})

		$('.filter-select__list#category').on('click', '.filter-select__item', function(){

			if($(this).attr('data-id') === 'all'){
				filter.blog_category = null;
			}else{
				filter.blog_category = $(this).attr('data-id');
			}

			$(this).attr('data-ajax', filter.get_data_ajax());
		})
	}
})




;
var auth;

function Auth()
{
	this.start_button = $('.btn.enter');

	this.phone_current = null;
	this.sms_code = '';
	this.sms_code_timelife = 30;
	this.timelife_handler = null;

	//Общие функции

	this.close_all_windows = function(){
		this.phone_window_close();
		this.smscode_window_close();
		this.email_enter_window_close();
		this.registration_window_close();
		this.recover_window_close();
	}

	this.num_word = function(value, words = ['секунда', 'секунды', 'секунд'], show = true){
		var num = value % 100;
		if (num > 19) {
			num = num % 10;
		}

		var out = (show) ?  value + ' ' : '';
		switch (num) {
			case 1:  out += words[0]; break;
			case 2:
			case 3:
			case 4:  out += words[1]; break;
			default: out += words[2]; break;
		}

		return out;
	}

	//Окно ввода номера телефона-----------------------------------
	this.phone_window = $('.popup.--enter-number');
	this.phone_value = this.phone_window.find('input[name=phone]');
	this.phone_window_alert = this.phone_window.find('.alert');
	this.phone_window_close_btn = this.phone_window.find('.popup__close');
	this.phone_window_submit_btn = this.phone_window.find('.form__submit');

	this.phone_window_close = function(){
		this.phone_window_clear_alert();
		this.phone_value.val('');
		this.phone_window.hide();
	}

	this.phone_window_show = function(){
		this.close_all_windows();
		this.phone_window_submit_btn.attr('disabled', '');
		this.phone_window.show();
	}

	this.phone_window_show_alert = function(message){
		this.phone_window_alert.text(message).show();
	}

	this.phone_window_clear_alert = function(){
		this.phone_window_alert.text('').hide();
	}

	//Окно ввода одноразового пароля
	this.smscode_window = $('.popup.--code');
	this.smscode_window_current_phone = this.smscode_window.find('.current_phone');
	this.smscode_window_lifetime_count = this.smscode_window.find('.sms_code_lifetime');
	this.smscode_window_digits = this.smscode_window.find('.code__input');
	this.smscode_window_alert = this.smscode_window.find('.alert');
	this.smscode_window_close_btn = this.smscode_window.find('.popup__close');

	this.smscode_window_show = function(){
		this.close_all_windows();
		this.smscode_window.show();
		this.smscode_window_current_phone.text(this.phone_current);

		var _this = this;
		var cur_timelife = this.sms_code_timelife;
		this.smscode_window_lifetime_count.text(this.num_word(cur_timelife));
		this.timelife_handler = setInterval(function(){
			if(cur_timelife <= 0){
				clearInterval(_this.timelife_handler);
				_this.smscode_window_close();
			} else {
				_this.smscode_window_lifetime_count.text(_this.num_word(cur_timelife))
			}
			cur_timelife -= 1;
		}, 1000);
	}

	this.smscode_window_clear_alert = function(){
		this.smscode_window_alert.text('').hide();
	}

	this.smscode_window_close = function(){
		this.smscode_window_clear_alert();
		this.smscode_window_digits.val('');
		this.smscode_window.hide();
	}

	this.smscode_window_show_alert = function(message){
		this.smscode_window_alert.text(message).show();
	}

	this.smscode_window_clear_alert = function(){
		this.smscode_window_alert.text('').hide();
	}

	//Окно входа по email
	this.email_enter_window = $('.popup.--email-enter');
	this.email_enter_window_login_btn = this.email_enter_window.find('.login');
	this.email_enter_window_email = this.email_enter_window.find('input[name=login]');
	this.email_enter_window_password = this.email_enter_window.find('input[name=password]');
	this.email_enter_window_alert = this.email_enter_window.find('.alert');

	this.email_enter_window_show = function(){
		this.close_all_windows();
		this.email_enter_window.show();
	}

	this.email_enter_window_close = function(){
		this.email_enter_window_clear_alert();
		this.email_enter_window_clear_fields();
		this.email_enter_window.hide();
	}

	this.email_enter_window_show_alert = function(message){
		this.email_enter_window_alert.text(message).show();
	}

	this.email_enter_window_clear_alert = function(){
		this.email_enter_window_alert.text('').hide();
	}

	this.email_enter_window_clear_fields = function(){
		this.email_enter_window_email.val('');
		this.email_enter_window_password.val('');
	}

	//Окно регистрации
	this.registration_window = $('.popup.--reg');
	this.registration_window_email_busy_alert = this.registration_window.find('.email_is_busy');
	this.registration_window_email_do_register_btn = this.registration_window.find('.do_register');
	this.registration_window_email_value = this.registration_window.find('input[type=email]');
	this.registration_window_alert = this.registration_window.find('.alert');

	this.registration_window_show = function(){
		this.close_all_windows();
		this.registration_window.show();
	}

	this.registration_window_close = function(){
		this.registration_window_email_busy_alert_hide();
		this.registration_window_clear_alert();
		this.registration_window.hide();
	}

	this.registration_window_email_busy_alert_show = function(){
		this.registration_window_email_busy_alert.show();
	}

	this.registration_window_email_busy_alert_hide = function(){
		this.registration_window_email_busy_alert.hide();
	}

	this.registration_window_show_alert = function(message){
		this.registration_window_alert.text(message).show();
	}

	this.registration_window_clear_alert = function(){
		this.registration_window_alert.text('').hide();
	}

	//Окно восстановления пароля
	this.recover_window = $('.popup.--email-recover');
	this.recover_window_alert = this.recover_window.find('.alert');
	this.recover_window_do_recover_btn = this.recover_window.find('.do_recover');
	this.recover_window_email_value = this.recover_window.find('input[type=email]');

	this.recover_window_show = function(){
		this.close_all_windows();
		this.recover_window.show();
	}

	this.recover_window_close = function(){
		this.recover_window_clear_alert();
		this.recover_window.hide();
	}

	this.recover_window_show_alert = function(message){
		this.recover_window_alert.text(message).show();
	}

	this.recover_window_clear_alert = function(){
		this.recover_window_alert.text('').hide();
	}

}

$(document).ready(function(){
	auth = new Auth();

	//Устанавливаем и проверяем маску
	auth.phone_value.mask('+7 (999) 999-99-99');
	auth.phone_value.on('keyup', function(){
		if(/^\+7\s\(\d{3}\)\s\d{3}-\d{2}-\d{2}$/.test($(this).val()) === true){
			auth.phone_window_submit_btn.removeAttr('disabled');
		}else{
			auth.phone_window_submit_btn.attr('disabled', '');
		}
	})

	//Дополнительные события для кнопок
	auth.phone_window_close_btn.on('click', function(){
		auth.phone_window_close();
	})

	auth.start_button.click(function(){
		auth.phone_window_show();
	})

	//Получаем код
	auth.phone_window_submit_btn.on('click', function(e){
		e.preventDefault();
		auth.phone_current = auth.phone_value.val();

		$.ajax({
			url: '/form/phoneAuth/get_code',
			method: 'POST',
			data: {
				phone: auth.phone_current,
			},
			success: function(data){
				let res = JSON.parse(data);

				if(res.status === 'error'){
					auth.phone_window_show_alert(res.message);
				}else{
					auth.phone_window_close();
					auth.smscode_window_show();
					//console.log(res.password);
				}
			}
		})
	})

	auth.smscode_window_digits.mask('9', {placeholder: ''});

	//Обрабатываем ввод цифр
	auth.smscode_window_digits.on('keyup', function(){
		$(this).next().focus();

		auth.sms_code = '';
		$.each(auth.smscode_window_digits, function(digit, item){
			auth.sms_code += $(item).val();
		})

		if(auth.sms_code.length === 6){
			$.ajax({
				url: '/form/phoneAuth/check_code',
				method: 'POST',
				data: {
					phone: auth.phone_current,
					code: auth.sms_code
				},
				success: function(data){

					auth.smscode_window_show_alert(data.message)

					if(data.status === 'ok'){

						$.ajax({
							url: '/form/phoneAuth/createUser',
							data: {
								phone: auth.phone_current,
								password: auth.sms_code
							},
							method: 'POST',
							success: function(data){
								if(data.status === 'ok'){
									location.replace(data.user.group.url_login);
								}else{
									console.warn(data);
								}
							}
						})
					}
				}
			})
		}
	})

	auth.smscode_window_close_btn.on('click', function(){
		auth.smscode_window_close();
	})

	//Авторизация по email

	$('.email_window_show').on('click', function(){
		auth.email_enter_window_show();
	})

	auth.email_enter_window_login_btn.on('click', function(){
		auth.email_enter_window_clear_alert();
		$.ajax({
			url: '/form/emailAuth/login',
			method: 'POST',
			data: {
				email: auth.email_enter_window_email.val(),
				password: auth.email_enter_window_password.val()
			},
			success: function(data){
				if(data.status === 'ok'){
					auth.email_enter_window_show_alert(data.message);
					location.replace(data.user.group.url_login);
				}else{
					auth.email_enter_window_clear_fields();
					auth.email_enter_window_show_alert(data.message);
				}
			}
		})
	})

	//Регистрация по email
	auth.registration_window_email_do_register_btn.on('click', function(){

		var email = auth.registration_window_email_value.val();

		if(email !== ''){

			auth.registration_window_email_busy_alert_hide();
			auth.registration_window_clear_alert();

			$.ajax({
				url: '/form/emailAuth/register',
				method: 'POST',
				data: {
					email: email,
				},
				success: function(data){

					switch (data.status){
						case 'busy':
							auth.registration_window_email_busy_alert_show();
							break;
						case 'ok':
							auth.registration_window_email_busy_alert_hide();
							auth.registration_window_show_alert(data.message);
							location.replace(data.user.group.url_login);
							break;
						case 'error':
							auth.registration_window_show_alert(data.message);
							break;
					}
				}
			})
		}
	})

	//Восстановление пароля
	auth.recover_window_do_recover_btn.on('click', function(){
		var email = auth.recover_window_email_value.val();

		auth.recover_window_clear_alert();
		if(email !== ''){

			$.ajax({
				url: '/form/emailAuth/recover',
				method: 'POST',
				data: {
					email: email,
				},
				success: function(data){
					if(data.status === 'ok'){
						setTimeout(function(){
							auth.recover_window_close();
						}, 3000);
					}

					auth.recover_window_show_alert(data.message);
				}
			})
		}
	})


})
;
var Utils     = {
	formatPhone(phone) {
		var cleaned = ('' + phoneNumberString).replace(/\D/g, '');
		var match   = cleaned.match(/^(7|)?(\d{3})(\d{3})(\d{2})(\d{2})$/); //(XXX) XXX XX XX
		if (match) {
			var intlCode = (match[1] ? '+7 ' : '');
			return [intlCode, '(', match[2], ') ', match[3], '-', match[2], '-', match[2]].join('');
		}
		return null;
	},
	formatPrice(price, sufix) {
		var sign = 1;
		if (val < 0) {
			sign = -1;
			val  = -val;
		}
		// trim the number decimal point if it exists
		let num    = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();
		let len    = num.toString().length;
		let result = '';
		let count  = 1;

		for (let i = len - 1; i >= 0; i--) {
			result = num.toString()[i] + result;
			if (count % 3 === 0 && count !== 0 && i !== 0) {
				result = ' ' + result;
			}
			count++;
		}

		// add number after decimal point
		if (val.toString().includes('.')) {
			result = result + '.' + val.toString().split('.')[1];
		}
		// return result with - sign if negative
		return (sign < 0 ? '-' + result : result) + (sufix || '');
	},
	varType(val) {
		return ({}).toString.call(val).match(/\s([a-zA-Z]+)/)[1].toLowerCase();
	},
	uniqueArray(arr) {
		if (this.varType(arr) === 'array') {
			console.warn('value not array: ', arr);
			return arr;
		}

		function onlyUnique(value, index, self) {
			return self.indexOf(value) === index;
		}

		return arr.filter(onlyUnique);
	},
	api: {
		get(path, data, options) {
			const fullPath = (data === undefined) ? path : path + `?${new URLSearchParams(data)}`;
			return this.request(fullPath, 'get', undefined, options);
		},
		post(path, data, options) {
			return this.request(path, 'post', data, options);
		},
		async request(path, method, data, options) {
			const defaultOptions = {
				method
			};
			if (method !== 'get' && method !== 'head') {
				defaultOptions.body = new URLSearchParams(data);
			}
			return fetch(path,
				options === undefined ? defaultOptions : Object.assign(defaultOptions, options))
				.then((result) => result.json());
		}
	},
	arrIndexBy(array, index_key) {
		const _index = index_key || 'id';
		let _result  = {};
		array.forEach(function (item) {
			_result[item[_index]] = item;
		});

		return _result;
	}
};
var Record    = {
	data: {},
	find: function (id) {
		if (!!id) {
			this.data.id = id;
		}
	},
	validate: function (data) {

	},
	save: function () {

	}

};

const catalog = {
	/*!!! TODO: add methods to set this spec. services price from cms/dashboard !!!*/
	spec_service: {
		experts_consultation: {
			header: 'Общая консультация специалиста',
			price: 4000
		},
		analises_interpretation: {
			header: 'Расшифровка анализов',
			price: 2000
		}
	},
	/*dyctionary types*/
	quoteStatus: {},
	quoteType: {},
	quotePay: {},

	services: {},
	servicePrices: {},
	servicesList: [], /* for autocomplete */
	serviceTags: {
		"face": {
			"name": "Лицо",
			"color": "yellow"
		},
		"body": {
			"name": "Тело",
			"color": "green"
		},
		"hair": {
			"name": "Волосы",
			"color": "red"
		},
		"gyn": {
			"name": "Гинекология",
			"color": "blue"
		},
		"lab": {
			"name": "Лаборатория",
			"color": "purple"
		}
	},
	categories: {},
	experts: {},
	clients: {},
	admins: {},

	init() {
		var _self = this;

		Utils.api.get('/api/v2/func/catalogs/getQuoteStatus').then(function (data) {
			_self.quoteStatus = Utils.arrIndexBy(data);
		});

		Utils.api.get('/api/v2/func/catalogs/getQuotePay').then(function (data) {
			_self.quotePay = Utils.arrIndexBy(data);
		});
		Utils.api.get('/api/v2/func/catalogs/getQuoteType').then(function (data) {
			_self.quoteType = Utils.arrIndexBy(data);
		});

		Utils.api.get('/api/v2/list/services?active=on').then(function (data) {

			let _services       = {};
			_self.servicePrices = {};

			data.forEach(function (service, i) {
				_services[service.id] = service;
				const _cats           = service.category;
				const _tags           = [];

				_cats.forEach(function (cat) {
					_tags.push({
						"id": cat,
						"color": _self.serviceTags[cat].color,
						"tag": Array.from(_self.serviceTags[cat].name)[0]
					});
				});

				service.blocks.landing_price.price.forEach(function (serv_price, j) {
					if (serv_price.price === 0) {
						return;
					}
					let _item = {
						value: serv_price.header,
						id: service.id + '-' + j,
						data: {
							service_id: service.id,
							service_title: service.header,
							tags: _tags,
							price: serv_price.price,
							price_id: j
						}
					};
					_self.servicesList.push(_item);
					_self.servicePrices[service.id + '-' + j] = {
						'price': serv_price.price,
						'header': serv_price.header
					};
				});
			});

			_self.services = _services;
		});

		Utils.api.get('/api/v2/list/users?role=main&active=on' +
		              '&@return=id,fullname&@sort=fullname:a').then(function (data) {
			_self.admins = Utils.arrIndexBy(data);
		});

		Utils.api.get('/api/v2/list/users?role=client&active=on' +
		              '&@return=id,fullname,phone,email,birthdate&@sort=fullname:a').then(function (data) {
			_self.clients = Utils.arrIndexBy(data);
		});

		Utils.api.get('/api/v2/list/experts?active=on&@sort=name:a').then(function (data) {
			let _experts = {};
			data.forEach(function (expert, i) {
				_experts[expert.id] = expert;
				Utils.api.get('/api/v2/list/_yonmap?f=experts&i=' + expert.id, function (res) {
					console.log('-- expert url:', res[0]['u']);
					_experts[expert.id].info_uri = res[0]['u'] || '';
				});
			});
			_self.experts = _experts;
		});

		Utils.api.get('/api/v2/list/catalogs/srvcat').then(function (res) {
			let _serviceCats = {};
			Object.keys(res.tree.data).forEach(function (_key) {
				const _cat = res.tree.data[_key];
				if (_cat.active != 'on') {
					return;
				}
				_serviceCats[_cat.id] = {
					'id': _cat.id,
					'name': _cat.name,
					'color': _cat.data.color
				};
			});
			_self.categories = _serviceCats;
		});

		console.log('-- start preload catalogs data --');
	}
};

$(function () {
	catalog.init();
	/* common function */
	window.getChangesJSON = function (prev_data, curr_data, field_to_compare) {
		var changes    = {};
		var to_compare = field_to_compare;
		for (var i in obj2) {
			if (!!to_compare && !to_compare.include(i)) {
				return;
			}
			if (!prev_data.hasOwnProperty(i) || curr_data[i] !== prev_data[i]) {
				changes[i] = {
					'from': (typeof prev_data[i] === 'undefined') ? '-' : prev_data[i],
					'to': curr_data[i]
				};
			}
		}

		return changes;
	};

	window.toast = function (text, head, icon) {
		var bgColor   = '#616161';
		var textColor = '#FEFEFE';
		switch (icon) {
			case 'error':
				bgColor = '#DC3545';
				break;
			case 'success':
				bgColor = '#198754';
				break;
			case 'warning':
				bgColor = '#FFC107';
				break;
			default:
				bgColor = '#616161';
		}

		$.toast({
			text: text, // Text that is to be shown in the toast
			heading: head || '', // Optional heading to be shown on the toast
			showHideTransition: 'slide', // fade, slide or plain
			allowToastClose: true, // Boolean value true or false
			hideAfter: 4000,
			stack: 5,
			position: 'top-right',
			bgColor: bgColor,  // Background color of the toast
			textColor: textColor,  // Text color of the toast
			textAlign: 'left',  // Text alignment i.e. left, right or center
			loader: false,  // Whether to show loader or not. True by default
			icon: false,
			beforeShow: function () {}, // will be triggered before the toast is shown
			afterShown: function () {}, // will be triggered after the toat has been shown
			beforeHide: function () {}, // will be triggered before the toast gets hidden
			afterHidden: function () {}  // will be triggered after the toast has been hidden
		});
	};

	window.initServicesSearch = function ($selector, service_list) {
		console.log($selector, service_list);

		var _parent_form = $selector.parents('form');
		$selector.autocomplete({
			noCache: true,
			minChars: 1,
			lookup: service_list,
			beforeRender: function (container, suggestions) {
				console.log(suggestions);

				var CNT = $(container);
				$(container).addClass('search__drop').html('');
				var _catSelector = $(this).parents('form').find('[name="service_category"]:checked');
				var _selectedCat = '';
				if (_catSelector.length) {
					_selectedCat = _catSelector.val();
				}
				$(suggestions).each(function (index) {
					var PRICE = new Intl.NumberFormat('ru-RU').format(this.data.price);
					var TAGS  = $('<div></div>').addClass('search__drop-tags');
					var _cats = [];
					$(this.data.tags).each(function () {
						_cats.push(this.id);
						TAGS.append(
							$('<div></div>').addClass('search__drop-tag --' + this.color).text(this.tag)
						);
					});
					if (!!_selectedCat && !_cats.includes(_selectedCat)) {
						return;
					}
					CNT.append(
						$('<label></label>').addClass(
							'search__drop-item autocomplete-suggestion').attr({
							"data-index": index,
							'data-id': this.id,
							"data-service_id": this.data.service_id,
							"data-price": this.data.price
						}).append(
							$('<div></div>').addClass('search__drop-name').text(this.value)
						).append(
							$('<div></div>').addClass('search__drop-right').append(
								TAGS).append(
								$('<div></div>').addClass('search__drop-summ').text(
									PRICE + ' ₽')
							)
						)
					);
				});
			},
			onSelect: function (suggestion) {
				console.log(suggestion);
				$selector.val('');

				if (_parent_form.find('.admin-editor__patient [data-id=' + suggestion.id + ']').length) {
					return;
				}
				var PRICE = new Intl.NumberFormat('ru-RU').format(suggestion.data.price);
				var TAGS  = $('<div></div>').addClass('search__drop-tags');
				$(suggestion.data.tags).each(function () {
					TAGS.append(
						$('<div></div>').addClass('search__drop-tag --' + this.color).text(this.tag)
					);
				});
				const index = _parent_form.find('.admin-editor__patient .search__drop-item[data-service_id]').length;
				var sum     = 0;
				_parent_form.find('.admin-editor__patient').append(
					$('<div></div>').addClass('search__drop-item').attr({
						"data-index": index,
						'data-id': suggestion.id,
						"data-service_id": suggestion.data.service_id,
						"data-price": suggestion.data.price
					}).append(
						$('<input type="hidden">').attr({
							"name": 'services[]',
							"value": suggestion.data.service_id
						}).val(suggestion.data.service_id)
					).append(
						$('<input type="hidden">').attr({
							"name": 'service_prices[' + suggestion.id + '][service_id]',
							"value": suggestion.data.service_id
						}).val(suggestion.data.service_id)
					).append(
						$('<input type="hidden">').attr({
							"name": 'service_prices[' + suggestion.id + '][price_id]',
							"value": suggestion.data.price_id
						}).val(suggestion.data.price_id)
					).append(
						$('<input type="hidden">').attr({
							"name": 'service_prices[' + suggestion.id + '][name]',
							"value": suggestion.value
						}).val(suggestion.value)
					).append(
						$('<input type="hidden">').attr({
							"name": 'service_prices[' + suggestion.id + '][price]',
							"value": suggestion.data.price
						}).val(suggestion.data.price)
					).append(
						$('<div></div>').addClass('search__drop-name').text(suggestion.value).append(
							$('<div class="search__drop-delete">' +
							  '<svg class="svgsprite _delete">' +
							  '	<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>' +
							  '</svg>' +
							  '</div>')
						)
					).append(
						$('<div></div>').addClass('search__drop-right')
							.append(TAGS)
							.append($('<div></div>').addClass('search__drop-summ').text(PRICE + ' ₽'))
					)
				);
				_parent_form.find('.admin-editor__patient .search__drop-item').each(function (e) {
					sum += parseInt($(this).data('price'));
				});
				console.log(sum);
				_parent_form.find('.admin-editor__summ .price').text(numFormaSpace(sum) + ' ₽');
				_parent_form.find('.admin-editor__summ [name="price"]').val(sum);
			}
		});
		$(document).on('click', '.search__drop-delete', function (e) {
			e.stopPropagation();
			$(this).parents('.search__drop-item').remove();
			let sum = 0;
			console.log(_parent_form.find('.admin-editor__patient .search__drop-item').length);
			_parent_form.find('.admin-editor__patient .search__drop-item').each(function (e) {
				sum += parseInt($(this).data('price'));
			});
			_parent_form.find('.admin-editor__summ .price').text(numFormaSpace(sum) + ' ₽');
			_parent_form.find('.admin-editor__summ [name="price"]').val(sum);
		});
	};

	window.initLongtermSearch = function ($form, for_client) {
		let client_qry = '';
		if (!!for_client) {
			client_qry = '&client=' + $($form).find('[name="client"]').val();
		}

		$form.find('.event-search.longterm-search').autocomplete({
			noCache: true,
			minChars: 1,
			deferRequestBy: 350,
			dataType: 'json',
			type: 'GET',
			paramName: 'title~',
			serviceUrl: '/api/v2/list/records?group=longterm' + client_qry,
			transformResult: function (response) {
				return {
					suggestions: response.forEach(function (item) {
						return {value: item.title, data: item.id};
					})
				};
			},
			onSelect: function (suggestion) {
				$form.find('input[name="record"]').val(suggestion.data);
			}
		});
	};

	window.initClientSearch = function ($form) {
		$form.find('input.client-search').autocomplete({
			noCache: true,
			minChars: 1,
			deferRequestBy: 300,
			dataType: 'json',
			type: 'GET',
			paramName: 'fullname~',
			serviceUrl: '/api/v2/list/users?role=client',
			noSuggestionNotice: '<p>Пациентов не найдено..</p>',
			transformResult: function (response) {
				console.log(response);
				return {
					suggestions: $.map(response, function (dataItem) {
						return {value: dataItem.fullname, data: dataItem.id};
					})
				};
			},
			onSelect: function (suggestion) {
				$form.find('input[name="client"]').val(suggestion.data);
			}
		});
	};
	setTimeout(function () {
		window.popupDownloadData    = function () {
			let popup = new Ractive({
				el: '.popup.--download-data',
				template: wbapp.tpl('#popupDownloadData').html,
				data: {
					catalog: {},
					admins: []
				},
				on: {
					init() {
						wbapp.get('/api/v2/list/users/?role=main', function (data) {
							popup.set('admins', data);
							setTimeout(function () {
								popup.set('catalog', catalog);
							});
						});
					}
				}
			});
		};
		window.popupsCreateProfile  = function () {
			let popup = new Ractive({
				el: '.popup.--create-client',
				template: wbapp.tpl('#popupCreateClient').html,
				data: {},
				on: {
					submit() {
						let form = this.find('.popup.--create-client .popup__form');
						if ($(form).verify()) {
							let post = $(form).serializeJSON();
							console.log(post);

							let names = post.fullname.split(' ', 3);
							let keys = ['last_name', 'first_name', 'middle_name'];
							for (var i = 0; i < names.length; i++) {
								post[keys[i]] = names[i];
							}

							wbapp.get('/api/v2/list/users/?role=client&email=' + post.email, function (data) {
								if (data.length == 0) {
									wbapp.get('/api/v2/list/users/?role=client&phone=' + post.phone,
										function (data) {
											if (data.length == 0) {
												wbapp.post('/api/v2/create/users/', post, function (data) {
													if (data.error) {
														wbapp.trigger('wb-save-error', {'data': data});
													} else {
														toast('Карточка клиента успешно создана!');
														$('.popup.--create-client').fadeOut('fast');
													}
												});
											} else {
												form.find('[name="phone"]').focus();
												toast('Этот номер уже используется!', 'Ошибка!', 'error');
											}
										});
								} else {
									form.find('[name="email"]').focus();
									toast('E-mail уже используется!', 'Ошибка!', 'error');
								}
							});

						}
						return false;
					}
				}
			});
		};

		window.popupsConfirmSmsCode = function () {
			let popup = new Ractive({
				el: '.popup.--confirm-sms-code',
				template: wbapp.tpl('#popupConfirmSmsCode').html,
				data: {
					phone: '',
					client: {}
				},
				on: {
					init(ev) {

					},
					keyup(ev) {
						console.log(ev, $(ev.node));
						const _this  = $(ev.node);
						const _phone = $(ev.node).find('[name="phone"]').val();

						var sms_code = '';
						$('.popup.--confirm-sms-code .code__input').each(function (digit, item) {
							sms_code += $(item).val();
						});

						if (sms_code.length === 6) {
							$.ajax({
								url: '/form/phoneAuth/check_code',
								method: 'POST',
								data: {
									phone: _phone,
									code: sms_code
								},
								success: function (data) {
									if (data.status === 'ok') {
										wbapp.post('/create/users/', post, function (data) {
											if (data.error) {
												wbapp.trigger('wb-save-error', {'data': data});
											} else {
												toast('Карточка клиента создана!');
												$('.popup.--confirm-sms-code').hide();
												$('.popup.--confirm-sms-code .code__input').val('');
											}
										});
									}
								}
							});
						} else {
							_this.next().focus();
						}
					}
				},
				showPopup: function () {
					$('.popup.--confirm-sms-code .code__input').mask('9', {placeholder: ''});
					$('.popup.--confirm-sms-code').show();
				}
			});
		};
		window.popupPhoto           = function (is_longterm) {
			let popup = new Ractive({
				el: '.popup.--photo',
				template: wbapp.tpl('#popupPhoto').html,
				data: {
					catalog: {},
					record: {},
					longterm: is_longterm
				},
				on: {
					init() {
						setTimeout(function () {
							popup.set('catalog', catalog);
							initPlugins();
							initClientSearch($('.popup.--photo form'));
							initLongtermSearch($('.popup.--photo form'), true);
						});
					},
					submit() {
						let form = this.parents('.popup__form').find('form');

						if ($(form).verify()) {
							let post = $(form).serializeJSON();
							wbapp.post('/update/records/', post, function (data) {

							});
						}
						return false;
					}
				}
			});
		};
	});
	setTimeout(function () {
		initPlugins();

		$(document).on('change', '#file-photo', function (e, list) {
			e.stopPropagation();
			var _block   = $(this).parents('.file-photo');
			var _files   = e.target.files;
			var _preview = _block.find('img.preview');
			console.log(_block, 'selected!');

			if (!!_preview.length) {
				var reader;
				var file;
				var url;

				var max_size = 10 * 1024 * 1024;
				if (_files && _files.length > 0) {
					file = _files[0];
					if (file.size >= max_size) {
						toast('Размер файла c фото не может превышать 10 мб', '', 'error');
						$(this).val('');
						return;
					}

					if (URL) {
						_preview.attr('src', URL.createObjectURL(file));
						_preview.removeClass('d-none');
					} else if (FileReader) {
						reader        = new FileReader();
						reader.onload = function (e) {
							_preview.attr('src', reader.result);
							_preview.removeClass('d-none');
						};
						reader.readAsDataURL(file);
					}
				}
			}
		}).on('click', 'a.account__detail[data-link]', function (e) {
			e.stopPropagation();
			e.preventDefault();
			window.location.href = $(this).data('link');
		}).on('click', 'a.account__detail[data-client]', function (e) {
			e.stopPropagation();
			e.preventDefault();
			window.location.href = "/cabinet/client/" + $(this).data('link');
		});
	});
});
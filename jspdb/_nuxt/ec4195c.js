(window.webpackJsonp=window.webpackJsonp||[]).push([[6],{343:function(e,t,n){"use strict";n.r(t);var r=n(10),c=(n(61),n(60),n(89),n(20),n(58),n(59),{data:function(){return{idCode:"",minRes:"0.0",maxRes:"Inf",query:"",seqQuery:"",compTypes:[],expClasses:[],checkedComps:[],checkedExp:[]}},methods:{submit:function(){if(this.idCode)this.$router.push({path:"/show?id=".concat(this.idCode)});else if(this.seqQuery)this.$router.push({path:"/blast?query=".concat(this.cleanHeader(this.seqQuery))});else{var e={};"0.0"!=this.minRes&&(e.minRes=this.minRes),"Inf"!=this.maxRes&&(e.maxRes=this.maxRes),this.query&&(e.query=this.query),this.checkedComps.length&&(e.checkedComps=this.checkedComps),this.checkedExp.length&&(e.checkedExp=this.checkedExp),this.$router.push({path:"/search?query=".concat(JSON.stringify(e))})}},reset:function(){this.idCode="",this.minRes="0.0",this.maxRes="Inf",this.query="",this.seqQuery="",this.checkedComps=[],this.checkedExp=[]},cleanHeader:function(e){var t="",n=e.split("\n"),r=!1;return n.every((function(line){if(line.match(">")){if(r)return!1;r=!0}else t+=line;return!0})),t},getFile:function(e){var t=this;return Object(r.a)(regeneratorRuntime.mark((function n(){var r,c;return regeneratorRuntime.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:if(r=e){n.next=3;break}return n.abrupt("return");case 3:return c=function(e){return new Promise((function(t){var n=new FileReader;n.onloadend=function(){return t(n.result)},n.readAsBinaryString(e)}))},n.next=6,c(r);case 6:t.seqQuery=n.sent,t.seqQuery=t.cleanHeader(t.seqQuery);case 8:case"end":return n.stop()}}),n)})))()}},fetch:function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}((function(){var e=this;return Object(r.a)(regeneratorRuntime.mark((function t(){var n,r;return regeneratorRuntime.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,fetch(e.$config.APIPrefix+"?glob");case 2:if(!(n=t.sent).ok){t.next=9;break}return t.next=6,n.json();case 6:r=t.sent,e.compTypes=r.compType,e.expClasses=r.expClasse;case 9:case"end":return t.stop()}}),t)})))()}))}),o=c,l=n(54),h=n(206),d=n.n(h),m=n(334),v=n(248),f=n(230),x=n(345),k=n(313),y=n(346),R=n(335),C=n(336),_=n(347),w=n(318),V=n(217),Q=n(337),component=Object(l.a)(o,(function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("v-app",[n("v-main",[n("v-container",[n("v-form",{ref:"mainForm"},[n("v-card",[n("v-container",[n("v-text-field",{attrs:{name:"idCode",maxlength:"4",placeholder:"PDB Code",label:"PDB Id"},on:{change:function(t){return e.submit()}},model:{value:e.idCode,callback:function(t){e.idCode=t},expression:"idCode"}})],1)],1),e._v(" "),n("v-card",[n("v-container",[n("h4",[e._v("Search fields")]),e._v(" "),n("v-row",[n("v-col",{attrs:{sm:"3"}},[n("v-text-field",{attrs:{label:"Min. resolution",name:"minRes"},model:{value:e.minRes,callback:function(t){e.minRes=t},expression:"minRes"}})],1),e._v(" "),n("v-col",{attrs:{sm:"3"}},[n("v-text-field",{attrs:{label:"Max. resolution",name:"maxRes"},model:{value:e.maxRes,callback:function(t){e.maxRes=t},expression:"maxRes"}})],1)],1),e._v(" "),n("v-row",[n("v-col",[n("h5",[e._v("Type of compound")])]),e._v(" "),e._l(e.compTypes,(function(t,r){return n("v-col",{key:r,attrs:{sm:"2"}},[n("v-checkbox",{attrs:{id:r,value:r,label:t},model:{value:e.checkedComps,callback:function(t){e.checkedComps=t},expression:"checkedComps"}})],1)}))],2),e._v(" "),n("v-row",[n("v-col",[n("h5",[e._v("Type of experiment")])]),e._v(" "),e._l(e.expClasses,(function(t,r){return n("v-col",{key:r,attrs:{sm:"2"}},[n("v-checkbox",{attrs:{id:r,value:r,label:t},model:{value:e.checkedExp,callback:function(t){e.checkedExp=t},expression:"checkedExp"}})],1)}))],2),e._v(" "),n("v-text-field",{attrs:{name:"query",label:"Free text search"},on:{change:function(t){return e.submit()}},model:{value:e.query,callback:function(t){e.query=t},expression:"query"}})],1)],1),e._v(" "),n("v-card",[n("v-container",[n("h4",[e._v("Sequence search")]),e._v(" "),n("v-textarea",{attrs:{name:"seqQuery",cols:"60",placeholder:"Raw Sequence only"},model:{value:e.seqQuery,callback:function(t){e.seqQuery=t},expression:"seqQuery"}}),e._v(" "),n("v-file-input",{staticStyle:{width:"50%"},attrs:{name:"seqFile",id:"seqFile",label:"Upload sequence file"},on:{change:e.getFile}})],1)],1),e._v(" "),n("v-btn",{on:{click:function(t){return e.submit()}}},[e._v("Submit")]),e._v(" "),n("v-btn",{on:{click:function(t){return e.reset()}}},[e._v("Reset")])],1)],1)],1)],1)}),[],!1,null,null,null);t.default=component.exports;d()(component,{VApp:m.a,VBtn:v.a,VCard:f.a,VCheckbox:x.a,VCol:k.a,VContainer:y.a,VFileInput:R.a,VForm:C.a,VMain:_.a,VRow:w.a,VTextField:V.a,VTextarea:Q.a})}}]);
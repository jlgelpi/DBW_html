(window.webpackJsonp=window.webpackJsonp||[]).push([[7],{339:function(e,t,r){"use strict";r.r(t);var n=r(10),l=(r(61),r(20),r(58),r(59),r(33),{data:function(){return{title:"PDB Browser Blast search",query:"",blastResults:[],error:{},search:"",headers:[{text:"PDB Id.",value:"idCode"},{text:"Type",value:"tip"},{text:"Header",value:"desc"},{test:"Title",value:"compound"},{text:"E. Value",value:"ev"}]}},fetch:function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}((function(){var e=this;return Object(n.a)(regeneratorRuntime.mark((function t(){var r,n;return regeneratorRuntime.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return r=function(s){return s.replace(/[\n\r]/g,"").replace(/(.{80})/g,"$1\n")},e.query=r(e.$route.query.query),t.next=4,fetch("".concat(e.$config.APIPrefix,"?blast=").concat(e.$route.query.query));case 4:if(!(n=t.sent).ok){t.next=10;break}return t.next=8,n.json();case 8:e.blastResults=t.sent,e.blastResults.hits?e.blastResults=e.blastResults.hits:e.error=e.blastResults;case 10:case"end":return t.stop()}}),t)})))()})),methods:{newSearch:function(){this.$router.push("/")}},fetchOnServer:!1}),c=l,o=r(54),v=r(206),h=r.n(v),d=r(334),f=r(248),_=r(346),x=r(338),m=r(347),y=r(217),component=Object(o.a)(c,(function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("v-app",[r("v-main",[r("v-container",[r("h1",[e._v(e._s(e.title))]),e._v(" "),r("p",[e._v("Query:"),r("br"),e._v(" "),r("pre",[e._v(e._s(e.query))])]),e._v(" "),e.$fetchState.pending?r("p",[e._v("Waiting for Blast results...")]):r("div",[r("p",[e._v("Num hits: "+e._s(e.blastResults.length))]),e._v(" "),e.blastResults.length?r("v-data-table",{staticClass:"elevation-1",attrs:{headers:e.headers,items:e.blastResults,"items-per-page":10,"item-key":e.blastResults.idCode,dense:!0,search:e.search},scopedSlots:e._u([{key:"top",fn:function(){return[r("v-text-field",{staticClass:"mx-4",attrs:{label:"Search"},model:{value:e.search,callback:function(t){e.search=t},expression:"search"}})]},proxy:!0},{key:"item.idCode",fn:function(t){var n=t.item;return[r("nuxt-link",{attrs:{to:"/show?id="+n.idCode}},[e._v(e._s(n.idCode)+"_"+e._s(n.sub))])]}}],null,!1,1650044843)}):e._e()],1),e._v(" "),r("v-btn",{on:{click:function(t){return e.newSearch()}}},[e._v("New Search")])],1)],1)],1)}),[],!1,null,null,null);t.default=component.exports;h()(component,{VApp:d.a,VBtn:f.a,VContainer:_.a,VDataTable:x.a,VMain:m.a,VTextField:y.a})}}]);
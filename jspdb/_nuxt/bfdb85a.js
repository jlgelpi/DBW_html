(window.webpackJsonp=window.webpackJsonp||[]).push([[9],{340:function(e,t,r){"use strict";r.r(t);var n=r(10),o=(r(61),r(20),r(58),r(59),{data:function(){return{title:"PDB Browser search",query:"",results:[],error:{},search:"",headers:[{text:"PDB. Id.",value:"idCode"},{text:"Header",value:"header"},{text:"Title",value:"compound"},{text:"Resolution",value:"resolution"},{text:"Experiment",value:"expType"},{text:"Source",value:"source"}]}},fetch:function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}((function(){var e=this;return Object(n.a)(regeneratorRuntime.mark((function t(){var r,n;return regeneratorRuntime.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return e.query=e.$route.query.query,r="".concat(e.$config.APIPrefix,"?search=").concat(e.$route.query.query),t.next=4,fetch(r);case 4:if(!(n=t.sent).ok){t.next=10;break}return t.next=8,n.json();case 8:e.results=t.sent,e.results.hits?e.results=e.results.hits:e.error=e.results;case 10:case"end":return t.stop()}}),t)})))()})),filters:{pretty:function(e){return JSON.stringify(JSON.parse(e),null,2)}},methods:{newSearch:function(){this.$router.push("/")}},fetchOnServer:!1}),c=o,l=r(54),h=r(206),v=r.n(h),d=r(334),f=r(248),_=r(346),x=r(338),y=r(347),m=r(217),component=Object(l.a)(c,(function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("v-app",[r("v-main",[r("v-container",[r("h1",[e._v(e._s(e.title))]),e._v(" "),r("p",[e._v("Query:"),r("br"),e._v(" "),r("pre",[e._v(" "+e._s(e._f("pretty")(e.query)))])]),e._v(" "),e.$fetchState.pending?r("p",[e._v("Waiting for search results...")]):r("div",[r("p",[e._v("Num hits: "+e._s(e.results.length))]),e._v(" "),e.results.length?r("v-data-table",{staticClass:"elevation-1",attrs:{headers:e.headers,items:e.results,"items-per-page":10,dense:!0,"item-key":"results.idCode",search:e.search},scopedSlots:e._u([{key:"top",fn:function(){return[r("v-text-field",{staticClass:"mx-4",attrs:{label:"Search"},model:{value:e.search,callback:function(t){e.search=t},expression:"search"}})]},proxy:!0},{key:"item.idCode",fn:function(t){var n=t.item;return[r("nuxt-link",{attrs:{to:"/show?id="+n.idCode}},[e._v(e._s(n.idCode))])]}}],null,!1,1194920134)}):e._e()],1),e._v(" "),r("v-btn",{on:{click:function(t){return e.newSearch()}}},[e._v("New Search")])],1)],1)],1)}),[],!1,null,null,null);t.default=component.exports;v()(component,{VApp:d.a,VBtn:f.a,VContainer:_.a,VDataTable:x.a,VMain:y.a,VTextField:m.a})}}]);
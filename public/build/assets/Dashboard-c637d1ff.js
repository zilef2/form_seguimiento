import{_,a as f}from"./AuthenticatedLayout-70f726d0.js";import{f as a,a as t,u as g,w as h,F as i,o as d,Z as v,b as e,j as x,n as c,t as m,g as y}from"./app-71b4ebbb.js";import"./ApplicationLogo-5cdbecef.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./Toast-be33e67a.js";const k={class:"space-y-4"},w={class:"text-white dark:text-gray-100 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 sm:gap-4 overflow-hidden shadow-sm"},N={class:"flex flex-col"},B={class:"text-4xl font-bold"},C={class:"text-md md:text-lg uppercase"},D={key:0},S={__name:"Dashboard",props:{users:Number,roles:Number,formulariosEnviados:Number,formulariosGuardados:Number,permissions:Number},setup(u){const p=u,l=["users","formulariosEnviados","formulariosGuardados"];l.map((s,b,r)=>s.slice(0,-1));const n=["bg-blue-500","bg-green-500","bg-amber-500"];return(s,b)=>(d(),a(i,null,[t(g(v),{title:"Dashboard"}),t(_,null,{default:h(()=>[t(f,{title:"Resumen",breadcrumbs:[]}),e("div",k,[e("div",w,[(d(),a(i,null,x(l,(r,o)=>e("div",{key:o},[e("div",{class:c(["rounded-t-none sm:rounded-t-lg px-4 py-6 flex justify-between items-center overflow-hidden",n[o]])},[e("div",N,[e("p",B,m(p[r]),1),e("p",C,m(s.lang().label[r]),1)])],2),e("div",{class:c(["rounded-b-none sm:rounded-b-lg p-2 overflow-hidden hover:bg-sky-600 dark:hover:bg-black",n[o]])},null,2)])),64)),s.can(["isSuper"])?(d(),a("div",D)):y("",!0)])])]),_:1})],64))}};export{S as default};
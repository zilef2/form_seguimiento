import{_ as f,a as h,r as x,b as v}from"./AuthenticatedLayout-09d0a104.js";import{f as t,a as s,u as a,w,F as m,o as d,Z as k,b as e,j as y,n as b,t as l,g as N}from"./app-87c0ac14.js";import"./ApplicationLogo-163c4a05.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./Toast-5b454862.js";const j={class:"space-y-4"},A={class:"text-white dark:text-gray-100 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 sm:gap-4 overflow-hidden shadow-sm"},C={class:"flex flex-col"},D={class:"text-4xl font-bold"},B={class:"text-md md:text-lg uppercase"},E={class:"rounded-t-none sm:rounded-t-lg px-4 py-6 flex justify-between bg-green-600/70 dark:bg-green-500/80 items-center overflow-hidden"},V={class:"flex flex-col"},$={class:"text-4xl font-bold"},F=e("p",{class:"text-md md:text-lg uppercase"},"Anexos",-1),G={class:"flex justify-between items-center"},S=e("p",null,"Descargar Adjuntos 2",-1),z={key:0},I={__name:"Dashboard",props:{users:Number,formulariosEnviados:Number,formulariosGuardados:Number,permissions:Number,nanexos:Number},setup(g){const i=g,c=["users","formulariosEnviados","formulariosGuardados"];c.map((o,_,r)=>o.slice(0,-1));const u=["bg-blue-500","bg-green-500","bg-amber-500"],p=()=>{window.open("downloadAnexos","_blank")};return(o,_)=>(d(),t(m,null,[s(a(k),{title:"Dashboard"}),s(f,null,{default:w(()=>[s(h,{title:"Resumen",breadcrumbs:[]}),e("div",j,[e("div",A,[(d(),t(m,null,y(c,(r,n)=>e("div",{key:n},[e("div",{class:b(["rounded-t-none sm:rounded-t-lg px-4 py-6 flex justify-between items-center overflow-hidden",u[n]])},[e("div",C,[e("p",D,l(i[r]),1),e("p",B,l(o.lang().label[r]),1)])],2),e("div",{class:b(["rounded-b-none sm:rounded-b-lg p-2 overflow-hidden hover:bg-sky-600 dark:hover:bg-black",u[n]])},null,2)])),64)),e("div",null,[e("div",E,[e("div",V,[e("p",$,l(i.nanexos),1),F]),e("div",null,[s(a(x),{class:"w-16 h-auto"})])]),e("div",{onClick:p,class:"bg-green-600 dark:bg-green-600/80 rounded-b-none sm:rounded-b-lg p-2 overflow-hidden hover:bg-green-600/90 dark:hover:bg-green-600/70"},[e("a",G,[S,s(a(v),{class:"w-5 h-5"})])])]),o.can(["isSuper"])?(d(),t("div",z)):N("",!0)])])]),_:1})],64))}};export{I as default};
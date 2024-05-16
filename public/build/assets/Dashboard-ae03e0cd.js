import{_ as h,a as _,r as v}from"./AuthenticatedLayout-ace4a0c6.js";import{f as l,a as r,u as n,w as u,F as b,o as d,Z as x,b as e,j as w,n as p,t as o,i as y,g as k}from"./app-9e3c5959.js";import"./ApplicationLogo-b5d5dd8e.js";import"./Toast-85cd11c7.js";const N={class:"space-y-4"},j={class:"text-white dark:text-gray-100 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 sm:gap-4 overflow-hidden shadow-sm"},B={class:"flex flex-col"},C={class:"text-4xl font-bold"},D={class:"text-md md:text-lg uppercase"},V={key:0},F={class:"rounded-t-none sm:rounded-t-lg px-4 py-6 flex justify-between bg-amber-600/70 dark:bg-amber-500/80 items-center overflow-hidden"},S={class:"flex flex-col"},$={class:"text-4xl font-bold"},z={class:"text-md md:text-lg uppercase"},E={class:"bg-amber-600 dark:bg-amber-600/80 rounded-b-none sm:rounded-b-lg p-2 overflow-hidden hover:bg-amber-600/90 dark:hover:bg-amber-600/70"},A={__name:"Dashboard",props:{users:Number,roles:Number,formularios:Number,permissions:Number},setup(f){const i=f,c=["users","formularios"];c.map((s,g,t)=>s.slice(0,-1));const m=["bg-blue-500","bg-green-500"];return(s,g)=>(d(),l(b,null,[r(n(x),{title:"Dashboard"}),r(h,null,{default:u(()=>[r(_,{title:"Resumen",breadcrumbs:[]}),e("div",N,[e("div",j,[(d(),l(b,null,w(c,(t,a)=>e("div",{key:a},[e("div",{class:p(["rounded-t-none sm:rounded-t-lg px-4 py-6 flex justify-between items-center overflow-hidden",m[a]])},[e("div",B,[e("p",C,o(i[t]),1),e("p",D,o(s.lang().label[t]),1)])],2),e("div",{class:p(["rounded-b-none sm:rounded-b-lg p-2 overflow-hidden hover:bg-sky-600 dark:hover:bg-black",m[a]])},null,2)])),64)),s.can(["isSuper"])?(d(),l("div",V,[e("div",F,[e("div",S,[e("p",$,o(i.permissions),1),e("p",z,o(s.lang().label.permission),1)])]),e("div",E,[r(n(y),{href:s.route("permission.index"),class:"flex justify-between items-center"},{default:u(()=>[e("p",null,o(s.lang().label.more),1),r(n(v),{class:"w-5 h-5"})]),_:1},8,["href"])])])):k("",!0)])])]),_:1})],64))}};export{A as default};

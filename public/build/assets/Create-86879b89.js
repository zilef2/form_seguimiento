import{k as C,T as S,C as $,x as j,f as r,a as d,w as u,o as c,b as n,t,F as U,j as x,u as a,d as y,n as E,e as N}from"./app-9e3c5959.js";import{_}from"./InputError-0f27fbac.js";import{_ as v}from"./InputLabel-9c6e7da7.js";import{_ as B,a as F}from"./SecondaryButton-5bdf8610.js";import{_ as M}from"./PrimaryButton-b9490fc4.js";import{_ as V}from"./TextInput-13c1d1e2.js";import{C as O}from"./vue-select-4cb91b41.js";import"./vue-datepicker-2c19a518.js";/* empty css             */const q={class:"space-y-6"},P=["onSubmit"],T={class:"text-lg font-medium text-gray-900 dark:text-gray-100"},z={class:"grid grid-cols-1 md:grid-cols-2 gap-6"},A={key:0,id:"SelectVue"},D={name:"labelSelectVue"},L={key:1,id:"SelectVue"},R={key:2,class:""},G={class:"my-8 flex justify-end"},ee={__name:"Create",props:{show:Boolean,title:String,roles:Object,titulos:Object,losSelect:Object,numberPermissions:Number},emits:["close"],setup(f,{emit:m}){const o=f,b=C({params:{pregunta:""}}),k=o.titulos.map(s=>s.order),l=S({...Object.fromEntries(k.map(s=>[s,""]))});$(()=>{if(o.numberPermissions>9){const s=Math.floor(Math.random()*9+1);l.nombre="nombre de prueba inventario "+s,l.codigo=s}});const g=[];o.titulos.forEach(s=>g.push({idd:s.order,label:s.label,type:s.type}));const h=()=>{l.post(route("prestamo.store"),{preserveScroll:!0,onSuccess:()=>{m("close"),l.reset()},onError:()=>null,onFinish:()=>null})};return j(()=>{o.show&&(l.errors={})}),(s,p)=>(c(),r("section",q,[d(B,{show:o.show,onClose:p[1]||(p[1]=e=>m("close"))},{default:u(()=>[n("form",{class:"p-6",onSubmit:N(h,["prevent"])},[n("h2",T,t(s.lang().label.add)+" "+t(o.title),1),n("div",z,[(c(),r(U,null,x(g,(e,w)=>n("div",{key:w},[e.type==="id"?(c(),r("div",A,[n("label",D,t(e.label),1),d(a(O),{options:b[e.idd],label:"title",modelValue:a(l)[e.idd],"onUpdate:modelValue":i=>a(l)[e.idd]=i},null,8,["options","modelValue","onUpdate:modelValue"]),d(_,{class:"mt-2",message:a(l).errors[e.idd]},null,8,["message"])])):e.type==="time"?(c(),r("div",L,[d(v,{for:e.label,value:s.lang().label[e.label]},null,8,["for","value"]),d(V,{id:e.idd,type:e.type,class:"mt-1 block w-full",modelValue:a(l)[e.idd],"onUpdate:modelValue":i=>a(l)[e.idd]=i,required:"",placeholder:e.label,error:a(l).errors[e.idd],step:"3600"},null,8,["id","type","modelValue","onUpdate:modelValue","placeholder","error"]),d(_,{class:"mt-2",message:a(l).errors[e.idd]},null,8,["message"])])):(c(),r("div",R,[d(v,{for:e.label,value:s.lang().label[e.label]},null,8,["for","value"]),d(V,{id:e.idd,type:e.type,class:"mt-1 block w-full",modelValue:a(l)[e.idd],"onUpdate:modelValue":i=>a(l)[e.idd]=i,required:"",placeholder:e.label,error:a(l).errors[e.idd]},null,8,["id","type","modelValue","onUpdate:modelValue","placeholder","error"]),d(_,{class:"mt-2",message:a(l).errors[e.idd]},null,8,["message"])]))])),64))]),n("div",G,[d(F,{disabled:a(l).processing,onClick:p[0]||(p[0]=e=>m("close"))},{default:u(()=>[y(t(s.lang().button.close),1)]),_:1},8,["disabled"]),d(M,{class:E(["ml-3",{"opacity-25":a(l).processing}]),disabled:a(l).processing,onClick:h},{default:u(()=>[y(t(s.lang().button.add)+" "+t(a(l).processing?+"...":""),1)]),_:1},8,["class","disabled"])])],40,P)]),_:1},8,["show"])]))}};export{ee as default};

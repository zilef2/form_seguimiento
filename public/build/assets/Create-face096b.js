import{k as $,T as E,C as N,x as T,f as p,a as t,w as c,o as _,b as a,t as d,u as o,F as B,j as O,d as m,n as A,e as M}from"./app-87c0ac14.js";import{_ as v}from"./InputError-3672547a.js";import{_ as h}from"./InputLabel-41de8343.js";import{_ as U,a as F}from"./SecondaryButton-987f3a04.js";import{_ as b}from"./PrimaryButton-8d60e221.js";import{_ as H}from"./TextInput-baac03ac.js";import{C as V}from"./vue-select-1d0bc8ff.js";import"./vue-datepicker-a62e07b1.js";/* empty css             */const q={class:"space-y-6"},z=["onSubmit"],D={class:"mb-[230px]"},L={class:"text-lg font-medium text-gray-900 dark:text-gray-100"},P={class:"grid grid-cols-1 md:grid-cols-2 gap-6"},G={class:""},I={id:"SelectVue"},J=a("label",{name:"labelSelectVue",class:"dark:text-white"}," Centro de trabajo ",-1),K={class:"flex my-5 gap-8"},Q={class:"flex my-8 justify-end"},R={class:"text-lg mx-8 text-red-500"},re={__name:"Create",props:{show:Boolean,title:String,roles:Object,losSelect:Object,titulos:Object,numberPermissions:Number},emits:["close"],setup(y,{emit:u}){const i=y,r=$({params:{pregunta:""},centros:[0],valido:!0,mensajeError:""}),k=i.titulos.map(l=>l.order),e=E({...Object.fromEntries(k.map(l=>[l,""])),centro_id:[i.losSelect[0]]});N(()=>{});let w=()=>{try{if(r.valido=!0,!e.nombre||!e.tipo)throw r.valido=!1,new Error("BreakException")}catch{r.valido=!1}};const f=()=>{w(),r.valido?e.post(route("actividad.store"),{preserveScroll:!0,onSuccess:()=>{u("close"),e.reset()},onError:()=>null,onFinish:()=>null}):r.mensajeError="Hay elementos vacios"};T(()=>{i.show&&(e.errors={})});function j(){r.centros.push(0),e.centro_id.push(i.losSelect[0])}let x=()=>{r.centros.length=r.centros.length-1,e.centro_id.length=e.centro_id.length-1};const C=[{title:"Seleccione un tipo",value:0},{title:"TVA",value:"TVA"},{title:"TNVA",value:"TNVA"}];return(l,s)=>(_(),p("section",q,[t(U,{show:i.show,onClose:s[5]||(s[5]=n=>u("close"))},{default:c(()=>[a("form",{class:"p-6",onSubmit:M(f,["prevent"])},[a("div",D,[a("h2",L,d(l.lang().label.add)+" "+d(i.title),1),a("div",P,[a("div",G,[t(h,{for:"nombre",value:l.lang().label.nombre},null,8,["value"]),t(H,{id:"nombre",type:"text",class:"mt-1 h-8 block w-full",modelValue:o(e).nombre,"onUpdate:modelValue":s[0]||(s[0]=n=>o(e).nombre=n),required:"",placeholder:l.nombre,error:o(e).errors.nombre},null,8,["modelValue","placeholder","error"]),t(v,{class:"mt-2",message:o(e).errors.nombre},null,8,["message"])]),a("div",null,[t(h,{for:"tipo",value:l.lang().label.Tipo},null,8,["value"]),t(o(V),{options:C,label:"title",class:"dark:bg-gray-400 rounded-lg dark:text-white",modelValue:o(e).tipo,"onUpdate:modelValue":s[1]||(s[1]=n=>o(e).tipo=n)},null,8,["modelValue"])]),(_(!0),p(B,null,O(r.centros,(n,g)=>(_(),p("div",I,[J,t(o(V),{options:i.losSelect,label:"title",class:"dark:bg-gray-400 rounded-lg dark:text-white",modelValue:o(e).centro_id[g],"onUpdate:modelValue":S=>o(e).centro_id[g]=S},null,8,["options","modelValue","onUpdate:modelValue"]),t(v,{class:"mt-2",message:o(e).errors.centro_id},null,8,["message"])]))),256))]),a("div",K,[t(b,{type:"button",disabled:o(e).processing,onClick:s[2]||(s[2]=n=>j())},{default:c(()=>[m(" Mas centros ")]),_:1},8,["disabled"]),t(b,{type:"button",disabled:o(e).processing,onClick:s[3]||(s[3]=n=>o(x)())},{default:c(()=>[m(" Menos centros ")]),_:1},8,["disabled"])])]),a("div",Q,[a("p",R,d(r.mensajeError),1),t(F,{disabled:o(e).processing,onClick:s[4]||(s[4]=n=>u("close"))},{default:c(()=>[m(d(l.lang().button.close),1)]),_:1},8,["disabled"]),t(b,{class:A(["ml-3",{"opacity-25":o(e).processing}]),disabled:o(e).processing,onClick:f},{default:c(()=>[m(d(l.lang().button.add)+" "+d(o(e).processing?+"...":""),1)]),_:1},8,["class","disabled"])])],40,z)]),_:1},8,["show"])]))}};export{re as default};
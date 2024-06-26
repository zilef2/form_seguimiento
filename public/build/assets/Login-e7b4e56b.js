import{o as d,f as w,T as h,c,w as i,a,u as s,Z as y,t as m,g as p,b as o,i as k,d as f,n as v,e as V}from"./app-72098953.js";import{_ as x}from"./Checkbox-1835ac5d.js";import{_ as $}from"./GuestLayout-455df518.js";import{_ as g}from"./InputError-b1fe6d4f.js";import{_}from"./InputLabel-56ea6720.js";import{_ as B}from"./PrimaryButton-8063e5bc.js";import{_ as b}from"./TextInput-3eb5d06a.js";import"./ApplicationLogo-eae07a0c.js";import"./_plugin-vue_export-helper-c27b6911.js";const S={src:"otrologo2.png",alt:"nop",srcset:"",class:"h-full p-12 scale-125 constrat-110 saturate-110 rounded-xl brightness-110"},N={__name:"login",props:{type:String},setup(n){return(e,u)=>(d(),w("img",S))}},q={key:0,class:"mb-4 font-medium text-sm text-green-600"},C=["onSubmit"],U={class:"mt-4"},P={class:"block mt-4"},R={class:"flex items-center"},T={class:"ml-2 text-sm text-gray-600 dark:text-gray-400"},j={class:"flex items-center justify-between mt-4"},H={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(n){const e=h({email:"",password:"",remember:!1}),u=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(r,t)=>(d(),c($,null,{illustration:i(()=>[a(N,{class:"w-full h-auto"})]),default:i(()=>[a(s(y),{title:r.lang().label.login},null,8,["title"]),n.status?(d(),w("div",q,m(n.status),1)):p("",!0),o("form",{onSubmit:V(u,["prevent"])},[o("div",null,[a(_,{for:"email",value:r.lang().label.identificacion},null,8,["value"]),a(b,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":t[0]||(t[0]=l=>s(e).email=l),required:"",autofocus:"",autocomplete:"username",error:s(e).errors.email},null,8,["modelValue","error"]),a(g,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),o("div",U,[a(_,{for:"password",value:r.lang().label.password},null,8,["value"]),a(b,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":t[1]||(t[1]=l=>s(e).password=l),required:"",autocomplete:"current-password",placeholder:r.lang().placeholder.password,error:s(e).errors.password},null,8,["modelValue","placeholder","error"]),a(g,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),o("div",P,[o("label",R,[a(x,{name:"remember",checked:s(e).remember,"onUpdate:checked":t[2]||(t[2]=l=>s(e).remember=l)},null,8,["checked"]),o("span",T,m(r.lang().label.remember_me),1)])]),o("div",j,[n.canResetPassword?(d(),c(s(k),{key:0,href:r.route("password.request"),class:"underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800"},{default:i(()=>[f(m(r.lang().label.lost_password),1)]),_:1},8,["href"])):p("",!0),a(B,{class:v(["ml-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:i(()=>[f(m(s(e).processing?r.lang().button.login+"...":r.lang().button.login),1)]),_:1},8,["class","disabled"])])],40,C)]),_:1}))}};export{H as default};

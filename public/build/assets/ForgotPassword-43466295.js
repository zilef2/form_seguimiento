import{T as c,c as f,w as l,o as n,a as t,u as a,Z as p,b as o,t as r,f as _,g,d as b,n as w,e as h}from"./app-4f2e1dbe.js";import{_ as y}from"./GuestLayout-46024b7e.js";import{_ as k}from"./InputError-5b65d076.js";import{_ as v}from"./InputLabel-2b52a224.js";import{_ as V}from"./PrimaryButton-fb83634d.js";import{_ as $}from"./TextInput-a7e77896.js";import{_ as x}from"./AuntheticationIllustration-23534335.js";import"./ApplicationLogo-aec99077.js";import"./_plugin-vue_export-helper-c27b6911.js";const B={class:"mb-4 text-sm text-gray-600 dark:text-gray-400"},N={key:0,class:"mb-4 font-medium text-sm text-green-600 dark:text-green-400"},S=["onSubmit"],C={class:"flex items-center justify-end mt-4"},U={__name:"ForgotPassword",props:{status:String},setup(i){const e=c({email:""}),d=()=>{e.post(route("password.email"))};return(s,m)=>(n(),f(y,null,{illustration:l(()=>[t(x,{type:"login",class:"w-72 h-auto"})]),default:l(()=>[t(a(p),{title:s.lang().label.password_forgot},null,8,["title"]),o("div",B,r(s.lang().label.forgot_password),1),i.status?(n(),_("div",N,r(i.status),1)):g("",!0),o("form",{onSubmit:h(d,["prevent"])},[o("div",null,[t(v,{for:"email",value:s.lang().label.email},null,8,["value"]),t($,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:a(e).email,"onUpdate:modelValue":m[0]||(m[0]=u=>a(e).email=u),required:"",autofocus:"",autocomplete:"username",placeholder:s.lang().placeholder.email,error:a(e).errors.email},null,8,["modelValue","placeholder","error"]),t(k,{class:"mt-2",message:a(e).errors.email},null,8,["message"])]),o("div",C,[t(V,{class:w({"opacity-25":a(e).processing}),disabled:a(e).processing},{default:l(()=>[b(r(a(e).processing?s.lang().button.forgot_password+"...":s.lang().button.forgot_password),1)]),_:1},8,["class","disabled"])])],40,S)]),_:1}))}};export{U as default};

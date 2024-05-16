import{T as g,c as w,w as d,o as _,a,u as l,Z as b,b as n,d as u,t as c,i as h,n as v,e as V}from"./app-9e3c5959.js";import{_ as y}from"./GuestLayout-73fea1da.js";import{_ as i}from"./InputError-0f27fbac.js";import{_ as t}from"./InputLabel-9c6e7da7.js";import{_ as k}from"./PrimaryButton-b9490fc4.js";import{_ as m}from"./TextInput-13c1d1e2.js";import{_ as q}from"./AuntheticationIllustration-384aacd9.js";import{_ as U}from"./SelectInput-7fd8bef4.js";import"./ApplicationLogo-b5d5dd8e.js";const $=["onSubmit"],S={class:"mt-4"},B={class:"mt-4"},F={class:"mt-4"},M={class:"flex items-center justify-between mt-4"},E={__name:"Register",setup(N){const e=g({name:"",sexo:"",email:"",password:"",password_confirmation:"",identificacion:"",fecha_nacimiento:"",terms:!1}),f=()=>{e.post(route("register"),{onFinish:()=>e.reset("password","password_confirmation")})},p=[{label:"Masculino",value:"Masculino"},{label:"Femenino",value:"Femenino"}];return(o,s)=>(_(),w(y,null,{illustration:d(()=>[a(q,{type:"login",class:"w-72 h-auto"})]),default:d(()=>[a(l(b),{title:o.lang().label.register},null,8,["title"]),n("form",{onSubmit:V(f,["prevent"])},[n("div",null,[a(t,{for:"name",value:o.lang().label.name},null,8,["value"]),a(m,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:l(e).name,"onUpdate:modelValue":s[0]||(s[0]=r=>l(e).name=r),required:"",autofocus:"",autocomplete:"name",placeholder:o.lang().placeholder.name,error:l(e).errors.name},null,8,["modelValue","placeholder","error"]),a(i,{class:"mt-2",message:l(e).errors.name},null,8,["message"])]),n("div",null,[a(t,{for:"sexo",value:o.lang().label.sexo},null,8,["value"]),a(U,{id:"sexo",class:"mt-1 block w-full",modelValue:l(e).sexo,"onUpdate:modelValue":s[1]||(s[1]=r=>l(e).sexo=r),required:"",dataSet:p},null,8,["modelValue"]),a(i,{class:"mt-2",message:l(e).errors.name},null,8,["message"])]),n("div",null,[a(t,{for:"identificacion",value:o.lang().label.identificacion},null,8,["value"]),a(m,{id:"identificacion",type:"number",class:"mt-1 block w-full",modelValue:l(e).identificacion,"onUpdate:modelValue":s[2]||(s[2]=r=>l(e).identificacion=r),required:"",autofocus:"",autocomplete:"identificacion",placeholder:o.lang().placeholder.identificacion,error:l(e).errors.identificacion},null,8,["modelValue","placeholder","error"]),a(i,{class:"mt-2",message:l(e).errors.identificacion},null,8,["message"])]),n("div",null,[a(t,{for:"fecha_nacimiento",value:o.lang().label.fecha_nacimiento},null,8,["value"]),a(m,{id:"fecha_nacimiento",type:"date",class:"mt-1 block w-full",modelValue:l(e).fecha_nacimiento,"onUpdate:modelValue":s[3]||(s[3]=r=>l(e).fecha_nacimiento=r),required:"",autofocus:"",autocomplete:"fecha_nacimiento",placeholder:o.lang().placeholder.fecha_nacimiento,error:l(e).errors.fecha_nacimiento},null,8,["modelValue","placeholder","error"]),a(i,{class:"mt-2",message:l(e).errors.fecha_nacimiento},null,8,["message"])]),n("div",S,[a(t,{for:"email",value:o.lang().label.email},null,8,["value"]),a(m,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:l(e).email,"onUpdate:modelValue":s[4]||(s[4]=r=>l(e).email=r),required:"",autocomplete:"username",placeholder:o.lang().placeholder.email,error:l(e).errors.email},null,8,["modelValue","placeholder","error"]),a(i,{class:"mt-2",message:l(e).errors.email},null,8,["message"])]),n("div",B,[a(t,{for:"password",value:o.lang().label.password},null,8,["value"]),a(m,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:l(e).password,"onUpdate:modelValue":s[5]||(s[5]=r=>l(e).password=r),required:"",autocomplete:"new-password",placeholder:o.lang().placeholder.password,error:l(e).errors.password},null,8,["modelValue","placeholder","error"]),a(i,{class:"mt-2",message:l(e).errors.password},null,8,["message"])]),n("div",F,[a(t,{for:"password_confirmation",value:o.lang().label.password_confirmation},null,8,["value"]),a(m,{id:"password_confirmation",type:"password",class:"mt-1 block w-full",modelValue:l(e).password_confirmation,"onUpdate:modelValue":s[6]||(s[6]=r=>l(e).password_confirmation=r),required:"",autocomplete:"new-password",placeholder:o.lang().placeholder.password_confirmation,error:l(e).errors.password_confirmation},null,8,["modelValue","placeholder","error"]),a(i,{class:"mt-2",message:l(e).errors.password_confirmation},null,8,["message"])]),n("div",M,[a(l(h),{href:o.route("login"),class:"underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800"},{default:d(()=>[u(c(o.lang().label.registered),1)]),_:1},8,["href"]),a(k,{class:v(["ml-4",{"opacity-25":l(e).processing}]),disabled:l(e).processing},{default:d(()=>[u(c(l(e).processing?o.lang().button.register+"...":o.lang().button.register),1)]),_:1},8,["class","disabled"])])],40,$)]),_:1}))}};export{E as default};
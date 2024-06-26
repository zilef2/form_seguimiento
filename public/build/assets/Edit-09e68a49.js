import{T as f,x as _,f as g,a as l,w as d,o as b,b as n,t as r,u as o,d as p,n as h,e as v}from"./app-72098953.js";import{_ as w}from"./InputError-b1fe6d4f.js";import{_ as y}from"./InputLabel-56ea6720.js";import{_ as $,a as k}from"./SecondaryButton-9177dc35.js";import{_ as S}from"./PrimaryButton-8063e5bc.js";import{_ as V}from"./TextInput-3eb5d06a.js";const C={class:"space-y-6"},x=["onSubmit"],B={class:"text-lg font-medium text-gray-900 dark:text-gray-100"},E={class:"my-6 space-y-4"},N={class:"flex justify-end"},M={__name:"Edit",props:{show:Boolean,title:String,permission:Object},emits:["close"],setup(u,{emit:i}){const t=u,e=f({name:""}),c=()=>{var s;e.put(route("permission.update",(s=t.permission)==null?void 0:s.id),{preserveScroll:!0,onSuccess:()=>{i("close"),e.reset()},onError:()=>null,onFinish:()=>null})};return _(()=>{var s;t.show&&(e.errors={},e.name=(s=t.permission)==null?void 0:s.name)}),(s,a)=>(b(),g("section",C,[l($,{show:t.show,onClose:a[2]||(a[2]=m=>i("close"))},{default:d(()=>[n("form",{class:"p-6",onSubmit:v(c,["prevent"])},[n("h2",B,r(s.lang().label.edit)+" "+r(t.title),1),n("div",E,[n("div",null,[l(y,{for:"name",value:s.lang().label.role},null,8,["value"]),l(V,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:o(e).name,"onUpdate:modelValue":a[0]||(a[0]=m=>o(e).name=m),required:"",placeholder:s.lang().placeholder.name,error:o(e).errors.name},null,8,["modelValue","placeholder","error"]),l(w,{class:"mt-2",message:o(e).errors.name},null,8,["message"])])]),n("div",N,[l(k,{disabled:o(e).processing,onClick:a[1]||(a[1]=m=>i("close"))},{default:d(()=>[p(r(s.lang().button.close),1)]),_:1},8,["disabled"]),l(S,{class:h(["ml-3",{"opacity-25":o(e).processing}]),disabled:o(e).processing,onClick:c},{default:d(()=>[p(r(o(e).processing?s.lang().button.save+"...":s.lang().button.save),1)]),_:1},8,["class","disabled"])])],40,x)]),_:1},8,["show"])]))}};export{M as default};

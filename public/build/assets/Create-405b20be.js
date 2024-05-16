import{k as S,T as x,x as C,f as u,a as l,w as p,o as f,b as t,t as d,u as a,F as $,j as V,q as j,s as B,d as _,n as E,e as F}from"./app-9e3c5959.js";import{_ as h}from"./InputError-0f27fbac.js";import{_ as m}from"./InputLabel-9c6e7da7.js";import{_ as N,a as U}from"./SecondaryButton-5bdf8610.js";import{_ as q}from"./PrimaryButton-b9490fc4.js";import{_ as D}from"./TextInput-13c1d1e2.js";import{_ as M}from"./Checkbox-b5737797.js";const T={class:"space-y-6"},z=["onSubmit"],A={class:"text-lg font-medium text-gray-900 dark:text-gray-100"},L={class:"my-6 space-y-4"},O={class:"flex justify-start items-center space-x-2 mt-2"},G={class:"grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 mt-2"},H=["id","value"],I={class:"flex justify-end"},Y={__name:"Create",props:{show:Boolean,title:String,permissions:Object},emits:["close"],setup(b,{emit:c}){const i=b,n=S({multipleSelect:!1}),e=x({name:"",guard_name:"web",permissions:[]}),g=()=>{e.post(route("role.store"),{preserveScroll:!0,onSuccess:()=>{c("close"),e.reset(),n.multipleSelect=!1},onError:()=>null,onFinish:()=>null})};C(()=>{i.show&&(e.errors={})});const k=r=>{r.target.checked===!1?e.permissions=[]:(e.permissions=[],i.permissions.forEach(s=>{e.permissions.push(s.id)}))},v=()=>{i.permissions.length==e.permissions.length?n.multipleSelect=!0:n.multipleSelect=!1};return(r,s)=>(f(),u("section",T,[l(N,{show:i.show,onClose:s[4]||(s[4]=o=>c("close"))},{default:p(()=>[t("form",{class:"p-6",onSubmit:F(g,["prevent"])},[t("h2",A,d(r.lang().label.add)+" "+d(i.title),1),t("div",L,[t("div",null,[l(m,{for:"name",value:r.lang().label.role},null,8,["value"]),l(D,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:a(e).name,"onUpdate:modelValue":s[0]||(s[0]=o=>a(e).name=o),required:"",placeholder:r.lang().placeholder.name,error:a(e).errors.name},null,8,["modelValue","placeholder","error"]),l(h,{class:"mt-2",message:a(e).errors.name},null,8,["message"])]),t("div",null,[l(m,{value:r.lang().label.permission},null,8,["value"]),l(h,{class:"mt-2",message:a(e).errors.permissions},null,8,["message"]),t("div",O,[l(M,{id:"permission-all",checked:n.multipleSelect,"onUpdate:checked":s[1]||(s[1]=o=>n.multipleSelect=o),onChange:k},null,8,["checked"]),l(m,{for:"permission-all",value:r.lang().label.check_all},null,8,["value"])]),t("div",G,[(f(!0),u($,null,V(i.permissions,(o,y)=>(f(),u("div",{class:"flex items-center justify-start space-x-2",key:y},[j(t("input",{onChange:v,class:"rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary dark:text-primary shadow-sm focus:ring-primary/80 dark:focus:ring-primary dark:focus:ring-offset-gray-800 dark:checked:bg-primary dark:checked:border-primary",type:"checkbox",id:"permission_"+o.id,value:o.id,"onUpdate:modelValue":s[2]||(s[2]=w=>a(e).permissions=w)},null,40,H),[[B,a(e).permissions]]),l(m,{for:"permission_"+o.id,value:o.name},null,8,["for","value"])]))),128))])])]),t("div",I,[l(U,{disabled:a(e).processing,onClick:s[3]||(s[3]=o=>c("close"))},{default:p(()=>[_(d(r.lang().button.close),1)]),_:1},8,["disabled"]),l(q,{class:E(["ml-3",{"opacity-25":a(e).processing}]),disabled:a(e).processing,onClick:g},{default:p(()=>[_(d(a(e).processing?r.lang().button.add+"...":r.lang().button.add),1)]),_:1},8,["class","disabled"])])],40,z)]),_:1},8,["show"])]))}};export{Y as default};

import{T as f,f as _,a as c,w as u,o as g,b as o,t,d as n,u as r,n as b,e as h}from"./app-9e3c5959.js";import{_ as y}from"./DangerButton-899d43f7.js";import{_ as w,a as x}from"./SecondaryButton-5bdf8610.js";const k={class:"space-y-6"},S=["onSubmit"],v={class:"text-lg font-medium text-gray-900 dark:text-gray-100"},C={class:"mt-1 text-sm text-gray-600 dark:text-gray-400"},$={class:"mt-6 flex justify-end"},D={__name:"Delete",props:{show:Boolean,title:String,user:Object},emits:["close"],setup(p,{emit:i}){const a=p,s=f({}),m=()=>{var e;s.delete(route("user.destroy",(e=a.user)==null?void 0:e.id),{preserveScroll:!0,onSuccess:()=>{i("close"),s.reset()},onError:()=>null,onFinish:()=>null})};return(e,l)=>(g(),_("section",k,[c(w,{show:a.show,onClose:l[1]||(l[1]=d=>i("close")),maxWidth:"lg"},{default:u(()=>{var d;return[o("form",{class:"p-6",onSubmit:h(m,["prevent"])},[o("h2",v,t(e.lang().label.delete)+" "+t(a.title),1),o("p",C,[n(t(e.lang().label.delete_confirm)+" ",1),o("b",null,t((d=a.user)==null?void 0:d.name),1),n("? ")]),o("div",$,[c(x,{disabled:r(s).processing,onClick:l[0]||(l[0]=B=>i("close"))},{default:u(()=>[n(t(e.lang().button.close),1)]),_:1},8,["disabled"]),c(y,{class:b(["ml-3",{"opacity-25":r(s).processing}]),disabled:r(s).processing,onClick:m},{default:u(()=>[n(t(r(s).processing?e.lang().button.delete+"...":e.lang().button.delete),1)]),_:1},8,["class","disabled"])])],40,S)]}),_:1},8,["show"])]))}};export{D as default};

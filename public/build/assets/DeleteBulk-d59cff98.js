import{T as p,x as _,f as g,a as d,w as c,o as b,b as a,t as s,u as n,d as f,n as h,e as y}from"./app-87c0ac14.js";import{_ as w}from"./DangerButton-426e70b5.js";import{_ as k,a as x}from"./SecondaryButton-987f3a04.js";const S={class:"space-y-6"},v=["onSubmit"],B={class:"text-lg font-medium text-gray-900 dark:text-gray-100"},C={class:"mt-1 text-sm text-gray-600 dark:text-gray-400"},$={class:"mt-6 flex justify-end"},j={__name:"DeleteBulk",props:{show:Boolean,title:String,selectedId:Object},emits:["close"],setup(u,{emit:r}){const t=u,e=p({id:[]}),m=()=>{e.post(route("role.destroy-bulk"),{preserveScroll:!0,onSuccess:()=>{r("close"),e.reset()},onError:()=>null,onFinish:()=>null})};return _(()=>{t.show&&(e.id=t.selectedId)}),(o,l)=>(b(),g("section",S,[d(k,{show:t.show,onClose:l[1]||(l[1]=i=>r("close")),maxWidth:"lg"},{default:c(()=>{var i;return[a("form",{class:"p-6",onSubmit:y(m,["prevent"])},[a("h2",B,s(o.lang().label.delete)+" "+s(t.title),1),a("p",C,s(o.lang().label.delete_confirm)+" "+s((i=t.selectedId)==null?void 0:i.length)+" "+s(t.title)+"? ",1),a("div",$,[d(x,{disabled:n(e).processing,onClick:l[0]||(l[0]=E=>r("close"))},{default:c(()=>[f(s(o.lang().button.close),1)]),_:1},8,["disabled"]),d(w,{class:h(["ml-3",{"opacity-25":n(e).processing}]),disabled:n(e).processing,onClick:m},{default:c(()=>[f(s(n(e).processing?o.lang().button.delete+"...":o.lang().button.delete),1)]),_:1},8,["class","disabled"])])],40,v)]}),_:1},8,["show"])]))}};export{j as default};
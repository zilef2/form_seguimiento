import{_ as u,a as y}from"./SecondaryButton-5bdf8610.js";import{f as n,a as p,w as _,o as r,b as s,t as e,d as f,F as h,j as x}from"./app-9e3c5959.js";const b={class:"space-y-6"},w={class:"p-6 text-gray-900 dark:text-gray-100"},k={class:"text-lg font-medium"},v={class:"mt-1 text-sm text-gray-600 dark:text-gray-400"},j={class:"my-6 grid grid-cols-2 sm:grid-cols-3"},B={class:"mt-6 flex justify-end"},N={__name:"Permission",props:{show:Boolean,title:String,role:Object},emits:["close"],setup(g,{emit:i}){const a=g;return(t,o)=>(r(),n("section",b,[p(u,{show:a.show,onClose:o[1]||(o[1]=l=>i("close")),maxWidth:"2xl"},{default:_(()=>{var l,c;return[s("div",w,[s("h2",k,e(t.lang().label.permission),1),s("p",v,[f(e(t.lang().label.all_permission)+" "+e(t.lang().label.role)+" ",1),s("b",null,e((l=a.role)==null?void 0:l.name),1)]),s("div",j,[(r(!0),n(h,null,x((c=a.role)==null?void 0:c.permissions,(d,m)=>(r(),n("div",{key:m,class:"flex justify-between w-full px-4 py-2"},e(++m+". "+d.name),1))),128))]),s("div",B,[p(y,{onClick:o[0]||(o[0]=d=>i("close"))},{default:_(()=>[f(e(t.lang().button.close),1)]),_:1})])])]}),_:1},8,["show"])]))}};export{N as default};

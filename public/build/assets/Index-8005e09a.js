import{k as V,K as B,l as P,O as N,m as D,f as m,a as o,u as p,w as f,F as v,p as U,o as i,Z as A,b as s,q as c,v as y,d as b,t as n,c as _,g as E,j as F,s as q}from"./app-72098953.js";import{_ as z,a as G}from"./AuthenticatedLayout-92c703ba.js";import{_ as K}from"./TextInput-3eb5d06a.js";import{_ as L}from"./PrimaryButton-8063e5bc.js";import{r as M,_ as T}from"./InfoButton-cb106bd5.js";import{_ as Z}from"./SelectInput-453922fe.js";import{_ as x}from"./DangerButton-f004b766.js";import{r as w,_ as H}from"./Pagination-40d74174.js";import J from"./Create-c5c80211.js";import Q from"./Edit-b4ca57f4.js";import R from"./Delete-98a80112.js";import W from"./DeleteBulk-57c27cc5.js";import{_ as X}from"./Checkbox-1835ac5d.js";import Y from"./Permission-5da37dd7.js";import{r as $}from"./TrashIcon-923ca151.js";import"./ApplicationLogo-eae07a0c.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./Toast-97face0a.js";import"./InputError-b1fe6d4f.js";import"./InputLabel-56ea6720.js";import"./SecondaryButton-9177dc35.js";const ee={class:"space-y-4"},se={class:"px-4 sm:px-0"},te={class:"rounded-lg overflow-hidden w-fit"},le={class:"relative bg-white dark:bg-gray-800 shadow sm:rounded-lg"},re={class:"flex justify-between p-2"},oe={class:"flex space-x-2"},ae={class:"overflow-x-auto scrollbar-table"},ne={class:"w-full"},ie={class:"uppercase text-sm border-t border-gray-200 dark:border-gray-700"},de={class:"dark:bg-gray-900/50 text-left"},pe={class:"px-2 py-4 text-center"},ce=s("th",{class:"px-2 py-4 text-center"},"#",-1),me={class:"flex justify-between items-center"},ue={class:"flex justify-between items-center"},fe=s("span",null,"Guard",-1),he={class:"px-2 py-4"},ye={class:"flex justify-between items-center"},_e=s("th",{class:"px-2 py-4 sr-only"},"Action",-1),ge={class:"whitespace-nowrap py-4 px-2 sm:py-3 text-center"},be=["value"],we={class:"whitespace-nowrap py-4 px-2 sm:py-3 text-center"},ke={class:"whitespace-nowrap py-4 px-2 sm:py-3"},ve={class:"whitespace-nowrap py-4 px-2 sm:py-3"},xe=["onClick"],$e=["onClick"],Oe={key:2,class:"whitespace-nowrap py-4 px-2 sm:py-3"},Ce={class:"whitespace-nowrap py-4 px-2 sm:py-3"},Se={class:"whitespace-nowrap py-4 px-2 sm:py-3"},Ie={class:"flex justify-center items-center"},je={class:"rounded-md overflow-hidden"},Ve={class:"flex justify-between items-center p-2 border-t border-gray-200 dark:border-gray-700"},Xe={__name:"Index",props:{title:String,filters:Object,roles:Object,permissions:Object,breadcrumbs:Object,perPage:Number},setup(h){const a=h,{_:O,debounce:C,pickBy:S}=U,e=V({params:{search:a.filters.search,field:a.filters.field,order:a.filters.order,perPage:a.perPage},selectedId:[],multipleSelect:!1,createOpen:!1,editOpen:!1,deleteOpen:!1,deleteBulkOpen:!1,permissionOpen:!1,role:null,dataSet:B().props.app.perpage}),g=r=>{e.params.field=r,e.params.order=e.params.order==="asc"?"desc":"asc"};P(()=>O.cloneDeep(e.params),C(()=>{let r=S(e.params);N.get(route("role.index"),r,{replace:!0,preserveState:!0,preserveScroll:!0})},150));const I=r=>{var t;r.target.checked===!1?e.selectedId=[]:(t=a.roles)==null||t.data.forEach(d=>{e.selectedId.push(d.id)})},j=()=>{var r;((r=a.roles)==null?void 0:r.data.length)==e.selectedId.length?e.multipleSelect=!0:e.multipleSelect=!1};return(r,t)=>{const d=D("tooltip");return i(),m(v,null,[o(p(A),{title:a.title},null,8,["title"]),o(z,null,{default:f(()=>[o(G,{title:h.title,breadcrumbs:h.breadcrumbs,class:"capitalize text-xl font-bold"},null,8,["title","breadcrumbs"]),s("div",ee,[s("div",se,[s("div",te,[c(o(L,{class:"rounded-none",onClick:t[0]||(t[0]=l=>e.createOpen=!0)},{default:f(()=>[b(n(r.lang().button.add),1)]),_:1},512),[[y,r.can(["create role"])]]),o(J,{show:e.createOpen,onClose:t[1]||(t[1]=l=>e.createOpen=!1),permissions:a.permissions,title:a.title},null,8,["show","permissions","title"]),o(Q,{show:e.editOpen,onClose:t[2]||(t[2]=l=>e.editOpen=!1),role:e.role,permissions:a.permissions,title:a.title},null,8,["show","role","permissions","title"]),o(R,{show:e.deleteOpen,onClose:t[3]||(t[3]=l=>e.deleteOpen=!1),role:e.role,title:a.title},null,8,["show","role","title"]),o(W,{show:e.deleteBulkOpen,onClose:t[4]||(t[4]=l=>(e.deleteBulkOpen=!1,e.multipleSelect=!1,e.selectedId=[])),selectedId:e.selectedId,title:a.title},null,8,["show","selectedId","title"]),o(Y,{show:e.permissionOpen,onClose:t[5]||(t[5]=l=>e.permissionOpen=!1),role:e.role,title:a.title},null,8,["show","role","title"])])]),s("div",le,[s("div",re,[s("div",oe,[o(Z,{modelValue:e.params.perPage,"onUpdate:modelValue":t[6]||(t[6]=l=>e.params.perPage=l),dataSet:e.dataSet},null,8,["modelValue","dataSet"]),c((i(),_(x,{onClick:t[7]||(t[7]=l=>e.deleteBulkOpen=!0),class:"px-3 py-1.5"},{default:f(()=>[o(p($),{class:"w-5 h-5"})]),_:1})),[[y,e.selectedId.length!=0&&r.can(["delete role"])],[d,r.lang().tooltip.delete_selected]])]),a.numberPermissions>1?(i(),_(K,{key:0,modelValue:e.params.search,"onUpdate:modelValue":t[8]||(t[8]=l=>e.params.search=l),type:"text",class:"block w-3/6 md:w-2/6 lg:w-1/6 rounded-lg",placeholder:r.lang().placeholder.search},null,8,["modelValue","placeholder"])):E("",!0)]),s("div",ae,[s("table",ne,[s("thead",ie,[s("tr",de,[s("th",pe,[o(X,{checked:e.multipleSelect,"onUpdate:checked":t[9]||(t[9]=l=>e.multipleSelect=l),onChange:I},null,8,["checked"])]),ce,s("th",{class:"px-2 py-4 cursor-pointer",onClick:t[10]||(t[10]=l=>g("name"))},[s("div",me,[s("span",null,n(r.lang().label.name),1),o(p(w),{class:"w-4 h-4"})])]),s("th",{class:"px-2 py-4 cursor-pointer",onClick:t[11]||(t[11]=l=>g("email"))},[s("div",ue,[fe,o(p(w),{class:"w-4 h-4"})])]),s("th",he,n(r.lang().label.permission),1),s("th",{class:"px-2 py-4 cursor-pointer",onClick:t[12]||(t[12]=l=>g("updated_at"))},[s("div",ye,[s("span",null,n(r.lang().label.updated),1),o(p(w),{class:"w-4 h-4"})])]),_e])]),s("tbody",null,[(i(!0),m(v,null,F(h.roles.data,(l,k)=>(i(),m("tr",{key:k,class:"border-t border-gray-200 dark:border-gray-700 hover:bg-gray-200/30 hover:dark:bg-gray-900/20"},[s("td",ge,[c(s("input",{class:"rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary dark:text-primary shadow-sm focus:ring-primary/80 dark:focus:ring-primary dark:focus:ring-offset-gray-800 dark:checked:bg-primary dark:checked:border-primary",type:"checkbox",onChange:j,value:l.id,"onUpdate:modelValue":t[13]||(t[13]=u=>e.selectedId=u)},null,40,be),[[q,e.selectedId]])]),s("td",we,n(++k),1),s("td",ke,n(l.name.replace(/_/g," ")),1),s("td",ve,n(l.guard_name),1),l.permissions.length==a.permissions.length?c((i(),m("td",{key:0,onClick:u=>(e.permissionOpen=!0,e.role=l),class:"whitespace-nowrap py-4 px-2 sm:py-3 cursor-pointer text-blue-600 dark:text-blue-400 font-bold underline"},[b(n(r.lang().label.all_permission),1)],8,xe)),[[d,r.lang().tooltip.detail]]):l.permissions.length!=0?c((i(),m("td",{key:1,onClick:u=>(e.permissionOpen=!0,e.role=l),class:"whitespace-nowrap py-4 px-2 sm:py-3 cursor-pointer text-blue-600 dark:text-blue-400 font-bold underline"},[b(n(l.permissions.length)+" "+n(r.lang().label.permission),1)],8,$e)),[[d,r.lang().tooltip.detail]]):(i(),m("td",Oe,n(r.lang().label.no_permission),1)),s("td",Ce,n(l.updated_at),1),s("td",Se,[s("div",Ie,[s("div",je,[c((i(),_(T,{type:"button",onClick:u=>(e.editOpen=!0,e.role=l),class:"px-2 py-1.5 rounded-none"},{default:f(()=>[o(p(M),{class:"w-4 h-4"})]),_:2},1032,["onClick"])),[[y,r.can(["update role"])],[d,r.lang().tooltip.edit]]),c((i(),_(x,{type:"button",onClick:u=>(e.deleteOpen=!0,e.role=l),class:"px-2 py-1.5 rounded-none"},{default:f(()=>[o(p($),{class:"w-4 h-4"})]),_:2},1032,["onClick"])),[[y,r.can(["delete role"])],[d,r.lang().tooltip.delete]])])])])]))),128))])])]),s("div",Ve,[o(H,{links:a.roles,filters:e.params},null,8,["links","filters"])])])])]),_:1})],64)}}};export{Xe as default};

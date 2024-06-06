import{k as N,K as I,l as B,O as D,m as U,f as n,a as p,u as m,w as _,F as h,p as F,o as t,Z as A,b as s,c as u,d as E,t as c,g as i,j as k,q as v,s as T,v as w}from"./app-4f2e1dbe.js";import{_ as q,a as z}from"./AuthenticatedLayout-9561cd05.js";import{_ as K}from"./TextInput-a7e77896.js";import{_ as L}from"./PrimaryButton-fb83634d.js";import{_ as M}from"./SelectInput-9705dbed.js";import{_ as R}from"./DangerButton-aa2a145d.js";import{a as Z,r as G,_ as H}from"./Pagination-f8b4434a.js";import J from"./Create-d92f0427.js";import Q from"./Edit-4e051517.js";import W from"./Delete-c33570b4.js";import{_ as X}from"./Checkbox-99247823.js";import{r as Y,_ as ee}from"./InfoButton-c4ecd5f2.js";import{n as x,f as S}from"./global-bc277270.js";import"./ApplicationLogo-aec99077.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./Toast-c70c260a.js";import"./InputError-5b65d076.js";import"./InputLabel-2b52a224.js";import"./SecondaryButton-91fe9706.js";import"./vue-select-2c8d6249.js";import"./vue-datepicker-b164e0b6.js";/* empty css             */const te={class:"space-y-4"},se={class:"px-4 sm:px-0"},re={class:"rounded-lg overflow-hidden w-fit"},oe={class:"relative bg-white dark:bg-gray-800 shadow sm:rounded-lg"},ae={class:"flex justify-between p-2"},le={class:"flex space-x-2"},ne={class:"overflow-x-auto scrollbar-table"},de={key:0,class:"w-full"},ie={class:"uppercase text-sm border-t border-gray-200 dark:border-gray-700"},ce={class:"dark:bg-gray-900/50 text-left"},pe={class:"px-2 py-4 text-center"},me={key:0,class:"px-2 py-4"},ue=s("th",{class:"px-2 py-4 text-center"},"#",-1),fe=["onClick"],ye={class:"flex justify-between items-center"},be={class:"whitespace-nowrap py-4 px-2 sm:py-3 text-center"},_e=["value"],he={key:0,class:"whitespace-nowrap py-4 w-12 px-1 sm:py-3 w-12"},ge={class:"flex justify-center items-center"},ke={class:"rounded-md overflow-hidden"},ve={class:"whitespace-nowrap py-4 px-2 sm:py-3 text-center"},we={class:"py-4 px-2 sm:py-3"},xe={key:0},Se={key:1},$e={key:2},Pe={key:3},Ce={key:4},Oe={key:5},Ve={class:"border-t border-gray-600"},je={key:0,class:"whitespace-nowrap py-4 w-12 px-2 sm:py-3 text-center"},Ne=s("td",{class:"whitespace-nowrap py-4 px-2 sm:py-3 text-center"}," Total: ",-1),Ie={class:"whitespace-nowrap py-4 px-2 sm:py-3 text-center"},Be={key:1,class:"text-center text-xl my-8"},De={key:0,class:"flex justify-between items-center p-2 border-t border-gray-200 dark:border-gray-700"},rt={__name:"Index",props:{fromController:Object,total:Number,filters:Object,breadcrumbs:Object,perPage:Number,title:String,numberPermissions:Number,losSelect:Object,Flash:String},setup(f){const o=f,{_:$,debounce:P,pickBy:C}=F,e=N({params:{search:o.filters.search,field:o.filters.field,order:o.filters.order,perPage:o.perPage},generico:null,selectedId:[],multipleSelect:!1,createOpen:!1,editOpen:!1,deleteOpen:!1,dataSet:I().props.app.perpage}),O=a=>{e.params.field=a,e.params.order=e.params.order==="asc"?"desc":"asc"};B(()=>$.cloneDeep(e.params),P(()=>{let a=C(e.params);D.get(route("actividad.index"),a,{replace:!0,preserveState:!0,preserveScroll:!0})},150));const V=a=>{var l;console.log("🧈 debu event:",a),a.target.checked===!1?e.selectedId=[]:(l=o.actividads)==null||l.data.forEach(b=>{e.selectedId.push(b.id)})},j=()=>{var a;((a=o.actividads)==null?void 0:a.data.length)==e.selectedId.length?e.multipleSelect=!0:e.multipleSelect=!1},y=[{order:"nombre",label:"nombre",type:"text"},{order:"centros",label:"centros",type:"text"},{order:"tipo",label:"tipo",type:"text"}];return(a,l)=>{const b=U("tooltip");return t(),n(h,null,[p(m(A),{title:o.title},null,8,["title"]),p(q,null,{default:_(()=>[p(z,{title:f.title,breadcrumbs:f.breadcrumbs,class:"capitalize text-xl font-bold"},null,8,["title","breadcrumbs"]),s("div",te,[s("div",se,[s("div",re,[a.can(["create actividad"])?(t(),u(L,{key:0,class:"rounded-none",onClick:l[0]||(l[0]=r=>e.createOpen=!0)},{default:_(()=>[E(c(a.lang().button.add),1)]),_:1})):i("",!0),a.can(["create actividad"])?(t(),u(J,{key:1,numberPermissions:o.numberPermissions,titulos:y,show:e.createOpen,onClose:l[1]||(l[1]=r=>e.createOpen=!1),title:o.title,losSelect:o.losSelect},null,8,["numberPermissions","show","title","losSelect"])):i("",!0),a.can(["update actividad"])?(t(),u(Q,{key:2,titulos:y,numberPermissions:o.numberPermissions,show:e.editOpen,onClose:l[2]||(l[2]=r=>e.editOpen=!1),generica:e.generico,title:o.title,losSelect:o.losSelect},null,8,["numberPermissions","show","generica","title","losSelect"])):i("",!0),a.can(["delete actividad"])?(t(),u(W,{key:3,numberPermissions:o.numberPermissions,show:e.deleteOpen,onClose:l[3]||(l[3]=r=>e.deleteOpen=!1),generica:e.generico,title:o.title},null,8,["numberPermissions","show","generica","title"])):i("",!0)])]),s("div",oe,[s("div",ae,[s("div",le,[p(M,{modelValue:e.params.perPage,"onUpdate:modelValue":l[4]||(l[4]=r=>e.params.perPage=r),dataSet:e.dataSet},null,8,["modelValue","dataSet"])]),o.numberPermissions>1?(t(),u(K,{key:0,modelValue:e.params.search,"onUpdate:modelValue":l[5]||(l[5]=r=>e.params.search=r),type:"text",class:"block w-4/6 md:w-3/6 lg:w-2/6 rounded-lg",placeholder:"Nombre, codigo"},null,8,["modelValue"])):i("",!0)]),s("div",ne,[o.total>0?(t(),n("table",de,[s("thead",ie,[s("tr",ce,[s("th",pe,[p(X,{checked:e.multipleSelect,"onUpdate:checked":l[6]||(l[6]=r=>e.multipleSelect=r),onChange:V},null,8,["checked"])]),f.numberPermissions>1?(t(),n("th",me,"Accion")):i("",!0),ue,(t(),n(h,null,k(y,r=>s("th",{class:"px-2 py-4 cursor-pointer",onClick:g=>O(r.order)},[s("div",ye,[s("span",null,c(a.lang().label[r.label]),1),p(m(Z),{class:"w-4 h-4"})])],8,fe)),64))])]),s("tbody",null,[(t(!0),n(h,null,k(o.fromController.data,(r,g)=>(t(),n("tr",{key:g,class:"border-t border-gray-200 dark:border-gray-700 hover:bg-gray-200/30 hover:dark:bg-gray-900/20"},[s("td",be,[v(s("input",{class:"rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary dark:text-primary shadow-sm focus:ring-primary/80 dark:focus:ring-primary dark:focus:ring-offset-gray-800 dark:checked:bg-primary dark:checked:border-primary",type:"checkbox",onChange:j,value:r.id,"onUpdate:modelValue":l[7]||(l[7]=d=>e.selectedId=d)},null,40,_e),[[T,e.selectedId]])]),f.numberPermissions>1?(t(),n("td",he,[s("div",ge,[s("div",ke,[v((t(),u(ee,{type:"button",onClick:d=>(e.editOpen=!0,e.generico=r),class:"px-2 py-1.5 rounded-none"},{default:_(()=>[p(m(Y),{class:"w-4 h-4"})]),_:2},1032,["onClick"])),[[w,a.can(["update user"])],[b,a.lang().tooltip.edit]]),v((t(),u(R,{type:"button",onClick:d=>(e.deleteOpen=!0,e.generico=r),class:"px-2 py-1.5 rounded-none"},{default:_(()=>[p(m(G),{class:"w-4 h-4"})]),_:2},1032,["onClick"])),[[w,a.can(["delete user"])],[b,a.lang().tooltip.delete]])])])])):i("",!0),s("td",ve,c(++g),1),(t(),n(h,null,k(y,d=>s("td",we,[d.type==="text"?(t(),n("span",xe,c(r[d.order]),1)):i("",!0),d.type==="number"?(t(),n("span",Se,c(m(x)(r[d.order],0,!1)),1)):i("",!0),d.type==="dinero"?(t(),n("span",$e,c(m(x)(r[d.order],0,!0)),1)):i("",!0),d.type==="date"?(t(),n("span",Pe,c(m(S)(r[d.order],!1)),1)):i("",!0),d.type==="datetime"?(t(),n("span",Ce,c(m(S)(r[d.order],!0)),1)):i("",!0),d.type==="foreign"?(t(),n("span",Oe,c(r[d.nameid]),1)):i("",!0)])),64))]))),128)),s("tr",Ve,[f.numberPermissions>1?(t(),n("td",je," - ")):i("",!0),Ne,s("td",Ie,c(o.total),1)])])])):(t(),n("h2",Be,"Sin Registros"))]),o.total>0?(t(),n("div",De,[p(H,{links:o.fromController,filters:e.params},null,8,["links","filters"])])):i("",!0)])])]),_:1})],64)}}};export{rt as default};

import{k as O,K as V,l as N,O as I,T as B,x as P,m as D,f,a as o,u as n,w as b,F as _,p as E,o as p,Z as U,b as e,q as h,v as g,c as x,g as A,t as l,j as F,s as T,d as q}from"./app-4f2e1dbe.js";import{_ as z,a as K,r as L}from"./AuthenticatedLayout-9561cd05.js";import{_ as M}from"./TextInput-a7e77896.js";import{_ as Z}from"./SelectInput-9705dbed.js";import{_ as G}from"./DangerButton-aa2a145d.js";import{r as H,a as c,_ as J}from"./Pagination-f8b4434a.js";import"./vue-datepicker-b164e0b6.js";/* empty css             */import"./vue-select-2c8d6249.js";import{_ as Q}from"./Checkbox-99247823.js";import{C as R}from"./global-bc277270.js";import"./ApplicationLogo-aec99077.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./Toast-c70c260a.js";const W={class:"space-y-4"},X=e("div",{class:"px-4 sm:px-0"},[e("div",{class:"rounded-lg overflow-hidden w-fit"})],-1),Y={class:"relative bg-white dark:bg-gray-800 shadow sm:rounded-lg"},ee={class:"flex justify-between p-2"},se={class:"flex space-x-2"},te={class:"overflow-x-auto scrollbar-table"},ae={class:"w-full"},re={class:"uppercase text-sm border-t border-gray-200 dark:border-gray-700"},le={class:"dark:bg-gray-900/50 text-left"},oe={class:"px-2 py-4 text-center"},ne=e("th",{class:"px-2 py-4 text-center"},"#",-1),ie={class:"flex justify-between items-center"},de={class:"px-2 py-4"},ce={class:"flex justify-between items-center"},pe={class:"flex justify-between items-center"},me={class:"flex justify-between items-center"},ue={class:"flex justify-between items-center"},fe={class:"flex justify-between items-center"},he={class:"whitespace-nowrap py-4 px-2 sm:py-3 text-center"},ye=["value"],be={class:"whitespace-nowrap py-4 px-2 sm:py-3 text-center"},_e={class:"whitespace-nowrap py-4 px-2 sm:py-3"},ge={class:"flex justify-start items-center"},xe={class:"flex justify-start items-center text-sm text-gray-600"},we={class:"whitespace-nowrap py-4 px-2 sm:py-3"},ve={class:"whitespace-nowrap py-4 px-2 sm:py-3"},ke={class:"whitespace-nowrap py-4 px-2 sm:py-3"},je={class:"whitespace-nowrap text-center py-4 px-2 sm:py-3"},$e={class:"whitespace-nowrap py-4 px-2 sm:py-3"},Se={class:"whitespace-nowrap py-4 px-2 sm:py-3"},Ce={class:"flex justify-between items-center p-2 border-t border-gray-200 dark:border-gray-700"},Ke={__name:"Index",props:{title:String,filters:Object,users:Object,roles:Object,breadcrumbs:Object,perPage:Number,numberPermissions:Number,losSelect:Object},setup(m){const i=m,{_:w,debounce:v,pickBy:k}=E,s=O({params:{search:i.filters.search,field:i.filters.field,order:i.filters.order,perPage:i.perPage},selectedId:[],multipleSelect:!1,createOpen:!1,editOpen:!1,deleteOpen:!1,deleteBulkOpen:!1,user:null,ArchivoNombre:"",dataSet:V().props.app.perpage}),d=r=>{s.params.field=r,console.log("🧈 debu data.params.field:",s.params.field),s.params.order=s.params.order==="asc"?"desc":"asc",console.log("🧈 debu data.params.order:",s.params.order)};N(()=>w.cloneDeep(s.params),v(()=>{let r=k(s.params);I.get(route("user.index"),r,{replace:!0,preserveState:!0,preserveScroll:!0})},150));const j=r=>{var t;r.target.checked===!1?s.selectedId=[]:(t=i.users)==null||t.data.forEach(u=>{s.selectedId.push(u.id)})},$=()=>{var r;((r=i.users)==null?void 0:r.data.length)==s.selectedId.length?s.multipleSelect=!0:s.multipleSelect=!1},S=B({archivo1:""});return P(()=>{var r;s.ArchivoNombre=(r=S.archivo1)==null?void 0:r.name}),(r,t)=>{const u=D("tooltip");return p(),f(_,null,[o(n(U),{title:i.title},null,8,["title"]),o(z,null,{default:b(()=>[o(K,{title:m.title,breadcrumbs:m.breadcrumbs,class:"capitalize text-xl font-bold"},null,8,["title","breadcrumbs"]),e("div",W,[X,e("div",Y,[e("div",ee,[e("div",se,[o(Z,{modelValue:s.params.perPage,"onUpdate:modelValue":t[0]||(t[0]=a=>s.params.perPage=a),dataSet:s.dataSet},null,8,["modelValue","dataSet"]),h((p(),x(G,{onClick:t[1]||(t[1]=a=>s.deleteBulkOpen=!0),class:"px-3 py-1.5"},{default:b(()=>[o(n(H),{class:"w-5 h-5"})]),_:1})),[[g,s.selectedId.length!=0&&r.can(["delete user"])],[u,r.lang().tooltip.delete_selected]])]),i.numberPermissions>1?(p(),x(M,{key:0,modelValue:s.params.search,"onUpdate:modelValue":t[2]||(t[2]=a=>s.params.search=a),type:"text",class:"block w-4/6 md:w-3/6 lg:w-2/6 rounded-lg",placeholder:"Nombre, correo o identificación"},null,8,["modelValue"])):A("",!0)]),e("div",te,[e("table",ae,[e("thead",re,[e("tr",le,[e("th",oe,[o(Q,{checked:s.multipleSelect,"onUpdate:checked":t[3]||(t[3]=a=>s.multipleSelect=a),onChange:j},null,8,["checked"])]),ne,e("th",{class:"px-2 py-4 cursor-pointer",onClick:t[4]||(t[4]=a=>d("name"))},[e("div",ie,[e("span",null,l(r.lang().label.name),1),o(n(c),{class:"w-4 h-4"})])]),e("th",de,l(r.lang().label.role),1),e("th",{class:"px-2 py-4 cursor-pointer",onClick:t[5]||(t[5]=a=>d("identificacion"))},[e("div",ce,[e("span",null,l(r.lang().label.identificacion),1),o(n(c),{class:"w-4 h-4"})])]),e("th",{class:"px-2 py-4 cursor-pointer",onClick:t[6]||(t[6]=a=>d("sexo"))},[e("div",pe,[e("span",null,l(r.lang().label.sexo),1),o(n(c),{class:"w-4 h-4"})])]),e("th",{class:"px-2 py-4 cursor-pointer",onClick:t[7]||(t[7]=a=>d("fecha_nacimiento"))},[e("div",me,[e("span",null,l(r.lang().label.edad),1),o(n(c),{class:"w-4 h-4"})])]),e("th",{class:"px-2 py-4 cursor-pointer",onClick:t[8]||(t[8]=a=>d("celular"))},[e("div",ue,[e("span",null,l(r.lang().label.celular),1),o(n(c),{class:"w-4 h-4"})])]),e("th",{class:"px-2 py-4 cursor-pointer",onClick:t[9]||(t[9]=a=>d("area"))},[e("div",fe,[e("span",null,l(r.lang().label.area),1),o(n(c),{class:"w-4 h-4"})])])])]),e("tbody",null,[(p(!0),f(_,null,F(m.users.data,(a,y)=>(p(),f("tr",{key:y,class:"border-t border-gray-200 dark:border-gray-700 hover:bg-gray-200/30 hover:dark:bg-gray-900/20"},[e("td",he,[h(e("input",{class:"rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary dark:text-primary shadow-sm focus:ring-primary/80 dark:focus:ring-primary dark:focus:ring-offset-gray-800 dark:checked:bg-primary dark:checked:border-primary",type:"checkbox",onChange:$,value:a.id,"onUpdate:modelValue":t[10]||(t[10]=C=>s.selectedId=C)},null,40,ye),[[T,s.selectedId]])]),e("td",be,l(++y),1),e("td",_e,[e("span",ge,[q(l(a.name)+" ",1),h(o(n(L),{class:"ml-[2px] w-4 h-4 text-primary dark:text-white"},null,512),[[g,a.email_verified_at]])]),e("span",xe,l(a.email),1)]),e("td",we,l(a.roles.length==0?"not selected":a.roles[0].name),1),e("td",ve,l(a.identificacion),1),e("td",ke,l(a.sexo),1),e("td",je,l(n(R)(a.fecha_nacimiento)),1),e("td",$e,l(a.celular),1),e("td",Se,l(a.area),1)]))),128))])])]),e("div",Ce,[o(J,{links:i.users,filters:s.params},null,8,["links","filters"])])])])]),_:1})],64)}}};export{Ke as default};

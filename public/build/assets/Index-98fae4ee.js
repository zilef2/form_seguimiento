import{k as V,K as C,l as N,O as I,T as B,x as P,m as D,f,a as o,u as n,w as _,F as b,p as U,o as c,Z as A,b as e,q as h,v as g,c as x,g as E,t as l,j as F,s as T,d as q}from"./app-a09689e3.js";import{_ as z,a as K,c as L}from"./AuthenticatedLayout-29197df2.js";import{_ as M}from"./TextInput-c0135f55.js";import{_ as Z}from"./SelectInput-43c6396f.js";import{_ as G}from"./DangerButton-37d9de91.js";import{r as H,a as m,_ as J}from"./Pagination-0aeb3cf2.js";import"./vue-datepicker-69bac765.js";/* empty css             */import"./vue-select-e569e270.js";import{_ as Q}from"./Checkbox-1576b8c2.js";import"./ApplicationLogo-f4c0588c.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./Toast-5392e5f8.js";const R={class:"space-y-4"},W=e("div",{class:"px-4 sm:px-0"},[e("div",{class:"rounded-lg overflow-hidden w-fit"})],-1),X={class:"relative bg-white dark:bg-gray-800 shadow sm:rounded-lg"},Y={class:"flex justify-between p-2"},ee={class:"flex space-x-2"},se={class:"overflow-x-auto scrollbar-table"},te={class:"w-full"},ae={class:"uppercase text-sm border-t border-gray-200 dark:border-gray-700"},re={class:"dark:bg-gray-900/50 text-left"},le={class:"px-2 py-4 text-center"},oe=e("th",{class:"px-2 py-4 text-center"},"#",-1),ie={class:"flex justify-between items-center"},ne={class:"px-2 py-4 cursor-pointer"},ce={class:"flex justify-between items-center"},de={class:"flex justify-between items-center"},pe={class:"flex justify-between items-center"},me={class:"flex justify-between items-center"},ue={class:"px-2 py-4 cursor-pointer"},fe={class:"flex justify-between items-center"},he={class:"whitespace-nowrap py-4 px-2 sm:py-3 text-center"},ye=["value"],_e={class:"whitespace-nowrap py-4 px-2 sm:py-3 text-center"},be={class:"whitespace-nowrap py-4 px-2 sm:py-3"},ge={class:"flex justify-start items-center"},xe={class:"flex justify-start items-center text-sm text-gray-600"},we={class:"whitespace-nowrap py-4 px-2 sm:py-3"},ve={class:"whitespace-nowrap py-4 px-2 sm:py-3"},ke={class:"whitespace-nowrap py-4 px-2 sm:py-3"},je={class:"whitespace-nowrap py-4 px-2 sm:py-3"},Se={class:"whitespace-nowrap py-4 px-2 sm:py-3"},$e={class:"flex justify-between items-center p-2 border-t border-gray-200 dark:border-gray-700"},qe={__name:"Index",props:{title:String,filters:Object,users:Object,roles:Object,breadcrumbs:Object,perPage:Number,numberPermissions:Number,losSelect:Object},setup(d){const i=d,{_:w,debounce:v,pickBy:k}=U,s=V({params:{search:i.filters.search,field:i.filters.field,order:i.filters.order,perPage:i.perPage},selectedId:[],multipleSelect:!1,createOpen:!1,editOpen:!1,deleteOpen:!1,deleteBulkOpen:!1,user:null,ArchivoNombre:"",dataSet:C().props.app.perpage}),p=r=>{s.params.field=r,s.params.order=s.params.order==="asc"?"desc":"asc"};N(()=>w.cloneDeep(s.params),v(()=>{let r=k(s.params);I.get(route("user.index"),r,{replace:!0,preserveState:!0,preserveScroll:!0})},150));const j=r=>{var t;r.target.checked===!1?s.selectedId=[]:(t=i.users)==null||t.data.forEach(u=>{s.selectedId.push(u.id)})},S=()=>{var r;((r=i.users)==null?void 0:r.data.length)==s.selectedId.length?s.multipleSelect=!0:s.multipleSelect=!1},$=B({archivo1:""});return P(()=>{var r;s.ArchivoNombre=(r=$.archivo1)==null?void 0:r.name}),(r,t)=>{const u=D("tooltip");return c(),f(b,null,[o(n(A),{title:i.title},null,8,["title"]),o(z,null,{default:_(()=>[o(K,{title:d.title,breadcrumbs:d.breadcrumbs,class:"capitalize text-xl font-bold"},null,8,["title","breadcrumbs"]),e("div",R,[W,e("div",X,[e("div",Y,[e("div",ee,[o(Z,{modelValue:s.params.perPage,"onUpdate:modelValue":t[0]||(t[0]=a=>s.params.perPage=a),dataSet:s.dataSet},null,8,["modelValue","dataSet"]),h((c(),x(G,{onClick:t[1]||(t[1]=a=>s.deleteBulkOpen=!0),class:"px-3 py-1.5"},{default:_(()=>[o(n(H),{class:"w-5 h-5"})]),_:1})),[[g,s.selectedId.length!=0&&r.can(["delete user"])],[u,r.lang().tooltip.delete_selected]])]),i.numberPermissions>1?(c(),x(M,{key:0,modelValue:s.params.search,"onUpdate:modelValue":t[2]||(t[2]=a=>s.params.search=a),type:"text",class:"block w-4/6 md:w-3/6 lg:w-2/6 rounded-lg",placeholder:"Nombre, correo o identificación"},null,8,["modelValue"])):E("",!0)]),e("div",se,[e("table",te,[e("thead",ae,[e("tr",re,[e("th",le,[o(Q,{checked:s.multipleSelect,"onUpdate:checked":t[3]||(t[3]=a=>s.multipleSelect=a),onChange:j},null,8,["checked"])]),oe,e("th",{class:"px-2 py-4 cursor-pointer",onClick:t[4]||(t[4]=a=>p("name"))},[e("div",ie,[e("span",null,l(r.lang().label.name),1),o(n(m),{class:"w-4 h-4"})])]),e("th",ne,[e("div",ce,[e("span",null,l(r.lang().label.role),1)])]),e("th",{class:"px-2 py-4 cursor-pointer",onClick:t[5]||(t[5]=a=>p("identificacion"))},[e("div",de,[e("span",null,l(r.lang().label.identificacion),1),o(n(m),{class:"w-4 h-4"})])]),e("th",{class:"px-2 py-4 cursor-pointer",onClick:t[6]||(t[6]=a=>p("sexo"))},[e("div",pe,[e("span",null,l(r.lang().label.sexo),1),o(n(m),{class:"w-4 h-4"})])]),e("th",{class:"px-2 py-4 cursor-pointer",onClick:t[7]||(t[7]=a=>p("celular"))},[e("div",me,[e("span",null,l(r.lang().label.celular),1),o(n(m),{class:"w-4 h-4"})])]),e("th",ue,[e("div",fe,[e("span",null,l(r.lang().label.area),1)])])])]),e("tbody",null,[(c(!0),f(b,null,F(d.users.data,(a,y)=>(c(),f("tr",{key:y,class:"border-t border-gray-200 dark:border-gray-700 hover:bg-gray-200/30 hover:dark:bg-gray-900/20"},[e("td",he,[h(e("input",{class:"rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary dark:text-primary shadow-sm focus:ring-primary/80 dark:focus:ring-primary dark:focus:ring-offset-gray-800 dark:checked:bg-primary dark:checked:border-primary",type:"checkbox",onChange:S,value:a.id,"onUpdate:modelValue":t[8]||(t[8]=O=>s.selectedId=O)},null,40,ye),[[T,s.selectedId]])]),e("td",_e,l(++y),1),e("td",be,[e("span",ge,[q(l(a.name)+" ",1),h(o(n(L),{class:"ml-[2px] w-4 h-4 text-primary dark:text-white"},null,512),[[g,a.email_verified_at]])]),e("span",xe,l(a.email),1)]),e("td",we,l(a.roles.length==0?"not selected":a.roles[0].name),1),e("td",ve,l(a.identificacion),1),e("td",ke,l(a.sexo),1),e("td",je,l(a.celular),1),e("td",Se,l(a.area),1)]))),128))])])]),e("div",$e,[o(J,{links:i.users,filters:s.params},null,8,["links","filters"])])])])]),_:1})],64)}}};export{qe as default};

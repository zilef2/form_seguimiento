import"./app-9e3c5959.js";function p(e,i){let r=new Date(e);r=new Date(r.getTime()+5*60*60*1e3);const t=r.getDate().toString().padStart(2,"0"),n=c((r.getMonth()+1).toString().padStart(2,"0"));let l=r.getFullYear(),o=new Date().getFullYear();if(i=="conLaHora"){let a=r.getHours();const f=a>=12?" PM":" AM";a=a%12||12;let s=a+":"+(r.getMinutes()<10?"0":"")+r.getMinutes()+f;if(o==l)return`${t}-${n} | ${s}`;{let u=l.toString().slice(-2);return`${t}-${n}-${u} | ${s}`}}else{if(o==l)return`${t}-${n}`;{let a=l.toString().slice(-2);return`${t}-${n}-${a}`}}}function c(e){if(e==1)return"Enero";if(e==2)return"Febrero";if(e==3)return"Marzo";if(e==4)return"Abril";if(e==5)return"Mayo";if(e==6)return"Junio";if(e==7)return"Julio";if(e==8)return"Agosto";if(e==9)return"Septiembre";if(e==10)return"Octubre";if(e==11)return"Noviembre";if(e==12)return"Diciembre"}function $(e,i,r){if(e+="",e=parseFloat(e.replace(/[^0-9\.]/g,"")),i=i||0,isNaN(e)||e===0)return parseFloat("0").toFixed(i);e=""+e.toFixed(i);for(var t=e.split(" "),n=/(\d+)(\d{3})/;n.test(t[0]);)t[0]=t[0].replace(n,"$1.$2");return r?"$"+t.join(" "):t.join(" ")}function d(e){const i=new Date().getFullYear(),r=new Date(e).getFullYear();return i-r}function D(e,i=10){if(e){const r=e.split(" ");return r.length>i?r.slice(0,i).join(" ")+"...":e}}function F(e,i,r="uno"){return e=i.map(t=>({label:t.nombre,value:t.id})),e.unshift({label:"Seleccione "+r,value:0}),e}export{d as C,D as P,p as f,$ as n,F as v};
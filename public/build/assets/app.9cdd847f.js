import{m as c}from"./module.esm.ff9cc1d2.js";import{l as s,S as i}from"./load.1f389728.js";function d(e){s("body","\u0417\u0430\u0433\u0440\u0443\u0437\u043A\u0430 \u0441\u0442\u0430\u0442\u0438\u0441\u0442\u0438\u043A\u0438",!0),i("POST","get/rating/"+e).then(l=>p(JSON.parse(l).data)).catch(l=>console.log(l))}function p(e){let l=document.querySelector("#ratingtable");for(var n=0;n<e.length;n++){let t=document.createElement("li");t.setAttribute("class","list-group-item d-flex justify-content-between"),t.appendChild(o(e[n].subject,"container-fluid")),t.appendChild(o(e[n].value));let a=e[n].num_day+"."+e[n].num_month+"."+e[n].year;t.appendChild(o(a)),l.appendChild(t)}function o(t,a="default"){let r=document.createElement("span");return r.setAttribute("class",a),r.innerText=t,r}s("body","\u0417\u0430\u0433\u0440\u0443\u0437\u043A\u0430 \u0441\u0442\u0430\u0442\u0438\u0441\u0442\u0438\u043A\u0438",!1)}let u=1;document.querySelector("#more").onclick=()=>{d(u),u=u+1};function m(){i("GET","get/hours").then(e=>g(JSON.parse(e).data)).catch(e=>console.log(e))}function g(e){let l=document.querySelector("#hourstable");l.innerHTML=" ";for(var n=0;n<e.length;n++){let t=document.createElement("li");t.setAttribute("class","list-group-item row d-flex"),t.appendChild(o(e[n].subject)),t.appendChild(o(e[n].hours,"text-right")),l.appendChild(t)}function o(t,a=""){let r=document.createElement("span");return r.setAttribute("class","col "+a),r.innerText=t,r}}window.Alpine=c;c.start();window.onload=()=>{d(0),m()};

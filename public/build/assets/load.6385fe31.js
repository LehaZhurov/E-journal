function c(s,n,r=null,t=!1){return new Promise((l,o)=>{const e=new XMLHttpRequest;e.open(s,n,!0),e.withCredentials=!0,e.setRequestHeader("X-CSRF-TOKEN",document.head.querySelector("[name=csrf-token]").content),e.readyState==1&&t&&console.log("\u041E\u0442\u043F\u0440\u0430\u0432\u043A\u0430 \u0437\u0430\u043F\u0440\u043E\u0441\u0430 "+s+" \u0437\u0430\u043F\u0440\u043E\u0441\u0430 \u043D\u0430 "+n),e.onload=()=>{e.status>=400?o(e.response):l(e.response)},e.onerror=()=>{o(e.response)},e.send(r)})}function i(s,n){let r=document.querySelector("#alertblock"),t=document.createElement("div");n=="error"?t.setAttribute("class","alert alert-danger"):n=="success"?t.setAttribute("class","alert alert-success"):t.setAttribute("class","alert alert-warning"),t.innerText=s,r.appendChild(t),setTimeout(function(){r.removeChild(t)},6e3)}function a(s,n="\u0417\u0430\u0433\u0440\u0443\u0437\u043A\u0430",r){let t=document.querySelector("#"+s);if(r==!0){let l=document.createElement("div");t.classList.add("nonescroll"),l.setAttribute("style",`
            position: absolute;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            background-color: white;
            flex-direction:column;
            height: `+window.innerHeight+`px;
            align-items: center;
        `),l.setAttribute("id","loadblock");let o=document.createElement("div");o.setAttribute("class","spinner-border text-success"),l.appendChild(o);let e=document.createElement("p");e.innerText=n,l.appendChild(e),t.appendChild(l)}else{let l=document.querySelector("#loadblock");l&&(t.removeChild(l),t.classList.remove("nonescroll"))}}export{i as A,c as S,a as l};

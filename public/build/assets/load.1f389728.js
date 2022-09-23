function i(o,l,s=null){return new Promise((n,t)=>{const e=new XMLHttpRequest;e.open(o,l,!0),e.withCredentials=!0,e.setRequestHeader("X-CSRF-TOKEN",document.head.querySelector("[name=csrf-token]").content),e.readyState==1&&console.log("\u041E\u0442\u043F\u0440\u0430\u0432\u043A\u0430 \u0437\u0430\u043F\u0440\u043E\u0441\u0430 "+o+" \u0437\u0430\u043F\u0440\u043E\u0441\u0430 \u043D\u0430 "+l),e.onload=()=>{e.status>=400?t(e.response):n(e.response)},e.onerror=()=>{t(e.response)},e.send(s)})}function c(o,l="\u0417\u0430\u0433\u0440\u0443\u0437\u043A\u0430",s){let n=document.querySelector("#"+o);if(s==!0){let t=document.createElement("div");n.classList.add("nonescroll"),t.setAttribute("style",`
            position: absolute;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            background-color: white;
            flex-direction:column;
            height: `+window.innerHeight+`px;
            align-items: center;
        `),t.setAttribute("id","loadblock");let e=document.createElement("div");e.setAttribute("class","spinner-border text-success"),t.appendChild(e);let r=document.createElement("p");r.innerText=l,t.appendChild(r),n.appendChild(t)}else{let t=document.querySelector("#loadblock");t&&(n.removeChild(t),n.classList.remove("nonescroll"))}}export{i as S,c as l};

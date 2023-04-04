const form = document.querySelector(".typing-area");
const chatBox = document.querySelector(".chat-box");
const sendBtn = document.getElementById("btn");
let data = "";

    form.onsubmit = (e) => {
        e.preventDefault();
    };

    let conn = new WebSocket('ws://localhost:8080');
    conn.onopen = function(e) {
        console.log("Connection established!");
    };

    conn.onmessage = function(e) {
        let getData = JSON.parse(e.data);        
        let html = `<div class="chat incoming">
                        <!-- <img src="" alt=""> -->
                        <div class="details">
                            <p>${getData.msg}</p>
                            <div class="time">10:30</div>
                        </div>                    
                    </div>`;        
        data += html;
        chatBox.innerHTML=data;        
        scrollToBottom();
    };

    sendBtn.addEventListener('click', (e) => {
        console.log("clicked");
        let msg = document.querySelector(".input-msg").value;        
        let content = {
            msg: msg            
        };
        conn.send(JSON.stringify(content));
        let html = `<div class="chat outgoing">
                        <div class="details">
                            <p>${msg}</p>                        
                            <div class="time">10:30</div>
                        </div>                    
                    </div>`;        
        data += html;
        chatBox.innerHTML = data;
        scrollToBottom();
        document.querySelector(".input-msg").value = "";        
    });

    function scrollToBottom() {
        chatBox.scrollTop = chatBox.scrollHeight;    
    }
    
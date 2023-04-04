const form = document.querySelector(".update-form form");
const updateBtn = form.querySelector(".update");
const errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
    e.preventDefault();
}

updateBtn.onclick = () => {    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/profile_update.php");
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success") {
                    location.href = "users.php";                    
                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form);    
    xhr.send(formData);
    
    
}
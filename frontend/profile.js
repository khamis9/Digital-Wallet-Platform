window.onload = () => {
    fetch("./../backend/profile.php")
        .then(response => response.json())
        .then(data => {
            if(data.error){
                alert(data.error);
            }else{
                document.querySelector("input[name='name']").value = data.name;
                document.querySelector("input[name='email']").value = data.email;
                document.querySelector("input[name='address']").value = data.address;
                document.querySelector("input[name='phone']").value = data.phone;
            }
        })
        .catch(err => alert("failed to load profile"))
};
function uploadFile() {
    const fileInput = document.getElementById('fileInput');
    const progressBar = document.getElementById('progress-bar');
    const formData = new FormData();
    formData.append('file', fileInput.files[0]);

    const xhr = new XMLHttpRequest();

    xhr.upload.addEventListener('progress', function (event) {
        if (event.lengthComputable) {
            const percentComplete = (event.loaded / event.total) * 100;
            progressBar.style.width = percentComplete + '%';
        }
    });

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            // Handle the response from the server, if needed
            console.log(xhr.responseText);
        }
    };

    xhr.open('POST', 'your_upload_endpoint_url', true);
    xhr.send(formData);
}

function uploadFileTest(){
    // const fileinpt = document.getElementById('input-ppic');
    const pbar = document.getElementById('progress-bar-ppic');

    let fullName = document.getElementById('input-full-name');
    let NIC = document.getElementById('input-nic');
    let brd = document.getElementById('input-bid');
    let adders = document.getElementById('input-addr');
    let ppic = document.getElementById('input-ppict');
    let NICfpic = document.getElementById('input-nicfpic');
    let NICbpic = document.getElementById('input-nicbpic');
    let shopName = document.getElementById('input-shop-name');
    let shopEmail = document.getElementById('input-shop-email');
    let shopMobile = document.getElementById('input-shop-mobile');


    const formData = new FormData();
    formData.append('auth', 'true');

    formData.append('fullName', fullName.value);
    formData.append('NIC', NIC.value);
    formData.append('brd', brd.value);
    formData.append('adders', adders.value);

    formData.append('shopName', shopName.value);
    formData.append('shopEmail', shopEmail.value);
    formData.append('shopMobile', shopMobile.value);

    formData.append('ppic', ppic.files[0]);
    formData.append('NICfpic', NICfpic.files[0]);
    formData.append('NICbpic', NICbpic.files[0]);

    const r = new XMLHttpRequest();

    

    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;
            if(t == "upload success"){
                
                r.upload.addEventListener('progress', function(event){
                    if(event.lengthComputable){
                        const percentComplete = (event.loaded / event.total) * 100;
                        pbar.style.width = percentComplete + '%';
                    }
                });

                // window.location.href = "index.php";
            }else if(t == "upload failed"){
                // window.location.href = "fillSellerInfo.php";
                location.reload();
            }else if(t == "unsupported file type"){
                // window.location.href = "fillSellerInfo.php";
                location.reload();
            }else{
                console.log(t);
            }
        }
    };

    r.open("POST", "codes/pic_upload.php", true);
    r.send(formData);
}
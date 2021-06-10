document.addEventListener("DOMContentLoaded", function (event) {
        let myForm = document.getElementById("myForm");
        myForm.addEventListener("submit", sendForm);
});

async function sendForm(event){
        console.log("envio formulario");
        console.log(event);
        event.preventDefault();//No permitir el envio del formulario
        try {
                await app.initlogin();
        } catch (error) {
                console.log(`Error:  ${error}`);
        }
}

const app = {
        initlogin: async function () {
                const url = 'index.php?controller=Login&action=initLogin';
                const resp = await fetch(url, {
                        method: 'POST',
                        body: new FormData(myForm)
                } );
                const data = await resp.json();
                if (resp.status !== 200)
                        throw Error("message: "+ data.message);
                else{
                        //se muestra al usuario el mensaje de manera adecuada
                        location.href ="index.php?controller=Especialidad&action=index";
                        console.log(data.message);
                }
        },
}
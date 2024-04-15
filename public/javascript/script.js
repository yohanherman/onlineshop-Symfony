document.addEventListener('DOMContentLoaded',(e)=>{


const form=document.querySelector(".form")
// let inputquantitypanier=document.querySelector(".inputquantitypanier").value;
const btnIncrement=document.querySelectorAll('.btnIncrement');
const btndecrement=document.querySelectorAll('.btndecrement');



// form.addEventListener('submit',(e)=>{

//     e.preventDefault();

//     if(e.target.classList.contains('btnIncrement')){
//         console.log("c'est le bon")
//     }else{
//         console.log("rien trouve")
//     }

// })



function hidepassword(){
    const password=document.querySelector("#inputPassword")
    const eyeclosed=document.querySelector(".eyeclosed")
    
    eyeclosed.addEventListener('click',()=>{
        if(password.type ==="password"){
            password.type = "text"
            eyeclosed.src="/imagegeneral/open-eye.png"
          
        }else if(password.type ==="text"){
            password.type="password";
            eyeclosed.src="imagegeneral/closed-eye.png";
        } 
    })
}
hidepassword();


})






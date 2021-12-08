let container = document.querySelector(".container");
let btn = document.getElementById("spin");
let number = Math.ceil(Math.random() * 1000);

btn.onclick = function() {
    container.style.transform = "rotate(" + number + "deg)";
    number += Math.ceil(Math.random() * 1000);
    setTimeout(()=>{
        container.child.forEach((item)=>{
            let offset = item;
            console.log(offset);
        })
        console.log(container);
    },1500);
}




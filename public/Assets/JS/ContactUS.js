let elements = document.querySelectorAll('.input');
function focusFunc(){
    let parent = this.parentNode;
    parent.classList.add("focus");

}
function blurFunc(){
    let parent = this.parentNode;
    if(this.value==""){
    parent.classList.remove("focus");}

}
elements.forEach((inputs)=>{
    inputs.addEventListener('focus',focusFunc)
    inputs.addEventListener('blur',blurFunc)
})


const signinBtn=document.querySelector('.signinBtn')
const signupBtn=document.querySelector('.signupBtn')
const formBx=document.querySelector('.formBx')
const body=document.querySelector('body')
const signinForm=document.querySelector('.signinForm')
const signupForm=document.querySelector('.signupForm')

signupBtn.onclick = function(){
    formBx.classList.add('active')
    body.classList.add('active')
    signupForm.classList.remove('active')
    signupForm.classList.add('inactive')
    signinForm.classList.remove('inactive')
    signinForm.classList.add('active')
}
signinBtn.onclick = function(){
    formBx.classList.remove('active')
    body.classList.remove('active')
    signupForm.classList.remove('inactive')
    signupForm.classList.add('active')
    signinForm.classList.remove('active')
    signinForm.classList.add('inactive')
}

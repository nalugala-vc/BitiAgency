let bars=document.getElementById('iconClick');
let ex=document.getElementById('iconClickClose');

bars.addEventListener('click',function(){
    console.log('clicked')
    ex.style.display='block';
    bars.style.display='none';
});

ex.addEventListener('click',function(){
    bars.style.display='block';
    ex.style.display='none';
})

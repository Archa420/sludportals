document.addEventListener("DOMContentLoaded",function(){
    fetch('headernav.html')
    .then(Response => {
        if(!Response.ok){
            throw new Error('Header not found');
    }
    return Response.text();
    })
    .then(data => {
        document.querySelector('header').innerHTML = data;
    })
});


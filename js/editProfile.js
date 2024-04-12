const editbutton = document.getElementById('editProfile');
const form = document.getElementById('editProfileForm');
let count = 0 ;
editbutton.addEventListener('click', function() {
    count++;

    if( count%2 != 0) form.style.display = 'block';
    else form.style.display = 'none';
})
const navList = document.querySelectorAll('.admlist');

navList.forEach(list => {
    list.addEventListener('click',() => {
        document.querySelector('.active-tab')?.classList.remove('active-tab');
        list.classList.add('active-tab');
    })
})
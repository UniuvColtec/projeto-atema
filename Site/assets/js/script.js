window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        shrinkMenu();
    }
    else {
        expandMenu();
    }
}

function shrinkMenu() {
    document.getElementById('header-navbar').classList.replace('py-4', 'py-2')
}

function expandMenu() {
    document.getElementById('header-navbar').classList.replace('py-2', 'py-4')
}



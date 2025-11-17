window.onload = function() {
    window.onscroll = function() {
        //console.log(window.scrollY);
        if (window.scrollY>=32)
            document.querySelector('header div:last-child').classList.add('topFixed');
        else
            document.querySelector('header div:last-child').classList.remove('topFixed');

    };
}
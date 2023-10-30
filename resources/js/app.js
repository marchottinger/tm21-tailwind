// Navigation toggle
window.addEventListener('load', function () {

    // VARS LIST
    const burgerIcon = document.querySelector(".burger-menu");
    const burgerIconClose = document.querySelector(".burger-menu-close");
    //const burgerIconMobile = document.querySelector(".burger-menu-mobile");
    const overlayOffcanvas = document.querySelector(".overlay");
    const dropdownMenuHasChildren = document.querySelectorAll("li.menu-item.menu-item-has-children");
    const offcanvasMenu = document.getElementById("offcanvas-menu");
    const body = document.querySelector("body");


    let scrollpos = window.scrollY;
    const header = document.querySelector("header");
    const header_height = header.offsetHeight;

    window.addEventListener('scroll', function() { 
    scrollpos = window.scrollY;
        if (scrollpos >= header_height) {
            header.classList.add("scrolled");
        }else {
            header.classList.remove("scrolled");
        }
    })
    if (scrollpos >= header_height) {
        header.classList.add("scrolled");
    }else {
        header.classList.remove("scrolled");
    }

    // Trigger the search when press Enter – Offcanvas_search
    // if(buttonSubmitFacet){
    //     document.addEventListener("keyup", function(event) {
    //         if (event.code === "Enter") {
    //             console.log("Enter is pressed");
    //             // FWP.parse_facets();
    //             // FWP.set_hash();
    //             console.log(buttonSubmitFacet);
    //             buttonSubmitFacet.click();
    //             // $( ".fwp-submit" ).trigger( "click" );
    //         }
    //     });
    // }

    Array.from(dropdownMenuHasChildren).forEach(element => {

        var dropdownArrow = document.createElement('div');
        dropdownArrow.className = 'dropdown-arrow';
        element.appendChild(dropdownArrow);

        dropdownArrow.addEventListener('click', () => {
            if( element.classList.contains("open") ){
                element.classList.remove("open");    
            }else{
                element.classList.add("open");
            }
        });
    });





    // burger icon stuff
    if (burgerIcon) {
        burgerIcon.addEventListener("click", function () {
            burgerIcon.classList.toggle("close-mode");
            burgerIconClose.classList.toggle("close-mode");
            offcanvasMenu.classList.toggle("open");
            overlayOffcanvas.classList.toggle("open");
            body.classList.toggle("overflow-hidden");
            offcanvasMenu.classList.toggle("overflow-y-scroll");
        });
    }
    if (burgerIconClose) {
        burgerIconClose.addEventListener("click", function () {
            burgerIcon.classList.toggle("close-mode");
            burgerIconClose.classList.toggle("close-mode");
            offcanvasMenu.classList.toggle("open");
            overlayOffcanvas.classList.toggle("open");
            body.classList.toggle("overflow-hidden");
            offcanvasMenu.classList.toggle("overflow-y-scroll");
        });
    }



    // Close offcanvas pressing Escape
    document.addEventListener("keyup", function(event) {
        if (event.code === "Escape") {
            if (offcanvasMenu.classList.contains("open")){
                offcanvasMenu.classList.remove("open");
                overlayOffcanvas.classList.remove("open");
                body.classList.remove("overflow-hidden");
            }
        }
    });



    // Close Search-offcanvas clicking Close button
    // if(iconCloseOffcanvas){
    //     iconCloseOffcanvas.addEventListener("click", function () {
    //         if (offcanvasMenu.classList.contains("open")){
    //             offcanvasMenu.classList.remove("open");
    //         }
    //     });
    // }



    // Close Search-offcanvas clicking overlay
    if(overlayOffcanvas){
        overlayOffcanvas.addEventListener("click", function () {
            if (overlayOffcanvas.classList.contains("open") && offcanvasMenu.classList.contains("open")){
                offcanvasMenu.classList.remove("open");
                overlayOffcanvas.classList.remove("open");
                body.classList.remove("overflow-hidden");
            }
        });
    }

});

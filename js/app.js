(() => {
  // resources/js/app.js
  window.addEventListener("load", function() {
    const burgerIcon = document.querySelector(".burger-menu");
    const burgerIconClose = document.querySelector(".burger-menu-close");
    const overlayOffcanvas = document.querySelector(".overlay");
    const dropdownMenuHasChildren = document.querySelectorAll("li.menu-item.menu-item-has-children");
    const offcanvasMenu = document.getElementById("offcanvas-menu");
    const body = document.querySelector("body");
    let scrollpos = window.scrollY;
    const header = document.querySelector("header");
    const header_height = header.offsetHeight;
    window.addEventListener("scroll", function() {
      scrollpos = window.scrollY;
      if (scrollpos >= header_height) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
    if (scrollpos >= header_height) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
    Array.from(dropdownMenuHasChildren).forEach((element) => {
      var dropdownArrow = document.createElement("div");
      dropdownArrow.className = "dropdown-arrow";
      element.appendChild(dropdownArrow);
      dropdownArrow.addEventListener("click", () => {
        if (element.classList.contains("open")) {
          element.classList.remove("open");
        } else {
          element.classList.add("open");
        }
      });
    });
    if (burgerIcon) {
      burgerIcon.addEventListener("click", function() {
        burgerIcon.classList.toggle("close-mode");
        burgerIconClose.classList.toggle("close-mode");
        offcanvasMenu.classList.toggle("open");
        overlayOffcanvas.classList.toggle("open");
        body.classList.toggle("overflow-hidden");
        offcanvasMenu.classList.toggle("overflow-y-scroll");
      });
    }
    if (burgerIconClose) {
      burgerIconClose.addEventListener("click", function() {
        burgerIcon.classList.toggle("close-mode");
        burgerIconClose.classList.toggle("close-mode");
        offcanvasMenu.classList.toggle("open");
        overlayOffcanvas.classList.toggle("open");
        body.classList.toggle("overflow-hidden");
        offcanvasMenu.classList.toggle("overflow-y-scroll");
      });
    }
    document.addEventListener("keyup", function(event) {
      if (event.code === "Escape") {
        if (offcanvasMenu.classList.contains("open")) {
          offcanvasMenu.classList.remove("open");
          overlayOffcanvas.classList.remove("open");
          body.classList.remove("overflow-hidden");
        }
      }
    });
    if (overlayOffcanvas) {
      overlayOffcanvas.addEventListener("click", function() {
        if (overlayOffcanvas.classList.contains("open") && offcanvasMenu.classList.contains("open")) {
          offcanvasMenu.classList.remove("open");
          overlayOffcanvas.classList.remove("open");
          body.classList.remove("overflow-hidden");
        }
      });
    }
  });
})();

(() => {
  // resources/js/app.js
  window.addEventListener("load", function() {
    const burgerIcon = document.querySelector("header .burger-menu");
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
        offcanvasMenu.classList.add("open");
        overlayOffcanvas.classList.add("open");
        body.classList.add("overflow-hidden");
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

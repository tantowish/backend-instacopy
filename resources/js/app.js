import './bootstrap';
import 'flowbite';

document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll("#navbar");

    links.forEach((link) => {
        if (link.getAttribute("href") === window.location.pathname) {
            link.classList.add("active");
            link.classList.remove("hover:bg-gray-100")
        }
    });
});
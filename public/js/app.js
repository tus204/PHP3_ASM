import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// console.log("Hello world!");

const productPhoto = document.querySelectorAll(".product-photo");
const productModal = document.querySelector("#productModal");

productPhoto.forEach((element) => {
    element.addEventListener("click", function () {
        const url = this.dataset.url;
        getProductById(url);
    });
});

async function getProductById(url) {
    let response = await fetch(url);
    let result = await response.json();
    productModal.querySelector(".modal-title").textContent = result.name;
    productModal.querySelector(".modal-body").innerHTML = `
    <div class="row">
        <div class="col-md-4">
            <p>Price: ${result.price}</p>
            <img src="${assetURL}/${result.photo}" class="img-fluid"> </img>
        </div>
        <div class="col-md-8">
            ${result.description}
        </div>
    </div>
    `;
}
document.querySelectorAll('.change-ragle a').forEach(item => {
    item.addEventListener('mouseenter', (event) => {
        const direction = getHoverDirection(event);
        item.style.transform = `rotateY(${direction}deg)`; // Adjust degrees based on direction
    });

    item.addEventListener('mouseleave', () => {
        item.style.transform = 'rotateY(0deg)'; // Reset rotation
    });
});
document.addEventListener('mousemove', function(e) {
    var img = document.getElementById('rotate-image');
    var rect = img.getBoundingClientRect();
    var x = e.clientX - rect.left;
    var y = e.clientY - rect.top;
    var centerX = rect.width / 2;
    var centerY = rect.height / 2;
    var deltaX = x - centerX;
    var deltaY = y - centerY;
    var angleInDegrees = Math.atan2(deltaY, deltaX) * 180 / Math.PI;
    img.style.transform = 'rotate(' + angleInDegrees + 'deg)';
});
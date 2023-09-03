    // Get references to the main image and the carousel items
    const mainImage = document.querySelector(".carousel-item-main img");
    const carouselItems = document.querySelectorAll(".carousel-item:not(.carousel-item-main)");

    // Add an event listener for the Bootstrap Carousel slide event
    document.getElementById("carouselExampleControls").addEventListener("slide.bs.carousel", function (event) {
      const activeIndex = event.to;
      // Set the src attribute of the main image to the src of the active carousel item
      mainImage.src = carouselItems[activeIndex].querySelector("img").src;
    });
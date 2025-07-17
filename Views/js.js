function toggleMenu() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn') && !event.target.closest('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("content");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  let currentIndex = 0;

    window.addEventListener("load", () => {
      const images = document.querySelectorAll(".banner-image");
      const banner = document.querySelector(".banner");

      const totalImages = images.length;
      const imageWidth = 1100;

      banner.style.width = `${totalImages * imageWidth}px`;
    });

    function moveBanner(direction) {
      const images = document.querySelectorAll(".banner-image");
      const totalImages = images.length;
      const imageWidth = 1100;

      currentIndex += direction;

      if (currentIndex < 0) {
        currentIndex = totalImages - 1;
      } else if (currentIndex >= totalImages) {
        currentIndex = 0;
      }

      const newTransform = -currentIndex * imageWidth;
      document.querySelector(".banner").style.transform = `translateX(${newTransform}px)`;
    }
    const gallery = document.getElementById("gallery");
    const imageWidth = 283; 
    const visibleCount = 5;
    let startIndex = 0;
    
    function updateSlide() {
        const translateX = -startIndex * imageWidth;
        gallery.style.transform = `translateX(${translateX}px)`;
    }
    
    function nextImage() {
        if (startIndex + visibleCount < totalImages) {
            startIndex++;
        } else {
            startIndex = 0; // quay lại đầu
        }
        updateSlide();
    }
    
    function prevImage() {
        if (startIndex > 0) {
            startIndex--;
        } else {
            startIndex = totalImages - visibleCount;
        }
        updateSlide();
    }
    
    
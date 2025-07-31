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
      // Khởi động slider sau khi DOM load
// ...existing code...

// Slider "GIÁ SỐC HÔM NAY" - chỉ chạy một lần khi DOM ready
document.addEventListener("DOMContentLoaded", function () {
    const gallery = document.getElementById("gallery");
    if (!gallery) return;

    const items = gallery.querySelectorAll(".box3");
    const visibleCount = 5; // Số sản phẩm hiển thị mỗi lần (đổi thành 6 nếu muốn)
    const itemWidth = 220;   // Đúng với CSS min-width của .box3
    let groupIndex = 0;
    const totalItems = items.length;
    const maxGroup = Math.ceil(totalItems / visibleCount);

    function updateSlide() {
        const translateX = -groupIndex * visibleCount * itemWidth;
        gallery.style.transform = `translateX(${translateX}px)`;
        gallery.style.transition = "transform 0.5s ease";
    }

    window.nextGroup = function () {
        if (groupIndex < maxGroup - 1) {
            groupIndex++;
        } else {
            groupIndex = 0;
        }
        updateSlide();
    }

    window.prevGroup = function () {
        if (groupIndex > 0) {
            groupIndex--;
        } else {
            groupIndex = maxGroup - 1;
        }
        updateSlide();
    }

    updateSlide();
});

// ...existing code...

    }


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const headerImage = document.querySelector(".header-img");
        const imageUrls = ["images/baner.jpg", "images/baner2.jpg","images/baner3.jpg","images/banner4.jpg"];
        let currentIndex = 0;

        function changeImage() {
            headerImage.style.opacity = 0;
            currentIndex = (currentIndex + 1) % imageUrls.length;
            headerImage.src = imageUrls[currentIndex];
            setTimeout(function () {
                headerImage.style.opacity = 1;
            }, 100); // Đợi 100ms trước khi hiển thị hình ảnh mới
        }

        setInterval(changeImage, 12000); // Thay đổi ảnh sau mỗi 3 giây
    });
</script>

<div class="header">
    <img src="images/baner.jpg" alt="" class="header-img">
</div>

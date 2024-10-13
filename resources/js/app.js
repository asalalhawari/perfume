import './bootstrap';
// app.js

document.addEventListener("DOMContentLoaded", function () {
    // إضافة وظيفة عند تحميل الصفحة
    console.log("Page loaded successfully!");

    // إضافة وظيفة عند النقر على روابط التنقل
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            alert('Navigating to ' + this.innerText); // رسالة منبثقة عند النقر على رابط
        });
    });
});

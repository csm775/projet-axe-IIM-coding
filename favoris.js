document.addEventListener("DOMContentLoaded", () => {
    document.addEventListener("click", function(e) {
        const btn = e.target.closest('.favorite-btn');
        if (!btn) return;

        btn.classList.toggle('active');
        const icon = btn.querySelector('i');
        icon.classList.toggle('fa-regular');
        icon.classList.toggle('fa-solid');
    });
});

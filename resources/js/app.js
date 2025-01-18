import './bootstrap';
document.addEventListener("DOMContentLoaded", function () {
    const toggleButtons = document.querySelectorAll(".toggle-btn");

    toggleButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const id = this.getAttribute("data-id");
            const textContainer = document.getElementById(`text-${id}`);
            const shortText = textContainer.querySelector(".short-text");
            const fullText = textContainer.querySelector(".full-text");

            if (fullText.classList.contains("d-none")) {
                // Expand
                shortText.classList.add("d-none");
                fullText.classList.remove("d-none");
                this.textContent = "Tutup";
            } else {
                // Collapse
                fullText.classList.add("d-none");
                shortText.classList.remove("d-none");
                this.textContent = "Baca Selengkapnya";
            }
        });
    });
});

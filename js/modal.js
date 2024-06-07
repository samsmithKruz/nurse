let modal = document.querySelector("#modal"),
    closeModal = (i = null) => {
        i && i.preventDefault();
        modal.classList.remove("active");
    },
    confirmBtn = document.querySelectorAll(".confirmBtn"),
    loadModal = document.querySelectorAll(".loadModal");
loadModal?.forEach((el_) => {
    el_.addEventListener("click", ({ target }) => {
        modal.querySelector(".content").innerHTML =
            document.querySelector(target.dataset.elementsrc).outerHTML +
            '<span class="close material-icons">close</span>' ||
            "<section><p>Nothing to load</p></section>";
        modal?.classList.add("active");
    });
});
modal?.addEventListener("click", ({ target }) => {
    (!target.closest(".content") || target.closest(".close")) &&
        closeModal();
});
let loadConfirmBtn = (e)=>{
    e.preventDefault();
        modal.querySelector(".content").innerHTML = `
            <span class="close material-icons">close</span>
        <h3 style="font-size: 1.6rem; margin: 3rem 1rem 0;line-height: 1;">Are you sure?</h3>
        <div class="btns" style="display: flex; justify-content: center; padding: 0 2rem 2rem;">
            <a href="#" class="btn primary yes">Yes</a>
            <a href="#" class="btn red no">No</a>
        </div>
            `;
        let modalYes = document.querySelector("#modal .btn.yes"),
            modalNo = document.querySelector("#modal .btn.no");
        modalNo.onclick = (i) => closeModal(i);
        modalYes.setAttribute("href", e.target.getAttribute("href"))
        modal?.classList.add("active");
}
// confirmBtn?.forEach((el) => {
//     el.addEventListener("click", (e) => {
//         e.preventDefault();
//         modal.querySelector(".content").innerHTML = `
//             <span class="close material-icons">close</span>
//         <h3 style="font-size: 1.6rem; margin: 3rem 1rem 0;line-height: 1;">Are you sure?</h3>
//         <div class="btns" style="display: flex; justify-content: center; padding: 0 2rem 2rem;">
//             <a href="#" class="btn primary yes">Yes</a>
//             <a href="#" class="btn red no">No</a>
//         </div>
//             `;
//         let modalYes = document.querySelector("#modal .btn.yes"),
//             modalNo = document.querySelector("#modal .btn.no");
//         modalNo.onclick = (i) => closeModal(i);
//         modalYes.setAttribute("href", e.target.getAttribute("href"))
//         modal?.classList.add("active");
//     });
// });

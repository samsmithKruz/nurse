let question_container = document.querySelector(".questions");
let view;
let question = () => {
    let n = document.querySelectorAll(".questions .question").length;
    view = n;
    ++n;
    // l = n.length || 1;
    let c= `
        <div class="question ">
            <div class="input">
                <label for="">(${n} / <span class="total_questions"></span>)</label>
                <textarea onkeypress="this.value==this.value" required name="q${n}" rows="10" id="" placeholder="Enter question here"></textarea>
            </div>
            
            <div class="options">
                <h4 style="font-weight: 400; margin-top: 2rem;">Enter Options</h4>
                <div class="input" style="padding-top: .5rem;">
                <label for="">Enter Correct option</label>
                <input onkeypress="this.value==this.value" required type="text" name="correct_option_q${n}" placeholder="Correct option">
                </div>
                <h4 style="font-weight: 400; margin-top: 2rem;">Other Options</h4>
                <div class="input">
                <input onkeypress="this.value==this.value" required type="text" name="option1_q${n}" placeholder="options">
                </div>
                <div class="input">
                <input onkeypress="this.value==this.value" required type="text" name="option2_q${n}" placeholder="options">
                </div>
                <div class="input">
                <input onkeypress="this.value==this.value" required type="text" name="option3_q${n}" placeholder="options">
                </div>
            </div>
        </div>
    `;
    question_container.insertAdjacentHTML('beforeend',c)
    let i_;
    let total_questions = document.querySelectorAll(".questions .question");
    total_questions.forEach((el, i) => {
        el.querySelector(".total_questions").textContent = total_questions.length;
        (total_questions.length == i + 1) ?
            (el.classList.add("active"), (i_ = i)) :
            el.classList.remove("active");
    });
    paginate(i_);
}
let paginate = (i_) => {
    let a = Array.from(question_container.querySelectorAll(".question")).map((el, i) => {
        return `<a href="#" class="${i == i_ ? "active" : ""}" onclick="loadView(${i})">${++i}</a>`
    }).join("");
    document.querySelector(".paginations").innerHTML = a
}
let loadView = (i) => {
    if (i == 'prev') {
        view = view - 1 >= 0 ? view - 1 : view;
        return _view(view);
    }
    if (i == 'next') {
        let all_questions = document.querySelectorAll(".question").length - 1;
        if (view + 1 > all_questions) {
            question();
            _view(view)
            return 0;
        }
        view++
        return _view(view);
    }
    view = i;
    _view(i)
    
    // let i_;
    // Array.from(all_questions).map((el, i) => {
    //     if (el.classList.contains("active")) {
    //         i_ = i
    //     }
    // })
    // console.log(`i:${i},i_:${i_}, ${i_ - 1 >= 0}`)

}
let _view = (n) => {
    let a = document.querySelectorAll(".paginations a");
    question_container.querySelectorAll(".questions .question").forEach((el, i) => {
        a[i].classList.remove("active");
        el.classList.remove("active");
        if (i == n) {
            a[i].classList.add("active");
            el.classList.add("active");
        }
    })
}
question(1)
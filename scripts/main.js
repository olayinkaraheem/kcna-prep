function toggleQuestion(id) {
    const answers = document.getElementById("answer-" + id);
    const currentDisplay = window.getComputedStyle(answers).display;
    
    if (currentDisplay === "none") {
        answers.style.display = "block";
    } else {
        answers.style.display = "none";
    }
}
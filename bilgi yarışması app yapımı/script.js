const quizData = [
    {
        question: "HTML nedir?",
        options: ["HyperText Markup Language", "HyperTransfer Text Language"],
        correctAnswer: "HyperText Markup Language"
    },
    {
        question: "CSS hangi işe yarar?",
        options: ["Sayfa Yapısını Tanımlar", "Stil ve Düzenleme Sağlar"],
        correctAnswer: "Stil ve Düzenleme Sağlar"
    },
    {
        question: "JavaScript hangi tür bir dildir?",
        options: ["Programlama Dili", "Stil Dili"],
        correctAnswer: "Programlama Dili"
    },
    {
        question: "DOM nedir?",
        options: ["Document Object Model", "Database Object Model"],
        correctAnswer: "Document Object Model"
    }
];

let currentQuestion = 0;
let score = 0;

const questionText = document.getElementById("question-text");
const optionsContainer = document.getElementById("options-container");
const nextButton = document.getElementById("next-button");

function loadQuestion() {
    const currentQuizData = quizData[currentQuestion];
    questionText.innerText = currentQuizData.question;

    optionsContainer.innerHTML = "";
    currentQuizData.options.forEach((option, index) => {
        const optionElement = document.createElement("div");
        optionElement.classList.add("option");
        optionElement.innerText = option;
        optionElement.addEventListener("click", () => checkAnswer(index));
        optionsContainer.appendChild(optionElement);
    });
}

function checkAnswer(selectedIndex) {
    const currentQuizData = quizData[currentQuestion];
    const correctIndex = currentQuizData.options.indexOf(currentQuizData.correctAnswer);

    if (selectedIndex === correctIndex) {
        score++;
    }

    if (currentQuestion < quizData.length - 1) {
        currentQuestion++;
        loadQuestion();
    } else {
        showResult();
    }
}

function showResult() {
    questionText.innerText = `Puanınız: ${score} / ${quizData.length}`;
    optionsContainer.innerHTML = "";
    nextButton.style.display = "none";
}

nextButton.addEventListener("click", () => {
    if (currentQuestion < quizData.length - 1) {
        currentQuestion++;
        loadQuestion();
    } else {
        showResult();
    }
});

// İlk soruyu yükle
loadQuestion();

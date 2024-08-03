const quizData = [{
    question: "What is the sixth month of the year?",
    options: ["July", "August", "May", "April","June"],
    correctAnswer: "June"
  }, {
    question: "Fill in the missing number: 24, 31, 38, 45, 52, ?",
    options: ["54", "23", "65", "44"],
    correctAnswer: "59"
  }, {
    question: "Which of the dates below is the latest?",
    options: ["February 20, 1992", "June 14, 1929", "May 31, 1992", "June 6, 1929"],
    correctAnswer: "October 14, 1992"
  }, {
    question: "A clock lost 2 minutes and 20 seconds in 40 days. How many seconds did it lose per day?",
    options: ["1.5", "2", "2.5", "3","3.5"],
    correctAnswer: "3.5"
  }, {
    question: "A test has 30 questions. If Tom gets 70% correct, how many questions did Tom get wrong?",
    options: ["7", "8", "10", "6","9"],
    correctAnswer: "9"
  }];
const quizContainer = document.getElementById('quiz');
const resultContainer = document.getElementById('result');
let currentQuestion = 0;
let score = 0;

function displayQuestion() {
    const currentQuizData = quizData[currentQuestion];

    quizContainer.innerHTML = `
            <div class="question">${currentQuizData.question}</div>
            <div class="options">
                ${currentQuizData.options.map(option => `<div class="option" onclick="checkAnswer('${option}')">${option}</div>`).join('')}
            </div>
        `;
}

function checkAnswer(userAnswer) {
    const correctAnswer = quizData[currentQuestion].correctAnswer;

    if (userAnswer === correctAnswer) {
        score++;
    }

    currentQuestion++;

    if (currentQuestion < quizData.length) {
        displayQuestion();
    } else {
        displayResult();
    }
}

function displayResult() {
    resultContainer.innerHTML = `Your Score: ${score} out of ${quizData.length}`;
}

displayQuestion();
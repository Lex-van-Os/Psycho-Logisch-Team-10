import axios from "axios";

document.addEventListener("DOMContentLoaded", function () {
    var questionListItems = document.querySelectorAll(".questionListItem");

    questionListItems.forEach(function (element) {
        element.addEventListener("click", function () {
            let itemQuestionId = parseInt(element.getAttribute("questionId"));
            let itemAnswerId = parseInt(element.getAttribute("answerId"));

            displayReflectionAnswer(itemQuestionId, itemAnswerId);
        });
    });
});

async function getReflectionAnswer(questionId, answerId) {
    try {
        const response = await axios.get(
            `/reflectionTrajectory/getQuestionWithAnswer?questionId=${questionId}&answerId=${answerId}`
        );

        const results = response.data.answer;

        return results;
    } catch (error) {
        console.log("Failed sending request");
        console.log(error.response);
        throw error; // Rethrow the error to handle it in the calling function
    }
}

function displayShareButton() {
    shareBtn = document.getElementById("share-answer-btn");
}

async function displayReflectionAnswer(questionId, answerId) {
    let answerTitle = document.getElementById("selected-answer-title");
    let answerText = document.getElementById("selected-answer-text");
    let reflectionAnswer;

    if (answerId != 0) {
        reflectionAnswer = await getReflectionAnswer(questionId, answerId);
    } else {
        reflectionAnswer = null;
    }

    if (reflectionAnswer != null) {
        answerTitle.textContent = reflectionAnswer.questionTitle;
        answerText.textContent = reflectionAnswer.answerText;
    } else {
        console.log("No answer found");
    }
}

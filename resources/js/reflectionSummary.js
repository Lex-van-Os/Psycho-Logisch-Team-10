import axios from "axios";
import Toastify from "toastify-js";

document.getElementById("summary-btn").addEventListener("click", function () {
    generateReflectionSummary(getReflectionId());
});

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

function displaySuccessSummary() {
    Toastify({
        text: "Samenvatting wordt gegenereerd",
        duration: 3000,
        gravity: "top",
        position: "right",
        className: "success-toast",
        onClick: function () {}, // Callback after click
    }).showToast();
}

function displayErrorSummary() {
    Toastify({
        text: "Er is iets fout gegaan met het genereren van de samenvatting",
        duration: 3000,
        gravity: "top",
        position: "right",
        className: "fail-toast",
        onClick: function () {}, // Callback after click
    }).showToast();
}

function getReflectionId() {
    let reflectionId = document.getElementById("reflection-id").value;

    return reflectionId;
}

async function generateReflectionSummary(reflectionId) {
    try {
        console.log("Foo");
        displaySuccessSummary();

        const response = await axios.post(
            `/insights/generateReflectionSummary?`,
            { reflectionId }
        );

        console.log(response);

        // 'fire and forget' functionaliteit werkt niet zonder een framework als RabbitMQ. Vandaar standaard succes message
        // if (response.data >= 200 && response.data < 300) {
        //     displaySuccessSummary();
        // } else {
        //     console.error('Request failed with status code:', response.data);
        //     displayErrorSummary();
        // }
    } catch (error) {
        console.log("Failed sending request");
        console.log(error.response);
        displayErrorSummary();
        throw error; // Rethrow the error to handle it in the calling function
    }
}

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

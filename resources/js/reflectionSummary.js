import axios from "axios";
import { displayErrorToast, displaySuccessToast } from "./shared/toaster";

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

function getReflectionId() {
    let reflectionId = document.getElementById("reflection-id").value;

    return reflectionId;
}

async function generateReflectionSummary(reflectionId) {
    try {
        console.log("Foo");
        displaySuccessToast("Samenvatting wordt gegenereerd");

        const response = await axios.post(
            `/insights/generateReflectionSummary?`,
            { reflectionId }
        );

        console.log(response);

        // 'fire and forget' functionaliteit werkt niet zonder een framework als RabbitMQ. Vandaar standaard succes message
        // if (response.data >= 200 && response.data < 300) {
        //     displaySuccessToast("Samenvatting wordt gegenereerd");
        // } else {
        //     console.error('Request failed with status code:', response.data);
        //     displayErrorToast("Er is iets fout gegaan met het genereren van de samenvatting");
        // }
    } catch (error) {
        console.log("Failed sending request");
        console.log(error.response);
        displayErrorToast("Er is iets fout gegaan met het genereren van de samenvatting");
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

from models.question_answer import QuestionAnswer

class QuestionFormatter():

    def __init__(self) -> None:
        pass

    def format_question_data(self, data):
        formatted_items = []

        for item in data:
            question_answer_object = self.format_single_question_object(item)
            formatted_items.append(question_answer_object)

        return formatted_items
    
    def format_single_question_object(self, data):
        question_answer_object = QuestionAnswer(question=data['questionTitle'], answer=data['answerText'])

        return question_answer_object
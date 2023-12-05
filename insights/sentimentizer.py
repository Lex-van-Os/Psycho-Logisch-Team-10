from transformers import pipeline

class AnswerSentimentizer():
    def __init__(self):
        pass

    def get_answer_sentiment(self, answer):
        print("Getting answer sentiment")
        sentimentizer = pipeline('sentiment-analysis')
        sentiment = sentimentizer(answer)

        distilled_student_sentiment_classifier = pipeline(
            model="lxyuan/distilbert-base-multilingual-cased-sentiments-student", 
            return_all_scores=True
        )

        # Sentiment is calculated for English text
        answer_sentiment = distilled_student_sentiment_classifier("I love this movie and i would watch it again and again!")

        print(answer_sentiment)
        return answer_sentiment


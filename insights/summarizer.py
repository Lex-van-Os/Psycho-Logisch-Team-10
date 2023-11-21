from transformers import pipeline

class QuestionSummarizer():
    def __init__(self, chunk_limit, summary_min_length, summary_max_length) -> None:
        self.chunk_limit = chunk_limit
        self.reflection_summary_min_length = summary_min_length
        self.reflection_summary_max_length = summary_max_length

    def summarize_answers(self, question_answers):
        print("Summarizing answers")
        print()

        joined_answers = self.join_input_reflections(question_answers)
        tokenized_answers = self.add_chunkenizer_tokens(joined_answers)
        answer_chunks = self.chunkenize_text(tokenized_answers)
        summarized_chunks = self.summarize_chunked_answers(answer_chunks)
        joined_summary = self.join_summarized_reflections(summarized_chunks)

        return joined_summary
    
    def chunkenize_text(self, text):
        text_sentences = text.split('<eos>')

        current_chunk = 0 
        chunked_text = []

        for sentence in text_sentences:
            # Case: Chunk added: if chunk not at limit, extend it. 
            if len(chunked_text) == current_chunk + 1: 
                if len(chunked_text[current_chunk]) + len(sentence.split(' ')) <= self.chunk_limit:
                    chunked_text[current_chunk].extend(sentence.split(' '))
                else:
                    current_chunk += 1
                    chunked_text.append(sentence.split(' '))
            # Case: Append the looped sentence as a chunk to the list of chunks
            else:
                chunked_text.append(sentence.split(' '))

        for chunk_id in range(len(chunked_text)):
            chunked_text[chunk_id] = ' '.join(chunked_text[chunk_id])
        pass

        return chunked_text

    def add_chunkenizer_tokens(self, text):
        text = text.replace('.', '.<eos>')
        text = text.replace('?', '?<eos>')
        text = text.replace('!', '!<eos>')
        
        return text

    def join_input_reflections(self, reflections):
        return_text = ""

        for reflection in reflections:
            return_text += reflection.answer
        
        return return_text

    def join_summarized_reflections(self, summarized_chunks):
        print("Joining summarized reflections")
        print()

        joined_summaries = ' '.join([summ['summary_text'] for summ in summarized_chunks])
        
        return joined_summaries

    def summarize_chunked_answers(self, chunked_answers):
        summarizer = pipeline('summarization')

        summarizer_result = summarizer(chunked_answers, min_length=self.reflection_summary_min_length, max_length=self.reflection_summary_max_length, do_sample=False)

        return summarizer_result

    
    def summarize_answer(self, answer):
        summarizer = pipeline('summarization')
        summary = summarizer(answer)
        summarized_text = summary[0]['summary_text']

        return summarized_text

    def format_data(self, unformatted_question_answers):
        formatted_items = []

        for key in unformatted_question_answers:
            question_answer_object = QuestionAnswer(question=unformatted_question_answers[key]['title'], answer=unformatted_question_answers[key]['value'])
            formatted_items.append(question_answer_object)

        return formatted_items
    

class QuestionAnswer():
    def __init__(self, question, answer) -> None:
        self.question = question
        self.answer = answer
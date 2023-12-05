from transformers import MBartForConditionalGeneration, MBart50TokenizerFast

class TextTranslator():
    model = MBartForConditionalGeneration.from_pretrained("facebook/mbart-large-50-many-to-many-mmt")
    tokenizer = MBart50TokenizerFast.from_pretrained("facebook/mbart-large-50-many-to-many-mmt")

    def __init__(self):
        pass

    def translate_text(self, text, language_from, language_to):
        print("Translating text")

        self.tokenizer.src_lang = language_from
        encoded_original = self.tokenizer(text, return_tensors="pt")
        
        generated_tokens = self.model.generate(
            **encoded_original,
            forced_bos_token_id = self.tokenizer.lang_code_to_id[language_to]
        )
        
        translation_text = self.tokenizer.batch_decode(generated_tokens, skip_special_tokens=True)
        print(translation_text)

        return translation_text

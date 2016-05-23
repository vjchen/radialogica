def create_anagrams(word):

    #Check length of word.
    if len(word) < 2:
        yield word
    else:
        for i, character in enumerate(word):
            if not character in word[:i]: #make sure no duplication
                for j in create_anagrams(word[:i]+word[i+1:]): #recursively switch outer characters to create anagrams
                    yield j+character #use generator to save memory.


def find_anagrams(string, word):

    is_anagram = 0

    for anagram in create_anagrams(word):
        if anagram in string:
            is_anagram += 1

    print is_anagram

if __name__ == "__main__":

    find_anagrams('asdfasdfwqefqwefqw', 'asdfqwfqfq')


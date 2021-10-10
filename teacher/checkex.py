from flask import Flask , jsonify, render_template,request,redirect,url_for
import pymysql
from pythainlp import sent_tokenize, word_tokenize
import numpy as np
from sklearn.metrics.pairwise import cosine_similarity
from pythainlp import word_tokenize, Tokenizer
from pythainlp.corpus.common import thai_words
from typing import Iterable, List, Union
import os
import urllib.parse
import json


class Trie:
    class Node(object):
        __slots__ = "end", "children"

        def __init__(self):
            self.end = False
            self.children = {}

    def __init__(self, words: Iterable[str]):
        self.words = set(words)
        self.root = Trie.Node()

        for word in words:
            self.add(word)

    def add(self, word: str) -> None:
        """
        Add a word to the trie.
        Spaces in front of and following the word will be removed.

        :param str text: a word
        """
        word = word.strip()
        self.words.add(word)
        cur = self.root
        for ch in word:
            child = cur.children.get(ch)
            if not child:
                child = Trie.Node()
                cur.children[ch] = child
            cur = child
        cur.end = True


    def remove(self, word: str) -> None:
        """
        Remove a word from the trie.
        If the word is not found, do nothing.

        :param str text: a word
        """
        # remove from set first
        if word not in self.words:
            return
        self.words.remove(word)
        # then remove from nodes
        parent = self.root
        data = []  # track path to leaf
        for ch in word:
            child = parent.children[ch]
            data.append((parent, child, ch))
            parent = child
        # remove the last one
        child.end = False
        # prune up the tree
        for parent, child, ch in reversed(data):
            if child.end or child.children:
                break
            del parent.children[ch]   # remove from parent dict


    def prefixes(self, text: str) -> List[str]:
        """
        List all possible words from first sequence of characters in a word.

        :param str text: a word
        :return: a list of possible words
        :rtype: List[str]
        """
        res = []
        cur = self.root
        for i, ch in enumerate(text):
            node = cur.children.get(ch)
            if not node:
                break
            if node.end:
                res.append(text[: i + 1])
            cur = node
        return res


    def __contains__(self, key: str) -> bool:
        return key in self.words

    def __iter__(self) -> Iterable[str]:
        yield from self.words

    def __len__(self) -> int:
        return len(self.words)



def dict_trie(dict_source: Union[str, Iterable[str], Trie]) -> Trie:
    """
    Create a dictionary trie from a file or an iterable.

    :param str|Iterable[str]|pythainlp.util.Trie dict_source: a path to
        dictionary file or a list of words or a pythainlp.util.Trie object
    :return: a trie object
    :rtype: pythainlp.util.Trie
    """
    trie = None

    if isinstance(dict_source, str) and len(dict_source) > 0:
        # dict_source is a path to dictionary text file
        with open(dict_source, "r", encoding="utf8") as f:
            _vocabs = f.read().splitlines()
            trie = Trie(_vocabs)
    elif isinstance(dict_source, Iterable) and not isinstance(
        dict_source, str
    ):
        # Note: Since Trie and str are both Iterable,
        # so the Iterable check should be here, at the very end,
        # because it has less specificality
        trie = Trie(dict_source)
    else:
        raise TypeError(
            "Type of dict_source must be pythainlp.util.Trie, "
            "or Iterable[str], or non-empty str (path to source file)"
        )

    return trie

app = Flask(__name__)
conn=pymysql.connect('localhost','root','','onlineeducations')

@app.route('/check')
def chack():
        d={}
        d['std_id']=str(request.args['std_id'])
        d['exam']=str(request.args['exam'])
        # return 'Hello'+d['std_id']
        with conn.cursor () as cur:
                cur.execute("""SELECT examAddwords_question,examAddwords_answer FROM examaddwords WHERE examAddwords_exampapers_id='%s'"""%(d['exam']))
                rows=cur.fetchall()
        with conn.cursor () as std:
                std.execute("""SELECT examans_std_answer
                FROM examans_std 
                INNER JOIN student ON examans_std.examans_std_std=student.student_id 
                INNER JOIN examaddwords ON examans_std.examans_std_examaddwords=examaddwords.examAddwords_id 
                INNER JOIN exampapers ON examaddwords.examAddwords_exampapers_id=exampapers.exampapers_id 
                WHERE student.student_id='%s' AND exampapers.exampapers_id='%s'"""%(d['std_id'],d['exam']))
                row=std.fetchall()
        with conn.cursor () as cutlac:
                cutlac.execute("""SELECT examAddwords_answer FROM examaddwords WHERE examAddwords_exampapers_id='%s'"""%(d['exam']))
                lac=cutlac.fetchall()
        with conn.cursor () as cutstd:
                cutstd.execute("""SELECT examans_std.examans_std_answer
                FROM examans_std 
                INNER JOIN student ON examans_std.examans_std_std=student.student_id 
                INNER JOIN examaddwords ON examans_std.examans_std_examaddwords=examaddwords.examAddwords_id 
                INNER JOIN exampapers ON examaddwords.examAddwords_exampapers_id=exampapers.exampapers_id 
                WHERE student.student_id='%s' AND exampapers.exampapers_id='%s'"""%(d['std_id'],d['exam']))
                stdd=cutstd.fetchall()
        with conn.cursor () as keyword:
                keyword.execute("""SELECT examAddwords_keyword FROM examaddwords WHERE examAddwords_exampapers_id='%s'"""%(d['exam']))
                keyword=keyword.fetchall()
        with conn.cursor () as scor:
                scor.execute("""SELECT examAddwords_fullscore FROM examaddwords WHERE examAddwords_exampapers_id='%s'"""%(d['exam']))
                scor=scor.fetchall()
        keyword=np.array(keyword)
        lac = np.array(lac)
        # print(lac)
        print("***********************************************")
        stdd = np.array(stdd) 
        # print(stdd)
        print("***********************************************")
        scorer = np.array(scor)
        all=[]
        cosin=[]
        cosinn=[]
        score=[]
        scores=[]
        custom_words_list = set(thai_words())
        for i in range(len(keyword)):
                        word=str(lac[i][0])
                        ans=str(stdd[i][0])
                        keywords=str(keyword[i][0])
                        keywordd = keywords.split(",")
                        for roow in keywordd:
                                # print(roow)
                                custom_words_list.add(roow)
                
        trie = dict_trie(dict_source=custom_words_list)
        
        for i in range(len(lac)):

                word=str(lac[i][0])
                ans=str(stdd[i][0])
                keywords=str(keyword[i][0])
                keywordd = keywords.split(",")

                aa=word_tokenize(word, engine="longest", custom_dict=trie)
                bb=word_tokenize(ans, engine="longest", custom_dict=trie)
                # print(aa,"\n",bb)
                cc=[]
                key=[]
                a1=list()
                b1=list()
                aa1=list()
                bb1=list()
####################################################################################Key Word
                for n in keywordd:
                        if n not in key:
                                key.append(n)
                for i in key: 
                        result = 0
                        ans = 0
                        for num in keywordd:
                                if i == num :
                                        result +=1
                        aa1.append(result)
                        
                        for num in bb:
                                if i == num :
                                        ans +=1
                        bb1.append(ans)
                aa1=np.array(aa1)
                bb1=np.array(bb1)
                aa1 = aa1.reshape(1,-1)
                bb1 = bb1.reshape(1,-1)
                cosinee = cosine_similarity(aa1,bb1)
                cosinn.append(round(cosinee[0][0]*100,3))
                print(cosinee)
########################################################################################
                for w in aa:
                        if w not in cc:
                                cc.append(w)
                for i in cc: 
                        result = 0
                        ans = 0
                        for num in aa:
                                if i == num :
                                        result +=1
                        a1.append(result)
                        
                        for num in bb:
                                if i == num :
                                        ans +=1
                        b1.append(ans)
                        
                a1=np.array(a1)
                b1=np.array(b1)
                a1 = a1.reshape(1,-1)
                b1 = b1.reshape(1,-1)
                cosine = cosine_similarity(a1,b1)
                cosin.append(round(cosine[0][0],3))
        
              
        for i in range(len(scorer)):
                ii=int(scorer[i])
                roww=int(cosinn[i])
                # print(roww)
                # scoree=int(all)
                if roww >=70 and roww <= 100:
                        score=1/ii
                elif roww >=60 and roww <=69:
                        score=0.5/ii
                elif roww >=50 and roww <=59:
                        score=0.5/ii
                elif roww >=40 and roww <=49:
                        score=0.4/ii
                elif roww >=30 and roww <=39:
                        score=0.3/ii
                elif roww >=20 and roww <=29:
                        score=0.2/ii
                elif roww >=10 and roww <=19:
                        score=0.1/ii
                else:
                        score=0/ii
                scores.append(str(score))
                        
        print(scores) 
        # return render_template('check.php',datas=rows,data=row,cut=cosin,word=keyword,keyword=cosinn,sco=scores)
        # rows=np.array(rows)
        # datas=[]
        # datas.append(rows)

        # datas=rows
        # datas.append(rows)
        # print(datas)
        # data.append(cosin)
        # rows=str(rows)
        # rows=np.array(rows,dtype=np.unicode)
        # print(rows)
        # rows=rows.tolist()
        jsonString = json.dumps(rows,ensure_ascii=False).encode('utf8')
        
        # return rows
        # x={"rows":rows}
        # return jsonString.decode()
        # return jsonString
        return str(rows)+";"+str(row)+";"+str(cosin)+";"+str(keyword)+";"+str(scores)
        # return "Hello"
if __name__ == '__main__':
   app.run(host="0.0.0.0", port=5000, debug=True)
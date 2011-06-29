# -*- coding: utf-8 -*-
import re, string

f = open("text.txt")
text = string.join(f.readlines(), "")
f.close()

# Я говорил про строку целиком, а не про слова в строке, но так тоже пойдет
expr = re.compile(r"(\w)[\S]*\1")
result = re.finditer(expr, text)
for match in result :
  print match.group()
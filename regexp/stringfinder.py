import re, string

f = open("text.txt")
text = string.join(f.readlines(), "")
f.close()

expr = re.compile(r"(\w)[\S]*\1")
result = re.finditer(expr, text)
for match in result :
  print match.group()
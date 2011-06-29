import urllib, re

forum = "http://127.0.0.1/~alexk/educational/posts/"
link = "http://www.caselogic.com/"
page = urllib.urlopen(link)
source = page.read()
print "<-----------source---------------->"
print source
print "<--------------------------------->\n\n"

print "<--------------links-------------->"
expr = re.compile(r"<a .*href=\"(?P<href>.+)\".*>(?P<text>.+)</a>")
result = re.finditer(expr, source)
for match in result :
  print match.group("text","href")


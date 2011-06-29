# -*- coding: utf-8 -*-
import urllib, re

# forum = "http://127.0.0.1/~alexk/educational/posts/"
link = "http://www.caselogic.com"
# link = "http://yandex.ru/yandsearch?text=ololo"
page = urllib.urlopen(link)
source = page.read()

print "<--------------links-------------->"
# Во многих ссылках href выводится неправильный, например
# ('CD & DVD', 'http://www.caselogic.com/index.cfm?sub_site_id=1" id="btn-cddvd" class="menuItem')
# надо сделать плюс не жадным, а ленивым, тогда он заватит не максимальную нужную строку, а минимальную
expr = re.compile(r"<a .*href=\"(?P<href>.+?)\".*>(?P<text>.+)</a>")
result = re.finditer(expr, source)
for match in result :
  print match.group("text","href")


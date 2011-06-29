# -*- coding: utf-8 -*-
import re

email = raw_input('Please, input email (example.word@host-host.com): ')

# Можно же точку прям в символьный клас засунуть
# [a-z\d]+[\.]?[a-z\d]+ === [a-z\d.]+
# [^.] -- первый символ не точка
# TLD бывают .travel .info
if re.match("^[^.][a-z\d\.]+\@[^-][a-z\d-\.]+\.[a-z]{2,6}$", email):
  print 'Email is valid'
else:
  print 'Something is wrong'
import re

email = raw_input('Please, input email (example.word@host-host.com): ')

if re.match("^[a-z\d]+[\.]?[a-z\d]+\@[a-z\d]+[\-]?[a-z\d]+\.[a-z]{2,3}$", email):
  print 'Email is valid'
else:
  print 'Something is wrong'
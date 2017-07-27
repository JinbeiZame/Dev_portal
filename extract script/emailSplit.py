#! /usr/bin/env python3
# -*- coding: utf-8 -*-

import sys

file = sys.argv[1]
strForm = ""
strTo = ""
strCc = "-"
strSubject = ""
with open(file,'r') as f:
	for findForm in f:
		str2 = findForm.split(' ')
		strForm = str2[1]
		break
	f.seek(0)
	for findTo in f:
		str3 = findTo.split(' ')
		if 'X-Original-To' in findTo:
			strTo=str3[1].split('\n')
			strTo=strTo[0]
			break
	f.seek(0)
	for findCc in f:
		str4 = findCc.split(' ')
		if 'CC:' in findCc:
			strCc=str4[1]
			break
	f.seek(0)
	for findSubject in f:
		str5 = findSubject.split('\n')
		if 'Subject: ' in findSubject:
			strSubject = str5[0].split(':')
			strSubject = strSubject[1]
			break
	f.seek(0)
	print("To: " + strTo)
	print("CC: " + strCc)
	print("Subject: " + strSubject)
	print("Body: ")

	for findBody in f:
		if 'X-Mailer:' in findBody:
			break
		if 'X-MS-Exchange-Transport-CrossTenantHeadersStamped:' in findBody:
    			break
	for line in f:
		str = line.split('\n')
		if line == '\n':
			continue
		if '--A' in line:
			print("----- NEW -----")
			print(str[0])
		if '--_' in line:
			print("----- NEW -----")
			print(str[0])
		else:
			print(str[0])


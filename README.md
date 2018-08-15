# forex-tools
forex tools
chart use html5 canvas (not perfect)
custom indicators function (under heavy construction)
custom expert advisor(EA) (under heavy construction)
and backtesting tools (under heavy construction).

i hope this work will be usefull
learning how to build software
forex market analysis
create custom forex indocators
create custom EA (expert advisor)
forex EA or strategy tester

===================================================================================================
v 0.0.1
use client server model.

client currently use pure javascript and HTML5
1. display chart (using HTML5 canvas)
2. display custom indicators
3. run EA and EA tester

server currently use PHP and Sqlite3
1. data provider, tick data or with spesific timeframe.

# HOW TO USE?
i use php-cli on lubuntu xenial.
just install php and sqlite
sudo apt install php php-sqlite3 sqlite3

download and extract /src.
open terminal and change working dir to /src
cd path/to/src
php -S localhost:65531 fx1.php

open with browser, localhost:65531

data currently missing, beacause size is huge MB.

format sqlite data, create table t1(a1,a2,a3). a1 is timeframe YYYYMMDD HH:MM:SS.SSS ex 20180101 00:00:00.100, a2 is bid price and a3 is ask price ex 1.12345

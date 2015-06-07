#!/bin/bash

set -e #break on error
set -x #echo on

COOKIE='PHPSESSID=7e7qo19kvbtq23cagrrch4onb0; bb_lastvisit=1427720680; bb_lastactivity=0; bb_userid=2553946; bb_password=f3cdb77d8cbb96c17625f84889544d9e; vbsso_timeout=31536000; bb_sessionhash=bfe46bd07ccb3dc46b7b2c78a3dc2cb5; vbsso_muid=2553946; wordpress_logged_in_1e13598bcc80ac12d7baaeda710975e0=eladkarako%7C1428930747%7C395a6c427058b2ff93c032416a635bee; path=/; domain=www.sammobile.com; Secure'
URL='http://dl.sammobile.com/OlFZQzErIS0nISRBLCZQREQnMTYsMTspUjE2PClGEx0EUlNHWkNCUQ../N900XXUEBOA6_N900OXEEBOA7_SKZ.zip'
REFERER='http://www.sammobile.com/firmwares/confirm/43069/N900XXUEBOA6_N900OXEEBOA7_SKZ/'
USERAGENT='Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.3; MS-RTC LM 8; .NET4.0C; .NET4.0E)'

curl --insecure --referer "$REFERER" --cookie "$COOKIE" --user-agent "$USERAGENT" --location-trusted --remote-name $URL
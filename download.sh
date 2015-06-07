#!/bin/bash

set -e #break on error
set -x #echo on

COOKIE='bb_lastvisit=1433633229; bb_lastactivity=0; bb_userid=2553946; bb_password=f3cdb77d8cbb96c17625f84889544d9e; bb_sessionhash=1e51daac5cf063bb5ed8efd532817674; vbsso_muid=2553946; wordpress_logged_in_1e13598bcc80ac12d7baaeda710975e0=eladkarako%%7C1434842841%%7Ce8362d1ab1a973548e845e4b4681fc24; __utmt=1; __utma=111529478.178504164.1433633254.1433633254.1433633254.1; __utmb=111529478.2.10.1433633254; __utmc=111529478; __utmz=111529478.1433633254.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)'
URL='http://dl.sammobile.com/OlFZQzErIS0nISFGLCZQREQnLTcsMTsqVzEsOSZGEx0EUlNHXkNFXA../N900XXUEBOD1_N900ODDEBOB2_INU.zip'
REFERER='http://www.sammobile.com/firmwares/confirm/43069/N900XXUEBOA6_N900OXEEBOA7_SKZ/'
USERAGENT='User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2408.0 Safari/537.36'

curl --insecure --referer "$REFERER" --cookie "$COOKIE" --user-agent "$USERAGENT" --location-trusted --remote-name $URL
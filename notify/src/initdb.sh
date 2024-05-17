#!/bin/bash
#if data/yt-notify.db doesn't exist, create it
if ! [ -f data/yt-notify.db ]; then
    echo "creating database"
    echo $PWD
    sqlite3 data/yt-notify.db < init.sql
fi


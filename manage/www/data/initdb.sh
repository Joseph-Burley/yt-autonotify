#!/bin/bash
#if yt-notify.db doesn't exist, create it
if ! [ -f yt-notify.db ]; then
    echo "creating database"
    echo $PWD
    sqlite3 yt-notify.db < init.sql
fi


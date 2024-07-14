# Start from a base Ubuntu image
FROM debian:latest

RUN apt update && apt upgrade -y
RUN apt install software-properties-common python3-launchpadlib -y
RUN apt-add-repository ppa:tomtomtom/yt-dlp && apt update && apt install -y yt-dlp sqlite3 jq cron curl

# copy src files
COPY src/ /src

WORKDIR /src
RUN mkdir -p /src/data

# create volume and mount it on /src/data
VOLUME /src/data

# create link in /bin
# is this needed?
RUN ln -s /src/notify /bin/yt-notify

RUN cat crontab
# Add crontab file in the cron directory
RUN cp crontab /etc/cron.d/simple-cron

# Give execution rights on the cron job
RUN chmod 0644 /etc/cron.d/simple-cron

# Apply cron job
RUN crontab /etc/cron.d/simple-cron

# Create the log file to be able to run tail
RUN touch /var/log/cron.log

# pull discord.sh from github
RUN git clone https://github.com/fieu/discord.sh.git

# run init
RUN chmod +x /src/initdb.sh
#ENTRYPOINT ["/src/initdb.sh"]

# Run the command on container startup
CMD /src/initdb.sh && cron && tail -f /var/log/cron.log

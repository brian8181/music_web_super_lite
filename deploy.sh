#!/bin/bash

# rm -rf /var/www/html/music_web_super_lite
rsync -r -t -v --progress -s /home/brian/src/music_web_super_lite /var/www/html/

chmod -R 775 /var/www/html/music_web_super_lite/

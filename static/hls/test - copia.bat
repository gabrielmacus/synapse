ffmpeg -f dshow -i audio="@device_cm_{33D9A762-90C8-11D0-BD43-00A0C911CE86}\wave_{3830DE51-E911-436C-9A50-EA2426495EE2}" -vsync 1 -i "rtsp://192.168.1.114:554/user=admin&password=&channel=1&stream=0.sdp" -s 854x480 -ac 1 -filter:a alimiter=limit=.1 -codec:a aac  -ac 1 -filter:a alimiter=limit=.3 -codec:a aac -cutoff 8000 -b:a 32k -vcodec copy -r 14 -c:v libx264 -crf 37 -x264opts scenecut=-1:b-pyramid:psy-rd=0.5:dct-decimate:b-bias=100:direct=auto:no-psnr:no-ssim:no-chroma-me:open-gop=1 -preset superfast -profile:v high -hls_time 10 -hls_list_size 5 -hls_wrap 10 -start_number 1 -f hls out.m3u8
pause
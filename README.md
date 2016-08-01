## very_short_url_shortener
Someone asked if YOURLS is good.<br>
Yeah it is. But it weight 3.7mb and is made of 482 files, which should be a pain to maintain.<br>
So I maked this as a start.<br>
It can shorten links.<br>
It can redirect if links exist.<br>
A message is shown if no link are found.<br>
It create files in the same folder, so the folder is the database.<br>
Just by happening your link to the url like this:<br>
### ?to_short=http://A_very_LOONG_link<br>
LIke YOURLS do. But in 2.5Ko

In option, you can name your link, it can include space or special chars.<br>
Any non-url content will be converted in a file download.<br>
**A bookmarklet for direct access will be auto-generated** <br>

Have a try: http://ponyhacks.com/open/i/ <br>
As example: (You are going back here): <br>
http://ponyhacks.com/open/i/?to_short=https://github.com/webdev23/very_short_url_shortener

####Installation: 
#### *Give write access to the index.php file and his containing folder.*

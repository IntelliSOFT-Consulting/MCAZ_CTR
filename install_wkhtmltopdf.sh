WKHTMLTOX_X64=https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox_0.12.6-1.stretch_amd64.deb

apt-get install wget git python-pip gdebi -y
_url=$WKHTMLTOX_X64
 
wget $_url
gdebi --n `basename $_url`
ln -s /usr/local/bin/wkhtmltopdf /usr/bin
ln -s /usr/local/bin/wkhtmltoimage /usr/bin 
sudo apt-get install pip -y
sudo apt-get install ffmpeg -y
sudo pip install pytz
sudo apt-get install apache2 -y
sudo apt-get install php7.4 libapache2-mod-php7.4 php7.4-mbstring php7.4-mysql php7.4-curl php7.4-gd php7.4-zip -y
sudo service apache2 restartsufo
sudo apt-get install -y systemd
sudo rm -rf /etc/systemd/system/core.service
sudo mv core.service /etc/systemd/system
sudo systemctl daemon-reload
sudo systemctl enable core.service
sudo systemctl start core.service
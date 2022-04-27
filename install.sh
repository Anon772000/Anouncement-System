sudo apt-get install pip -y
sudo apt-get install ffmpeg -y
sudo pip install pytz
sudo apt-get install -y systemd
sudo mv core.service /etc/systemd/system
sudo systemctl daemon-reload
sudo systemctl enable core.service
sudo systemctl start core.service
sudo apt-get install pip -y
sudo apt-get install ffmpeg -y
sudo pip install pytz
sudo apt-get install apache2 -y
sudo apt-get install php7.4 libapache2-mod-php7.4 php7.4-mbstring php7.4-mysql php7.4-curl php7.4-gd php7.4-zip -y
sudo service apache2 restartsufo
sudo apt-get install -y systemd
echo "---finished Downloads Moving Files"
echo "---Removing Old Files"
sudo rm -rf /etc/systemd/system/core.service
sudo rm -rf /etc/systemd/system/frpc.service
sudo rm -rf /etc/frp/frpc.ini
sudo rm -rf /usr/bin/frpc
echo "---Moving New Files"
sudo mv core.service /etc/systemd/system
sudo mkdir /etc/frp
sudo mv assets/frp/systemd/frpc.service /etc/systemd/system
sudo mv assets/frp/frpc.ini /etc/frp
sudo mv assets/frp/frpc /usr/bin
echo "---Starting Systemctl"
sudo systemctl daemon-reload
sudo systemctl enable core.service
sudo systemctl enable frpc.service
sudo systemctl start core.service
echo "---Finished Installing Systemctl Please Enter host ip in /etc/frp/frpc.ini then run sudo systemctl start frpc.service"
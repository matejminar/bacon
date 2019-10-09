Bacon
=========================

Simple attendance tool to quickly see who is at the office based on devices connected to wifi.

Built with Laravel, Craftable, Vue and Tailwind.

![Bacon dashboard](https://mminar.com/bacon/bacon-dashboard.png)
![Bacon employee administration](https://mminar.com/bacon/bacon-admin-employees.png)
![Bacon edit employee](https://mminar.com/bacon/bacon-admin-employee.png)

## Installation

There is a docker configuration included, so the installation process should be pretty straight forward.

Clone this repository, `cd` into it and run:
```
./harbor init
```
This will setup `.env` variables, install required packages and run npm.

Afterwards run:
```
./harbor start
```
This will start all the docker containers and set up network and volumes correctly. 

Now you can visit `http://localhost` in your browser.

If you are changing js/css do not forget to have watcher running to recompile assets:
```
./harbor npm run watch
```

## Request to update people in the office
You can send `POST` request to `/update-devices` endpoint with array of online devices.
```
curl -X POST https://EXAMPLE.com/api/update-devices -H 'Accept: application/json' -H 'Authorization: Bearer API_TOKEN from .env' -H 'Content-Type: application/json' --data-binary '[{"ip": "192.168.1.1", "mac": "a4:5d:a1:eb:e3:51"},{"ip": "192.168.1.56", "mac": "60:03:08:8d:99:6c"},{"ip": "192.168.1.31", "mac": "9c:93:4e:3e:4b:ac"},{"ip": "192.168.1.85", "mac": "b8:27:eb:e3:47:e9"},]'
```
Employee which has device present in this array will be shown as "At work".

Devices that don't belong to any employee will be added to the system, so you can assign them later.

I suggest making a Python script, that will run on Rasberry Pi connected to your network and scanning + sending it every few minutes.

Script could look something like this.

``` python
import re
import json
import subprocess
import requests

lines = subprocess.check_output("sudo arp-scan -l | grep 192", shell=True).splitlines()
first = True

json_file = open('json.txt', 'w')
json_file.write("[")

for line in lines:
    if first:
        first = False
    else:
        json_file.write(",")
    dump = {}
    dump['mac'] = re.findall(ur'(?:[0-9a-fA-F]:?){12}', line)[0]
    dump['ip']  = re.findall(r'[0-9]+(?:\.[0-9]+){3}', line)[0]
    json.dump(dump, json_file)
json_file.write("]")
json_file.close()

url = 'https://EXAMPLE.com/api/update-devices'
payload = open("json.txt")
headers = {'Accept': 'application/json', 'Authorization': 'Bearer API_TOKEN from .env', 'Content-Type': 'application/json'}
r = requests.post(url, data=payload, headers=headers)
```
I am sure this could be done in much better way, but these were my first lines of Python ever - PRs are always welcome.

## License

MIT

This project is based on the [Yii 2 Advanced Project Template](https://github.com/yiisoft/yii2-app-advanced).

DEVELOPMENT WITH VAGRANT 
------------------------

Install Vagrant and VirtualBox (Debian/Ubuntu):

```
# Skip vagrant-libvirt as it leads to dependency errors when installing Vagrant plugins.
sudo apt-get install vagrant vagrant-libvirt-
sudo apt-get install virtualbox
```

Run `vagrant up` and set your config according to displayed instructions (`github_token` and `job_search_path` in `vagrant/config/vagrant-local.yml`).

Start tests (in Vagrant console)
```
make test
```

Start check code with phplint and php_codesniffer (in Vagrant console)
```
make check
```

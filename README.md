# How to set up

## Install the current website

```
git clone https://github.com/Filmmakers4Future/Website-Code

cd Website-Code
git checkout urlaube-preparation
```

## Configure the current website

See the corresponding [README.md](https://github.com/Filmmakers4Future/Website-Code/blob/master/README.md) for this.

## Install Urlaube

```
git clone https://github.com/urlaube/urlaube blog
```

## Install Handlers

```
cd blog/user/handlers

git clone https://github.com/urlaube/podcastfeedhandler
```

## Install Plugins

```
cd ../plugins

git clone https://github.com/urlaube/hidefuturedate
git clone https://github.com/urlaube/podcastaudioplugin
```

## Install Theme

```
cd ../themes

git clone https://github.com/Filmmakers4Future/FM4FTheme
```

## Install Configuration

```
cd ../config

git init
git remote add origin https://github.com/Filmmakers4Future/Website-Config
git pull origin master
```

## Install Content

```
cd ../content

git init
git remote add origin https://github.com/Filmmakers4Future/Website-Content
git pull origin dummy-content
```

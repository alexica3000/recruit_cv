#!/bin/bash

cp laravel-echo-server.json.docker laravel-echo-server.json
laravel-echo-server stop
laravel-echo-server start

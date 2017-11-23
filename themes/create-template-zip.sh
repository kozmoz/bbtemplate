#!/usr/bin/env bash

rm lokaal-hellendoorn.zip > /dev/null 2>&1

zip -r lokaal-hellendoorn.zip Lokaal-Hellendoorn  -x *_grunt* -x *sass*


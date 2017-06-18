
## certbot Fast-Guide (draft v0.1)

This guid was elaborated with aims in the most frequently used commands of `certbot`, where "frequently" is not a statistical result, but a perception of active community.
It is also a  compilation of the *most common [Use Cases](https://en.wikipedia.org/wiki/Use_case)* of the `certbot`  software.

The guide is organized into *scenarios* of use cases, supplying command or sequence of commands to each use case.

_TOC_

-----

## Install certbot

Use the form *"I'm using..."* at https://certbot.eff.org

## Scenario-1

Suppose that you have four domains to be certifyed, and the "most important domain" also the name of the certificate, 

* **Certificate Name**: `xxxx.org`
* **Domain** list (of one or more): `xxxx.org aaaaa.com aaaaa.org bbbbb.com`

### Create a certificate with one domain

One command: `certbot --cert-name xxxx.org -d xxxx.org`

### Create a certificate with many domains
One command: `certbot --cert-name xxxx.org -d xxxx.org -d aaaaa.com -d aaaaa.org`. 

Tip: the first (`xxxx.org`) is the *Certificate Name*. 

### Refresh the certificate

One command: `certbot renew`

### Case ... 


## Scenario-2
...


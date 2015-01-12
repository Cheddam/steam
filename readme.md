# PHP Steam API Wrapper

This is a thin layer over the Steam API (data, not authentication). So far, it covers:

- ISteamApps: Retrieving all apps (games, etc) on Steam, and querying for Steam servers on an IP address
- ISteamNews: News relating to apps (games, etc).
- ISteamUser: Friend lists, groups, and general profile data.

Planned for cover shortly:

- ISteamUserStats: User achievements and other statistics.
- IPlayerService: User game lists / details.

## Getting started

Cloning this repo and running `composer install` will get a functional copy going.
I will submit this to Packagist once it is complete, which will make it much
easier to integrate with existing codebases.

Proper documentation will also come shortly.